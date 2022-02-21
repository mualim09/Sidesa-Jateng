<?php

namespace App\Controllers;

use App\Models\Sidesa\Kependudukan_model;
use App\Models\Sidesa\Kesejahteraan_model;
use App\Models\Sidesa\Disabilitas_model;
use App\Models\Sidesa\Idm_model;
use App\Models\Sidesa\Bumdes_model;
use App\Models\Sidesa\Kesehatan_model;
use App\Models\Sidesa\Bankeu_model;
use App\Models\Sidesa\Sosialbudaya_model;
use App\Models\Sidesa\Kabupaten_model;

class Pemkab extends BaseController
{
    protected $Kependudukan_model;
    protected $Kesejahteraan_model;
    protected $Disabilitas_model;
    protected $Idm_model;
    protected $Bumdes_model;
    protected $Kesehatan_model;
    protected $Bankeu_model;
    protected $Sosialbudaya_model;
    protected $Kabupaten_model;

    public function __construct()
    {
        $this->Kependudukan_model = new Kependudukan_model();
        $this->Kesejahteraan_model = new Kesejahteraan_model();
        $this->Disabilitas_model = new Disabilitas_model();
        $this->Idm_model = new Idm_model();
        $this->Bumdes_model = new Bumdes_model();
        $this->Kesehatan_model = new Kesehatan_model();
        $this->Bankeu_model = new Bankeu_model();
        $this->Sosialbudaya_model = new Sosialbudaya_model();
        $this->Kabupaten_model = new Kabupaten_model();
    }

