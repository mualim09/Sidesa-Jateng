<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Sidesa\USer_notifikasi_model;

class Notifikasi extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Notifikasi_model = new USer_notifikasi_model();
        session()->remove('keyword');
        session()->remove('keywordregapi');
    }

    function import($id)
    {
        $this->Notifikasi_model->import($id);
        return redirect()->to('User/datasidesa/review');
    }

    function inputdata($id, $kode)
    {
        $this->Notifikasi_model->inputdata($id);
        if (strlen($kode) == 5) {
            return redirect()->to('pemkab/kabupaten/' . $kode);
        } else if (strlen($kode) == 13) {
            return redirect()->to('pemkab/desa/' . $kode);
        }
    }

    function rolemanagement($id, $roleid)
    {
        $this->Notifikasi_model->rolemanagement($id);
        if ($roleid == 1) {
            return redirect()->to('user/admin/role_management');
        } else if ($roleid == 2) {
            return redirect()->to('user/administrator/role_management');
        } else if ($roleid == 3) {
            return redirect()->to('user/moderator/role_management');
        }
    }

    function allnotif()
    {
        $request = \Config\Services::request();
        $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();
        $builder = $this->db->table('sidesa_notifikasi');
        $data = [
            'title' => 'Notifikasi',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Semua Notifikasi', 'li_1' => 'Notifikasi', 'li_2' => 'All']),
            'totaldata' => $builder->countAllResults(),
            'start' => $request->uri->getSegment(4),
            'notif' => $this->Notifikasi_model->getData($user)
        ];
        return view('sidesa/user/notifikasi/showall', $data);
    }
}
