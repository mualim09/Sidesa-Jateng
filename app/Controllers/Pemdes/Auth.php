<?php

namespace App\Controllers\Pemdes;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $validation;
    protected $email;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->validation = \Config\Services::validation();
        $this->email = \Config\Services::email();
    }

    function loginpage($kode)
    {
        if (isset($_POST['signin'])) {
            $this->validation->setRule('nik_ktp', 'NIK', 'required|numeric|min_length[16]|max_length[16]|trim', ['numeric' => 'NIK-KTP hanya diisi angka (tanpa spasi)', 'required' => 'NIK-KTP tidak boleh kosong', 'min_length' => 'NIK harus 16 digit', 'max_length' => 'NIK-KTP harus 16 digit']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('pemdes/auth/loginpage')->withInput();
            }
            $this->validation->setRule('password', 'Password', 'registrasiPEMDES[nik_ktp,password]|aktivasiPEMDES[nik_ktp,password]|validasiPEMDES[nik_ktp,password]', ['validasiPEMDES' => 'Kesalahan input Password', 'aktivasiPEMDES' => 'Akun belum diaktifkan. Hubungi petugas IT Desa!', 'registrasiPEMDES' => 'NIK-KTP belum terdaftar. Silahkan registrasi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('pemdes/auth/loginpage')->withInput();
            } else {
                $builder = $this->db->table('pemdes_user');
                $user = $builder->getWhere(['nik_ktp' => $this->request->getVar('nik_ktp')])->getRowArray();
                $this->login($user);

                if ($user['is_active'] == 1) {
                    return redirect()->to(site_url('pemdes/masyarakat/dashboard'));
                }
            }
        }

        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Pelayanan ' . $whoisdes,
            'page_title' => view('sidesa/layout/pemdes/page-title', ['title' => 'Kecamatan ' . $whoiskec . ", Desa " . $whoisdes, 'li_1' => 'Menu', 'li_2' => 'Home']),
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes,
            'datades' => $this->db->table('dashboard_desa')->getWhere(['kodedes' => substr($kode, 0, 13)])->getRowArray(),
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'validation' => $this->validation
        ];

        return view('sidesa/pemdes/auth/login', $data);
    }

    private function login($user)
    {
        $data = [
            'id_user' => $user['id'],
            'nik_kk' => $user['nik_kk'],
            'nik_ktp' => $user['nik_ktp'],
            'is_active' => $user['is_active'],
            'kd_wilayah' => $user['kd_wilayah'],
        ];
        $this->session->set($data);
        return true;
    }

    function forgotpass($kode)
    {
        if ($this->session->get('kd_wilayah')) {
            return redirect('pemdes/loginpage/' . $kode);
        }
        if (isset($_POST['forgot'])) {
            $this->validation->setRule('nik_ktp', 'NIK-KTP', 'required|numeric|min_length[16]|max_length[16]|registrasiPEMDES[nik_ktp,password]|trim', ['numeric' => 'NIK-KTP hanya diisi angka (tanpa spasi)', 'required' => 'NIK-KTP tidak boleh kosong', 'min_length' => 'NIK harus 16 digit', 'max_length' => 'NIK-KTP harus 16 digit', 'registrasiPEMDES' => 'NIK-KTP belum terdaftar. Silahkan registrasi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('pemdes/auth/forgotpass/' . $kode)->withInput();
            } else {
                $builderuser = $this->db->table('pemdes_user');
                $buildertoken = $this->db->table('pemdes_user_token');

                $nik_ktp = $this->request->getVar('nik_ktp');
                $user = $builderuser->getWhere(['nik_ktp' => $nik_ktp, 'is_active' => 1])->getRowArray();

                if ($user) {
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'nik_ktp' => $nik_ktp,
                        'token' => $token,
                        'tanggal' => time()
                    ];

                    $buildertoken->insert($user_token);

                    return redirect('user/konfirmasi-resetpass');
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Email belum terdaftar / belum di ACC Perangkat Desa!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect('pemdes/auth/forgotpass/' . $kode);
                }
            }
        }
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Lupa Password | SIDesa JATENG',
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes,
            'validation' => $this->validation
        ];
        return view('sidesa/pemdes/auth/forgot-password', $data);
    }

    public function logout()
    {
        $data = [
            'id_user',
            'nik_kk',
            'nik_ktp',
            'is_active',
            'kd_wilayah',
            'reset_pass'
        ];
        $this->session->remove($data);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Anda telah logged out!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect('user/panel');
    }
}