    function kabupaten($kode)
    {
        $getIdmnow = $this->Kabupaten_model->getIdmnow($kode);
        $getIdmbefore = $this->Kabupaten_model->getIdmbefore($kode);
        $getIdmbefore2 = $this->Kabupaten_model->getIdmbefore2($kode);
        // $getIdmbefore3 = $this->Kabupaten_model->getIdmbefore3($kode);

        if ($getIdmbefore2 != null) {
            foreach ($getIdmbefore2 as $item2thsblm) {
                $idm2thsblm[] = $item2thsblm->status;
            }
        } else {
            $idm2thsblm = 0;
        }
        if ($getIdmbefore != null) {
            foreach ($getIdmbefore as $itemthsblm) {
                $idmthsblm[] = $itemthsblm->status;
            }
        } else {
            $idmthsblm = 0;
        }
        if ($getIdmnow != null) {
            foreach ($getIdmnow as $itemnow) {
                $idmnowgrafik[] = $itemnow->status;
            }
        } else {
            $idmnowgrafik = 0;
        }

        if ($getIdmnow != null) {
            foreach ($getIdmnow as $itemnow) {
                $idmnow[] = $itemnow->status;
            }
            foreach ($getIdmbefore as $itembefore) {
                $idmbefore[] = $itembefore->status;
            }
        } else {
            if ($getIdmbefore != null) {
                foreach ($getIdmbefore as $itembefore) {
                    $idmnow[] = $itembefore->status;
                }
                foreach ($getIdmbefore2 as $itembefore2) {
                    $idmbefore[] = $itembefore2->status;
                }
            }
        }
        $datatahunsebelumnya = array_count_values($idmbefore);
        $datasaatini = array_count_values($idmnow);
        $nilaimandiritahunsebelumnya = isset($datatahunsebelumnya['MANDIRI']) ? $datatahunsebelumnya['MANDIRI'] : 0;
        $nilaimajutahunsebelumnya = isset($datatahunsebelumnya['MAJU']) ? $datatahunsebelumnya['MAJU'] : 0;
        $nilaiberkembangtahunsebelumnya = isset($datatahunsebelumnya['BERKEMBANG']) ? $datatahunsebelumnya['BERKEMBANG'] : 0;
        $nilaitertinggaltahunsebelumnya = isset($datatahunsebelumnya['TERTINGGAL']) ? $datatahunsebelumnya['TERTINGGAL'] : 0;
        $nilaisangattertinggaltahunsebelumnya = isset($datatahunsebelumnya['SANGAT TERTINGGAL']) ? $datatahunsebelumnya['SANGAT TERTINGGAL'] : 0;
        $nilaimandirisaatini = isset($datasaatini['MANDIRI']) ? $datasaatini['MANDIRI'] : 0;
        $nilaimajusaatini = isset($datasaatini['MAJU']) ? $datasaatini['MAJU'] : 0;
        $nilaiberkembangsaatini = isset($datasaatini['BERKEMBANG']) ? $datasaatini['BERKEMBANG'] : 0;
        $nilaitertinggalsaatini = isset($datasaatini['TERTINGGAL']) ? $datasaatini['TERTINGGAL'] : 0;
        $nilaisangattertinggalsaatini = isset($datasaatini['SANGAT TERTINGGAL']) ? $datasaatini['SANGAT TERTINGGAL'] : 0;

        $data = [
            'title' => 'Data',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Home', 'li_1' => 'Menu', 'li_2' => 'Home']),
            'kodekab' => $kode,
            'datasaatinimandiri' => $nilaimandirisaatini,
            'datasaatinimaju' => $nilaimajusaatini,
            'datasaatiniberkembang' => $nilaiberkembangsaatini,
            'datasaatinitertinggal' => $nilaitertinggalsaatini,
            'datasaatinisangattertinggal' => $nilaisangattertinggalsaatini,
            'hasilmandiri' => $nilaimandirisaatini - $nilaimandiritahunsebelumnya,
            'hasilmaju' => $nilaimajusaatini - $nilaimajutahunsebelumnya,
            'hasilberkembang' => $nilaiberkembangsaatini - $nilaiberkembangtahunsebelumnya,
            'hasiltertinggal' => $nilaitertinggalsaatini - $nilaitertinggaltahunsebelumnya,
            'hasilsangattertinggal' => $nilaisangattertinggalsaatini - $nilaisangattertinggaltahunsebelumnya,
            'idmtahun' => $getIdmnow,
            'idm2thsblm' => $idm2thsblm != null ? array_count_values($idm2thsblm) : 0,
            'idmthsblm' => $idmthsblm != null ? array_count_values($idmthsblm) : 0,
            'idmnowgrafik' => $idmnowgrafik != null ? array_count_values($idmnowgrafik) : 0,
            'datakab' => $this->db->table('dashboard_kabupaten')->getWhere(['kodekab' => $kode])->getRowArray(),
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => $kode])->getResult()
        ];

        return view('sidesa/pemkab/kabupaten', $data);
    }

    function desa($kode)
    {
        $getIdmnow = $this->Kabupaten_model->getIdmnow($kode);
        $getIdmbefore = $this->Kabupaten_model->getIdmbefore($kode);
        $getIdmbefore2 = $this->Kabupaten_model->getIdmbefore2($kode);
        // $getIdmbefore3 = $this->Kabupaten_model->getIdmbefore3($kode);

        // untuk ditampilkan di grafik dashoboard desa
        if ($getIdmbefore2 != null) {
            foreach ($getIdmbefore2 as $item2thsblm) {
                $idm2thsblm[] = $item2thsblm;
            }
        } else {
            $idm2thsblm = 0;
        }
        if ($getIdmbefore != null) {
            foreach ($getIdmbefore as $itemthsblm) {
                $idmthsblm[] = $itemthsblm;
            }
        } else {
            $idmthsblm = 0;
        }
        if ($getIdmnow != null) {
            foreach ($getIdmnow as $itemnow) {
                $idmnowgrafik[] = $itemnow;
            }
        } else {
            $idmnowgrafik = 0;
        }

        // untuk ditampilkan di bagian selisih indeks
        if ($getIdmnow != null) {
            foreach ($getIdmnow as $itemnow) {
                $idmnow[] = $itemnow;
            }
            foreach ($getIdmbefore as $itembefore) {
                $idmbefore[] = $itembefore;
            }
        } else {
            if ($getIdmbefore != null) {
                foreach ($getIdmbefore as $itembefore) {
                    $idmnow[] = $itembefore;
                }
                foreach ($getIdmbefore2 as $itembefore2) {
                    $idmbefore[] = $itembefore2;
                }
            }
        }
        $datatahunsebelumnya = $idmbefore[0];
        $datasaatini = $idmnow[0];
        $nilaiikstahunsebelumnya = isset($datatahunsebelumnya->iks) ? $datatahunsebelumnya->iks : 0; //iks
        $nilaiiketahunsebelumnya = isset($datatahunsebelumnya->ike) ? $datatahunsebelumnya->ike : 0; //ike
        $nilaiikltahunsebelumnya = isset($datatahunsebelumnya->ikl) ? $datatahunsebelumnya->ikl : 0; //ikl
        $nilainilaiidmtahunsebelumnya = isset($datatahunsebelumnya->nilai_idm) ? $datatahunsebelumnya->nilai_idm : 0; //nilai idm
        $nilaiikssaatini = isset($datasaatini->iks) ? $datasaatini->iks : 0;
        $nilaiikesaatini = isset($datasaatini->ike) ? $datasaatini->ike : 0;
        $nilaiiklsaatini = isset($datasaatini->ikl) ? $datasaatini->ikl : 0;
        $nilainilaiidmsaatini = isset($datasaatini->nilai_idm) ? $datasaatini->nilai_idm : 0;

        // untuk penamaan kab/kec/des pada bagian atas bghome
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Data',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Kecamatan ' . $whoiskec . ", Desa " . $whoisdes, 'li_1' => 'Menu', 'li_2' => 'Home']),
            'kodedes' => $kode,
            'namades' => $whoisdes, //buat data dibawah judul tulisan IDM
            'status' => $idmnow[0]->status, //buat data dibawah judul tulisan IDM
            'datasaatiniiks' => $nilaiikssaatini,
            'datasaatiniike' => $nilaiikesaatini,
            'datasaatiniikl' => $nilaiiklsaatini,
            'datasaatininilaiidm' => $nilainilaiidmsaatini,
            'hasiliks' => $nilaiikssaatini - $nilaiikstahunsebelumnya,
            'hasilike' => $nilaiikesaatini - $nilaiiketahunsebelumnya,
            'hasilikl' => $nilaiiklsaatini - $nilaiikltahunsebelumnya,
            'hasilnilaiidm' => $nilainilaiidmsaatini - $nilainilaiidmtahunsebelumnya,
            'idmtahun' => $getIdmnow, //buat nampilin tahun di dashboard home
            'idm2thsblm' => $idm2thsblm, //buat grafik dashboard 2thn sebelum
            'idmthsblm' => $idmthsblm, //buat grafik dashboard 1thn sebelum
            'idmnowgrafik' => $idmnowgrafik, //buat grafik dashboard thn saat ini
            'datades' => $this->db->table('dashboard_desa')->getWhere(['kodedes' => substr($kode, 0, 13)])->getRowArray(),
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
            // 'namadesa' => $namadesa
        ];

        return view('sidesa/pemkab/desa', $data);
    }

    function kependudukan($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Kependudukan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Kependudukan Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Kependudukan']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'jenisKelamin' => $this->Kependudukan_model->pendudukJenisKelamin_I_2020($kode),
            'agama' => $this->Kependudukan_model->pendudukAgama_I_2020($kode),
            'pendidikan' => $this->Kependudukan_model->pendudukPendidikan_I_2020($kode),
            'pekerjaan' => $this->Kependudukan_model->pendudukPekerjaan_I_2020($kode),
            'usia' => $this->Kependudukan_model->pendudukKelompokUsia_I_2020($kode),
            'kk' => $this->Kependudukan_model->pendudukKK_I_2020($kode),
            'goldar' => $this->Kependudukan_model->pendudukGolDar_I_2020($kode)
        ];
        return view('sidesa/pemkab/kependudukan', $data);
    }

    function kependudukankec($kode)
    {
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Kependudukan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Kependudukan Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'Kependudukan']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'jenisKelamin' => $this->Kependudukan_model->pendudukJenisKelamin_I_2020($kode),
            'agama' => $this->Kependudukan_model->pendudukAgama_I_2020($kode),
            'pendidikan' => $this->Kependudukan_model->pendudukPendidikan_I_2020($kode),
            'pekerjaan' => $this->Kependudukan_model->pendudukPekerjaan_I_2020($kode),
            'usia' => $this->Kependudukan_model->pendudukKelompokUsia_I_2020($kode),
            'kk' => $this->Kependudukan_model->pendudukKK_I_2020($kode),
            'goldar' => $this->Kependudukan_model->pendudukGolDar_I_2020($kode)
        ];
        return view('sidesa/pemkab/kependudukan', $data);
    }

    function kependudukandes($kode)
    {
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Kependudukan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Kependudukan Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'Kependudukan']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'jenisKelamin' => $this->Kependudukan_model->pendudukJenisKelamin_I_2020($kode),
            'agama' => $this->Kependudukan_model->pendudukAgama_I_2020($kode),
            'pendidikan' => $this->Kependudukan_model->pendudukPendidikan_I_2020($kode),
            'pekerjaan' => $this->Kependudukan_model->pendudukPekerjaan_I_2020($kode),
            'usia' => $this->Kependudukan_model->pendudukKelompokUsia_I_2020($kode),
            'kk' => $this->Kependudukan_model->pendudukKK_I_2020($kode),
            'goldar' => $this->Kependudukan_model->pendudukGolDar_I_2020($kode)
        ];
        return view('sidesa/pemkab/kependudukan', $data);
    }

    function kesejahteraan($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Kesejahteraan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Kesejahteraan Sosial Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Kesejahteraan']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'artI20' => $this->Kesejahteraan_model->artpertama2020($kode),
            'artII20' => $this->Kesejahteraan_model->artkedua2020($kode),
            'krtI20' => $this->Kesejahteraan_model->krtpertama2020($kode),
            'krtII20' => $this->Kesejahteraan_model->krtkedua2020($kode),
            'masakI20' => $this->Kesejahteraan_model->masakpertama2020($kode),
            'masakII20' => $this->Kesejahteraan_model->masakkedua2020($kode),
            'babI20' => $this->Kesejahteraan_model->babpertama2020($kode),
            'babII20' => $this->Kesejahteraan_model->babkedua2020($kode),
            'minumI20' => $this->Kesejahteraan_model->minumpertama2020($kode),
            'minumII20' => $this->Kesejahteraan_model->minumkedua2020($kode),
            'peneranganI20' => $this->Kesejahteraan_model->peneranganpertama2020($kode),
            'peneranganII20' => $this->Kesejahteraan_model->penerangankedua2020($kode),
            'tinggalI20' => $this->Kesejahteraan_model->tinggalpertama2020($kode),
            'tinggalII20' => $this->Kesejahteraan_model->tinggalkedua2020($kode)
        ];
        return view('sidesa/pemkab/kesejahteraan', $data);
    }

    function kesejahteraankec($kode)
    {
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Kesejahteraan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Kesejahteraan Sosial Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'Kesejahteraan']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'artI20' => $this->Kesejahteraan_model->artpertama2020($kode),
            'artII20' => $this->Kesejahteraan_model->artkedua2020($kode),
            'krtI20' => $this->Kesejahteraan_model->krtpertama2020($kode),
            'krtII20' => $this->Kesejahteraan_model->krtkedua2020($kode),
            'masakI20' => $this->Kesejahteraan_model->masakpertama2020($kode),
            'masakII20' => $this->Kesejahteraan_model->masakkedua2020($kode),
            'babI20' => $this->Kesejahteraan_model->babpertama2020($kode),
            'babII20' => $this->Kesejahteraan_model->babkedua2020($kode),
            'minumI20' => $this->Kesejahteraan_model->minumpertama2020($kode),
            'minumII20' => $this->Kesejahteraan_model->minumkedua2020($kode),
            'peneranganI20' => $this->Kesejahteraan_model->peneranganpertama2020($kode),
            'peneranganII20' => $this->Kesejahteraan_model->penerangankedua2020($kode),
            'tinggalI20' => $this->Kesejahteraan_model->tinggalpertama2020($kode),
            'tinggalII20' => $this->Kesejahteraan_model->tinggalkedua2020($kode)
        ];
        return view('sidesa/pemkab/kesejahteraan', $data);
    }

    function kesejahteraandes($kode)
    {
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Kesejahteraan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Kesejahteraan Sosial Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'Kesejahteraan']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'artI20' => $this->Kesejahteraan_model->artpertama2020($kode),
            'artII20' => $this->Kesejahteraan_model->artkedua2020($kode),
            'krtI20' => $this->Kesejahteraan_model->krtpertama2020($kode),
            'krtII20' => $this->Kesejahteraan_model->krtkedua2020($kode),
            'masakI20' => $this->Kesejahteraan_model->masakpertama2020($kode),
            'masakII20' => $this->Kesejahteraan_model->masakkedua2020($kode),
            'babI20' => $this->Kesejahteraan_model->babpertama2020($kode),
            'babII20' => $this->Kesejahteraan_model->babkedua2020($kode),
            'minumI20' => $this->Kesejahteraan_model->minumpertama2020($kode),
            'minumII20' => $this->Kesejahteraan_model->minumkedua2020($kode),
            'peneranganI20' => $this->Kesejahteraan_model->peneranganpertama2020($kode),
            'peneranganII20' => $this->Kesejahteraan_model->penerangankedua2020($kode),
            'tinggalI20' => $this->Kesejahteraan_model->tinggalpertama2020($kode),
            'tinggalII20' => $this->Kesejahteraan_model->tinggalkedua2020($kode)
        ];
        return view('sidesa/pemkab/kesejahteraan', $data);
    }

    function keuangan($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Keuangan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Keuangan Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Keuangan']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/keuangan', $data);
    }

    function keuangankec($kode)
    {
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Keuangan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Keuangan Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'Keuangan']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/keuangan', $data);
    }

    function keuangandes($kode)
    {
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Keuangan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Keuangan Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'Keuangan']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/keuangan', $data);
    }

    function disabilitas($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Disabilitas',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Disabilitas Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Disabilitas']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'disabilitasI20' => $this->Disabilitas_model->disabilitaspertama2020($kode),
            'disabilitasII20' => $this->Disabilitas_model->disabilitaskedua2020($kode)
        ];
        return view('sidesa/pemkab/disabilitas', $data);
    }

    function disabilitaskec($kode)
    {
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Disabilitas',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Disabilitas Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'Disabilitas']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'disabilitasI20' => $this->Disabilitas_model->disabilitaspertama2020($kode),
            'disabilitasII20' => $this->Disabilitas_model->disabilitaskedua2020($kode)
        ];
        return view('sidesa/pemkab/disabilitas', $data);
    }

    function disabilitasdes($kode)
    {
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Disabilitas',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Disabilitas Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'Disabilitas']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'disabilitasI20' => $this->Disabilitas_model->disabilitaspertama2020($kode),
            'disabilitasII20' => $this->Disabilitas_model->disabilitaskedua2020($kode)
        ];
        return view('sidesa/pemkab/disabilitas', $data);
    }

    function danadesa($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Dana Desa',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Dana Desa Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Dana Desa']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/danadesa', $data);
    }

    function danadesakec($kode)
    {
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Dana Desa',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Dana Desa Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'Dana Desa']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/danadesa', $data);
    }

    function danadesades($kode)
    {
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Dana Desa',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Dana Desa Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'Dana Desa']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/danadesa', $data);
    }

    function rtlh($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'RTLH',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Rumah Tidak Layak Huni Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'RTLH']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/rtlh', $data);
    }

    function rtlhkec($kode)
    {
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'RTLH',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Rumah Tidak Layak Huni Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'RTLH']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/rtlh', $data);
    }

    function rtlhdes($kode)
    {
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'RTLH',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Rumah Tidak Layak Huni Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'RTLH']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/rtlh', $data);
    }

    function idm($kode)
    {
        $getIdm2019 = $this->Idm_model->getIdm2019($kode);
        $getIdm2020 = $this->Idm_model->getIdm2020($kode);
        $getIdm2021 = $this->Idm_model->getIdm2021($kode);

        if ($getIdm2019 != null) {
            foreach ($getIdm2019 as $item2019) {
                $idm2019[] = $item2019->status;
            }
        } else {
            $idm2019 = 0;
        }

        if ($getIdm2020 != null) {
            foreach ($getIdm2020 as $item2020) {
                $idm2020[] = $item2020->status;
            }
        } else {
            $idm2020 = 0;
        }

        if ($getIdm2021 != null) {
            foreach ($getIdm2021 as $item2021) {
                $idm2021[] = $item2021->status;
            }
        } else {
            $idm2021 = 0;
        }

        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'IDM',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Indeks Desa Membangun (IDM) Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'IDM']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        if ($idm2019 != 0) {
            $data['idm2019'] = array_count_values($idm2019);
        } else {
            $data['idm2019'] = 0;
        }

        if ($idm2020 != 0) {
            $data['idm2020'] = array_count_values($idm2020);
        } else {
            $data['idm2020'] = 0;
        }

        if ($idm2021 != 0) {
            $data['idm2021'] = array_count_values($idm2021);
        } else {
            $data['idm2021'] = 0;
        }

        return view('sidesa/pemkab/idm', $data);
    }

    function idmkec($kode)
    {
        $getIdm2019 = $this->Idm_model->getIdm2019($kode);
        $getIdm2020 = $this->Idm_model->getIdm2020($kode);
        $getIdm2021 = $this->Idm_model->getIdm2021($kode);

        if ($getIdm2019 != null) {
            foreach ($getIdm2019 as $item2019) {
                $idm2019[] = $item2019->status;
            }
        } else {
            $idm2019 = 0;
        }

        if ($getIdm2020 != null) {
            foreach ($getIdm2020 as $item2020) {
                $idm2020[] = $item2020->status;
            }
        } else {
            $idm2020 = 0;
        }

        if ($getIdm2021 != null) {
            foreach ($getIdm2021 as $item2021) {
                $idm2021[] = $item2021->status;
            }
        } else {
            $idm2021 = 0;
        }

        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'IDM',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Indeks Desa Membangun (IDM) Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'IDM']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        if ($idm2019 != 0) {
            $data['idm2019'] = array_count_values($idm2019);
        } else {
            $data['idm2019'] = 0;
        }

        if ($idm2020 != 0) {
            $data['idm2020'] = array_count_values($idm2020);
        } else {
            $data['idm2020'] = 0;
        }

        if ($idm2021 != 0) {
            $data['idm2021'] = array_count_values($idm2021);
        } else {
            $data['idm2021'] = 0;
        }

        return view('sidesa/pemkab/idm', $data);
    }

    function idmdes($kode)
    {
        $getIdm2019 = $this->Idm_model->getIdm2019($kode);
        $getIdm2020 = $this->Idm_model->getIdm2020($kode);
        $getIdm2021 = $this->Idm_model->getIdm2021($kode);

        if ($getIdm2019 != null) {
            foreach ($getIdm2019 as $item2019) {
                $idm2019[] = $item2019;
            }
        } else {
            $idm2019 = 0;
        }

        if ($getIdm2020 != null) {
            foreach ($getIdm2020 as $item2020) {
                $idm2020[] = $item2020;
            }
        } else {
            $idm2020 = 0;
        }

        if ($getIdm2021 != null) {
            foreach ($getIdm2021 as $item2021) {
                $idm2021[] = $item2021;
            }
        } else {
            $idm2021 = 0;
        }

        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);
        $data = [
            'title' => 'IDM',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Indeks Desa Membangun (IDM) Kecamatan ' . $whoiskec . ', Desa ' . $whoisdes . '<p>Status : ' . $idm2020[0]->status, 'li_1' => 'Data', 'li_2' => 'IDM']),
            'kodedes' => $kode,
            'idm2019' => $idm2019,
            'idm2020' => $idm2020,
            'idm2021' => $idm2021,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        // dd($idm2019[0]->iks);

        return view('sidesa/pemkab/idm', $data);
    }

    function bumdes($kode)
    {
        $getBumdes2019 = $this->Bumdes_model->getBumdes2019($kode);
        $getBumdes2020 = $this->Bumdes_model->getBumdes2020($kode);

        if ($getBumdes2019 != null) {
            foreach ($getBumdes2019 as $item2019) {
                $Bumdes2019[] = $item2019->klasifikasi;
            }
        } else {
            $Bumdes2019 = 0;
        }

        if ($getBumdes2020 != null) {
            foreach ($getBumdes2020 as $item2020) {
                $Bumdes2020[] = $item2020->klasifikasi;
            }
        } else {
            $Bumdes2020 = 0;
        }
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Bumdes',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Badan Usaha Milik Desa Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Bumdes']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        if ($Bumdes2019 != 0) {
            $data['bumdes2019'] = array_count_values($Bumdes2019);
        } else {
            $data['bumdes2019'] = 0;
        }

        if ($Bumdes2020 != 0) {
            $data['bumdes2020'] = array_count_values($Bumdes2020);
        } else {
            $data['bumdes2020'] = 0;
        }
        return view('sidesa/pemkab/bumdes', $data);
    }

    function bumdeskec($kode)
    {
        $getBumdes2019 = $this->Bumdes_model->getBumdes2019($kode);
        $getBumdes2020 = $this->Bumdes_model->getBumdes2020($kode);

        if ($getBumdes2019 != null) {
            foreach ($getBumdes2019 as $item2019) {
                $Bumdes2019[] = $item2019->klasifikasi;
            }
        } else {
            $Bumdes2019 = 0;
        }

        if ($getBumdes2020 != null) {
            foreach ($getBumdes2020 as $item2020) {
                $Bumdes2020[] = $item2020->klasifikasi;
            }
        } else {
            $Bumdes2020 = 0;
        }
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Bumdes',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Badan Usaha Milik Desa Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'Bumdes']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        if ($Bumdes2019 != 0) {
            $data['bumdes2019'] = array_count_values($Bumdes2019);
        } else {
            $data['bumdes2019'] = 0;
        }

        if ($Bumdes2020 != 0) {
            $data['bumdes2020'] = array_count_values($Bumdes2020);
        } else {
            $data['bumdes2020'] = 0;
        }
        return view('sidesa/pemkab/bumdes', $data);
    }

    function bumdesdes($kode)
    {
        $getBumdes2019 = $this->Bumdes_model->getBumdes2019($kode);
        $getBumdes2020 = $this->Bumdes_model->getBumdes2020($kode);

        if ($getBumdes2019 != null) {
            foreach ($getBumdes2019 as $item2019) {
                $Bumdes2019[] = $item2019->klasifikasi;
            }
        } else {
            $Bumdes2019 = 0;
        }

        if ($getBumdes2020 != null) {
            foreach ($getBumdes2020 as $item2020) {
                $Bumdes2020[] = $item2020->klasifikasi;
            }
        } else {
            $Bumdes2020 = 0;
        }
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Bumdes',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Badan Usaha Milik Desa Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'Bumdes']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        if ($Bumdes2019 != 0) {
            $data['bumdes2019'] = array_count_values($Bumdes2019);
        } else {
            $data['bumdes2019'] = 0;
        }

        if ($Bumdes2020 != 0) {
            $data['bumdes2020'] = array_count_values($Bumdes2020);
        } else {
            $data['bumdes2020'] = 0;
        }
        return view('sidesa/pemkab/bumdes', $data);
    }

    function kesehatan($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Kesehatan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Kesehatan Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Kesehatan']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'posyandu20' => $this->Kesehatan_model->posyandu20($kode),
            'posyandu21' => $this->Kesehatan_model->posyandu21($kode),
            'posyandu22' => $this->Kesehatan_model->posyandu22($kode)
        ];
        return view('sidesa/pemkab/kesehatan', $data);
    }

    function kesehatankec($kode)
    {
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Kesehatan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Kesehatan Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'Kesehatan']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'posyandu20' => $this->Kesehatan_model->posyandu20($kode),
            'posyandu21' => $this->Kesehatan_model->posyandu21($kode),
            'posyandu22' => $this->Kesehatan_model->posyandu22($kode)
        ];
        return view('sidesa/pemkab/kesehatan', $data);
    }

    function kesehatandes($kode)
    {
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Kesehatan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Kesehatan Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'Kesehatan']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'posyandu20' => $this->Kesehatan_model->posyandu20($kode),
            'posyandu21' => $this->Kesehatan_model->posyandu21($kode),
            'posyandu22' => $this->Kesehatan_model->posyandu22($kode)
        ];
        return view('sidesa/pemkab/kesehatan', $data);
    }

    function pertanian($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Pertanian',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Pertanian Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Pertanian']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/pertanian', $data);
    }

    function pertaniankec($kode)
    {
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Pertanian',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Pertanian Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'Pertanian']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/pertanian', $data);
    }

    function pertaniandes($kode)
    {
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Pertanian',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Pertanian Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'Pertanian']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult()
        ];
        return view('sidesa/pemkab/pertanian', $data);
    }

    function bankeu($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Bantuan Keuangan',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Bantuan Keuangan Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Bantuan Keuangan']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'bankeu_salur_2013' => $this->Bankeu_model->bankeu_salur_2013($kode),
            'bankeu_salur_2014' => $this->Bankeu_model->bankeu_salur_2014($kode),
            'bankeu_salur_2015' => $this->Bankeu_model->bankeu_salur_2015($kode),
            'bankeu_salur_2016' => $this->Bankeu_model->bankeu_salur_2016($kode),
            'bankeu_salur_2017' => $this->Bankeu_model->bankeu_salur_2017($kode),
            'bankeu_salur_2018' => $this->Bankeu_model->bankeu_salur_2018($kode),
            'bankeu_salur_2019' => $this->Bankeu_model->bankeu_salur_2019($kode),
            'bankeu_salur_2020' => $this->Bankeu_model->bankeu_salur_2020($kode),
            'bankeu_salur_2021' => $this->Bankeu_model->bankeu_salur_2021($kode),
            'bankeu_salur_2022' => $this->Bankeu_model->bankeu_salur_2022($kode),
            'bankeu_salur_2023' => $this->Bankeu_model->bankeu_salur_2023($kode),
            'bankeu_salur_2024' => $this->Bankeu_model->bankeu_salur_2024($kode),
            'bankeu_salur_2025' => $this->Bankeu_model->bankeu_salur_2025($kode)
        ];
        return view('sidesa/pemkab/bankeu', $data);
    }

    function sosialbudaya($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Sosial Budaya',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Sosial Budaya Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Sosial Budaya']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'satgas19' => $this->Sosialbudaya_model->satgas19($kode),
            'satgas20' => $this->Sosialbudaya_model->satgas20($kode),
            'satgas21' => $this->Sosialbudaya_model->satgas21($kode),
            'satgas22' => $this->Sosialbudaya_model->satgas22($kode)
        ];
        return view('sidesa/pemkab/sosialbudaya', $data);
    }

    function sosialbudayakec($kode)
    {
        $cekkode = $this->db->table('kd_kecamatan')->getWhere(['id_kec' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kec']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Sosial Budaya',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Sosial Budaya Kecamatan ' . $whois, 'li_1' => 'Data', 'li_2' => 'Sosial Budaya']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'satgas19' => $this->Sosialbudaya_model->satgas19($kode),
            'satgas20' => $this->Sosialbudaya_model->satgas20($kode),
            'satgas21' => $this->Sosialbudaya_model->satgas21($kode),
            'satgas22' => $this->Sosialbudaya_model->satgas22($kode)
        ];
        return view('sidesa/pemkab/sosialbudaya', $data);
    }

    function sosialbudayades($kode)
    {
        $cekkode = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_desa']);
        $whois = ucwords($hurufawal);
        $data = [
            'title' => 'Sosial Budaya',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Sosial Budaya Desa ' . $whois, 'li_1' => 'Data', 'li_2' => 'Sosial Budaya']),
            'kodedes' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'satgas19' => $this->Sosialbudaya_model->satgas19($kode),
            'satgas20' => $this->Sosialbudaya_model->satgas20($kode),
            'satgas21' => $this->Sosialbudaya_model->satgas21($kode),
            'satgas22' => $this->Sosialbudaya_model->satgas22($kode)
        ];
        return view('sidesa/pemkab/sosialbudaya', $data);
    }
}
