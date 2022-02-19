<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Menu5b extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function penilaian()
    {
        // $sessionEmail = $this->session->get('email_sidesa');

        $data = [
            'title' => 'Penilaian BUMDES',
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'BUMDES Penilaian ' . date("Y"), 'li_1' => 'Menu5b', 'li_2' => 'Penilaian BUMDES']),
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            // 'kab' => $this->Belumassign_model->getMyprofile($sessionEmail),
        ];

        return view('sidesa/user/menu5b/penilaian', $data);
    }
}
