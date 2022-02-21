<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Idm_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    function getIdm2019($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        if ($kode != '') {
            $builder->select('status, iks, ike, ikl, nilai_idm');
            $builder->where('status !=', '');
            $builder->where('tahun', 2019);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getResult();
        } else {
            $builder->select('status');
            $builder->where('status !=', '');
            $builder->where('tahun', 2019);
            $query = $builder->get();
            return $query->getResult();
        }
    }

    function getIdm2020($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        if ($kode != '') {
            $builder->select('status, iks, ike, ikl, nilai_idm');
            $builder->where('status !=', '');
            $builder->where('tahun', 2020);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getResult();
        } else {
            $builder->select('status');
            $builder->where('status !=', '');
            $builder->where('tahun', 2020);
            $query = $builder->get();
            return $query->getResult();
        }
    }

    function getIdm2021($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        if ($kode != '') {
            $builder->select('status, iks, ike, ikl, nilai_idm');
            $builder->where('status !=', '');
            $builder->where('tahun', 2021);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getResult();
        } else {
            $builder->select('status');
            $builder->where('status !=', '');
            $builder->where('tahun', 2021);
            $query = $builder->get();
            return $query->getResult();
        }
    }

    function getIdm2022($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        if ($kode != '') {
            $builder->select('status, iks, ike, ikl, nilai_idm');
            $builder->where('status !=', '');
            $builder->where('tahun', 2022);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getResult();
        } else {
            $builder->select('status');
            $builder->where('status !=', '');
            $builder->where('tahun', 2022);
            $query = $builder->get();
            return $query->getResult();
        }
    }
}
