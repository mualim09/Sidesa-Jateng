<?php

namespace App\Controllers\Sitkd;

use App\Controllers\BaseController;
use App\Models\Sitkd\Notifikasi_model;

class Notifikasi extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Notifikasi_model = new Notifikasi_model();
    }

    public function dokumenbaru($id) // punya ADMIN MODERATOR
    {
        $this->Notifikasi_model->newFile($id);
        return redirect()->to('sitkd/menu/verifikasidokumen');
    }

    public function uploadfilebaru($file_id, $id) // punya ADMIN MODERATOR
    {
        $dokumen_laporan = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $this->Notifikasi_model->uploadFile($id);
        if ($dokumen_laporan['file_id'] == null) {
            return redirect()->to('sitkd/auth/blocked');
        } else {
            return redirect()->to('sitkd/menu/detailuraian/' . $file_id . '/' . $dokumen_laporan['tanggal']);
        }
    }

    public function revisifilebaru($file_id, $id) // punya ADMIN MODERATOR
    {
        $dokumen_laporan = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $this->Notifikasi_model->revisiFile($id);
        if ($dokumen_laporan['file_id'] == null) {
            return redirect()->to('sitkd/auth/blocked');
        } else {
            return redirect()->to('sitkd/menu/detailuraian/' . $file_id . '/' . $dokumen_laporan['tanggal']);
        }
    }

    public function hasilverifikasi($file_id, $id) //punya member
    {
        $notifikasi = $this->db->table('sitkd_notifikasi')->getWhere(['id' => $id])->getRowArray();
        $dokumen_laporan = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);

        $this->Notifikasi_model->hasilVerif($id);

        if ($dokumen_laporan['file_id'] == null) {
            return redirect()->to('sitkd/auth/blocked');
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 1 baru!" && $data['statusuraian'][0] == "revisi") {
            return redirect()->to('sitkd/member/revisifile1/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 2 baru!" && $data['statusuraian'][1] == "revisi") {
            return redirect()->to('sitkd/member/revisifile2/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 3 baru!" && $data['statusuraian'][2] == "revisi") {
            return redirect()->to('sitkd/member/revisifile3/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 4 baru!" && $data['statusuraian'][3] == "revisi") {
            return redirect()->to('sitkd/member/revisifile4/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 5 baru!" && $data['statusuraian'][4] == "revisi") {
            return redirect()->to('sitkd/member/revisifile5/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 6 baru!" && $data['statusuraian'][5] == "revisi") {
            return redirect()->to('sitkd/member/revisifile6/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 7 baru!" && $data['statusuraian'][6] == "revisi") {
            return redirect()->to('sitkd/member/revisifile7/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 8 baru!" && $data['statusuraian'][7] == "revisi") {
            return redirect()->to('sitkd/member/revisifile8/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 9 baru!" && $data['statusuraian'][8] == "revisi") {
            return redirect()->to('sitkd/member/revisifile9/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 10 baru!" && $data['statusuraian'][9] == "revisi") {
            return redirect()->to('sitkd/member/revisifile10/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 11 baru!" && $data['statusuraian'][10] == "revisi") {
            return redirect()->to('sitkd/member/revisifile11/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 12 baru!" && $data['statusuraian'][11] == "revisi") {
            return redirect()->to('sitkd/member/revisifile12/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 13 baru!" && $data['statusuraian'][12] == "revisi") {
            return redirect()->to('sitkd/member/revisifile13/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 14 baru!" && $data['statusuraian'][13] == "revisi") {
            return redirect()->to('sitkd/member/revisifile14/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 15 baru!" && $data['statusuraian'][14] == "revisi") {
            return redirect()->to('sitkd/member/revisifile15/' . $file_id);
        } elseif ($notifikasi['jenis'] == "Hasil verifikasi Persyaratan 16 baru!" && $data['statusuraian'][15] == "revisi") {
            return redirect()->to('sitkd/member/revisifile16/' . $file_id);
        } else {
            return redirect()->to('sitkd/member/detailuraian/' . $file_id);
        }
    }

    public function hasilrevisireview($file_id, $id) // punya ADMIN MODERATOR
    {
        $dokumen_laporan = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $this->Notifikasi_model->hasilrevrev($id);
        if ($dokumen_laporan['file_id'] == null) {
            return redirect()->to('sitkd/auth/blocked');
        } else {
            return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $dokumen_laporan['tanggal']);
        }
    }

    public function hasilrevisipeninjauan($file_id, $id) // punya ADMIN MODERATOR
    {
        $dokumen_laporan = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $this->Notifikasi_model->hasilrevpen($id);
        if ($dokumen_laporan['file_id'] == null) {
            return redirect()->to('sitkd/auth/blocked');
        } else {
            return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $dokumen_laporan['tanggal']);
        }
    }

    public function perubahanstatus($file_id, $id) //punya member
    {
        $dokumen_laporan = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $this->Notifikasi_model->perubahanStat($id);
        if ($dokumen_laporan['file_id'] == null) {
            return redirect()->to('sitkd/auth/blocked');
        } else {
            return redirect()->to('sitkd/member/tracking/' . $file_id);
        }
    }

    public function persetujuan($file_id, $id) //punya member
    {
        $dokumen_laporan = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $this->Notifikasi_model->catatanStat($id);
        if ($dokumen_laporan['file_id'] == null) {
            return redirect()->to('sitkd/auth/blocked');
        } else {
            return redirect()->to('sitkd/member/tracking/' . $file_id);
        }
    }

    public function catatanpemprov($file_id, $id) //punya member
    {
        $dokumen_laporan = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $this->Notifikasi_model->persetujuanStat($id);
        if ($dokumen_laporan['file_id'] == null) {
            return redirect()->to('sitkd/auth/blocked');
        } else {
            return redirect()->to('sitkd/member/detailuraian/' . $file_id);
        }
    }

    public function allnotif()
    {
        $request = \Config\Services::request();
        session()->remove('keyword');
        session()->remove('keywordmenu');
        session()->remove('keywordsukses');
        session()->remove('keywordacc');
        $data['title'] = 'Role | SITKD JATENG';
        $data['myprofile'] = 'All Notification';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();

        $data['start'] = $request->uri->getSegment(4);
        $data['notif'] = $this->Notifikasi_model->countData($data['user']);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/notifikasi/showall', $data);
        echo view('sitkd/templates/footer');
    }
}
