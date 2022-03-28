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
        if (session()->get('kd_wilayah') && session()->get('nik_ktp') !== null) {
            $kodedes = session()->get('kd_wilayah');
            $nik_ktp = session()->get('nik_ktp');
            return redirect()->to(site_url('pemdes/member/dashboard/' . $kodedes . '/' . $nik_ktp));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
