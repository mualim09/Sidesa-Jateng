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
use App\Models\Sidesa\User_kabupaten5a_model;

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
    protected $Kabupaten5a_model;

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
        $this->Kabupaten5a_model = new User_kabupaten5a_model();
    }

    function kabupaten($kode)
    {
        $getIdm2022 = $this->Kabupaten_model->getIdm2022($kode);
        $getIdm2021 = $this->Kabupaten_model->getIdm2021($kode);
        $getIdm2020 = $this->Kabupaten_model->getIdm2020($kode);
        $getIdm2019 = $this->Kabupaten_model->getIdm2019($kode);
        // $getIdm2022 = $this->Kabupaten_model->getIdm2022($kode);

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
        if ($getIdm2022 != null) {
            foreach ($getIdm2022 as $item2022) {
                $idm2022[] = $item2022->status;
            }
        } else {
            $idm2022 = 0;
        }

        $datatahunsebelumnya = array_count_values($idm2020);
        $datasaatini = array_count_values($idm2021);
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
            'idmtahun' => $getIdm2022,
            'idm2019' => $idm2019 != null ? array_count_values($idm2019) : 0,
            'idm2020' => $idm2020 != null ? array_count_values($idm2020) : 0,
            'idm2021' => $idm2021 != null ? array_count_values($idm2021) : 0,
            'datakab' => $this->db->table('dashboard_kabupaten')->getWhere(['kodekab' => $kode])->getRowArray(),
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => $kode])->getResult(),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
        ];
        // dd($data['urlkab']);

        return view('sidesa/pemkab/kabupaten', $data);
    }

    function desa($kode)
    {
        $getIdm2022 = $this->Kabupaten_model->getIdm2022($kode);
        $getIdm2021 = $this->Kabupaten_model->getIdm2021($kode);
        $getIdm2020 = $this->Kabupaten_model->getIdm2020($kode);
        $getIdm2019 = $this->Kabupaten_model->getIdm2019($kode);
        // $getIdm2022 = $this->Kabupaten_model->getIdm2022($kode);

        // untuk ditampilkan di grafik dashoboard desa
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
        if ($getIdm2022 != null) {
            foreach ($getIdm2022 as $item2022) {
                $idm2022[] = $item2022;
            }
        } else {
            $idm2022 = 0;
        }

        // untuk ditampilkan di bagian selisih indeks
        $datatahunsebelumnya = $idm2020[0];
        $datasaatini = $idm2021[0];
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
            'status' => $idm2021[0]->status, //buat data dibawah judul tulisan IDM
            'datasaatiniiks' => $nilaiikssaatini,
            'datasaatiniike' => $nilaiikesaatini,
            'datasaatiniikl' => $nilaiiklsaatini,
            'datasaatininilaiidm' => $nilainilaiidmsaatini,
            'hasiliks' => $nilaiikssaatini - $nilaiikstahunsebelumnya,
            'hasilike' => $nilaiikesaatini - $nilaiiketahunsebelumnya,
            'hasilikl' => $nilaiiklsaatini - $nilaiikltahunsebelumnya,
            'hasilnilaiidm' => $nilainilaiidmsaatini - $nilainilaiidmtahunsebelumnya,
            'idmtahun' => $getIdm2022, //buat nampilin tahun di dashboard home
            'idm2019' => $idm2019, //buat grafik dashboard 2thn sebelum
            'idm2020' => $idm2020, //buat grafik dashboard 1thn sebelum
            'idm2021' => $idm2021, //buat grafik dashboard thn saat ini
            'datades' => $this->db->table('dashboard_desa')->getWhere(['kodedes' => substr($kode, 0, 13)])->getRowArray(),
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'goldar' => $this->Kependudukan_model->pendudukGolDar_I_2020($kode),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'goldar' => $this->Kependudukan_model->pendudukGolDar_I_2020($kode),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'tinggalII20' => $this->Kesejahteraan_model->tinggalkedua2020($kode),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'tinggalII20' => $this->Kesejahteraan_model->tinggalkedua2020($kode),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'disabilitasII20' => $this->Disabilitas_model->disabilitaskedua2020($kode),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'disabilitasII20' => $this->Disabilitas_model->disabilitaskedua2020($kode),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
        ];
        return view('sidesa/pemkab/disabilitas', $data);
    }

    function danadesa($kode)
    {
        $cekkode = $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getRowArray();
        $hurufawal = strtolower($cekkode['nm_kab']);
        $whois = ucwords($hurufawal);

        // salur
        $jml_salur_reg = $this->Kabupaten5a_model->salur_reguler($kode);
        $januari = isset($jml_salur_reg['salur_januari']) ? $jml_salur_reg['salur_januari'] : 0;
        $februari = isset($jml_salur_reg['salur_februari']) ? $jml_salur_reg['salur_februari'] : 0;
        $maret = isset($jml_salur_reg['salur_maret']) ? $jml_salur_reg['salur_maret'] : 0;
        $april = isset($jml_salur_reg['salur_april']) ? $jml_salur_reg['salur_april'] : 0;
        $mei = isset($jml_salur_reg['salur_mei']) ? $jml_salur_reg['salur_mei'] : 0;
        $juni = isset($jml_salur_reg['salur_juni']) ? $jml_salur_reg['salur_juni'] : 0;
        $juli = isset($jml_salur_reg['salur_juli']) ? $jml_salur_reg['salur_juli'] : 0;
        $agustus = isset($jml_salur_reg['salur_agustus']) ? $jml_salur_reg['salur_agustus'] : 0;
        $september = isset($jml_salur_reg['salur_september']) ? $jml_salur_reg['salur_september'] : 0;
        $oktober = isset($jml_salur_reg['salur_oktober']) ? $jml_salur_reg['salur_oktober'] : 0;
        $november = isset($jml_salur_reg['salur_november']) ? $jml_salur_reg['salur_november'] : 0;
        $desember = isset($jml_salur_reg['salur_desember']) ? $jml_salur_reg['salur_desember'] : 0;
        $jumlah_salur_reg = intval($januari) + intval($februari) + intval($maret) + intval($april) + intval($mei) + intval($juni) + intval($juli) + intval($agustus) + intval($september) + intval($oktober) + intval($november) + intval($desember);

        $jml_salur_bltdd = $this->Kabupaten5a_model->salur_bltdd($kode);
        $januari = isset($jml_salur_bltdd['salur_januari']) ? $jml_salur_bltdd['salur_januari'] : 0;
        $februari = isset($jml_salur_bltdd['salur_februari']) ? $jml_salur_bltdd['salur_februari'] : 0;
        $maret = isset($jml_salur_bltdd['salur_maret']) ? $jml_salur_bltdd['salur_maret'] : 0;
        $april = isset($jml_salur_bltdd['salur_april']) ? $jml_salur_bltdd['salur_april'] : 0;
        $mei = isset($jml_salur_bltdd['salur_mei']) ? $jml_salur_bltdd['salur_mei'] : 0;
        $juni = isset($jml_salur_bltdd['salur_juni']) ? $jml_salur_bltdd['salur_juni'] : 0;
        $juli = isset($jml_salur_bltdd['salur_juli']) ? $jml_salur_bltdd['salur_juli'] : 0;
        $agustus = isset($jml_salur_bltdd['salur_agustus']) ? $jml_salur_bltdd['salur_agustus'] : 0;
        $september = isset($jml_salur_bltdd['salur_september']) ? $jml_salur_bltdd['salur_september'] : 0;
        $oktober = isset($jml_salur_bltdd['salur_oktober']) ? $jml_salur_bltdd['salur_oktober'] : 0;
        $november = isset($jml_salur_bltdd['salur_november']) ? $jml_salur_bltdd['salur_november'] : 0;
        $desember = isset($jml_salur_bltdd['salur_desember']) ? $jml_salur_bltdd['salur_desember'] : 0;
        $jumlah_salur_bltdd = intval($januari) + intval($februari) + intval($maret) + intval($april) + intval($mei) + intval($juni) + intval($juli) + intval($agustus) + intval($september) + intval($oktober) + intval($november) + intval($desember);

        $jml_salur_kph = $this->Kabupaten5a_model->salur_kph($kode);
        $januari = isset($jml_salur_kph['salur_januari']) ? $jml_salur_kph['salur_januari'] : 0;
        $februari = isset($jml_salur_kph['salur_februari']) ? $jml_salur_kph['salur_februari'] : 0;
        $maret = isset($jml_salur_kph['salur_maret']) ? $jml_salur_kph['salur_maret'] : 0;
        $april = isset($jml_salur_kph['salur_april']) ? $jml_salur_kph['salur_april'] : 0;
        $mei = isset($jml_salur_kph['salur_mei']) ? $jml_salur_kph['salur_mei'] : 0;
        $juni = isset($jml_salur_kph['salur_juni']) ? $jml_salur_kph['salur_juni'] : 0;
        $juli = isset($jml_salur_kph['salur_juli']) ? $jml_salur_kph['salur_juli'] : 0;
        $agustus = isset($jml_salur_kph['salur_agustus']) ? $jml_salur_kph['salur_agustus'] : 0;
        $september = isset($jml_salur_kph['salur_september']) ? $jml_salur_kph['salur_september'] : 0;
        $oktober = isset($jml_salur_kph['salur_oktober']) ? $jml_salur_kph['salur_oktober'] : 0;
        $november = isset($jml_salur_kph['salur_november']) ? $jml_salur_kph['salur_november'] : 0;
        $desember = isset($jml_salur_kph['salur_desember']) ? $jml_salur_kph['salur_desember'] : 0;
        $jumlah_salur_kph = intval($januari) + intval($februari) + intval($maret) + intval($april) + intval($mei) + intval($juni) + intval($juli) + intval($agustus) + intval($september) + intval($oktober) + intval($november) + intval($desember);

        $jml_salur_covid = $this->Kabupaten5a_model->salur_covid($kode);
        $januari = isset($jml_salur_covid['salur_januari']) ? $jml_salur_covid['salur_januari'] : 0;
        $februari = isset($jml_salur_covid['salur_februari']) ? $jml_salur_covid['salur_februari'] : 0;
        $maret = isset($jml_salur_covid['salur_maret']) ? $jml_salur_covid['salur_maret'] : 0;
        $april = isset($jml_salur_covid['salur_april']) ? $jml_salur_covid['salur_april'] : 0;
        $mei = isset($jml_salur_covid['salur_mei']) ? $jml_salur_covid['salur_mei'] : 0;
        $juni = isset($jml_salur_covid['salur_juni']) ? $jml_salur_covid['salur_juni'] : 0;
        $juli = isset($jml_salur_covid['salur_juli']) ? $jml_salur_covid['salur_juli'] : 0;
        $agustus = isset($jml_salur_covid['salur_agustus']) ? $jml_salur_covid['salur_agustus'] : 0;
        $september = isset($jml_salur_covid['salur_september']) ? $jml_salur_covid['salur_september'] : 0;
        $oktober = isset($jml_salur_covid['salur_oktober']) ? $jml_salur_covid['salur_oktober'] : 0;
        $november = isset($jml_salur_covid['salur_november']) ? $jml_salur_covid['salur_november'] : 0;
        $desember = isset($jml_salur_covid['salur_desember']) ? $jml_salur_covid['salur_desember'] : 0;
        $jumlah_salur_covid = intval($januari) + intval($februari) + intval($maret) + intval($april) + intval($mei) + intval($juni) + intval($juli) + intval($agustus) + intval($september) + intval($oktober) + intval($november) + intval($desember);

        // realisasi
        $real_reg = $this->Kabupaten5a_model->danadesa_reguler($kode);
        if (isset($real_reg)) {
            $total_reg = $real_reg['januari'] + $real_reg['februari'] + $real_reg['maret'] + $real_reg['april'] + $real_reg['mei'] + $real_reg['juni'] + $real_reg['juli'] + $real_reg['agustus'] + $real_reg['september'] + $real_reg['oktober'] + $real_reg['november'] + $real_reg['desember'];
        } else {
            $total_reg = 0;
        }
        $real_bltdd = $this->Kabupaten5a_model->danadesa_bltdd($kode);
        if (isset($real_bltdd)) {
            $total_bltdd = $real_bltdd['januari'] + $real_bltdd['februari'] + $real_bltdd['maret'] + $real_bltdd['april'] + $real_bltdd['mei'] + $real_bltdd['juni'] + $real_bltdd['juli'] + $real_bltdd['agustus'] + $real_bltdd['september'] + $real_bltdd['oktober'] + $real_bltdd['november'] + $real_bltdd['desember'];
        } else {
            $total_bltdd = 0;
        }
        $real_kph = $this->Kabupaten5a_model->danadesa_kph($kode);
        if (isset($real_kph)) {
            $total_kph = $real_kph['januari'] + $real_kph['februari'] + $real_kph['maret'] + $real_kph['april'] + $real_kph['mei'] + $real_kph['juni'] + $real_kph['juli'] + $real_kph['agustus'] + $real_kph['september'] + $real_kph['oktober'] + $real_kph['november'] + $real_kph['desember'];
        } else {
            $total_kph = 0;
        }
        $real_covid = $this->Kabupaten5a_model->danadesa_covid($kode);
        if (isset($real_covid)) {
            $total_covid = $real_covid['januari'] + $real_covid['februari'] + $real_covid['maret'] + $real_covid['april'] + $real_covid['mei'] + $real_covid['juni'] + $real_covid['juli'] + $real_covid['agustus'] + $real_covid['september'] + $real_covid['oktober'] + $real_covid['november'] + $real_covid['desember'];
        } else {
            $total_covid = 0;
        }

        // logic persentase
        $reg = $this->Kabupaten5a_model->danadesa_reguler($kode);
        if (isset($reg)) {
            $persen_reg = $reg['persentase'];
        } else {
            $persen_reg = 0;
        }
        $bltdd = $this->Kabupaten5a_model->danadesa_bltdd($kode);
        if (isset($bltdd)) {
            $persen_bltdd = $bltdd['persentase'];
        } else {
            $persen_bltdd = 0;
        }
        $kph = $this->Kabupaten5a_model->danadesa_kph($kode);
        if (isset($kph)) {
            $persen_kph = $kph['persentase'];
        } else {
            $persen_kph = 0;
        }
        $covid = $this->Kabupaten5a_model->danadesa_covid($kode);
        if (isset($covid)) {
            $persen_covid = $covid['persentase'];
        } else {
            $persen_covid = 0;
        }

        // logic capaian persentase
        $anggaran = $this->Kabupaten5a_model->danadesa_anggaran($kode);
        if (isset($anggaran['danadesa'])) {
            $anggaran_danadesa = $anggaran['danadesa'];
        } else {
            $anggaran_danadesa = 0;
        }
        $anggaran_reg = $anggaran_danadesa * $persen_reg / 100;
        if ($anggaran_reg != 0) {
            $capaian_reg = number_format($total_reg / $anggaran_reg * 100, 2, '.', '.');
        } else {
            $capaian_reg = 0;
        }
        $anggaran_bltdd = $anggaran_danadesa * $persen_bltdd / 100;
        if ($anggaran_bltdd != 0) {
            $capaian_bltdd = number_format($total_bltdd / $anggaran_bltdd * 100, 2, '.', '.');
        } else {
            $capaian_bltdd = 0;
        }
        $anggaran_kph = $anggaran_danadesa * $persen_kph / 100;
        if ($anggaran_kph != 0) {
            $capaian_kph = number_format($total_kph / $anggaran_kph * 100, 2, '.', '.');
        } else {
            $capaian_kph = 0;
        }
        $anggaran_covid = $anggaran_danadesa * $persen_covid / 100;
        if ($anggaran_covid != 0) {
            $capaian_covid = number_format($total_covid / $anggaran_covid * 100, 2, '.', '.');
        } else {
            $capaian_covid = 0;
        }

        // dd($capaian_kph);

        // logic grand total setelah dipersentasekan
        $grn_total = $this->Kabupaten5a_model->danadesa_anggaran($kode);
        if (isset($grn_total['danadesa'])) {
            $grand_total = $grn_total['danadesa'];
            $grand_total_reg = $grn_total['danadesa'] * $persen_reg / 100;
            $grand_total_bltdd = $grn_total['danadesa'] * $persen_bltdd / 100;
            $grand_total_kph = $grn_total['danadesa'] * $persen_kph / 100;
            $grand_total_covid = $grn_total['danadesa'] * $persen_covid / 100;
        } else {
            $grand_total = 0;
            $grand_total_reg = 0;
            $grand_total_bltdd = 0;
            $grand_total_kph = 0;
            $grand_total_covid = 0;
        }

        $data = [
            'title' => 'Dana Desa',
            'page_title' => view('sidesa/layout/pemkab/page-title', ['title' => 'Data Dana Desa Kabupaten ' . $whois, 'li_1' => 'Data', 'li_2' => 'Dana Desa']),
            'kodekab' => $kode,
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'anggaran_danadesa' => $anggaran_danadesa,
            'total_salur' => $jumlah_salur_reg + $jumlah_salur_bltdd + $jumlah_salur_kph + $jumlah_salur_covid,
            'total_realisasi' => $total_reg + $total_bltdd + $total_kph + $total_covid,
            'capaian_reg' => $capaian_reg,
            'capaian_bltdd' => $capaian_bltdd,
            'capaian_kph' => $capaian_kph,
            'capaian_covid' => $capaian_covid,
            'realisasi_reg' => $total_reg,
            'realisasi_bltdd' => $total_bltdd,
            'realisasi_kph' => $total_kph,
            'realisasi_covid' => $total_covid,
            'realisasi_bulanan_danadesa_reguler' => $this->Kabupaten5a_model->danadesa_reguler($kode),
            'realisasi_bulanan_danadesa_bltdd' => $this->Kabupaten5a_model->danadesa_bltdd($kode),
            'realisasi_bulanan_danadesa_kph' => $this->Kabupaten5a_model->danadesa_kph($kode),
            'realisasi_bulanan_danadesa_covid' => $this->Kabupaten5a_model->danadesa_covid($kode),
            'grand_total_anggaran' => $grand_total,
            'grand_total_reg' => $grand_total_reg,
            'grand_total_bltdd' => $grand_total_bltdd,
            'grand_total_kph' => $grand_total_kph,
            'grand_total_covid' => $grand_total_covid,
            'persen_reg' => $persen_reg,
            'persen_bltdd' => $persen_bltdd,
            'persen_kph' => $persen_kph,
            'persen_covid' => $persen_covid,
            'kab' => $whois,
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
        ];
        if ($data['total_salur'] != 0) {
            return view('sidesa/pemkab/danadesa', $data);
        } else {
            return view('errors/maintenancepage/sidesa', $data);
        }
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'posyandu22' => $this->Kesehatan_model->posyandu22($kode),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'posyandu22' => $this->Kesehatan_model->posyandu22($kode),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
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
            'bankeu_salur_2025' => $this->Bankeu_model->bankeu_salur_2025($kode),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'satgas22' => $this->Sosialbudaya_model->satgas22($kode),
            'urlkab' => $this->db->table('kd_kabupaten')->getWhere(['id_kab' => $kode])->getResult()
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
            'satgas22' => $this->Sosialbudaya_model->satgas22($kode),
            'urldes' => $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getResult()
        ];
        return view('sidesa/pemkab/sosialbudaya', $data);
    }
}
