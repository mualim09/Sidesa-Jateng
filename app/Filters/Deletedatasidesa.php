<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Deletedatasidesa implements FilterInterface
{
    // ini tu tugasnya = Membatasi dokumen yang bisa diakses berdasarkan sesion permendagri_id nya harus sesuai dengan file_id yg sedang dibuka(untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('email_sidesa')) {
            return redirect('sidesa/panel');
        } else {
            $role_id = session()->get('role_id_sidesa');
            $kd_wilayah = $request->uri->getSegment(6);
            if ($role_id != 1 && $kd_wilayah != 1) {
                return redirect()->to(site_url('user/blocked'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
