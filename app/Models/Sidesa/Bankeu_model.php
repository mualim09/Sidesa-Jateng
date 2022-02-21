<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Bankeu_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    function bankeu_salur_cilacap()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.01');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_banyumas()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.02');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_purbalingga()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.03');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_banjarnegara()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.04');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_kebumen()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.05');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_purworejo()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.06');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_wonosobo()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.07');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_magelang()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.08');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_boyolali()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.09');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_klaten()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.10');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_sukoharjo()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.11');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_wonogiri()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.12');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_karanganyar()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.13');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_sragen()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.14');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_grobogan()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.15');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_blora()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.16');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_rembang()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.17');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_pati()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.18');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_kudus()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.19');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_jepara()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.20');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_demak()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.21');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_semarang()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.22');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_temanggung()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.23');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_kendal()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.24');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_batang()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.25');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_pekalongan()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.26');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_pemalang()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.27');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_tegal()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.28');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_brebes()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun >=', 2018);
        $builder->where('kd_wilayah', '33.29');
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2013($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2013);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2013);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2014($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2014);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2014);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2015($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2015);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2015);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2016($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2016);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2016);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2017($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2017);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2017);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2018($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2018);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2018);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2019($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2019);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2019);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2020($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2020);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2021($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2021);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2021);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2022($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2022);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2022);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2023($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2023);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2023);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2024($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2024);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2024);
        return $builder->get()->getResultArray();
    }

    function bankeu_salur_2025($kode)
    {
        $builder = $this->db->table('bankeu_salur');
        if ($kode != null) {
            $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
            $builder->where('tahun', 2025);
            $builder->like('kd_wilayah', $kode);
            return $builder->get()->getResultArray();
        }
        $builder->select('SUM(jml_bantuan) bantuan,SUM(lokasi) lokasi', FALSE);
        $builder->where('tahun', 2025);
        return $builder->get()->getResultArray();
    }
}
