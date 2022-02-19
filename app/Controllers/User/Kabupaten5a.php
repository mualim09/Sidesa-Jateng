<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Sidesa\User_kabupaten5a_model;

class Kabupaten5a extends BaseController
{
    protected $Kabupaten5a_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Kabupaten5a_model = new User_kabupaten5a_model();
    }

    public function dashboard()
    {
        $sessionKdwil = $this->session->get('kd_wilayah_sidesa');
        $kab = $this->Kabupaten5a_model->danadesa_anggaran($sessionKdwil);
        if ($this->Kabupaten5a_model->danadesa_anggaran($sessionKdwil) != null) {
            $namakab = $kab['kabupaten'];
        } else {
            $namakab = '';
        }

        // logic cilacap
        $tot_salur = $this->Kabupaten5a_model->danadesa_salur($sessionKdwil);
        if (isset($tot_salur)) {
            $total_salur = $tot_salur['januari'] + $tot_salur['februari'] + $tot_salur['maret'] + $tot_salur['april'] + $tot_salur['mei'] + $tot_salur['juni'] + $tot_salur['juli'] + $tot_salur['agustus'] + $tot_salur['september'] + $tot_salur['oktober'] + $tot_salur['november'] + $tot_salur['desember'];
        } else {
            $total_salur = 0;
        }
        $real_reg = $this->Kabupaten5a_model->danadesa_reguler($sessionKdwil);
        if (isset($real_reg)) {
            $total_reg = $real_reg['januari'] + $real_reg['februari'] + $real_reg['maret'] + $real_reg['april'] + $real_reg['mei'] + $real_reg['juni'] + $real_reg['juli'] + $real_reg['agustus'] + $real_reg['september'] + $real_reg['oktober'] + $real_reg['november'] + $real_reg['desember'];
        } else {
            $total_reg = 0;
        }
        $real_bltdd = $this->Kabupaten5a_model->danadesa_bltdd($sessionKdwil);
        if (isset($real_bltdd)) {
            $total_bltdd = $real_bltdd['januari'] + $real_bltdd['februari'] + $real_bltdd['maret'] + $real_bltdd['april'] + $real_bltdd['mei'] + $real_bltdd['juni'] + $real_bltdd['juli'] + $real_bltdd['agustus'] + $real_bltdd['september'] + $real_bltdd['oktober'] + $real_bltdd['november'] + $real_bltdd['desember'];
        } else {
            $total_bltdd = 0;
        }
        $real_kph = $this->Kabupaten5a_model->danadesa_kph($sessionKdwil);
        if (isset($real_kph)) {
            $total_kph = $real_kph['januari'] + $real_kph['februari'] + $real_kph['maret'] + $real_kph['april'] + $real_kph['mei'] + $real_kph['juni'] + $real_kph['juli'] + $real_kph['agustus'] + $real_kph['september'] + $real_kph['oktober'] + $real_kph['november'] + $real_kph['desember'];
        } else {
            $total_kph = 0;
        }
        $real_covid = $this->Kabupaten5a_model->danadesa_covid($sessionKdwil);
        if (isset($real_covid)) {
            $total_covid = $real_covid['januari'] + $real_covid['februari'] + $real_covid['maret'] + $real_covid['april'] + $real_covid['mei'] + $real_covid['juni'] + $real_covid['juli'] + $real_covid['agustus'] + $real_covid['september'] + $real_covid['oktober'] + $real_covid['november'] + $real_covid['desember'];
        } else {
            $total_covid = 0;
        }

        // logic persentase
        $reg = $this->Kabupaten5a_model->danadesa_reguler($sessionKdwil);
        if (isset($reg)) {
            $persen_reg = $reg['persentase'];
        } else {
            $persen_reg = 0;
        }
        $bltdd = $this->Kabupaten5a_model->danadesa_bltdd($sessionKdwil);
        if (isset($bltdd)) {
            $persen_bltdd = $bltdd['persentase'];
        } else {
            $persen_bltdd = 0;
        }
        $kph = $this->Kabupaten5a_model->danadesa_kph($sessionKdwil);
        if (isset($kph)) {
            $persen_kph = $kph['persentase'];
        } else {
            $persen_kph = 0;
        }
        $covid = $this->Kabupaten5a_model->danadesa_covid($sessionKdwil);
        if (isset($covid)) {
            $persen_covid = $covid['persentase'];
        } else {
            $persen_covid = 0;
        }

        // logic capaian persentase
        $anggaran = $this->Kabupaten5a_model->danadesa_anggaran($sessionKdwil);
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
        $grn_total = $this->Kabupaten5a_model->danadesa_anggaran($sessionKdwil);
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
            'title' => 'Dashboard',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Dashboard', 'li_1' => 'Provinsi', 'li_2' => 'Dashboard']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'nama_kab' => $namakab,
            'anggaran_danadesa' => $anggaran_danadesa,
            'total_salur' => $total_salur,
            'total_realisasi' => $total_reg + $total_bltdd + $total_kph + $total_covid,
            'capaian_reg' => $capaian_reg,
            'capaian_bltdd' => $capaian_bltdd,
            'capaian_kph' => $capaian_kph,
            'capaian_covid' => $capaian_covid,
            'realisasi_reg' => $total_reg,
            'realisasi_bltdd' => $total_bltdd,
            'realisasi_kph' => $total_kph,
            'realisasi_covid' => $total_covid,
            'realisasi_bulanan_danadesa_reguler' => $this->Kabupaten5a_model->danadesa_reguler($sessionKdwil),
            'realisasi_bulanan_danadesa_bltdd' => $this->Kabupaten5a_model->danadesa_bltdd($sessionKdwil),
            'realisasi_bulanan_danadesa_kph' => $this->Kabupaten5a_model->danadesa_kph($sessionKdwil),
            'realisasi_bulanan_danadesa_covid' => $this->Kabupaten5a_model->danadesa_covid($sessionKdwil),
            'grand_total_anggaran' => $grand_total,
            'grand_total_reg' => $grand_total_reg,
            'grand_total_bltdd' => $grand_total_bltdd,
            'grand_total_kph' => $grand_total_kph,
            'grand_total_covid' => $grand_total_covid,
            'persen_reg' => $persen_reg,
            'persen_bltdd' => $persen_bltdd,
            'persen_kph' => $persen_kph,
            'persen_covid' => $persen_covid,
            'kab' => $namakab
        ];

        return view('sidesa/user/kabupaten5a/dashboard', $data);
    }

    public function profile()
    {
        $sessionEmail = $this->session->get('email_sidesa');

        $data = [
            'title' => 'Profile',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Profile', 'li_1' => 'Kabupaten', 'li_2' => 'Profile']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'kab' => $this->Kabupaten5a_model->getMyprofile($sessionEmail),
        ];

        return view('sidesa/user/kabupaten5a/apps-profile', $data);
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
                return redirect()->to('user/kabupaten5a/editprofile')->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $user_id = $this->session->get('id_sidesa');
                $this->Kabupaten5a_model->editProfile($user_id, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Profile</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/kabupaten5a/profile');
            }
        }
        return view('sidesa/user/kabupaten5a/apps-editprofile', $data);
    }
}
