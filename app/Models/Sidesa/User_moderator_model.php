<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class User_moderator_model extends Model
{
    protected $table = 'sidesa_user';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['kd_wilayah', 'is_active', 'role_id'];

    public function defaultgetRole()
    {
        $builder = $this->table('sidesa_user');
        $builder->select('user_id, nama, nip, nm_kab, nm_desa, role_akses, kd_wilayah, role_id');
        $builder->where('nama !=', 'admin');
        $builder->where('role_id !=', '1');
        $builder->where('role_id !=', '2');
        $builder->where('role_id !=', '3');
        $builder->join('wilayah_33', 'sidesa_user.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->join('sidesa_role', 'sidesa_user.role_id=sidesa_role.id', 'left');
        return $builder;
    }

    public function getRole($cari)
    {
        $builder = $this->table('sidesa_user');
        $builder->select('user_id, nama, nip, nm_kab, nm_desa, role_akses, kd_wilayah, role_id');
        $builder->like('nama', $cari, 'both');
        $builder->where('nama !=', 'admin');
        $builder->where('role_id !=', '1');
        $builder->where('role_id !=', '2');
        $builder->where('role_id !=', '3');
        $builder->orLike('nip', $cari, 'both');
        $builder->where('nama !=', 'admin');
        $builder->where('role_id !=', '1');
        $builder->where('role_id !=', '2');
        $builder->where('role_id !=', '3');
        $builder->orLike('nm_kab', $cari, 'both');
        $builder->where('nama !=', 'admin');
        $builder->where('role_id !=', '1');
        $builder->where('role_id !=', '2');
        $builder->where('role_id !=', '3');
        $builder->orLike('nm_desa', $cari, 'both');
        $builder->where('nama !=', 'admin');
        $builder->where('role_id !=', '1');
        $builder->where('role_id !=', '2');
        $builder->where('role_id !=', '3');
        $builder->orLike('role_akses', $cari, 'both');
        $builder->where('nama !=', 'admin');
        $builder->where('role_id !=', '1');
        $builder->where('role_id !=', '2');
        $builder->where('role_id !=', '3');
        $builder->join('wilayah_33', 'sidesa_user.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->join('sidesa_role', 'sidesa_user.role_id=sidesa_role.id', 'left');
        $builder->orderBy('nama', 'ASC');
        return $builder;
    }

    public function getMyprofile($sessionEmail)
    {
        $builder = $this->db->table('sidesa_user');
        $builder->select('nama, nip, email, hp, nm_desa, tanggal');
        $builder->join('wilayah_33', 'sidesa_user.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('email', $sessionEmail);
        $query = $builder->get();
        return $query->getResult();
    }

    public function editProfile($user_id, $input, $file)
    {
        $builder = $this->db->table('sidesa_user');
        $reviewdata = $this->db->table('sidesa_review_data');
        $notifikasi = $this->db->table('sidesa_notifikasi');
        $dashkab = $this->db->table('dashboard_kabupaten');
        $dashdesa = $this->db->table('dashboard_desa');

        $nama = $input['nama'];
        $hp = $input['hp'];

        if ($file->getError() == 4) {
            $nmfile = $input['imagelama'];
        } else {
            $nmfile = $file->getRandomName();
            $file->move('img/user/profile/', $nmfile);
            if ($input['imagelama'] != 'default.jpg') {
                unlink('img/user/profile/' . $input['imagelama']);
            }
        }
        $builder->set('image', $nmfile);
        $builder->set('nama', $nama);
        $builder->set('hp', $hp);
        $builder->where('user_id', $user_id);
        $builder->update();

        $reviewdata->set('image', $nmfile);
        $reviewdata->set('upload_by', $nama);
        $reviewdata->where('user_id', $user_id);
        $reviewdata->update();

        $notifikasi->set('image_user', $nmfile);
        $notifikasi->set('upload_by', $nama);
        $notifikasi->where('user_id', $user_id);
        $notifikasi->update();

        $dashkab->set('input_by', $nama);
        $dashkab->where('user_id', $user_id);
        $dashkab->update();

        $dashdesa->set('input_by', $nama);
        $dashdesa->where('user_id', $user_id);
        $dashdesa->update();
    }

    public function Notifikasiakses($input, $user, $nip)
    {
        $builder = $this->db->table('sidesa_notifikasi');
        if ($input['role'] == 2) {
            $role = 'Administrator';
        } else if ($input['role'] == 3) {
            $role = 'Moderator';
        } else if ($input['role'] == 4) {
            $role = 'Member';
        } else if ($input['role'] == 5) {
            $role = 'Belum Assign';
        } else if ($input['role'] == 6) {
            $role = 'Kabupaten';
        } else if ($input['role'] == 7) {
            $role = 'Provinsi';
        }

        $insert1 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Role Akses",
            "target" => "1",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nip['nip'] . ' ' .  '(' . $role . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $insert2 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Role Akses",
            "target" => "2",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nip['nip'] . ' ' . '(' . $role . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $builder->insert($insert1);
        $builder->insert($insert2);
    }

    public function Notifikasihapus($nip, $user)
    {
        $builder = $this->db->table('sidesa_notifikasi');

        $insert1 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Hapus User",
            "target" => "1",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nip . " (Dihapus)",
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $insert2 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Hapus User",
            "target" => "2",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nip . " (Dihapus)",
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $builder->insert($insert1);
        $builder->insert($insert2);
    }

    // public function getMember()
    // {
    //     $builder = $this->db->table('sidesa_user');
    //     $builder->select('*');
    //     $builder->where('sidesa_user.role_id = 4');
    //     return $builder->countAllResults();
    // }
}
