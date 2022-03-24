<?php

namespace App\Controllers\Pemdes;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $validation;
    // protected $email;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->validation = \Config\Services::validation();
        // $this->email = \Config\Services::email();
    }

    function loginpage($kode)
    {
        if (isset($_POST['signin'])) {
            $this->validation->setRule('nik_ktp', 'NIK-KTP', 'required|numeric|min_length[16]|max_length[16]|trim', ['numeric' => 'NIK-KTP hanya diisi angka (tanpa spasi)', 'required' => 'NIK-KTP tidak boleh kosong', 'min_length' => 'NIK-KTP harus 16 digit', 'max_length' => 'NIK-KTP harus 16 digit']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('pemdes/auth/login/' . $kode)->withInput();
            }
            $this->validation->setRule('password', 'Password', 'registrasiPEMDES[nik_ktp,password]|aktivasiPEMDES[nik_ktp,password]|validasiPEMDES[nik_ktp,password]', ['validasiPEMDES' => 'Kesalahan input Password', 'aktivasiPEMDES' => 'Akun belum diaktifkan. Hubungi petugas IT Desa!', 'registrasiPEMDES' => 'NIK-KTP belum terdaftar. Silahkan registrasi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('pemdes/auth/login/' . $kode)->withInput();
            } else {
                $nik_ktp = $this->request->getVar('nik_ktp');
                $builder = $this->db->table('pemdes_user');
                $user = $builder->getWhere(['nik_ktp' => $nik_ktp])->getRowArray();
                $this->login($user);
                return redirect()->to(site_url('pemdes/member/home/' . $kode . '/' . $nik_ktp));
            }
        }

        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Login Pelayanan | ' . $whoisdes,
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes,
            'validation' => $this->validation
        ];

        return view('sidesa/pemdes/auth/login', $data);
    }

    function registration($kode)
    {
        if (isset($_POST['regis'])) {
            $this->validation->setRule('nama', 'Nama', 'required|alpha_space|trim', ['required' => 'Nama tidak boleh kosong', 'alpha_space' => 'Nama hanya diisi alphabet dan spasi']);
            $this->validation->setRule('no_kk', 'NO-KK', 'required|numeric|min_length[16]|max_length[16]|trim', ['numeric' => 'Nomor KK hanya diisi angka (tanpa spasi)', 'required' => 'Nomor KK tidak boleh kosong', 'min_length' => 'Nomor KK harus 16 digit', 'max_length' => 'Nomor KK harus 16 digit']);
            $this->validation->setRule('nik_ktp', 'NIK-KTP', 'required|numeric|min_length[16]|max_length[16]|trim|is_unique[pemdes_user.nik_ktp]', ['required' => 'NIK-KTP tidak boleh kosong', 'min_length' => 'NIK-KTP harus 16 digit (hanya diisi angka tanpa spasi)', 'max_length' => 'NIK-KTP harus 16 digit (hanya diisi angka tanpa spasi)', 'is_unique' => 'NIK-KTP sudah terdaftar', 'numeric' => 'NIK-KTP hanya diisi angka (tanpa spasi)']);
            $this->validation->setRule('hp', 'HP', 'required|numeric|min_length[10]|max_length[15]|trim', ['numeric' => 'Nomor HP hanya diisi angka (tanpa spasi)', 'required' => 'Nomor HP tidak boleh kosong', 'min_length' => 'Nomor HP minimal harus 10 digit', 'max_length' => 'Nomor HP maximal harus 15 digit']);
            $this->validation->setRule('password', 'Password', 'required|trim|min_length[6]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 karakter']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('pemdes/auth/registrasi/' . $kode)->withInput();
            } else {
                $builderuser = $this->db->table('pemdes_user');
                $buildertoken = $this->db->table('pemdes_user_token');

                $nik_ktp = $this->request->getVar('nik_ktp');
                $datareg = [
                    'kd_wilayah' => $kode,
                    'nama' => htmlspecialchars($this->request->getVar('nama')),
                    'no_kk' => htmlspecialchars($this->request->getVar('no_kk')),
                    'nik_ktp' => htmlspecialchars($this->request->getVar('nik_ktp')),
                    'hp' => htmlspecialchars($this->request->getVar('hp')),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'image' => 'default.jpg',
                    'is_active' => 0,
                    'created' => time()
                ];

                // token untuk Aktivasi dikirim melalui WA dari user panel perangkat desa
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'nik_ktp' => $nik_ktp,
                    'token' => $token,
                    'tanggal' => time()
                ];

                $builderuser->insert($datareg);
                $buildertoken->insert($user_token);

                return redirect()->to(site_url('pemdes/auth/konfirmasi-whatsapp/' . $kode));
            }
        }
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Registrasi Pelayanan | ' . $whoisdes,
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes,
            'validation' => $this->validation
        ];
        return view('sidesa/pemdes/auth/registration', $data);
    }

    private function login($user)
    {
        $data = [
            'id_user' => $user['id'],
            'no_kk' => $user['no_kk'],
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
                return redirect()->to('pemdes/auth/lupa-password/' . $kode)->withInput();
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

                    return redirect()->to(site_url('pemdes/auth/konfirmasi-resetpass/' . $kode));
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>NIK-KTP belum registrasi / belum di ACC Perangkat Desa!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect()->to(site_url('pemdes/auth/lupa-password/' . $kode));
                }
            }
        }
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Lupa Password | ' . $whoisdes,
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes,
            'validation' => $this->validation
        ];
        return view('sidesa/pemdes/auth/forgot-password', $data);
    }

    public function logout($kode)
    {
        $data = [
            'id_user',
            'no_kk',
            'nik_ktp',
            'is_active',
            'kd_wilayah',
            'reset_pass'
        ];
        $this->session->remove($data);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Anda telah logged out!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect()->to(site_url('pemdes/auth/login/' . $kode));
    }

    function confirm_wa($kode)
    {
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Konfirmasi | PEMDES ' . $whoisdes,
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes
        ];
        return view('sidesa/pemdes/auth/konfirmasiwa', $data);
    }

    function confirm_resetpass($kode)
    {
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Konfirmasi | PEMDES ' . $whoisdes,
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes
        ];
        return view('sidesa/pemdes/auth/konfirmasireset', $data);
    }

    function verify_wa($kode)
    {
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);

        $builderuser = $this->db->table('pemdes_user');
        $buildertoken = $this->db->table('pemdes_user_token');

        $nik_ktp = $this->request->getVar('nik_ktp');
        $token = $this->request->getVar('token');

        $user = $builderuser->getWhere(['nik_ktp' => $nik_ktp])->getRowArray();

        if ($user) {
            $user_token = $buildertoken->getWhere(['token' => $token])->getRowArray();
            if ($user_token) {
                if (time() - $user_token['tanggal'] < (60 * 60 * 168)) {
                    $builderuser->set('is_active', 1);
                    $builderuser->where('nik_ktp', $nik_ktp);
                    $builderuser->update();
                    $buildertoken->delete(['nik_ktp' => $nik_ktp]);

                    $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>NIK-KTP </b>' . $nik_ktp . '</b> telah diaktifkan. silahkan login untuk menggunakan Layanan Mandiri Elektronik Desa!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect()->to(site_url('pemdes/auth/login/' . $kode));
                } else {

                    $builderuser->delete(['nik_ktp' => $nik_ktp]);
                    $buildertoken->delete(['nik_ktp' => $nik_ktp]);

                    $this->session->setFlashdata('message', '<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-alert-outline label-icon"></i>Aktivasi akun gagal: Waktu aktivasi telah expired silahkan register kembali!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect()->to(site_url('pemdes/auth/login/' . $kode));
                }
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show mb-0" role="alert"><i class="mdi mdi-alert-circle-outline label-icon"></i>Aktivasi akun gagal: Token sudah pernah digunakan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to(site_url('pemdes/auth/login/' . $kode));
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Aktivasi akun gagal: NIK-KTP tidak sesuai dengan database yang ada di Desa ' . $whoisdes . ' !<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to(site_url('pemdes/auth/login/' . $kode));
        }
    }

    function resetPass($kode)
    {
        $builderuser = $this->db->table('pemdes_user');
        $buildertoken = $this->db->table('pemdes_user_token');

        $nik_ktp = $this->request->getVar('nik_ktp');
        $token = $this->request->getVar('token');

        if ($nik_ktp == null) {
            return redirect()->to(site_url('pemdes/auth/login/' . $kode));
        }
        $user = $builderuser->getWhere(['nik_ktp' => $nik_ktp])->getRowArray();

        if ($user) {
            $user_token = $buildertoken->getWhere(['token' => $token])->getRowArray();
            if ($user_token) {
                $reset_nik_ktp = ['reset_pass' => $nik_ktp];
                $this->session->set($reset_nik_ktp); // untuk bisa masuk ke url (fitur) reset password
                $this->changePassword($kode);
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Reset password gagal! Tautan token tidak valid!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to(site_url('pemdes/auth/login/' . $kode));
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Reset password gagal! NIK-KTP tidak valid!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to(site_url('pemdes/auth/login/' . $kode));
        }
    }

    function changePassword($kode)
    {
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $builderuser = $this->db->table('pemdes_user');
        $buildertoken = $this->db->table('pemdes_user_token');

        if (!$this->session->get('reset_pass')) {
            return redirect()->to(site_url('pemdes/auth/login/' . $kode));
        }
        if (isset($_POST['gantipas'])) {
            $this->validation->setRule('password1', 'Password', 'required|trim|min_length[6]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit']);
            $this->validation->setRule('password2', 'Password', 'matches[password1]', ['matches' => 'Pencocokan password tidak sesuai']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('pemdes/auth/ganti-password/' . $kode)->withInput();
            } else {
                $password = password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT);
                $nik_ktp = $this->session->get('reset_pass');

                $builderuser->set('password', $password);
                $builderuser->where('nik_ktp', $nik_ktp);
                $builderuser->update();
                $buildertoken->delete(['nik_ktp' => $nik_ktp]);

                $this->session->remove('reset_pass');
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Password berhasil <b>diubah</b>. Silahkan login!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to(site_url('pemdes/auth/login/' . $kode));
            }
        }
        $data = [
            'title' => 'Ganti Password | PEMDES ' . $whoisdes,
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes,
            'validation' => $this->validation
        ];
        echo view('sidesa/pemdes/auth/change-password', $data);
    }

    public function blocked($kode)
    {
        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'kodedes' => $kode,
            'namakec' => $whoiskec,
            'namades' => $whoisdes
        ];

        return view('sidesa/pemdes/auth/blocked', $data);
    }
}
