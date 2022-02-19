<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Bumdes_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    function getBumdes2019($kode)
    {
        $builder = $this->db->table('bumdes');
        if ($kode != null) {
            $builder->select('klasifikasi');
            $builder->where('tahun', 2019);
            $builder->where('klasifikasi !=', '');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getResult();
        } else {
            $builder->select('klasifikasi');
            $builder->where('tahun', 2019);
            $builder->where('klasifikasi !=', '');
            $query = $builder->get();
            return $query->getResult();
        }
    }

    function getBumdes2020($kode)
    {
        $builder = $this->db->table('bumdes');
        if ($kode != null) {
            $builder->select('klasifikasi');
            $builder->where('tahun', 2020);
            $builder->where('klasifikasi !=', '');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getResult();
        } else {
            $builder->select('klasifikasi');
            $builder->where('tahun', 2020);
            $builder->where('klasifikasi !=', '');
            $query = $builder->get();
            return $query->getResult();
        }
    }

    function getBumdes2021($kode)
    {
        $builder = $this->db->table('bumdes');
        if ($kode != null) {
            $builder->select('klasifikasi');
            $builder->where('tahun', 2021);
            $builder->where('klasifikasi !=', '');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getResult();
        } else {
            $builder->select('klasifikasi');
            $builder->where('tahun', 2021);
            $builder->where('klasifikasi !=', '');
            $query = $builder->get();
            return $query->getResult();
        }
    }

    function getBumdes2022($kode)
    {
        $builder = $this->db->table('bumdes');
        if ($kode != null) {
            $builder->select('klasifikasi');
            $builder->where('tahun', 2022);
            $builder->where('klasifikasi !=', '');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getResult();
        } else {
            $builder->select('klasifikasi');
            $builder->where('tahun', 2022);
            $builder->where('klasifikasi !=', '');
            $query = $builder->get();
            return $query->getResult();
        }
    }

    function getBumdesById($kode)
    {
        $builder = $this->db->table('bumdes');
        if ($kode != null) {
            $builder->select('*');
            $builder->like('kd_wilayah', $kode);
            $builder->where('tahun', 2020);
            $query = $builder->get();
            return $query->getRow();
        }
    }
}
