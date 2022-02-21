<?php

namespace App\Controllers\User;

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

    function index()
    {
        if (isset($_POST['signin'])) {
            $this->validation->setRule('nip', 'NIP', 'required|numeric|min_length[18]|max_length[18]|trim', ['numeric' => 'NIP hanya diisi angka (tanpa spasi)', 'required' => 'NIP tidak boleh kosong', 'min_length' => 'NIP harus 18 digit', 'max_length' => 'NIP harus 18 digit']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/auth')->withInput();
            }
            $this->validation->setRule('password', 'Password', 'registrasiSIDESA[nip,password]|aktivasiSIDESA[nip,password]|validasiSIDESA[nip,password]', ['validasiSIDESA' => 'Kesalahan input Password', 'aktivasiSIDESA' => 'Akun belum diaktifkan. Hubungi petugas!', 'registrasiSIDESA' => 'NIP belum terdaftar. Silahkan registrasi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/auth')->withInput();
            } else {
                $builder = $this->db->table('sidesa_user');
                $user = $builder->getWhere(['nip' => $this->request->getVar('nip')])->getRowArray();
                $this->login($user);

                if ($user['role_id'] == 1) {
                    return redirect()->to(site_url('user/admin/dashboard'));
                }
                if ($user['role_id'] == 2) {
                    return redirect()->to(site_url('user/administrator/dashboard'));
                }
                if ($user['role_id'] == 3) {
                    return redirect()->to(site_url('user/moderator/dashboard'));
                }
                if ($user['role_id'] == 4) {
                    return redirect()->to(site_url('user/member/dashboard'));
                }
                if ($user['role_id'] == 5) {
                    return redirect()->to(site_url('user/belumassign'));
                }
                if ($user['role_id'] == 6) {
                    return redirect()->to(site_url('user/kabupaten5a/dashboard'));
                }
                if ($user['role_id'] == 7) {
                    return redirect()->to(site_url('user/provinsi5a/dashboard'));
                }
                if ($user['role_id'] == 8) {
                    return redirect()->to(site_url('user/kabupaten5b/dashboard'));
                }
                if ($user['role_id'] == 9) {
                    return redirect()->to(site_url('user/provinsi5b/dashboard'));
                }
            }
        }
        $data = [
            'title' => 'Login | SIDesa JATENG',
            'validation' => $this->validation
        ];
        return view('sidesa/user/auth/login', $data);
    }

    function registration()
    {
        if (isset($_POST['regis'])) {
            $this->validation->setRule('email', 'Email', 'required|trim|valid_email|is_unique[sidesa_user.email]', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai', 'is_unique' => 'Email sudah terdaftar']);
            $this->validation->setRule('nip', 'Nip', 'required|numeric|min_length[18]|max_length[18]|trim|is_unique[sidesa_user.nip]', ['required' => 'Nip tidak boleh kosong', 'min_length' => 'NIP harus 18 digit (hanya diisi angka tanpa spasi)', 'max_length' => 'NIP harus 18 digit (hanya diisi angka tanpa spasi)', 'is_unique' => 'NIP sudah terdaftar', 'numeric' => 'NIP hanya diisi angka (tanpa spasi)']);
            $this->validation->setRule('nama', 'Nama', 'required|trim', ['required' => 'Nama tidak boleh kosong']);
            $this->validation->setRule('password', 'Password', 'required|trim|min_length[6]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/registrasi')->withInput();
            } else {
                $builderuser = $this->db->table('sidesa_user');
                $buildertoken = $this->db->table('sidesa_user_token');

                $email = $this->request->getVar('email');
                $datareg = [
                    'nama' => htmlspecialchars($this->request->getVar('nama')),
                    'nip' => htmlspecialchars($this->request->getVar('nip')),
                    'email' => htmlspecialchars($email),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'role_id' => 5,
                    'kd_wilayah' => 5,
                    'is_active' => 2,
                    'tanggal' => time()
                ];

                // token untuk Aktivasi
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'tanggal' => time()
                ];

                $builderuser->insert($datareg);
                $buildertoken->insert($user_token);

                $this->_sendEmail($token, 'verify');

                return redirect('user/konfirmasi-email');
            }
        }
        $data = [
            'title' => 'Registrasi | SIDesa JATENG',
            'validation' => $this->validation
        ];
        return view('sidesa/user/auth/registration', $data);
    }

    function confirm_email()
    {
        $data = [
            'title' => 'Konfirmasi | SIDesa JATENG',
        ];
        return view('sidesa/user/auth/konfirmasiemail', $data);
    }

    function confirm_resetpass()
    {
        $data = [
            'title' => 'Konfirmasi | SIDesa JATENG',
        ];
        return view('sidesa/user/auth/konfirmasireset', $data);
    }

    function forgotpassword()
    {
        if ($this->session->get('role_id_sidesa')) {
            return redirect('user/panel');
        }
        if (isset($_POST['forgot'])) {
            $this->validation->setRule('email', 'Email', 'required|trim|valid_email', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/lupa-password')->withInput();
            } else {
                $builderuser = $this->db->table('sidesa_user');
                $buildertoken = $this->db->table('sidesa_user_token');

                $email = $this->request->getVar('email');
                $user = $builderuser->getWhere(['email' => $email, 'is_active' => 1])->getRowArray();

                if ($user) {
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'tanggal' => time()
                    ];

                    $buildertoken->insert($user_token);
                    $this->_sendEmail($token, 'forgot');

                    return redirect('user/konfirmasi-resetpass');
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Email belum terdaftar/aktif!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect('user/lupa-password');
                }
            }
        }
        $data = [
            'title' => 'Lupa Password | SIDesa JATENG',
            'validation' => $this->validation
        ];
        return view('sidesa/user/auth/forgot-password', $data);
    }

    private function login($user)
    {
        $data = [
            'email_sidesa' => $user['email'],
            'nip_sidesa' => $user['nip'],
            'role_id_sidesa' => $user['role_id'],
            'id_sidesa' => $user['user_id'],
            'kd_wilayah_sidesa' => $user['kd_wilayah'],
        ];
        $this->session->set($data);
        return true;
    }

    public function logout()
    {
        $data = [
            'email_sidesa',
            'nip_sidesa',
            'role_id_sidesa',
            'id_sidesa',
            'kd_wilayah_sidesa',
            'reset_pass'
        ];
        $this->session->remove($data);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Anda telah logged out!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect('user/panel');
    }

    private function _sendEmail($token, $type)
    {
        $this->email->setFrom('dispermades.adm@gmail.com', 'SIDESA DISPERMADES. PROV. JATENG');
        $this->email->setTo($this->request->getVar('email'));

        if ($type == 'verify') {
            $this->email->setSubject('Aktivasi Akun SIDesa Provinsi Jawa Tengah');
            $this->email->setMessage('Click tautan untuk melakukan: <a href="' . base_url() . '/user/verify?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Aktivasi</a><p><i>Catatan: Kami tidak menerima email balasan, terima kasih.</i></p>');
        } else if ($type == 'forgot') {
            $this->email->setSubject('Reset password SIDesa Provinsi Jawa Tengah');
            $this->email->setMessage('Click tautan untuk melakukan: <a href="' . base_url() . '/user/resetpassword?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Reset password</a><p><i>Catatan: Kami tidak menerima email balasan, terima kasih.</i></p>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->printDebugger();
            die;
        }
    }

    function verify()
    {
        $builderuser = $this->db->table('sidesa_user');
        $buildertoken = $this->db->table('sidesa_user_token');

        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $user = $builderuser->getWhere(['email' => $email])->getRowArray();

        if ($user) {
            $user_token = $buildertoken->getWhere(['token' => $token])->getRowArray();
            if ($user_token) {
                if (time() - $user_token['tanggal'] < (60 * 60 * 24)) {
                    $builderuser->set('is_active', 1);
                    $builderuser->where('email', $email);
                    $builderuser->update();
                    $buildertoken->delete(['email' => $email]);

                    $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>' . $email . ' telah diaktifkan. silahkan <b>menghubungi petugas PEMPROV untuk verifikasi ID KEMENDAGRI!</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect('user/panel');
                } else {

                    $builderuser->delete(['email' => $email]);
                    $buildertoken->delete(['email' => $email]);

                    $this->session->setFlashdata('message', '<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-alert-outline label-icon"></i>Aktivasi akun gagal: Aktivasi telah expired silahkan register kembali!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect('user/panel');
                }
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show mb-0" role="alert"><i class="mdi mdi-alert-circle-outline label-icon"></i>Aktivasi akun gagal: Token sudah pernah digunakan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect('user/panel');
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Aktivasi akun gagal: Email tidak sesuai!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect('user/panel');
        }
    }

    function resetPassword()
    {
        $builderuser = $this->db->table('sidesa_user');
        $buildertoken = $this->db->table('sidesa_user_token');

        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        if ($email == null) {
            return redirect('user/panel');
        }
        $user = $builderuser->getWhere(['email' => $email])->getRowArray();

        if ($user) {
            $user_token = $buildertoken->getWhere(['token' => $token])->getRowArray();
            if ($user_token) {
                $reset_email = ['reset_pass' => $email];
                $this->session->set($reset_email);
                $this->changePassword();
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Reset password gagal! Tautan token tidak valid!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect('user/panel');
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Reset password gagal! Email tidak valid!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect('user/panel');
        }
    }

    function changePassword()
    {
        $builderuser = $this->db->table('sidesa_user');
        $buildertoken = $this->db->table('sidesa_user_token');

        if (!$this->session->get('reset_pass')) {
            return redirect('user/panel');
        }
        if (isset($_POST['gantipas'])) {
            $this->validation->setRule('password1', 'Password', 'required|trim|min_length[6]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit']);
            $this->validation->setRule('password2', 'Password', 'matches[password1]', ['matches' => 'Pencocokan password tidak sesuai']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/ganti-password')->withInput();
            } else {
                $password = password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT);
                $email = $this->session->get('reset_pass');

                $builderuser->set('password', $password);
                $builderuser->where('email', $email);
                $builderuser->update();
                $buildertoken->delete(['email' => $email]);

                $this->session->remove('reset_pass');
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Password berhasil <b>diubah</b>. Silahkan login!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect('user/panel');
            }
        }
        $data = [
            'title' => 'Ganti Password | SIDesa JATENG',
            'validation' => $this->validation
        ];
        echo view('sidesa/user/auth/change-password', $data);
    }

    public function blocked()
    {
        return view('sidesa/user/auth/blocked');
    }

    public function blockedakses()
    {
        return view('sidesa/user/auth/blockedakses');
    }
}
