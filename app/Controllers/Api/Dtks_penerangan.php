<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Dtks_penerangan extends BaseController
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
            $dtks_penerangan = $this->Api_model->getDtkspenerangan();
        } else if ($kd_kab != null) {
            $dtks_penerangan = $this->Api_model->getDtkspenerangan($kd_kab);
        } else if ($kd_kec != null) {
            $dtks_penerangan = $this->Api_model->getDtkspeneranganKec($kd_kec);
        } else if ($kd_des != null) {
            $dtks_penerangan = $this->Api_model->getDtkspeneranganDes($kd_des);
        } else if ($penetapan != null) {
            $dtks_penerangan = $this->Api_model->getDtkspeneranganpenetapan($penetapan);
        } else if ($dtks_version != null) {
            $dtks_penerangan = $this->Api_model->getDtkspenerangandtks_version($dtks_version);
        } else if ($tahun != null) {
            $dtks_penerangan = $this->Api_model->getDtkspeneranganTahun($tahun);
        }

        if ($dtks_penerangan != null) {
            return $this->respond(['status' => true, 'data' => $dtks_penerangan]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
