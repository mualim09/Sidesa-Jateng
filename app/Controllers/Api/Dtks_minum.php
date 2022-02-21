<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Dtks_minum extends BaseController
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
            $dtks_minum = $this->Api_model->getDtksminum();
        } else if ($kd_kab != null) {
            $dtks_minum = $this->Api_model->getDtksminum($kd_kab);
        } else if ($kd_kec != null) {
            $dtks_minum = $this->Api_model->getDtksminumKec($kd_kec);
        } else if ($kd_des != null) {
            $dtks_minum = $this->Api_model->getDtksminumDes($kd_des);
        } else if ($penetapan != null) {
            $dtks_minum = $this->Api_model->getDtksminumpenetapan($penetapan);
        } else if ($dtks_version != null) {
            $dtks_minum = $this->Api_model->getDtksminumdtks_version($dtks_version);
        } else if ($tahun != null) {
            $dtks_minum = $this->Api_model->getDtksminumTahun($tahun);
        }

        if ($dtks_minum != null) {
            return $this->respond(['status' => true, 'data' => $dtks_minum]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
