<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Kesejahteraan_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    function artpertama2020($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DESILART I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DESILART I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function artkedua2020($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DESILART II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DESILART II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function artpertama2021($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILART I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILART I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function artkedua2021($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILART II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILART II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function artketiga2021($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILART III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILART III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function artkeempat2021($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILART IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILART IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function artpertama2022($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILART I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILART I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function artkedua2022($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILART II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILART II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function artketiga2022($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILART III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILART III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function artkeempat2022($kode)
    {
        $builder = $this->db->table('dtks_desilart');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILART IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILART IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtpertama2020($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DESILKRT I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DESILKRT I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtkedua2020($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DESILKRT II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DESILKRT II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtpertama2021($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILKRT I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILKRT I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtkedua2021($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILKRT II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILKRT II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtketiga2021($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILKRT III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILKRT III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtkeempat2021($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILKRT IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DESILKRT IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtpertama2022($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILKRT I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILKRT I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtkedua2022($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILKRT II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILKRT II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtketiga2022($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILKRT III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILKRT III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function krtkeempat2022($kode)
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($kode != '') {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILKRT IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(desil1) desil1,SUM(desil2) desil2,SUM(desil3) desil3,SUM(desil4) desil4,SUM(desil4plus) desil4plus,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DESILKRT IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakpertama2020($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakkedua2020($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakpertama2021($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakkedua2021($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakketiga2021($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakkeempat2021($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakpertama2022($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakkedua2022($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakketiga2022($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function masakkeempat2022($kode)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kode != '') {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(listrik_gas) listrik_gas,SUM(minyak_tanah) minyak_tanah,SUM(briket_arang_kayu) briket_arang_kayu,SUM(tidak_memasak) tidak_memasak,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babpertama2020($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS BAB I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS BAB I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babkedua2020($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS BAB II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS BAB II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babpertama2021($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAB I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAB I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babkedua2021($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAB II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAB II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babketiga2021($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAB III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAB III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babkeempat2021($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAB IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS BAB IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babpertama2022($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAB I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAB I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babkedua2022($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAB II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAB II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babketiga2022($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAB III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAB III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function babkeempat2022($kode)
    {
        $builder = $this->db->table('dtks_bab');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAB IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(bersama) bersama,SUM(umum) umum,SUM(tidak_ada) tidak_ada,SUM(tanpa_keterangan) tanpa_ket', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS BAB IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumpertama2020($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS SUMBER AIR I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS SUMBER AIR I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumkedua2020($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS SUMBER AIR II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS SUMBER AIR II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumpertama2021($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS SUMBER AIR I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS SUMBER AIR I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumkedua2021($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS SUMBER AIR II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS SUMBER AIR II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumketiga2021($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS SUMBER AIR III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS SUMBER AIR III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumkeempat2021($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS SUMBER AIR IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS SUMBER AIR IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumpertama2022($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS SUMBER AIR I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS SUMBER AIR I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumkedua2022($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS SUMBER AIR II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS SUMBER AIR II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumketiga2022($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS SUMBER AIR III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS SUMBER AIR III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function minumkeempat2022($kode)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kode != '') {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS SUMBER AIR IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(air_kemasan) air_kemasan,SUM(air_ledeng) air_ledeng,SUM(sumber_terlindung) sumber_terlindung,SUM(sumber_takterlindung) sumber_takterlindung,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS SUMBER AIR IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function peneranganpertama2020($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS PENERANGAN I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS PENERANGAN I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function penerangankedua2020($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS PENERANGAN II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS PENERANGAN II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function peneranganpertama2021($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS PENERANGAN I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS PENERANGAN I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function penerangankedua2021($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS PENERANGAN II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS PENERANGAN II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function peneranganketiga2021($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS PENERANGAN III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS PENERANGAN III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function penerangankeempat2021($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS PENERANGAN IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS PENERANGAN IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function peneranganpertama2022($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS PENERANGAN I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS PENERANGAN I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function penerangankedua2022($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS PENERANGAN II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS PENERANGAN II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function peneranganketiga2022($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS PENERANGAN III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS PENERANGAN III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function penerangankeempat2022($kode)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kode != '') {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS PENERANGAN IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(pln) pln,SUM(nonpln) nonpln,SUM(bukan_listrik) bukan_listrik,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS PENERANGAN IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalpertama2020($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalkedua2020($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalpertama2021($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalkedua2021($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalketiga2021($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalkeempat2021($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalpertama2022($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL I');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalkedua2022($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL II');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalketiga2022($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL III');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function tinggalkeempat2022($kode)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kode != '') {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL IV');
            $builder->like('kd_wilayah', $kode);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(milik_sendiri) milik_sendiri,SUM(kontrak) kontrak,SUM(beban_sewa) beban_sewa,SUM(dinas) dinas,SUM(lainnya) lainnya,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    // dibawah ini untuk kecamatan dan desa yang belum time series

    //     function kesejahteraan($kode)
    //     {
    //         $builder = $this->db->table('kesejahteraan');
    //         if ($kode != '') {
    //             $builder->select('SUM(rt_desil1) AS rt_desil1,SUM(rt_desil2) AS rt_desil2,SUM(rt_desil3) AS rt_desil3,SUM(rt_desil4) AS rt_desil4,
    // SUM(individu_desil1) AS individu_desil1, SUM(individu_desil2) AS individu_desil2, SUM(individu_desil3) AS individu_desil3, SUM(individu_desil4) AS individu_desil4', FALSE);
    //             $builder->like('kd_wilayah', $kode);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         } else {
    //             $builder->select('SUM(rt_desil1) AS rt_desil1,SUM(rt_desil2) AS rt_desil2,SUM(rt_desil3) AS rt_desil3,SUM(rt_desil4) AS rt_desil4,
    // SUM(individu_desil1) AS individu_desil1, SUM(individu_desil2) AS individu_desil2, SUM(individu_desil3) AS individu_desil3, SUM(individu_desil4) AS individu_desil4', FALSE);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         }
    //     }

    //     function fasilitas_bab($kode)
    //     {
    //         $builder = $this->db->table('fasilitas_bab');
    //         if ($kode != '') {
    //             $builder->select('SUM(jamban_sendiri) jamban_sendiri, SUM(jamban_umum) jamban_umum, SUM(tidak_ada) tidak_ada', FALSE);
    //             $builder->like('kd_wilayah', $kode);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         } else {
    //             $builder->select('SUM(jamban_sendiri) jamban_sendiri, SUM(jamban_umum) jamban_umum, SUM(tidak_ada) tidak_ada ', FALSE);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         }
    //     }

    //     function bahan_bakar_memasak($kode)
    //     {
    //         $builder = $this->db->table('bahan_bakar_memasak');
    //         if ($kode != '') {
    //             $builder->select('SUM(listrik_gas) listrik_gas, SUM(minyak_tanah) minyak_tanah, SUM(briket_arang_kayu) briket_arang_kayu, SUM(tdk_memasak) tdk_memasak', FALSE);
    //             $builder->like('kd_wilayah', $kode);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         } else {
    //             $builder->select('SUM(listrik_gas) listrik_gas, SUM(minyak_tanah) minyak_tanah, SUM(briket_arang_kayu) briket_arang_kayu, SUM(tdk_memasak) tdk_memasak', FALSE);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         }
    //     }

    //     function sumber_air_minum($kode)
    //     {
    //         $builder = $this->db->table('sumber_air_minum');
    //         if ($kode != '') {
    //             $builder->select('SUM(air_kemasan) air_kemasan, SUM(air_ledeng) air_ledeng, SUM(sumber_terlindung) sumber_terlindung, SUM(sumber_takterlindung) sumber_takterlindung', FALSE);
    //             $builder->like('kd_wilayah', $kode);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         } else {
    //             $builder->select('SUM(air_kemasan) air_kemasan, SUM(air_ledeng) air_ledeng, SUM(sumber_terlindung) sumber_terlindung, SUM(sumber_takterlindung) sumber_takterlindung', FALSE);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         }
    //     }

    //     function sumber_penerangan_utama($kode)
    //     {
    //         $builder = $this->db->table('sumber_penerangan_utama');
    //         if ($kode != '') {
    //             $builder->select('SUM(pln) pln, SUM(nonpln) nonpln, SUM(tdk_ada) tdk_ada', FALSE);
    //             $builder->like('kd_wilayah', $kode);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         } else {
    //             $builder->select('SUM(pln) pln, SUM(nonpln) nonpln, SUM(tdk_ada) tdk_ada', FALSE);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         }
    //     }

    //     function status_tempat_tinggal($kode)
    //     {
    //         $builder = $this->db->table('status_tempat_tinggal');
    //         if ($kode != '') {
    //             $builder->select('SUM(milik_sendiri) milik_sendiri, SUM(kontrak) kontrak, SUM(beban_sewa) beban_sewa, SUM(lainnya) lainnya', FALSE);
    //             $builder->like('kd_wilayah', $kode);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         } else {
    //             $builder->select('SUM(milik_sendiri) milik_sendiri, SUM(kontrak) kontrak, SUM(beban_sewa) beban_sewa, SUM(lainnya) lainnya', FALSE);
    //             $query = $builder->get();
    //             return $query->getRow();
    //         }
    //     }
}
