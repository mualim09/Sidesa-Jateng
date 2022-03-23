<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\URI;

class Sistemlayananpemdes implements FilterInterface
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    // ini tu tugasnya = Membatasi dokumen yang bisa diakses berdasarkan sesion permendagri_id nya harus sesuai dengan file_id yg sedang dibuka(untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        $kode = $request->uri->getSegment(4);
        if (!session()->get('kd_wilayah')) {
            return redirect()->to('pemdes/auth/login/' . $kode);
        } else {
            $builder = $this->db->table('pemdes_user');
            $kd_wilayah = session()->get('kd_wilayah'); // butuh kd_wilayah nya tapi berdasarkan nik_ktp user yang login
            $nik_ktp = $request->uri->getSegment(5);

            $builder->where(['kd_wilayah' => $kd_wilayah, 'kd_wilayah' => $nik_ktp]);
            $builder->where(['nik_ktp' => $nik_ktp]);
            $userAccess = $builder->countAllResults();
            // dd($userAccess);

            if ($userAccess < 1) {
                return redirect()->to(site_url('pemdes/auth/blocked/' . $kode));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
