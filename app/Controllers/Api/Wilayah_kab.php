<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Wilayah_kab extends BaseController
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
        $kd_prov = $this->request->getGet('kd_prov');
        if ($kd_kab === null && $kd_prov === null) {
            $wilayah_kab = $this->Api_model->getWilKab();
        } else if ($kd_prov != null) {
            $wilayah_kab = $this->Api_model->getWilKab($kd_prov);
        } else {
            $wilayah_kab = $this->Api_model->getWilKabByKab($kd_kab);
        }

        if ($wilayah_kab != null) {
            return $this->respond(['status' => true, 'data' => $wilayah_kab]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
