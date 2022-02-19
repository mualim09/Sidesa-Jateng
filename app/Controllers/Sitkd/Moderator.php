<?php

namespace App\Controllers\Sitkd;

use App\Models\Sitkd\Moderator_model;
use App\Controllers\BaseController;

class Moderator extends BaseController
{
    protected $Moderator_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Moderator_model = new Moderator_model();
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
            'getmember' => $this->Moderator_model->getMember(),
            'getdokumen' => $this->Moderator_model->getDokumen(),
            'getdokumensukses' => $this->Moderator_model->getDokumenSukses(),
            'kategori1' => $this->Moderator_model->kategori1(),
            'kategori2' => $this->Moderator_model->kategori2(),
            'kategori3' => $this->Moderator_model->kategori3(),
            'jenis1' => $this->Moderator_model->jenis1(),
            'jenis2' => $this->Moderator_model->jenis2(),
            'jenis3' => $this->Moderator_model->jenis3(),
            'jenis4' => $this->Moderator_model->jenis4(),
            'jenis5' => $this->Moderator_model->jenis5(),
            'jenis6' => $this->Moderator_model->jenis6(),
            'jenis7' => $this->Moderator_model->jenis7(),
            'jenis8' => $this->Moderator_model->jenis8(),
            'jenis9' => $this->Moderator_model->jenis9(),
            'jenis10' => $this->Moderator_model->jenis10(),
            'jenis11' => $this->Moderator_model->jenis11(),
            'jenis12' => $this->Moderator_model->jenis12(),
            'jenis13' => $this->Moderator_model->jenis13(),
            'jenis14' => $this->Moderator_model->jenis14(),
            'jenis15' => $this->Moderator_model->jenis15(),
            'jenis16' => $this->Moderator_model->jenis16(),
            'jenis17' => $this->Moderator_model->jenis17(),
            'jenis18' => $this->Moderator_model->jenis18()
        ];

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/moderator/index', $data);
        echo view('sitkd/templates/footer');
    }

    public function role()
    {
        $builder = $this->db->table('sitkd_user');
        $start = $this->request->getVar('page_sitkd_user') ? $this->request->getVar('page_sitkd_user') : 1;
        $data['user'] = $builder->getWhere(['email' => $this->session->get('email')])->getRowArray();

        if (isset($_POST['tombolcari'])) {
            $cari = $this->request->getVar('keyword');
            $this->session->set('keyword', $cari);
        } else {
            $cari = $this->session->get('keyword');
        }

        $datauser = $data['user']['nama'];

        if ($cari) {
            $get_role = $this->Moderator_model->getRole($cari, $datauser);
        } else {
            $get_role = $this->Moderator_model->defaultgetRole($datauser);
        }

        $data = [
            'title' => 'Role | SITKD JATENG',
            'myprofile' => 'Rolemanagement',
            'user' => $builder->getWhere(['email' => $this->session->get('email')])->getRowArray(),
            'start' => $start,
            'getrole' => $get_role->paginate(5, 'sitkd_user'),
            'pager' => $get_role->pager,
        ];

        $datauser = $data['user']['nama'];

        if ($cari) {
            $data['total_rows'] = $this->Moderator_model->getRole($cari, $datauser)->countAllResults();
        } else {
            $data['total_rows'] = $this->Moderator_model->defaultgetRole($datauser)->countAllResults();
        }

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/moderator/role', $data);
        echo view('sitkd/templates/footer');
    }

    public function hapussessionkeyword()
    {
        $this->session->remove('keyword');
        return redirect()->back();
    }

    public function roleAccess($role_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Role | SITKD JATENG';
        $data['myprofile'] = 'Rolemanagement';
        $builder = $this->db->table('sitkd_user');
        $data['user'] = $builder->getWhere(['email' => $this->session->get('email')])->getRowArray();

        $tabrole = $this->db->table('sitkd_role');
        $data['role'] = $tabrole->getWhere(['id' => $role_id])->getRowArray();

        $tabmenu = $this->db->table('sitkd_user_menu');
        $tabmenu->where('id !=', 1);
        $tabmenu->where('id !=', 2);
        $tabmenu->where('id !=', 4);
        $tabmenu->where('id !=', 5);
        $tabmenu->where('id !=', 6);
        $tabmenu->where('id !=', 7);
        $data['menu'] = $tabmenu->get()->getResultArray();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/moderator/role-access', $data);
        echo view('sitkd/templates/footer');
    }

    public function changeAccess()
    {
        $this->session->remove('keyword');
        $menu_idm = $this->request->getVar('menuIdm');
        $role_idm = $this->request->getVar('roleIdm');
        $data = [
            'role_id' => $role_idm,
            'menu_id' => $menu_idm
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
        $data['myprofile'] = 'Rolemanagement';
        $builder = $this->db->table('sitkd_user');
        $data['user'] = $builder->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['edit'] = $builder->getWhere(['user_id' => $user_id])->getRowArray();

        $editrole = $this->db->table('sitkd_role');
        $editrole->where('id !=', 1);
        $editrole->where('id !=', 2);
        $editrole->where('id !=', 4);
        $data['tabrole'] = $editrole->get()->getResultArray();
        $permendagri_id = [1, 2];
        $data['permendagri'] = $this->db->table('sitkd_dispermades')->whereNotIn('permendagri_id', $permendagri_id)->get()->getResultArray();
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
            return redirect()->to('sitkd/moderator/role');
        } else {
            echo view('sitkd/templates/header', $data);
            echo view('sitkd/templates/sidebar', $data);
            echo view('sitkd/templates/topbar', $data);
            echo view('sitkd/moderator/role-edit', $data);
            echo view('sitkd/templates/footer');
        }
    }


    public function hapusUser($user_id)
    {
        $this->session->remove('keyword');
        $hapus = $this->db->table('sitkd_user');
        $hapus->delete(['user_id' => $user_id]);
        $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">User berhasil dihapus!</div>');
        return redirect()->to('sitkd/moderator/role');
    }
}
