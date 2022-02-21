<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Sosbud_satgas extends BaseController
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
            $sosbud = $this->Api_model->getSosbud();
        } else if ($kd_kab != null) {
            $sosbud = $this->Api_model->getSosbud($kd_kab);
        } else if ($kd_kec != null) {
            $sosbud = $this->Api_model->getSosbudKec($kd_kec);
        } else if ($tahun != null) {
            $sosbud = $this->Api_model->getSosbudTahun($tahun);
        }

        if ($sosbud != null) {
            return $this->respond(['status' => true, 'data' => $sosbud]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
