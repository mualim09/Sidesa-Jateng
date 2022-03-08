<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class Kabupaten_model extends Model
{
    protected $table = 'kabupaten';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['bghome', 'news', 'last_input'];

    public function getIdm2022($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->select('status, iks, ike, ikl, nilai_idm');
        $builder->where('status !=', '');
        $builder->where('tahun', 2022);
        $builder->like('kd_wilayah', $kode);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getIdm2021($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->select('status, iks, ike, ikl, nilai_idm');
        $builder->where('status !=', '');
        $builder->where('tahun', 2021);
        $builder->like('kd_wilayah', $kode);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getIdm2020($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->select('status, iks, ike, ikl, nilai_idm');
        $builder->where('status !=', '');
        $builder->where('tahun', 2020);
        $builder->like('kd_wilayah', $kode);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getIdm2019($kode)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->select('status, iks, ike, ikl, nilai_idm');
        $builder->where('status !=', '');
        $builder->where('tahun', 2019);
        $builder->like('kd_wilayah', $kode);
        $query = $builder->get();
        return $query->getResult();
    }
}
