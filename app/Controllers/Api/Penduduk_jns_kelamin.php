<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Penduduk_jns_kelamin extends BaseController
{
    use ResponseTrait;
    protected $Api_model;

    public function __construct()
    {
        $this->Api_model = new Api_model();
    }

    public function index()
    {
        $kd_kab = $this->request->getGet('kd_kab');
        $kd_kec = $this->request->getGet('kd_kec');
        $kd_des = $this->request->getGet('kd_des');
        $tahun = $this->request->getGet('tahun');
        $periode_uid_semester = $this->request->getGet('periode_uid_semester');
        if ($kd_kab === null && $kd_kec === null && $kd_des === null && $tahun === null && $periode_uid_semester === null) {
            $penduduk_jns_kelamin = $this->Api_model->getPendudukJnsKelamin();
        } else if ($kd_kab != null) {
            $penduduk_jns_kelamin = $this->Api_model->getPendudukJnsKelamin($kd_kab);
        } else if ($kd_kec != null) {
            $penduduk_jns_kelamin = $this->Api_model->getPendudukJnsKelaminKec($kd_kec);
        } else if ($kd_des != null) {
            $penduduk_jns_kelamin = $this->Api_model->getPendudukJnsKelaminDes($kd_des);
        } else if ($tahun != null) {
            $penduduk_jns_kelamin = $this->Api_model->getPendudukJnsKelaminTahun($tahun);
        } else if ($periode_uid_semester != null) {
            $penduduk_jns_kelamin = $this->Api_model->getPendudukJnsKelaminPeriode($periode_uid_semester);
        }

        if ($penduduk_jns_kelamin != null) {
            return $this->respond(['status' => true, 'data' => $penduduk_jns_kelamin]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
