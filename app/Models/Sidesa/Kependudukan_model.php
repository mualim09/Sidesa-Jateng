<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Kependudukan_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    function pendudukJenisKelamin_I_2020($kode)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        if ($kode != '') {
            $builder->select('SUM(jiwa_pria) pria,SUM(jiwa_perempuan) wanita', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Jenis Kelamin I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(jiwa_pria) pria,SUM(jiwa_perempuan) wanita', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Jenis Kelamin I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function pendudukAgama_I_2020($kode)
    {
        $builder = $this->db->table('penduduk_agama');
        if ($kode != '') {
            $builder->select('SUM(jiwa_agama_islam_pria) islam_pria,SUM(jiwa_agama_kristen_pria) kristen_pria,SUM(jiwa_agama_katholik_pria) katholik_pria,SUM(jiwa_agama_hindu_pria) hindu_pria,SUM(jiwa_agama_budha_pria) budha_pria,SUM(jiwa_agama_konghucu_pria) konghucu_pria,SUM(jiwa_agama_alirankepercayaan_pria) alirankepercayaan_pria,SUM(jiwa_agama_islam_perempuan) islam_perempuan,SUM(jiwa_agama_kristen_perempuan) kristen_perempuan,SUM(jiwa_agama_katholik_perempuan) katholik_perempuan,SUM(jiwa_agama_hindu_perempuan) hindu_perempuan,SUM(jiwa_agama_budha_perempuan) budha_perempuan,SUM(jiwa_agama_konghucu_perempuan) konghucu_perempuan,SUM(jiwa_agama_alirankepercayaan_perempuan) alirankepercayaan_perempuan', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Agama I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(jiwa_agama_islam_pria) islam_pria,SUM(jiwa_agama_kristen_pria) kristen_pria,SUM(jiwa_agama_katholik_pria) katholik_pria,SUM(jiwa_agama_hindu_pria) hindu_pria,SUM(jiwa_agama_budha_pria) budha_pria,SUM(jiwa_agama_konghucu_pria) konghucu_pria,SUM(jiwa_agama_alirankepercayaan_pria) alirankepercayaan_pria,SUM(jiwa_agama_islam_perempuan) islam_perempuan,SUM(jiwa_agama_kristen_perempuan) kristen_perempuan,SUM(jiwa_agama_katholik_perempuan) katholik_perempuan,SUM(jiwa_agama_hindu_perempuan) hindu_perempuan,SUM(jiwa_agama_budha_perempuan) budha_perempuan,SUM(jiwa_agama_konghucu_perempuan) konghucu_perempuan,SUM(jiwa_agama_alirankepercayaan_perempuan) alirankepercayaan_perempuan', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Agama I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function pendudukPendidikan_I_2020($kode)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        if ($kode != '') {
            $builder->select('SUM(kk_pendidikan_belum_tidaksekolah_pria) tidak_sekolah_pria,SUM(kk_pendidikan_belumtamatsd_sederajat_pria) belum_tamat_pria,SUM(kk_pendidikan_tamatsd_sederajat_pria) sd_pria,SUM(kk_pendidikan_sltp_sederajat_pria) smp_pria,SUM(kk_pendidikan_slta_sederajat_pria) sma_pria,SUM(kk_pendidikan_diploma_1_2_pria) d1_d2_pria,SUM(kk_pendidikan_akademi_diploma_3_smuda_pria) d3_pria,SUM(kk_pendidikan_diploma_4_strata_1_pria) s1_pria,SUM(kk_pendidikan_strata2_pria) s2_pria,SUM(kk_pendidikan_strata3_pria) s3_pria,SUM(kk_pendidikan_belum_tidaksekolah_perempuan) tidak_sekolah_perempuan,SUM(kk_pendidikan_belumtamatsd_sederajat_perempuan) belum_tamat_perempuan,SUM(kk_pendidikan_tamatsd_sederajat_perempuan) sd_perempuan,SUM(kk_pendidikan_sltp_sederajat_perempuan) smp_perempuan,SUM(kk_pendidikan_slta_sederajat_perempuan) sma_perempuan,SUM(kk_pendidikan_diploma_1_2_perempuan) d1_d2_perempuan,SUM(kk_pendidikan_akademi_diploma_3_smuda_perempuan) d3_perempuan,SUM(kk_pendidikan_diploma_4_strata_1_perempuan) s1_perempuan,SUM(kk_pendidikan_strata2_perempuan) s2_perempuan,SUM(kk_pendidikan_strata3_perempuan) s3_perempuan', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Pendidikan I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(kk_pendidikan_belum_tidaksekolah_pria) tidak_sekolah_pria,SUM(kk_pendidikan_belumtamatsd_sederajat_pria) belum_tamat_pria,SUM(kk_pendidikan_tamatsd_sederajat_pria) sd_pria,SUM(kk_pendidikan_sltp_sederajat_pria) smp_pria,SUM(kk_pendidikan_slta_sederajat_pria) sma_pria,SUM(kk_pendidikan_diploma_1_2_pria) d1_d2_pria,SUM(kk_pendidikan_akademi_diploma_3_smuda_pria) d3_pria,SUM(kk_pendidikan_diploma_4_strata_1_pria) s1_pria,SUM(kk_pendidikan_strata2_pria) s2_pria,SUM(kk_pendidikan_strata3_pria) s3_pria,SUM(kk_pendidikan_belum_tidaksekolah_perempuan) tidak_sekolah_perempuan,SUM(kk_pendidikan_belumtamatsd_sederajat_perempuan) belum_tamat_perempuan,SUM(kk_pendidikan_tamatsd_sederajat_perempuan) sd_perempuan,SUM(kk_pendidikan_sltp_sederajat_perempuan) smp_perempuan,SUM(kk_pendidikan_slta_sederajat_perempuan) sma_perempuan,SUM(kk_pendidikan_diploma_1_2_perempuan) d1_d2_perempuan,SUM(kk_pendidikan_akademi_diploma_3_smuda_perempuan) d3_perempuan,SUM(kk_pendidikan_diploma_4_strata_1_perempuan) s1_perempuan,SUM(kk_pendidikan_strata2_perempuan) s2_perempuan,SUM(kk_pendidikan_strata3_perempuan) s3_perempuan', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Pendidikan I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function pendudukPekerjaan_I_2020($kode)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        if ($kode != '') {
            $builder->select('SUM(jiwa_kerja_pendudukan_belum_tidakbekerja_pria) nojob_pria,SUM(jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria) rt_pria,SUM(jiwa_kerja_pendudukan_pelajar_mahasiswa_pria) pelajarmhs_pria,SUM(jiwa_kerja_pendudukan_pensiunan_pria) pensiun_pria,SUM(jiwa_kerja_pendudukan_pns_pria) pns_pria,SUM(jiwa_kerja_pendudukan_tni_pria) tni_pria,SUM(jiwa_kerja_pendudukan_polri_pria) polri_pria,SUM(jiwa_kerja_pendudukan_perdagangan_pria) pedagang_pria,SUM(jiwa_kerja_pendudukan_petanipekebun_pria) tani_pria,SUM(jiwa_kerja_pendudukan_peternak_pria) peternak_pria,SUM(jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan) nojob_perempuan,SUM(jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan) rt_perempuan,SUM(jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan) pelajarmhs_perempuan,SUM(jiwa_kerja_pendudukan_pensiunan_perempuan) pensiun_perempuan,SUM(jiwa_kerja_pendudukan_pns_perempuan) pns_perempuan,SUM(jiwa_kerja_pendudukan_tni_perempuan) tni_perempuan,SUM(jiwa_kerja_pendudukan_polri_perempuan) polri_perempuan,SUM(jiwa_kerja_pendudukan_perdagangan_perempuan) pedagang_perempuan,SUM(jiwa_kerja_pendudukan_petanipekebun_perempuan) tani_perempuan,SUM(jiwa_kerja_pendudukan_peternak_perempuan) peternak_perempuan', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Pekerjaan I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(jiwa_kerja_pendudukan_belum_tidakbekerja_pria) nojob_pria,SUM(jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria) rt_pria,SUM(jiwa_kerja_pendudukan_pelajar_mahasiswa_pria) pelajarmhs_pria,SUM(jiwa_kerja_pendudukan_pensiunan_pria) pensiun_pria,SUM(jiwa_kerja_pendudukan_pns_pria) pns_pria,SUM(jiwa_kerja_pendudukan_tni_pria) tni_pria,SUM(jiwa_kerja_pendudukan_polri_pria) polri_pria,SUM(jiwa_kerja_pendudukan_perdagangan_pria) pedagang_pria,SUM(jiwa_kerja_pendudukan_petanipekebun_pria) tani_pria,SUM(jiwa_kerja_pendudukan_peternak_pria) peternak_pria,SUM(jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan) nojob_perempuan,SUM(jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan) rt_perempuan,SUM(jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan) pelajarmhs_perempuan,SUM(jiwa_kerja_pendudukan_pensiunan_perempuan) pensiun_perempuan,SUM(jiwa_kerja_pendudukan_pns_perempuan) pns_perempuan,SUM(jiwa_kerja_pendudukan_tni_perempuan) tni_perempuan,SUM(jiwa_kerja_pendudukan_polri_perempuan) polri_perempuan,SUM(jiwa_kerja_pendudukan_perdagangan_perempuan) pedagang_perempuan,SUM(jiwa_kerja_pendudukan_petanipekebun_perempuan) tani_perempuan,SUM(jiwa_kerja_pendudukan_peternak_perempuan) peternak_perempuan', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Pekerjaan I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function pendudukKK_I_2020($kode)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        if ($kode != '') {
            $builder->select('SUM(kk_pria) kk_pria,SUM(kk_perempuan) kk_wanita,SUM(kk_kepemilikankk_pria) kep_kk_pria,SUM(kk_kepemilikankk_perempuan) kep_kk_wanita', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Kepemilikan KK I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(kk_pria) kk_pria,SUM(kk_perempuan) kk_wanita,SUM(kk_kepemilikankk_pria) kep_kk_pria,SUM(kk_kepemilikankk_perempuan) kep_kk_wanita', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Kepemilikan KK I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function pendudukKelompokUsia_I_2020($kode)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        if ($kode != '') {
            $builder->select('SUM(jw_p_4) w0_4,SUM(jw_p_9) w5_9,SUM(jw_p_14) w10_14,SUM(jw_p_19) w15_19,SUM(jw_p_24) w20_24,SUM(jw_p_29) w25_29,SUM(jw_p_34) w30_34, SUM(jw_p_39) w35_39, SUM(jw_p_44) w40_44, SUM(jw_p_49) w45_49,SUM(jw_p_54) w50_54,SUM(jw_p_59) w55_59,SUM(jw_p_64) w60_64,SUM(jw_p_69) w65_69,SUM(jw_p_74) w70_74,SUM(jw_p_75) w75_up,SUM(jw_l_4) p0_4,SUM(jw_l_9) p5_9,SUM(jw_l_14) p10_14,SUM(jw_l_19) p15_19,SUM(jw_l_24) p20_24,SUM(jw_l_29) p25_29, SUM(jw_l_34) p30_34,SUM(jw_l_39) p35_39,SUM(jw_l_44) p40_44,SUM(jw_l_49) p45_49,SUM(jw_l_54) p50_54,SUM(jw_l_59) p55_59,SUM(jw_l_64) p60_64,SUM(jw_l_69) p65_69,SUM(jw_l_74) p70_74,SUM(jw_l_75) p75_up', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Kelompok Usia I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(jw_p_4) w0_4,SUM(jw_p_9) w5_9,SUM(jw_p_14) w10_14,SUM(jw_p_19) w15_19,SUM(jw_p_24) w20_24,SUM(jw_p_29) w25_29,SUM(jw_p_34) w30_34, SUM(jw_p_39) w35_39, SUM(jw_p_44) w40_44, SUM(jw_p_49) w45_49,SUM(jw_p_54) w50_54,SUM(jw_p_59) w55_59,SUM(jw_p_64) w60_64,SUM(jw_p_69) w65_69,SUM(jw_p_74) w70_74,SUM(jw_p_75) w75_up,SUM(jw_l_4) p0_4,SUM(jw_l_9) p5_9,SUM(jw_l_14) p10_14,SUM(jw_l_19) p15_19,SUM(jw_l_24) p20_24,SUM(jw_l_29) p25_29, SUM(jw_l_34) p30_34,SUM(jw_l_39) p35_39,SUM(jw_l_44) p40_44,SUM(jw_l_49) p45_49,SUM(jw_l_54) p50_54,SUM(jw_l_59) p55_59,SUM(jw_l_64) p60_64,SUM(jw_l_69) p65_69,SUM(jw_l_74) p70_74,SUM(jw_l_75) p75_up', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Kelompok Usia I');
            $query = $builder->get();
            return $query->getRow();
        }
    }

    function pendudukGolDar_I_2020($kode)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        if ($kode != '') {
            $builder->select('SUM(jiwa_goldar_a_pria) goldar_a_pria,SUM(jiwa_goldar_b_pria) goldar_b_pria,SUM(jiwa_goldar_ab_pria) goldar_ab_pria,SUM(jiwa_goldar_o_pria) goldar_o_pria,SUM(jiwa_goldar_a_plus_pria) goldar_a_plus_pria,SUM(jiwa_goldar_a_minus_pria) goldar_a_minus_pria,SUM(jiwa_goldar_b_plus_pria) goldar_b_plus_pria,SUM(jiwa_goldar_b_minus_pria) goldar_b_minus_pria,SUM(jiwa_goldar_ab_plus_pria) goldar_ab_plus_pria,SUM(jiwa_goldar_ab_minus_pria) goldar_ab_minus_pria,SUM(jiwa_goldar_o_plus_pria) goldar_o_plus_pria,SUM(jiwa_goldar_o_minus_pria) goldar_o_minus_pria,SUM(jiwa_goldar_tidaktau_pria) goldar_tidaktau_pria,SUM(jiwa_goldar_a_perempuan) goldar_a_perempuan,SUM(jiwa_goldar_b_perempuan) goldar_b_perempuan,SUM(jiwa_goldar_ab_perempuan) goldar_ab_perempuan,SUM(jiwa_goldar_o_perempuan) goldar_o_perempuan,SUM(jiwa_goldar_a_plus_perempuan) goldar_a_plus_perempuan,SUM(jiwa_goldar_a_minus_perempuan) goldar_a_minus_perempuan,SUM(jiwa_goldar_b_plus_perempuan) goldar_b_plus_perempuan,SUM(jiwa_goldar_b_minus_perempuan) goldar_b_minus_perempuan,SUM(jiwa_goldar_ab_plus_perempuan) goldar_ab_plus_perempuan,SUM(jiwa_goldar_ab_minus_perempuan) goldar_ab_minus_perempuan,SUM(jiwa_goldar_o_plus_perempuan) goldar_o_plus_perempuan,SUM(jiwa_goldar_o_minus_perempuan) goldar_o_minus_perempuan,SUM(jiwa_goldar_tidaktau_perempuan) goldar_tidaktau_perempuan', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Golongan Darah I');
            $builder->like('kd_wilayah', $kode);
            $builder->groupBy('LEFT(kd_wilayah,5)');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->select('SUM(jiwa_goldar_a_pria) goldar_a_pria,SUM(jiwa_goldar_b_pria) goldar_b_pria,SUM(jiwa_goldar_ab_pria) goldar_ab_pria,SUM(jiwa_goldar_o_pria) goldar_o_pria,SUM(jiwa_goldar_a_plus_pria) goldar_a_plus_pria,SUM(jiwa_goldar_a_minus_pria) goldar_a_minus_pria,SUM(jiwa_goldar_b_plus_pria) goldar_b_plus_pria,SUM(jiwa_goldar_b_minus_pria) goldar_b_minus_pria,SUM(jiwa_goldar_ab_plus_pria) goldar_ab_plus_pria,SUM(jiwa_goldar_ab_minus_pria) goldar_ab_minus_pria,SUM(jiwa_goldar_o_plus_pria) goldar_o_plus_pria,SUM(jiwa_goldar_o_minus_pria) goldar_o_minus_pria,SUM(jiwa_goldar_tidaktau_pria) goldar_tidaktau_pria,SUM(jiwa_goldar_a_perempuan) goldar_a_perempuan,SUM(jiwa_goldar_b_perempuan) goldar_b_perempuan,SUM(jiwa_goldar_ab_perempuan) goldar_ab_perempuan,SUM(jiwa_goldar_o_perempuan) goldar_o_perempuan,SUM(jiwa_goldar_a_plus_perempuan) goldar_a_plus_perempuan,SUM(jiwa_goldar_a_minus_perempuan) goldar_a_minus_perempuan,SUM(jiwa_goldar_b_plus_perempuan) goldar_b_plus_perempuan,SUM(jiwa_goldar_b_minus_perempuan) goldar_b_minus_perempuan,SUM(jiwa_goldar_ab_plus_perempuan) goldar_ab_plus_perempuan,SUM(jiwa_goldar_ab_minus_perempuan) goldar_ab_minus_perempuan,SUM(jiwa_goldar_o_plus_perempuan) goldar_o_plus_perempuan,SUM(jiwa_goldar_o_minus_perempuan) goldar_o_minus_perempuan,SUM(jiwa_goldar_tidaktau_perempuan) goldar_tidaktau_perempuan', FALSE);
            $builder->where('tahun', 2020);
            $builder->like('periode_uid_semester', 'Kependudukan Golongan Darah I');
            $query = $builder->get();
            return $query->getRow();
        }
    }
}
