<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class Muatandata_model extends Model
{
    protected $table = 'sidesa_review_data';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['nm_data', 'tahundata', 'tahun'];

    public function getData2022()
    {
        $builder = $this->db->table('sidesa_review_data');
        $builder->select('nm_data, tahundata, click');
        $builder->where('tahun >=', 2022);
        $builder->orderBy('nm_data', SORT_ASC);
        return $builder->get()->getResultArray();
    }
}
