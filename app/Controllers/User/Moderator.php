<?php

namespace App\Controllers\User;

use App\Models\Sidesa\User_moderator_model;
use App\Controllers\BaseController;

class Moderator extends BaseController
{
    protected $Moderator_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Moderator_model = new User_moderator_model();
        helper('zakezone');
    }

    public function dashboard()
    {
        $this->session->remove('keyword');

        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Kalender Perencanaan (PROTOTYPE)', 'li_1' => 'Moderator', 'li_2' => 'Dashboard']),
        ];
        return view('sidesa/user/moderator/apps-calendar', $data);
    }

    public function role_management()
    {
        $builder = $this->db->table('sidesa_user');
        $start = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;

        $notif = $this->db->table('sidesa_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('target', "3");
        $notif->where('jenis_file', "Role Akses");
        $notif->orWhere('target', "3");
        $notif->where('jenis_file', "Hapus User");
        $notif->update();

        if (isset($_POST['tombolcari'])) {
            $cari = $this->request->getVar('keyword');
            $this->session->set('keyword', $cari);
        } else {
            $cari = $this->session->get('keyword');
        }

        if ($cari) {
            $get_role = $this->Moderator_model->getRole($cari);
        } else {
            $get_role = $this->Moderator_model->defaultgetRole();
        }

        $data = [
            'title' => 'Role',
            'user' => $builder->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'rolak' => $this->db->table('sidesa_role')->getWhere(['id' => $this->session->get('role_id_sidesa')])->getRowArray(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Role Management', 'li_1' => 'Moderator', 'li_2' => 'Role Management']),
            'start' => $start,
            'getrole' => $get_role->paginate(5, 'sidesa_user'),
            'pager' => $get_role->pager,
        ];

        if ($cari) {
            $data['total_rows'] = $this->Moderator_model->getRole($cari)->countAllResults();
        } else {
            $data['total_rows'] = $this->Moderator_model->defaultgetRole()->countAllResults();
        }

        // dd($data['rolak']['role_akses']);

        return view('sidesa/user/moderator/apps-role', $data);
    }

    public function hapussessionkeyword()
    {
        $this->session->remove('keyword');
        return redirect()->to('user/moderator/role_management');
    }

    public function role_edit($user_id, $kd_wilayah)
    {
        $this->session->remove('keyword');
        $editrole = $this->db->table('sidesa_role');
        $editrole->where('id !=', 1);
        $editrole->where('id !=', 2);
        $editrole->where('id !=', 3);

        $data = [
            'title' => 'Role',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Role Edit', 'li_1' => 'Moderator', 'li_2' => 'Role Management']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'edit' => $this->db->table('sidesa_user')->getWhere(['user_id' => $user_id])->getRowArray(),
            'tabrole' => $editrole->get()->getResultArray(),
            'permendagri' => $this->db->table('wilayah_33')->where('id_desa', $kd_wilayah)->orderBy('id_prov ASC')->get()->getRowArray(),
            'roleedit' => $this->db->table('wilayah_33')->select(['id_desa', 'nm_kab', 'nm_kec', 'nm_desa'])->where('id_desa >', 3)->orderBy('id_prov ASC')->get()->getResultArray(),
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
            $this->Moderator_model->Notifikasiakses($input, $data['user'], $data['edit']);

            $this->session->setFlashdata('message', $flash);
            return redirect()->to('user/moderator/role_management');
        } else {
            return view('sidesa/user/moderator/apps-role-edit', $data);
        }
    }

    public function role_accessm($role_id)
    {
        $this->session->remove('keyword');
        $tabmenu = $this->db->table('sidesa_user_menu');
        $tabmenu->where('id !=', 1);
        $tabmenu->where('id !=', 2);
        $tabmenu->where('id !=', 3);
        $tabmenu->where('id !=', 4);
        $tabmenu->where('id !=', 5);
        $tabmenu->where('id !=', 6);
        $tabmenu->where('id !=', 7);
        $tabmenu->where('id !=', 8);
        $tabmenu->where('id !=', 18);

        $data = [
            'title' => 'Role',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Konfigurasi Akses Menu', 'li_1' => 'Moderator', 'li_2' => 'Role Management']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'role' => $this->db->table('sidesa_role')->getWhere(['id' => $role_id])->getRowArray(),
            'menu' => $tabmenu->get()->getResultArray(),
        ];
        return view('sidesa/user/moderator/apps-role-access', $data);
    }

    public function changeAccessm()
    {
        $this->session->remove('keyword');
        $menu_im = $this->request->getVar('menuIdm');
        $role_im = $this->request->getVar('roleIdm');
        $data = [
            'role_id' => $role_im,
            'menu_id' => $menu_im
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
        $sessionEmail = $this->session->get('email_sidesa');

        $data = [
            'title' => 'Profile',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Profile', 'li_1' => 'Moderator', 'li_2' => 'Profile']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'kab' => $this->Moderator_model->getMyprofile($sessionEmail),
        ];

        return view('sidesa/user/moderator/apps-profile', $data);
    }

    public function editprofile()
    {
        $this->session->remove('keyword');
        $data = [
            'title' => 'Edit Profile',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Edit Profile', 'li_1' => 'Moderator', 'li_2' => 'Edit Profile']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama', 'Nama lengkap', 'trim|required', ['required' => 'Form tidak boleh dikosongkan']);
            $this->validation->setRule('image', 'Upload Persetujuan', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,2048]', ['mime_in' => 'File yang anda pilih bukan JPG', 'max_size' => 'File anda melebihi 2mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/moderator/editprofile')->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $user_id = $this->session->get('id_sidesa');
                $this->Moderator_model->editProfile($user_id, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Profile</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/moderator/profile');
            }
        }
        return view('sidesa/user/moderator/apps-editprofile', $data);
    }

    public function hapusUser($user_id, $nip)
    {
        $this->session->remove('keyword');

        $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();
        $this->Moderator_model->Notifikasihapus($nip, $user);

        $hapus = $this->db->table('sidesa_user');
        $hapus->delete(['user_id' => $user_id]);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>User berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect()->to('user/moderator/role_management');
    }
}
