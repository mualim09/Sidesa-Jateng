<?php

namespace App\Controllers\Sitkd;

use App\Models\Sitkd\Admin_model;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected $Admin_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Admin_model = new Admin_model();
        helper('zakezone');
        session()->remove('keywordacc');
        session()->remove('keywordmenu');
        session()->remove('keywordsukses');
    }

    public function index()
    {
        $this->session->remove('keyword');
        $builder = $this->db->table('sitkd_user');

        $data = [
            'title' => 'Dashboard | SITKD JATENG',
            'myprofile' => 'Dashboard',
            'user' => $builder->getWhere(['email' => $this->session->get('email')])->getRowArray(),
            'getmember' => $this->Admin_model->getMember(),
            'getdokumen' => $this->Admin_model->getDokumen(),
            'getdokumensukses' => $this->Admin_model->getDokumenSukses(),
            'gettahundokumensukses' => $this->Admin_model->getTahunDokumenSukses(),
            'kategori1' => $this->Admin_model->kategori1(),
            'kategori2' => $this->Admin_model->kategori2(),
            'kategori3' => $this->Admin_model->kategori3(),
            'jenis1' => $this->Admin_model->jenis1(),
            'jenis2' => $this->Admin_model->jenis2(),
            'jenis3' => $this->Admin_model->jenis3(),
            'jenis4' => $this->Admin_model->jenis4(),
            'jenis5' => $this->Admin_model->jenis5(),
            'jenis6' => $this->Admin_model->jenis6(),
            'jenis7' => $this->Admin_model->jenis7(),
            'jenis8' => $this->Admin_model->jenis8(),
            'jenis9' => $this->Admin_model->jenis9(),
            'jenis10' => $this->Admin_model->jenis10(),
            'jenis11' => $this->Admin_model->jenis11(),
            'jenis12' => $this->Admin_model->jenis12(),
            'jenis13' => $this->Admin_model->jenis13(),
            'jenis14' => $this->Admin_model->jenis14(),
            'jenis15' => $this->Admin_model->jenis15(),
            'jenis16' => $this->Admin_model->jenis16(),
            'jenis17' => $this->Admin_model->jenis17(),
            'jenis18' => $this->Admin_model->jenis18()
        ];

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/admin/index', $data);
        echo view('sitkd/templates/footer');
    }

    public function role()
    {
        $builder = $this->db->table('sitkd_user');
        $start = $this->request->getVar('page_sitkd_user') ? $this->request->getVar('page_sitkd_user') : 1;

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
            'title' => 'Role | SITKD JATENG',
            'myprofile' => 'Role Management',
            'user' => $builder->getWhere(['email' => $this->session->get('email')])->getRowArray(),
            'start' => $start,
            'getrole' => $get_role->paginate(5, 'sitkd_user'),
            'pager' => $get_role->pager,
        ];

        if ($cari) {
            $data['total_rows'] = $this->Admin_model->getRole($cari)->countAllResults();
        } else {
            $data['total_rows'] = $this->Admin_model->defaultgetRole()->countAllResults();
        }

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/admin/role', $data);
        echo view('sitkd/templates/footer');
    }

    public function hapussessionkeyword()
    {
        $this->session->remove('keyword');
        return redirect()->to('sitkd/admin/role');
    }

    public function roleAccess($role_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Role | SITKD JATENG';
        $data['myprofile'] = 'Role Management';
        $builder = $this->db->table('sitkd_user');
        $data['user'] = $builder->getWhere(['email' => $this->session->get('email')])->getRowArray();

        $tabrole = $this->db->table('sitkd_role');
        $data['role'] = $tabrole->getWhere(['id' => $role_id])->getRowArray();

        $tabmenu = $this->db->table('sitkd_user_menu');
        $tabmenu->where('id !=', 1);
        $tabmenu->where('id !=', 2);
        $tabmenu->where('id !=', 3);
        $tabmenu->where('id !=', 4);
        $data['menu'] = $tabmenu->get()->getResultArray();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/admin/role-access', $data);
        echo view('sitkd/templates/footer');
    }

    public function changeAccess()
    {
        $this->session->remove('keyword');
        $menu_id = $this->request->getVar('menuId');
        $role_id = $this->request->getVar('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->table('sitkd_user_access_menu');
        $result->like($data);
        if ($result->countAllResults() < 1) {
            $result->insert($data);
        } else {
            $result->delete($data);
        }
        $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Akses menu berhasil diubah!</div>');
    }

    public function roleEdit($user_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Role edit | SITKD JATENG';
        $data['myprofile'] = 'Role Management';
        $builder = $this->db->table('sitkd_user');
        $data['user'] = $builder->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['edit'] = $builder->getWhere(['user_id' => $user_id])->getRowArray();

        $editrole = $this->db->table('sitkd_role');
        $editrole->where('id !=', 1);
        $editrole->where('id !=', 4);
        $data['tabrole'] = $editrole->get()->getResultArray();
        $data['permendagri'] = $this->db->table('sitkd_dispermades')->where('permendagri_id !=', 1)->get()->getResultArray();
        $data['tabactive'] =  $this->db->table('sitkd_active')->get()->getResultArray();

        $this->validation->setRule('id', 'Id', 'trim|required', ['required' => 'Id tidak boleh dikosongkan']);

        if ($this->validation->withRequest($this->request)->run()) {
            $userupdate = $this->db->table('sitkd_user');
            $userupdatedata = [
                "permendagri_id" => $this->request->getVar('idpermendagri'),
                "role_id" => $this->request->getVar('role'),
                "is_active" => $this->request->getVar('is_active')
            ];
            $flash = '<div class="alert alert-success" role="alert">Role <b>' . $data['edit']['nama'] . '</b> Berhasil diubah</div>';
            $userupdate->where('user_id', $this->request->getVar('id'));
            $userupdate->update($userupdatedata);
            $this->session->setFlashdata('message', $flash);
            return redirect()->to('sitkd/admin/role');
        } else {
            echo view('sitkd/templates/header', $data);
            echo view('sitkd/templates/sidebar', $data);
            echo view('sitkd/templates/topbar', $data);
            echo view('sitkd/admin/role-edit', $data);
            echo view('sitkd/templates/footer');
        }
    }

    public function hapusUser($user_id)
    {
        $this->session->remove('keyword');
        $hapus = $this->db->table('sitkd_user');
        $hapus->delete(['user_id' => $user_id]);
        $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">User berhasil dihapus!</div>');
        return redirect()->to('sitkd/admin/role');
    }
}
