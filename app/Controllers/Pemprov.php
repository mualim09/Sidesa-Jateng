<?php

namespace App\Controllers;

use App\Models\Sidesa\Muatandata_model;
use App\Models\Sidesa\Kependudukan_model;
use App\Models\Sidesa\Kesejahteraan_model;
use App\Models\Sidesa\Disabilitas_model;
use App\Models\Sidesa\Idm_model;
use App\Models\Sidesa\Bumdes_model;
use App\Models\Sidesa\Kesehatan_model;
use App\Models\Sidesa\Bankeu_model;
use App\Models\Sidesa\Sosialbudaya_model;

class Pemprov extends BaseController
{
    protected $Kependudukan_model;
    protected $Kesejahteraan_model;
    protected $Disabilitas_model;
    protected $Idm_model;
    protected $Bumdes_model;
    protected $Kesehatan_model;
    protected $Bankeu_model;
    protected $Sosialbudaya_model;
    protected $Muatandata_model;

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
        $this->Muatandata_model = new Muatandata_model();
    }

    function muatandata()
    {
        $muatandata2022 = $this->Muatandata_model->getData2022();

        foreach ($muatandata2022 as $item2022) {
            $nm_data2022[] = $item2022['nm_data'] . ' ' . $item2022['tahundata'];
            $click2022[] = $item2022['click'];
        }

        // dd($nm_data2022); // buat liat index ke berapa data di table database

        $data = [
            'title' => 'SIDesa Jawa Tengah',
            'nmdata22' => $nm_data2022,
            'click22' => $click2022,
        ];

        return view('sidesa/pemprov/muatandata', $data);
    }

    function kependudukan()
    {
        $data = [
            'title' => 'Kependudukan Tingkat Provinsi',
            'jenisKelamin' => $this->Kependudukan_model->pendudukJenisKelamin_I_2020(''),
            'agama' => $this->Kependudukan_model->pendudukAgama_I_2020(''),
            'pendidikan' => $this->Kependudukan_model->pendudukPendidikan_I_2020(''),
            'pekerjaan' => $this->Kependudukan_model->pendudukPekerjaan_I_2020(''),
            'usia' => $this->Kependudukan_model->pendudukKelompokUsia_I_2020(''),
            'kk' => $this->Kependudukan_model->pendudukKK_I_2020(''),
            'goldar' => $this->Kependudukan_model->pendudukGolDar_I_2020('')
        ];

        return view('sidesa/pemprov/kependudukan', $data);
    }

    function kesejahteraan()
    {
        $data = [
            'title' => 'Kesejahteraan Tingkat Provinsi',
            'artI20' => $this->Kesejahteraan_model->artpertama2020(''),
            'artII20' => $this->Kesejahteraan_model->artkedua2020(''),
            'krtI20' => $this->Kesejahteraan_model->krtpertama2020(''),
            'krtII20' => $this->Kesejahteraan_model->krtkedua2020(''),
            'masakI20' => $this->Kesejahteraan_model->masakpertama2020(''),
            'masakII20' => $this->Kesejahteraan_model->masakkedua2020(''),
            'babI20' => $this->Kesejahteraan_model->babpertama2020(''),
            'babII20' => $this->Kesejahteraan_model->babkedua2020(''),
            'minumI20' => $this->Kesejahteraan_model->minumpertama2020(''),
            'minumII20' => $this->Kesejahteraan_model->minumkedua2020(''),
            'peneranganI20' => $this->Kesejahteraan_model->peneranganpertama2020(''),
            'peneranganII20' => $this->Kesejahteraan_model->penerangankedua2020(''),
            'tinggalI20' => $this->Kesejahteraan_model->tinggalpertama2020(''),
            'tinggalII20' => $this->Kesejahteraan_model->tinggalkedua2020('')
        ];

        return view('sidesa/pemprov/kesejahteraan', $data);
    }

    function disabilitas()
    {
        $data = [
            'title' => 'Disabilitas Tingkat Provinsi',
            'disabilitasI20' => $this->Disabilitas_model->disabilitaspertama2020(''),
            'disabilitasII20' => $this->Disabilitas_model->disabilitaskedua2020(''),

        ];

        return view('sidesa/pemprov/disabilitas', $data);
    }

    function idm()
    {
        $data['title'] = 'IDM Tingkat Provinsi';
        $getIdm2019 = $this->Idm_model->getIdm2019('');
        $getIdm2020 = $this->Idm_model->getIdm2020('');
        $getIdm2021 = $this->Idm_model->getIdm2021('');
        $getIdm2022 = $this->Idm_model->getIdm2022('');

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

        if ($idm2022 != 0) {
            $data['idm2022'] = array_count_values($idm2022);
        } else {
            $data['idm2022'] = 0;
        }

        return view('sidesa/pemprov/idm', $data);
    }

    function bumdes()
    {
        $data['title'] = 'Bumdes Tingkat Provinsi';
        $getBumdes2019 = $this->Bumdes_model->getBumdes2019('');
        $getBumdes2020 = $this->Bumdes_model->getBumdes2020('');
        $getBumdes2021 = $this->Bumdes_model->getBumdes2021('');
        $getBumdes2022 = $this->Bumdes_model->getBumdes2022('');

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

        if ($getBumdes2021 != null) {
            foreach ($getBumdes2021 as $item2021) {
                $Bumdes2021[] = $item2021->klasifikasi;
            }
        } else {
            $Bumdes2021 = 0;
        }

        if ($getBumdes2022 != null) {
            foreach ($getBumdes2022 as $item2022) {
                $Bumdes2022[] = $item2022->klasifikasi;
            }
        } else {
            $Bumdes2022 = 0;
        }

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

        if ($Bumdes2021 != 0) {
            $data['bumdes2021'] = array_count_values($Bumdes2021);
        } else {
            $data['bumdes2021'] = 0;
        }

        if ($Bumdes2022 != 0) {
            $data['bumdes2022'] = array_count_values($Bumdes2022);
        } else {
            $data['bumdes2022'] = 0;
        }

        return view('sidesa/pemprov/bumdes', $data);
    }

    function kesehatan()
    {
        $data = [
            'title' => 'Kesehatan Tingkat Provinsi',
            'posyandu20' => $this->Kesehatan_model->posyandu20(''),
            'posyandu21' => $this->Kesehatan_model->posyandu21(''),
            'posyandu22' => $this->Kesehatan_model->posyandu22('')
        ];

        return view('sidesa/pemprov/kesehatan', $data);
    }

    function bankeu()
    {

        $data = [
            'title' => 'BANKEU Tingkat Provinsi',
            'bankeu_salur_cilacap' => $this->Bankeu_model->bankeu_salur_cilacap(),
            'bankeu_salur_banyumas' => $this->Bankeu_model->bankeu_salur_banyumas(),
            'bankeu_salur_purbalingga' => $this->Bankeu_model->bankeu_salur_purbalingga(),
            'bankeu_salur_banjarnegara' => $this->Bankeu_model->bankeu_salur_banjarnegara(),
            'bankeu_salur_kebumen' => $this->Bankeu_model->bankeu_salur_kebumen(),
            'bankeu_salur_purworejo' => $this->Bankeu_model->bankeu_salur_purworejo(),
            'bankeu_salur_wonosobo' => $this->Bankeu_model->bankeu_salur_wonosobo(),
            'bankeu_salur_magelang' => $this->Bankeu_model->bankeu_salur_magelang(),
            'bankeu_salur_boyolali' => $this->Bankeu_model->bankeu_salur_boyolali(),
            'bankeu_salur_klaten' => $this->Bankeu_model->bankeu_salur_klaten(),
            'bankeu_salur_sukoharjo' => $this->Bankeu_model->bankeu_salur_sukoharjo(),
            'bankeu_salur_wonogiri' => $this->Bankeu_model->bankeu_salur_wonogiri(),
            'bankeu_salur_karanganyar' => $this->Bankeu_model->bankeu_salur_karanganyar(),
            'bankeu_salur_sragen' => $this->Bankeu_model->bankeu_salur_sragen(),
            'bankeu_salur_grobogan' => $this->Bankeu_model->bankeu_salur_grobogan(),
            'bankeu_salur_blora' => $this->Bankeu_model->bankeu_salur_blora(),
            'bankeu_salur_rembang' => $this->Bankeu_model->bankeu_salur_rembang(),
            'bankeu_salur_pati' => $this->Bankeu_model->bankeu_salur_pati(),
            'bankeu_salur_kudus' => $this->Bankeu_model->bankeu_salur_kudus(),
            'bankeu_salur_jepara' => $this->Bankeu_model->bankeu_salur_jepara(),
            'bankeu_salur_demak' => $this->Bankeu_model->bankeu_salur_demak(),
            'bankeu_salur_semarang' => $this->Bankeu_model->bankeu_salur_semarang(),
            'bankeu_salur_temanggung' => $this->Bankeu_model->bankeu_salur_temanggung(),
            'bankeu_salur_kendal' => $this->Bankeu_model->bankeu_salur_kendal(),
            'bankeu_salur_batang' => $this->Bankeu_model->bankeu_salur_batang(),
            'bankeu_salur_pekalongan' => $this->Bankeu_model->bankeu_salur_pekalongan(),
            'bankeu_salur_pemalang' => $this->Bankeu_model->bankeu_salur_pemalang(),
            'bankeu_salur_tegal' => $this->Bankeu_model->bankeu_salur_tegal(),
            'bankeu_salur_brebes' => $this->Bankeu_model->bankeu_salur_brebes(),
            'bankeu_salur_2013' => $this->Bankeu_model->bankeu_salur_2013(''),
            'bankeu_salur_2014' => $this->Bankeu_model->bankeu_salur_2014(''),
            'bankeu_salur_2015' => $this->Bankeu_model->bankeu_salur_2015(''),
            'bankeu_salur_2016' => $this->Bankeu_model->bankeu_salur_2016(''),
            'bankeu_salur_2017' => $this->Bankeu_model->bankeu_salur_2017(''),
            'bankeu_salur_2018' => $this->Bankeu_model->bankeu_salur_2018(''),
            'bankeu_salur_2019' => $this->Bankeu_model->bankeu_salur_2019(''),
            'bankeu_salur_2020' => $this->Bankeu_model->bankeu_salur_2020(''),
            'bankeu_salur_2021' => $this->Bankeu_model->bankeu_salur_2021(''),
            'bankeu_salur_2022' => $this->Bankeu_model->bankeu_salur_2022(''),
            'bankeu_salur_2023' => $this->Bankeu_model->bankeu_salur_2023(''),
            'bankeu_salur_2024' => $this->Bankeu_model->bankeu_salur_2024(''),
            'bankeu_salur_2025' => $this->Bankeu_model->bankeu_salur_2025('')
        ];

        // dd($data['bankeu_salur_2020'][0]['bantuan']);

        return view('sidesa/pemprov/bankeu', $data);
    }

    function sosialbudaya()
    {
        $data = [
            'title' => 'Sosialbudaya Tingkat Provinsi',
            'satgas19' => $this->Sosialbudaya_model->satgas19(''),
            'satgas20' => $this->Sosialbudaya_model->satgas20(''),
            'satgas21' => $this->Sosialbudaya_model->satgas21(''),
            'satgas22' => $this->Sosialbudaya_model->satgas22('')
        ];

        return view('sidesa/pemprov/sosialbudaya', $data);
    }

    function keuangan()
    {
    }

    function danadesa()
    {
    }

    function rtlh()
    {
    }
}
