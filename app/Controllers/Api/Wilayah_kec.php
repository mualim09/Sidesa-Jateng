<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Wilayah_kec extends BaseController
{
    use ResponseTrait;
    protected $Api_model;

    public function __construct()
    {
        $this->Api_model = new Api_model();
    }

    public function index()
    {
        $kd_prov = $this->request->getGet('kd_prov');
        $kd_kab = $this->request->getGet('kd_kab');
        $kd_kec = $this->request->getGet('kd_kec');
        if ($kd_prov === null && $kd_kab === null && $kd_kec === null) {
            $wilayah_kecamatan = $this->Api_model->getWilKec();
        } else if ($kd_prov != null) {
            $wilayah_kecamatan = $this->Api_model->getWilKec($kd_prov);
        } else if ($kd_kab != null) {
            $wilayah_kecamatan = $this->Api_model->getWilKecByKab($kd_kab);
        } else {
            $wilayah_kecamatan = $this->Api_model->getWilKecByKec($kd_kec);
        }

        if ($wilayah_kecamatan != null) {
            return $this->respond(['status' => true, 'data' => $wilayah_kecamatan]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
