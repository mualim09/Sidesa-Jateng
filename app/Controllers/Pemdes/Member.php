<?php

namespace App\Controllers\Pemdes;

use App\Controllers\BaseController;
use App\Models\Sidesa\Pemdes_member_model;

class Member extends BaseController
{
    protected $Pemdes_member_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Pemdes_member_model = new Pemdes_member_model();
        helper('zakezone');
    }

    public function home($kode, $nik_ktp)
    {
        // $this->session->remove('keyword');
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->table('pemdes_user')->getWhere(['nik_ktp' => $this->session->get('nik_ktp')])->getRowArray(),
            'page_title' => view('sidesa/layout/pemdes/content-page-title', ['title' => 'Kec. ' . $whoiskec . ', Desa ' . $whoisdes, 'li_1' => $nik_ktp, 'li_2' => 'Dashboard']),
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes,
        ];
        return view('sidesa/pemdes/member/dashboard', $data);
    }

    public function editprofile($kode, $nik_ktp)
    {
        // $this->session->remove('keyword');
        // $this->session->remove('keywordapi');

        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);
        $data = [
            'title' => 'Edit Profile',
            'page_title' => view('sidesa/layout/pemdes/content-page-title', ['title' => 'Edit Profile', 'li_1' => $nik_ktp, 'li_2' => 'Edit Profile']),
            'user' => $this->db->table('pemdes_user')->getWhere(['nik_ktp' => $this->session->get('nik_ktp')])->getRowArray(),
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes,
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama', 'Nama lengkap', 'trim|required', ['required' => 'Form tidak boleh dikosongkan']);
            $this->validation->setRule('image', 'Upload Persetujuan', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,2048]', ['mime_in' => 'File yang anda pilih bukan JPG', 'max_size' => 'File anda melebihi 2mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('pemdes/member/editprofile/' . $kode . '/' . $nik_ktp)->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $user_id = $this->session->get('id_user');
                $this->Pemdes_member_model->editProfile($user_id, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Profile</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('pemdes/member/editprofile/' . $kode . '/' . $nik_ktp);
            }
        }
        return view('sidesa/pemdes/member/editprofile', $data);
    }
}
