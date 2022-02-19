<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Authusersitkd implements FilterInterface
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    // ini tu tugasnya = jika pada saat ada yg akses kehalaman admin tapi sessionnya ga sesuai dengan kondisi maka jalankan dibawah ini (untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('role_id')) {
            return redirect()->to(site_url('/sitkd/auth'));
        } else {
            $buildermenu = $this->db->table('sitkd_user_menu');
            $builderaccessmenu = $this->db->table('sitkd_user_access_menu');
            $role_id = session()->get('role_id');
            $menu = $request->uri->getSegment(2);
            // d($menu);

            $queryMenu = $buildermenu->getWhere(['menu' => $menu])->getRowArray();
            $menu_id = $queryMenu['id'];

            $builderaccessmenu->like(['role_id' => $role_id, 'menu_id' => $menu_id]);
            $userAccess = $builderaccessmenu->countAllResults();
            // dd($userAccess);
            if ($userAccess < 1) {
                return redirect()->to(site_url('sitkd/auth/blocked'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
