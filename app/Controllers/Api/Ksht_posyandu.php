<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Ksht_posyandu extends BaseController
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

        if ($kd_kab === null && $kd_kec === null && $kd_des === null && $tahun === null) {
            $ksht_posyandu = $this->Api_model->getKsht_posyandu();
        } else if (isset($kd_kab)) {
            $ksht_posyandu = $this->Api_model->getKsht_posyandu($kd_kab);
        } else if (isset($kd_kec)) {
            $ksht_posyandu = $this->Api_model->getKsht_posyanduKec($kd_kec);
        } else if (isset($kd_des)) {
            $ksht_posyandu = $this->Api_model->getKsht_posyanduDes($kd_des);
        } else if (isset($tahun)) {
            $ksht_posyandu = $this->Api_model->getKsht_posyanduTahun($tahun);
        }

        if ($ksht_posyandu != null) {
            return $this->respond(['status' => true, 'data' => $ksht_posyandu]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
