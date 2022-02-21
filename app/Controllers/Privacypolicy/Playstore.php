<?php

namespace App\Controllers\Privacypolicy;

use App\Controllers\BaseController;

class Playstore extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        return view('policies/android');
    }
}
