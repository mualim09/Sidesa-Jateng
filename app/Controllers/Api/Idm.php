<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Sidesa\Api_model;

class Idm extends BaseController
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
            $idm = $this->Api_model->getIdm();
        } else if ($kd_kab != null) {
            $idm = $this->Api_model->getIdm($kd_kab);
        } else if ($kd_kec != null) {
            $idm = $this->Api_model->getIdmKec($kd_kec);
        } else if ($tahun != null) {
            $idm = $this->Api_model->getIdmTahun($tahun);
        }

        if ($idm != null) {
            return $this->respond(['status' => true, 'data' => $idm]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
