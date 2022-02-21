<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Api_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getPendudukAgama($kd_kab = null)
    {
        $builder = $this->db->table('penduduk_agama');
        if ($kd_kab === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getPendudukAgamaKec($kd_kec = null)
    {
        $builder = $this->db->table('penduduk_agama');
        if ($kd_kec === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getPendudukAgamaDes($kd_des = null)
    {
        $builder = $this->db->table('penduduk_agama');
        if ($kd_des === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getPendudukAgamaTahun($tahun = null)
    {
        $builder = $this->db->table('penduduk_agama');
        if ($tahun === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getPendudukAgamaPeriode($periode_uid_semester = null)
    {
        $builder = $this->db->table('penduduk_agama');
        if ($periode_uid_semester === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_agama_islam_pria, jiwa_agama_islam_perempuan, jiwa_agama_kristen_pria, jiwa_agama_kristen_perempuan, jiwa_agama_katholik_pria, jiwa_agama_katholik_perempuan, jiwa_agama_hindu_pria, jiwa_agama_hindu_perempuan, jiwa_agama_budha_pria, jiwa_agama_budha_perempuan, jiwa_agama_konghucu_pria, jiwa_agama_konghucu_perempuan, jiwa_agama_alirankepercayaan_pria, jiwa_agama_alirankepercayaan_perempuan');
            return $builder->getWhere(['periode_uid_semester' => $periode_uid_semester])->getResultArray();
        }
    }

    public function getPendudukGolDar($kd_kab = null)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        if ($kd_kab === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getPendudukGolDarKec($kd_kec = null)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        if ($kd_kec === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getPendudukGolDarDes($kd_des = null)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        if ($kd_des === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getPendudukGolDarTahun($tahun = null)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        if ($tahun === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getPendudukGolDarPeriode($periode_uid_semester = null)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        if ($periode_uid_semester === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_goldar_a_pria, jiwa_goldar_a_perempuan, jiwa_goldar_b_pria, jiwa_goldar_b_perempuan, jiwa_goldar_ab_pria, jiwa_goldar_ab_perempuan, jiwa_goldar_o_pria, jiwa_goldar_o_perempuan, jiwa_goldar_a_plus_pria, jiwa_goldar_a_plus_perempuan, jiwa_goldar_a_minus_pria, jiwa_goldar_a_minus_perempuan, jiwa_goldar_b_plus_pria, jiwa_goldar_b_plus_perempuan, jiwa_goldar_b_minus_pria, jiwa_goldar_b_minus_perempuan, jiwa_goldar_ab_plus_pria, jiwa_goldar_ab_plus_perempuan, jiwa_goldar_ab_minus_pria, jiwa_goldar_ab_minus_perempuan, jiwa_goldar_o_plus_pria, jiwa_goldar_o_plus_perempuan, jiwa_goldar_o_minus_pria, jiwa_goldar_o_minus_perempuan, jiwa_goldar_tidaktau_pria, jiwa_goldar_tidaktau_perempuan');
            return $builder->getWhere(['periode_uid_semester' => $periode_uid_semester])->getResultArray();
        }
    }

    public function getPendudukJnsKelamin($kd_kab = null)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        if ($kd_kab === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getPendudukJnsKelaminKec($kd_kec = null)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        if ($kd_kec === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getPendudukJnsKelaminDes($kd_des = null)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        if ($kd_des === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getPendudukJnsKelaminTahun($tahun = null)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        if ($tahun === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getPendudukJnsKelaminPeriode($periode_uid_semester = null)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        if ($periode_uid_semester === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_pria, jiwa_perempuan');
            return $builder->getWhere(['periode_uid_semester' => $periode_uid_semester])->getResultArray();
        }
    }

    public function getPendudukKelompokUsia($kd_kab = null)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        if ($kd_kab === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getPendudukKelompokUsiaKec($kd_kec = null)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        if ($kd_kec === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getPendudukKelompokUsiaDes($kd_des = null)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        if ($kd_des === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getPendudukKelompokUsiaTahun($tahun = null)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        if ($tahun === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getPendudukKelompokUsiaPeriode($periode_uid_semester = null)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        if ($periode_uid_semester === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jw_l_4, jw_p_4, jw_l_9, jw_p_9, jw_l_14, jw_p_14, jw_l_19, jw_p_19, jw_l_24, jw_p_24, jw_l_29, jw_p_29, jw_l_34, jw_p_34, jw_l_39, jw_p_39, jw_l_44, jw_p_44, jw_l_49, jw_p_49, jw_l_54, jw_p_54, jw_l_59, jw_p_59, jw_l_64, jw_p_64, jw_l_69, jw_p_69, jw_l_74, jw_p_74, jw_l_75, jw_p_75');
            return $builder->getWhere(['periode_uid_semester' => $periode_uid_semester])->getResultArray();
        }
    }

    public function getPendudukKepemilikanKK($kd_kab = null)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        if ($kd_kab === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getPendudukKepemilikanKKKec($kd_kec = null)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        if ($kd_kec === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getPendudukKepemilikanKKDes($kd_des = null)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        if ($kd_des === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getPendudukKepemilikanKKTahun($tahun = null)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        if ($tahun === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getPendudukKepemilikanKKPeriode($periode_uid_semester = null)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        if ($periode_uid_semester === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pria, kk_perempuan, kk_kepemilikankk_pria, kk_kepemilikankk_perempuan');
            return $builder->getWhere(['periode_uid_semester' => $periode_uid_semester])->getResultArray();
        }
    }

    public function getPendudukPekerjaan($kd_kab = null)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        if ($kd_kab === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getPendudukPekerjaanKec($kd_kec = null)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        if ($kd_kec === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getPendudukPekerjaanDes($kd_des = null)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        if ($kd_des === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getPendudukPekerjaanTahun($tahun = null)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        if ($tahun === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getPendudukPekerjaanPeriode($periode_uid_semester = null)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        if ($periode_uid_semester === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, jiwa_kerja_pendudukan_belum_tidakbekerja_pria, jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan, jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria, jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan, jiwa_kerja_pendudukan_pelajar_mahasiswa_pria, jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan, jiwa_kerja_pendudukan_pensiunan_pria, jiwa_kerja_pendudukan_pensiunan_perempuan, jiwa_kerja_pendudukan_pns_pria, jiwa_kerja_pendudukan_pns_perempuan, jiwa_kerja_pendudukan_tni_pria, jiwa_kerja_pendudukan_tni_perempuan, jiwa_kerja_pendudukan_polri_pria, jiwa_kerja_pendudukan_polri_perempuan, jiwa_kerja_pendudukan_perdagangan_pria, jiwa_kerja_pendudukan_perdagangan_perempuan, jiwa_kerja_pendudukan_petanipekebun_pria, jiwa_kerja_pendudukan_petanipekebun_perempuan, jiwa_kerja_pendudukan_peternak_pria, jiwa_kerja_pendudukan_peternak_perempuan');
            return $builder->getWhere(['periode_uid_semester' => $periode_uid_semester])->getResultArray();
        }
    }

    public function getPendudukPendidikan($kd_kab = null)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        if ($kd_kab === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getPendudukPendidikanKec($kd_kec = null)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        if ($kd_kec === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getPendudukPendidikanDes($kd_des = null)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        if ($kd_des === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getPendudukPendidikanTahun($tahun = null)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        if ($tahun === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getPendudukPendidikanPeriode($periode_uid_semester = null)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        if ($periode_uid_semester === null) {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, periode_uid_semester, kd_wilayah, kk_pendidikan_belum_tidaksekolah_pria, kk_pendidikan_belum_tidaksekolah_perempuan, kk_pendidikan_belumtamatsd_sederajat_pria, kk_pendidikan_belumtamatsd_sederajat_perempuan, kk_pendidikan_tamatsd_sederajat_pria, kk_pendidikan_tamatsd_sederajat_perempuan, kk_pendidikan_sltp_sederajat_pria, kk_pendidikan_sltp_sederajat_perempuan, kk_pendidikan_slta_sederajat_pria, kk_pendidikan_slta_sederajat_perempuan, kk_pendidikan_diploma_1_2_pria, kk_pendidikan_diploma_1_2_perempuan, kk_pendidikan_akademi_diploma_3_smuda_pria, kk_pendidikan_akademi_diploma_3_smuda_perempuan, kk_pendidikan_diploma_4_strata_1_pria, kk_pendidikan_diploma_4_strata_1_perempuan, kk_pendidikan_strata2_pria, kk_pendidikan_strata2_perempuan, kk_pendidikan_strata3_pria, kk_pendidikan_strata3_perempuan');
            return $builder->getWhere(['periode_uid_semester' => $periode_uid_semester])->getResultArray();
        }
    }

    public function getBumdes($kd_kab = null)
    {
        if ($kd_kab === null) {
            $builder = $this->db->table('bumdes');
            $builder->select('tahun, kd_wilayah, nm_bumdes, klasifikasi');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('bumdes');
            $builder->select('tahun, kd_wilayah, nm_bumdes, klasifikasi');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getBumdesKec($kd_kec = null)
    {
        if ($kd_kec === null) {
            $builder = $this->db->table('bumdes');
            $builder->select('tahun, kd_wilayah, nm_bumdes, klasifikasi');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('bumdes');
            $builder->select('tahun, kd_wilayah, nm_bumdes, klasifikasi');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getBumdesDes($kd_des = null)
    {
        if ($kd_des === null) {
            $builder = $this->db->table('bumdes');
            $builder->select('tahun, kd_wilayah, nm_bumdes, klasifikasi');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('bumdes');
            $builder->select('tahun, kd_wilayah, nm_bumdes, klasifikasi');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getBumdesTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('bumdes');
            $builder->select('tahun, kd_wilayah, nm_bumdes, klasifikasi');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('bumdes');
            $builder->select('tahun, kd_wilayah, nm_bumdes, klasifikasi');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getKsht_posyandu($kd_kab = null)
    {
        if ($kd_kab === null) {
            $builder = $this->db->table('ksht_posyandu');
            $builder->select('tahun, kd_wilayah, nama_posyandu, jml_kader, strata_posyandu');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('ksht_posyandu');
            $builder->select('tahun, kd_wilayah, nama_posyandu, jml_kader, strata_posyandu');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getKsht_posyanduKec($kd_kec = null)
    {
        if ($kd_kec === null) {
            $builder = $this->db->table('ksht_posyandu');
            $builder->select('tahun, kd_wilayah, nama_posyandu, jml_kader, strata_posyandu');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('ksht_posyandu');
            $builder->select('tahun, kd_wilayah, nama_posyandu, jml_kader, strata_posyandu');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getKsht_posyanduDes($kd_des = null)
    {
        if ($kd_des === null) {
            $builder = $this->db->table('ksht_posyandu');
            $builder->select('tahun, kd_wilayah, nama_posyandu, jml_kader, strata_posyandu');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('ksht_posyandu');
            $builder->select('tahun, kd_wilayah, nama_posyandu, jml_kader, strata_posyandu');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getKsht_posyanduTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('ksht_posyandu');
            $builder->select('tahun, kd_wilayah, nama_posyandu, jml_kader, strata_posyandu');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('ksht_posyandu');
            $builder->select('tahun, kd_wilayah, nama_posyandu, jml_kader, strata_posyandu');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getDtksBab($kd_kab = null)
    {
        if ($kd_kab === null) {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getDtksBabKec($kd_kec = null)
    {
        if ($kd_kec === null) {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getDtksBabDes($kd_des = null)
    {
        if ($kd_des === null) {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getDtksBabdtks_version($dtks_version = null)
    {
        if ($dtks_version === null) {
            $builder = $this->db->table('dtks_bab');
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_bab');
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['dtks_version' => $dtks_version])->getResultArray();
        }
    }

    public function getDtksBabpenetapan($penetapan = null)
    {
        if ($penetapan === null) {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['penetapan' => $penetapan])->getResultArray();
        }
    }

    public function getDtksBabTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_bab');
            $builder->select('tahun, kd_wilayah, milik_sendiri, bersama, umum, tidak_ada, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getDtksdesilart($kd_kab = null)
    {
        if ($kd_kab === null) {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getDtksdesilartKec($kd_kec = null)
    {
        if ($kd_kec === null) {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getDtksdesilartDes($kd_des = null)
    {
        if ($kd_des === null) {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getDtksdesilartdtks_version($dtks_version = null)
    {
        if ($dtks_version === null) {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['dtks_version' => $dtks_version])->getResultArray();
        }
    }

    public function getDtksdesilartpenetapan($penetapan = null)
    {
        if ($penetapan === null) {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['penetapan' => $penetapan])->getResultArray();
        }
    }

    public function getDtksdesilartTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilart');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getDtksdesilkrt($kd_kab = null)
    {
        if ($kd_kab === null) {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getDtksdesilkrtKec($kd_kec = null)
    {
        if ($kd_kec === null) {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getDtksdesilkrtDes($kd_des = null)
    {
        if ($kd_des === null) {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getDtksdesilkrtdtks_version($dtks_version = null)
    {
        if ($dtks_version === null) {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['dtks_version' => $dtks_version])->getResultArray();
        }
    }

    public function getDtksdesilkrtpenetapan($penetapan = null)
    {
        if ($penetapan === null) {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['penetapan' => $penetapan])->getResultArray();
        }
    }

    public function getDtksdesilkrtTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_desilkrt');
            $builder->select('tahun, kd_wilayah, desil1, desil2, desil3, desil4, desil4plus, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getDtksmasak($kd_kab = null)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kd_kab === null) {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getDtksmasakKec($kd_kec = null)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kd_kec === null) {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getDtksmasakDes($kd_des = null)
    {
        $builder = $this->db->table('dtks_masak');
        if ($kd_des === null) {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getDtksmasakdtks_version($dtks_version = null)
    {
        $builder = $this->db->table('dtks_masak');
        if ($dtks_version === null) {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['dtks_version' => $dtks_version])->getResultArray();
        }
    }

    public function getDtksmasakpenetapan($penetapan = null)
    {
        $builder = $this->db->table('dtks_masak');
        if ($penetapan === null) {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['penetapan' => $penetapan])->getResultArray();
        }
    }

    public function getDtksmasakTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('dtks_masak');
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_masak');
            $builder->select('tahun, kd_wilayah, listrik_gas, minyak_tanah, briket_arang_kayu, tidak_memasak, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getDtksminum($kd_kab = null)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kd_kab === null) {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getDtksminumKec($kd_kec = null)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kd_kec === null) {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getDtksminumDes($kd_des = null)
    {
        $builder = $this->db->table('dtks_minum');
        if ($kd_des === null) {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getDtksminumdtks_version($dtks_version = null)
    {
        $builder = $this->db->table('dtks_minum');
        if ($dtks_version === null) {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['dtks_version' => $dtks_version])->getResultArray();
        }
    }

    public function getDtksminumpenetapan($penetapan = null)
    {
        $builder = $this->db->table('dtks_minum');
        if ($penetapan === null) {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['penetapan' => $penetapan])->getResultArray();
        }
    }

    public function getDtksminumTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('dtks_minum');
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_minum');
            $builder->select('tahun, kd_wilayah, air_kemasan, air_ledeng, sumber_terlindung, sumber_takterlindung, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getDtkspenerangan($kd_kab = null)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kd_kab === null) {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getDtkspeneranganKec($kd_kec = null)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kd_kec === null) {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getDtkspeneranganDes($kd_des = null)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($kd_des === null) {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getDtkspenerangandtks_version($dtks_version = null)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($dtks_version === null) {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['dtks_version' => $dtks_version])->getResultArray();
        }
    }

    public function getDtkspeneranganpenetapan($penetapan = null)
    {
        $builder = $this->db->table('dtks_penerangan');
        if ($penetapan === null) {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['penetapan' => $penetapan])->getResultArray();
        }
    }

    public function getDtkspeneranganTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('dtks_penerangan');
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_penerangan');
            $builder->select('tahun, kd_wilayah, pln, nonpln, bukan_listrik, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getDtkstinggal($kd_kab = null)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kd_kab === null) {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getDtkstinggalKec($kd_kec = null)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kd_kec === null) {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getDtkstinggalDes($kd_des = null)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($kd_des === null) {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getDtkstinggaldtks_version($dtks_version = null)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($dtks_version === null) {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['dtks_version' => $dtks_version])->getResultArray();
        }
    }

    public function getDtkstinggalpenetapan($penetapan = null)
    {
        $builder = $this->db->table('dtks_tinggal');
        if ($penetapan === null) {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['penetapan' => $penetapan])->getResultArray();
        }
    }

    public function getDtkstinggalTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('dtks_tinggal');
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_tinggal');
            $builder->select('tahun, kd_wilayah, milik_sendiri, kontrak, beban_sewa, dinas, lainnya, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getDtksdisabilitas($kd_kab = null)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kd_kab === null) {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getDtksdisabilitasKec($kd_kec = null)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kd_kec === null) {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getDtksdisabilitasDes($kd_des = null)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($kd_des === null) {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getDtksdisabilitasdtks_version($dtks_version = null)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($dtks_version === null) {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['dtks_version' => $dtks_version])->getResultArray();
        }
    }

    public function getDtksdisabilitaspenetapan($penetapan = null)
    {
        $builder = $this->db->table('dtks_disabilitas');
        if ($penetapan === null) {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['penetapan' => $penetapan])->getResultArray();
        }
    }

    public function getDtksdisabilitasTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('dtks_disabilitas');
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('dtks_disabilitas');
            $builder->select('tahun, kd_wilayah, normal, daksa, netra, rungu, wicara, rungu_wicara, netra_daksa, netra_rungu_wicara, rungu_wicara_daksa, rungu_netra_wicara_daksa, mental, jiwa, daksa_mental, tanpa_keterangan, grand_total, penetapan, dtks_version');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getIdm($kd_kab = null)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        if ($kd_kab === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getIdmKec($kd_kec = null)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        if ($kd_kec === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getIdmDes($kd_des = null)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        if ($kd_des === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getIdmTahun($tahun = null)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        if ($tahun === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getSosbud($kd_kab = null)
    {
        $builder = $this->db->table('sosbud_satgas');
        if ($kd_kab === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getSosbudKec($kd_kec = null)
    {
        $builder = $this->db->table('sosbud_satgas');
        if ($kd_kec === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getSosbudDes($kd_des = null)
    {
        $builder = $this->db->table('sosbud_satgas');
        if ($kd_des === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }

    public function getSosbudTahun($tahun = null)
    {
        $builder = $this->db->table('sosbud_satgas');
        if ($tahun === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }

    public function getWilKab($kd_prov = null)
    {
        $builder = $this->db->table('kd_kabupaten');
        if ($kd_prov === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['id_prov' => $kd_prov])->getResultArray();
        }
    }

    public function getWilKabByKab($kd_prov = null)
    {
        $builder = $this->db->table('kd_kabupaten');
        if ($kd_prov === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['id_kab' => $kd_prov])->getResultArray();
        }
    }

    public function getWilKec($kd_prov = null)
    {
        $builder = $this->db->table('kd_kecamatan');
        if ($kd_prov === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['id_prov' => $kd_prov])->getResultArray();
        }
    }

    public function getWilKecByKab($kd_kab = null)
    {
        $builder = $this->db->table('kd_kecamatan');
        if ($kd_kab === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['id_kab' => $kd_kab])->getResultArray();
        }
    }

    public function getWilKecByKec($kd_kec = null)
    {
        $builder = $this->db->table('kd_kecamatan');
        if ($kd_kec === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['id_kec' => $kd_kec])->getResultArray();
        }
    }

    public function getWilDes($kd_prov = null)
    {
        $builder = $this->db->table('wilayah_33');
        if ($kd_prov === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['id_prov' => $kd_prov])->getResultArray();
        }
    }

    public function getWilDesByKab($kd_kab = null)
    {
        $builder = $this->db->table('wilayah_33');
        if ($kd_kab === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['id_kab' => $kd_kab])->getResultArray();
        }
    }

    public function getWilDesByKec($kd_kec = null)
    {
        $builder = $this->db->table('wilayah_33');
        if ($kd_kec === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['id_kec' => $kd_kec])->getResultArray();
        }
    }

    public function getWilDesByDes($kd_des = null)
    {
        $builder = $this->db->table('wilayah_33');
        if ($kd_des === null) {
            return $builder->get()->getResultArray();
        } else {
            return $builder->getWhere(['id_desa' => $kd_des])->getResultArray();
        }
    }
}
