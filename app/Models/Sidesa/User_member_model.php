<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class User_member_model extends Model
{
    protected $table = 'sidesa_user';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['kd_wilayah', 'is_active', 'role_id'];

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
    }
}
