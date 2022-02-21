<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class Kabupaten_model extends Model
{
    protected $table = 'kabupaten';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['bghome', 'news', 'last_input'];

    public function getIdmnow($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->select('status, iks, ike, ikl, nilai_idm');
        $builder->where('status !=', '');
        $builder->where('tahun', date("Y"));
        $builder->like('kd_wilayah', $kode);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getIdmbefore($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->select('status, iks, ike, ikl, nilai_idm');
        $builder->where('status !=', '');
        $builder->where('tahun', date("Y") - 1);
        $builder->like('kd_wilayah', $kode);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getIdmbefore2($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->select('status, iks, ike, ikl, nilai_idm');
        $builder->where('status !=', '');
        $builder->where('tahun', date("Y") - 2);
        $builder->like('kd_wilayah', $kode);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getIdmbefore3($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->select('status, iks, ike, ikl, nilai_idm');
        $builder->where('status !=', '');
        $builder->where('tahun', date("Y") - 3);
        $builder->like('kd_wilayah', $kode);
        $query = $builder->get();
        return $query->getResult();
    }
}
