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
        $builder->where('id_desa !=', 1);
        $builder->where('id_desa !=', 2);
        $builder->where('id_desa !=', 3);
        $builder->where('id_desa !=', 5);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
