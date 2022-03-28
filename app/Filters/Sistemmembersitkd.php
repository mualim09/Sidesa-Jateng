<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\URI;

class Sistemmembersitkd implements FilterInterface
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    // ini tu tugasnya = Membatasi dokumen yang bisa diakses berdasarkan sesion permendagri_id nya harus sesuai dengan file_id yg sedang dibuka(untuk yang before) 
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('email')) {
            redirect('sitkd/auth');
        } else {
            $builder = $this->db->table('sitkd_dokumen_laporan');
            $permendagri_id = session()->get('permendagri_id'); // aku butuh permendagri_id nya bukan file_id nya tapi berdasarkan file_id yang di click
            $file_id = $request->uri->getSegment(4);

            $builder->where(['permendagri_id' => $permendagri_id, 'file_id' => $file_id]);
            $builder->where(['file_id' => $file_id]);
            $userAccess = $builder->countAllResults();
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
