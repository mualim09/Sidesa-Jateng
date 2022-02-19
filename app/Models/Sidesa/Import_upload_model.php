<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Import_upload_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function import_dataBumdes($bumdes)
    {
        $builder = $this->db->table('bumdes');
        $data = count($bumdes);
        if ($data > 0) {
            $builder->replace($bumdes);
        } else {
            $builder->insert($bumdes);
        }
    }

    public function getAll_dataBumdes()
    {
        $builder = $this->db->table('bumdes');
        if ($builder->countAllResults() > 0) {
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunBumdes()
    {
        $builder = $this->db->table('bumdes');
        $builder->select('tahun');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }

    public function import_datakk($penduduk_kepemilikan_kk)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $data = count($penduduk_kepemilikan_kk);
        if ($data > 0) {
            $builder->replace($penduduk_kepemilikan_kk);
        } else {
            $builder->insert($penduduk_kepemilikan_kk);
        }
    }

    public function getAll_datakkI()
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Kepemilikan KK I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_datakkII()
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Kepemilikan KK II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunkkI()
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Kepemilikan KK I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahunkkII()
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Kepemilikan KK II');
        return $builder->get()->getResultArray();
    }

    public function import_datakelamin($penduduk_jns_kelamin)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $data = count($penduduk_jns_kelamin);
        if ($data > 0) {
            $builder->replace($penduduk_jns_kelamin);
        } else {
            $builder->insert($penduduk_jns_kelamin);
        }
    }

    public function getAll_datakelaminI()
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Jenis Kelamin I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_datakelaminII()
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Jenis Kelamin II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunkelaminI()
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Jenis Kelamin I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahunkelaminII()
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Jenis Kelamin II');
        return $builder->get()->getResultArray();
    }

    public function import_datausia($penduduk_kelompok_usia)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $data = count($penduduk_kelompok_usia);
        if ($data > 0) {
            $builder->replace($penduduk_kelompok_usia);
        } else {
            $builder->insert($penduduk_kelompok_usia);
        }
    }

    public function getAll_datausiaI()
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Kelompok Usia I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_datausiaII()
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Kelompok Usia II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunusiaI()
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Kelompok Usia I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahunusiaII()
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Kelompok Usia II');
        return $builder->get()->getResultArray();
    }

    public function import_datapendidikan($penduduk_pendidikan)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $data = count($penduduk_pendidikan);
        if ($data > 0) {
            $builder->replace($penduduk_pendidikan);
        } else {
            $builder->insert($penduduk_pendidikan);
        }
    }

    public function getAll_datapendidikanI()
    {
        $builder = $this->db->table('penduduk_pendidikan');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Pendidikan I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_datapendidikanII()
    {
        $builder = $this->db->table('penduduk_pendidikan');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Pendidikan II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunpendidikanI()
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Pendidikan I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahunpendidikanII()
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Pendidikan II');
        return $builder->get()->getResultArray();
    }

    public function import_dataagama($penduduk_agama)
    {
        $builder = $this->db->table('penduduk_agama');
        $data = count($penduduk_agama);
        if ($data > 0) {
            $builder->replace($penduduk_agama);
        } else {
            $builder->insert($penduduk_agama);
        }
    }

    public function getAll_dataagamaI()
    {
        $builder = $this->db->table('penduduk_agama');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Agama I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataagamaII()
    {
        $builder = $this->db->table('penduduk_agama');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Agama II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunagamaI()
    {
        $builder = $this->db->table('penduduk_agama');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Agama I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahunagamaII()
    {
        $builder = $this->db->table('penduduk_agama');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Agama II');
        return $builder->get()->getResultArray();
    }

    public function import_datapekerjaan($penduduk_pekerjaan)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $data = count($penduduk_pekerjaan);
        if ($data > 0) {
            $builder->replace($penduduk_pekerjaan);
        } else {
            $builder->insert($penduduk_pekerjaan);
        }
    }

    public function getAll_datapekerjaanI()
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Pekerjaan I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_datapekerjaanII()
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Pekerjaan II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunpekerjaanI()
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Pekerjaan I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahunpekerjaanII()
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Pekerjaan II');
        return $builder->get()->getResultArray();
    }

    public function import_datagol_darah($penduduk_gol_darah)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $data = count($penduduk_gol_darah);
        if ($data > 0) {
            $builder->replace($penduduk_gol_darah);
        } else {
            $builder->insert($penduduk_gol_darah);
        }
    }

    public function getAll_datagol_darahI()
    {
        $builder = $this->db->table('penduduk_gol_darah');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Golongan Darah I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_datagol_darahII()
    {
        $builder = $this->db->table('penduduk_gol_darah');
        if ($builder->countAllResults() > 0) {
            $builder->where('periode_uid_semester', 'Kependudukan Golongan Darah II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahungol_darahI()
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Golongan Darah I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahungol_darahII()
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('periode_uid_semester', 'Kependudukan Golongan Darah II');
        return $builder->get()->getResultArray();
    }

    public function import_idm($indeks_desa_membangun)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $data = count($indeks_desa_membangun);
        if ($data > 0) {
            $builder->replace($indeks_desa_membangun);
        } else {
            $builder->insert($indeks_desa_membangun);
        }
    }

    public function getAll_idm()
    {
        $builder = $this->db->table('indeks_desa_membangun');
        if ($builder->countAllResults() > 0) {
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunidm()
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->select('tahun');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }

    public function import_dtksbab($dtks_bab)
    {
        $builder = $this->db->table('dtks_bab');
        $data = count($dtks_bab);
        if ($data > 0) {
            $builder->replace($dtks_bab);
        } else {
            $builder->insert($dtks_bab);
        }
    }

    public function getAll_dtksbabI()
    {
        $builder = $this->db->table('dtks_bab');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS BAB I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksbabII()
    {
        $builder = $this->db->table('dtks_bab');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS BAB II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksbabIII()
    {
        $builder = $this->db->table('dtks_bab');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS BAB III');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksbabIV()
    {
        $builder = $this->db->table('dtks_bab');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS BAB IV');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahundtksbabI()
    {
        $builder = $this->db->table('dtks_bab');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS BAB I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksbabII()
    {
        $builder = $this->db->table('dtks_bab');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS BAB II');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksbabIII()
    {
        $builder = $this->db->table('dtks_bab');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS BAB III');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksbabIV()
    {
        $builder = $this->db->table('dtks_bab');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS BAB IV');
        return $builder->get()->getResultArray();
    }

    public function import_dtksDesilart($dtks_desilart)
    {
        $builder = $this->db->table('dtks_desilart');
        $data = count($dtks_desilart);
        if ($data > 0) {
            $builder->replace($dtks_desilart);
        } else {
            $builder->insert($dtks_desilart);
        }
    }

    public function getAll_dtksDesilartI()
    {
        $builder = $this->db->table('dtks_desilart');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DESILART I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksDesilartII()
    {
        $builder = $this->db->table('dtks_desilart');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DESILART II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksDesilartIII()
    {
        $builder = $this->db->table('dtks_desilart');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DESILART III');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksDesilartIV()
    {
        $builder = $this->db->table('dtks_desilart');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DESILART IV');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahundtksDesilartI()
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DESILART I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksDesilartII()
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DESILART II');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksDesilartIII()
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DESILART III');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksDesilartIV()
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DESILART IV');
        return $builder->get()->getResultArray();
    }

    public function import_dtksDesilkrt($dtks_desilkrt)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $data = count($dtks_desilkrt);
        if ($data > 0) {
            $builder->replace($dtks_desilkrt);
        } else {
            $builder->insert($dtks_desilkrt);
        }
    }

    public function getAll_dtksDesilkrtI()
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DESILKRT I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksDesilkrtII()
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DESILKRT II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksDesilkrtIII()
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DESILKRT III');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksDesilkrtIV()
    {
        $builder = $this->db->table('dtks_desilkrt');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DESILKRT IV');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahundtksDesilkrtI()
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DESILKRT I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksDesilkrtII()
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DESILKRT II');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksDesilkrtIII()
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DESILKRT III');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksDesilkrtIV()
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DESILKRT IV');
        return $builder->get()->getResultArray();
    }

    public function import_dtksdisabilitas($dtks_disabilitas)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $data = count($dtks_disabilitas);
        if ($data > 0) {
            $builder->replace($dtks_disabilitas);
        } else {
            $builder->insert($dtks_disabilitas);
        }
    }

    public function getAll_dtksdisabilitasI()
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DISABILITAS I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksdisabilitasII()
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DISABILITAS II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksdisabilitasIII()
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DISABILITAS III');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksdisabilitasIV()
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS DISABILITAS IV');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahundtksdisabilitasI()
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DISABILITAS I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksdisabilitasII()
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DISABILITAS II');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksdisabilitasIII()
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DISABILITAS III');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksdisabilitasIV()
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS DISABILITAS IV');
        return $builder->get()->getResultArray();
    }

    public function import_dtksmasak($dtks_masak)
    {
        $builder = $this->db->table('dtks_masak');
        $data = count($dtks_masak);
        if ($data > 0) {
            $builder->replace($dtks_masak);
        } else {
            $builder->insert($dtks_masak);
        }
    }

    public function getAll_dtksmasakI()
    {
        $builder = $this->db->table('dtks_masak');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksmasakII()
    {
        $builder = $this->db->table('dtks_masak');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksmasakIII()
    {
        $builder = $this->db->table('dtks_masak');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK III');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksmasakIV()
    {
        $builder = $this->db->table('dtks_masak');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS BAHAN MEMASAK IV');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahundtksmasakI()
    {
        $builder = $this->db->table('dtks_masak');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS BAHAN MEMASAK I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksmasakII()
    {
        $builder = $this->db->table('dtks_masak');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS BAHAN MEMASAK II');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksmasakIII()
    {
        $builder = $this->db->table('dtks_masak');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS BAHAN MEMASAK III');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksmasakIV()
    {
        $builder = $this->db->table('dtks_masak');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS BAHAN MEMASAK IV');
        return $builder->get()->getResultArray();
    }

    public function import_dtksminum($dtks_minum)
    {
        $builder = $this->db->table('dtks_minum');
        $data = count($dtks_minum);
        if ($data > 0) {
            $builder->replace($dtks_minum);
        } else {
            $builder->insert($dtks_minum);
        }
    }

    public function getAll_dtksminumI()
    {
        $builder = $this->db->table('dtks_minum');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS SUMBER AIR I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksminumII()
    {
        $builder = $this->db->table('dtks_minum');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS SUMBER AIR II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksminumIII()
    {
        $builder = $this->db->table('dtks_minum');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS SUMBER AIR III');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtksminumIV()
    {
        $builder = $this->db->table('dtks_minum');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS SUMBER AIR IV');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahundtksminumI()
    {
        $builder = $this->db->table('dtks_minum');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS SUMBER AIR I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksminumII()
    {
        $builder = $this->db->table('dtks_minum');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS SUMBER AIR II');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksminumIII()
    {
        $builder = $this->db->table('dtks_minum');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS SUMBER AIR III');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtksminumIV()
    {
        $builder = $this->db->table('dtks_minum');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS SUMBER AIR IV');
        return $builder->get()->getResultArray();
    }

    public function import_dtkspenerangan($dtks_penerangan)
    {
        $builder = $this->db->table('dtks_penerangan');
        $data = count($dtks_penerangan);
        if ($data > 0) {
            $builder->replace($dtks_penerangan);
        } else {
            $builder->insert($dtks_penerangan);
        }
    }

    public function getAll_dtkspeneranganI()
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS PENERANGAN I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtkspeneranganII()
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS PENERANGAN II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtkspeneranganIII()
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS PENERANGAN III');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtkspeneranganIV()
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS PENERANGAN IV');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahundtkspeneranganI()
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS PENERANGAN I');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtkspeneranganII()
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS PENERANGAN II');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtkspeneranganIII()
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS PENERANGAN III');
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtkspeneranganIV()
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->select('tahun');
        $builder->distinct();
        $builder->where('dtks_version', 'DTKS PENERANGAN IV');
        return $builder->get()->getResultArray();
    }

    public function import_dtkstinggal($dtks_tinggal)
    {
        $builder = $this->db->table('dtks_tinggal');
        $data = count($dtks_tinggal);
        if ($data > 0) {
            $builder->replace($dtks_tinggal);
        } else {
            $builder->insert($dtks_tinggal);
        }
    }

    public function getAll_dtkstinggalI()
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL I');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtkstinggalII()
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL II');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtkstinggalIII()
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL III');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dtkstinggalIV()
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($builder->countAllResults() > 0) {
            $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL IV');
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahundtkstinggalI()
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->select('tahun');
        $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL I');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtkstinggalII()
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->select('tahun');
        $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL II');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtkstinggalIII()
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->select('tahun');
        $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL III');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }

    public function getAll_dataTahundtkstinggalIV()
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->select('tahun');
        $builder->where('dtks_version', 'DTKS TEMPAT TINGGAL IV');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }

    public function import_kshtposyandu($ksht_posyandu)
    {
        $builder = $this->db->table('ksht_posyandu');
        $data = count($ksht_posyandu);
        if ($data > 0) {
            $builder->replace($ksht_posyandu);
        } else {
            $builder->insert($ksht_posyandu);
        }
    }

    public function getAll_kshtposyandu()
    {
        $builder = $this->db->table('ksht_posyandu');
        if ($builder->countAllResults() > 0) {
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunkshtposyandu()
    {
        $builder = $this->db->table('ksht_posyandu');
        $builder->select('tahun');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }

    public function import_sosbudsatgas($sosbud_satgas)
    {
        $builder = $this->db->table('sosbud_satgas');
        $data = count($sosbud_satgas);
        if ($data > 0) {
            $builder->replace($sosbud_satgas);
        } else {
            $builder->insert($sosbud_satgas);
        }
    }

    public function getAll_sosbudsatgas()
    {
        $builder = $this->db->table('sosbud_satgas');
        if ($builder->countAllResults() > 0) {
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunsosbudsatgas()
    {
        $builder = $this->db->table('sosbud_satgas');
        $builder->select('tahun');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }

    public function import_bankeusalur($bankeu_salur)
    {
        $builder = $this->db->table('bankeu_salur');
        $data = count($bankeu_salur);
        if ($data > 0) {
            $builder->replace($bankeu_salur);
        } else {
            $builder->insert($bankeu_salur);
        }
    }

    public function getAll_bankeusalur()
    {
        $builder = $this->db->table('bankeu_salur');
        if ($builder->countAllResults() > 0) {
            return $builder->countAllResults();
        } else {
            return 0;
        }
    }

    public function getAll_dataTahunbankeusalur()
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->select('tahun');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }

    public function notifikasiAdmin($nmdata, $tahundata, $user)
    {
        $builder = $this->db->table('sidesa_notifikasi');

        $insert1 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Import Data",
            "target" => "2",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nmdata . ' ' . '(' . $tahundata . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $insert2 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Import Data",
            "target" => "3",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nmdata . ' ' . '(' . $tahundata . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $builder->insert($insert1);
        $builder->insert($insert2);
    }

    public function notifikasiAdministrator($nmdata, $tahundata, $user)
    {
        $builder = $this->db->table('sidesa_notifikasi');

        $insert1 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Import Data",
            "target" => "1",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nmdata . ' ' . '(' . $tahundata . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $insert2 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Import Data",
            "target" => "3",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nmdata . ' ' . '(' . $tahundata . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $builder->insert($insert1);
        $builder->insert($insert2);
    }

    public function notifikasiModerator($nmdata, $tahundata, $user)
    {
        $builder = $this->db->table('sidesa_notifikasi');

        $insert1 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Import Data",
            "target" => "1",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nmdata . ' ' . '(' . $tahundata . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $insert2 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Import Data",
            "target" => "2",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $nmdata . ' ' . '(' . $tahundata . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $builder->insert($insert1);
        $builder->insert($insert2);
    }
}
