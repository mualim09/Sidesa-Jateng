<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Sidesa\User_provinsi5a_model;

class Provinsi5a extends BaseController
{
    protected $Provinsi5a_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Provinsi5a_model = new User_provinsi5a_model();
    }

    public function dashboard()
    {
        // logic cilacap
        $clp_salur = $this->Provinsi5a_model->danadesa_salur('33.01');
        if (isset($clp_salur)) {
            $cilacap_salur = $clp_salur['januari'] + $clp_salur['februari'] + $clp_salur['maret'] + $clp_salur['april'] + $clp_salur['mei'] + $clp_salur['juni'] + $clp_salur['juli'] + $clp_salur['agustus'] + $clp_salur['september'] + $clp_salur['oktober'] + $clp_salur['november'] + $clp_salur['desember'];
        } else {
            $cilacap_salur = 0;
        }
        $clp_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($clp_reg[0])) {
            $cilacap_reg = $clp_reg[0]['januari'] + $clp_reg[0]['februari'] + $clp_reg[0]['maret'] + $clp_reg[0]['april'] + $clp_reg[0]['mei'] + $clp_reg[0]['juni'] + $clp_reg[0]['juli'] + $clp_reg[0]['agustus'] + $clp_reg[0]['september'] + $clp_reg[0]['oktober'] + $clp_reg[0]['november'] + $clp_reg[0]['desember'];
        } else {
            $cilacap_reg = 0;
        }
        $clp_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($clp_bltdd[0])) {
            $cilacap_bltdd = $clp_bltdd[0]['januari'] + $clp_bltdd[0]['februari'] + $clp_bltdd[0]['maret'] + $clp_bltdd[0]['april'] + $clp_bltdd[0]['mei'] + $clp_bltdd[0]['juni'] + $clp_bltdd[0]['juli'] + $clp_bltdd[0]['agustus'] + $clp_bltdd[0]['september'] + $clp_bltdd[0]['oktober'] + $clp_bltdd[0]['november'] + $clp_bltdd[0]['desember'];
        } else {
            $cilacap_bltdd = 0;
        }
        $clp_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($clp_kph[0])) {
            $cilacap_kph = $clp_kph[0]['januari'] + $clp_kph[0]['februari'] + $clp_kph[0]['maret'] + $clp_kph[0]['april'] + $clp_kph[0]['mei'] + $clp_kph[0]['juni'] + $clp_kph[0]['juli'] + $clp_kph[0]['agustus'] + $clp_kph[0]['september'] + $clp_kph[0]['oktober'] + $clp_kph[0]['november'] + $clp_kph[0]['desember'];
        } else {
            $cilacap_kph = 0;
        }
        $clp_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($clp_covid[0])) {
            $cilacap_covid = $clp_covid[0]['januari'] + $clp_covid[0]['februari'] + $clp_covid[0]['maret'] + $clp_covid[0]['april'] + $clp_covid[0]['mei'] + $clp_covid[0]['juni'] + $clp_covid[0]['juli'] + $clp_covid[0]['agustus'] + $clp_covid[0]['september'] + $clp_covid[0]['oktober'] + $clp_covid[0]['november'] + $clp_covid[0]['desember'];
        } else {
            $cilacap_covid = 0;
        }

        // logic banyumas
        $bms_salur = $this->Provinsi5a_model->danadesa_salur('33.02');
        if (isset($bms_salur)) {
            $banyumas_salur = $bms_salur['januari'] + $bms_salur['februari'] + $bms_salur['maret'] + $bms_salur['april'] + $bms_salur['mei'] + $bms_salur['juni'] + $bms_salur['juli'] + $bms_salur['agustus'] + $bms_salur['september'] + $bms_salur['oktober'] + $bms_salur['november'] + $bms_salur['desember'];
        } else {
            $banyumas_salur = 0;
        }
        $bms_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($bms_reg[1])) {
            $banyumas_reg = $bms_reg[1]['januari'] + $bms_reg[1]['februari'] + $bms_reg[1]['maret'] + $bms_reg[1]['april'] + $bms_reg[1]['mei'] + $bms_reg[1]['juni'] + $bms_reg[1]['juli'] + $bms_reg[1]['agustus'] + $bms_reg[1]['september'] + $bms_reg[1]['oktober'] + $bms_reg[1]['november'] + $bms_reg[1]['desember'];
        } else {
            $banyumas_reg = 0;
        }
        $bms_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($bms_bltdd[1])) {
            $banyumas_bltdd = $bms_bltdd[1]['januari'] + $bms_bltdd[1]['februari'] + $bms_bltdd[1]['maret'] + $bms_bltdd[1]['april'] + $bms_bltdd[1]['mei'] + $bms_bltdd[1]['juni'] + $bms_bltdd[1]['juli'] + $bms_bltdd[1]['agustus'] + $bms_bltdd[1]['september'] + $bms_bltdd[1]['oktober'] + $bms_bltdd[1]['november'] + $bms_bltdd[1]['desember'];
        } else {
            $banyumas_bltdd = 0;
        }
        $bms_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($bms_kph[1])) {
            $banyumas_kph = $bms_kph[1]['januari'] + $bms_kph[1]['februari'] + $bms_kph[1]['maret'] + $bms_kph[1]['april'] + $bms_kph[1]['mei'] + $bms_kph[1]['juni'] + $bms_kph[1]['juli'] + $bms_kph[1]['agustus'] + $bms_kph[1]['september'] + $bms_kph[1]['oktober'] + $bms_kph[1]['november'] + $bms_kph[1]['desember'];
        } else {
            $banyumas_kph = 0;
        }
        $bms_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($bms_covid[1])) {
            $banyumas_covid = $bms_covid[1]['januari'] + $bms_covid[1]['februari'] + $bms_covid[1]['maret'] + $bms_covid[1]['april'] + $bms_covid[1]['mei'] + $bms_covid[1]['juni'] + $bms_covid[1]['juli'] + $bms_covid[1]['agustus'] + $bms_covid[1]['september'] + $bms_covid[1]['oktober'] + $bms_covid[1]['november'] + $bms_covid[1]['desember'];
        } else {
            $banyumas_covid = 0;
        }

        // Purbalingga
        $pbg_salur = $this->Provinsi5a_model->danadesa_salur('33.03');
        if (isset($pbg_salur)) {
            $purbalingga_salur = $pbg_salur['januari'] + $pbg_salur['februari'] + $pbg_salur['maret'] + $pbg_salur['april'] + $pbg_salur['mei'] + $pbg_salur['juni'] + $pbg_salur['juli'] + $pbg_salur['agustus'] + $pbg_salur['september'] + $pbg_salur['oktober'] + $pbg_salur['november'] + $pbg_salur['desember'];
        } else {
            $purbalingga_salur = 0;
        }
        $pbg_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($pbg_reg[2])) {
            $purbalingga_reg = $pbg_reg[2]['januari'] + $pbg_reg[2]['februari'] + $pbg_reg[2]['maret'] + $pbg_reg[2]['april'] + $pbg_reg[2]['mei'] + $pbg_reg[2]['juni'] + $pbg_reg[2]['juli'] + $pbg_reg[2]['agustus'] + $pbg_reg[2]['september'] + $pbg_reg[2]['oktober'] + $pbg_reg[2]['november'] + $pbg_reg[2]['desember'];
        } else {
            $purbalingga_reg = 0;
        }
        $pbg_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($pbg_bltdd[2])) {
            $purbalingga_bltdd = $pbg_bltdd[2]['januari'] + $pbg_bltdd[2]['februari'] + $pbg_bltdd[2]['maret'] + $pbg_bltdd[2]['april'] + $pbg_bltdd[2]['mei'] + $pbg_bltdd[2]['juni'] + $pbg_bltdd[2]['juli'] + $pbg_bltdd[2]['agustus'] + $pbg_bltdd[2]['september'] + $pbg_bltdd[2]['oktober'] + $pbg_bltdd[2]['november'] + $pbg_bltdd[2]['desember'];
        } else {
            $purbalingga_bltdd = 0;
        }
        $pbg_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($pbg_kph[2])) {
            $purbalingga_kph = $pbg_kph[2]['januari'] + $pbg_kph[2]['februari'] + $pbg_kph[2]['maret'] + $pbg_kph[2]['april'] + $pbg_kph[2]['mei'] + $pbg_kph[2]['juni'] + $pbg_kph[2]['juli'] + $pbg_kph[2]['agustus'] + $pbg_kph[2]['september'] + $pbg_kph[2]['oktober'] + $pbg_kph[2]['november'] + $pbg_kph[2]['desember'];
        } else {
            $purbalingga_kph = 0;
        }
        $pbg_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($pbg_covid[2])) {
            $purbalingga_covid = $pbg_covid[2]['januari'] + $pbg_covid[2]['februari'] + $pbg_covid[2]['maret'] + $pbg_covid[2]['april'] + $pbg_covid[2]['mei'] + $pbg_covid[2]['juni'] + $pbg_covid[2]['juli'] + $pbg_covid[2]['agustus'] + $pbg_covid[2]['september'] + $pbg_covid[2]['oktober'] + $pbg_covid[2]['november'] + $pbg_covid[2]['desember'];
        } else {
            $purbalingga_covid = 0;
        }

        // Banjarnegara
        $bna_salur = $this->Provinsi5a_model->danadesa_salur('33.04');
        if (isset($bna_salur)) {
            $banjarnegara_salur = $bna_salur['januari'] + $bna_salur['februari'] + $bna_salur['maret'] + $bna_salur['april'] + $bna_salur['mei'] + $bna_salur['juni'] + $bna_salur['juli'] + $bna_salur['agustus'] + $bna_salur['september'] + $bna_salur['oktober'] + $bna_salur['november'] + $bna_salur['desember'];
        } else {
            $banjarnegara_salur = 0;
        }
        $bna_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($bna_reg[3])) {
            $banjarnegara_reg = $bna_reg[3]['januari'] + $bna_reg[3]['februari'] + $bna_reg[3]['maret'] + $bna_reg[3]['april'] + $bna_reg[3]['mei'] + $bna_reg[3]['juni'] + $bna_reg[3]['juli'] + $bna_reg[3]['agustus'] + $bna_reg[3]['september'] + $bna_reg[3]['oktober'] + $bna_reg[3]['november'] + $bna_reg[3]['desember'];
        } else {
            $banjarnegara_reg = 0;
        }
        $bna_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($bna_bltdd[3])) {
            $banjarnegara_bltdd = $bna_bltdd[3]['januari'] + $bna_bltdd[3]['februari'] + $bna_bltdd[3]['maret'] + $bna_bltdd[3]['april'] + $bna_bltdd[3]['mei'] + $bna_bltdd[3]['juni'] + $bna_bltdd[3]['juli'] + $bna_bltdd[3]['agustus'] + $bna_bltdd[3]['september'] + $bna_bltdd[3]['oktober'] + $bna_bltdd[3]['november'] + $bna_bltdd[3]['desember'];
        } else {
            $banjarnegara_bltdd = 0;
        }
        $bna_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($bna_kph[3])) {
            $banjarnegara_kph = $bna_kph[3]['januari'] + $bna_kph[3]['februari'] + $bna_kph[3]['maret'] + $bna_kph[3]['april'] + $bna_kph[3]['mei'] + $bna_kph[3]['juni'] + $bna_kph[3]['juli'] + $bna_kph[3]['agustus'] + $bna_kph[3]['september'] + $bna_kph[3]['oktober'] + $bna_kph[3]['november'] + $bna_kph[3]['desember'];
        } else {
            $banjarnegara_kph = 0;
        }
        $bna_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($bna_covid[3])) {
            $banjarnegara_covid = $bna_covid[3]['januari'] + $bna_covid[3]['februari'] + $bna_covid[3]['maret'] + $bna_covid[3]['april'] + $bna_covid[3]['mei'] + $bna_covid[3]['juni'] + $bna_covid[3]['juli'] + $bna_covid[3]['agustus'] + $bna_covid[3]['september'] + $bna_covid[3]['oktober'] + $bna_covid[3]['november'] + $bna_covid[3]['desember'];
        } else {
            $banjarnegara_covid = 0;
        }

        // Kebumen
        $kbm_salur = $this->Provinsi5a_model->danadesa_salur('33.05');
        if (isset($kbm_salur)) {
            $kebumen_salur = $kbm_salur['januari'] + $kbm_salur['februari'] + $kbm_salur['maret'] + $kbm_salur['april'] + $kbm_salur['mei'] + $kbm_salur['juni'] + $kbm_salur['juli'] + $kbm_salur['agustus'] + $kbm_salur['september'] + $kbm_salur['oktober'] + $kbm_salur['november'] + $kbm_salur['desember'];
        } else {
            $kebumen_salur = 0;
        }
        $kbm_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($kbm_reg[4])) {
            $kebumen_reg = $kbm_reg[4]['januari'] + $kbm_reg[4]['februari'] + $kbm_reg[4]['maret'] + $kbm_reg[4]['april'] + $kbm_reg[4]['mei'] + $kbm_reg[4]['juni'] + $kbm_reg[4]['juli'] + $kbm_reg[4]['agustus'] + $kbm_reg[4]['september'] + $kbm_reg[4]['oktober'] + $kbm_reg[4]['november'] + $kbm_reg[4]['desember'];
        } else {
            $kebumen_reg = 0;
        }
        $kbm_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($kbm_bltdd[4])) {
            $kebumen_bltdd = $kbm_bltdd[4]['januari'] + $kbm_bltdd[4]['februari'] + $kbm_bltdd[4]['maret'] + $kbm_bltdd[4]['april'] + $kbm_bltdd[4]['mei'] + $kbm_bltdd[4]['juni'] + $kbm_bltdd[4]['juli'] + $kbm_bltdd[4]['agustus'] + $kbm_bltdd[4]['september'] + $kbm_bltdd[4]['oktober'] + $kbm_bltdd[4]['november'] + $kbm_bltdd[4]['desember'];
        } else {
            $kebumen_bltdd = 0;
        }
        $kbm_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($kbm_kph[4])) {
            $kebumen_kph = $kbm_kph[4]['januari'] + $kbm_kph[4]['februari'] + $kbm_kph[4]['maret'] + $kbm_kph[4]['april'] + $kbm_kph[4]['mei'] + $kbm_kph[4]['juni'] + $kbm_kph[4]['juli'] + $kbm_kph[4]['agustus'] + $kbm_kph[4]['september'] + $kbm_kph[4]['oktober'] + $kbm_kph[4]['november'] + $kbm_kph[4]['desember'];
        } else {
            $kebumen_kph = 0;
        }
        $kbm_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($kbm_covid[4])) {
            $kebumen_covid = $kbm_covid[4]['januari'] + $kbm_covid[4]['februari'] + $kbm_covid[4]['maret'] + $kbm_covid[4]['april'] + $kbm_covid[4]['mei'] + $kbm_covid[4]['juni'] + $kbm_covid[4]['juli'] + $kbm_covid[4]['agustus'] + $kbm_covid[4]['september'] + $kbm_covid[4]['oktober'] + $kbm_covid[4]['november'] + $kbm_covid[4]['desember'];
        } else {
            $kebumen_covid = 0;
        }

        // purworejo
        $pwj_salur = $this->Provinsi5a_model->danadesa_salur('33.06');
        if (isset($pwj_salur)) {
            $purworejo_salur = $pwj_salur['januari'] + $pwj_salur['februari'] + $pwj_salur['maret'] + $pwj_salur['april'] + $pwj_salur['mei'] + $pwj_salur['juni'] + $pwj_salur['juli'] + $pwj_salur['agustus'] + $pwj_salur['september'] + $pwj_salur['oktober'] + $pwj_salur['november'] + $pwj_salur['desember'];
        } else {
            $purworejo_salur = 0;
        }
        $pwj_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($pwj_reg[5])) {
            $purworejo_reg = $pwj_reg[5]['januari'] + $pwj_reg[5]['februari'] + $pwj_reg[5]['maret'] + $pwj_reg[5]['april'] + $pwj_reg[5]['mei'] + $pwj_reg[5]['juni'] + $pwj_reg[5]['juli'] + $pwj_reg[5]['agustus'] + $pwj_reg[5]['september'] + $pwj_reg[5]['oktober'] + $pwj_reg[5]['november'] + $pwj_reg[5]['desember'];
        } else {
            $purworejo_reg = 0;
        }
        $pwj_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($pwj_bltdd[5])) {
            $purworejo_bltdd = $pwj_bltdd[5]['januari'] + $pwj_bltdd[5]['februari'] + $pwj_bltdd[5]['maret'] + $pwj_bltdd[5]['april'] + $pwj_bltdd[5]['mei'] + $pwj_bltdd[5]['juni'] + $pwj_bltdd[5]['juli'] + $pwj_bltdd[5]['agustus'] + $pwj_bltdd[5]['september'] + $pwj_bltdd[5]['oktober'] + $pwj_bltdd[5]['november'] + $pwj_bltdd[5]['desember'];
        } else {
            $purworejo_bltdd = 0;
        }
        $pwj_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($pwj_kph[5])) {
            $purworejo_kph = $pwj_kph[5]['januari'] + $pwj_kph[5]['februari'] + $pwj_kph[5]['maret'] + $pwj_kph[5]['april'] + $pwj_kph[5]['mei'] + $pwj_kph[5]['juni'] + $pwj_kph[5]['juli'] + $pwj_kph[5]['agustus'] + $pwj_kph[5]['september'] + $pwj_kph[5]['oktober'] + $pwj_kph[5]['november'] + $pwj_kph[5]['desember'];
        } else {
            $purworejo_kph = 0;
        }
        $pwj_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($pwj_covid[5])) {
            $purworejo_covid = $pwj_covid[5]['januari'] + $pwj_covid[5]['februari'] + $pwj_covid[5]['maret'] + $pwj_covid[5]['april'] + $pwj_covid[5]['mei'] + $pwj_covid[5]['juni'] + $pwj_covid[5]['juli'] + $pwj_covid[5]['agustus'] + $pwj_covid[5]['september'] + $pwj_covid[5]['oktober'] + $pwj_covid[5]['november'] + $pwj_covid[5]['desember'];
        } else {
            $purworejo_covid = 0;
        }

        // wonosobo
        $wnb_salur = $this->Provinsi5a_model->danadesa_salur('33.07');
        if (isset($wnb_salur)) {
            $wonosobo_salur = $wnb_salur['januari'] + $wnb_salur['februari'] + $wnb_salur['maret'] + $wnb_salur['april'] + $wnb_salur['mei'] + $wnb_salur['juni'] + $wnb_salur['juli'] + $wnb_salur['agustus'] + $wnb_salur['september'] + $wnb_salur['oktober'] + $wnb_salur['november'] + $wnb_salur['desember'];
        } else {
            $wonosobo_salur = 0;
        }
        $wnb_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($wnb_reg[6])) {
            $wonosobo_reg = $wnb_reg[6]['januari'] + $wnb_reg[6]['februari'] + $wnb_reg[6]['maret'] + $wnb_reg[6]['april'] + $wnb_reg[6]['mei'] + $wnb_reg[6]['juni'] + $wnb_reg[6]['juli'] + $wnb_reg[6]['agustus'] + $wnb_reg[6]['september'] + $wnb_reg[6]['oktober'] + $wnb_reg[6]['november'] + $wnb_reg[6]['desember'];
        } else {
            $wonosobo_reg = 0;
        }
        $wnb_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($wnb_bltdd[6])) {
            $wonosobo_bltdd = $wnb_bltdd[6]['januari'] + $wnb_bltdd[6]['februari'] + $wnb_bltdd[6]['maret'] + $wnb_bltdd[6]['april'] + $wnb_bltdd[6]['mei'] + $wnb_bltdd[6]['juni'] + $wnb_bltdd[6]['juli'] + $wnb_bltdd[6]['agustus'] + $wnb_bltdd[6]['september'] + $wnb_bltdd[6]['oktober'] + $wnb_bltdd[6]['november'] + $wnb_bltdd[6]['desember'];
        } else {
            $wonosobo_bltdd = 0;
        }
        $wnb_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($wnb_kph[6])) {
            $wonosobo_kph = $wnb_kph[6]['januari'] + $wnb_kph[6]['februari'] + $wnb_kph[6]['maret'] + $wnb_kph[6]['april'] + $wnb_kph[6]['mei'] + $wnb_kph[6]['juni'] + $wnb_kph[6]['juli'] + $wnb_kph[6]['agustus'] + $wnb_kph[6]['september'] + $wnb_kph[6]['oktober'] + $wnb_kph[6]['november'] + $wnb_kph[6]['desember'];
        } else {
            $wonosobo_kph = 0;
        }
        $wnb_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($wnb_covid[6])) {
            $wonosobo_covid = $wnb_covid[6]['januari'] + $wnb_covid[6]['februari'] + $wnb_covid[6]['maret'] + $wnb_covid[6]['april'] + $wnb_covid[6]['mei'] + $wnb_covid[6]['juni'] + $wnb_covid[6]['juli'] + $wnb_covid[6]['agustus'] + $wnb_covid[6]['september'] + $wnb_covid[6]['oktober'] + $wnb_covid[6]['november'] + $wnb_covid[6]['desember'];
        } else {
            $wonosobo_covid = 0;
        }

        // magelang
        $mgl_salur = $this->Provinsi5a_model->danadesa_salur('33.08');
        if (isset($mgl_salur)) {
            $magelang_salur = $mgl_salur['januari'] + $mgl_salur['februari'] + $mgl_salur['maret'] + $mgl_salur['april'] + $mgl_salur['mei'] + $mgl_salur['juni'] + $mgl_salur['juli'] + $mgl_salur['agustus'] + $mgl_salur['september'] + $mgl_salur['oktober'] + $mgl_salur['november'] + $mgl_salur['desember'];
        } else {
            $magelang_salur = 0;
        }
        $mgl_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($mgl_reg[7])) {
            $magelang_reg = $mgl_reg[7]['januari'] + $mgl_reg[7]['februari'] + $mgl_reg[7]['maret'] + $mgl_reg[7]['april'] + $mgl_reg[7]['mei'] + $mgl_reg[7]['juni'] + $mgl_reg[7]['juli'] + $mgl_reg[7]['agustus'] + $mgl_reg[7]['september'] + $mgl_reg[7]['oktober'] + $mgl_reg[7]['november'] + $mgl_reg[7]['desember'];
        } else {
            $magelang_reg = 0;
        }
        $mgl_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($mgl_bltdd[7])) {
            $magelang_bltdd = $mgl_bltdd[7]['januari'] + $mgl_bltdd[7]['februari'] + $mgl_bltdd[7]['maret'] + $mgl_bltdd[7]['april'] + $mgl_bltdd[7]['mei'] + $mgl_bltdd[7]['juni'] + $mgl_bltdd[7]['juli'] + $mgl_bltdd[7]['agustus'] + $mgl_bltdd[7]['september'] + $mgl_bltdd[7]['oktober'] + $mgl_bltdd[7]['november'] + $mgl_bltdd[7]['desember'];
        } else {
            $magelang_bltdd = 0;
        }
        $mgl_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($mgl_kph[7])) {
            $magelang_kph = $mgl_kph[7]['januari'] + $mgl_kph[7]['februari'] + $mgl_kph[7]['maret'] + $mgl_kph[7]['april'] + $mgl_kph[7]['mei'] + $mgl_kph[7]['juni'] + $mgl_kph[7]['juli'] + $mgl_kph[7]['agustus'] + $mgl_kph[7]['september'] + $mgl_kph[7]['oktober'] + $mgl_kph[7]['november'] + $mgl_kph[7]['desember'];
        } else {
            $magelang_kph = 0;
        }
        $mgl_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($mgl_covid[7])) {
            $magelang_covid = $mgl_covid[7]['januari'] + $mgl_covid[7]['februari'] + $mgl_covid[7]['maret'] + $mgl_covid[7]['april'] + $mgl_covid[7]['mei'] + $mgl_covid[7]['juni'] + $mgl_covid[7]['juli'] + $mgl_covid[7]['agustus'] + $mgl_covid[7]['september'] + $mgl_covid[7]['oktober'] + $mgl_covid[7]['november'] + $mgl_covid[7]['desember'];
        } else {
            $magelang_covid = 0;
        }

        // boyolali
        $byl_salur = $this->Provinsi5a_model->danadesa_salur('33.09');
        if (isset($byl_salur)) {
            $boyolali_salur = $byl_salur['januari'] + $byl_salur['februari'] + $byl_salur['maret'] + $byl_salur['april'] + $byl_salur['mei'] + $byl_salur['juni'] + $byl_salur['juli'] + $byl_salur['agustus'] + $byl_salur['september'] + $byl_salur['oktober'] + $byl_salur['november'] + $byl_salur['desember'];
        } else {
            $boyolali_salur = 0;
        }
        $byl_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($byl_reg[8])) {
            $boyolali_reg = $byl_reg[8]['januari'] + $byl_reg[8]['februari'] + $byl_reg[8]['maret'] + $byl_reg[8]['april'] + $byl_reg[8]['mei'] + $byl_reg[8]['juni'] + $byl_reg[8]['juli'] + $byl_reg[8]['agustus'] + $byl_reg[8]['september'] + $byl_reg[8]['oktober'] + $byl_reg[8]['november'] + $byl_reg[8]['desember'];
        } else {
            $boyolali_reg = 0;
        }
        $byl_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($byl_bltdd[8])) {
            $boyolali_bltdd = $byl_bltdd[8]['januari'] + $byl_bltdd[8]['februari'] + $byl_bltdd[8]['maret'] + $byl_bltdd[8]['april'] + $byl_bltdd[8]['mei'] + $byl_bltdd[8]['juni'] + $byl_bltdd[8]['juli'] + $byl_bltdd[8]['agustus'] + $byl_bltdd[8]['september'] + $byl_bltdd[8]['oktober'] + $byl_bltdd[8]['november'] + $byl_bltdd[8]['desember'];
        } else {
            $boyolali_bltdd = 0;
        }
        $byl_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($byl_kph[8])) {
            $boyolali_kph = $byl_kph[8]['januari'] + $byl_kph[8]['februari'] + $byl_kph[8]['maret'] + $byl_kph[8]['april'] + $byl_kph[8]['mei'] + $byl_kph[8]['juni'] + $byl_kph[8]['juli'] + $byl_kph[8]['agustus'] + $byl_kph[8]['september'] + $byl_kph[8]['oktober'] + $byl_kph[8]['november'] + $byl_kph[8]['desember'];
        } else {
            $boyolali_kph = 0;
        }
        $byl_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($byl_covid[8])) {
            $boyolali_covid = $byl_covid[8]['januari'] + $byl_covid[8]['februari'] + $byl_covid[8]['maret'] + $byl_covid[8]['april'] + $byl_covid[8]['mei'] + $byl_covid[8]['juni'] + $byl_covid[8]['juli'] + $byl_covid[8]['agustus'] + $byl_covid[8]['september'] + $byl_covid[8]['oktober'] + $byl_covid[8]['november'] + $byl_covid[8]['desember'];
        } else {
            $boyolali_covid = 0;
        }

        // klaten
        $klt_salur = $this->Provinsi5a_model->danadesa_salur('33.10');
        if (isset($klt_salur)) {
            $klaten_salur = $klt_salur['januari'] + $klt_salur['februari'] + $klt_salur['maret'] + $klt_salur['april'] + $klt_salur['mei'] + $klt_salur['juni'] + $klt_salur['juli'] + $klt_salur['agustus'] + $klt_salur['september'] + $klt_salur['oktober'] + $klt_salur['november'] + $klt_salur['desember'];
        } else {
            $klaten_salur = 0;
        }
        $klt_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($klt_reg[9])) {
            $klaten_reg = $klt_reg[9]['januari'] + $klt_reg[9]['februari'] + $klt_reg[9]['maret'] + $klt_reg[9]['april'] + $klt_reg[9]['mei'] + $klt_reg[9]['juni'] + $klt_reg[9]['juli'] + $klt_reg[9]['agustus'] + $klt_reg[9]['september'] + $klt_reg[9]['oktober'] + $klt_reg[9]['november'] + $klt_reg[9]['desember'];
        } else {
            $klaten_reg = 0;
        }
        $klt_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($klt_bltdd[9])) {
            $klaten_bltdd = $klt_bltdd[9]['januari'] + $klt_bltdd[9]['februari'] + $klt_bltdd[9]['maret'] + $klt_bltdd[9]['april'] + $klt_bltdd[9]['mei'] + $klt_bltdd[9]['juni'] + $klt_bltdd[9]['juli'] + $klt_bltdd[9]['agustus'] + $klt_bltdd[9]['september'] + $klt_bltdd[9]['oktober'] + $klt_bltdd[9]['november'] + $klt_bltdd[9]['desember'];
        } else {
            $klaten_bltdd = 0;
        }
        $klt_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($klt_kph[9])) {
            $klaten_kph = $klt_kph[9]['januari'] + $klt_kph[9]['februari'] + $klt_kph[9]['maret'] + $klt_kph[9]['april'] + $klt_kph[9]['mei'] + $klt_kph[9]['juni'] + $klt_kph[9]['juli'] + $klt_kph[9]['agustus'] + $klt_kph[9]['september'] + $klt_kph[9]['oktober'] + $klt_kph[9]['november'] + $klt_kph[9]['desember'];
        } else {
            $klaten_kph = 0;
        }
        $klt_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($klt_covid[9])) {
            $klaten_covid = $klt_covid[9]['januari'] + $klt_covid[9]['februari'] + $klt_covid[9]['maret'] + $klt_covid[9]['april'] + $klt_covid[9]['mei'] + $klt_covid[9]['juni'] + $klt_covid[9]['juli'] + $klt_covid[9]['agustus'] + $klt_covid[9]['september'] + $klt_covid[9]['oktober'] + $klt_covid[9]['november'] + $klt_covid[9]['desember'];
        } else {
            $klaten_covid = 0;
        }

        // sukoharjo
        $sjo_salur = $this->Provinsi5a_model->danadesa_salur('33.11');
        if (isset($sjo_salur)) {
            $sukoharjo_salur = $sjo_salur['januari'] + $sjo_salur['februari'] + $sjo_salur['maret'] + $sjo_salur['april'] + $sjo_salur['mei'] + $sjo_salur['juni'] + $sjo_salur['juli'] + $sjo_salur['agustus'] + $sjo_salur['september'] + $sjo_salur['oktober'] + $sjo_salur['november'] + $sjo_salur['desember'];
        } else {
            $sukoharjo_salur = 0;
        }
        $sjo_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($sjo_reg[10])) {
            $sukoharjo_reg = $sjo_reg[10]['januari'] + $sjo_reg[10]['februari'] + $sjo_reg[10]['maret'] + $sjo_reg[10]['april'] + $sjo_reg[10]['mei'] + $sjo_reg[10]['juni'] + $sjo_reg[10]['juli'] + $sjo_reg[10]['agustus'] + $sjo_reg[10]['september'] + $sjo_reg[10]['oktober'] + $sjo_reg[10]['november'] + $sjo_reg[10]['desember'];
        } else {
            $sukoharjo_reg = 0;
        }
        $sjo_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($sjo_bltdd[10])) {
            $sukoharjo_bltdd = $sjo_bltdd[10]['januari'] + $sjo_bltdd[10]['februari'] + $sjo_bltdd[10]['maret'] + $sjo_bltdd[10]['april'] + $sjo_bltdd[10]['mei'] + $sjo_bltdd[10]['juni'] + $sjo_bltdd[10]['juli'] + $sjo_bltdd[10]['agustus'] + $sjo_bltdd[10]['september'] + $sjo_bltdd[10]['oktober'] + $sjo_bltdd[10]['november'] + $sjo_bltdd[10]['desember'];
        } else {
            $sukoharjo_bltdd = 0;
        }
        $sjo_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($sjo_kph[10])) {
            $sukoharjo_kph = $sjo_kph[10]['januari'] + $sjo_kph[10]['februari'] + $sjo_kph[10]['maret'] + $sjo_kph[10]['april'] + $sjo_kph[10]['mei'] + $sjo_kph[10]['juni'] + $sjo_kph[10]['juli'] + $sjo_kph[10]['agustus'] + $sjo_kph[10]['september'] + $sjo_kph[10]['oktober'] + $sjo_kph[10]['november'] + $sjo_kph[10]['desember'];
        } else {
            $sukoharjo_kph = 0;
        }
        $sjo_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($sjo_covid[10])) {
            $sukoharjo_covid = $sjo_covid[10]['januari'] + $sjo_covid[10]['februari'] + $sjo_covid[10]['maret'] + $sjo_covid[10]['april'] + $sjo_covid[10]['mei'] + $sjo_covid[10]['juni'] + $sjo_covid[10]['juli'] + $sjo_covid[10]['agustus'] + $sjo_covid[10]['september'] + $sjo_covid[10]['oktober'] + $sjo_covid[10]['november'] + $sjo_covid[10]['desember'];
        } else {
            $sukoharjo_covid = 0;
        }

        // wonogiri
        $wgi_salur = $this->Provinsi5a_model->danadesa_salur('33.12');
        if (isset($wgi_salur)) {
            $wonogiri_salur = $wgi_salur['januari'] + $wgi_salur['februari'] + $wgi_salur['maret'] + $wgi_salur['april'] + $wgi_salur['mei'] + $wgi_salur['juni'] + $wgi_salur['juli'] + $wgi_salur['agustus'] + $wgi_salur['september'] + $wgi_salur['oktober'] + $wgi_salur['november'] + $wgi_salur['desember'];
        } else {
            $wonogiri_salur = 0;
        }
        $wgi_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($wgi_reg[11])) {
            $wonogiri_reg = $wgi_reg[11]['januari'] + $wgi_reg[11]['februari'] + $wgi_reg[11]['maret'] + $wgi_reg[11]['april'] + $wgi_reg[11]['mei'] + $wgi_reg[11]['juni'] + $wgi_reg[11]['juli'] + $wgi_reg[11]['agustus'] + $wgi_reg[11]['september'] + $wgi_reg[11]['oktober'] + $wgi_reg[11]['november'] + $wgi_reg[11]['desember'];
        } else {
            $wonogiri_reg = 0;
        }
        $wgi_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($wgi_bltdd[11])) {
            $wonogiri_bltdd = $wgi_bltdd[11]['januari'] + $wgi_bltdd[11]['februari'] + $wgi_bltdd[11]['maret'] + $wgi_bltdd[11]['april'] + $wgi_bltdd[11]['mei'] + $wgi_bltdd[11]['juni'] + $wgi_bltdd[11]['juli'] + $wgi_bltdd[11]['agustus'] + $wgi_bltdd[11]['september'] + $wgi_bltdd[11]['oktober'] + $wgi_bltdd[11]['november'] + $wgi_bltdd[11]['desember'];
        } else {
            $wonogiri_bltdd = 0;
        }
        $wgi_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($wgi_kph[11])) {
            $wonogiri_kph = $wgi_kph[11]['januari'] + $wgi_kph[11]['februari'] + $wgi_kph[11]['maret'] + $wgi_kph[11]['april'] + $wgi_kph[11]['mei'] + $wgi_kph[11]['juni'] + $wgi_kph[11]['juli'] + $wgi_kph[11]['agustus'] + $wgi_kph[11]['september'] + $wgi_kph[11]['oktober'] + $wgi_kph[11]['november'] + $wgi_kph[11]['desember'];
        } else {
            $wonogiri_kph = 0;
        }
        $wgi_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($wgi_covid[11])) {
            $wonogiri_covid = $wgi_covid[11]['januari'] + $wgi_covid[11]['februari'] + $wgi_covid[11]['maret'] + $wgi_covid[11]['april'] + $wgi_covid[11]['mei'] + $wgi_covid[11]['juni'] + $wgi_covid[11]['juli'] + $wgi_covid[11]['agustus'] + $wgi_covid[11]['september'] + $wgi_covid[11]['oktober'] + $wgi_covid[11]['november'] + $wgi_covid[11]['desember'];
        } else {
            $wonogiri_covid = 0;
        }

        // karanganyar
        $kra_salur = $this->Provinsi5a_model->danadesa_salur('33.13');
        if (isset($kra_salur)) {
            $karanganyar_salur = $kra_salur['januari'] + $kra_salur['februari'] + $kra_salur['maret'] + $kra_salur['april'] + $kra_salur['mei'] + $kra_salur['juni'] + $kra_salur['juli'] + $kra_salur['agustus'] + $kra_salur['september'] + $kra_salur['oktober'] + $kra_salur['november'] + $kra_salur['desember'];
        } else {
            $karanganyar_salur = 0;
        }
        $kra_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($kra_reg[12])) {
            $karanganyar_reg = $kra_reg[12]['januari'] + $kra_reg[12]['februari'] + $kra_reg[12]['maret'] + $kra_reg[12]['april'] + $kra_reg[12]['mei'] + $kra_reg[12]['juni'] + $kra_reg[12]['juli'] + $kra_reg[12]['agustus'] + $kra_reg[12]['september'] + $kra_reg[12]['oktober'] + $kra_reg[12]['november'] + $kra_reg[12]['desember'];
        } else {
            $karanganyar_reg = 0;
        }
        $kra_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($kra_bltdd[12])) {
            $karanganyar_bltdd = $kra_bltdd[12]['januari'] + $kra_bltdd[12]['februari'] + $kra_bltdd[12]['maret'] + $kra_bltdd[12]['april'] + $kra_bltdd[12]['mei'] + $kra_bltdd[12]['juni'] + $kra_bltdd[12]['juli'] + $kra_bltdd[12]['agustus'] + $kra_bltdd[12]['september'] + $kra_bltdd[12]['oktober'] + $kra_bltdd[12]['november'] + $kra_bltdd[12]['desember'];
        } else {
            $karanganyar_bltdd = 0;
        }
        $kra_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($kra_kph[12])) {
            $karanganyar_kph = $kra_kph[12]['januari'] + $kra_kph[12]['februari'] + $kra_kph[12]['maret'] + $kra_kph[12]['april'] + $kra_kph[12]['mei'] + $kra_kph[12]['juni'] + $kra_kph[12]['juli'] + $kra_kph[12]['agustus'] + $kra_kph[12]['september'] + $kra_kph[12]['oktober'] + $kra_kph[12]['november'] + $kra_kph[12]['desember'];
        } else {
            $karanganyar_kph = 0;
        }
        $kra_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($kra_covid[12])) {
            $karanganyar_covid = $kra_covid[12]['januari'] + $kra_covid[12]['februari'] + $kra_covid[12]['maret'] + $kra_covid[12]['april'] + $kra_covid[12]['mei'] + $kra_covid[12]['juni'] + $kra_covid[12]['juli'] + $kra_covid[12]['agustus'] + $kra_covid[12]['september'] + $kra_covid[12]['oktober'] + $kra_covid[12]['november'] + $kra_covid[12]['desember'];
        } else {
            $karanganyar_covid = 0;
        }

        // sragen
        $srg_salur = $this->Provinsi5a_model->danadesa_salur('33.14');
        if (isset($srg_salur)) {
            $sragen_salur = $srg_salur['januari'] + $srg_salur['februari'] + $srg_salur['maret'] + $srg_salur['april'] + $srg_salur['mei'] + $srg_salur['juni'] + $srg_salur['juli'] + $srg_salur['agustus'] + $srg_salur['september'] + $srg_salur['oktober'] + $srg_salur['november'] + $srg_salur['desember'];
        } else {
            $sragen_salur = 0;
        }
        $srg_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($srg_reg[13])) {
            $sragen_reg = $srg_reg[13]['januari'] + $srg_reg[13]['februari'] + $srg_reg[13]['maret'] + $srg_reg[13]['april'] + $srg_reg[13]['mei'] + $srg_reg[13]['juni'] + $srg_reg[13]['juli'] + $srg_reg[13]['agustus'] + $srg_reg[13]['september'] + $srg_reg[13]['oktober'] + $srg_reg[13]['november'] + $srg_reg[13]['desember'];
        } else {
            $sragen_reg = 0;
        }
        $srg_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($srg_bltdd[13])) {
            $sragen_bltdd = $srg_bltdd[13]['januari'] + $srg_bltdd[13]['februari'] + $srg_bltdd[13]['maret'] + $srg_bltdd[13]['april'] + $srg_bltdd[13]['mei'] + $srg_bltdd[13]['juni'] + $srg_bltdd[13]['juli'] + $srg_bltdd[13]['agustus'] + $srg_bltdd[13]['september'] + $srg_bltdd[13]['oktober'] + $srg_bltdd[13]['november'] + $srg_bltdd[13]['desember'];
        } else {
            $sragen_bltdd = 0;
        }
        $srg_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($srg_kph[13])) {
            $sragen_kph = $srg_kph[13]['januari'] + $srg_kph[13]['februari'] + $srg_kph[13]['maret'] + $srg_kph[13]['april'] + $srg_kph[13]['mei'] + $srg_kph[13]['juni'] + $srg_kph[13]['juli'] + $srg_kph[13]['agustus'] + $srg_kph[13]['september'] + $srg_kph[13]['oktober'] + $srg_kph[13]['november'] + $srg_kph[13]['desember'];
        } else {
            $sragen_kph = 0;
        }
        $srg_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($srg_covid[13])) {
            $sragen_covid = $srg_covid[13]['januari'] + $srg_covid[13]['februari'] + $srg_covid[13]['maret'] + $srg_covid[13]['april'] + $srg_covid[13]['mei'] + $srg_covid[13]['juni'] + $srg_covid[13]['juli'] + $srg_covid[13]['agustus'] + $srg_covid[13]['september'] + $srg_covid[13]['oktober'] + $srg_covid[13]['november'] + $srg_covid[13]['desember'];
        } else {
            $sragen_covid = 0;
        }

        // grobogan
        $gbn_salur = $this->Provinsi5a_model->danadesa_salur('33.15');
        if (isset($gbn_salur)) {
            $grobogan_salur = $gbn_salur['januari'] + $gbn_salur['februari'] + $gbn_salur['maret'] + $gbn_salur['april'] + $gbn_salur['mei'] + $gbn_salur['juni'] + $gbn_salur['juli'] + $gbn_salur['agustus'] + $gbn_salur['september'] + $gbn_salur['oktober'] + $gbn_salur['november'] + $gbn_salur['desember'];
        } else {
            $grobogan_salur = 0;
        }
        $gbn_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($gbn_reg[14])) {
            $grobogan_reg = $gbn_reg[14]['januari'] + $gbn_reg[14]['februari'] + $gbn_reg[14]['maret'] + $gbn_reg[14]['april'] + $gbn_reg[14]['mei'] + $gbn_reg[14]['juni'] + $gbn_reg[14]['juli'] + $gbn_reg[14]['agustus'] + $gbn_reg[14]['september'] + $gbn_reg[14]['oktober'] + $gbn_reg[14]['november'] + $gbn_reg[14]['desember'];
        } else {
            $grobogan_reg = 0;
        }
        $gbn_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($gbn_bltdd[14])) {
            $grobogan_bltdd = $gbn_bltdd[14]['januari'] + $gbn_bltdd[14]['februari'] + $gbn_bltdd[14]['maret'] + $gbn_bltdd[14]['april'] + $gbn_bltdd[14]['mei'] + $gbn_bltdd[14]['juni'] + $gbn_bltdd[14]['juli'] + $gbn_bltdd[14]['agustus'] + $gbn_bltdd[14]['september'] + $gbn_bltdd[14]['oktober'] + $gbn_bltdd[14]['november'] + $gbn_bltdd[14]['desember'];
        } else {
            $grobogan_bltdd = 0;
        }
        $gbn_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($gbn_kph[14])) {
            $grobogan_kph = $gbn_kph[14]['januari'] + $gbn_kph[14]['februari'] + $gbn_kph[14]['maret'] + $gbn_kph[14]['april'] + $gbn_kph[14]['mei'] + $gbn_kph[14]['juni'] + $gbn_kph[14]['juli'] + $gbn_kph[14]['agustus'] + $gbn_kph[14]['september'] + $gbn_kph[14]['oktober'] + $gbn_kph[14]['november'] + $gbn_kph[14]['desember'];
        } else {
            $grobogan_kph = 0;
        }
        $gbn_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($gbn_covid[14])) {
            $grobogan_covid = $gbn_covid[14]['januari'] + $gbn_covid[14]['februari'] + $gbn_covid[14]['maret'] + $gbn_covid[14]['april'] + $gbn_covid[14]['mei'] + $gbn_covid[14]['juni'] + $gbn_covid[14]['juli'] + $gbn_covid[14]['agustus'] + $gbn_covid[14]['september'] + $gbn_covid[14]['oktober'] + $gbn_covid[14]['november'] + $gbn_covid[14]['desember'];
        } else {
            $grobogan_covid = 0;
        }

        // blora
        $blr_salur = $this->Provinsi5a_model->danadesa_salur('33.16');
        if (isset($blr_salur)) {
            $blora_salur = $blr_salur['januari'] + $blr_salur['februari'] + $blr_salur['maret'] + $blr_salur['april'] + $blr_salur['mei'] + $blr_salur['juni'] + $blr_salur['juli'] + $blr_salur['agustus'] + $blr_salur['september'] + $blr_salur['oktober'] + $blr_salur['november'] + $blr_salur['desember'];
        } else {
            $blora_salur = 0;
        }
        $blr_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($blr_reg[15])) {
            $blora_reg = $blr_reg[15]['januari'] + $blr_reg[15]['februari'] + $blr_reg[15]['maret'] + $blr_reg[15]['april'] + $blr_reg[15]['mei'] + $blr_reg[15]['juni'] + $blr_reg[15]['juli'] + $blr_reg[15]['agustus'] + $blr_reg[15]['september'] + $blr_reg[15]['oktober'] + $blr_reg[15]['november'] + $blr_reg[15]['desember'];
        } else {
            $blora_reg = 0;
        }
        $blr_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($blr_bltdd[15])) {
            $blora_bltdd = $blr_bltdd[15]['januari'] + $blr_bltdd[15]['februari'] + $blr_bltdd[15]['maret'] + $blr_bltdd[15]['april'] + $blr_bltdd[15]['mei'] + $blr_bltdd[15]['juni'] + $blr_bltdd[15]['juli'] + $blr_bltdd[15]['agustus'] + $blr_bltdd[15]['september'] + $blr_bltdd[15]['oktober'] + $blr_bltdd[15]['november'] + $blr_bltdd[15]['desember'];
        } else {
            $blora_bltdd = 0;
        }
        $blr_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($blr_kph[15])) {
            $blora_kph = $blr_kph[15]['januari'] + $blr_kph[15]['februari'] + $blr_kph[15]['maret'] + $blr_kph[15]['april'] + $blr_kph[15]['mei'] + $blr_kph[15]['juni'] + $blr_kph[15]['juli'] + $blr_kph[15]['agustus'] + $blr_kph[15]['september'] + $blr_kph[15]['oktober'] + $blr_kph[15]['november'] + $blr_kph[15]['desember'];
        } else {
            $blora_kph = 0;
        }
        $blr_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($blr_covid[15])) {
            $blora_covid = $blr_covid[15]['januari'] + $blr_covid[15]['februari'] + $blr_covid[15]['maret'] + $blr_covid[15]['april'] + $blr_covid[15]['mei'] + $blr_covid[15]['juni'] + $blr_covid[15]['juli'] + $blr_covid[15]['agustus'] + $blr_covid[15]['september'] + $blr_covid[15]['oktober'] + $blr_covid[15]['november'] + $blr_covid[15]['desember'];
        } else {
            $blora_covid = 0;
        }

        // rembang
        $rmb_salur = $this->Provinsi5a_model->danadesa_salur('33.17');
        if (isset($rmb_salur)) {
            $rembang_salur = $rmb_salur['januari'] + $rmb_salur['februari'] + $rmb_salur['maret'] + $rmb_salur['april'] + $rmb_salur['mei'] + $rmb_salur['juni'] + $rmb_salur['juli'] + $rmb_salur['agustus'] + $rmb_salur['september'] + $rmb_salur['oktober'] + $rmb_salur['november'] + $rmb_salur['desember'];
        } else {
            $rembang_salur = 0;
        }
        $rmb_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($rmb_reg[16])) {
            $rembang_reg = $rmb_reg[16]['januari'] + $rmb_reg[16]['februari'] + $rmb_reg[16]['maret'] + $rmb_reg[16]['april'] + $rmb_reg[16]['mei'] + $rmb_reg[16]['juni'] + $rmb_reg[16]['juli'] + $rmb_reg[16]['agustus'] + $rmb_reg[16]['september'] + $rmb_reg[16]['oktober'] + $rmb_reg[16]['november'] + $rmb_reg[16]['desember'];
        } else {
            $rembang_reg = 0;
        }
        $rmb_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($rmb_bltdd[16])) {
            $rembang_bltdd = $rmb_bltdd[16]['januari'] + $rmb_bltdd[16]['februari'] + $rmb_bltdd[16]['maret'] + $rmb_bltdd[16]['april'] + $rmb_bltdd[16]['mei'] + $rmb_bltdd[16]['juni'] + $rmb_bltdd[16]['juli'] + $rmb_bltdd[16]['agustus'] + $rmb_bltdd[16]['september'] + $rmb_bltdd[16]['oktober'] + $rmb_bltdd[16]['november'] + $rmb_bltdd[16]['desember'];
        } else {
            $rembang_bltdd = 0;
        }
        $rmb_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($rmb_kph[16])) {
            $rembang_kph = $rmb_kph[16]['januari'] + $rmb_kph[16]['februari'] + $rmb_kph[16]['maret'] + $rmb_kph[16]['april'] + $rmb_kph[16]['mei'] + $rmb_kph[16]['juni'] + $rmb_kph[16]['juli'] + $rmb_kph[16]['agustus'] + $rmb_kph[16]['september'] + $rmb_kph[16]['oktober'] + $rmb_kph[16]['november'] + $rmb_kph[16]['desember'];
        } else {
            $rembang_kph = 0;
        }
        $rmb_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($rmb_covid[16])) {
            $rembang_covid = $rmb_covid[16]['januari'] + $rmb_covid[16]['februari'] + $rmb_covid[16]['maret'] + $rmb_covid[16]['april'] + $rmb_covid[16]['mei'] + $rmb_covid[16]['juni'] + $rmb_covid[16]['juli'] + $rmb_covid[16]['agustus'] + $rmb_covid[16]['september'] + $rmb_covid[16]['oktober'] + $rmb_covid[16]['november'] + $rmb_covid[16]['desember'];
        } else {
            $rembang_covid = 0;
        }

        // pati
        $pti_salur = $this->Provinsi5a_model->danadesa_salur('33.18');
        if (isset($pti_salur)) {
            $pati_salur = $pti_salur['januari'] + $pti_salur['februari'] + $pti_salur['maret'] + $pti_salur['april'] + $pti_salur['mei'] + $pti_salur['juni'] + $pti_salur['juli'] + $pti_salur['agustus'] + $pti_salur['september'] + $pti_salur['oktober'] + $pti_salur['november'] + $pti_salur['desember'];
        } else {
            $pati_salur = 0;
        }
        $pti_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($pti_reg[17])) {
            $pati_reg = $pti_reg[17]['januari'] + $pti_reg[17]['februari'] + $pti_reg[17]['maret'] + $pti_reg[17]['april'] + $pti_reg[17]['mei'] + $pti_reg[17]['juni'] + $pti_reg[17]['juli'] + $pti_reg[17]['agustus'] + $pti_reg[17]['september'] + $pti_reg[17]['oktober'] + $pti_reg[17]['november'] + $pti_reg[17]['desember'];
        } else {
            $pati_reg = 0;
        }
        $pti_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($pti_bltdd[17])) {
            $pati_bltdd = $pti_bltdd[17]['januari'] + $pti_bltdd[17]['februari'] + $pti_bltdd[17]['maret'] + $pti_bltdd[17]['april'] + $pti_bltdd[17]['mei'] + $pti_bltdd[17]['juni'] + $pti_bltdd[17]['juli'] + $pti_bltdd[17]['agustus'] + $pti_bltdd[17]['september'] + $pti_bltdd[17]['oktober'] + $pti_bltdd[17]['november'] + $pti_bltdd[17]['desember'];
        } else {
            $pati_bltdd = 0;
        }
        $pti_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($pti_kph[17])) {
            $pati_kph = $pti_kph[17]['januari'] + $pti_kph[17]['februari'] + $pti_kph[17]['maret'] + $pti_kph[17]['april'] + $pti_kph[17]['mei'] + $pti_kph[17]['juni'] + $pti_kph[17]['juli'] + $pti_kph[17]['agustus'] + $pti_kph[17]['september'] + $pti_kph[17]['oktober'] + $pti_kph[17]['november'] + $pti_kph[17]['desember'];
        } else {
            $pati_kph = 0;
        }
        $pti_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($pti_covid[17])) {
            $pati_covid = $pti_covid[17]['januari'] + $pti_covid[17]['februari'] + $pti_covid[17]['maret'] + $pti_covid[17]['april'] + $pti_covid[17]['mei'] + $pti_covid[17]['juni'] + $pti_covid[17]['juli'] + $pti_covid[17]['agustus'] + $pti_covid[17]['september'] + $pti_covid[17]['oktober'] + $pti_covid[17]['november'] + $pti_covid[17]['desember'];
        } else {
            $pati_covid = 0;
        }

        // kudus
        $kds_salur = $this->Provinsi5a_model->danadesa_salur('33.19');
        if (isset($kds_salur)) {
            $kudus_salur = $kds_salur['januari'] + $kds_salur['februari'] + $kds_salur['maret'] + $kds_salur['april'] + $kds_salur['mei'] + $kds_salur['juni'] + $kds_salur['juli'] + $kds_salur['agustus'] + $kds_salur['september'] + $kds_salur['oktober'] + $kds_salur['november'] + $kds_salur['desember'];
        } else {
            $kudus_salur = 0;
        }
        $kds_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($kds_reg[18])) {
            $kudus_reg = $kds_reg[18]['januari'] + $kds_reg[18]['februari'] + $kds_reg[18]['maret'] + $kds_reg[18]['april'] + $kds_reg[18]['mei'] + $kds_reg[18]['juni'] + $kds_reg[18]['juli'] + $kds_reg[18]['agustus'] + $kds_reg[18]['september'] + $kds_reg[18]['oktober'] + $kds_reg[18]['november'] + $kds_reg[18]['desember'];
        } else {
            $kudus_reg = 0;
        }
        $kds_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($kds_bltdd[18])) {
            $kudus_bltdd = $kds_bltdd[18]['januari'] + $kds_bltdd[18]['februari'] + $kds_bltdd[18]['maret'] + $kds_bltdd[18]['april'] + $kds_bltdd[18]['mei'] + $kds_bltdd[18]['juni'] + $kds_bltdd[18]['juli'] + $kds_bltdd[18]['agustus'] + $kds_bltdd[18]['september'] + $kds_bltdd[18]['oktober'] + $kds_bltdd[18]['november'] + $kds_bltdd[18]['desember'];
        } else {
            $kudus_bltdd = 0;
        }
        $kds_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($kds_kph[18])) {
            $kudus_kph = $kds_kph[18]['januari'] + $kds_kph[18]['februari'] + $kds_kph[18]['maret'] + $kds_kph[18]['april'] + $kds_kph[18]['mei'] + $kds_kph[18]['juni'] + $kds_kph[18]['juli'] + $kds_kph[18]['agustus'] + $kds_kph[18]['september'] + $kds_kph[18]['oktober'] + $kds_kph[18]['november'] + $kds_kph[18]['desember'];
        } else {
            $kudus_kph = 0;
        }
        $kds_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($kds_covid[18])) {
            $kudus_covid = $kds_covid[18]['januari'] + $kds_covid[18]['februari'] + $kds_covid[18]['maret'] + $kds_covid[18]['april'] + $kds_covid[18]['mei'] + $kds_covid[18]['juni'] + $kds_covid[18]['juli'] + $kds_covid[18]['agustus'] + $kds_covid[18]['september'] + $kds_covid[18]['oktober'] + $kds_covid[18]['november'] + $kds_covid[18]['desember'];
        } else {
            $kudus_covid = 0;
        }

        // jepara
        $jpr_salur = $this->Provinsi5a_model->danadesa_salur('33.20');
        if (isset($jpr_salur)) {
            $jepara_salur = $jpr_salur['januari'] + $jpr_salur['februari'] + $jpr_salur['maret'] + $jpr_salur['april'] + $jpr_salur['mei'] + $jpr_salur['juni'] + $jpr_salur['juli'] + $jpr_salur['agustus'] + $jpr_salur['september'] + $jpr_salur['oktober'] + $jpr_salur['november'] + $jpr_salur['desember'];
        } else {
            $jepara_salur = 0;
        }
        $jpr_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($jpr_reg[19])) {
            $jepara_reg = $jpr_reg[19]['januari'] + $jpr_reg[19]['februari'] + $jpr_reg[19]['maret'] + $jpr_reg[19]['april'] + $jpr_reg[19]['mei'] + $jpr_reg[19]['juni'] + $jpr_reg[19]['juli'] + $jpr_reg[19]['agustus'] + $jpr_reg[19]['september'] + $jpr_reg[19]['oktober'] + $jpr_reg[19]['november'] + $jpr_reg[19]['desember'];
        } else {
            $jepara_reg = 0;
        }
        $jpr_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($jpr_bltdd[19])) {
            $jepara_bltdd = $jpr_bltdd[19]['januari'] + $jpr_bltdd[19]['februari'] + $jpr_bltdd[19]['maret'] + $jpr_bltdd[19]['april'] + $jpr_bltdd[19]['mei'] + $jpr_bltdd[19]['juni'] + $jpr_bltdd[19]['juli'] + $jpr_bltdd[19]['agustus'] + $jpr_bltdd[19]['september'] + $jpr_bltdd[19]['oktober'] + $jpr_bltdd[19]['november'] + $jpr_bltdd[19]['desember'];
        } else {
            $jepara_bltdd = 0;
        }
        $jpr_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($jpr_kph[19])) {
            $jepara_kph = $jpr_kph[19]['januari'] + $jpr_kph[19]['februari'] + $jpr_kph[19]['maret'] + $jpr_kph[19]['april'] + $jpr_kph[19]['mei'] + $jpr_kph[19]['juni'] + $jpr_kph[19]['juli'] + $jpr_kph[19]['agustus'] + $jpr_kph[19]['september'] + $jpr_kph[19]['oktober'] + $jpr_kph[19]['november'] + $jpr_kph[19]['desember'];
        } else {
            $jepara_kph = 0;
        }
        $jpr_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($jpr_covid[19])) {
            $jepara_covid = $jpr_covid[19]['januari'] + $jpr_covid[19]['februari'] + $jpr_covid[19]['maret'] + $jpr_covid[19]['april'] + $jpr_covid[19]['mei'] + $jpr_covid[19]['juni'] + $jpr_covid[19]['juli'] + $jpr_covid[19]['agustus'] + $jpr_covid[19]['september'] + $jpr_covid[19]['oktober'] + $jpr_covid[19]['november'] + $jpr_covid[19]['desember'];
        } else {
            $jepara_covid = 0;
        }

        // demak
        $dmk_salur = $this->Provinsi5a_model->danadesa_salur('33.21');
        if (isset($dmk_salur)) {
            $demak_salur = $dmk_salur['januari'] + $dmk_salur['februari'] + $dmk_salur['maret'] + $dmk_salur['april'] + $dmk_salur['mei'] + $dmk_salur['juni'] + $dmk_salur['juli'] + $dmk_salur['agustus'] + $dmk_salur['september'] + $dmk_salur['oktober'] + $dmk_salur['november'] + $dmk_salur['desember'];
        } else {
            $demak_salur = 0;
        }
        $dmk_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($dmk_reg[20])) {
            $demak_reg = $dmk_reg[20]['januari'] + $dmk_reg[20]['februari'] + $dmk_reg[20]['maret'] + $dmk_reg[20]['april'] + $dmk_reg[20]['mei'] + $dmk_reg[20]['juni'] + $dmk_reg[20]['juli'] + $dmk_reg[20]['agustus'] + $dmk_reg[20]['september'] + $dmk_reg[20]['oktober'] + $dmk_reg[20]['november'] + $dmk_reg[20]['desember'];
        } else {
            $demak_reg = 0;
        }
        $dmk_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($dmk_bltdd[20])) {
            $demak_bltdd = $dmk_bltdd[20]['januari'] + $dmk_bltdd[20]['februari'] + $dmk_bltdd[20]['maret'] + $dmk_bltdd[20]['april'] + $dmk_bltdd[20]['mei'] + $dmk_bltdd[20]['juni'] + $dmk_bltdd[20]['juli'] + $dmk_bltdd[20]['agustus'] + $dmk_bltdd[20]['september'] + $dmk_bltdd[20]['oktober'] + $dmk_bltdd[20]['november'] + $dmk_bltdd[20]['desember'];
        } else {
            $demak_bltdd = 0;
        }
        $dmk_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($dmk_kph[20])) {
            $demak_kph = $dmk_kph[20]['januari'] + $dmk_kph[20]['februari'] + $dmk_kph[20]['maret'] + $dmk_kph[20]['april'] + $dmk_kph[20]['mei'] + $dmk_kph[20]['juni'] + $dmk_kph[20]['juli'] + $dmk_kph[20]['agustus'] + $dmk_kph[20]['september'] + $dmk_kph[20]['oktober'] + $dmk_kph[20]['november'] + $dmk_kph[20]['desember'];
        } else {
            $demak_kph = 0;
        }
        $dmk_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($dmk_covid[20])) {
            $demak_covid = $dmk_covid[20]['januari'] + $dmk_covid[20]['februari'] + $dmk_covid[20]['maret'] + $dmk_covid[20]['april'] + $dmk_covid[20]['mei'] + $dmk_covid[20]['juni'] + $dmk_covid[20]['juli'] + $dmk_covid[20]['agustus'] + $dmk_covid[20]['september'] + $dmk_covid[20]['oktober'] + $dmk_covid[20]['november'] + $dmk_covid[20]['desember'];
        } else {
            $demak_covid = 0;
        }

        // semarang
        $smg_salur = $this->Provinsi5a_model->danadesa_salur('33.22');
        if (isset($smg_salur)) {
            $semarang_salur = $smg_salur['januari'] + $smg_salur['februari'] + $smg_salur['maret'] + $smg_salur['april'] + $smg_salur['mei'] + $smg_salur['juni'] + $smg_salur['juli'] + $smg_salur['agustus'] + $smg_salur['september'] + $smg_salur['oktober'] + $smg_salur['november'] + $smg_salur['desember'];
        } else {
            $semarang_salur = 0;
        }
        $smg_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($smg_reg[21])) {
            $semarang_reg = $smg_reg[21]['januari'] + $smg_reg[21]['februari'] + $smg_reg[21]['maret'] + $smg_reg[21]['april'] + $smg_reg[21]['mei'] + $smg_reg[21]['juni'] + $smg_reg[21]['juli'] + $smg_reg[21]['agustus'] + $smg_reg[21]['september'] + $smg_reg[21]['oktober'] + $smg_reg[21]['november'] + $smg_reg[21]['desember'];
        } else {
            $semarang_reg = 0;
        }
        $smg_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($smg_bltdd[21])) {
            $semarang_bltdd = $smg_bltdd[21]['januari'] + $smg_bltdd[21]['februari'] + $smg_bltdd[21]['maret'] + $smg_bltdd[21]['april'] + $smg_bltdd[21]['mei'] + $smg_bltdd[21]['juni'] + $smg_bltdd[21]['juli'] + $smg_bltdd[21]['agustus'] + $smg_bltdd[21]['september'] + $smg_bltdd[21]['oktober'] + $smg_bltdd[21]['november'] + $smg_bltdd[21]['desember'];
        } else {
            $semarang_bltdd = 0;
        }
        $smg_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($smg_kph[21])) {
            $semarang_kph = $smg_kph[21]['januari'] + $smg_kph[21]['februari'] + $smg_kph[21]['maret'] + $smg_kph[21]['april'] + $smg_kph[21]['mei'] + $smg_kph[21]['juni'] + $smg_kph[21]['juli'] + $smg_kph[21]['agustus'] + $smg_kph[21]['september'] + $smg_kph[21]['oktober'] + $smg_kph[21]['november'] + $smg_kph[21]['desember'];
        } else {
            $semarang_kph = 0;
        }
        $smg_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($smg_covid[21])) {
            $semarang_covid = $smg_covid[21]['januari'] + $smg_covid[21]['februari'] + $smg_covid[21]['maret'] + $smg_covid[21]['april'] + $smg_covid[21]['mei'] + $smg_covid[21]['juni'] + $smg_covid[21]['juli'] + $smg_covid[21]['agustus'] + $smg_covid[21]['september'] + $smg_covid[21]['oktober'] + $smg_covid[21]['november'] + $smg_covid[21]['desember'];
        } else {
            $semarang_covid = 0;
        }

        // temanggung
        $tmg_salur = $this->Provinsi5a_model->danadesa_salur('33.23');
        if (isset($tmg_salur)) {
            $temanggung_salur = $tmg_salur['januari'] + $tmg_salur['februari'] + $tmg_salur['maret'] + $tmg_salur['april'] + $tmg_salur['mei'] + $tmg_salur['juni'] + $tmg_salur['juli'] + $tmg_salur['agustus'] + $tmg_salur['september'] + $tmg_salur['oktober'] + $tmg_salur['november'] + $tmg_salur['desember'];
        } else {
            $temanggung_salur = 0;
        }
        $tmg_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($tmg_reg[22])) {
            $temanggung_reg = $tmg_reg[22]['januari'] + $tmg_reg[22]['februari'] + $tmg_reg[22]['maret'] + $tmg_reg[22]['april'] + $tmg_reg[22]['mei'] + $tmg_reg[22]['juni'] + $tmg_reg[22]['juli'] + $tmg_reg[22]['agustus'] + $tmg_reg[22]['september'] + $tmg_reg[22]['oktober'] + $tmg_reg[22]['november'] + $tmg_reg[22]['desember'];
        } else {
            $temanggung_reg = 0;
        }
        $tmg_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($tmg_bltdd[22])) {
            $temanggung_bltdd = $tmg_bltdd[22]['januari'] + $tmg_bltdd[22]['februari'] + $tmg_bltdd[22]['maret'] + $tmg_bltdd[22]['april'] + $tmg_bltdd[22]['mei'] + $tmg_bltdd[22]['juni'] + $tmg_bltdd[22]['juli'] + $tmg_bltdd[22]['agustus'] + $tmg_bltdd[22]['september'] + $tmg_bltdd[22]['oktober'] + $tmg_bltdd[22]['november'] + $tmg_bltdd[22]['desember'];
        } else {
            $temanggung_bltdd = 0;
        }
        $tmg_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($tmg_kph[22])) {
            $temanggung_kph = $tmg_kph[22]['januari'] + $tmg_kph[22]['februari'] + $tmg_kph[22]['maret'] + $tmg_kph[22]['april'] + $tmg_kph[22]['mei'] + $tmg_kph[22]['juni'] + $tmg_kph[22]['juli'] + $tmg_kph[22]['agustus'] + $tmg_kph[22]['september'] + $tmg_kph[22]['oktober'] + $tmg_kph[22]['november'] + $tmg_kph[22]['desember'];
        } else {
            $temanggung_kph = 0;
        }
        $tmg_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($tmg_covid[22])) {
            $temanggung_covid = $tmg_covid[22]['januari'] + $tmg_covid[22]['februari'] + $tmg_covid[22]['maret'] + $tmg_covid[22]['april'] + $tmg_covid[22]['mei'] + $tmg_covid[22]['juni'] + $tmg_covid[22]['juli'] + $tmg_covid[22]['agustus'] + $tmg_covid[22]['september'] + $tmg_covid[22]['oktober'] + $tmg_covid[22]['november'] + $tmg_covid[22]['desember'];
        } else {
            $temanggung_covid = 0;
        }

        // kendal
        $kdl_salur = $this->Provinsi5a_model->danadesa_salur('33.24');
        if (isset($kdl_salur)) {
            $kendal_salur = $kdl_salur['januari'] + $kdl_salur['februari'] + $kdl_salur['maret'] + $kdl_salur['april'] + $kdl_salur['mei'] + $kdl_salur['juni'] + $kdl_salur['juli'] + $kdl_salur['agustus'] + $kdl_salur['september'] + $kdl_salur['oktober'] + $kdl_salur['november'] + $kdl_salur['desember'];
        } else {
            $kendal_salur = 0;
        }
        $kdl_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($kdl_reg[23])) {
            $kendal_reg = $kdl_reg[23]['januari'] + $kdl_reg[23]['februari'] + $kdl_reg[23]['maret'] + $kdl_reg[23]['april'] + $kdl_reg[23]['mei'] + $kdl_reg[23]['juni'] + $kdl_reg[23]['juli'] + $kdl_reg[23]['agustus'] + $kdl_reg[23]['september'] + $kdl_reg[23]['oktober'] + $kdl_reg[23]['november'] + $kdl_reg[23]['desember'];
        } else {
            $kendal_reg = 0;
        }
        $kdl_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($kdl_bltdd[23])) {
            $kendal_bltdd = $kdl_bltdd[23]['januari'] + $kdl_bltdd[23]['februari'] + $kdl_bltdd[23]['maret'] + $kdl_bltdd[23]['april'] + $kdl_bltdd[23]['mei'] + $kdl_bltdd[23]['juni'] + $kdl_bltdd[23]['juli'] + $kdl_bltdd[23]['agustus'] + $kdl_bltdd[23]['september'] + $kdl_bltdd[23]['oktober'] + $kdl_bltdd[23]['november'] + $kdl_bltdd[23]['desember'];
        } else {
            $kendal_bltdd = 0;
        }
        $kdl_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($kdl_kph[23])) {
            $kendal_kph = $kdl_kph[23]['januari'] + $kdl_kph[23]['februari'] + $kdl_kph[23]['maret'] + $kdl_kph[23]['april'] + $kdl_kph[23]['mei'] + $kdl_kph[23]['juni'] + $kdl_kph[23]['juli'] + $kdl_kph[23]['agustus'] + $kdl_kph[23]['september'] + $kdl_kph[23]['oktober'] + $kdl_kph[23]['november'] + $kdl_kph[23]['desember'];
        } else {
            $kendal_kph = 0;
        }
        $kdl_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($kdl_covid[23])) {
            $kendal_covid = $kdl_covid[23]['januari'] + $kdl_covid[23]['februari'] + $kdl_covid[23]['maret'] + $kdl_covid[23]['april'] + $kdl_covid[23]['mei'] + $kdl_covid[23]['juni'] + $kdl_covid[23]['juli'] + $kdl_covid[23]['agustus'] + $kdl_covid[23]['september'] + $kdl_covid[23]['oktober'] + $kdl_covid[23]['november'] + $kdl_covid[23]['desember'];
        } else {
            $kendal_covid = 0;
        }

        // batang
        $btg_salur = $this->Provinsi5a_model->danadesa_salur('33.25');
        if (isset($btg_salur)) {
            $batang_salur = $btg_salur['januari'] + $btg_salur['februari'] + $btg_salur['maret'] + $btg_salur['april'] + $btg_salur['mei'] + $btg_salur['juni'] + $btg_salur['juli'] + $btg_salur['agustus'] + $btg_salur['september'] + $btg_salur['oktober'] + $btg_salur['november'] + $btg_salur['desember'];
        } else {
            $batang_salur = 0;
        }
        $btg_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($btg_reg[24])) {
            $batang_reg = $btg_reg[24]['januari'] + $btg_reg[24]['februari'] + $btg_reg[24]['maret'] + $btg_reg[24]['april'] + $btg_reg[24]['mei'] + $btg_reg[24]['juni'] + $btg_reg[24]['juli'] + $btg_reg[24]['agustus'] + $btg_reg[24]['september'] + $btg_reg[24]['oktober'] + $btg_reg[24]['november'] + $btg_reg[24]['desember'];
        } else {
            $batang_reg = 0;
        }
        $btg_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($btg_bltdd[24])) {
            $batang_bltdd = $btg_bltdd[24]['januari'] + $btg_bltdd[24]['februari'] + $btg_bltdd[24]['maret'] + $btg_bltdd[24]['april'] + $btg_bltdd[24]['mei'] + $btg_bltdd[24]['juni'] + $btg_bltdd[24]['juli'] + $btg_bltdd[24]['agustus'] + $btg_bltdd[24]['september'] + $btg_bltdd[24]['oktober'] + $btg_bltdd[24]['november'] + $btg_bltdd[24]['desember'];
        } else {
            $batang_bltdd = 0;
        }
        $btg_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($btg_kph[24])) {
            $batang_kph = $btg_kph[24]['januari'] + $btg_kph[24]['februari'] + $btg_kph[24]['maret'] + $btg_kph[24]['april'] + $btg_kph[24]['mei'] + $btg_kph[24]['juni'] + $btg_kph[24]['juli'] + $btg_kph[24]['agustus'] + $btg_kph[24]['september'] + $btg_kph[24]['oktober'] + $btg_kph[24]['november'] + $btg_kph[24]['desember'];
        } else {
            $batang_kph = 0;
        }
        $btg_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($btg_covid[24])) {
            $batang_covid = $btg_covid[24]['januari'] + $btg_covid[24]['februari'] + $btg_covid[24]['maret'] + $btg_covid[24]['april'] + $btg_covid[24]['mei'] + $btg_covid[24]['juni'] + $btg_covid[24]['juli'] + $btg_covid[24]['agustus'] + $btg_covid[24]['september'] + $btg_covid[24]['oktober'] + $btg_covid[24]['november'] + $btg_covid[24]['desember'];
        } else {
            $batang_covid = 0;
        }

        // pekalongan
        $pkl_salur = $this->Provinsi5a_model->danadesa_salur('33.26');
        if (isset($pkl_salur)) {
            $pekalongan_salur = $pkl_salur['januari'] + $pkl_salur['februari'] + $pkl_salur['maret'] + $pkl_salur['april'] + $pkl_salur['mei'] + $pkl_salur['juni'] + $pkl_salur['juli'] + $pkl_salur['agustus'] + $pkl_salur['september'] + $pkl_salur['oktober'] + $pkl_salur['november'] + $pkl_salur['desember'];
        } else {
            $pekalongan_salur = 0;
        }
        $pkl_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($pkl_reg[25])) {
            $pekalongan_reg = $pkl_reg[25]['januari'] + $pkl_reg[25]['februari'] + $pkl_reg[25]['maret'] + $pkl_reg[25]['april'] + $pkl_reg[25]['mei'] + $pkl_reg[25]['juni'] + $pkl_reg[25]['juli'] + $pkl_reg[25]['agustus'] + $pkl_reg[25]['september'] + $pkl_reg[25]['oktober'] + $pkl_reg[25]['november'] + $pkl_reg[25]['desember'];
        } else {
            $pekalongan_reg = 0;
        }
        $pkl_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($pkl_bltdd[25])) {
            $pekalongan_bltdd = $pkl_bltdd[25]['januari'] + $pkl_bltdd[25]['februari'] + $pkl_bltdd[25]['maret'] + $pkl_bltdd[25]['april'] + $pkl_bltdd[25]['mei'] + $pkl_bltdd[25]['juni'] + $pkl_bltdd[25]['juli'] + $pkl_bltdd[25]['agustus'] + $pkl_bltdd[25]['september'] + $pkl_bltdd[25]['oktober'] + $pkl_bltdd[25]['november'] + $pkl_bltdd[25]['desember'];
        } else {
            $pekalongan_bltdd = 0;
        }
        $pkl_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($pkl_kph[25])) {
            $pekalongan_kph = $pkl_kph[25]['januari'] + $pkl_kph[25]['februari'] + $pkl_kph[25]['maret'] + $pkl_kph[25]['april'] + $pkl_kph[25]['mei'] + $pkl_kph[25]['juni'] + $pkl_kph[25]['juli'] + $pkl_kph[25]['agustus'] + $pkl_kph[25]['september'] + $pkl_kph[25]['oktober'] + $pkl_kph[25]['november'] + $pkl_kph[25]['desember'];
        } else {
            $pekalongan_kph = 0;
        }
        $pkl_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($pkl_covid[25])) {
            $pekalongan_covid = $pkl_covid[25]['januari'] + $pkl_covid[25]['februari'] + $pkl_covid[25]['maret'] + $pkl_covid[25]['april'] + $pkl_covid[25]['mei'] + $pkl_covid[25]['juni'] + $pkl_covid[25]['juli'] + $pkl_covid[25]['agustus'] + $pkl_covid[25]['september'] + $pkl_covid[25]['oktober'] + $pkl_covid[25]['november'] + $pkl_covid[25]['desember'];
        } else {
            $pekalongan_covid = 0;
        }

        // pemalang
        $pml_salur = $this->Provinsi5a_model->danadesa_salur('33.27');
        if (isset($pml_salur)) {
            $pemalang_salur = $pml_salur['januari'] + $pml_salur['februari'] + $pml_salur['maret'] + $pml_salur['april'] + $pml_salur['mei'] + $pml_salur['juni'] + $pml_salur['juli'] + $pml_salur['agustus'] + $pml_salur['september'] + $pml_salur['oktober'] + $pml_salur['november'] + $pml_salur['desember'];
        } else {
            $pemalang_salur = 0;
        }
        $pml_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($pml_reg[26])) {
            $pemalang_reg = $pml_reg[26]['januari'] + $pml_reg[26]['februari'] + $pml_reg[26]['maret'] + $pml_reg[26]['april'] + $pml_reg[26]['mei'] + $pml_reg[26]['juni'] + $pml_reg[26]['juli'] + $pml_reg[26]['agustus'] + $pml_reg[26]['september'] + $pml_reg[26]['oktober'] + $pml_reg[26]['november'] + $pml_reg[26]['desember'];
        } else {
            $pemalang_reg = 0;
        }
        $pml_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($pml_bltdd[26])) {
            $pemalang_bltdd = $pml_bltdd[26]['januari'] + $pml_bltdd[26]['februari'] + $pml_bltdd[26]['maret'] + $pml_bltdd[26]['april'] + $pml_bltdd[26]['mei'] + $pml_bltdd[26]['juni'] + $pml_bltdd[26]['juli'] + $pml_bltdd[26]['agustus'] + $pml_bltdd[26]['september'] + $pml_bltdd[26]['oktober'] + $pml_bltdd[26]['november'] + $pml_bltdd[26]['desember'];
        } else {
            $pemalang_bltdd = 0;
        }
        $pml_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($pml_kph[26])) {
            $pemalang_kph = $pml_kph[26]['januari'] + $pml_kph[26]['februari'] + $pml_kph[26]['maret'] + $pml_kph[26]['april'] + $pml_kph[26]['mei'] + $pml_kph[26]['juni'] + $pml_kph[26]['juli'] + $pml_kph[26]['agustus'] + $pml_kph[26]['september'] + $pml_kph[26]['oktober'] + $pml_kph[26]['november'] + $pml_kph[26]['desember'];
        } else {
            $pemalang_kph = 0;
        }
        $pml_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($pml_covid[26])) {
            $pemalang_covid = $pml_covid[26]['januari'] + $pml_covid[26]['februari'] + $pml_covid[26]['maret'] + $pml_covid[26]['april'] + $pml_covid[26]['mei'] + $pml_covid[26]['juni'] + $pml_covid[26]['juli'] + $pml_covid[26]['agustus'] + $pml_covid[26]['september'] + $pml_covid[26]['oktober'] + $pml_covid[26]['november'] + $pml_covid[26]['desember'];
        } else {
            $pemalang_covid = 0;
        }

        // tegal
        $tgl_salur = $this->Provinsi5a_model->danadesa_salur('33.28');
        if (isset($tgl_salur)) {
            $tegal_salur = $tgl_salur['januari'] + $tgl_salur['februari'] + $tgl_salur['maret'] + $tgl_salur['april'] + $tgl_salur['mei'] + $tgl_salur['juni'] + $tgl_salur['juli'] + $tgl_salur['agustus'] + $tgl_salur['september'] + $tgl_salur['oktober'] + $tgl_salur['november'] + $tgl_salur['desember'];
        } else {
            $tegal_salur = 0;
        }
        $tgl_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($tgl_reg[27])) {
            $tegal_reg = $tgl_reg[27]['januari'] + $tgl_reg[27]['februari'] + $tgl_reg[27]['maret'] + $tgl_reg[27]['april'] + $tgl_reg[27]['mei'] + $tgl_reg[27]['juni'] + $tgl_reg[27]['juli'] + $tgl_reg[27]['agustus'] + $tgl_reg[27]['september'] + $tgl_reg[27]['oktober'] + $tgl_reg[27]['november'] + $tgl_reg[27]['desember'];
        } else {
            $tegal_reg = 0;
        }
        $tgl_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($tgl_bltdd[27])) {
            $tegal_bltdd = $tgl_bltdd[27]['januari'] + $tgl_bltdd[27]['februari'] + $tgl_bltdd[27]['maret'] + $tgl_bltdd[27]['april'] + $tgl_bltdd[27]['mei'] + $tgl_bltdd[27]['juni'] + $tgl_bltdd[27]['juli'] + $tgl_bltdd[27]['agustus'] + $tgl_bltdd[27]['september'] + $tgl_bltdd[27]['oktober'] + $tgl_bltdd[27]['november'] + $tgl_bltdd[27]['desember'];
        } else {
            $tegal_bltdd = 0;
        }
        $tgl_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($tgl_kph[27])) {
            $tegal_kph = $tgl_kph[27]['januari'] + $tgl_kph[27]['februari'] + $tgl_kph[27]['maret'] + $tgl_kph[27]['april'] + $tgl_kph[27]['mei'] + $tgl_kph[27]['juni'] + $tgl_kph[27]['juli'] + $tgl_kph[27]['agustus'] + $tgl_kph[27]['september'] + $tgl_kph[27]['oktober'] + $tgl_kph[27]['november'] + $tgl_kph[27]['desember'];
        } else {
            $tegal_kph = 0;
        }
        $tgl_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($tgl_covid[27])) {
            $tegal_covid = $tgl_covid[27]['januari'] + $tgl_covid[27]['februari'] + $tgl_covid[27]['maret'] + $tgl_covid[27]['april'] + $tgl_covid[27]['mei'] + $tgl_covid[27]['juni'] + $tgl_covid[27]['juli'] + $tgl_covid[27]['agustus'] + $tgl_covid[27]['september'] + $tgl_covid[27]['oktober'] + $tgl_covid[27]['november'] + $tgl_covid[27]['desember'];
        } else {
            $tegal_covid = 0;
        }

        // brebes
        $brb_salur = $this->Provinsi5a_model->danadesa_salur('33.29');
        if (isset($brb_salur)) {
            $brebes_salur = $brb_salur['januari'] + $brb_salur['februari'] + $brb_salur['maret'] + $brb_salur['april'] + $brb_salur['mei'] + $brb_salur['juni'] + $brb_salur['juli'] + $brb_salur['agustus'] + $brb_salur['september'] + $brb_salur['oktober'] + $brb_salur['november'] + $brb_salur['desember'];
        } else {
            $brebes_salur = 0;
        }
        $brb_reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($brb_reg[28])) {
            $brebes_reg = $brb_reg[28]['januari'] + $brb_reg[28]['februari'] + $brb_reg[28]['maret'] + $brb_reg[28]['april'] + $brb_reg[28]['mei'] + $brb_reg[28]['juni'] + $brb_reg[28]['juli'] + $brb_reg[28]['agustus'] + $brb_reg[28]['september'] + $brb_reg[28]['oktober'] + $brb_reg[28]['november'] + $brb_reg[28]['desember'];
        } else {
            $brebes_reg = 0;
        }
        $brb_bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($brb_bltdd[28])) {
            $brebes_bltdd = $brb_bltdd[28]['januari'] + $brb_bltdd[28]['februari'] + $brb_bltdd[28]['maret'] + $brb_bltdd[28]['april'] + $brb_bltdd[28]['mei'] + $brb_bltdd[28]['juni'] + $brb_bltdd[28]['juli'] + $brb_bltdd[28]['agustus'] + $brb_bltdd[28]['september'] + $brb_bltdd[28]['oktober'] + $brb_bltdd[28]['november'] + $brb_bltdd[28]['desember'];
        } else {
            $brebes_bltdd = 0;
        }
        $brb_kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($brb_kph[28])) {
            $brebes_kph = $brb_kph[28]['januari'] + $brb_kph[28]['februari'] + $brb_kph[28]['maret'] + $brb_kph[28]['april'] + $brb_kph[28]['mei'] + $brb_kph[28]['juni'] + $brb_kph[28]['juli'] + $brb_kph[28]['agustus'] + $brb_kph[28]['september'] + $brb_kph[28]['oktober'] + $brb_kph[28]['november'] + $brb_kph[28]['desember'];
        } else {
            $brebes_kph = 0;
        }
        $brb_covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($brb_covid[28])) {
            $brebes_covid = $brb_covid[28]['januari'] + $brb_covid[28]['februari'] + $brb_covid[28]['maret'] + $brb_covid[28]['april'] + $brb_covid[28]['mei'] + $brb_covid[28]['juni'] + $brb_covid[28]['juli'] + $brb_covid[28]['agustus'] + $brb_covid[28]['september'] + $brb_covid[28]['oktober'] + $brb_covid[28]['november'] + $brb_covid[28]['desember'];
        } else {
            $brebes_covid = 0;
        }

        // logic persentase
        $reg = $this->Provinsi5a_model->danadesa_reguler();
        if (isset($reg[0], $reg[1], $reg[2], $reg[3], $reg[4], $reg[5], $reg[6], $reg[7], $reg[8], $reg[9], $reg[10], $reg[11], $reg[12], $reg[13], $reg[14], $reg[15], $reg[16], $reg[17], $reg[18], $reg[19], $reg[20], $reg[21], $reg[22], $reg[23], $reg[24], $reg[25], $reg[26], $reg[27], $reg[28])) {
            $persen_reg = $reg[0]['persentase'];
        } else {
            $persen_reg = 0;
        }
        $bltdd = $this->Provinsi5a_model->danadesa_bltdd();
        if (isset($bltdd[0], $bltdd[1], $bltdd[2], $bltdd[3], $bltdd[4], $bltdd[5], $bltdd[6], $bltdd[7], $bltdd[8], $bltdd[9], $bltdd[10], $bltdd[11], $bltdd[12], $bltdd[13], $bltdd[14], $bltdd[15], $bltdd[16], $bltdd[17], $bltdd[18], $bltdd[19], $bltdd[20], $bltdd[21], $bltdd[22], $bltdd[23], $bltdd[24], $bltdd[25], $bltdd[26], $bltdd[27], $bltdd[28])) {
            $persen_bltdd = $bltdd[0]['persentase'];
        } else {
            $persen_bltdd = 0;
        }
        $kph = $this->Provinsi5a_model->danadesa_kph();
        if (isset($kph[0], $kph[1], $kph[2], $kph[3], $kph[4], $kph[5], $kph[6], $kph[7], $kph[8], $kph[9], $kph[10], $kph[11], $kph[12], $kph[13], $kph[14], $kph[15], $kph[16], $kph[17], $kph[18], $kph[19], $kph[20], $kph[21], $kph[22], $kph[23], $kph[24], $kph[25], $kph[26], $kph[27], $kph[28])) {
            $persen_kph = $kph[0]['persentase'];
        } else {
            $persen_kph = 0;
        }
        $covid = $this->Provinsi5a_model->danadesa_covid();
        if (isset($covid[0], $covid[1], $covid[2], $covid[3], $covid[4], $covid[5], $covid[6], $covid[7], $covid[8], $covid[9], $covid[10], $covid[11], $covid[12], $covid[13], $covid[14], $covid[15], $covid[16], $covid[17], $covid[18], $covid[19], $covid[20], $covid[21], $covid[22], $covid[23], $covid[24], $covid[25], $covid[26], $covid[27], $covid[28])) {
            $persen_covid = $covid[0]['persentase'];
        } else {
            $persen_covid = 0;
        }

        // logic capaian persentase
        $anggaran_clp = $this->Provinsi5a_model->danadesa_anggaran('33.01');
        if (isset($anggaran_clp['danadesa'])) {
            $anggaran_cilacap = $anggaran_clp['danadesa'];
        } else {
            $anggaran_cilacap = 0;
        }
        $anggaran_reg_cilacap = $anggaran_cilacap * $persen_reg / 100;
        if ($anggaran_reg_cilacap != 0) {
            $capaian_cilacap_reg = number_format($cilacap_reg / $anggaran_reg_cilacap * 100, 2, '.', '.');
        } else {
            $capaian_cilacap_reg = 0;
        }
        $anggaran_bltdd_cilacap = $anggaran_cilacap * $persen_bltdd / 100;
        if ($anggaran_bltdd_cilacap != 0) {
            $capaian_cilacap_bltdd = number_format($cilacap_bltdd / $anggaran_bltdd_cilacap * 100, 2, '.', '.');
        } else {
            $capaian_cilacap_bltdd = 0;
        }
        $anggaran_kph_cilacap = $anggaran_cilacap * $persen_kph / 100;
        if ($anggaran_kph_cilacap != 0) {
            $capaian_cilacap_kph = number_format($cilacap_kph / $anggaran_kph_cilacap * 100, 2, '.', '.');
        } else {
            $capaian_cilacap_kph = 0;
        }
        $anggaran_covid_cilacap = $anggaran_cilacap * $persen_covid / 100;
        if ($anggaran_covid_cilacap != 0) {
            $capaian_cilacap_covid = number_format($cilacap_covid / $anggaran_covid_cilacap * 100, 2, '.', '.');
        } else {
            $capaian_cilacap_covid = 0;
        }

        $anggaran_bms = $this->Provinsi5a_model->danadesa_anggaran('33.02');
        if (isset($anggaran_bms['danadesa'])) {
            $anggaran_banyumas = $anggaran_bms['danadesa'];
        } else {
            $anggaran_banyumas = 0;
        }
        $anggaran_reg_banyumas = $anggaran_banyumas * $persen_reg / 100;
        if ($anggaran_reg_banyumas != 0) {
            $capaian_banyumas_reg = number_format($banyumas_reg / $anggaran_reg_banyumas * 100, 2, '.', '.');
        } else {
            $capaian_banyumas_reg = 0;
        }
        $anggaran_bltdd_banyumas = $anggaran_banyumas * $persen_bltdd / 100;
        if ($anggaran_bltdd_banyumas != 0) {
            $capaian_banyumas_bltdd = number_format($banyumas_bltdd / $anggaran_bltdd_banyumas * 100, 2, '.', '.');
        } else {
            $capaian_banyumas_bltdd = 0;
        }
        $anggaran_kph_banyumas = $anggaran_banyumas * $persen_kph / 100;
        if ($anggaran_kph_banyumas != 0) {
            $capaian_banyumas_kph = number_format($banyumas_kph / $anggaran_kph_banyumas * 100, 2, '.', '.');
        } else {
            $capaian_banyumas_kph = 0;
        }
        $anggaran_covid_banyumas = $anggaran_banyumas * $persen_covid / 100;
        if ($anggaran_covid_banyumas != 0) {
            $capaian_banyumas_covid = number_format($banyumas_covid / $anggaran_covid_banyumas * 100, 2, '.', '.');
        } else {
            $capaian_banyumas_covid = 0;
        }

        $anggaran_pbg = $this->Provinsi5a_model->danadesa_anggaran('33.03');
        if (isset($anggaran_pbg['danadesa'])) {
            $anggaran_purbalingga = $anggaran_pbg['danadesa'];
        } else {
            $anggaran_purbalingga = 0;
        }
        $anggaran_reg_purbalingga = $anggaran_purbalingga * $persen_reg / 100;
        if ($anggaran_reg_purbalingga != 0) {
            $capaian_purbalingga_reg = number_format($purbalingga_reg / $anggaran_reg_purbalingga * 100, 2, '.', '.');
        } else {
            $capaian_purbalingga_reg = 0;
        }
        $anggaran_bltdd_purbalingga = $anggaran_purbalingga * $persen_bltdd / 100;
        if ($anggaran_bltdd_purbalingga != 0) {
            $capaian_purbalingga_bltdd = number_format($purbalingga_bltdd / $anggaran_bltdd_purbalingga * 100, 2, '.', '.');
        } else {
            $capaian_purbalingga_bltdd = 0;
        }
        $anggaran_kph_purbalingga = $anggaran_purbalingga * $persen_kph / 100;
        if ($anggaran_kph_purbalingga != 0) {
            $capaian_purbalingga_kph = number_format($purbalingga_kph / $anggaran_kph_purbalingga * 100, 2, '.', '.');
        } else {
            $capaian_purbalingga_kph = 0;
        }
        $anggaran_covid_purbalingga = $anggaran_purbalingga * $persen_covid / 100;
        if ($anggaran_covid_purbalingga != 0) {
            $capaian_purbalingga_covid = number_format($purbalingga_covid / $anggaran_covid_purbalingga * 100, 2, '.', '.');
        } else {
            $capaian_purbalingga_covid = 0;
        }

        $anggaran_bna = $this->Provinsi5a_model->danadesa_anggaran('33.04');
        if (isset($anggaran_bna['danadesa'])) {
            $anggaran_banjarnegara = $anggaran_bna['danadesa'];
        } else {
            $anggaran_banjarnegara = 0;
        }
        $anggaran_reg_banjarnegara = $anggaran_banjarnegara * $persen_reg / 100;
        if ($anggaran_reg_banjarnegara != 0) {
            $capaian_banjarnegara_reg = number_format($banjarnegara_reg / $anggaran_reg_banjarnegara * 100, 2, '.', '.');
        } else {
            $capaian_banjarnegara_reg = 0;
        }
        $anggaran_bltdd_banjarnegara = $anggaran_banjarnegara * $persen_bltdd / 100;
        if ($anggaran_bltdd_banjarnegara != 0) {
            $capaian_banjarnegara_bltdd = number_format($banjarnegara_bltdd / $anggaran_bltdd_banjarnegara * 100, 2, '.', '.');
        } else {
            $capaian_banjarnegara_bltdd = 0;
        }
        $anggaran_kph_banjarnegara = $anggaran_banjarnegara * $persen_kph / 100;
        if ($anggaran_kph_banjarnegara != 0) {
            $capaian_banjarnegara_kph = number_format($banjarnegara_kph / $anggaran_kph_banjarnegara * 100, 2, '.', '.');
        } else {
            $capaian_banjarnegara_kph = 0;
        }
        $anggaran_covid_banjarnegara = $anggaran_banjarnegara * $persen_covid / 100;
        if ($anggaran_covid_banjarnegara != 0) {
            $capaian_banjarnegara_covid = number_format($banjarnegara_covid / $anggaran_covid_banjarnegara * 100, 2, '.', '.');
        } else {
            $capaian_banjarnegara_covid = 0;
        }

        $anggaran_kbn = $this->Provinsi5a_model->danadesa_anggaran('33.05');
        if (isset($anggaran_kbn['danadesa'])) {
            $anggaran_kebumen = $anggaran_kbn['danadesa'];
        } else {
            $anggaran_kebumen = 0;
        }
        $anggaran_reg_kebumen = $anggaran_kebumen * $persen_reg / 100;
        if ($anggaran_reg_kebumen != 0) {
            $capaian_kebumen_reg = number_format($kebumen_reg / $anggaran_reg_kebumen * 100, 2, '.', '.');
        } else {
            $capaian_kebumen_reg = 0;
        }
        $anggaran_bltdd_kebumen = $anggaran_kebumen * $persen_bltdd / 100;
        if ($anggaran_bltdd_kebumen != 0) {
            $capaian_kebumen_bltdd = number_format($kebumen_bltdd / $anggaran_bltdd_kebumen * 100, 2, '.', '.');
        } else {
            $capaian_kebumen_bltdd = 0;
        }
        $anggaran_kph_kebumen = $anggaran_kebumen * $persen_kph / 100;
        if ($anggaran_kph_kebumen != 0) {
            $capaian_kebumen_kph = number_format($kebumen_kph / $anggaran_kph_kebumen * 100, 2, '.', '.');
        } else {
            $capaian_kebumen_kph = 0;
        }
        $anggaran_covid_kebumen = $anggaran_kebumen * $persen_covid / 100;
        if ($anggaran_covid_kebumen != 0) {
            $capaian_kebumen_covid = number_format($kebumen_covid / $anggaran_covid_kebumen * 100, 2, '.', '.');
        } else {
            $capaian_kebumen_covid = 0;
        }

        $anggaran_pwj = $this->Provinsi5a_model->danadesa_anggaran('33.06');
        if (isset($anggaran_pwj['danadesa'])) {
            $anggaran_purworejo = $anggaran_pwj['danadesa'];
        } else {
            $anggaran_purworejo = 0;
        }
        $anggaran_reg_purworejo = $anggaran_purworejo * $persen_reg / 100;
        if ($anggaran_reg_purworejo != 0) {
            $capaian_purworejo_reg = number_format($purworejo_reg / $anggaran_reg_purworejo * 100, 2, '.', '.');
        } else {
            $capaian_purworejo_reg = 0;
        }
        $anggaran_bltdd_purworejo = $anggaran_purworejo * $persen_bltdd / 100;
        if ($anggaran_bltdd_purworejo != 0) {
            $capaian_purworejo_bltdd = number_format($purworejo_bltdd / $anggaran_bltdd_purworejo * 100, 2, '.', '.');
        } else {
            $capaian_purworejo_bltdd = 0;
        }
        $anggaran_kph_purworejo = $anggaran_purworejo * $persen_kph / 100;
        if ($anggaran_kph_purworejo != 0) {
            $capaian_purworejo_kph = number_format($purworejo_kph / $anggaran_kph_purworejo * 100, 2, '.', '.');
        } else {
            $capaian_purworejo_kph = 0;
        }
        $anggaran_covid_purworejo = $anggaran_purworejo * $persen_covid / 100;
        if ($anggaran_covid_purworejo != 0) {
            $capaian_purworejo_covid = number_format($purworejo_covid / $anggaran_covid_purworejo * 100, 2, '.', '.');
        } else {
            $capaian_purworejo_covid = 0;
        }

        $anggaran_wnb = $this->Provinsi5a_model->danadesa_anggaran('33.07');
        if (isset($anggaran_wnb['danadesa'])) {
            $anggaran_wonosobo = $anggaran_wnb['danadesa'];
        } else {
            $anggaran_wonosobo = 0;
        }
        $anggaran_reg_wonosobo = $anggaran_wonosobo * $persen_reg / 100;
        if ($anggaran_reg_wonosobo != 0) {
            $capaian_wonosobo_reg = number_format($wonosobo_reg / $anggaran_reg_wonosobo * 100, 2, '.', '.');
        } else {
            $capaian_wonosobo_reg = 0;
        }
        $anggaran_bltdd_wonosobo = $anggaran_wonosobo * $persen_bltdd / 100;
        if ($anggaran_bltdd_wonosobo != 0) {
            $capaian_wonosobo_bltdd = number_format($wonosobo_bltdd / $anggaran_bltdd_wonosobo * 100, 2, '.', '.');
        } else {
            $capaian_wonosobo_bltdd = 0;
        }
        $anggaran_kph_wonosobo = $anggaran_wonosobo * $persen_kph / 100;
        if ($anggaran_kph_wonosobo != 0) {
            $capaian_wonosobo_kph = number_format($wonosobo_kph / $anggaran_kph_wonosobo * 100, 2, '.', '.');
        } else {
            $capaian_wonosobo_kph = 0;
        }
        $anggaran_covid_wonosobo = $anggaran_wonosobo * $persen_covid / 100;
        if ($anggaran_covid_wonosobo != 0) {
            $capaian_wonosobo_covid = number_format($wonosobo_covid / $anggaran_covid_wonosobo * 100, 2, '.', '.');
        } else {
            $capaian_wonosobo_covid = 0;
        }

        $anggaran_mgl = $this->Provinsi5a_model->danadesa_anggaran('33.08');
        if (isset($anggaran_mgl['danadesa'])) {
            $anggaran_magelang = $anggaran_mgl['danadesa'];
        } else {
            $anggaran_magelang = 0;
        }
        $anggaran_reg_magelang = $anggaran_magelang * $persen_reg / 100;
        if ($anggaran_reg_magelang != 0) {
            $capaian_magelang_reg = number_format($magelang_reg / $anggaran_reg_magelang * 100, 2, '.', '.');
        } else {
            $capaian_magelang_reg = 0;
        }
        $anggaran_bltdd_magelang = $anggaran_magelang * $persen_bltdd / 100;
        if ($anggaran_bltdd_magelang != 0) {
            $capaian_magelang_bltdd = number_format($magelang_bltdd / $anggaran_bltdd_magelang * 100, 2, '.', '.');
        } else {
            $capaian_magelang_bltdd = 0;
        }
        $anggaran_kph_magelang = $anggaran_magelang * $persen_kph / 100;
        if ($anggaran_kph_magelang != 0) {
            $capaian_magelang_kph = number_format($magelang_kph / $anggaran_kph_magelang * 100, 2, '.', '.');
        } else {
            $capaian_magelang_kph = 0;
        }
        $anggaran_covid_magelang = $anggaran_magelang * $persen_covid / 100;
        if ($anggaran_covid_magelang != 0) {
            $capaian_magelang_covid = number_format($magelang_covid / $anggaran_covid_magelang * 100, 2, '.', '.');
        } else {
            $capaian_magelang_covid = 0;
        }

        $anggaran_byl = $this->Provinsi5a_model->danadesa_anggaran('33.09');
        if (isset($anggaran_byl['danadesa'])) {
            $anggaran_boyolali = $anggaran_byl['danadesa'];
        } else {
            $anggaran_boyolali = 0;
        }
        $anggaran_reg_boyolali = $anggaran_boyolali * $persen_reg / 100;
        if ($anggaran_reg_boyolali != 0) {
            $capaian_boyolali_reg = number_format($boyolali_reg / $anggaran_reg_boyolali * 100, 2, '.', '.');
        } else {
            $capaian_boyolali_reg = 0;
        }
        $anggaran_bltdd_boyolali = $anggaran_boyolali * $persen_bltdd / 100;
        if ($anggaran_bltdd_boyolali != 0) {
            $capaian_boyolali_bltdd = number_format($boyolali_bltdd / $anggaran_bltdd_boyolali * 100, 2, '.', '.');
        } else {
            $capaian_boyolali_bltdd = 0;
        }
        $anggaran_kph_boyolali = $anggaran_boyolali * $persen_kph / 100;
        if ($anggaran_kph_boyolali != 0) {
            $capaian_boyolali_kph = number_format($boyolali_kph / $anggaran_kph_boyolali * 100, 2, '.', '.');
        } else {
            $capaian_boyolali_kph = 0;
        }
        $anggaran_covid_boyolali = $anggaran_boyolali * $persen_covid / 100;
        if ($anggaran_covid_boyolali != 0) {
            $capaian_boyolali_covid = number_format($boyolali_covid / $anggaran_covid_boyolali * 100, 2, '.', '.');
        } else {
            $capaian_boyolali_covid = 0;
        }

        $anggaran_klt = $this->Provinsi5a_model->danadesa_anggaran('33.10');
        if (isset($anggaran_klt['danadesa'])) {
            $anggaran_klaten = $anggaran_klt['danadesa'];
        } else {
            $anggaran_klaten = 0;
        }
        $anggaran_reg_klaten = $anggaran_klaten * $persen_reg / 100;
        if ($anggaran_reg_klaten != 0) {
            $capaian_klaten_reg = number_format($klaten_reg / $anggaran_reg_klaten * 100, 2, '.', '.');
        } else {
            $capaian_klaten_reg = 0;
        }
        $anggaran_bltdd_klaten = $anggaran_klaten * $persen_bltdd / 100;
        if ($anggaran_bltdd_klaten != 0) {
            $capaian_klaten_bltdd = number_format($klaten_bltdd / $anggaran_bltdd_klaten * 100, 2, '.', '.');
        } else {
            $capaian_klaten_bltdd = 0;
        }
        $anggaran_kph_klaten = $anggaran_klaten * $persen_kph / 100;
        if ($anggaran_kph_klaten != 0) {
            $capaian_klaten_kph = number_format($klaten_kph / $anggaran_kph_klaten * 100, 2, '.', '.');
        } else {
            $capaian_klaten_kph = 0;
        }
        $anggaran_covid_klaten = $anggaran_klaten * $persen_covid / 100;
        if ($anggaran_covid_klaten != 0) {
            $capaian_klaten_covid = number_format($klaten_covid / $anggaran_covid_klaten * 100, 2, '.', '.');
        } else {
            $capaian_klaten_covid = 0;
        }

        $anggaran_sjo = $this->Provinsi5a_model->danadesa_anggaran('33.11');
        if (isset($anggaran_sjo['danadesa'])) {
            $anggaran_sukoharjo = $anggaran_sjo['danadesa'];
        } else {
            $anggaran_sukoharjo = 0;
        }
        $anggaran_reg_sukoharjo = $anggaran_sukoharjo * $persen_reg / 100;
        if ($anggaran_reg_sukoharjo != 0) {
            $capaian_sukoharjo_reg = number_format($sukoharjo_reg / $anggaran_reg_sukoharjo * 100, 2, '.', '.');
        } else {
            $capaian_sukoharjo_reg = 0;
        }
        $anggaran_bltdd_sukoharjo = $anggaran_sukoharjo * $persen_bltdd / 100;
        if ($anggaran_bltdd_sukoharjo != 0) {
            $capaian_sukoharjo_bltdd = number_format($sukoharjo_bltdd / $anggaran_bltdd_sukoharjo * 100, 2, '.', '.');
        } else {
            $capaian_sukoharjo_bltdd = 0;
        }
        $anggaran_kph_sukoharjo = $anggaran_sukoharjo * $persen_kph / 100;
        if ($anggaran_kph_sukoharjo != 0) {
            $capaian_sukoharjo_kph = number_format($sukoharjo_kph / $anggaran_kph_sukoharjo * 100, 2, '.', '.');
        } else {
            $capaian_sukoharjo_kph = 0;
        }
        $anggaran_covid_sukoharjo = $anggaran_sukoharjo * $persen_covid / 100;
        if ($anggaran_covid_sukoharjo != 0) {
            $capaian_sukoharjo_covid = number_format($sukoharjo_covid / $anggaran_covid_sukoharjo * 100, 2, '.', '.');
        } else {
            $capaian_sukoharjo_covid = 0;
        }

        $anggaran_wgi = $this->Provinsi5a_model->danadesa_anggaran('33.12');
        if (isset($anggaran_wgi['danadesa'])) {
            $anggaran_wonogiri = $anggaran_wgi['danadesa'];
        } else {
            $anggaran_wonogiri = 0;
        }
        $anggaran_reg_wonogiri = $anggaran_wonogiri * $persen_reg / 100;
        if ($anggaran_reg_wonogiri != 0) {
            $capaian_wonogiri_reg = number_format($wonogiri_reg / $anggaran_reg_wonogiri * 100, 2, '.', '.');
        } else {
            $capaian_wonogiri_reg = 0;
        }
        $anggaran_bltdd_wonogiri = $anggaran_wonogiri * $persen_bltdd / 100;
        if ($anggaran_bltdd_wonogiri != 0) {
            $capaian_wonogiri_bltdd = number_format($wonogiri_bltdd / $anggaran_bltdd_wonogiri * 100, 2, '.', '.');
        } else {
            $capaian_wonogiri_bltdd = 0;
        }
        $anggaran_kph_wonogiri = $anggaran_wonogiri * $persen_kph / 100;
        if ($anggaran_kph_wonogiri != 0) {
            $capaian_wonogiri_kph = number_format($wonogiri_kph / $anggaran_kph_wonogiri * 100, 2, '.', '.');
        } else {
            $capaian_wonogiri_kph = 0;
        }
        $anggaran_covid_wonogiri = $anggaran_wonogiri * $persen_covid / 100;
        if ($anggaran_covid_wonogiri != 0) {
            $capaian_wonogiri_covid = number_format($wonogiri_covid / $anggaran_covid_wonogiri * 100, 2, '.', '.');
        } else {
            $capaian_wonogiri_covid = 0;
        }

        $anggaran_kra = $this->Provinsi5a_model->danadesa_anggaran('33.13');
        if (isset($anggaran_kra['danadesa'])) {
            $anggaran_karanganyar = $anggaran_kra['danadesa'];
        } else {
            $anggaran_karanganyar = 0;
        }
        $anggaran_reg_karanganyar = $anggaran_karanganyar * $persen_reg / 100;
        if ($anggaran_reg_karanganyar != 0) {
            $capaian_karanganyar_reg = number_format($karanganyar_reg / $anggaran_reg_karanganyar * 100, 2, '.', '.');
        } else {
            $capaian_karanganyar_reg = 0;
        }
        $anggaran_bltdd_karanganyar = $anggaran_karanganyar * $persen_bltdd / 100;
        if ($anggaran_bltdd_karanganyar != 0) {
            $capaian_karanganyar_bltdd = number_format($karanganyar_bltdd / $anggaran_bltdd_karanganyar * 100, 2, '.', '.');
        } else {
            $capaian_karanganyar_bltdd = 0;
        }
        $anggaran_kph_karanganyar = $anggaran_karanganyar * $persen_kph / 100;
        if ($anggaran_kph_karanganyar != 0) {
            $capaian_karanganyar_kph = number_format($karanganyar_kph / $anggaran_kph_karanganyar * 100, 2, '.', '.');
        } else {
            $capaian_karanganyar_kph = 0;
        }
        $anggaran_covid_karanganyar = $anggaran_karanganyar * $persen_covid / 100;
        if ($anggaran_covid_karanganyar != 0) {
            $capaian_karanganyar_covid = number_format($karanganyar_covid / $anggaran_covid_karanganyar * 100, 2, '.', '.');
        } else {
            $capaian_karanganyar_covid = 0;
        }

        $anggaran_sgn = $this->Provinsi5a_model->danadesa_anggaran('33.14');
        if (isset($anggaran_sgn['danadesa'])) {
            $anggaran_sragen = $anggaran_sgn['danadesa'];
        } else {
            $anggaran_sragen = 0;
        }
        $anggaran_reg_sragen = $anggaran_sragen * $persen_reg / 100;
        if ($anggaran_reg_sragen != 0) {
            $capaian_sragen_reg = number_format($sragen_reg / $anggaran_reg_sragen * 100, 2, '.', '.');
        } else {
            $capaian_sragen_reg = 0;
        }
        $anggaran_bltdd_sragen = $anggaran_sragen * $persen_bltdd / 100;
        if ($anggaran_bltdd_sragen != 0) {
            $capaian_sragen_bltdd = number_format($sragen_bltdd / $anggaran_bltdd_sragen * 100, 2, '.', '.');
        } else {
            $capaian_sragen_bltdd = 0;
        }
        $anggaran_kph_sragen = $anggaran_sragen * $persen_kph / 100;
        if ($anggaran_kph_sragen != 0) {
            $capaian_sragen_kph = number_format($sragen_kph / $anggaran_kph_sragen * 100, 2, '.', '.');
        } else {
            $capaian_sragen_kph = 0;
        }
        $anggaran_covid_sragen = $anggaran_sragen * $persen_covid / 100;
        if ($anggaran_covid_sragen != 0) {
            $capaian_sragen_covid = number_format($sragen_covid / $anggaran_covid_sragen * 100, 2, '.', '.');
        } else {
            $capaian_sragen_covid = 0;
        }

        $anggaran_gbn = $this->Provinsi5a_model->danadesa_anggaran('33.15');
        if (isset($anggaran_gbn['danadesa'])) {
            $anggaran_grobogan = $anggaran_gbn['danadesa'];
        } else {
            $anggaran_grobogan = 0;
        }
        $anggaran_reg_grobogan = $anggaran_grobogan * $persen_reg / 100;
        if ($anggaran_reg_grobogan != 0) {
            $capaian_grobogan_reg = number_format($grobogan_reg / $anggaran_reg_grobogan * 100, 2, '.', '.');
        } else {
            $capaian_grobogan_reg = 0;
        }
        $anggaran_bltdd_grobogan = $anggaran_grobogan * $persen_bltdd / 100;
        if ($anggaran_bltdd_grobogan != 0) {
            $capaian_grobogan_bltdd = number_format($grobogan_bltdd / $anggaran_bltdd_grobogan * 100, 2, '.', '.');
        } else {
            $capaian_grobogan_bltdd = 0;
        }
        $anggaran_kph_grobogan = $anggaran_grobogan * $persen_kph / 100;
        if ($anggaran_kph_grobogan != 0) {
            $capaian_grobogan_kph = number_format($grobogan_kph / $anggaran_kph_grobogan * 100, 2, '.', '.');
        } else {
            $capaian_grobogan_kph = 0;
        }
        $anggaran_covid_grobogan = $anggaran_grobogan * $persen_covid / 100;
        if ($anggaran_covid_grobogan != 0) {
            $capaian_grobogan_covid = number_format($grobogan_covid / $anggaran_covid_grobogan * 100, 2, '.', '.');
        } else {
            $capaian_grobogan_covid = 0;
        }

        $anggaran_blr = $this->Provinsi5a_model->danadesa_anggaran('33.16');
        if (isset($anggaran_blr['danadesa'])) {
            $anggaran_blora = $anggaran_blr['danadesa'];
        } else {
            $anggaran_blora = 0;
        }
        $anggaran_reg_blora = $anggaran_blora * $persen_reg / 100;
        if ($anggaran_reg_blora != 0) {
            $capaian_blora_reg = number_format($blora_reg / $anggaran_reg_blora * 100, 2, '.', '.');
        } else {
            $capaian_blora_reg = 0;
        }
        $anggaran_bltdd_blora = $anggaran_blora * $persen_bltdd / 100;
        if ($anggaran_bltdd_blora != 0) {
            $capaian_blora_bltdd = number_format($blora_bltdd / $anggaran_bltdd_blora * 100, 2, '.', '.');
        } else {
            $capaian_blora_bltdd = 0;
        }
        $anggaran_kph_blora = $anggaran_blora * $persen_kph / 100;
        if ($anggaran_kph_blora != 0) {
            $capaian_blora_kph = number_format($blora_kph / $anggaran_kph_blora * 100, 2, '.', '.');
        } else {
            $capaian_blora_kph = 0;
        }
        $anggaran_covid_blora = $anggaran_blora * $persen_covid / 100;
        if ($anggaran_covid_blora != 0) {
            $capaian_blora_covid = number_format($blora_covid / $anggaran_covid_blora * 100, 2, '.', '.');
        } else {
            $capaian_blora_covid = 0;
        }

        $anggaran_rbg = $this->Provinsi5a_model->danadesa_anggaran('33.17');
        if (isset($anggaran_rbg['danadesa'])) {
            $anggaran_rembang = $anggaran_rbg['danadesa'];
        } else {
            $anggaran_rembang = 0;
        }
        $anggaran_reg_rembang = $anggaran_rembang * $persen_reg / 100;
        if ($anggaran_reg_rembang != 0) {
            $capaian_rembang_reg = number_format($rembang_reg / $anggaran_reg_rembang * 100, 2, '.', '.');
        } else {
            $capaian_rembang_reg = 0;
        }
        $anggaran_bltdd_rembang = $anggaran_rembang * $persen_bltdd / 100;
        if ($anggaran_bltdd_rembang != 0) {
            $capaian_rembang_bltdd = number_format($rembang_bltdd / $anggaran_bltdd_rembang * 100, 2, '.', '.');
        } else {
            $capaian_rembang_bltdd = 0;
        }
        $anggaran_kph_rembang = $anggaran_rembang * $persen_kph / 100;
        if ($anggaran_kph_rembang != 0) {
            $capaian_rembang_kph = number_format($rembang_kph / $anggaran_kph_rembang * 100, 2, '.', '.');
        } else {
            $capaian_rembang_kph = 0;
        }
        $anggaran_covid_rembang = $anggaran_rembang * $persen_covid / 100;
        if ($anggaran_covid_rembang != 0) {
            $capaian_rembang_covid = number_format($rembang_covid / $anggaran_covid_rembang * 100, 2, '.', '.');
        } else {
            $capaian_rembang_covid = 0;
        }

        $anggaran_pti = $this->Provinsi5a_model->danadesa_anggaran('33.18');
        if (isset($anggaran_pti['danadesa'])) {
            $anggaran_pati = $anggaran_pti['danadesa'];
        } else {
            $anggaran_pati = 0;
        }
        $anggaran_reg_pati = $anggaran_pati * $persen_reg / 100;
        if ($anggaran_reg_pati != 0) {
            $capaian_pati_reg = number_format($pati_reg / $anggaran_reg_pati * 100, 2, '.', '.');
        } else {
            $capaian_pati_reg = 0;
        }
        $anggaran_bltdd_pati = $anggaran_pati * $persen_bltdd / 100;
        if ($anggaran_bltdd_pati != 0) {
            $capaian_pati_bltdd = number_format($pati_bltdd / $anggaran_bltdd_pati * 100, 2, '.', '.');
        } else {
            $capaian_pati_bltdd = 0;
        }
        $anggaran_kph_pati = $anggaran_pati * $persen_kph / 100;
        if ($anggaran_kph_pati != 0) {
            $capaian_pati_kph = number_format($pati_kph / $anggaran_kph_pati * 100, 2, '.', '.');
        } else {
            $capaian_pati_kph = 0;
        }
        $anggaran_covid_pati = $anggaran_pati * $persen_covid / 100;
        if ($anggaran_covid_pati != 0) {
            $capaian_pati_covid = number_format($pati_covid / $anggaran_covid_pati * 100, 2, '.', '.');
        } else {
            $capaian_pati_covid = 0;
        }

        $anggaran_kds = $this->Provinsi5a_model->danadesa_anggaran('33.19');
        if (isset($anggaran_kds['danadesa'])) {
            $anggaran_kudus = $anggaran_kds['danadesa'];
        } else {
            $anggaran_kudus = 0;
        }
        $anggaran_reg_kudus = $anggaran_kudus * $persen_reg / 100;
        if ($anggaran_reg_kudus != 0) {
            $capaian_kudus_reg = number_format($kudus_reg / $anggaran_reg_kudus * 100, 2, '.', '.');
        } else {
            $capaian_kudus_reg = 0;
        }
        $anggaran_bltdd_kudus = $anggaran_kudus * $persen_bltdd / 100;
        if ($anggaran_bltdd_kudus != 0) {
            $capaian_kudus_bltdd = number_format($kudus_bltdd / $anggaran_bltdd_kudus * 100, 2, '.', '.');
        } else {
            $capaian_kudus_bltdd = 0;
        }
        $anggaran_kph_kudus = $anggaran_kudus * $persen_kph / 100;
        if ($anggaran_kph_kudus != 0) {
            $capaian_kudus_kph = number_format($kudus_kph / $anggaran_kph_kudus * 100, 2, '.', '.');
        } else {
            $capaian_kudus_kph = 0;
        }
        $anggaran_covid_kudus = $anggaran_kudus * $persen_covid / 100;
        if ($anggaran_covid_kudus != 0) {
            $capaian_kudus_covid = number_format($kudus_covid / $anggaran_covid_kudus * 100, 2, '.', '.');
        } else {
            $capaian_kudus_covid = 0;
        }

        $anggaran_jpr = $this->Provinsi5a_model->danadesa_anggaran('33.20');
        if (isset($anggaran_jpr['danadesa'])) {
            $anggaran_jepara = $anggaran_jpr['danadesa'];
        } else {
            $anggaran_jepara = 0;
        }
        $anggaran_reg_jepara = $anggaran_jepara * $persen_reg / 100;
        if ($anggaran_reg_jepara != 0) {
            $capaian_jepara_reg = number_format($jepara_reg / $anggaran_reg_jepara * 100, 2, '.', '.');
        } else {
            $capaian_jepara_reg = 0;
        }
        $anggaran_bltdd_jepara = $anggaran_jepara * $persen_bltdd / 100;
        if ($anggaran_bltdd_jepara != 0) {
            $capaian_jepara_bltdd = number_format($jepara_bltdd / $anggaran_bltdd_jepara * 100, 2, '.', '.');
        } else {
            $capaian_jepara_bltdd = 0;
        }
        $anggaran_kph_jepara = $anggaran_jepara * $persen_kph / 100;
        if ($anggaran_kph_jepara != 0) {
            $capaian_jepara_kph = number_format($jepara_kph / $anggaran_kph_jepara * 100, 2, '.', '.');
        } else {
            $capaian_jepara_kph = 0;
        }
        $anggaran_covid_jepara = $anggaran_jepara * $persen_covid / 100;
        if ($anggaran_covid_jepara != 0) {
            $capaian_jepara_covid = number_format($jepara_covid / $anggaran_covid_jepara * 100, 2, '.', '.');
        } else {
            $capaian_jepara_covid = 0;
        }

        $anggaran_dmk = $this->Provinsi5a_model->danadesa_anggaran('33.21');
        if (isset($anggaran_dmk['danadesa'])) {
            $anggaran_demak = $anggaran_dmk['danadesa'];
        } else {
            $anggaran_demak = 0;
        }
        $anggaran_reg_demak = $anggaran_demak * $persen_reg / 100;
        if ($anggaran_reg_demak != 0) {
            $capaian_demak_reg = number_format($demak_reg / $anggaran_reg_demak * 100, 2, '.', '.');
        } else {
            $capaian_demak_reg = 0;
        }
        $anggaran_bltdd_demak = $anggaran_demak * $persen_bltdd / 100;
        if ($anggaran_bltdd_demak != 0) {
            $capaian_demak_bltdd = number_format($demak_bltdd / $anggaran_bltdd_demak * 100, 2, '.', '.');
        } else {
            $capaian_demak_bltdd = 0;
        }
        $anggaran_kph_demak = $anggaran_demak * $persen_kph / 100;
        if ($anggaran_kph_demak != 0) {
            $capaian_demak_kph = number_format($demak_kph / $anggaran_kph_demak * 100, 2, '.', '.');
        } else {
            $capaian_demak_kph = 0;
        }
        $anggaran_covid_demak = $anggaran_demak * $persen_covid / 100;
        if ($anggaran_covid_demak != 0) {
            $capaian_demak_covid = number_format($demak_covid / $anggaran_covid_demak * 100, 2, '.', '.');
        } else {
            $capaian_demak_covid = 0;
        }

        $anggaran_smg = $this->Provinsi5a_model->danadesa_anggaran('33.22');
        if (isset($anggaran_smg['danadesa'])) {
            $anggaran_semarang = $anggaran_smg['danadesa'];
        } else {
            $anggaran_semarang = 0;
        }
        $anggaran_reg_semarang = $anggaran_semarang * $persen_reg / 100;
        if ($anggaran_reg_semarang != 0) {
            $capaian_semarang_reg = number_format($semarang_reg / $anggaran_reg_semarang * 100, 2, '.', '.');
        } else {
            $capaian_semarang_reg = 0;
        }
        $anggaran_bltdd_semarang = $anggaran_semarang * $persen_bltdd / 100;
        if ($anggaran_bltdd_semarang != 0) {
            $capaian_semarang_bltdd = number_format($semarang_bltdd / $anggaran_bltdd_semarang * 100, 2, '.', '.');
        } else {
            $capaian_semarang_bltdd = 0;
        }
        $anggaran_kph_semarang = $anggaran_semarang * $persen_kph / 100;
        if ($anggaran_kph_semarang != 0) {
            $capaian_semarang_kph = number_format($semarang_kph / $anggaran_kph_semarang * 100, 2, '.', '.');
        } else {
            $capaian_semarang_kph = 0;
        }
        $anggaran_covid_semarang = $anggaran_semarang * $persen_covid / 100;
        if ($anggaran_covid_semarang != 0) {
            $capaian_semarang_covid = number_format($semarang_covid / $anggaran_covid_semarang * 100, 2, '.', '.');
        } else {
            $capaian_semarang_covid = 0;
        }

        $anggaran_tmg = $this->Provinsi5a_model->danadesa_anggaran('33.23');
        if (isset($anggaran_tmg['danadesa'])) {
            $anggaran_temanggung = $anggaran_tmg['danadesa'];
        } else {
            $anggaran_temanggung = 0;
        }
        $anggaran_reg_temanggung = $anggaran_temanggung * $persen_reg / 100;
        if ($anggaran_reg_temanggung != 0) {
            $capaian_temanggung_reg = number_format($temanggung_reg / $anggaran_reg_temanggung * 100, 2, '.', '.');
        } else {
            $capaian_temanggung_reg = 0;
        }
        $anggaran_bltdd_temanggung = $anggaran_temanggung * $persen_bltdd / 100;
        if ($anggaran_bltdd_temanggung != 0) {
            $capaian_temanggung_bltdd = number_format($temanggung_bltdd / $anggaran_bltdd_temanggung * 100, 2, '.', '.');
        } else {
            $capaian_temanggung_bltdd = 0;
        }
        $anggaran_kph_temanggung = $anggaran_temanggung * $persen_kph / 100;
        if ($anggaran_kph_temanggung != 0) {
            $capaian_temanggung_kph = number_format($temanggung_kph / $anggaran_kph_temanggung * 100, 2, '.', '.');
        } else {
            $capaian_temanggung_kph = 0;
        }
        $anggaran_covid_temanggung = $anggaran_temanggung * $persen_covid / 100;
        if ($anggaran_covid_temanggung != 0) {
            $capaian_temanggung_covid = number_format($temanggung_covid / $anggaran_covid_temanggung * 100, 2, '.', '.');
        } else {
            $capaian_temanggung_covid = 0;
        }

        $anggaran_kdl = $this->Provinsi5a_model->danadesa_anggaran('33.24');
        if (isset($anggaran_kdl['danadesa'])) {
            $anggaran_kendal = $anggaran_kdl['danadesa'];
        } else {
            $anggaran_kendal = 0;
        }
        $anggaran_reg_kendal = $anggaran_kendal * $persen_reg / 100;
        if ($anggaran_reg_kendal != 0) {
            $capaian_kendal_reg = number_format($kendal_reg / $anggaran_reg_kendal * 100, 2, '.', '.');
        } else {
            $capaian_kendal_reg = 0;
        }
        $anggaran_bltdd_kendal = $anggaran_kendal * $persen_bltdd / 100;
        $anggaran_bltdd_kendal = $anggaran_kendal * $persen_bltdd / 100;
        if ($anggaran_bltdd_kendal != 0) {
            $capaian_kendal_bltdd = number_format($kendal_bltdd / $anggaran_bltdd_kendal * 100, 2, '.', '.');
        } else {
            $capaian_kendal_bltdd = 0;
        }
        $anggaran_kph_kendal = $anggaran_kendal * $persen_kph / 100;
        $anggaran_kph_kendal = $anggaran_kendal * $persen_kph / 100;
        if ($anggaran_kph_kendal != 0) {
            $capaian_kendal_kph = number_format($kendal_kph / $anggaran_kph_kendal * 100, 2, '.', '.');
        } else {
            $capaian_kendal_kph = 0;
        }
        $anggaran_covid_kendal = $anggaran_kendal * $persen_covid / 100;
        $anggaran_covid_kendal = $anggaran_kendal * $persen_covid / 100;
        if ($anggaran_covid_kendal != 0) {
            $capaian_kendal_covid = number_format($kendal_covid / $anggaran_covid_kendal * 100, 2, '.', '.');
        } else {
            $capaian_kendal_covid = 0;
        }

        $anggaran_btg = $this->Provinsi5a_model->danadesa_anggaran('33.25');
        if (isset($anggaran_btg['danadesa'])) {
            $anggaran_batang = $anggaran_btg['danadesa'];
        } else {
            $anggaran_batang = 0;
        }
        $anggaran_reg_batang = $anggaran_batang * $persen_reg / 100;
        if ($anggaran_reg_batang != 0) {
            $capaian_batang_reg = number_format($batang_reg / $anggaran_reg_batang * 100, 2, '.', '.');
        } else {
            $capaian_batang_reg = 0;
        }
        $anggaran_bltdd_batang = $anggaran_batang * $persen_bltdd / 100;
        if ($anggaran_bltdd_batang != 0) {
            $capaian_batang_bltdd = number_format($batang_bltdd / $anggaran_bltdd_batang * 100, 2, '.', '.');
        } else {
            $capaian_batang_bltdd = 0;
        }
        $anggaran_kph_batang = $anggaran_batang * $persen_kph / 100;
        if ($anggaran_kph_batang != 0) {
            $capaian_batang_kph = number_format($batang_kph / $anggaran_kph_batang * 100, 2, '.', '.');
        } else {
            $capaian_batang_kph = 0;
        }
        $anggaran_covid_batang = $anggaran_batang * $persen_covid / 100;
        if ($anggaran_covid_batang != 0) {
            $capaian_batang_covid = number_format($batang_covid / $anggaran_covid_batang * 100, 2, '.', '.');
        } else {
            $capaian_batang_covid = 0;
        }

        $anggaran_pkl = $this->Provinsi5a_model->danadesa_anggaran('33.26');
        if (isset($anggaran_pkl['danadesa'])) {
            $anggaran_pekalongan = $anggaran_pkl['danadesa'];
        } else {
            $anggaran_pekalongan = 0;
        }
        $anggaran_reg_pekalongan = $anggaran_pekalongan * $persen_reg / 100;
        if ($anggaran_reg_pekalongan != 0) {
            $capaian_pekalongan_reg = number_format($pekalongan_reg / $anggaran_reg_pekalongan * 100, 2, '.', '.');
        } else {
            $capaian_pekalongan_reg = 0;
        }
        $anggaran_bltdd_pekalongan = $anggaran_pekalongan * $persen_bltdd / 100;
        if ($anggaran_bltdd_pekalongan != 0) {
            $capaian_pekalongan_bltdd = number_format($pekalongan_bltdd / $anggaran_bltdd_pekalongan * 100, 2, '.', '.');
        } else {
            $capaian_pekalongan_bltdd = 0;
        }
        $anggaran_kph_pekalongan = $anggaran_pekalongan * $persen_kph / 100;
        if ($anggaran_kph_pekalongan != 0) {
            $capaian_pekalongan_kph = number_format($pekalongan_kph / $anggaran_kph_pekalongan * 100, 2, '.', '.');
        } else {
            $capaian_pekalongan_kph = 0;
        }
        $anggaran_covid_pekalongan = $anggaran_pekalongan * $persen_covid / 100;
        if ($anggaran_covid_pekalongan != 0) {
            $capaian_pekalongan_covid = number_format($pekalongan_covid / $anggaran_covid_pekalongan * 100, 2, '.', '.');
        } else {
            $capaian_pekalongan_covid = 0;
        }

        $anggaran_pml = $this->Provinsi5a_model->danadesa_anggaran('33.27');
        if (isset($anggaran_pml['danadesa'])) {
            $anggaran_pemalang = $anggaran_pml['danadesa'];
        } else {
            $anggaran_pemalang = 0;
        }
        $anggaran_reg_pemalang = $anggaran_pemalang * $persen_reg / 100;
        if ($anggaran_reg_pemalang != 0) {
            $capaian_pemalang_reg = number_format($pemalang_reg / $anggaran_reg_pemalang * 100, 2, '.', '.');
        } else {
            $capaian_pemalang_reg = 0;
        }
        $anggaran_bltdd_pemalang = $anggaran_pemalang * $persen_bltdd / 100;
        if ($anggaran_bltdd_pemalang != 0) {
            $capaian_pemalang_bltdd = number_format($pemalang_bltdd / $anggaran_bltdd_pemalang * 100, 2, '.', '.');
        } else {
            $capaian_pemalang_bltdd = 0;
        }
        $anggaran_kph_pemalang = $anggaran_pemalang * $persen_kph / 100;
        if ($anggaran_kph_pemalang != 0) {
            $capaian_pemalang_kph = number_format($pemalang_kph / $anggaran_kph_pemalang * 100, 2, '.', '.');
        } else {
            $capaian_pemalang_kph = 0;
        }
        $anggaran_covid_pemalang = $anggaran_pemalang * $persen_covid / 100;
        if ($anggaran_covid_pemalang != 0) {
            $capaian_pemalang_covid = number_format($pemalang_covid / $anggaran_covid_pemalang * 100, 2, '.', '.');
        } else {
            $capaian_pemalang_covid = 0;
        }

        $anggaran_tgl = $this->Provinsi5a_model->danadesa_anggaran('33.28');
        if (isset($anggaran_tgl['danadesa'])) {
            $anggaran_tegal = $anggaran_tgl['danadesa'];
        } else {
            $anggaran_tegal = 0;
        }
        $anggaran_reg_tegal = $anggaran_tegal * $persen_reg / 100;
        if ($anggaran_reg_tegal != 0) {
            $capaian_tegal_reg = number_format($tegal_reg / $anggaran_reg_tegal * 100, 2, '.', '.');
        } else {
            $capaian_tegal_reg = 0;
        }
        $anggaran_bltdd_tegal = $anggaran_tegal * $persen_bltdd / 100;
        if ($anggaran_bltdd_tegal != 0) {
            $capaian_tegal_bltdd = number_format($tegal_bltdd / $anggaran_bltdd_tegal * 100, 2, '.', '.');
        } else {
            $capaian_tegal_bltdd = 0;
        }
        $anggaran_kph_tegal = $anggaran_tegal * $persen_kph / 100;
        if ($anggaran_kph_tegal != 0) {
            $capaian_tegal_kph = number_format($tegal_kph / $anggaran_kph_tegal * 100, 2, '.', '.');
        } else {
            $capaian_tegal_kph = 0;
        }
        $anggaran_covid_tegal = $anggaran_tegal * $persen_covid / 100;
        if ($anggaran_covid_tegal != 0) {
            $capaian_tegal_covid = number_format($tegal_covid / $anggaran_covid_tegal * 100, 2, '.', '.');
        } else {
            $capaian_tegal_covid = 0;
        }

        $anggaran_brb = $this->Provinsi5a_model->danadesa_anggaran('33.29');
        if (isset($anggaran_brb['danadesa'])) {
            $anggaran_brebes = $anggaran_brb['danadesa'];
        } else {
            $anggaran_brebes = 0;
        }
        $anggaran_reg_brebes = $anggaran_brebes * $persen_reg / 100;
        if ($anggaran_reg_brebes != 0) {
            $capaian_brebes_reg = number_format($brebes_reg / $anggaran_reg_brebes * 100, 2, '.', '.');
        } else {
            $capaian_brebes_reg = 0;
        }
        $anggaran_bltdd_brebes = $anggaran_brebes * $persen_bltdd / 100;
        if ($anggaran_bltdd_brebes != 0) {
            $capaian_brebes_bltdd = number_format($brebes_bltdd / $anggaran_bltdd_brebes * 100, 2, '.', '.');
        } else {
            $capaian_brebes_bltdd = 0;
        }
        $anggaran_kph_brebes = $anggaran_brebes * $persen_kph / 100;
        if ($anggaran_kph_brebes != 0) {
            $capaian_brebes_kph = number_format($brebes_kph / $anggaran_kph_brebes * 100, 2, '.', '.');
        } else {
            $capaian_brebes_kph = 0;
        }
        $anggaran_covid_brebes = $anggaran_brebes * $persen_covid / 100;
        if ($anggaran_covid_brebes != 0) {
            $capaian_brebes_covid = number_format($brebes_covid / $anggaran_covid_brebes * 100, 2, '.', '.');
        } else {
            $capaian_brebes_covid = 0;
        }

        // logic grand total setelah dipersentasekan
        $grn_total = $this->Provinsi5a_model->grand_total_anggaran();
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

        $salur_bulanan = $this->Provinsi5a_model->danadesa_salur_bulanan();
        if (isset($salur_bulanan['januari'])) {
            $salur_januari = $salur_bulanan['januari'];
        } else {
            $salur_januari = 0;
        }
        if (isset($salur_bulanan['februari'])) {
            $salur_februari = $salur_bulanan['februari'];
        } else {
            $salur_februari = 0;
        }
        if (isset($salur_bulanan['maret'])) {
            $salur_maret = $salur_bulanan['maret'];
        } else {
            $salur_maret = 0;
        }
        if (isset($salur_bulanan['april'])) {
            $salur_april = $salur_bulanan['april'];
        } else {
            $salur_april = 0;
        }
        if (isset($salur_bulanan['mei'])) {
            $salur_mei = $salur_bulanan['mei'];
        } else {
            $salur_mei = 0;
        }
        if (isset($salur_bulanan['juni'])) {
            $salur_juni = $salur_bulanan['juni'];
        } else {
            $salur_juni = 0;
        }
        if (isset($salur_bulanan['juli'])) {
            $salur_juli = $salur_bulanan['juli'];
        } else {
            $salur_juli = 0;
        }
        if (isset($salur_bulanan['agustus'])) {
            $salur_agustus = $salur_bulanan['agustus'];
        } else {
            $salur_agustus = 0;
        }
        if (isset($salur_bulanan['september'])) {
            $salur_september = $salur_bulanan['september'];
        } else {
            $salur_september = 0;
        }
        if (isset($salur_bulanan['oktober'])) {
            $salur_oktober = $salur_bulanan['oktober'];
        } else {
            $salur_oktober = 0;
        }
        if (isset($salur_bulanan['november'])) {
            $salur_november = $salur_bulanan['november'];
        } else {
            $salur_november = 0;
        }
        if (isset($salur_bulanan['desember'])) {
            $salur_desember = $salur_bulanan['desember'];
        } else {
            $salur_desember = 0;
        }

        $data = [
            'title' => 'Dashboard',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Dashboard', 'li_1' => 'Provinsi', 'li_2' => 'Dashboard']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'salur_cilacap' => $cilacap_salur,
            'realisasi_cilacap' => $cilacap_reg + $cilacap_bltdd + $cilacap_kph + $cilacap_covid,
            'capaian_cilacap_reg' => $capaian_cilacap_reg,
            'capaian_cilacap_bltdd' => $capaian_cilacap_bltdd,
            'capaian_cilacap_kph' => $capaian_cilacap_kph,
            'capaian_cilacap_covid' => $capaian_cilacap_covid,
            'realisasi_reg_cilacap' => $cilacap_reg,
            'realisasi_bltdd_cilacap' => $cilacap_bltdd,
            'realisasi_kph_cilacap' => $cilacap_kph,
            'realisasi_covid_cilacap' => $cilacap_covid,
            'salur_banyumas' => $banyumas_salur,
            'realisasi_banyumas' => $banyumas_reg + $banyumas_bltdd + $banyumas_kph + $banyumas_covid,
            'capaian_banyumas_reg' => $capaian_banyumas_reg,
            'capaian_banyumas_bltdd' => $capaian_banyumas_bltdd,
            'capaian_banyumas_kph' => $capaian_banyumas_kph,
            'capaian_banyumas_covid' => $capaian_banyumas_covid,
            'realisasi_reg_banyumas' => $banyumas_reg,
            'realisasi_bltdd_banyumas' => $banyumas_bltdd,
            'realisasi_kph_banyumas' => $banyumas_kph,
            'realisasi_covid_banyumas' => $banyumas_covid,
            'salur_purbalingga' => $purbalingga_salur,
            'realisasi_purbalingga' => $purbalingga_reg + $purbalingga_bltdd + $purbalingga_kph + $purbalingga_covid,
            'capaian_purbalingga_reg' => $capaian_purbalingga_reg,
            'capaian_purbalingga_bltdd' => $capaian_purbalingga_bltdd,
            'capaian_purbalingga_kph' => $capaian_purbalingga_kph,
            'capaian_purbalingga_covid' => $capaian_purbalingga_covid,
            'realisasi_reg_purbalingga' => $purbalingga_reg,
            'realisasi_bltdd_purbalingga' => $purbalingga_bltdd,
            'realisasi_kph_purbalingga' => $purbalingga_kph,
            'realisasi_covid_purbalingga' => $purbalingga_covid,
            'salur_banjarnegara' => $banjarnegara_salur,
            'realisasi_banjarnegara' => $banjarnegara_reg + $banjarnegara_bltdd + $banjarnegara_kph + $banjarnegara_covid,
            'capaian_banjarnegara_reg' => $capaian_banjarnegara_reg,
            'capaian_banjarnegara_bltdd' => $capaian_banjarnegara_bltdd,
            'capaian_banjarnegara_kph' => $capaian_banjarnegara_kph,
            'capaian_banjarnegara_covid' => $capaian_banjarnegara_covid,
            'realisasi_reg_banjarnegara' => $banjarnegara_reg,
            'realisasi_bltdd_banjarnegara' => $banjarnegara_bltdd,
            'realisasi_kph_banjarnegara' => $banjarnegara_kph,
            'realisasi_covid_banjarnegara' => $banjarnegara_covid,
            'salur_kebumen' => $kebumen_salur,
            'realisasi_kebumen' => $kebumen_reg + $kebumen_bltdd + $kebumen_kph + $kebumen_covid,
            'capaian_kebumen_reg' => $capaian_kebumen_reg,
            'capaian_kebumen_bltdd' => $capaian_kebumen_bltdd,
            'capaian_kebumen_kph' => $capaian_kebumen_kph,
            'capaian_kebumen_covid' => $capaian_kebumen_covid,
            'realisasi_reg_kebumen' => $kebumen_reg,
            'realisasi_bltdd_kebumen' => $kebumen_bltdd,
            'realisasi_kph_kebumen' => $kebumen_kph,
            'realisasi_covid_kebumen' => $kebumen_covid,
            'salur_purworejo' => $purworejo_salur,
            'realisasi_purworejo' => $purworejo_reg + $purworejo_bltdd + $purworejo_kph + $purworejo_covid,
            'capaian_purworejo_reg' => $capaian_purworejo_reg,
            'capaian_purworejo_bltdd' => $capaian_purworejo_bltdd,
            'capaian_purworejo_kph' => $capaian_purworejo_kph,
            'capaian_purworejo_covid' => $capaian_purworejo_covid,
            'realisasi_reg_purworejo' => $purworejo_reg,
            'realisasi_bltdd_purworejo' => $purworejo_bltdd,
            'realisasi_kph_purworejo' => $purworejo_kph,
            'realisasi_covid_purworejo' => $purworejo_covid,
            'salur_wonosobo' => $wonosobo_salur,
            'realisasi_wonosobo' => $wonosobo_reg + $wonosobo_bltdd + $wonosobo_kph + $wonosobo_covid,
            'capaian_wonosobo_reg' => $capaian_wonosobo_reg,
            'capaian_wonosobo_bltdd' => $capaian_wonosobo_bltdd,
            'capaian_wonosobo_kph' => $capaian_wonosobo_kph,
            'capaian_wonosobo_covid' => $capaian_wonosobo_covid,
            'realisasi_reg_wonosobo' => $wonosobo_reg,
            'realisasi_bltdd_wonosobo' => $wonosobo_bltdd,
            'realisasi_kph_wonosobo' => $wonosobo_kph,
            'realisasi_covid_wonosobo' => $wonosobo_covid,
            'salur_magelang' => $magelang_salur,
            'realisasi_magelang' => $magelang_reg + $magelang_bltdd + $magelang_kph + $magelang_covid,
            'capaian_magelang_reg' => $capaian_magelang_reg,
            'capaian_magelang_bltdd' => $capaian_magelang_bltdd,
            'capaian_magelang_kph' => $capaian_magelang_kph,
            'capaian_magelang_covid' => $capaian_magelang_covid,
            'realisasi_reg_magelang' => $magelang_reg,
            'realisasi_bltdd_magelang' => $magelang_bltdd,
            'realisasi_kph_magelang' => $magelang_kph,
            'realisasi_covid_magelang' => $magelang_covid,
            'salur_boyolali' => $boyolali_salur,
            'realisasi_boyolali' => $boyolali_reg + $boyolali_bltdd + $boyolali_kph + $boyolali_covid,
            'capaian_boyolali_reg' => $capaian_boyolali_reg,
            'capaian_boyolali_bltdd' => $capaian_boyolali_bltdd,
            'capaian_boyolali_kph' => $capaian_boyolali_kph,
            'capaian_boyolali_covid' => $capaian_boyolali_covid,
            'realisasi_reg_boyolali' => $boyolali_reg,
            'realisasi_bltdd_boyolali' => $boyolali_bltdd,
            'realisasi_kph_boyolali' => $boyolali_kph,
            'realisasi_covid_boyolali' => $boyolali_covid,
            'salur_klaten' => $klaten_salur,
            'realisasi_klaten' => $klaten_reg + $klaten_bltdd + $klaten_kph + $klaten_covid,
            'capaian_klaten_reg' => $capaian_klaten_reg,
            'capaian_klaten_bltdd' => $capaian_klaten_bltdd,
            'capaian_klaten_kph' => $capaian_klaten_kph,
            'capaian_klaten_covid' => $capaian_klaten_covid,
            'realisasi_reg_klaten' => $klaten_reg,
            'realisasi_bltdd_klaten' => $klaten_bltdd,
            'realisasi_kph_klaten' => $klaten_kph,
            'realisasi_covid_klaten' => $klaten_covid,
            'salur_sukoharjo' => $sukoharjo_salur,
            'realisasi_sukoharjo' => $sukoharjo_reg + $sukoharjo_bltdd + $sukoharjo_kph + $sukoharjo_covid,
            'capaian_sukoharjo_reg' => $capaian_sukoharjo_reg,
            'capaian_sukoharjo_bltdd' => $capaian_sukoharjo_bltdd,
            'capaian_sukoharjo_kph' => $capaian_sukoharjo_kph,
            'capaian_sukoharjo_covid' => $capaian_sukoharjo_covid,
            'realisasi_reg_sukoharjo' => $sukoharjo_reg,
            'realisasi_bltdd_sukoharjo' => $sukoharjo_bltdd,
            'realisasi_kph_sukoharjo' => $sukoharjo_kph,
            'realisasi_covid_sukoharjo' => $sukoharjo_covid,
            'salur_wonogiri' => $wonogiri_salur,
            'realisasi_wonogiri' => $wonogiri_reg + $wonogiri_bltdd + $wonogiri_kph + $wonogiri_covid,
            'capaian_wonogiri_reg' => $capaian_wonogiri_reg,
            'capaian_wonogiri_bltdd' => $capaian_wonogiri_bltdd,
            'capaian_wonogiri_kph' => $capaian_wonogiri_kph,
            'capaian_wonogiri_covid' => $capaian_wonogiri_covid,
            'realisasi_reg_wonogiri' => $wonogiri_reg,
            'realisasi_bltdd_wonogiri' => $wonogiri_bltdd,
            'realisasi_kph_wonogiri' => $wonogiri_kph,
            'realisasi_covid_wonogiri' => $wonogiri_covid,
            'salur_karanganyar' => $karanganyar_salur,
            'realisasi_karanganyar' => $karanganyar_reg + $karanganyar_bltdd + $karanganyar_kph + $karanganyar_covid,
            'capaian_karanganyar_reg' => $capaian_karanganyar_reg,
            'capaian_karanganyar_bltdd' => $capaian_karanganyar_bltdd,
            'capaian_karanganyar_kph' => $capaian_karanganyar_kph,
            'capaian_karanganyar_covid' => $capaian_karanganyar_covid,
            'realisasi_reg_karanganyar' => $karanganyar_reg,
            'realisasi_bltdd_karanganyar' => $karanganyar_bltdd,
            'realisasi_kph_karanganyar' => $karanganyar_kph,
            'realisasi_covid_karanganyar' => $karanganyar_covid,
            'salur_sragen' => $sragen_salur,
            'realisasi_sragen' => $sragen_reg + $sragen_bltdd + $sragen_kph + $sragen_covid,
            'capaian_sragen_reg' => $capaian_sragen_reg,
            'capaian_sragen_bltdd' => $capaian_sragen_bltdd,
            'capaian_sragen_kph' => $capaian_sragen_kph,
            'capaian_sragen_covid' => $capaian_sragen_covid,
            'realisasi_reg_sragen' => $sragen_reg,
            'realisasi_bltdd_sragen' => $sragen_bltdd,
            'realisasi_kph_sragen' => $sragen_kph,
            'realisasi_covid_sragen' => $sragen_covid,
            'salur_grobogan' => $grobogan_salur,
            'realisasi_grobogan' => $grobogan_reg + $grobogan_bltdd + $grobogan_kph + $grobogan_covid,
            'capaian_grobogan_reg' => $capaian_grobogan_reg,
            'capaian_grobogan_bltdd' => $capaian_grobogan_bltdd,
            'capaian_grobogan_kph' => $capaian_grobogan_kph,
            'capaian_grobogan_covid' => $capaian_grobogan_covid,
            'realisasi_reg_grobogan' => $grobogan_reg,
            'realisasi_bltdd_grobogan' => $grobogan_bltdd,
            'realisasi_kph_grobogan' => $grobogan_kph,
            'realisasi_covid_grobogan' => $grobogan_covid,
            'salur_blora' => $blora_salur,
            'realisasi_blora' => $blora_reg + $blora_bltdd + $blora_kph + $blora_covid,
            'capaian_blora_reg' => $capaian_blora_reg,
            'capaian_blora_bltdd' => $capaian_blora_bltdd,
            'capaian_blora_kph' => $capaian_blora_kph,
            'capaian_blora_covid' => $capaian_blora_covid,
            'realisasi_reg_blora' => $blora_reg,
            'realisasi_bltdd_blora' => $blora_bltdd,
            'realisasi_kph_blora' => $blora_kph,
            'realisasi_covid_blora' => $blora_covid,
            'salur_rembang' => $rembang_salur,
            'realisasi_rembang' => $rembang_reg + $rembang_bltdd + $rembang_kph + $rembang_covid,
            'capaian_rembang_reg' => $capaian_rembang_reg,
            'capaian_rembang_bltdd' => $capaian_rembang_bltdd,
            'capaian_rembang_kph' => $capaian_rembang_kph,
            'capaian_rembang_covid' => $capaian_rembang_covid,
            'realisasi_reg_rembang' => $rembang_reg,
            'realisasi_bltdd_rembang' => $rembang_bltdd,
            'realisasi_kph_rembang' => $rembang_kph,
            'realisasi_covid_rembang' => $rembang_covid,
            'salur_pati' => $pati_salur,
            'realisasi_pati' => $pati_reg + $pati_bltdd + $pati_kph + $pati_covid,
            'capaian_pati_reg' => $capaian_pati_reg,
            'capaian_pati_bltdd' => $capaian_pati_bltdd,
            'capaian_pati_kph' => $capaian_pati_kph,
            'capaian_pati_covid' => $capaian_pati_covid,
            'realisasi_reg_pati' => $pati_reg,
            'realisasi_bltdd_pati' => $pati_bltdd,
            'realisasi_kph_pati' => $pati_kph,
            'realisasi_covid_pati' => $pati_covid,
            'salur_kudus' => $kudus_salur,
            'realisasi_kudus' => $kudus_reg + $kudus_bltdd + $kudus_kph + $kudus_covid,
            'capaian_kudus_reg' => $capaian_kudus_reg,
            'capaian_kudus_bltdd' => $capaian_kudus_bltdd,
            'capaian_kudus_kph' => $capaian_kudus_kph,
            'capaian_kudus_covid' => $capaian_kudus_covid,
            'realisasi_reg_kudus' => $kudus_reg,
            'realisasi_bltdd_kudus' => $kudus_bltdd,
            'realisasi_kph_kudus' => $kudus_kph,
            'realisasi_covid_kudus' => $kudus_covid,
            'salur_jepara' => $jepara_salur,
            'realisasi_jepara' => $jepara_reg + $jepara_bltdd + $jepara_kph + $jepara_covid,
            'capaian_jepara_reg' => $capaian_jepara_reg,
            'capaian_jepara_bltdd' => $capaian_jepara_bltdd,
            'capaian_jepara_kph' => $capaian_jepara_kph,
            'capaian_jepara_covid' => $capaian_jepara_covid,
            'realisasi_reg_jepara' => $jepara_reg,
            'realisasi_bltdd_jepara' => $jepara_bltdd,
            'realisasi_kph_jepara' => $jepara_kph,
            'realisasi_covid_jepara' => $jepara_covid,
            'salur_demak' => $demak_salur,
            'realisasi_demak' => $demak_reg + $demak_bltdd + $demak_kph + $demak_covid,
            'capaian_demak_reg' => $capaian_demak_reg,
            'capaian_demak_bltdd' => $capaian_demak_bltdd,
            'capaian_demak_kph' => $capaian_demak_kph,
            'capaian_demak_covid' => $capaian_demak_covid,
            'realisasi_reg_demak' => $demak_reg,
            'realisasi_bltdd_demak' => $demak_bltdd,
            'realisasi_kph_demak' => $demak_kph,
            'realisasi_covid_demak' => $demak_covid,
            'salur_semarang' => $semarang_salur,
            'realisasi_semarang' => $semarang_reg + $semarang_bltdd + $semarang_kph + $semarang_covid,
            'capaian_semarang_reg' => $capaian_semarang_reg,
            'capaian_semarang_bltdd' => $capaian_semarang_bltdd,
            'capaian_semarang_kph' => $capaian_semarang_kph,
            'capaian_semarang_covid' => $capaian_semarang_covid,
            'realisasi_reg_semarang' => $semarang_reg,
            'realisasi_bltdd_semarang' => $semarang_bltdd,
            'realisasi_kph_semarang' => $semarang_kph,
            'realisasi_covid_semarang' => $semarang_covid,
            'salur_temanggung' => $temanggung_salur,
            'realisasi_temanggung' => $temanggung_reg + $temanggung_bltdd + $temanggung_kph + $temanggung_covid,
            'capaian_temanggung_reg' => $capaian_temanggung_reg,
            'capaian_temanggung_bltdd' => $capaian_temanggung_bltdd,
            'capaian_temanggung_kph' => $capaian_temanggung_kph,
            'capaian_temanggung_covid' => $capaian_temanggung_covid,
            'realisasi_reg_temanggung' => $temanggung_reg,
            'realisasi_bltdd_temanggung' => $temanggung_bltdd,
            'realisasi_kph_temanggung' => $temanggung_kph,
            'realisasi_covid_temanggung' => $temanggung_covid,
            'salur_kendal' => $kendal_salur,
            'realisasi_kendal' => $kendal_reg + $kendal_bltdd + $kendal_kph + $kendal_covid,
            'capaian_kendal_reg' => $capaian_kendal_reg,
            'capaian_kendal_bltdd' => $capaian_kendal_bltdd,
            'capaian_kendal_kph' => $capaian_kendal_kph,
            'capaian_kendal_covid' => $capaian_kendal_covid,
            'realisasi_reg_kendal' => $kendal_reg,
            'realisasi_bltdd_kendal' => $kendal_bltdd,
            'realisasi_kph_kendal' => $kendal_kph,
            'realisasi_covid_kendal' => $kendal_covid,
            'salur_batang' => $batang_salur,
            'realisasi_batang' => $batang_reg + $batang_bltdd + $batang_kph + $batang_covid,
            'capaian_batang_reg' => $capaian_batang_reg,
            'capaian_batang_bltdd' => $capaian_batang_bltdd,
            'capaian_batang_kph' => $capaian_batang_kph,
            'capaian_batang_covid' => $capaian_batang_covid,
            'realisasi_reg_batang' => $batang_reg,
            'realisasi_bltdd_batang' => $batang_bltdd,
            'realisasi_kph_batang' => $batang_kph,
            'realisasi_covid_batang' => $batang_covid,
            'salur_pekalongan' => $pekalongan_salur,
            'realisasi_pekalongan' => $pekalongan_reg + $pekalongan_bltdd + $pekalongan_kph + $pekalongan_covid,
            'capaian_pekalongan_reg' => $capaian_pekalongan_reg,
            'capaian_pekalongan_bltdd' => $capaian_pekalongan_bltdd,
            'capaian_pekalongan_kph' => $capaian_pekalongan_kph,
            'capaian_pekalongan_covid' => $capaian_pekalongan_covid,
            'realisasi_reg_pekalongan' => $pekalongan_reg,
            'realisasi_bltdd_pekalongan' => $pekalongan_bltdd,
            'realisasi_kph_pekalongan' => $pekalongan_kph,
            'realisasi_covid_pekalongan' => $pekalongan_covid,
            'salur_pemalang' => $pemalang_salur,
            'realisasi_pemalang' => $pemalang_reg + $pemalang_bltdd + $pemalang_kph + $pemalang_covid,
            'capaian_pemalang_reg' => $capaian_pemalang_reg,
            'capaian_pemalang_bltdd' => $capaian_pemalang_bltdd,
            'capaian_pemalang_kph' => $capaian_pemalang_kph,
            'capaian_pemalang_covid' => $capaian_pemalang_covid,
            'realisasi_reg_pemalang' => $pemalang_reg,
            'realisasi_bltdd_pemalang' => $pemalang_bltdd,
            'realisasi_kph_pemalang' => $pemalang_kph,
            'realisasi_covid_pemalang' => $pemalang_covid,
            'salur_tegal' => $tegal_salur,
            'realisasi_tegal' => $tegal_reg + $tegal_bltdd + $tegal_kph + $tegal_covid,
            'capaian_tegal_reg' => $capaian_tegal_reg,
            'capaian_tegal_bltdd' => $capaian_tegal_bltdd,
            'capaian_tegal_kph' => $capaian_tegal_kph,
            'capaian_tegal_covid' => $capaian_tegal_covid,
            'realisasi_reg_tegal' => $tegal_reg,
            'realisasi_bltdd_tegal' => $tegal_bltdd,
            'realisasi_kph_tegal' => $tegal_kph,
            'realisasi_covid_tegal' => $tegal_covid,
            'salur_brebes' => $brebes_salur,
            'realisasi_brebes' => $brebes_reg + $brebes_bltdd + $brebes_kph + $brebes_covid,
            'capaian_brebes_reg' => $capaian_brebes_reg,
            'capaian_brebes_bltdd' => $capaian_brebes_bltdd,
            'capaian_brebes_kph' => $capaian_brebes_kph,
            'capaian_brebes_covid' => $capaian_brebes_covid,
            'realisasi_reg_brebes' => $brebes_reg,
            'realisasi_bltdd_brebes' => $brebes_bltdd,
            'realisasi_kph_brebes' => $brebes_kph,
            'realisasi_covid_brebes' => $brebes_covid,
            'realisasi_bulanan_danadesa_reguler' => $this->Provinsi5a_model->realisasi_bulanan_danadesa_reguler(),
            'realisasi_bulanan_danadesa_bltdd' => $this->Provinsi5a_model->realisasi_bulanan_danadesa_bltdd(),
            'realisasi_bulanan_danadesa_kph' => $this->Provinsi5a_model->realisasi_bulanan_danadesa_kph(),
            'realisasi_bulanan_danadesa_covid' => $this->Provinsi5a_model->realisasi_bulanan_danadesa_covid(),
            'danadesa_update' => $this->Provinsi5a_model->danadesa_update(),
            'salur_januari' => $salur_januari,
            'salur_februari' => $salur_februari,
            'salur_maret' => $salur_maret,
            'salur_april' => $salur_april,
            'salur_mei' => $salur_mei,
            'salur_juni' => $salur_juni,
            'salur_juli' => $salur_juli,
            'salur_agustus' => $salur_agustus,
            'salur_september' => $salur_september,
            'salur_oktober' => $salur_oktober,
            'salur_november' => $salur_november,
            'salur_desember' => $salur_desember,
            'grand_total_anggaran' => $grand_total,
            'grand_total_reg' => $grand_total_reg,
            'grand_total_bltdd' => $grand_total_bltdd,
            'grand_total_kph' => $grand_total_kph,
            'grand_total_covid' => $grand_total_covid,
            'persen_reg' => $persen_reg,
            'persen_bltdd' => $persen_bltdd,
            'persen_kph' => $persen_kph,
            'persen_covid' => $persen_covid,
        ];

        return view('sidesa/user/provinsi5a/dashboard', $data);
    }

    public function download()
    {
        if (isset($_POST['download'])) {
            # code...
        }
    }

    public function profile()
    {
        $sessionEmail = $this->session->get('email_sidesa');

        $data = [
            'title' => 'Profile',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Profile', 'li_1' => 'Provinsi', 'li_2' => 'Profile']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'kab' => $this->Provinsi5a_model->getMyprofile($sessionEmail),
        ];

        return view('sidesa/user/provinsi5a/apps-profile', $data);
    }

    public function editprofile()
    {
        $data = [
            'title' => 'Edit Profile',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Edit Profile', 'li_1' => 'Kabupaten', 'li_2' => 'Edit Profile']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama', 'Nama lengkap', 'trim|required', ['required' => 'Form tidak boleh dikosongkan']);
            $this->validation->setRule('image', 'Upload Persetujuan', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,2048]', ['mime_in' => 'File yang anda pilih bukan JPG', 'max_size' => 'File anda melebihi 2mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/provinsi5a/editprofile')->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $user_id = $this->session->get('id_sidesa');
                $this->Provinsi5a_model->editProfile($user_id, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Profile</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/provinsi5a/profile');
            }
        }
        return view('sidesa/user/provinsi5a/apps-editprofile', $data);
    }
}
