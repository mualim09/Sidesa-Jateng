<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Penduduk_agama extends BaseController
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
            $penduduk_agama = $this->Api_model->getPendudukAgama();
        } else if ($kd_kab != null) {
            $penduduk_agama = $this->Api_model->getPendudukAgama($kd_kab);
        } else if ($kd_kec != null) {
            $penduduk_agama = $this->Api_model->getPendudukAgamaKec($kd_kec);
        } else if ($kd_des != null) {
            $penduduk_agama = $this->Api_model->getPendudukAgamaDes($kd_des);
        } else if ($tahun != null) {
            $penduduk_agama = $this->Api_model->getPendudukAgamaTahun($tahun);
        } else if ($periode_uid_semester != null) {
            $penduduk_agama = $this->Api_model->getPendudukAgamaPeriode($periode_uid_semester);
        }

        if ($penduduk_agama != null) {
            return $this->respond(['status' => true, 'data' => $penduduk_agama]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
