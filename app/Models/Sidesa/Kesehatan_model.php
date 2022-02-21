<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Kesehatan_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    function posyandu20($kode)
    {
        $builder = $this->db->table('ksht_posyandu');
        if ($kode != '') {
            $builder->select('COUNT(nama_posyandu) posyandu,SUM(jml_kader) kader', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('COUNT(nama_posyandu) posyandu,SUM(jml_kader) kader', FALSE);
            $builder->where('tahun', 2020);
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function posyandu21($kode)
    {
        $builder = $this->db->table('ksht_posyandu');
        if ($kode != '') {
            $builder->select('COUNT(nama_posyandu) posyandu,SUM(jml_kader) kader', FALSE);
            $builder->where('tahun', 2021);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('COUNT(nama_posyandu) posyandu,SUM(jml_kader) kader', FALSE);
            $builder->where('tahun', 2021);
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function posyandu22($kode)
    {
        $builder = $this->db->table('ksht_posyandu');
        if ($kode != '') {
            $builder->select('COUNT(nama_posyandu) posyandu,SUM(jml_kader) kader', FALSE);
            $builder->where('tahun', 2022);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('COUNT(nama_posyandu) posyandu,SUM(jml_kader) kader', FALSE);
            $builder->where('tahun', 2022);
            $query = $builder->get();
            return $query->getRow();
        }
    }
}
