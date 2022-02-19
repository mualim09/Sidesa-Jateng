<?php

namespace App\Controllers\User;

use App\Models\Sidesa\Import_upload_model;
use App\Controllers\BaseController;

class Import extends BaseController
{
    protected $validation;
    protected $Import_upload_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->validation = \Config\Services::validation();
        $this->Import_upload_model = new Import_upload_model();
        session()->remove('keyword');
        session()->remove('keywordapi');
    }

    function penduduk_agamanas()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_dataagamaI(),
            'getalldataII' => $this->Import_upload_model->getAll_dataagamaII(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahunagamaI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahunagamaII(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data Kependudukan Agama Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kependudukan', 'li_3' => 'Penduduk Agama']),
            'validation' => $this->validation,
        ];
        // dd($data['tahun']);
        return view('sidesa/user/import/kependudukan_agama', $data);
    }

    function importpendudukagamanas()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'periode_uid_semester' => $row[1],
                        'kd_wilayah' => $row[2],
                        'jiwa_agama_islam_pria' => $row[3],
                        'jiwa_agama_islam_perempuan' => $row[4],
                        'jiwa_agama_kristen_pria' => $row[5],
                        'jiwa_agama_kristen_perempuan' => $row[6],
                        'jiwa_agama_katholik_pria' => $row[7],
                        'jiwa_agama_katholik_perempuan' => $row[8],
                        'jiwa_agama_hindu_pria' => $row[9],
                        'jiwa_agama_hindu_perempuan' => $row[10],
                        'jiwa_agama_budha_pria' => $row[11],
                        'jiwa_agama_budha_perempuan' => $row[12],
                        'jiwa_agama_konghucu_pria' => $row[13],
                        'jiwa_agama_konghucu_perempuan' => $row[14],
                        'jiwa_agama_alirankepercayaan_pria' => $row[15],
                        'jiwa_agama_alirankepercayaan_perempuan' => $row[16],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dataagama($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back()->withInput();
            }
        }
    }

    function penduduk_goldarah()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_datagol_darahI(),
            'getalldataII' => $this->Import_upload_model->getAll_datagol_darahII(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahungol_darahI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahungol_darahII(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data Kependudukan Golongan Darah Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kependudukan', 'li_3' => 'Penduduk Golongan Darah']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/kependudukan_gol_darah', $data);
    }

    function importpendudukdarah()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'periode_uid_semester' => $row[1],
                        'kd_wilayah' => $row[2],
                        'jiwa_goldar_a_pria' => $row[3],
                        'jiwa_goldar_a_perempuan' => $row[4],
                        'jiwa_goldar_b_pria' => $row[5],
                        'jiwa_goldar_b_perempuan' => $row[6],
                        'jiwa_goldar_ab_pria' => $row[7],
                        'jiwa_goldar_ab_perempuan' => $row[8],
                        'jiwa_goldar_o_pria' => $row[9],
                        'jiwa_goldar_o_perempuan' => $row[10],
                        'jiwa_goldar_a_plus_pria' => $row[11],
                        'jiwa_goldar_a_plus_perempuan' => $row[12],
                        'jiwa_goldar_a_minus_pria' => $row[13],
                        'jiwa_goldar_a_minus_perempuan' => $row[14],
                        'jiwa_goldar_b_plus_pria' => $row[15],
                        'jiwa_goldar_b_plus_perempuan' => $row[16],
                        'jiwa_goldar_b_minus_pria' => $row[17],
                        'jiwa_goldar_b_minus_perempuan' => $row[18],
                        'jiwa_goldar_ab_plus_pria' => $row[19],
                        'jiwa_goldar_ab_plus_perempuan' => $row[20],
                        'jiwa_goldar_ab_minus_pria' => $row[21],
                        'jiwa_goldar_ab_minus_perempuan' => $row[22],
                        'jiwa_goldar_o_plus_pria' => $row[23],
                        'jiwa_goldar_o_plus_perempuan' => $row[24],
                        'jiwa_goldar_o_minus_pria' => $row[25],
                        'jiwa_goldar_o_minus_perempuan' => $row[26],
                        'jiwa_goldar_tidaktau_pria' => $row[27],
                        'jiwa_goldar_tidaktau_perempuan' => $row[28],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_datagol_darah($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function penduduk_jnskelamin()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_datakelaminI(),
            'getalldataII' => $this->Import_upload_model->getAll_datakelaminII(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahunkelaminI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahunkelaminII(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data Kependudukan Jenis Kelamin Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kependudukan', 'li_3' => 'Penduduk Jenis Kelamin']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/kependudukan_jns_kelamin', $data);
    }

    function importpendudukkelamin()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'periode_uid_semester' => $row[1],
                        'kd_wilayah' => $row[2],
                        'jiwa_pria' => $row[3],
                        'jiwa_perempuan' => $row[4],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_datakelamin($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function penduduk_klpusia()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_datausiaI(),
            'getalldataII' => $this->Import_upload_model->getAll_datausiaII(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahunusiaI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahunusiaII(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data Kependudukan Kelompok Usia Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kependudukan', 'li_3' => 'Penduduk Kelompok Usia']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/kependudukan_kelompok_usia', $data);
    }

    function importpendudukusia()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'periode_uid_semester' => $row[1],
                        'kd_wilayah' => $row[2],
                        'jw_l_4' => $row[3],
                        'jw_p_4' => $row[4],
                        'jw_l_9' => $row[5],
                        'jw_p_9' => $row[6],
                        'jw_l_14' => $row[7],
                        'jw_p_14' => $row[8],
                        'jw_l_19' => $row[9],
                        'jw_p_19' => $row[10],
                        'jw_l_24' => $row[11],
                        'jw_p_24' => $row[12],
                        'jw_l_29' => $row[13],
                        'jw_p_29' => $row[14],
                        'jw_l_34' => $row[15],
                        'jw_p_34' => $row[16],
                        'jw_l_39' => $row[17],
                        'jw_p_39' => $row[18],
                        'jw_l_44' => $row[19],
                        'jw_p_44' => $row[20],
                        'jw_l_49' => $row[21],
                        'jw_p_49' => $row[22],
                        'jw_l_54' => $row[23],
                        'jw_p_54' => $row[24],
                        'jw_l_59' => $row[25],
                        'jw_p_59' => $row[26],
                        'jw_l_64' => $row[27],
                        'jw_p_64' => $row[28],
                        'jw_l_69' => $row[29],
                        'jw_p_69' => $row[30],
                        'jw_l_74' => $row[31],
                        'jw_p_74' => $row[32],
                        'jw_l_75' => $row[33],
                        'jw_p_75' => $row[34],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_datausia($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function penduduk_kk()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_datakkI(),
            'getalldataII' => $this->Import_upload_model->getAll_datakkII(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahunkkI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahunkkII(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data Kependudukan Kepemilikan KK Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kependudukan', 'li_3' => 'Penduduk Kepemilikan KK']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/kependudukan_kepemilikan_kk', $data);
    }

    function importpendudukkk()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'periode_uid_semester' => $row[1],
                        'kd_wilayah' => $row[2],
                        'kk_pria' => $row[3],
                        'kk_perempuan' => $row[4],
                        'kk_kepemilikankk_pria' => $row[5],
                        'kk_kepemilikankk_perempuan' => $row[6],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_datakk($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function penduduk_kerja()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_datapekerjaanI(),
            'getalldataII' => $this->Import_upload_model->getAll_datapekerjaanII(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahunpekerjaanI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahunpekerjaanII(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data Kependudukan Pekerjaan Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kependudukan', 'li_3' => 'Penduduk Pekerjaan']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/kependudukan_pekerjaan', $data);
    }

    function importpendudukkerja()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'periode_uid_semester' => $row[1],
                        'kd_wilayah' => $row[2],
                        'jiwa_kerja_pendudukan_belum_tidakbekerja_pria' => $row[3],
                        'jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan' => $row[4],
                        'jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria' => $row[5],
                        'jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan' => $row[6],
                        'jiwa_kerja_pendudukan_pelajar_mahasiswa_pria' => $row[7],
                        'jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan' => $row[8],
                        'jiwa_kerja_pendudukan_pensiunan_pria' => $row[9],
                        'jiwa_kerja_pendudukan_pensiunan_perempuan' => $row[10],
                        'jiwa_kerja_pendudukan_pns_pria' => $row[11],
                        'jiwa_kerja_pendudukan_pns_perempuan' => $row[12],
                        'jiwa_kerja_pendudukan_tni_pria' => $row[13],
                        'jiwa_kerja_pendudukan_tni_perempuan' => $row[14],
                        'jiwa_kerja_pendudukan_polri_pria' => $row[15],
                        'jiwa_kerja_pendudukan_polri_perempuan' => $row[16],
                        'jiwa_kerja_pendudukan_perdagangan_pria' => $row[17],
                        'jiwa_kerja_pendudukan_perdagangan_perempuan' => $row[18],
                        'jiwa_kerja_pendudukan_petanipekebun_pria' => $row[19],
                        'jiwa_kerja_pendudukan_petanipekebun_perempuan' => $row[20],
                        'jiwa_kerja_pendudukan_peternak_pria' => $row[21],
                        'jiwa_kerja_pendudukan_peternak_perempuan' => $row[22],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_datapekerjaan($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function penduduk_didik()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_datapendidikanI(),
            'getalldataII' => $this->Import_upload_model->getAll_datapendidikanII(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahunpendidikanI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahunpendidikanII(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data Kependudukan Pendidikan Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kependudukan', 'li_3' => 'Penduduk Pendidikan']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/kependudukan_pendidikan', $data);
    }

    function importpendudukdidik()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'periode_uid_semester' => $row[1],
                        'kd_wilayah' => $row[2],
                        'kk_pendidikan_belum_tidaksekolah_pria' => $row[3],
                        'kk_pendidikan_belum_tidaksekolah_perempuan' => $row[4],
                        'kk_pendidikan_belumtamatsd_sederajat_pria' => $row[5],
                        'kk_pendidikan_belumtamatsd_sederajat_perempuan' => $row[6],
                        'kk_pendidikan_tamatsd_sederajat_pria' => $row[7],
                        'kk_pendidikan_tamatsd_sederajat_perempuan' => $row[8],
                        'kk_pendidikan_sltp_sederajat_pria' => $row[9],
                        'kk_pendidikan_sltp_sederajat_perempuan' => $row[10],
                        'kk_pendidikan_slta_sederajat_pria' => $row[11],
                        'kk_pendidikan_slta_sederajat_perempuan' => $row[12],
                        'kk_pendidikan_diploma_1_2_pria' => $row[13],
                        'kk_pendidikan_diploma_1_2_perempuan' => $row[14],
                        'kk_pendidikan_akademi_diploma_3_smuda_pria' => $row[15],
                        'kk_pendidikan_akademi_diploma_3_smuda_perempuan' => $row[16],
                        'kk_pendidikan_diploma_4_strata_1_pria' => $row[17],
                        'kk_pendidikan_diploma_4_strata_1_perempuan' => $row[18],
                        'kk_pendidikan_strata2_pria' => $row[19],
                        'kk_pendidikan_strata2_perempuan' => $row[20],
                        'kk_pendidikan_strata3_pria' => $row[21],
                        'kk_pendidikan_strata3_perempuan' => $row[22],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_datapendidikan($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function dtks_berak()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_dtksbabI(),
            'getalldataII' => $this->Import_upload_model->getAll_dtksbabII(),
            'getalldataIII' => $this->Import_upload_model->getAll_dtksbabIII(),
            'getalldataIV' => $this->Import_upload_model->getAll_dtksbabIV(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahundtksbabI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahundtksbabII(),
            'tahunIII' => $this->Import_upload_model->getAll_dataTahundtksbabIII(),
            'tahunIV' => $this->Import_upload_model->getAll_dataTahundtksbabIV(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data DTKS BAB Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kesejahteraan Sosial', 'li_3' => 'DTKS BAB']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/dtks_bab', $data);
    }

    function importdtksberak()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'milik_sendiri' => $row[2],
                        'bersama' => $row[3],
                        'umum' => $row[4],
                        'tidak_ada' => $row[5],
                        'tanpa_keterangan' => $row[6],
                        'grand_total' => $row[7],
                        'nmkab' => $row[8],
                        'nmkec' => $row[9],
                        'nmdes' => $row[10],
                        'penetapan' => $row[11],
                        'dtks_version' => $row[12],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dtksbab($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function dtks_desilarts()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_dtksDesilartI(),
            'getalldataII' => $this->Import_upload_model->getAll_dtksDesilartII(),
            'getalldataIII' => $this->Import_upload_model->getAll_dtksDesilartIII(),
            'getalldataIV' => $this->Import_upload_model->getAll_dtksDesilartIV(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahundtksDesilartI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahundtksDesilartII(),
            'tahunIII' => $this->Import_upload_model->getAll_dataTahundtksDesilartIII(),
            'tahunIV' => $this->Import_upload_model->getAll_dataTahundtksDesilartIV(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data DTKS DESIL-ART Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kesejahteraan Sosial', 'li_3' => 'DTKS DESIL-ART']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/dtks_desilart', $data);
    }

    function importdtksdesilarts()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'desil1' => $row[2],
                        'desil2' => $row[3],
                        'desil3' => $row[4],
                        'desil4' => $row[5],
                        'desil4plus' => $row[6],
                        'tanpa_keterangan' => $row[7],
                        'grand_total' => $row[8],
                        'nmkab' => $row[9],
                        'nmkec' => $row[10],
                        'nmdes' => $row[11],
                        'penetapan' => $row[12],
                        'dtks_version' => $row[13],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dtksDesilart($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function dtks_desilkrts()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_dtksDesilkrtI(),
            'getalldataII' => $this->Import_upload_model->getAll_dtksDesilkrtII(),
            'getalldataIII' => $this->Import_upload_model->getAll_dtksDesilkrtIII(),
            'getalldataIV' => $this->Import_upload_model->getAll_dtksDesilkrtIV(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahundtksDesilkrtI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahundtksDesilkrtII(),
            'tahunIII' => $this->Import_upload_model->getAll_dataTahundtksDesilkrtIII(),
            'tahunIV' => $this->Import_upload_model->getAll_dataTahundtksDesilkrtIV(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data DTKS DESIL-KRT Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kesejahteraan Sosial', 'li_3' => 'DTKS DESIL-KRT']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/dtks_desilkrt', $data);
    }

    function importdtksdesilkrts()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'desil1' => $row[2],
                        'desil2' => $row[3],
                        'desil3' => $row[4],
                        'desil4' => $row[5],
                        'desil4plus' => $row[6],
                        'tanpa_keterangan' => $row[7],
                        'grand_total' => $row[8],
                        'nmkab' => $row[9],
                        'nmkec' => $row[10],
                        'nmdes' => $row[11],
                        'penetapan' => $row[12],
                        'dtks_version' => $row[13],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dtksDesilkrt($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function dtks_masaks()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_dtksmasakI(),
            'getalldataII' => $this->Import_upload_model->getAll_dtksmasakII(),
            'getalldataIII' => $this->Import_upload_model->getAll_dtksmasakIII(),
            'getalldataIV' => $this->Import_upload_model->getAll_dtksmasakIV(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahundtksmasakI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahundtksmasakII(),
            'tahunIII' => $this->Import_upload_model->getAll_dataTahundtksmasakIII(),
            'tahunIV' => $this->Import_upload_model->getAll_dataTahundtksmasakIV(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data DTKS BAHAN BAKAR MEMASAK Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kesejahteraan Sosial', 'li_3' => 'DTKS MASAK']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/dtks_masak', $data);
    }

    function importdtksmasaks()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'listrik_gas' => $row[2],
                        'minyak_tanah' => $row[3],
                        'briket_arang_kayu' => $row[4],
                        'tidak_memasak' => $row[5],
                        'tanpa_keterangan' => $row[6],
                        'grand_total' => $row[7],
                        'nmkab' => $row[8],
                        'nmkec' => $row[9],
                        'nmdes' => $row[10],
                        'penetapan' => $row[11],
                        'dtks_version' => $row[12],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dtksmasak($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function dtks_minums()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_dtksminumI(),
            'getalldataII' => $this->Import_upload_model->getAll_dtksminumII(),
            'getalldataIII' => $this->Import_upload_model->getAll_dtksminumIII(),
            'getalldataIV' => $this->Import_upload_model->getAll_dtksminumIV(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahundtksminumI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahundtksminumII(),
            'tahunIII' => $this->Import_upload_model->getAll_dataTahundtksminumIII(),
            'tahunIV' => $this->Import_upload_model->getAll_dataTahundtksminumIV(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data DTKS SUMBER AIR Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kesejahteraan Sosial', 'li_3' => 'DTKS AIR']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/dtks_minum', $data);
    }

    function importdtksminums()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'air_kemasan' => $row[2],
                        'air_ledeng' => $row[3],
                        'sumber_terlindung' => $row[4],
                        'sumber_takterlindung' => $row[5],
                        'lainnya' => $row[6],
                        'tanpa_keterangan' => $row[7],
                        'grand_total' => $row[8],
                        'nmkab' => $row[9],
                        'nmkec' => $row[10],
                        'nmdes' => $row[11],
                        'penetapan' => $row[12],
                        'dtks_version' => $row[13],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dtksminum($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function dtks_penerangans()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_dtkspeneranganI(),
            'getalldataII' => $this->Import_upload_model->getAll_dtkspeneranganII(),
            'getalldataIII' => $this->Import_upload_model->getAll_dtkspeneranganIII(),
            'getalldataIV' => $this->Import_upload_model->getAll_dtkspeneranganIV(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahundtkspeneranganI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahundtkspeneranganII(),
            'tahunIII' => $this->Import_upload_model->getAll_dataTahundtkspeneranganIII(),
            'tahunIV' => $this->Import_upload_model->getAll_dataTahundtkspeneranganIV(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data DTKS SUMBER PENERANGAN Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kesejahteraan Sosial', 'li_3' => 'DTKS PENERANGAN']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/dtks_penerangan', $data);
    }

    function importdtkspenerangans()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'pln' => $row[2],
                        'nonpln' => $row[3],
                        'bukan_listrik' => $row[4],
                        'tanpa_keterangan' => $row[5],
                        'grand_total' => $row[6],
                        'nmkab' => $row[7],
                        'nmkec' => $row[8],
                        'nmdes' => $row[9],
                        'penetapan' => $row[10],
                        'dtks_version' => $row[11],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dtkspenerangan($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function dtks_tinggals()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_dtkstinggalI(),
            'getalldataII' => $this->Import_upload_model->getAll_dtkstinggalII(),
            'getalldataIII' => $this->Import_upload_model->getAll_dtkstinggalIII(),
            'getalldataIV' => $this->Import_upload_model->getAll_dtkstinggalIV(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahundtkstinggalI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahundtkstinggalII(),
            'tahunIII' => $this->Import_upload_model->getAll_dataTahundtkstinggalIII(),
            'tahunIV' => $this->Import_upload_model->getAll_dataTahundtkstinggalIV(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data DTKS TEMPAT TINGGAL Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kesejahteraan Sosial', 'li_3' => 'DTKS TINGGAL']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/dtks_tinggal', $data);
    }

    function importdtkstinggals()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'milik_sendiri' => $row[2],
                        'kontrak' => $row[3],
                        'beban_sewa' => $row[4],
                        'dinas' => $row[5],
                        'lainnya' => $row[6],
                        'tanpa_keterangan' => $row[7],
                        'grand_total' => $row[8],
                        'nmkab' => $row[9],
                        'nmkec' => $row[10],
                        'nmdes' => $row[11],
                        'penetapan' => $row[12],
                        'dtks_version' => $row[13],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dtkstinggal($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function dtks_disabilitass()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldataI' => $this->Import_upload_model->getAll_dtksdisabilitasI(),
            'getalldataII' => $this->Import_upload_model->getAll_dtksdisabilitasII(),
            'getalldataIII' => $this->Import_upload_model->getAll_dtksdisabilitasIII(),
            'getalldataIV' => $this->Import_upload_model->getAll_dtksdisabilitasIV(),
            'tahunI' => $this->Import_upload_model->getAll_dataTahundtksdisabilitasI(),
            'tahunII' => $this->Import_upload_model->getAll_dataTahundtksdisabilitasII(),
            'tahunIII' => $this->Import_upload_model->getAll_dataTahundtksdisabilitasIII(),
            'tahunIV' => $this->Import_upload_model->getAll_dataTahundtksdisabilitasIV(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data DTKS DISABILITAS Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Disabilitas']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/dtks_disabilitas', $data);
    }

    function importdtksdisabilitass()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'normal' => $row[2],
                        'daksa' => $row[3],
                        'netra' => $row[4],
                        'rungu' => $row[5],
                        'wicara' => $row[6],
                        'rungu_wicara' => $row[7],
                        'netra_daksa' => $row[8],
                        'netra_rungu_wicara' => $row[9],
                        'rungu_wicara_daksa' => $row[10],
                        'rungu_netra_wicara_daksa' => $row[11],
                        'mental' => $row[12],
                        'jiwa' => $row[13],
                        'daksa_mental' => $row[14],
                        'tanpa_keterangan' => $row[15],
                        'grand_total' => $row[16],
                        'nmkab' => $row[17],
                        'nmkec' => $row[18],
                        'nmdes' => $row[19],
                        'penetapan' => $row[20],
                        'dtks_version' => $row[21],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dtksdisabilitas($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function bumdesa()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldata' => $this->Import_upload_model->getAll_dataBumdes(),
            'tahun' => $this->Import_upload_model->getAll_dataTahunBumdes(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data BUMDES Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'BUMDES']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/bumdes', $data);
    }

    function importbumdesa()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'nm_bumdes' => $row[2],
                        'klasifikasi' => $row[3],
                        'kelembagaan_1' => $row[4],
                        'kelembagaan_2' => $row[5],
                        'kelembagaan_3' => $row[6],
                        'kelembagaan_4' => $row[7],
                        'kelembagaan_5' => $row[8],
                        'kelembagaan_6' => $row[9],
                        'kelembagaan_jml' => $row[10],
                        'kelembagaan_score' => $row[11],
                        'aturan_1' => $row[12],
                        'aturan_jml' => $row[13],
                        'aturan_score' => $row[14],
                        'usaha_1' => $row[15],
                        'usaha_2' => $row[16],
                        'usaha_3' => $row[17],
                        'usaha_jml' => $row[18],
                        'usaha_score' => $row[19],
                        'admin_1' => $row[20],
                        'admin_2' => $row[21],
                        'admin_3' => $row[22],
                        'admin_jml' => $row[23],
                        'admin_score' => $row[24],
                        'modal_1' => $row[25],
                        'modal_2' => $row[26],
                        'modal_3' => $row[27],
                        'modal_jml' => $row[28],
                        'modal_score' => $row[29],
                        'dampak_1' => $row[30],
                        'dampak_2' => $row[31],
                        'dampak_3' => $row[32],
                        'dampak_jml' => $row[33],
                        'dampak_score' => $row[34],
                        'jumlah' => $row[35],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_dataBumdes($dataimport);
                }

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function idms()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldata' => $this->Import_upload_model->getAll_idm(),
            'tahun' => $this->Import_upload_model->getAll_dataTahunidm(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data IDM Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'IDM']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/idm', $data);
    }

    function importidms()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'iks' => $row[2],
                        'ike' => $row[3],
                        'ikl' => $row[4],
                        'nilai_idm' => $row[5],
                        'status' => $row[6],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_idm($dataimport);
                }
                // dd($dataimport['tahun']);

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function kesehatans()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldata' => $this->Import_upload_model->getAll_kshtposyandu(),
            'tahun' => $this->Import_upload_model->getAll_dataTahunkshtposyandu(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data POSYANDU Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Kesehatan']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/kesehatan', $data);
    }

    function importkesehatans()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'nama_posyandu' => $row[2],
                        'jml_kader' => $row[3],
                        'strata_posyandu' => $row[4],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_kshtposyandu($dataimport);
                }
                // dd($dataimport['tahun']);

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'click' => 0,
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function bankeusalurs()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldata' => $this->Import_upload_model->getAll_bankeusalur(),
            'tahun' => $this->Import_upload_model->getAll_dataTahunbankeusalur(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data Bantuan Keuangan Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Bantuan Keuangan']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/bankeusalur', $data);
    }

    function importbankeusalurs()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'kd_wilayah' => $row[0],
                        'tahun' => $row[1],
                        'nm_kab' => $row[2],
                        'lokasi' => $row[3],
                        'jml_bantuan' => $row[4],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_bankeusalur($dataimport);
                }
                // dd($dataimport['tahun']);

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }

    function sosial_budayas()
    {
        $data = [
            'title' => 'Import',
            'user' => $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray(),
            'getalldata' => $this->Import_upload_model->getAll_sosbudsatgas(),
            'tahun' => $this->Import_upload_model->getAll_dataTahunsosbudsatgas(),
            'page_title' => view('sidesa/layout/user/content-page-title', ['title' => 'Import Data Sosial Budaya Provinsi Jawa Tengah', 'li_1' => 'Import', 'li_2' => 'Sosial Budaya']),
            'validation' => $this->validation,
        ];
        return view('sidesa/user/import/sosialbudaya', $data);
    }

    function importsosialbudayas()
    {
        if (isset($_POST['importnow'])) {
            $this->validation->setRule('importexcel', 'Import', 'trim|uploaded[importexcel]|mime_in[importexcel,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'Ekstensi bukan ".xls" atau ".xlsx" ']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput();
            } else {
                $file_excel = $this->request->getFile('importexcel');
                $ext = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $render->load($file_excel);
                $data = $spreadsheet->getActiveSheet()->toArray();
                $total = 0;
                foreach ($data as $x => $row) {
                    $totaldata = $total + $x;
                    if ($x == 0) {
                        continue;
                    }
                    $dataimport = [
                        'tahun' => $row[0],
                        'kd_wilayah' => $row[1],
                        'no_sk' => $row[2],
                        'tanggal_sk' => $row[3],
                        'jml_anggota' => $row[4],
                        'ketua_satgas' => $row[5],
                        'created' => date('Y-m-d H:i')
                    ];
                    $this->Import_upload_model->import_sosbudsatgas($dataimport);
                }
                // dd($dataimport['tahun']);

                $datainput = [
                    'tahun' => date('Y'),
                    'nm_data' => $this->request->getVar('nmdata'),
                    'totalrow' => $totaldata,
                    'tahundata' => $dataimport['tahun'],
                    'image' => $this->request->getVar('image'),
                    'upload_by' => $this->request->getVar('uploadby'),
                    'user_id' => $this->session->get('id_sidesa'),
                    'click' => 0,
                    'created' => date('Y-m-d H:i') //ada perbedaan 6 detik pake komputer zakezone
                ];

                $builder = $this->db->table('sidesa_review_data');
                $builder->insert($datainput);

                $user = $this->db->table('sidesa_user')->getWhere(['email' => $this->session->get('email_sidesa')])->getRowArray();

                if ($user['role_id'] == 1) {
                    $this->Import_upload_model->notifikasiAdmin($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 2) {
                    $this->Import_upload_model->notifikasiAdministrator($datainput['nm_data'], $datainput['tahundata'], $user);
                } elseif ($user['role_id'] == 3) {
                    $this->Import_upload_model->notifikasiModerator($datainput['nm_data'], $datainput['tahundata'], $user);
                }

                $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Import Data Excel Berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $this->session->setFlashdata('message', $flash);
                return redirect()->back();
            }
        }
    }
}
