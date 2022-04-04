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
        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama', 'Nama', 'required|alpha_space|trim', ['required' => 'Nama tidak boleh kosong', 'alpha_space' => 'Nama hanya diisi alphabet dan spasi']);
            $this->validation->setRule('tempat_lahir', 'Tempatlahir', 'required|alpha_space|trim', ['required' => 'Tempat lahir tidak boleh kosong', 'alpha_space' => 'Tempat lahir hanya diisi alphabet dan spasi']);
            $this->validation->setRule('tanggal_lahir', 'Tanggallahir', 'required|trim', ['required' => 'Tanggal lahir tidak boleh kosong']);
            $this->validation->setRule('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat tidak boleh kosong']);
            $this->validation->setRule('rt', 'RT', 'required|numeric|min_length[2]|max_length[3]|trim', ['required' => 'RT tidak boleh kosong', 'min_length' => 'Nomor RT minimal 2 digit', 'max_length' => 'Nomor RT maximal 3 digit', 'numeric' => 'Nomor RT hanya diisi angka (tanpa spasi)']);
            $this->validation->setRule('rw', 'RW', 'required|numeric|min_length[2]|max_length[3]|trim', ['required' => 'RW tidak boleh kosong', 'min_length' => 'Nomor RW minimal 2 digit', 'max_length' => 'Nomor RW maximal 3 digit', 'numeric' => 'Nomor RW hanya diisi angka (tanpa spasi)']);
            $this->validation->setRule('keldesa', 'Keldesa', 'required|alpha_space|trim', ['required' => 'Nama Kel. / Desa tidak boleh kosong', 'alpha_space' => 'Nama Kel. / Desa hanya diisi alphabet dan spasi']);
            $this->validation->setRule('kecamatan', 'Kecamatan', 'required|alpha_space|trim', ['required' => 'Nama Kecamatan tidak boleh kosong', 'alpha_space' => 'Nama Kecamatan hanya diisi alphabet dan spasi']);
            $this->validation->setRule('pekerjaan', 'Pekerjaan', 'required|trim', ['required' => 'Pekerjaan tidak boleh kosong']);
            $this->validation->setRule('hp', 'HP', 'required|numeric|min_length[11]|max_length[15]|trim', ['numeric' => 'Nomor HP hanya diisi angka (tanpa spasi)', 'required' => 'Nomor HP tidak boleh kosong', 'min_length' => 'Nomor HP minimal harus 11 digit', 'max_length' => 'Nomor HP maximal hanya 15 digit']);
            // $this->validation->setRule('image', 'Upload Persetujuan', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,2048]', ['mime_in' => 'File yang anda pilih bukan JPG', 'max_size' => 'File anda melebihi 2mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('pemdes/member/editprofile/' . $kode . '/' . $nik_ktp)->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $nik_ktp = $this->session->get('nik_ktp');
                $this->Pemdes_member_model->editProfile($nik_ktp, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Profile</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to(site_url('pemdes/member/editprofile/' . $kode . '/' . $nik_ktp));
            }
        }
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

        return view('sidesa/pemdes/member/editprofile', $data);
    }
}
