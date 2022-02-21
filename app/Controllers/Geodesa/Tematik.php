<?php

namespace App\Controllers\Geodesa;

use App\Controllers\BaseController;

class Tematik extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Dashboard | GEODESA JATENG';

        echo view('geodesa/templatesdashboard/geodesa_header', $data);
        echo view('geodesa/templatesdashboard/geodesa_sidebar');
        echo view('geodesa/templatesdashboard/geodesa_topbar');
        echo view('geodesa/dashboard');
        echo view('geodesa/templatesdashboard/geodesa_footer');
    }

    public function bumdes()
    {
        $data['title'] = 'BUMDES | GEODESA JATENG';

        echo view('geodesa/templatesbumdes/geodesa_header', $data);
        echo view('geodesa/templatesbumdes/geodesa_sidebar');
        echo view('geodesa/templatesbumdes/geodesa_topbar');
        echo view('geodesa/bumdes');
        echo view('geodesa/templatesbumdes/geodesa_footer');
    }

    public function disabilitas()
    {
        $data['title'] = 'DISABILITAS | GEODESA JATENG';

        echo view('geodesa/templatesdisabilitas/geodesa_header', $data);
        echo view('geodesa/templatesdisabilitas/geodesa_sidebar');
        echo view('geodesa/templatesdisabilitas/geodesa_topbar');
        echo view('geodesa/disabilitas');
        echo view('geodesa/templatesdisabilitas/geodesa_footer');
    }
}
