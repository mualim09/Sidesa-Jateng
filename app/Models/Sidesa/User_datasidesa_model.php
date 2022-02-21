<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class User_datasidesa_model extends Model
{
    protected $table = 'sidesa_review_data';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['nm_data', 'totalrow', 'tahundata'];

    public function getData()
    {
        return $this->findAll();
    }

    public function download_penduduk_agama_I_2020($semester, $tanggalupload) ////////////////////////// PENDUDUK AGAMA
    {
        $builder = $this->db->table('penduduk_agama');
        $builder->join('wilayah_33', 'penduduk_agama.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_agama.tahun', $tanggalupload);
        $builder->where('penduduk_agama.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_agama_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_agama');
        $builder->join('wilayah_33', 'penduduk_agama.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_agama.tahun', $tanggalupload);
        $builder->where('penduduk_agama.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_agama_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_agama');
        $builder->join('wilayah_33', 'penduduk_agama.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_agama.tahun', $tanggalupload);
        $builder->where('penduduk_agama.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_agama_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_agama');
        $builder->join('wilayah_33', 'penduduk_agama.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_agama.tahun', $tanggalupload);
        $builder->where('penduduk_agama.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_agama_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_agama');
        $builder->join('wilayah_33', 'penduduk_agama.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_agama.tahun', $tanggalupload);
        $builder->where('penduduk_agama.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_agama_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_agama');
        $builder->join('wilayah_33', 'penduduk_agama.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_agama.tahun', $tanggalupload);
        $builder->where('penduduk_agama.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_agama_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_agama');
        $builder->join('wilayah_33', 'penduduk_agama.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_agama.tahun', $tanggalupload);
        $builder->where('penduduk_agama.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_darah_I_2020($semester, $tanggalupload) ///////////////////PENDUDUK GOLONGAN DARAH
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $builder->join('wilayah_33', 'penduduk_gol_darah.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_gol_darah.tahun', $tanggalupload);
        $builder->where('penduduk_gol_darah.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_darah_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $builder->join('wilayah_33', 'penduduk_gol_darah.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_gol_darah.tahun', $tanggalupload);
        $builder->where('penduduk_gol_darah.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_darah_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $builder->join('wilayah_33', 'penduduk_gol_darah.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_gol_darah.tahun', $tanggalupload);
        $builder->where('penduduk_gol_darah.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_darah_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $builder->join('wilayah_33', 'penduduk_gol_darah.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_gol_darah.tahun', $tanggalupload);
        $builder->where('penduduk_gol_darah.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_darah_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $builder->join('wilayah_33', 'penduduk_gol_darah.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_gol_darah.tahun', $tanggalupload);
        $builder->where('penduduk_gol_darah.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_darah_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $builder->join('wilayah_33', 'penduduk_gol_darah.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_gol_darah.tahun', $tanggalupload);
        $builder->where('penduduk_gol_darah.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_darah_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_gol_darah');
        $builder->join('wilayah_33', 'penduduk_gol_darah.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_gol_darah.tahun', $tanggalupload);
        $builder->where('penduduk_gol_darah.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_kelamin_I_2020($semester, $tanggalupload) ///////////////////PENDUDUK KELAMIN
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $builder->join('wilayah_33', 'penduduk_jns_kelamin.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_jns_kelamin.tahun', $tanggalupload);
        $builder->where('penduduk_jns_kelamin.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_kelamin_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $builder->join('wilayah_33', 'penduduk_jns_kelamin.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_jns_kelamin.tahun', $tanggalupload);
        $builder->where('penduduk_jns_kelamin.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_kelamin_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $builder->join('wilayah_33', 'penduduk_jns_kelamin.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_jns_kelamin.tahun', $tanggalupload);
        $builder->where('penduduk_jns_kelamin.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_kelamin_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $builder->join('wilayah_33', 'penduduk_jns_kelamin.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_jns_kelamin.tahun', $tanggalupload);
        $builder->where('penduduk_jns_kelamin.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_kelamin_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $builder->join('wilayah_33', 'penduduk_jns_kelamin.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_jns_kelamin.tahun', $tanggalupload);
        $builder->where('penduduk_jns_kelamin.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_kelamin_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $builder->join('wilayah_33', 'penduduk_jns_kelamin.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_jns_kelamin.tahun', $tanggalupload);
        $builder->where('penduduk_jns_kelamin.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_kelamin_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_jns_kelamin');
        $builder->join('wilayah_33', 'penduduk_jns_kelamin.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_jns_kelamin.tahun', $tanggalupload);
        $builder->where('penduduk_jns_kelamin.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_usia_I_2020($semester, $tanggalupload) ///////////////////PENDUDUK USIA
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $builder->join('wilayah_33', 'penduduk_kelompok_usia.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kelompok_usia.tahun', $tanggalupload);
        $builder->where('penduduk_kelompok_usia.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_usia_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $builder->join('wilayah_33', 'penduduk_kelompok_usia.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kelompok_usia.tahun', $tanggalupload);
        $builder->where('penduduk_kelompok_usia.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_usia_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $builder->join('wilayah_33', 'penduduk_kelompok_usia.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kelompok_usia.tahun', $tanggalupload);
        $builder->where('penduduk_kelompok_usia.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_usia_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $builder->join('wilayah_33', 'penduduk_kelompok_usia.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kelompok_usia.tahun', $tanggalupload);
        $builder->where('penduduk_kelompok_usia.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_usia_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $builder->join('wilayah_33', 'penduduk_kelompok_usia.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kelompok_usia.tahun', $tanggalupload);
        $builder->where('penduduk_kelompok_usia.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_usia_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $builder->join('wilayah_33', 'penduduk_kelompok_usia.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kelompok_usia.tahun', $tanggalupload);
        $builder->where('penduduk_kelompok_usia.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_usia_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kelompok_usia');
        $builder->join('wilayah_33', 'penduduk_kelompok_usia.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kelompok_usia.tahun', $tanggalupload);
        $builder->where('penduduk_kelompok_usia.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_KK_I_2020($semester, $tanggalupload) ///////////////////PENDUDUK KK
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $builder->join('wilayah_33', 'penduduk_kepemilikan_kk.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kepemilikan_kk.tahun', $tanggalupload);
        $builder->where('penduduk_kepemilikan_kk.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_KK_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $builder->join('wilayah_33', 'penduduk_kepemilikan_kk.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kepemilikan_kk.tahun', $tanggalupload);
        $builder->where('penduduk_kepemilikan_kk.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_KK_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $builder->join('wilayah_33', 'penduduk_kepemilikan_kk.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kepemilikan_kk.tahun', $tanggalupload);
        $builder->where('penduduk_kepemilikan_kk.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_KK_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $builder->join('wilayah_33', 'penduduk_kepemilikan_kk.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kepemilikan_kk.tahun', $tanggalupload);
        $builder->where('penduduk_kepemilikan_kk.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_KK_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $builder->join('wilayah_33', 'penduduk_kepemilikan_kk.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kepemilikan_kk.tahun', $tanggalupload);
        $builder->where('penduduk_kepemilikan_kk.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_KK_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $builder->join('wilayah_33', 'penduduk_kepemilikan_kk.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kepemilikan_kk.tahun', $tanggalupload);
        $builder->where('penduduk_kepemilikan_kk.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_KK_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_kepemilikan_kk');
        $builder->join('wilayah_33', 'penduduk_kepemilikan_kk.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_kepemilikan_kk.tahun', $tanggalupload);
        $builder->where('penduduk_kepemilikan_kk.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pekerjaan_I_2020($semester, $tanggalupload) ///////////////////PENDUDUK PEKERJAAN
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $builder->join('wilayah_33', 'penduduk_pekerjaan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pekerjaan.tahun', $tanggalupload);
        $builder->where('penduduk_pekerjaan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pekerjaan_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $builder->join('wilayah_33', 'penduduk_pekerjaan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pekerjaan.tahun', $tanggalupload);
        $builder->where('penduduk_pekerjaan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pekerjaan_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $builder->join('wilayah_33', 'penduduk_pekerjaan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pekerjaan.tahun', $tanggalupload);
        $builder->where('penduduk_pekerjaan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pekerjaan_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $builder->join('wilayah_33', 'penduduk_pekerjaan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pekerjaan.tahun', $tanggalupload);
        $builder->where('penduduk_pekerjaan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pekerjaan_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $builder->join('wilayah_33', 'penduduk_pekerjaan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pekerjaan.tahun', $tanggalupload);
        $builder->where('penduduk_pekerjaan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pekerjaan_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $builder->join('wilayah_33', 'penduduk_pekerjaan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pekerjaan.tahun', $tanggalupload);
        $builder->where('penduduk_pekerjaan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pekerjaan_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pekerjaan');
        $builder->join('wilayah_33', 'penduduk_pekerjaan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pekerjaan.tahun', $tanggalupload);
        $builder->where('penduduk_pekerjaan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pendidikan_I_2020($semester, $tanggalupload) ///////////////////PENDUDUK PENDIDIKAN
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $builder->join('wilayah_33', 'penduduk_pendidikan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pendidikan.tahun', $tanggalupload);
        $builder->where('penduduk_pendidikan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pendidikan_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $builder->join('wilayah_33', 'penduduk_pendidikan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pendidikan.tahun', $tanggalupload);
        $builder->where('penduduk_pendidikan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pendidikan_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $builder->join('wilayah_33', 'penduduk_pendidikan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pendidikan.tahun', $tanggalupload);
        $builder->where('penduduk_pendidikan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pendidikan_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $builder->join('wilayah_33', 'penduduk_pendidikan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pendidikan.tahun', $tanggalupload);
        $builder->where('penduduk_pendidikan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pendidikan_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $builder->join('wilayah_33', 'penduduk_pendidikan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pendidikan.tahun', $tanggalupload);
        $builder->where('penduduk_pendidikan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pendidikan_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $builder->join('wilayah_33', 'penduduk_pendidikan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pendidikan.tahun', $tanggalupload);
        $builder->where('penduduk_pendidikan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_penduduk_pendidikan_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('penduduk_pendidikan');
        $builder->join('wilayah_33', 'penduduk_pendidikan.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('penduduk_pendidikan.tahun', $tanggalupload);
        $builder->where('penduduk_pendidikan.periode_uid_semester', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_I_2020($semester, $tanggalupload) ///////////////////DTKS dtks_bab
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_II_2020($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_III_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_IV_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_III_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_IV_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_III_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_bab_IV_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_bab');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_I_2020($semester, $tanggalupload) ///////////////////DTKS dtks_desilart
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_II_2020($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_III_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_IV_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_III_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_IV_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_III_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilart_IV_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilart');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_I_2020($semester, $tanggalupload) ///////////////////DTKS dtks_desilkrt
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_II_2020($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_III_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_IV_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_III_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_IV_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_III_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_desilkrt_IV_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_desilkrt');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_I_2020($semester, $tanggalupload) ///////////////////DTKS dtks_masak
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_II_2020($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_III_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_IV_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_III_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_IV_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_III_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_masak_IV_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_masak');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_I_2020($semester, $tanggalupload) ///////////////////DTKS dtks_minum
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_II_2020($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_III_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_IV_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_III_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_IV_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_III_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_minum_IV_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_minum');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_I_2020($semester, $tanggalupload) ///////////////////DTKS dtks_penerangan
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_II_2020($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_III_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_IV_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_III_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_IV_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_III_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_penerangan_IV_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_penerangan');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_I_2020($semester, $tanggalupload) ///////////////////DTKS dtks_tinggal
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_II_2020($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_III_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_IV_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_III_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_IV_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_III_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_tinggal_IV_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_tinggal');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_I_2020($semester, $tanggalupload) ///////////////////DTKS disabILITAS
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_II_2020($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_I_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_II_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_III_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_IV_2021($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_I_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_II_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_III_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_IV_2022($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_I_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_II_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_III_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_dtks_disabilitas_IV_2023($semester, $tanggalupload)
    {
        $builder = $this->db->table('dtks_disabilitas');
        $builder->where('tahun', $tanggalupload);
        $builder->where('dtks_version', $semester);
        return $builder->get()->getResult();
    }

    public function download_indeks_desa_membangun_2019($tanggalupload) /////////////////// IDM
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->join('wilayah_33', 'indeks_desa_membangun.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_indeks_desa_membangun_2020($tanggalupload)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->join('wilayah_33', 'indeks_desa_membangun.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_indeks_desa_membangun_2021($tanggalupload)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->join('wilayah_33', 'indeks_desa_membangun.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_indeks_desa_membangun_2022($tanggalupload)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->join('wilayah_33', 'indeks_desa_membangun.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_indeks_desa_membangun_2023($tanggalupload)
    {
        $builder = $this->db->table('indeks_desa_membangun');
        $builder->join('wilayah_33', 'indeks_desa_membangun.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bumdes_2019($tanggalupload) ///////////////////////////////////////////////////////////////// BUMDES
    {
        $builder = $this->db->table('bumdes');
        $builder->join('wilayah_33', 'bumdes.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bumdes_2020($tanggalupload)
    {
        $builder = $this->db->table('bumdes');
        $builder->join('wilayah_33', 'bumdes.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bumdes_2021($tanggalupload)
    {
        $builder = $this->db->table('bumdes');
        $builder->join('wilayah_33', 'bumdes.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bumdes_2022($tanggalupload)
    {
        $builder = $this->db->table('bumdes');
        $builder->join('wilayah_33', 'bumdes.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bumdes_2023($tanggalupload)
    {
        $builder = $this->db->table('bumdes');
        $builder->join('wilayah_33', 'bumdes.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_ksht_posyandu_2020($tanggalupload) ////////////////////////////////////////////////////////////////// KSHT POSYANDU
    {
        $builder = $this->db->table('ksht_posyandu');
        $builder->join('wilayah_33', 'ksht_posyandu.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_ksht_posyandu_2021($tanggalupload)
    {
        $builder = $this->db->table('ksht_posyandu');
        $builder->join('wilayah_33', 'ksht_posyandu.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_ksht_posyandu_2022($tanggalupload)
    {
        $builder = $this->db->table('ksht_posyandu');
        $builder->join('wilayah_33', 'ksht_posyandu.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_ksht_posyandu_2023($tanggalupload)
    {
        $builder = $this->db->table('ksht_posyandu');
        $builder->join('wilayah_33', 'ksht_posyandu.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_sosbud_satgas_2019($tanggalupload) //////////////////////////////////////////////////////////////// SOSBUD SATGAS
    {
        $builder = $this->db->table('sosbud_satgas');
        $builder->join('wilayah_33', 'sosbud_satgas.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_sosbud_satgas_2020($tanggalupload)
    {
        $builder = $this->db->table('sosbud_satgas');
        $builder->join('wilayah_33', 'sosbud_satgas.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_sosbud_satgas_2021($tanggalupload)
    {
        $builder = $this->db->table('sosbud_satgas');
        $builder->join('wilayah_33', 'sosbud_satgas.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_sosbud_satgas_2022($tanggalupload)
    {
        $builder = $this->db->table('sosbud_satgas');
        $builder->join('wilayah_33', 'sosbud_satgas.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_sosbud_satgas_2023($tanggalupload)
    {
        $builder = $this->db->table('sosbud_satgas');
        $builder->join('wilayah_33', 'sosbud_satgas.kd_wilayah=wilayah_33.id_desa', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2013($tanggalupload) //////////////////////////////////////////////////////////////// SOSBUD SATGAS
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2014($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2015($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2016($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2017($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2018($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2019($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2020($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2021($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2022($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2023($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2024($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }

    public function download_bankeu_tersalurkan_2025($tanggalupload)
    {
        $builder = $this->db->table('bankeu_salur');
        $builder->join('kd_kabupaten', 'bankeu_salur.kd_wilayah=kd_kabupaten.id_kab', 'left');
        $builder->where('tahun', $tanggalupload);
        return $builder->get()->getResult();
    }
}
