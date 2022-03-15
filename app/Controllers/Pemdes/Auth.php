<?php

namespace App\Controllers\Pemdes;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    function loginpage($kode)
    {
        if (isset($_POST['signin'])) {
            $this->validation->setRule('nip', 'NIP', 'required|numeric|min_length[16]|max_length[16]|trim', ['numeric' => 'NIP hanya diisi angka (tanpa spasi)', 'required' => 'NIP tidak boleh kosong', 'min_length' => 'NIP harus 16 digit', 'max_length' => 'NIP harus 16 digit']);
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

        $cekkodedes = $this->db->table('wilayah_33')->getWhere(['id_desa' => $kode])->getRowArray();
        $hurufawaldes = strtolower($cekkodedes['nm_desa']);
        $whoisdes = ucwords($hurufawaldes);
        $hurufawalkec = strtolower($cekkodedes['nm_kec']);
        $whoiskec = ucwords($hurufawalkec);

        $data = [
            'title' => 'Data',
            'page_title' => view('sidesa/layout/pemdes/page-title', ['title' => 'Kecamatan ' . $whoiskec . ", Desa " . $whoisdes, 'li_1' => 'Menu', 'li_2' => 'Home']),
            'kodedes' => $kode,
            'datades' => $this->db->table('dashboard_desa')->getWhere(['kodedes' => substr($kode, 0, 13)])->getRowArray(),
            'listkec' => $this->db->table('kd_kecamatan')->getWhere(['id_kab' => substr($kode, 0, 5)])->getResult(),
            'validation' => $this->validation
        ];

        return view('sidesa/pemdes/auth/login', $data);
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
}
