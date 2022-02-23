<?php

namespace App\Controllers\User;

use App\Models\Sidesa\User_admin_model;
use App\Models\Sidesa\User_regapi_model;
// use App\Models\Sidesa\User_kalender_model;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected $Admin_model;
    protected $Regapi_model;
    // protected $Kalender_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Admin_model = new User_admin_model();
        $this->Regapi_model = new User_regapi_model();
        // $this->Kalender_model = new User_kalender_model();
        helper('zakezone');
    }

    public function dashboard()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');

        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Kalender Perencanaan (PROTOTYPE)', 'li_1' => 'Admin', 'li_2' => 'Dashboard']),
        ];
        return view('sidesa/user/admin/apps-calendar', $data);
    }

    public function role_management()
    {
        $this->session->remove('keywordapi');
        $builder = $this->db->table('sidesa_user');
        $start = $this->request->getVar('page_sidesa_user') ? $this->request->getVar('page_sidesa_user') : 1;

        $notif = $this->db->table('sidesa_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('target', "1");
        $notif->where('jenis_file', "Role Akses");
        $notif->orWhere('target', "1");
        $notif->where('jenis_file', "Hapus User");
        $notif->update();

        if (isset($_POST['tombolcari'])) {
            $cari = $this->request->getVar('keyword');
            $this->session->set('keyword', $cari);
        } else {
            $cari = $this->session->get('keyword');
        }

        if ($cari) {
            $get_role = $this->Admin_model->getRole($cari);
        } else {
            $get_role = $this->Admin_model->defaultgetRole();
        }

        $data = [
            'title' => 'Role',
            'user' => $builder->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'rolak' => $this->db->table('sidesa_role')->getWhere(['id' => $this->session->get('role_id_sidesa')])->getRowArray(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Role Management', 'li_1' => 'Admin', 'li_2' => 'Role Management']),
            'start' => $start,
            'getrole' => $get_role->paginate(5, 'sidesa_user'),
            'pager' => $get_role->pager,
        ];

        if ($cari) {
            $data['total_rows'] = $this->Admin_model->getRole($cari)->countAllResults();
        } else {
            $data['total_rows'] = $this->Admin_model->defaultgetRole()->countAllResults();
        }

        // if (empty($data['getrole'])) {
        //     $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Data tidak ditemukan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        // }

        return view('sidesa/user/admin/apps-role', $data);
    }

    public function registrasi_api()
    {
        $this->session->remove('keyword');
        $start = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;

        if (isset($_POST['tombolcari'])) {
            $cari = $this->request->getVar('keyword');
            $this->session->set('keyword', $cari);
        } else {
            $cari = $this->session->get('keyword');
        }

        if ($cari) {
            $get_role = $this->Regapi_model->getApiUser($cari);
        } else {
            $get_role = $this->Regapi_model->defaultgetApiUser();
        }

        $data = [
            'title' => 'Registrasi User API',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'rolak' => $this->db->table('sidesa_role')->getWhere(['id' => $this->session->get('role_id_sidesa')])->getRowArray(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Registrasi User API', 'li_1' => 'Admin', 'li_2' => 'Registrasi User API']),
            'start' => $start,
            'getrole' => $get_role->paginate(5, 'auth_api_key'),
            'validation' =>  $this->validation
        ];

        if ($cari) {
            $data['total_rows'] = $this->Regapi_model->getApiUser($cari)->countAllResults();
        } else {
            $data['total_rows'] = $this->Regapi_model->defaultgetApiUser()->countAllResults();
        }

        return view('sidesa/user/admin/apps-registerapi', $data);
    }

    public function register_api()
    {
        $email = $this->request->getVar('email');

        $this->validation->setRule('email', 'Email', 'required|trim|valid_email|is_unique[sidesa_user.email]', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai', 'is_unique' => 'Email sudah terdaftar']);
        $this->validation->setRule('aplication', 'Aplication', 'required|trim', ['required' => 'Nama aplikasi tidak boleh kosong']);
        $this->validation->setRule('password', 'Password', 'required|trim|min_length[6]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit']);
        if ($this->validation->withRequest($this->request)->run()) {
            $input = [
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'aplication' => $this->request->getVar('aplication'),
                'created' => time()
            ];
            $builder = $this->db->table('auth_api_key');
            $builder->insert($input);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>' . $email . ' telah <b>diregistrasi!</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect('user/admin/registrasi_api');
        } else {
            $validation = $this->validation;
            $this->session->setFlashdata('message', '<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-alert-outline label-icon"></i>Registrasi gagal: Periksa kembali inputan Anda masih ada yang salah!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('user/admin/registrasi_api')->with('validation', $validation);
        }
    }

    public function hapussessionkeyword()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        return redirect()->to('user/admin/role_management');
    }

    public function hapussessionkeywordapi()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        return redirect()->to('user/admin/registrasi_api');
    }

    public function role_edit($user_id, $kd_wilayah)
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $editrole = $this->db->table('sidesa_role');
        $editrole->where('id !=', 1);

        $data = [
            'title' => 'Role',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Role Edit', 'li_1' => 'Admin', 'li_2' => 'Role Management']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'edit' => $this->db->table('sidesa_user')->getWhere(['user_id' => $user_id])->getRowArray(),
            'tabrole' => $editrole->get()->getResultArray(),
            'permendagri' => $this->db->table('wilayah_33')->where('id_desa', $kd_wilayah)->orderBy('id_prov ASC')->get()->getRowArray(),
            'roleedit' => $this->db->table('wilayah_33')->select(['id_desa', 'nm_kab', 'nm_kec', 'nm_desa'])->where('id_desa !=', 1)->orderBy('id_prov ASC')->get()->getResultArray(),
            'tabactive' => $this->db->table('sidesa_active')->get()->getResultArray()
        ];

        $this->validation->setRule('id', 'Id', 'trim|required', ['required' => 'Id tidak boleh dikosongkan']);
        if ($this->validation->withRequest($this->request)->run()) {
            $userupdate = $this->db->table('sidesa_user');
            $userupdatedata = [
                "kd_wilayah" => $this->request->getVar('idpermendagri'),
                "role_id" => $this->request->getVar('role'),
                "is_active" => $this->request->getVar('is_active')
            ];
            $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Role <b>' . $data['edit']['nama'] . '</b> Berhasil diubah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            $userupdate->where('user_id', $this->request->getVar('id'));
            $userupdate->update($userupdatedata);

            $input = $this->request->getVar();
            $this->Admin_model->Notifikasiakses($input, $data['user'], $data['edit']);

            $this->session->setFlashdata('message', $flash);
            return redirect()->to('user/admin/role_management');
        } else {
            return view('sidesa/user/admin/apps-role-edit', $data);
        }
    }

    public function role_access($role_id)
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $tabmenu = $this->db->table('sidesa_user_menu');
        $tabmenu->where('id !=', 1);
        $tabmenu->where('id !=', 2);
        $tabmenu->where('id !=', 3);
        $tabmenu->where('id !=', 4);
        $tabmenu->where('id !=', 5);

        $data = [
            'title' => 'Role',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Konfigurasi Akses Menu', 'li_1' => 'Admin', 'li_2' => 'Role Management']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'role' => $this->db->table('sidesa_role')->getWhere(['id' => $role_id])->getRowArray(),
            'menu' => $tabmenu->get()->getResultArray(),
        ];
        return view('sidesa/user/admin/apps-role-access', $data);
    }

    public function changeAccess()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $menu_id = $this->request->getVar('menuId');
        $role_id = $this->request->getVar('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->table('sidesa_user_access_menu');
        $result->like($data);
        if ($result->countAllResults() < 1) {
            $result->insert($data);
        } else {
            $result->delete($data);
        }
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Akses menu</b> Berhasil dikonfigurasi<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function profile()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $sessionEmail = $this->session->get('email_sidesa');

        $data = [
            'title' => 'Profile',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Profile', 'li_1' => 'Admin', 'li_2' => 'Profile']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'kab' => $this->Admin_model->getMyprofile($sessionEmail),
        ];

        return view('sidesa/user/admin/apps-profile', $data);
    }

    public function editprofile()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $data = [
            'title' => 'Edit Profile',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Edit Profile', 'li_1' => 'Admin', 'li_2' => 'Edit Profile']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama', 'Nama lengkap', 'trim|required', ['required' => 'Form tidak boleh dikosongkan']);
            $this->validation->setRule('image', 'Upload Persetujuan', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,2048]', ['mime_in' => 'File yang anda pilih bukan JPG', 'max_size' => 'File anda melebihi 2mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/editprofile')->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $user_id = $this->session->get('id_sidesa');
                $this->Admin_model->editProfile($user_id, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Profile</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/admin/profile');
            }
        }
        return view('sidesa/user/admin/apps-editprofile', $data);
    }

    public function hapusUser($user_id, $nip)
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');

        $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();
        $this->Admin_model->Notifikasihapus($nip, $user);

        $hapus = $this->db->table('sidesa_user');
        $hapus->delete(['user_id' => $user_id]);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>User berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect()->to('user/admin/role_management');
    }

    public function hapusUserApi($id)
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $hapus = $this->db->table('auth_api_key');
        $hapus->delete(['id' => $id]);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>User berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect()->to('user/admin/registrasi_api');
    }
}
