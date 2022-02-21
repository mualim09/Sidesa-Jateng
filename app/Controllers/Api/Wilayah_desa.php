<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Wilayah_desa extends BaseController
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
        $kd_des = $this->request->getGet('kd_des');
        if ($kd_prov === null && $kd_kab === null && $kd_kec === null && $kd_des === null) {
            $wilayah_desa = $this->Api_model->getWilDes();
        } else if ($kd_prov != null) {
            $wilayah_desa = $this->Api_model->getWilDes($kd_prov);
        } else if ($kd_kab != null) {
            $wilayah_desa = $this->Api_model->getWilDesByKab($kd_kab);
        } else if ($kd_kec != null) {
            $wilayah_desa = $this->Api_model->getWilDesByKec($kd_kec);
        } else {
            $wilayah_desa = $this->Api_model->getWilDesByDes($kd_des);
        }

        if ($wilayah_desa != null) {
            return $this->respond(['status' => true, 'data' => $wilayah_desa]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
