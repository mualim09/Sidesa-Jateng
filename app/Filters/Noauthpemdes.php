<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Noauthpemdes implements FilterInterface
{
    // ini tu tugasnya = jika pada saat ada yg akses loginpage tapi punya session maka jalankan dibawah ini (untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('kd_wilayah') !== null) {
            $kodedes = session()->get('kd_wilayah');
            return redirect()->to(site_url('pemdes/masyarakat/dashboard/' . $kodedes));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
