<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Disabilitas_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    function disabilitaspertama2020($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DISABILITAS I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DISABILITAS I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function disabilitaskedua2020($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DISABILITAS II');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2020);
            $builder->where('dtks_version', 'DTKS DISABILITAS II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function disabilitaspertama2021($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DISABILITAS I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DISABILITAS I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function disabilitaskedua2021($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DISABILITAS II');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DISABILITAS II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function disabilitasketiga2021($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DISABILITAS III');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DISABILITAS III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function disabilitaskeempat2021($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DISABILITAS IV');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2021);
            $builder->where('dtks_version', 'DTKS DISABILITAS IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function disabilitaspertama2022($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DISABILITAS I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DISABILITAS I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function disabilitaskedua2022($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DISABILITAS II');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DISABILITAS II');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function disabilitasketiga2022($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DISABILITAS III');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DISABILITAS III');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function disabilitaskeempat2022($kode)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kode != '') {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DISABILITAS IV');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(normal) normal,SUM(daksa) daksa,SUM(netra) netra,SUM(rungu) rungu,SUM(wicara) wicara,SUM(rungu_wicara) rungu_wicara,SUM(netra_daksa) netra_daksa,SUM(netra_rungu_wicara) netra_rungu_wicara,SUM(rungu_wicara_daksa) rungu_wicara_daksa,SUM(rungu_netra_wicara_daksa) rungu_netra_wicara_daksa,SUM(mental) mental,SUM(jiwa) jiwa,SUM(daksa_mental) daksa_mental,SUM(tanpa_keterangan) tanpa_keterangan', FALSE);
            $builder->where('tahun', 2022);
            $builder->where('dtks_version', 'DTKS DISABILITAS IV');
            $query = $builder->get();
            return $query->getRow();
        }
    }
}
