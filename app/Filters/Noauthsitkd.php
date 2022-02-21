<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Noauthsitkd implements FilterInterface
{
    // ini tu tugasnya = jika pada saat ada yg akses loginpage tapi punya session maka jalankan dibawah ini (untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('role_id') == 1)
            return redirect()->to(site_url('/sitkd/admin'));
        if (session()->get('role_id') == 2)
            return redirect()->to(site_url('/sitkd/moderator'));
        if (session()->get('role_id') == 3)
            return redirect()->to(site_url('/sitkd/member'));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
