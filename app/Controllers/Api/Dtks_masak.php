<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Dtks_masak extends BaseController
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
        $penetapan = $this->request->getGet('penetapan');
        $dtks_version = $this->request->getGet('dtks_version');
        $tahun = $this->request->getGet('tahun');
        if ($kd_kab === null && $kd_kec === null && $kd_des === null && $penetapan === null && $dtks_version === null && $tahun === null) {
            $dtks_masak = $this->Api_model->getDtksmasak();
        } else if ($kd_kab != null) {
            $dtks_masak = $this->Api_model->getDtksmasak($kd_kab);
        } else if ($kd_kec != null) {
            $dtks_masak = $this->Api_model->getDtksmasakKec($kd_kec);
        } else if ($kd_des != null) {
            $dtks_masak = $this->Api_model->getDtksmasakDes($kd_des);
        } else if ($penetapan != null) {
            $dtks_masak = $this->Api_model->getDtksmasakpenetapan($penetapan);
        } else if ($dtks_version != null) {
            $dtks_masak = $this->Api_model->getDtksmasakdtks_version($dtks_version);
        } else if ($tahun != null) {
            $dtks_masak = $this->Api_model->getDtksmasakTahun($tahun);
        }

        if ($dtks_masak != null) {
            return $this->respond(['status' => true, 'data' => $dtks_masak]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
