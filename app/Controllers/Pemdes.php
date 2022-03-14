<?php

namespace App\Controllers;

class Pemdes extends BaseController
{
    function login($kode)
    {
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Data',
            'page_title' => view('sidesa/layout/pemdes/page-title', ['title' => 'Kecamatan ' . $whoiskec . ", Desa " . $whoisdes, 'li_1' => 'Menu', 'li_2' => 'Home']),
            'kodedes' => $kode,
            'datades' => $this->db->table('dashboard_desa')->getWhere(['kodedes' => substr($kode, 0, 13)])->getRowArray(),
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];

        return view('sidesa/pemdes/login', $data);
    }
}
