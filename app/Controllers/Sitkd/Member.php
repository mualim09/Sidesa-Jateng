<?php

namespace App\Controllers\Sitkd;

use App\Controllers\BaseController;
use App\Models\Sitkd\Member_model;

class Member extends BaseController
{
    protected $Member_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Member_model = new Member_model();
        helper('zakezone');
    }

    public function index()
    {
        $this->session->remove('keyword');
        $data['title'] = 'Dashboard | SITKD JATENG';
        $data['myprofile'] = 'My profile';
        $builder = $this->db->table('sitkd_user');
        $data['user'] = $builder->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $sessionEmail = $this->session->get('email');

        $data['kab'] = $this->Member_model->getMyprofile($sessionEmail);

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/index', $data);
        echo view('sitkd/templates/footer');
    }

    public function verifikasidokumen()
    {
        $builder = $this->db->table('sitkd_user');
        $start = $this->request->getVar('page_sitkd_dokumen_laporan') ? $this->request->getVar('page_sitkd_dokumen_laporan') : 1;
        $sessionID = $this->session->get('permendagri_id');

        if (isset($_POST['tombolcari'])) {
            $cari = $this->request->getVar('keyword');
            $this->session->set('keyword', $cari);
        } else {
            $cari = $this->session->get('keyword');
        }

        if ($cari) {
            $get_mem = $this->Member_model->countData($cari, $sessionID);
        } else {
            $get_mem = $this->Member_model->defaultcountData($sessionID);
        }

        $data = [
            'title' => 'Data verifikasi | SITKD JATENG',
            'myprofile' => 'Verifikasi dokumen',
            'user' => $builder->getWhere(['email' => $this->session->get('email')])->getRowArray(),
            'start' => $start,
            'uploadfile' => $get_mem->paginate(5, 'sitkd_dokumen_laporan'),
            'pager' => $get_mem->pager,
        ];

        if ($cari) {
            $data['total_rows'] = $this->Member_model->countData($cari, $sessionID)->countAllResults();
        } else {
            $data['total_rows'] = $this->Member_model->defaultcountData($sessionID)->countAllResults();
        }

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/verifikasidokumen', $data);
        echo view('sitkd/templates/footer');
    }

    public function tracking($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Tracking | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Tracking dokumen';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

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
        echo view('sitkd/member/tracking', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailuraian($file_id)
    {
        // sistem_information(); /*buat membatasin member supaya ga bisa akses file punya kantor lain*/

        $this->session->remove('keyword');
        $data['title'] = 'Detail data | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keteranganfile = $this->db->query("SELECT `keteranganfile` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keteranganfile["keteranganfile"] != null) {
            $data['keteranganfile'] = explode("^", $keteranganfile["keteranganfile"]);
        } else {
            $data['keteranganfile'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalketeranganfile = $this->db->query("SELECT `tanggalketeranganfile` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalketeranganfile["tanggalketeranganfile"] != null) {
            $data['tanggalketeranganfile'] = explode("^", $tanggalketeranganfile["tanggalketeranganfile"]);
        } else {
            $data['tanggalketeranganfile'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
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

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanverifikator = $this->db->query("SELECT `catatan_verifikator` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanverifikator["catatan_verifikator"] != null) {
            $data['catatan_verifikator'] = explode("^", $catatanverifikator["catatan_verifikator"]);
        } else {
            $data['catatan_verifikator'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        if (isset($_POST['submit'])) {
            if ($data['dokumen']['file1'] == null) {
                $this->validation->setRule('keteranganfile1', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file2'] == null) {
                $this->validation->setRule('keteranganfile2', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file3'] == null) {
                $this->validation->setRule('keteranganfile3', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file4'] == null) {
                $this->validation->setRule('keteranganfile4', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file5'] == null) {
                $this->validation->setRule('keteranganfile5', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file6'] == null) {
                $this->validation->setRule('keteranganfile6', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file7'] == null) {
                $this->validation->setRule('keteranganfile7', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file8'] == null) {
                $this->validation->setRule('keteranganfile8', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file9'] == null && $data['dokumen']['subkategori'] == "Umum") {
                $this->validation->setRule('keteranganfile9', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file10'] == null && $data['dokumen']['subkategori'] == "Umum") {
                $this->validation->setRule('keteranganfile10', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file11'] == null && $data['dokumen']['subkategori'] == "Umum") {
                $this->validation->setRule('keteranganfile11', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file12'] == null && $data['dokumen']['subkategori'] == "Umum") {
                $this->validation->setRule('keteranganfile12', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file13'] == null && $data['dokumen']['subkategori'] == "Umum") {
                $this->validation->setRule('keteranganfile13', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file9'] == null && $data['dokumen']['subkategori'] == "Tanah pengganti") {
                $this->validation->setRule('keteranganfile9', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file10'] == null && $data['dokumen']['subkategori'] == "Tanah pengganti") {
                $this->validation->setRule('keteranganfile10', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file9'] == null && $data['dokumen']['subkategori'] == "PERMENDAGRI No. 4 / 2007") {
                $this->validation->setRule('keteranganfile9', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file10'] == null && $data['dokumen']['subkategori'] == "PERMENDAGRI No. 4 / 2007") {
                $this->validation->setRule('keteranganfile10', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file9'] == null && $data['dokumen']['kategori'] == "Bukan kepentingan umum") {
                $this->validation->setRule('keteranganfile9', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file10'] == null && $data['dokumen']['kategori'] == "Bukan kepentingan umum") {
                $this->validation->setRule('keteranganfile10', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file11'] == null && $data['dokumen']['kategori'] == "Bukan kepentingan umum") {
                $this->validation->setRule('keteranganfile11', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file12'] == null && $data['dokumen']['kategori'] == "Bukan kepentingan umum") {
                $this->validation->setRule('keteranganfile12', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file13'] == null && $data['dokumen']['kategori'] == "Bukan kepentingan umum") {
                $this->validation->setRule('keteranganfile13', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file14'] == null && $data['dokumen']['kategori'] == "Bukan kepentingan umum") {
                $this->validation->setRule('keteranganfile14', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file15'] == null && $data['dokumen']['kategori'] == "Bukan kepentingan umum") {
                $this->validation->setRule('keteranganfile15', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            if ($data['dokumen']['file16'] == null && $data['dokumen']['kategori'] == "Bukan kepentingan umum") {
                $this->validation->setRule('keteranganfile16', 'Keterangan', 'trim|required', ['required' => 'Keberadaan file harus diterangkan']);
            }
            $this->validation->setRule('keterangan1', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan2', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan3', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan4', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan5', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan6', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan7', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan8', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan9', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan10', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan11', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan12', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan13', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan14', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan15', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('keterangan16', 'Keterangan', 'trim|required', ['required' => 'Periksa/pilih kesesuaian file!']);
            $this->validation->setRule('file_id', 'File_id', 'trim|required', ['required' => 'FILE ID ILEGAL']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/detailuraian/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Member_model->detailUraian($file_id, $input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Data <b>berhasil</b> diupdate.</div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailuraian', $data);
        echo view('sitkd/templates/footer');
    }

    public function hapusketeranganfile1()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile1 = $this->request->getVar('keteranganfile1');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile1);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile2()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile2 = $this->request->getVar('keteranganfile2');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile2);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile3()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile3 = $this->request->getVar('keteranganfile3');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile3);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile4()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile4 = $this->request->getVar('keteranganfile4');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile4);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile5()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile5 = $this->request->getVar('keteranganfile5');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile5);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile6()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile6 = $this->request->getVar('keteranganfile6');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile6);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile7()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile7 = $this->request->getVar('keteranganfile7');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile7);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile8()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile8 = $this->request->getVar('keteranganfile8');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile8);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile9()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile9 = $this->request->getVar('keteranganfile9');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile9);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile10()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile10 = $this->request->getVar('keteranganfile10');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile10);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile11()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile11 = $this->request->getVar('keteranganfile11');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile11);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile12()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile12 = $this->request->getVar('keteranganfile12');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile12);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile13()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile13 = $this->request->getVar('keteranganfile13');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile13);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile14()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile14 = $this->request->getVar('keteranganfile14');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile14);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile15()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile15 = $this->request->getVar('keteranganfile15');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile15);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function hapusketeranganfile16()
    {
        $file_id = $this->request->getVar('fileid');
        $keteranganfile16 = $this->request->getVar('keteranganfile16');

        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->set('keteranganfile', $keteranganfile16);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function prepareuploadfile()
    {
        $this->session->remove('keyword');
        $data['title'] = 'Kategori | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Kategori Upload Data :';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/prepareuploadfile', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfileumum()
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload data | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['jenis'] = $this->db->table('sitkd_jenis_kepentingan_umum')->get()->getResultArray();
        $data['validation'] = $this->validation;

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama_trans', 'Nama Transaksi', 'trim|required', ['required' => 'Peruntukan wajib diisi']);
            $this->validation->setRule('luas_tkd', 'Luas TKD', 'trim|required', ['required' => 'Luas TKD wajib diisi']);
            $this->validation->setRule('pengganti', 'Kategori', 'trim|required', ['required' => 'Pengganti wajib diisi']);
            $this->validation->setRule('ugr', 'UGR', 'trim|required', ['required' => 'UGR wajib diisi']);
            $this->validation->setRule('sisa_ugr', 'Sisa UGR', 'trim|required', ['required' => 'Sisa UGR wajib diisi']);
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('petugas', 'Petugas', 'trim|required', ['required' => 'Petugas ilegal! => log']);
            $this->validation->setRule('status_laporan', 'Status', 'trim|required', ['required' => 'Status laporan ilegal! => log']);
            $this->validation->setRule('kecamatan', 'Kecamatan', 'trim|required', ['required' => 'Kecamatan wajib diisi']);
            $this->validation->setRule('desa', 'Desa', 'trim|required', ['required' => 'Desa wajib diisi']);
            $this->validation->setRule('jenis', 'Jenis', 'trim|required', ['required' => 'Jenis Kepentingan Umum wajib diisi sesuai ketentuan Pasal. 10 UU No. 2 / 2012']);
            $this->validation->setRule('tahun_upload', 'Tahun Upload', 'trim|required', ['required' => 'Tahun wajib diisi']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('keterangan', 'Keterangan', 'trim|required', ['required' => 'Keterangan wajib diisi (-)']);
            $this->validation->setRule('read', 'Read', 'trim|required', ['required' => 'Read wajib diisi (N)']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfileumum')->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Member_model->Notifikasi($input);
                $this->Member_model->uploadfileUmum($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>berhasil</b> dikirim!</div>');
                return redirect()->to('sitkd/member/verifikasidokumen');
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfileumum', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfiletanahpengganti()
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload data | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['jenis'] = $this->db->table('sitkd_jenis_kepentingan_umum')->get()->getResultArray();
        $data['validation'] = $this->validation;

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama_trans', 'Nama Transaksi', 'trim|required', ['required' => 'Peruntukan wajib diisi']);
            $this->validation->setRule('luas_tkd', 'Luas TKD', 'trim|required', ['required' => 'Luas TKD wajib diisi']);
            $this->validation->setRule('pengganti', 'Kategori', 'trim|required', ['required' => 'Pengganti wajib diisi']);
            $this->validation->setRule('ugr', 'UGR', 'trim|required', ['required' => 'UGR wajib diisi']);
            $this->validation->setRule('sisa_ugr', 'Sisa UGR', 'trim|required', ['required' => 'Sisa UGR wajib diisi']);
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('petugas', 'Petugas', 'trim|required', ['required' => 'Petugas ilegal! => log']);
            $this->validation->setRule('status_laporan', 'Status', 'trim|required', ['required' => 'Status laporan ilegal! => log']);
            $this->validation->setRule('kecamatan', 'Kecamatan', 'trim|required', ['required' => 'Kecamatan wajib diisi']);
            $this->validation->setRule('desa', 'Desa', 'trim|required', ['required' => 'Desa wajib diisi']);
            $this->validation->setRule('jenis', 'Jenis', 'trim|required', ['required' => 'Jenis Kepentingan Umum wajib diisi sesuai ketentuan Pasal. 10 UU No. 2 / 2012']);
            $this->validation->setRule('tahun_upload', 'Tahun Upload', 'trim|required', ['required' => 'Tahun wajib diisi']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('keterangan', 'Keterangan', 'trim|required', ['required' => 'Keterangan wajib diisi (-)']);
            $this->validation->setRule('read', 'Read', 'trim|required', ['required' => 'Read wajib diisi (N)']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfiletanahpengganti')->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Member_model->Notifikasi($input);
                $this->Member_model->uploadfileTanahpengganti($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>berhasil</b> dikirim!</div>');
                return redirect()->to('sitkd/member/verifikasidokumen');
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfiletanahpengganti', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfilegantirugiuang()
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload data | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['jenis'] = $this->db->table('sitkd_jenis_kepentingan_umum')->get()->getResultArray();
        $data['validation'] = $this->validation;

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama_trans', 'Nama Transaksi', 'trim|required', ['required' => 'Peruntukan wajib diisi']);
            $this->validation->setRule('luas_tkd', 'Luas TKD', 'trim|required', ['required' => 'Luas TKD wajib diisi']);
            // $this->validation->setRule('pengganti', 'Kategori', 'trim|required', ['required' => 'Pengganti wajib diisi']);
            $this->validation->setRule('ugr', 'UGR', 'trim|required', ['required' => 'UGR wajib diisi']);
            // $this->validation->setRule('sisa_ugr', 'Sisa UGR', 'trim|required', ['required' => 'Sisa UGR wajib diisi']);
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('petugas', 'Petugas', 'trim|required', ['required' => 'Petugas ilegal! => log']);
            $this->validation->setRule('status_laporan', 'Status', 'trim|required', ['required' => 'Status laporan ilegal! => log']);
            $this->validation->setRule('kecamatan', 'Kecamatan', 'trim|required', ['required' => 'Kecamatan wajib diisi']);
            $this->validation->setRule('desa', 'Desa', 'trim|required', ['required' => 'Desa wajib diisi']);
            $this->validation->setRule('jenis', 'Jenis', 'trim|required', ['required' => 'Jenis Kepentingan Umum wajib diisi sesuai ketentuan Pasal. 10 UU No. 2 / 2012']);
            $this->validation->setRule('tahun_upload', 'Tahun Upload', 'trim|required', ['required' => 'Tahun wajib diisi']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('keterangan', 'Keterangan', 'trim|required', ['required' => 'Keterangan wajib diisi (-)']);
            $this->validation->setRule('read', 'Read', 'trim|required', ['required' => 'Read wajib diisi (N)']);

            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfilegantirugiuang')->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Member_model->Notifikasi($input);
                $this->Member_model->uploadfileGantirugiuang($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>berhasil</b> dikirim!</div>');
                return redirect()->to('sitkd/member/verifikasidokumen');
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfilegantirugiuang', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfilepengajuanpermendagri()
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload data | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['jenis'] = $this->db->table('sitkd_jenis_kepentingan_umum')->get()->getResultArray();
        $data['validation'] = $this->validation;

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama_trans', 'Nama Transaksi', 'trim|required', ['required' => 'Peruntukan wajib diisi']);
            $this->validation->setRule('luas_tkd', 'Luas TKD', 'trim|required', ['required' => 'Luas TKD wajib diisi']);
            $this->validation->setRule('pengganti', 'Kategori', 'trim|required', ['required' => 'Pengganti wajib diisi']);
            // $this->validation->setRule('ugr', 'UGR', 'trim|required', ['required' => 'UGR wajib diisi']);
            // $this->validation->setRule('sisa_ugr', 'Sisa UGR', 'trim|required', ['required' => 'Sisa UGR wajib diisi']);
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('petugas', 'Petugas', 'trim|required', ['required' => 'Petugas ilegal! => log']);
            $this->validation->setRule('status_laporan', 'Status', 'trim|required', ['required' => 'Status laporan ilegal! => log']);
            $this->validation->setRule('kecamatan', 'Kecamatan', 'trim|required', ['required' => 'Kecamatan wajib diisi']);
            $this->validation->setRule('desa', 'Desa', 'trim|required', ['required' => 'Desa wajib diisi']);
            $this->validation->setRule('tahun_upload', 'Tahun Upload', 'trim|required', ['required' => 'Tahun wajib diisi']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('keterangan', 'Keterangan', 'trim|required', ['required' => 'Keterangan wajib diisi (-)']);
            $this->validation->setRule('read', 'Read', 'trim|required', ['required' => 'Read wajib diisi (N)']);

            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfilepengajuanpermendagri')->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Member_model->Notifikasi($input);
                $this->Member_model->uploadfilePengajuanpermendagri($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>berhasil</b> dikirim!</div>');
                return redirect()->to('sitkd/member/verifikasidokumen');
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfilepengajuanpermendagri', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfilebukankepentinganumum()
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload data | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['jenis'] = $this->db->table('sitkd_jenis_kepentingan_umum')->get()->getResultArray();
        $data['validation'] = $this->validation;

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama_trans', 'Nama Transaksi', 'trim|required', ['required' => 'Peruntukan wajib diisi']);
            $this->validation->setRule('luas_tkd', 'Luas TKD', 'trim|required', ['required' => 'Luas TKD wajib diisi']);
            $this->validation->setRule('pengganti', 'Kategori', 'trim|required', ['required' => 'Pengganti wajib diisi']);
            $this->validation->setRule('ugr', 'UGR', 'trim|required', ['required' => 'UGR wajib diisi']);
            $this->validation->setRule('sisa_ugr', 'Sisa UGR', 'trim|required', ['required' => 'Sisa UGR wajib diisi']);
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('petugas', 'Petugas', 'trim|required', ['required' => 'Petugas ilegal! => log']);
            $this->validation->setRule('status_laporan', 'Status', 'trim|required', ['required' => 'Status laporan ilegal! => log']);
            $this->validation->setRule('kecamatan', 'Kecamatan', 'trim|required', ['required' => 'Kecamatan wajib diisi']);
            $this->validation->setRule('desa', 'Desa', 'trim|required', ['required' => 'Desa wajib diisi']);
            $this->validation->setRule('tahun_upload', 'Tahun Upload', 'trim|required', ['required' => 'Tahun wajib diisi']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('keterangan', 'Keterangan', 'trim|required', ['required' => 'Keterangan wajib diisi (-)']);
            $this->validation->setRule('read', 'Read', 'trim|required', ['required' => 'Read wajib diisi (N)']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfilebukankepentinganumum')->withInput();
            } else {
                $input = $this->request->getVar();
                $this->Member_model->Notifikasi($input);
                $this->Member_model->uploadfileBukankepentinganumum($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>berhasil</b> dikirim!</div>');
                return redirect()->to('sitkd/member/verifikasidokumen');
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfilebukankepentinganumum', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile1($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 1 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile2'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile3'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile4'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile5'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file1', 'File1', 'trim|uploaded[file1]|mime_in[file1,application/pdf]|max_size[file1,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile1/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file1');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 1 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile1', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile2($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 2 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile2'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile3'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile4'] = 'Ijin Bupati';
        $data['myprofile5'] = 'Berita Acara Musyawarah Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file2', 'File2', 'trim|uploaded[file2]|mime_in[file2,application/pdf]|max_size[file2,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile2/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file2');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 2 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile2', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile3($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 3 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile2'] = 'Peraturan Desa UGR Tahap I';
        $data['myprofile3'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile4'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile5'] = 'Berita Acara Persetujuan BPD';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file3', 'File3', 'trim|uploaded[file3]|mime_in[file3,application/pdf]|max_size[file3,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile3/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file3');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 3 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile3', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile4($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 4 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Rancangan Peraturan Desa';
        $data['myprofile2'] = 'Rancangan Peraturan Desa Terbaru';
        $data['myprofile3'] = 'Rancangan Peraturan Desa';
        $data['myprofile4'] = 'Persetujuan BPD';
        $data['myprofile5'] = 'Rancangan Peraturan Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file4', 'File4', 'trim|uploaded[file4]|mime_in[file4,application/pdf]|max_size[file4,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile4/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file4');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 4 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile4', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile5($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 5 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile2'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['myprofile3'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile4'] = 'Rancangan Peraturan Desa';
        $data['myprofile5'] = 'Alas Hak Tanah Kas Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file5', 'File5', 'trim|uploaded[file5]|mime_in[file5,application/pdf]|max_size[file5,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile5/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file5');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 5 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile5', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile6($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 6 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['myprofile2'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile3'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile4'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile5'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file6', 'File6', 'trim|uploaded[file6]|mime_in[file6,application/pdf]|max_size[file6,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile6/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file6');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 6 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile6', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile7($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 7 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile2'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['myprofile3'] = 'Hasil perhitungan Appraisal TKD';
        $data['myprofile4'] = 'Alas Hak Tanah Pengganti';
        $data['myprofile5'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file7', 'File7', 'trim|uploaded[file7]|mime_in[file7,application/pdf]|max_size[file7,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile7/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file7');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 7 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile7', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile8($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 8 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile2'] = 'SK Tim Panitia Desa';
        $data['myprofile3'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile4'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile5'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file8', 'File8', 'trim|uploaded[file8]|mime_in[file8,application/pdf]|max_size[file8,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile8/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file8');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 8 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile8', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile9($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 9 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Hasil perhitungan Appraisal TKD';
        $data['myprofile2'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile3'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile4'] = 'Hasil perhitungan Appraisal TKD';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file9', 'File9', 'trim|uploaded[file9]|mime_in[file9,application/pdf]|max_size[file9,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile9/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file9');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 9 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile9', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile10($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 10 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['myprofile2'] = 'Berita Acara Tanah Pengganti di Luar Desa';
        $data['myprofile3'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile4'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file10', 'File10', 'trim|uploaded[file10]|mime_in[file10,application/pdf]|max_size[file10,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile10/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file10');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 10 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile10', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile11($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 11 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'SK Tim Panitia Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file11', 'File11', 'trim|uploaded[file11]|mime_in[file11,application/pdf]|max_size[file11,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile11/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file11');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 11 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile11', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile12($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 12 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Permohonan tukar menukar Kepala Desa Kepada Bupati';
        $data['myprofile2'] = 'SK Tim kajian Kabupaten';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file12', 'File12', 'trim|uploaded[file12]|mime_in[file12,application/pdf]|max_size[file12,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile12/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file12');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 12 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile12', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile13($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 13 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Dokumen Pendukung Lainnya';
        $data['myprofile2'] = 'Kesesuaian RTRW';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file13', 'file13', 'trim|uploaded[file13]|mime_in[file13,application/pdf]|max_size[file13,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile13/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file13');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 13 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile13', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile14($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 14 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Ijin Bupati';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file14', 'File14', 'trim|uploaded[file14]|mime_in[file14,application/pdf]|max_size[file14,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile14/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file14');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 14 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile14', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile15($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 15 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Kajian Tim Kabupaten';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file15', 'File15', 'trim|uploaded[file15]|mime_in[file15,application/pdf]|max_size[file15,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile15/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file15');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 15 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile15', $data);
        echo view('sitkd/templates/footer');
    }

    public function uploadfile16($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Upload file 16 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $keterangan = $this->db->query("SELECT `keterangan` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($keterangan["keterangan"] != null) {
            $data['keteranganexp'] = explode("^", $keterangan["keterangan"]);
        } else {
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggalupload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggalupload'] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'file Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file16', 'File16', 'trim|uploaded[file16]|mime_in[file16,application/pdf]|max_size[file16,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/uploadfile16/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file16');
                $this->Member_model->uploadFilePdf($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 16 berhasil diupload</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/uploadfile16', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile1($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 1 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file1'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file1'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][0]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile1', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile2($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 2 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file2'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file2'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][1]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile2', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile3($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 3 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file3'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file3'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][2]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile3', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile4($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 4 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file4'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file4'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][3]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile4', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile5($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 5 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file5'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file5'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][4]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile5', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile6($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 6 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file6'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file6'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][5]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile6', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile7($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 7 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file7'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file7'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][6]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile7', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile8($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 8 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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
            $data['keteranganexp'] = ["", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $status_uraian = $this->db->query("SELECT `status_uraian` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($status_uraian["status_uraian"] != null) {
            $data['statusuraian'] = explode("^", $status_uraian["status_uraian"]);
        } else {
            $data['statusuraian'] = ["", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $catatanmember = $this->db->query("SELECT `catatan_member` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($catatanmember["catatan_member"] != null) {
            $data['catatan_member'] = explode("^", $catatanmember["catatan_member"]);
        } else {
            $data['catatan_member'] = ["", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $pemeriksa = $this->db->query("SELECT `pemeriksa` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($pemeriksa["pemeriksa"] != null) {
            $data['pemeriksa'] = explode("^", $pemeriksa["pemeriksa"]);
        } else {
            $data['pemeriksa'] = ["", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalupload = $this->db->query("SELECT `tanggal_upload` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalupload["tanggal_upload"] != null) {
            $data['tanggal_upload'] = explode("^", $tanggalupload["tanggal_upload"]);
        } else {
            $data['tanggal_upload'] = ["", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalrevisi = $this->db->query("SELECT `tanggal_revisi` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalrevisi["tanggal_revisi"] != null) {
            $data['tanggal_revisi'] = explode("^", $tanggalrevisi["tanggal_revisi"]);
        } else {
            $data['tanggal_revisi'] = ["", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $tanggalreview = $this->db->query("SELECT `tanggal_review` FROM `sitkd_dokumen_laporan` WHERE `file_id` = $file_id")->getRowArray();
        if ($tanggalreview["tanggal_review"] != null) {
            $data['tanggal_review'] = explode("^", $tanggalreview["tanggal_review"]);
        } else {
            $data['tanggal_review'] = ["", "", "", "", "", "", "", "", "", "", "", ""];
        }

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file8'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file8'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][7]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile8', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile9($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 9 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file9'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file9'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][8]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile9', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile10($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 10 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file10'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file10'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][9]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile10', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile11($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 11 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file11'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file11'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][10]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile11', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile12($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 12 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file12'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file12'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][11]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile12', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile13($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 13 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file13'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file13'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][12]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile13', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile14($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 14 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file14'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file14'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][13]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile14', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile15($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 15 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file15'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file15'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][14]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile15', $data);
        echo view('sitkd/templates/footer');
    }

    public function detailfile16($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 16 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file16'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file16'];
        }

        $notif = $this->db->table('sitkd_notifikasi');
        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][15]);
        $notif->update();

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/detailfile16', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile1($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 1 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile2'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile3'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile4'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['myprofile5'] = 'Permohonan TMTKD dari Instansi pemohon';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file1'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file1'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][0]);
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
            $this->validation->setRule('file1', 'File1', 'trim|uploaded[file1]|mime_in[file1,application/pdf]|max_size[file1,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile1/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file1');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 1 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile1', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile2($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 2 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile2'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile3'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile4'] = 'Ijin Bupati';
        $data['myprofile5'] = 'Berita Acara Musyawarah Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file2'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file2'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][1]);
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
            $this->validation->setRule('file2', 'File2', 'trim|uploaded[file2]|mime_in[file2,application/pdf]|max_size[file2,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile2/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file2');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 2 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile2', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile3($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 3 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile2'] = 'Peraturan Desa UGR Tahap I';
        $data['myprofile3'] = 'Berita Acara Persetujuan BPD';
        $data['myprofile4'] = 'Berita Acara Musyawarah Desa';
        $data['myprofile5'] = 'Berita Acara Persetujuan BPD';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file3'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file3'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][2]);
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
            $this->validation->setRule('file3', 'File3', 'trim|uploaded[file3]|mime_in[file3,application/pdf]|max_size[file3,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile3/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file3');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 3 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile3', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile4($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 4 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Rancangan Peraturan Desa';
        $data['myprofile2'] = 'Rancangan Peraturan Desa Terbaru';
        $data['myprofile3'] = 'Rancangan Peraturan Desa';
        $data['myprofile4'] = 'Persetujuan BPD';
        $data['myprofile5'] = 'Rancangan Peraturan Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file4'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file4'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][3]);
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
            $this->validation->setRule('file4', 'File4', 'trim|uploaded[file4]|mime_in[file4,application/pdf]|max_size[file4,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile4/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file4');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 4 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile4', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile5($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 5 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile2'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['myprofile3'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile4'] = 'Rancangan Peraturan Desa';
        $data['myprofile5'] = 'Alas Hak Tanah Kas Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file5'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file5'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][4]);
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
            $this->validation->setRule('file5', 'File5', 'trim|uploaded[file5]|mime_in[file5,application/pdf]|max_size[file5,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile5/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file5');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 5 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile5', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile6($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 6 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['myprofile2'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile3'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile4'] = 'Alas Hak Tanah Kas Desa';
        $data['myprofile5'] = 'Alas Hak Tanah Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file6'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file6'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][5]);
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
            $this->validation->setRule('file6', 'File6', 'trim|uploaded[file6]|mime_in[file6,application/pdf]|max_size[file6,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile6/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file6');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 6 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile6', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile7($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 7 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile2'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['myprofile3'] = 'Hasil perhitungan Appraisal TKD';
        $data['myprofile4'] = 'Alas Hak Tanah Pengganti';
        $data['myprofile5'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file7'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file7'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][6]);
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
            $this->validation->setRule('file7', 'File7', 'trim|uploaded[file7]|mime_in[file7,application/pdf]|max_size[file7,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile7/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file7');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 7 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile7', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile8($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 8 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile2'] = 'SK Tim Panitia Desa';
        $data['myprofile3'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile4'] = 'Ukur Peta Bidang Tanah Kas Desa';
        $data['myprofile5'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file8'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file8'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][7]);
        $notif->update();

        if (isset($_POST['proses'])) {
            $this->validation->setRule('permendagri_id', 'Permendagri', 'trim|required', ['required' => 'id permendagri ilegal! => log']);
            $this->validation->setRule('targetnotif', 'Target Notif', 'trim|required', ['required' => 'Target notif wajib diisi']);
            $this->validation->setRule('readnotif', 'Read Notif', 'trim|required', ['required' => 'Read notif wajib diisi']);
            $this->validation->setRule('tanggalnotif', 'Tanggal Notif', 'trim|required', ['required' => 'Tanggal notif wajib diisi']);
            $this->validation->setRule('keterangannotif', 'Keterangan Notif', 'trim|required', ['required' => 'Keterangan notif wajib diisi']);
            $this->validation->setRule('jenisnotif', 'Jenis Notif', 'trim|required', ['required' => 'Jenis notif wajib diisi']);
            $this->validation->setRule('iconnotif', 'Icon Notif', 'trim|required', ['required' => 'Icon notif wajib diisi']);
            $this->validation->setRule('file_id', 'File Id', 'trim|required', ['required' => 'File_id tidak sesuai']);
            $this->validation->setRule('file8', 'file8', 'trim|uploaded[file8]|mime_in[file8,application/pdf]|max_size[file8,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile8/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file8');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 8 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile8', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile9($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 9 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Hasil perhitungan Appraisal TKD';
        $data['myprofile2'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile3'] = 'Ukur Peta Bidang Tanah Pengganti';
        $data['myprofile4'] = 'Hasil perhitungan Appraisal TKD';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file9'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file9'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][8]);
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
            $this->validation->setRule('file9', 'File9', 'trim|uploaded[file9]|mime_in[file9,application/pdf]|max_size[file9,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile9/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file9');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 9 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile9', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile10($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 10 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['myprofile2'] = 'Berita Acara Tanah Pengganti di Luar Desa';
        $data['myprofile3'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['myprofile4'] = 'Hasil perhitungan Appraisal Tanah Pengganti';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file10'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file10'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][9]);
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
            $this->validation->setRule('file10', 'File10', 'trim|uploaded[file10]|mime_in[file10,application/pdf]|max_size[file10,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile10/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file10');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 10 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile10', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile11($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 11 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'SK Tim Panitia Desa';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file11'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file11'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][10]);
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
            $this->validation->setRule('file11', 'File11', 'trim|uploaded[file11]|mime_in[file11,application/pdf]|max_size[file11,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile11/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file11');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 11 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile11', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile12($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 12 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Permohonan tukar menukar Kepala Desa Kepada Bupati';
        $data['myprofile2'] = 'SK Tim kajian Kabupaten';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file12'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file12'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][11]);
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
            $this->validation->setRule('file12', 'File12', 'trim|uploaded[file12]|mime_in[file12,application/pdf]|max_size[file12,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile12/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file12');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 12 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile12', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile13($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 13 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Dokumen Pendukung Lainnya';
        $data['myprofile2'] = 'Kesesuaian RTRW';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file13'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file13'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][12]);
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
            $this->validation->setRule('file13', 'File13', 'trim|uploaded[file13]|mime_in[file13,application/pdf]|max_size[file13,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile13/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file13');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 13 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile13', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile14($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 14 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Ijin Bupati';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file14'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file14'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][13]);
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
            $this->validation->setRule('file14', 'File14', 'trim|uploaded[file14]|mime_in[file14,application/pdf]|max_size[file14,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile14/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file14');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 14 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile14', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile15($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 15 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Kajian Tim Kabupaten';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file15'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file15'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][14]);
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
            $this->validation->setRule('file15', 'File15', 'trim|uploaded[file15]|mime_in[file15,application/pdf]|max_size[file15,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile15/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file15');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 15 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile15', $data);
        echo view('sitkd/templates/footer');
    }

    public function revisifile16($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Uraian syarat 16 | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        $data['myprofile1'] = 'Permohonan tukar menukar Kepala Desa kepada Bupati';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();
        $data['validation'] = $this->validation;
        $notif = $this->db->table('sitkd_notifikasi');

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

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['file16'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['file16'];
        }

        $notif->set('keterangan', "processed");
        $notif->set('read', "Y");
        $notif->where('tanggal', $data['tanggal_review'][15]);
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
            $this->validation->setRule('file16', 'File16', 'trim|uploaded[file16]|mime_in[file16,application/pdf]|max_size[file16,25600]', ['uploaded' => 'File belum dipilih', 'mime_in' => 'File yang anda pilih bukan PDF', 'max_size' => 'File anda melebihi 25mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/revisifile16/' . $file_id)->withInput();
            } else {
                $input = $this->request->getVar();
                $file = $this->request->getFile('file16');
                $this->Member_model->revisiFile($file_id, $input, $file);
                $this->Member_model->Notifikasi($input);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Terima kasih data <b>File persyaratan 16 berhasil diperbarui</b></div>');
                return redirect()->to('sitkd/member/detailuraian/' . $file_id);
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/revisifile16', $data);
        echo view('sitkd/templates/footer');
    }

    public function viewpersetujuan($file_id)
    {
        $this->session->remove('keyword');
        $data['title'] = 'Persetujuan | SITKD JATENG';
        $data['myprofile'] = 'Verifikasi dokumen';
        // $data['myprofile'] = $data['dokumen'] == 'sukses' ? 'Verifikasi dokumen' : 'Dokumen disetujui'; //dipakai setelah upgrade aja
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['dokumen'] = $this->db->table('sitkd_dokumen_laporan')->getWhere(['file_id' => $file_id])->getRowArray();

        $data['geturaian'] = $this->Member_model->getUraian($file_id);

        if ($data['dokumen']['upload_persetujuan'] == null) {
            $data['pdf'] = 'default.pdf';
        } else {
            $data['pdf'] = $data['dokumen']['upload_persetujuan'];
        }

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/viewpersetujuan', $data);
        echo view('sitkd/templates/footer');
    }

    public function editprofile()
    {
        $this->session->remove('keyword');
        $data['title'] = 'Edit profile | SITKD JATENG';
        $data['myprofile'] = 'Edit profile';
        $data['user'] = $this->db->table('sitkd_user')->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['validation'] = $this->validation;

        $this->validation->setRule('nama', 'Nama lengkap', 'trim|required', ['required' => 'Nama petugas tidak boleh dikosongkan']);

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama', 'Nama lengkap', 'trim|required', ['required' => 'Form tidak boleh dikosongkan']);
            $this->validation->setRule('image', 'Upload Persetujuan', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,2048]', ['mime_in' => 'File yang anda pilih bukan JPG', 'max_size' => 'File anda melebihi 2mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/editprofile')->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $user_id = $this->session->get('user_id');
                $this->Member_model->editProfile($user_id, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Profile diperbarui</div>');
                return redirect()->to('sitkd/member');
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/editprofile', $data);
        echo view('sitkd/templates/footer');
    }

    public function gantiPassword()
    {
        $this->session->remove('keyword');
        $data['title'] = 'Ganti password | SITKD JATENG';
        $data['myprofile'] = 'Ganti password';
        $builder = $this->db->table('sitkd_user');
        $data['user'] = $builder->getWhere(['email' => $this->session->get('email')])->getRowArray();
        $data['validation'] = $this->validation;

        if (isset($_POST['submit'])) {
            $this->validation->setRule('current_password', 'Current Password', 'required|trim', ['required' => 'Form tidak boleh dikosongkan']);
            $this->validation->setRule('new_password1', 'New Password', 'required|trim|min_length[6]', ['required' => 'Form tidak boleh dikosongkan', 'min_length' => 'Password minimal 6 karakter']);
            $this->validation->setRule('new_password2', 'New Password2', 'trim|matches[new_password1]', ['matches' => 'Input tidak sesuai dengan password baru']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('sitkd/member/gantipassword')->withInput();
            } else {
                $current_password = $this->request->getVar('current_password');
                $new_password = $this->request->getVar('new_password1');
                if (!password_verify($current_password, $data['user']['password'])) {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Gagal! Password awal tidak sesuai</div>');
                    return redirect()->to('sitkd/member/gantipassword')->withInput();
                } else {
                    if ($current_password == $new_password) {
                        $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Gagal! Password ini telah digunakan sebelumnya</div>');
                        return redirect()->to('sitkd/member/gantipassword')->withInput();
                    } else {
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                        $builder->set('password', $password_hash);
                        $builder->where('email', $this->session->get('email'));
                        $builder->update();
                        $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diperbarui</div>');
                        return redirect()->to('sitkd/member/gantipassword');
                    }
                }
            }
        }
        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('sitkd/member/gantipassword', $data);
        echo view('sitkd/templates/footer');
    }

    public function hapussessionkeyword()
    {
        $this->session->remove('keyword');
        return redirect()->back();
    }

    public function hapusdata($file_id, $tanggal)
    {
        $this->session->remove('keyword');
        $hapus = $this->db->table('sitkd_dokumen_laporan');
        $hapus->delete(['file_id' => $file_id]);
        $hapusnotif = $this->db->table('sitkd_notifikasi');
        $hapusnotif->delete(['file_id' => $file_id]);
        $hapusnotif->delete(['tanggal' => $tanggal]);
        $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Data berhasil <b>dihapus!</b></div>');
        return redirect()->to('sitkd/member/verifikasidokumen');
    }
}
