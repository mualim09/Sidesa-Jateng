<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class Pencarian_model extends Model
{
    protected $table = 'wilayah_33';
    protected $primaryKey = 'id';

    public function getData()
    {
        $builder = $this->db->table('wilayah_33');
        $builder->select('id_desa, nm_kab, nm_kec, nm_desa');
        $builder->where('id_desa !=', '1');
        $builder->where('id_desa !=', '2');
        $builder->where('id_desa !=', '3');
        $builder->where('id_desa !=', '5');
        $builder->where('id_desa !=', '5A');
        $builder->where('id_desa !=', '5B');
        $builder->where('id_desa !=', '33.01');
        $builder->where('id_desa !=', '33.02');
        $builder->where('id_desa !=', '33.03');
        $builder->where('id_desa !=', '33.04');
        $builder->where('id_desa !=', '33.05');
        $builder->where('id_desa !=', '33.06');
        $builder->where('id_desa !=', '33.07');
        $builder->where('id_desa !=', '33.08');
        $builder->where('id_desa !=', '33.09');
        $builder->where('id_desa !=', '33.10');
        $builder->where('id_desa !=', '33.11');
        $builder->where('id_desa !=', '33.12');
        $builder->where('id_desa !=', '33.13');
        $builder->where('id_desa !=', '33.14');
        $builder->where('id_desa !=', '33.15');
        $builder->where('id_desa !=', '33.16');
        $builder->where('id_desa !=', '33.17');
        $builder->where('id_desa !=', '33.18');
        $builder->where('id_desa !=', '33.19');
        $builder->where('id_desa !=', '33.20');
        $builder->where('id_desa !=', '33.21');
        $builder->where('id_desa !=', '33.22');
        $builder->where('id_desa !=', '33.23');
        $builder->where('id_desa !=', '33.24');
        $builder->where('id_desa !=', '33.25');
        $builder->where('id_desa !=', '33.26');
        $builder->where('id_desa !=', '33.27');
        $builder->where('id_desa !=', '33.28');
        $builder->where('id_desa !=', '33.29');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
