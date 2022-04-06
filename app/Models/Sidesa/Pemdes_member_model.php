<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class Pemdes_member_model extends Model
{
    protected $table = 'pemdes_user';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['nama', 'hp', 'image', 'password'];

    public function editProfile($nik_ktp, $input, $file)
    {
        $builder = $this->db->table('pemdes_user');
        // $reviewdata = $this->db->table('sidesa_review_data');
        // $notifikasi = $this->db->table('sidesa_notifikasi');
        // $dashkab = $this->db->table('dashboard_kabupaten');
        // $dashdesa = $this->db->table('dashboard_desa');

        $nama = $input['nama'];
        $gender = $input['gender'];
        $tempat_lahir = $input['tempat_lahir'];
        $tanggal_lahir = $input['tanggal_lahir'];
        $alamat = $input['alamat'];
        $rt = $input['rt'];
        $rw = $input['rw'];
        $keldesa = $input['keldesa'];
        $kecamatan = $input['kecamatan'];
        $pekerjaan = $input['pekerjaan'];
        $hp = $input['hp'];

        if ($file->getError() == 4) {
            $nmfile = $input['imagelama'];
        } else {
            $nmfile = $file->getRandomName();
            $file->move('img/user/profile/', $nmfile);
            if ($input['imagelama'] != 'default.jpg' || $input['imagelama'] != 'defaultfemale.jpg') {
                unlink('img/user/profile/' . $input['imagelama']);
            }
        }
        $builder->set('image', $nmfile);
        $builder->set('nama', $nama);
        $builder->set('gender', $gender);
        $builder->set('tempat_lahir', $tempat_lahir);
        $builder->set('tanggal_lahir', $tanggal_lahir);
        $builder->set('alamat', $alamat);
        $builder->set('rt', $rt);
        $builder->set('rw', $rw);
        $builder->set('keldesa', $keldesa);
        $builder->set('kecamatan', $kecamatan);
        $builder->set('pekerjaan', $pekerjaan);
        $builder->set('hp', $hp);
        $builder->where('nik_ktp', $nik_ktp);
        $builder->update();

        // $reviewdata->set('image', $nmfile);
        // $reviewdata->set('upload_by', $nama);
        // $reviewdata->where('user_id', $nik_ktp);
        // $reviewdata->update();

        // $notifikasi->set('image_user', $nmfile);
        // $notifikasi->set('upload_by', $nama);
        // $notifikasi->where('user_id', $nik_ktp);
        // $notifikasi->update();

        // $dashkab->set('input_by', $nama);
        // $dashkab->where('user_id', $nik_ktp);
        // $dashkab->update();

        // $dashdesa->set('input_by', $nama);
        // $dashdesa->where('user_id', $nik_ktp);
        // $dashdesa->update();
    }

    // public function Notifikasiakses($input, $user, $nip)
    // {
    //     $builder = $this->db->table('sidesa_notifikasi');
    //     if ($input['role'] == 2) {
    //         $role = 'Administrator';
    //     } else if ($input['role'] == 3) {
    //         $role = 'Moderator';
    //     } else if ($input['role'] == 4) {
    //         $role = 'Member';
    //     } else if ($input['role'] == 5) {
    //         $role = 'Belum Assign';
    //     } else if ($input['role'] == 6) {
    //         $role = 'Kabupaten';
    //     } else if ($input['role'] == 7) {
    //         $role = 'Provinsi';
    //     }

    //     $insert1 = array(
    //         "kd_wilayah" => $user['kd_wilayah'],
    //         "jenis_file" => "Role Akses",
    //         "target" => "2",
    //         "read" => "N",
    //         "tanggal" => time(),
    //         "keterangan" => "waiting",
    //         "nama_notif" => $nip['nip'] . ' ' .  '(' . $role . ')',
    //         "upload_by" => $user['nama'],
    //         "user_id" => $user['user_id'],
    //         "image_user" => $user['image']
    //     );

    //     $insert2 = array(
    //         "kd_wilayah" => $user['kd_wilayah'],
    //         "jenis_file" => "Role Akses",
    //         "target" => "3",
    //         "read" => "N",
    //         "tanggal" => time(),
    //         "keterangan" => "waiting",
    //         "nama_notif" => $nip['nip'] . ' ' . '(' . $role . ')',
    //         "upload_by" => $user['nama'],
    //         "user_id" => $user['user_id'],
    //         "image_user" => $user['image']
    //     );

    //     $builder->insert($insert1);
    //     $builder->insert($insert2);
    // }

    // public function Notifikasihapus($nip, $user)
    // {
    //     $builder = $this->db->table('sidesa_notifikasi');

    //     $insert1 = array(
    //         "kd_wilayah" => $user['kd_wilayah'],
    //         "jenis_file" => "Hapus User",
    //         "target" => "2",
    //         "read" => "N",
    //         "tanggal" => time(),
    //         "keterangan" => "waiting",
    //         "nama_notif" => $nip . " (Dihapus)",
    //         "upload_by" => $user['nama'],
    //         "user_id" => $user['user_id'],
    //         "image_user" => $user['image']
    //     );

    //     $insert2 = array(
    //         "kd_wilayah" => $user['kd_wilayah'],
    //         "jenis_file" => "Hapus User",
    //         "target" => "3",
    //         "read" => "N",
    //         "tanggal" => time(),
    //         "keterangan" => "waiting",
    //         "nama_notif" => $nip . " (Dihapus)",
    //         "upload_by" => $user['nama'],
    //         "user_id" => $user['user_id'],
    //         "image_user" => $user['image']
    //     );

    //     $builder->insert($insert1);
    //     $builder->insert($insert2);
    // }

    // public function getMember()
    // {
    //     $builder = $this->db->table('sidesa_user');
    //     $builder->select('*');
    //     $builder->where('sidesa_user.role_id = 4');
    //     return $builder->countAllResults();
    // }
}
