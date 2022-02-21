<?php

namespace App\Controllers\Sitkd;

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
        if (isset($_POST['login'])) {
            $this->validation->setRule('nip', 'NIP', 'required|numeric|min_length[18]|max_length[18]|trim', ['numeric' => 'NIP hanya diisi angka (tanpa spasi)', 'required' => 'NIP tidak boleh kosong', 'min_length' => 'NIP harus 18 digit', 'max_length' => 'NIP harus 18 digit']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/auth')->withInput();
            }
            $this->validation->setRule('password', 'Password', 'registrasiSITKD[nip,password]|aktivasiSITKD[nip,password]|validasiSITKD[nip,password]', ['validasiSITKD' => 'Kesalahan input Password', 'aktivasiSITKD' => 'Akun belum diaktifkan. Mohon hubungi admin / moderator!', 'registrasiSITKD' => 'NIP belum terdaftar. Silahkan registrasi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/auth')->withInput();
            } else {
                $builder = $this->db->table('sitkd_user');
                $user = $builder->getWhere(['nip' => $this->request->getVar('nip')])->getRowArray();
                $this->login($user);

                if ($user['role_id'] == 1) {
                    return redirect()->to(site_url('sitkd/admin'));
                }
                if ($user['role_id'] == 2) {
                    return redirect()->to(site_url('sitkd/moderator'));
                }
                if ($user['role_id'] == 3) {
                    return redirect()->to(site_url('sitkd/member'));
                }
            }
        }
        $data = [
            'title' => 'Login | SITKD JATENG',
            'validation' => $this->validation
        ];
        echo view('sitkd/templates/auth_header', $data);
        echo view('sitkd/auth/login');
        echo view('sitkd/templates/auth_footer');
    }

    function registration()
    {
        if (isset($_POST['register'])) {
            $this->validation->setRule('nama', 'Nama', 'required|trim', ['required' => 'Nama tidak boleh kosong']);
            $this->validation->setRule('email', 'Email', 'required|trim|valid_email|is_unique[sitkd_user.email]', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai', 'is_unique' => 'Email sudah terdaftar']);
            $this->validation->setRule('password1', 'Password', 'required|trim|min_length[6]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit']);
            $this->validation->setRule('password2', 'Password', 'matches[password1]', ['matches' => 'Password tidak sesuai']);
            $this->validation->setRule('nip', 'Nip', 'required|numeric|min_length[18]|max_length[18]|trim|is_unique[sitkd_user.nip]', ['required' => 'Nip tidak boleh kosong', 'min_length' => 'NIP harus 18 digit (hanya diisi angka tanpa spasi)', 'max_length' => 'NIP harus 18 digit (hanya diisi angka tanpa spasi)', 'is_unique' => 'NIP sudah terdaftar', 'numeric' => 'NIP hanya diisi angka (tanpa spasi)']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/registrasi')->withInput();
            } else {
                // $model = new Sitkd_usermodel();
                $builderuser = $this->db->table('sitkd_user');
                $buildertoken = $this->db->table('sitkd_user_token');

                $email = $this->request->getVar('email');
                $datareg = [
                    'nama' => htmlspecialchars($this->request->getVar('nama')),
                    'nip' => htmlspecialchars($this->request->getVar('nip')),
                    'email' => htmlspecialchars($email),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
                    'role_id' => 3,
                    'permendagri_id' => 9999,
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

                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil didaftarkan. Aktifkan akun anda melalui email yang didaftarkan (aktivasi expired 24 jam)</div>');
                return redirect('sitkd/auth');
            }
        }
        $data = [
            'title' => 'Registrasi | SITKD JATENG',
            'validation' => $this->validation
        ];
        echo view('sitkd/templates/auth_header', $data);
        echo view('sitkd/auth/registration');
        echo view('sitkd/templates/auth_footer');
    }

    function forgotpassword()
    {
        if ($this->session->get('role_id')) {
            return redirect('sitkd/auth');
        }
        if (isset($_POST['forgot'])) {
            $this->validation->setRule('email', 'Email', 'required|trim|valid_email', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/lupapassword')->withInput();
            } else {
                $builderuser = $this->db->table('sitkd_user');
                $buildertoken = $this->db->table('sitkd_user_token');

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

                    $this->session->setFlashdata('message', '<div class="alert alert-info" role="alert">Silahkan cek email anda untuk melakukan reset password</div>');
                    return redirect('sitkd/lupapassword');
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Email belum didaftarkan/teraktivasi</div>');
                    return redirect('sitkd/lupapassword');
                }
            }
        }
        $data = [
            'title' => 'Lupa Password | SITKD JATENG',
            'validation' => $this->validation
        ];
        echo view('sitkd/templates/auth_header', $data);
        echo view('sitkd/auth/forgot-password');
        echo view('sitkd/templates/auth_footer');
    }

    private function login($user)
    {
        $data = [
            'email' => $user['email'],
            'nip' => $user['nip'],
            'role_id' => $user['role_id'],
            'user_id' => $user['user_id'],
            'permendagri_id' => $user['permendagri_id'],
        ];
        $this->session->set($data);
        return true;
    }

    public function logout()
    {
        $data = [
            'email',
            'nip',
            'user_id',
            'role_id',
            'permendagri_id',
            'reset_email'
        ];
        $this->session->remove($data);
        $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Anda telah logged out!</div>');
        return redirect('sitkd/login');
    }

    private function _sendEmail($token, $type)
    {
        $this->email->setFrom('dispermades.adm@gmail.com', 'SITKD DISPERMADES JATENG');
        $this->email->setTo($this->request->getVar('email'));

        if ($type == 'verify') {
            $this->email->setSubject('Aktivasi Akun SITKD Provinsi Jawa Tengah');
            $this->email->setMessage('Click tautan untuk melakukan: <a href="' . base_url() . '/sitkd/verify?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Aktivasi</a><p><i>Catatan: Kami tidak menerima email balasan, terima kasih.</i></p>');
        } else if ($type == 'forgot') {
            $this->email->setSubject('Reset password SITKD Provinsi Jawa Tengah');
            $this->email->setMessage('Click tautan untuk melakukan: <a href="' . base_url() . '/sitkd/resetpassword?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Reset password</a><p><i>Catatan: Kami tidak menerima email balasan, terima kasih.</i></p>');
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
        $builderuser = $this->db->table('sitkd_user');
        $buildertoken = $this->db->table('sitkd_user_token');

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

                    $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">' . $email . '  telah diaktifkan. silahkan <b>menghubungi petugas PEMPROV untuk verifikasi ID PERMENDAGRI!</b></div>');
                    return redirect('sitkd/auth');
                } else {

                    $builderuser->delete(['email' => $email]);
                    $buildertoken->delete(['email' => $email]);

                    $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal: Aktivasi telah expired silahkan register kembali</div>');
                    return redirect('sitkd/auth');
                }
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal: Token sudah pernah digunakan</div>');
                return redirect('sitkd/auth');
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal: Kesalahan email</div>');
            return redirect('sitkd/auth');
        }
    }

    function resetPassword()
    {
        $builderuser = $this->db->table('sitkd_user');
        $buildertoken = $this->db->table('sitkd_user_token');

        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        if ($email == null) {
            return redirect('sitkd/auth');
        }
        $user = $builderuser->getWhere(['email' => $email])->getRowArray();

        if ($user) {
            $user_token = $buildertoken->getWhere(['token' => $token])->getRowArray();
            if ($user_token) {
                $reset_email = ['reset_email' => $email];
                $this->session->set($reset_email);
                $this->changePassword();
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Tautan token tidak sesuai</div>');
                return redirect('sitkd/auth');
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Email tidak sesuai</div>');
            return redirect('sitkd/auth');
        }
    }

    function changePassword()
    {
        $builderuser = $this->db->table('sitkd_user');
        $buildertoken = $this->db->table('sitkd_user_token');

        if (!$this->session->get('reset_email')) {
            return redirect('sitkd/auth');
        }
        if (isset($_POST['gantipass'])) {
            $this->validation->setRule('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit', 'matches' => 'Password tidak sesuai']);
            $this->validation->setRule('password2', 'Password', 'required|matches[password1]', ['required' => 'Pencocokan password tidak boleh kosong', 'matches' => 'Pencocokan password tidak sesuai']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/gantipassword')->withInput();
            } else {
                $password = password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT);
                $email = $this->session->get('reset_email');

                $builderuser->set('password', $password);
                $builderuser->where('email', $email);
                $builderuser->update();
                $buildertoken->delete(['email' => $email]);

                $this->session->remove('reset_email');
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Password berhasil reset. Silahkan login kembali</div>');
                return redirect('sitkd/auth');
            }
        }
        $data = [
            'title' => 'Change Password | SITKD JATENG',
            'validation' => $this->validation
        ];
        echo view('sitkd/templates/auth_header', $data);
        echo view('sitkd/auth/change-password');
        echo view('sitkd/templates/auth_footer');
    }

    public function blocked()
    {
        echo view('sitkd/auth/blocked');
    }

    public function blockedakses()
    {
        echo view('sitkd/auth/blockedakses');
    }
}
