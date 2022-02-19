<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Penduduk_gol_darah extends BaseController
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
            $penduduk_gol_darah = $this->Api_model->getPendudukGolDar();
        } else if ($kd_kab != null) {
            $penduduk_gol_darah = $this->Api_model->getPendudukGolDar($kd_kab);
        } else if ($kd_kec != null) {
            $penduduk_gol_darah = $this->Api_model->getPendudukGolDarKec($kd_kec);
        } else if ($kd_des != null) {
            $penduduk_gol_darah = $this->Api_model->getPendudukGolDarDes($kd_des);
        } else if ($tahun != null) {
            $penduduk_gol_darah = $this->Api_model->getPendudukGolDarTahun($tahun);
        } else if ($periode_uid_semester != null) {
            $penduduk_gol_darah = $this->Api_model->getPendudukGolDarPeriode($periode_uid_semester);
        }

        if ($penduduk_gol_darah != null) {
            return $this->respond(['status' => true, 'data' => $penduduk_gol_darah]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
