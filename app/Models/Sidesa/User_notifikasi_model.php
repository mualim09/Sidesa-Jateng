<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class USer_notifikasi_model extends Model
{
    protected $table = 'sidesa_notifikasi';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['read', 'keterangan'];

    function import($id)
    {
        $builder = $this->db->table('sidesa_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
    }

    function inputdata($id)
    {
        $builder = $this->db->table('sidesa_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
    }

    function rolemanagement($id)
    {
        $builder = $this->db->table('sidesa_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
    }

    public function getData($user)
    {
        $builder = $this->db->table('sidesa_notifikasi');
        $builder->join('wilayah_33', 'sidesa_notifikasi.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->orderBy('tanggal', 'DESC');
        if ($user['role_id'] == 1) {
            $builder->where('target', 1);
        } else if ($user['role_id'] == 2) {
            $builder->where('target', 2);
        } else {
            $builder->where('target', $user['kd_wilayah']);
        }
        return $builder->get()->getResultArray();
    }
}
