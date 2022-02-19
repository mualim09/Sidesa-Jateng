<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Sosialbudaya_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    function satgas19($kode)
    {
        $builder = $this->db->table('sosbud_satgas');
        if ($kode != '') {
            $builder->select('COUNT(no_sk) no_sk,SUM(jml_anggota) anggota', FALSE);
            $builder->where('tahun', 2019);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('COUNT(no_sk) no_sk,SUM(jml_anggota) anggota', FALSE);
            $builder->where('tahun', 2019);
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function satgas20($kode)
    {
        $builder = $this->db->table('sosbud_satgas');
        if ($kode != '') {
            $builder->select('COUNT(no_sk) no_sk,SUM(jml_anggota) anggota', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('COUNT(no_sk) no_sk,SUM(jml_anggota) anggota', FALSE);
            $builder->where('tahun', 2020);
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function satgas21($kode)
    {
        $builder = $this->db->table('sosbud_satgas');
        if ($kode != '') {
            $builder->select('COUNT(no_sk) no_sk,SUM(jml_anggota) anggota', FALSE);
            $builder->where('tahun', 2021);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('COUNT(no_sk) no_sk,SUM(jml_anggota) anggota', FALSE);
            $builder->where('tahun', 2021);
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function satgas22($kode)
    {
        $builder = $this->db->table('sosbud_satgas');
        if ($kode != '') {
            $builder->select('COUNT(no_sk) no_sk,SUM(jml_anggota) anggota', FALSE);
            $builder->where('tahun', 2022);
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('COUNT(no_sk) no_sk,SUM(jml_anggota) anggota', FALSE);
            $builder->where('tahun', 2022);
            $query = $builder->get();
            return $query->getRow();
        }
    }
}
