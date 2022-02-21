<?php

namespace App\Controllers\Sitkd;

use App\Controllers\BaseController;
use App\Models\Sitkd\Accmenu_model;

class Accmenu extends BaseController
{
    protected $Accmenu_model;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Accmenu_model = new Accmenu_model();
        $this->validation = \Config\Services::validation();
        session()->remove('keyword');
        session()->remove('keywordmenu');
    }

    public function accdokumen()
    {
        $this->session->remove('keywordsukses');
        $start = $this->request->getVar('page_sitkd_dokumen_laporan') ? $this->request->getVar('page_sitkd_dokumen_laporan') : 1;

        if (isset($_POST['tombolcari'])) {
            $cari = $this->request->getVar('keywordacc');
            $this->session->set('keywordacc', $cari);
        } else {
            $cari = $this->session->get('keywordacc');
        }

        if ($cari) {
            $get_acc = $this->Accmenu_model->countData($cari);
        } else {
            $get_acc = $this->Accmenu_model->defaultcountData();
        }

        $data = [
            'title' => 'ACC Dokumen | SITKD JATENG',
            'myprofile' => 'ACC Dokumen',
            'user' => $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray(),
            'start' => $start,
            'getacc' => $get_acc->paginate(5, 'sitkd_dokumen_laporan'),
            'pager' => $get_acc->pager,
        ];

        if ($cari) {
            $data['total_rows'] = $this->Accmenu_model->countData($cari)->countAllResults();
        } else {
            $data['total_rows'] = $this->Accmenu_model->defaultcountData()->countAllResults();
        }

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/accdokumen', $data);
        echo view('sitkd/templates/footer');
    }

    public function dokumensukses()
    {
        $this->session->remove('keywordacc');
        $start = $this->request->getVar('page_sitkd_dokumen_laporan') ? $this->request->getVar('page_sitkd_dokumen_laporan') : 1;

        if (isset($_POST['tombolcari'])) {
            $cari = $this->request->getVar('keywordsukses');
            $this->session->set('keywordsukses', $cari);
        } else {
            $cari = $this->session->get('keywordsukses');
        }

        if ($cari) {
            $get_sukses = $this->Accmenu_model->countDatasukses($cari);
        } else {
            $get_sukses = $this->Accmenu_model->defaultcountDatasukses();
        }

        $data = [
            'title' => 'Dokumen sukses | SITKD JATENG',
            'myprofile' => 'ACC Dokumen', // sementara sebelum upgrade
            // 'myprofile' => 'Dokumen disetujui', // Aktifkan kalo mau upgrade CI4
            'user' => $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray(),
            'start' => $start,
            'get_sukses' => $get_sukses->paginate(5, 'sitkd_dokumen_laporan'),
            'pager' => $get_sukses->pager,
        ];

        if ($cari) {
            $data['total_rows'] = $this->Accmenu_model->countDatasukses($cari)->countAllResults();
        } else {
            $data['total_rows'] = $this->Accmenu_model->defaultcountDatasukses()->countAllResults();
        }

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/dokumensukses', $data);
        echo view('sitkd/templates/footer');
    }

    public function tracking($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Tracking | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Tracking dokumen';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        $tanggalketeranganfile = $this->db->query("SELECT `tanggalketeranganfile` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalketeranganfile["tanggalketeranganfile"] != null) {
            $data['tanggalketeranganfile'] = explode("^", $tanggalketeranganfile["tanggalketeranganfile"]);
        } else {
            $data['tanggalketeranganfile'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keteranganfile` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keteranganfile"] != null) {
            $data['keteranganfile'] = explode("^", $keterangan["keteranganfile"]);
        } else {
            $data['keteranganfile'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/tracking', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailuraian($file_id, $tanggal)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $doklap = $this->db->table('sitkd_dokumen_laporan');
        $data['title'] = 'Detail data | SITKD JATENG';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $doklap->getWhere(['file_id' => $file_id, 'tanggal' => $tanggal])->getRowArray();
        $data['myprofile'] = 'ACC Dokumen'; // sementara sebelum upgrade
        // $data['myprofile'] = $data['dokumen'] == 'sukses' ? 'ACC Dokumen' : 'Dokumen disetujui'; //dipakai setelah upgrade aja

        $doklap->where('file_id', $file_id);
        $doklap->set('accdok', "Y");
        $doklap->update();

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keteranganstatus = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keteranganstatus["status_uraian"] == "sukses^sukses^sukses^sukses^sukses^sukses^sukses^sukses^sukses^sukses^sukses^sukses^sukses^sukses^sukses^sukses") {
            $data['keteranganstatus'] = "ready";
        } else {
            $data['keteranganstatus'] = "revisi";
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        if (isset($_POST['submit'])) {
            $this->validation->setRule('status_laporan', 'Status', 'trim|required', ['required' => 'Status laporan belum terindex']);
            $this->validation->setRule('file_id', 'File_id', 'trim|required', ['required' => 'File_id belum terindex']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $tanggal)->withInput();
            } else {
                $updateacc = [
                    'tanggalmulaitinjauan' => $this->request->getVar('tanggalmulaitinjauan'),
                    'tanggalmulaidiajukan' => $this->request->getVar('tanggalmulaidiajukan'),
                    'tahun_sukses' => $this->request->getVar('tahun'),
                    'tanggal_clicksukses' => $this->request->getVar('tanggal_clicksukses'),
                    'verifikator' => $this->request->getVar('verifikator'),
                    'catatan_verifikator' => $this->request->getVar('catatanverifikator'),
                    'status_laporan' => $this->request->getVar('status_laporan'),
                ];
                $doklap->where('file_id', $file_id);
                $doklap->update($updateacc);
                if (isset($_POST['permendagri_id'])) {
                    $input = $this->request->getVar();
                    $this->Accmenu_model->Notifikasi($input);
                }
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Verifikasi dokumen <b>berhasil</b> dikirim.</div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $tanggal);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailuraian', $data);
        echo view('sitkd/templates/footer');
    }

    public function viewpersetujuan($file_id)
    {
        $data['title'] = 'Persetujuan | SITKD JATENG';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['myprofile'] = 'ACC Dokumen'; // sementara sebelum upgrade
        // $data['myprofile'] = $data['dokumen'] == 'sukses' ? 'ACC Dokumen' : 'Dokumen disetujui'; //dipakai setelah upgrade aja
        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['upload_persetujuan'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['upload_persetujuan'];
        }

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/viewpersetujuan', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadpersetujuan($file_id, $tanggal)
    {
        $data['title'] = 'Upload Persetujuan | SITKD JATENG';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id, 'tanggal' => $tanggal])->getRowArray();
        $data['myprofile'] = 'ACC Dokumen'; // sementara sebelum upgrade
        // $data['myprofile'] = $data['dokumen'] == 'sukses' ? 'ACC Dokumen' : 'Dokumen disetujui'; //dipakai setelah upgrade aja
        $data['validation'] = $this->validation;

        // $this->db->get_where('dokumen_laporan', ['tanggal' => $tanggal])->row_array();

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('upload_persetujuan', 'Upload Persetujuan', 'trim|uploaded[upload_persetujuan]|mime_in[upload_persetujuan,application/pdf]|max_size[upload_persetujuan,5120]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 5mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/accmenu/uploadpersetujuan/' . $file_id . '/' . $tanggal)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('upload_persetujuan');
                $this->Accmenu_model->uploadPersetujuanPdf($file_id, $input, $file);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persetujuan berhasil diupload</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal']);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/uploadpersetujuan', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile1($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 1 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile2'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile3'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile4'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile5'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile1', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile2($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 2 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile2'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile3'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile4'] = 'Ijin Bupati';
        $data['myprofile5'] = 'Berita Acara Musyawarah Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile2', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile3($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 3 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile2'] = 'Peraturan Desa UGR Tahap I';
        $data['myprofile3'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile4'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile5'] = 'Berita Acara Persetujuan BPD';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile3', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile4($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 4 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Rancangan Peraturan Desa';
        $data['myprofile2'] = 'Rancangan Peraturan Desa Terbaru';
        $data['myprofile3'] = 'Rancangan Peraturan Desa';
        $data['myprofile4'] = 'Persetujuan BPD';
        $data['myprofile5'] = 'Rancangan Peraturan Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile4', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile5($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 5 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile2'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['myprofile3'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile4'] = 'Rancangan Peraturan Desa';
        $data['myprofile5'] = 'Alas Hak Tanah Kas Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile5', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile6($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 6 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['myprofile2'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile3'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile4'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile5'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile6', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile7($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 7 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile2'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['myprofile3'] = 'Hasil perhitungan Appraisal TKD';
        $data['myprofile4'] = 'Alas Hak Tanah Pengganti';
        $data['myprofile5'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile7', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile8($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 8 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile2'] = 'SK Tim Panitia Desa';
        $data['myprofile3'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile4'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile5'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile8', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile9($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 9 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Hasil perhitungan Appraisal TKD';
        $data['myprofile2'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile3'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile4'] = 'Hasil perhitungan Appraisal TKD';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile9', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile10($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 10 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['myprofile2'] = 'Berita Acara Tanah Pengganti di Luar Desa';
        $data['myprofile3'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile4'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile10', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile11($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 11 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'SK Tim Panitia Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanverifikator = $this->db->query("SELECT `catatan_verifikator` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanverifikator["catatan_verifikator"] != null) {
            $data['catatan_verifikator'] = explode("^", $catatanverifikator["catatan_verifikator"]);
        } else {
            $data['catatan_verifikator'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile11', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile12($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 12 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Permohonan tukar menukar Kepala Desa Kepada Bupati';
        $data['myprofile2'] = 'SK Tim kajian Kabupaten';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanverifikator = $this->db->query("SELECT `catatan_verifikator` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanverifikator["catatan_verifikator"] != null) {
            $data['catatan_verifikator'] = explode("^", $catatanverifikator["catatan_verifikator"]);
        } else {
            $data['catatan_verifikator'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile12', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile13($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 13 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Dokumen Pendukung Lainnya';
        $data['myprofile2'] = 'Kesesuaian RTRW';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanverifikator = $this->db->query("SELECT `catatan_verifikator` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanverifikator["catatan_verifikator"] != null) {
            $data['catatan_verifikator'] = explode("^", $catatanverifikator["catatan_verifikator"]);
        } else {
            $data['catatan_verifikator'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile13', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile14($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 14 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Ijin Bupati';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanverifikator = $this->db->query("SELECT `catatan_verifikator` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanverifikator["catatan_verifikator"] != null) {
            $data['catatan_verifikator'] = explode("^", $catatanverifikator["catatan_verifikator"]);
        } else {
            $data['catatan_verifikator'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile14', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile15($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 15 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Kajian Tim Kabupaten';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanverifikator = $this->db->query("SELECT `catatan_verifikator` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanverifikator["catatan_verifikator"] != null) {
            $data['catatan_verifikator'] = explode("^", $catatanverifikator["catatan_verifikator"]);
        } else {
            $data['catatan_verifikator'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile15', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile16($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');

        $data['title'] = 'Uraian syarat 16 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanverifikator = $this->db->query("SELECT `catatan_verifikator` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanverifikator["catatan_verifikator"] != null) {
            $data['catatan_verifikator'] = explode("^", $catatanverifikator["catatan_verifikator"]);
        } else {
            $data['catatan_verifikator'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/detailfile16', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile1($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 1 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile2'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile3'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile4'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile5'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file1'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file1'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][0]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][0]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan1', 'Keterangan1', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile1/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 1 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal']);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile1', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile2($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 2 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile2'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile3'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile4'] = 'Ijin Bupati';
        $data['myprofile5'] = 'Berita Acara Musyawarah Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file2'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file2'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][1]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][1]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan2', 'Keterangan2', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile2/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 2 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile2', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile3($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 3 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile2'] = 'Peraturan Desa UGR Tahap I';
        $data['myprofile3'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile4'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile5'] = 'Berita Acara Persetujuan BPD';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file3'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file3'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][2]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][2]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan3', 'Keterangan3', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile3/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 3 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile3', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile4($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 4 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Rancangan Peraturan Desa';
        $data['myprofile2'] = 'Rancangan Peraturan Desa Terbaru';
        $data['myprofile3'] = 'Rancangan Peraturan Desa';
        $data['myprofile4'] = 'Persetujuan BPD';
        $data['myprofile5'] = 'Rancangan Peraturan Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file4'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file4'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][3]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][3]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan4', 'Keterangan4', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile4/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 4 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'] . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile4', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile5($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 5 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile2'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['myprofile3'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile4'] = 'Rancangan Peraturan Desa';
        $data['myprofile5'] = 'Alas Hak Tanah Kas Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file5'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file5'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][4]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][4]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan5', 'Keterangan5', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile5/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 5 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile5', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile6($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 6 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['myprofile2'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile3'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile4'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile5'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file6'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file6'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][5]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][5]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan6', 'Keterangan6', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile6/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 6 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile6', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile7($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 7 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile2'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['myprofile3'] = 'Hasil perhitungan Appraisal TKD';
        $data['myprofile4'] = 'Alas Hak Tanah Pengganti';
        $data['myprofile5'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file7'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file7'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][6]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][6]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan7', 'Keterangan7', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile7/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 7 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile7', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile8($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 8 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile2'] = 'SK Tim Panitia Desa';
        $data['myprofile3'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile4'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile5'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file8'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file8'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][7]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][7]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan8', 'Keterangan8', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile8/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 8 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile8', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile9($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 9 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Hasil perhitungan Appraisal TKD';
        $data['myprofile2'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile3'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile4'] = 'Hasil perhitungan Appraisal TKD';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file9'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file9'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][8]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][8]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan9', 'Keterangan9', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile9/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 9 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile9', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile10($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 9 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['myprofile2'] = 'Berita Acara Tanah Pengganti di Luar Desa';
        $data['myprofile3'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile4'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file10'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file10'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][9]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][9]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan10', 'Keterangan10', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile10/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 10 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile10', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile11($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 11 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'SK Tim Panitia Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file11'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file11'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][10]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][10]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan11', 'Keterangan11', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile11/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 11 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile11', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile12($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 12 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Permohonan tukar menukar Kepala Desa Kepada Bupati';
        $data['myprofile2'] = 'SK Tim kajian Kabupaten';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file12'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file12'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][11]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][11]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan12', 'Keterangan12', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile12/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 12 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile12', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile13($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 13 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Dokumen Pendukung Lainnya';
        $data['myprofile2'] = 'Kesesuaian RTRW';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file13'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file13'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][12]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][12]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan13', 'Keterangan13', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile13/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 13 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile13', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile14($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 14 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Ijin Bupati';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file14'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file14'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][13]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][13]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan14', 'Keterangan14', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile14/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 14 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile14', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile15($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 15 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Kajian Tim Kabupaten';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file15'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file15'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][14]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][14]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan15', 'Keterangan15', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile15/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 15 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile15', $data);
        echo view('sitkd/templates/footer');
    }

    public function reviewfile16($file_id)
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        $revfile = $this->db->table('sitkd_reviewFiles');
        $notif = $this->db->table('sitkd_notifikasi');

        $data['title'] = 'Uraian syarat 16 | SITKD JATENG';
        $data['myprofile'] = 'ACC Dokumen';
        $data['myprofile1'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['rfiles'] = $revfile->get()->getResultArray();
        $data['validation'] = $this->validation;

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Accmenu_model->getUraian($file_id);

        if ($data['dokumen']['file16'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file16'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_upload'][15]);
        $notif->orWhere('tanggal', $data['tanggal_revisi'][15]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('keterangan16', 'Keterangan16', 'trim|required', ['required' => 'Keterangan wajib diisi']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/reviewfile16/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Accmenu_model->reviewFile($input);
                $this->Accmenu_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>Uraian persyaratan 16 berhasil diperbaharui.</b></div>');
                return redirect()->to('sitkd/accmenu/detailuraian/' . $file_id . '/' . $data['dokumen']['tanggal'])->withInput();
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/accmenu/reviewfile16', $data);
        echo view('sitkd/templates/footer');
    }

    public function hapussessionkey()
    {
        $this->session->remove('keywordacc');
        $this->session->remove('keywordsukses');
        return redirect()->back();
    }
}
