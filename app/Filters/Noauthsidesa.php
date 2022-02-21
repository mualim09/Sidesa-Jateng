<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Noauthsidesa implements FilterInterface
{
    // ini tu tugasnya = jika pada saat ada yg akses loginpage tapi punya session maka jalankan dibawah ini (untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('role_id_sidesa') == 1)
            return redirect()->to(site_url('/user/admin/dashboard'));
        if (session()->get('role_id_sidesa') == 2)
            return redirect()->to(site_url('/user/administrator/dashboard'));
        if (session()->get('role_id_sidesa') == 3)
            return redirect()->to(site_url('/user/moderator/dashboard'));
        if (session()->get('role_id_sidesa') == 4)
            return redirect()->to(site_url('/user/member/dashboard'));
        if (session()->get('role_id_sidesa') == 5)
            return redirect()->to(site_url('/user/belumassign'));
        if (session()->get('role_id_sidesa') == 6)
            return redirect()->to(site_url('/user/kabupaten5a/dashboard'));
        if (session()->get('role_id_sidesa') == 7)
            return redirect()->to(site_url('/user/provinsi5a/dashboard'));
        if (session()->get('role_id_sidesa') == 8)
            return redirect()->to(site_url('/user/kabupaten5b/dashboard'));
        if (session()->get('role_id_sidesa') == 9)
            return redirect()->to(site_url('/user/provinsi5b/dashboard'));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
