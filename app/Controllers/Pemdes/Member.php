<?php

namespace App\Controllers\Pemdes;

use App\Controllers\BaseController;

class Member extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        helper('zakezone');
    }

    public function home($kode, $nik_ktp)
    {
        $this->session->remove('keyword');
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->table('pemdes_user')->getWhere(['nik_ktp' => $this->session->get('nik_ktp')])->getRowArray(),
            'page_title' => view('sidesa/layout/pemdes/content-page-title', ['title' => 'Dashboard', 'li_1' => $nik_ktp, 'li_2' => 'Dashboard']),
            'nik_ktp' => $nik_ktp,
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes,
        ];
        return view('sidesa/pemdes/member/dashboard', $data);
    }
}
