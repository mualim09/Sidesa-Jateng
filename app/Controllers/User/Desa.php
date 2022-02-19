<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Sidesa\User_inputdata_model;

class Desa extends BaseController
{
    protected $Inputdata_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Inputdata_model = new User_inputdata_model();
        session()->remove('keyword');
        session()->remove('keywordapi');
    }

    public function infodesa()
    {
        $kodedes = $this->session->get('kd_wilayah_sidesa');
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kodedes])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);
        $hurufawalkab = strtolower($cekkodedes['nm_kab']);
        $whoiskab = ucwords($hurufawalkab);
        $data = [
            'title' => 'Info Desa',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Input data Desa ' . $whoisdes . ', Kecamatan ' . $whoiskec . ', Kabupaten ' . $whoiskab, 'li_1' => 'Input Data', 'li_2' => 'Pemerintah Desa']),
            'dashboard' => $this->db->table('dashboard_desa')->getWhere(['kodedes' => $kodedes])->getRowArray(),
            'inputby' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'validation' =>  $this->validation
        ];
        if (isset($_POST['submit'])) {
            $this->validation->setRule('inputby', 'Nama Penginput', 'trim|required', ['required' => 'Form tidak boleh dikosongkan']);
            $this->validation->setRule('image', 'Upload Background', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,10240]', ['mime_in' => 'File yang anda pilih bukan JPG/PNG', 'max_size' => 'File anda melebihi 10mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/desa/infodesa')->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $this->Inputdata_model->updateDataDes($input, $file, $kodedes, $data['user']);
                $this->Inputdata_model->notifikasi($kodedes, $data['user'], $whoisdes);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Data Informasi Desa</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/desa/infodesa');
            }
        }
        return view('sidesa/user/desa/apps-desa', $data);
    }
}
