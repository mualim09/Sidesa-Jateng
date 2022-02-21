<?php

namespace App\Models\Sitkd;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class Member_model extends Model
{
    protected $table = 'sitkd_dokumen_laporan';
    protected $primaryKey = 'file_id';
    protected $AllowedFields = ['tahun_upload', 'penanggungjawab', 'petugas', 'kategori', 'subkategori', 'nama_trans', 'jenis_peruntukan', 'ugr', 'sisa_ugr', 'luas_tkd', 'pengganti', 'tanggalketeranganfile', 'file1', 'file2', 'file3', 'file4', 'file5', 'file6', 'file7', 'file8', 'file9', 'file10', 'file11', 'file12', 'file13', 'file14', 'file15', 'file16', 'status_uraian', 'catatan_member', 'tanggal_upload', 'tanggal_revisi'];

    public function defaultcountData($sessionID)
    {
        // $status = array('review', 'peninjauan', 'diajukan', 'pending');
        $builder = $this->table('sitkd_dokumen_laporan');
        $builder->select('*');
        $builder->where('permendagri_id', $sessionID);
        $builder->orderBy('tanggal', 'DESC');
        return $builder;
    }

    public function countData($cari, $sessionID)
    {
        // $status = array('review', 'peninjauan', 'diajukan', 'pending');
        $builder = $this->table('sitkd_dokumen_laporan');
        $builder->like('nama_trans', $cari);
        $builder->where('permendagri_id', $sessionID);
        $builder->orLike('tanggal', $cari);
        $builder->where('permendagri_id', $sessionID);
        $builder->orLike('status_laporan', $cari);
        $builder->where('permendagri_id', $sessionID);
        $builder->orLike('petugas', $cari);
        $builder->where('permendagri_id', $sessionID);
        $builder->orLike('kategori', $cari);
        $builder->where('permendagri_id', $sessionID);
        $builder->orLike('luas_tkd', $cari);
        $builder->where('permendagri_id', $sessionID);
        $builder->orderBy('tanggal', 'DESC');
        return $builder;
    }

    public function uploadfileUmum($input)
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tanggaluploadpost = [
            $input['tanggalupload1'],
            $input['tanggalupload2'],
            $input['tanggalupload3'],
            $input['tanggalupload4'],
            $input['tanggalupload5'],
            $input['tanggalupload6'],
            $input['tanggalupload7'],
            $input['tanggalupload8'],
            $input['tanggalupload9'],
            $input['tanggalupload10'],
            $input['tanggalupload11'],
            $input['tanggalupload12'],
            $input['tanggalupload13'],
            $input['tanggalupload14'],
            $input['tanggalupload15'],
            $input['tanggalupload16']
        ];
        $tanggalupload = implode("^", $tanggaluploadpost);

        $tanggalketeranganfilepost = [
            $input['tanggalketeranganfile1'],
            $input['tanggalketeranganfile2'],
            $input['tanggalketeranganfile3'],
            $input['tanggalketeranganfile4'],
            $input['tanggalketeranganfile5'],
            $input['tanggalketeranganfile6'],
            $input['tanggalketeranganfile7'],
            $input['tanggalketeranganfile8'],
            $input['tanggalketeranganfile9'],
            $input['tanggalketeranganfile10'],
            $input['tanggalketeranganfile11'],
            $input['tanggalketeranganfile12'],
            $input['tanggalketeranganfile13'],
            $input['tanggalketeranganfile14'],
            $input['tanggalketeranganfile15'],
            $input['tanggalketeranganfile16']
        ];
        $tanggalketeranganfile = implode("^", $tanggalketeranganfilepost);

        $luastkdpost = [
            $input['luas_tkd'],
            $input['luas_tkd1']
        ];
        $luastkd = implode(" ", $luastkdpost);

        $penggantipost = [
            $input['pengganti'],
            $input['pengganti1']
        ];
        $pengganti = implode(" ", $penggantipost);

        $insert = array(
            "kecamatan" => $input['kecamatan'],
            "desa" => $input['desa'],
            "kategori" => $input['kategori'],
            "subkategori" => $input['subkategori'],
            "nama_trans" => $input['nama_trans'],
            "jenis_peruntukan" => $input['jenis'],
            "luas_tkd" => $luastkd,
            "pengganti" => $pengganti,
            "tahun_upload" => $input['tahun_upload'],
            "keterangan" => $input['keterangan'],
            "ugr" => $input['ugr'],
            "sisa_ugr" => $input['sisa_ugr'],
            "petugas" => $input['petugas'],
            "catatan_member" => $input['catatanmember'],
            "keteranganfile" => $input['keteranganfile'],
            "tanggalketeranganfile" => $tanggalketeranganfile,
            "tanggal_revisi" => $input['tanggalrevisi'],
            "tanggal_upload" => $tanggalupload,
            "status_laporan" => $input['status_laporan'],
            "permendagri_id" => $input['permendagri_id'],
            "status_uraian" => $input['statusfile'],
            "read" => $input['read'],
            "tanggal" => $input['tanggal']
        );
        $builder->insert($insert);
    }

    public function uploadfileTanahpengganti($input)
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tanggaluploadpost = [
            $input['tanggalupload1'],
            $input['tanggalupload2'],
            $input['tanggalupload3'],
            $input['tanggalupload4'],
            $input['tanggalupload5'],
            $input['tanggalupload6'],
            $input['tanggalupload7'],
            $input['tanggalupload8'],
            $input['tanggalupload9'],
            $input['tanggalupload10'],
            $input['tanggalupload11'],
            $input['tanggalupload12'],
            $input['tanggalupload13'],
            $input['tanggalupload14'],
            $input['tanggalupload15'],
            $input['tanggalupload16']
        ];
        $tanggalupload = implode("^", $tanggaluploadpost);

        $tanggalketeranganfilepost = [
            $input['tanggalketeranganfile1'],
            $input['tanggalketeranganfile2'],
            $input['tanggalketeranganfile3'],
            $input['tanggalketeranganfile4'],
            $input['tanggalketeranganfile5'],
            $input['tanggalketeranganfile6'],
            $input['tanggalketeranganfile7'],
            $input['tanggalketeranganfile8'],
            $input['tanggalketeranganfile9'],
            $input['tanggalketeranganfile10'],
            $input['tanggalketeranganfile11'],
            $input['tanggalketeranganfile12'],
            $input['tanggalketeranganfile13'],
            $input['tanggalketeranganfile14'],
            $input['tanggalketeranganfile15'],
            $input['tanggalketeranganfile16']
        ];
        $tanggalketeranganfile = implode("^", $tanggalketeranganfilepost);

        $luastkdpost = [
            $input['luas_tkd'],
            $input['luas_tkd1']
        ];
        $luastkd = implode(" ", $luastkdpost);

        $penggantipost = [
            $input['pengganti'],
            $input['pengganti1']
        ];
        $pengganti = implode(" ", $penggantipost);

        $insert = array(
            "kecamatan" => $input['kecamatan'],
            "desa" => $input['desa'],
            "kategori" => $input['kategori'],
            "subkategori" => $input['subkategori'],
            "nama_trans" => $input['nama_trans'],
            "jenis_peruntukan" => $input['jenis'],
            "luas_tkd" => $luastkd,
            "pengganti" => $pengganti,
            "tahun_upload" => $input['tahun_upload'],
            "keterangan" => $input['keterangan'],
            "ugr" => $input['ugr'],
            "sisa_ugr" => $input['sisa_ugr'],
            "petugas" => $input['petugas'],
            "catatan_member" => $input['catatanmember'],
            "keteranganfile" => $input['keteranganfile'],
            "tanggalketeranganfile" => $tanggalketeranganfile,
            "tanggal_revisi" => $input['tanggalrevisi'],
            "tanggal_upload" => $tanggalupload,
            "status_laporan" => $input['status_laporan'],
            "permendagri_id" => $input['permendagri_id'],
            "status_uraian" => $input['statusfile'],
            "read" => $input['read'],
            "tanggal" => $input['tanggal']
        );
        $builder->insert($insert);
    }

    public function uploadfileGantirugiuang($input)
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tanggaluploadpost = [
            $input['tanggalupload1'],
            $input['tanggalupload2'],
            $input['tanggalupload3'],
            $input['tanggalupload4'],
            $input['tanggalupload5'],
            $input['tanggalupload6'],
            $input['tanggalupload7'],
            $input['tanggalupload8'],
            $input['tanggalupload9'],
            $input['tanggalupload10'],
            $input['tanggalupload11'],
            $input['tanggalupload12'],
            $input['tanggalupload13'],
            $input['tanggalupload14'],
            $input['tanggalupload15'],
            $input['tanggalupload16']
        ];
        $tanggalupload = implode("^", $tanggaluploadpost);

        $tanggalketeranganfilepost = [
            $input['tanggalketeranganfile1'],
            $input['tanggalketeranganfile2'],
            $input['tanggalketeranganfile3'],
            $input['tanggalketeranganfile4'],
            $input['tanggalketeranganfile5'],
            $input['tanggalketeranganfile6'],
            $input['tanggalketeranganfile7'],
            $input['tanggalketeranganfile8'],
            $input['tanggalketeranganfile9'],
            $input['tanggalketeranganfile10'],
            $input['tanggalketeranganfile11'],
            $input['tanggalketeranganfile12'],
            $input['tanggalketeranganfile13'],
            $input['tanggalketeranganfile14'],
            $input['tanggalketeranganfile15'],
            $input['tanggalketeranganfile16']
        ];
        $tanggalketeranganfile = implode("^", $tanggalketeranganfilepost);

        $luastkdpost = [
            $input['luas_tkd'],
            $input['luas_tkd1']
        ];
        $luastkd = implode(" ", $luastkdpost);

        // $penggantipost = [
        //     $input['pengganti'],
        //     $input['pengganti1']
        // ];
        // $pengganti = implode(" ", $penggantipost);

        $insert = array(
            "kecamatan" => $input['kecamatan'],
            "desa" => $input['desa'],
            "kategori" => $input['kategori'],
            "subkategori" => $input['subkategori'],
            "nama_trans" => $input['nama_trans'],
            "jenis_peruntukan" => $input['jenis'],
            "luas_tkd" => $luastkd,
            "tahun_upload" => $input['tahun_upload'],
            // "pengganti" => $input('pengganti', true),
            "keterangan" => $input['keterangan'],
            "ugr" => $input['ugr'],
            // "sisa_ugr" => $input('sisa_ugr', true),
            "petugas" => $input['petugas'],
            "catatan_member" => $input['catatanmember'],
            "keteranganfile" => $input['keteranganfile'],
            "tanggalketeranganfile" => $tanggalketeranganfile,
            "tanggal_revisi" => $input['tanggalrevisi'],
            "tanggal_upload" => $tanggalupload,
            "status_laporan" => $input['status_laporan'],
            "permendagri_id" => $input['permendagri_id'],
            "status_uraian" => $input['statusfile'],
            "read" => $input['read'],
            "tanggal" => $input['tanggal']
        );
        $builder->insert($insert);
    }

    public function uploadfilePengajuanpermendagri($input)
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tanggaluploadpost = [
            $input['tanggalupload1'],
            $input['tanggalupload2'],
            $input['tanggalupload3'],
            $input['tanggalupload4'],
            $input['tanggalupload5'],
            $input['tanggalupload6'],
            $input['tanggalupload7'],
            $input['tanggalupload8'],
            $input['tanggalupload9'],
            $input['tanggalupload10'],
            $input['tanggalupload11'],
            $input['tanggalupload12'],
            $input['tanggalupload13'],
            $input['tanggalupload14'],
            $input['tanggalupload15'],
            $input['tanggalupload16']
        ];
        $tanggalupload = implode("^", $tanggaluploadpost);

        $tanggalketeranganfilepost = [
            $input['tanggalketeranganfile1'],
            $input['tanggalketeranganfile2'],
            $input['tanggalketeranganfile3'],
            $input['tanggalketeranganfile4'],
            $input['tanggalketeranganfile5'],
            $input['tanggalketeranganfile6'],
            $input['tanggalketeranganfile7'],
            $input['tanggalketeranganfile8'],
            $input['tanggalketeranganfile9'],
            $input['tanggalketeranganfile10'],
            $input['tanggalketeranganfile11'],
            $input['tanggalketeranganfile12'],
            $input['tanggalketeranganfile13'],
            $input['tanggalketeranganfile14'],
            $input['tanggalketeranganfile15'],
            $input['tanggalketeranganfile16']
        ];
        $tanggalketeranganfile = implode("^", $tanggalketeranganfilepost);

        $luastkdpost = [
            $input['luas_tkd'],
            $input['luas_tkd1']
        ];
        $luastkd = implode(" ", $luastkdpost);

        $penggantipost = [
            $input['pengganti'],
            $input['pengganti1']
        ];
        $pengganti = implode(" ", $penggantipost);

        $insert = array(
            "kecamatan" => $input['kecamatan'],
            "desa" => $input['desa'],
            "kategori" => $input['kategori'],
            "subkategori" => $input['subkategori'],
            "nama_trans" => $input['nama_trans'],
            // "jenis_peruntukan" => $input['jenis'],
            "luas_tkd" => $luastkd,
            "pengganti" => $pengganti,
            "tahun_upload" => $input['tahun_upload'],
            "keterangan" => $input['keterangan'],
            // "ugr" => $input['ugr'],
            // "sisa_ugr" => $input['sisa_ugr'],
            "petugas" => $input['petugas'],
            "catatan_member" => $input['catatanmember'],
            "keteranganfile" => $input['keteranganfile'],
            "tanggalketeranganfile" => $tanggalketeranganfile,
            "tanggal_revisi" => $input['tanggalrevisi'],
            "tanggal_upload" => $tanggalupload,
            "status_laporan" => $input['status_laporan'],
            "permendagri_id" => $input['permendagri_id'],
            "status_uraian" => $input['statusfile'],
            "read" => $input['read'],
            "tanggal" => $input['tanggal']
        );
        $builder->insert($insert);
    }

    public function uploadfileBukankepentinganumum($input)
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tanggaluploadpost = [
            $input['tanggalupload1'],
            $input['tanggalupload2'],
            $input['tanggalupload3'],
            $input['tanggalupload4'],
            $input['tanggalupload5'],
            $input['tanggalupload6'],
            $input['tanggalupload7'],
            $input['tanggalupload8'],
            $input['tanggalupload9'],
            $input['tanggalupload10'],
            $input['tanggalupload11'],
            $input['tanggalupload12'],
            $input['tanggalupload13'],
            $input['tanggalupload14'],
            $input['tanggalupload15'],
            $input['tanggalupload16']
        ];
        $tanggalupload = implode("^", $tanggaluploadpost);

        $tanggalketeranganfilepost = [
            $input['tanggalketeranganfile1'],
            $input['tanggalketeranganfile2'],
            $input['tanggalketeranganfile3'],
            $input['tanggalketeranganfile4'],
            $input['tanggalketeranganfile5'],
            $input['tanggalketeranganfile6'],
            $input['tanggalketeranganfile7'],
            $input['tanggalketeranganfile8'],
            $input['tanggalketeranganfile9'],
            $input['tanggalketeranganfile10'],
            $input['tanggalketeranganfile11'],
            $input['tanggalketeranganfile12'],
            $input['tanggalketeranganfile13'],
            $input['tanggalketeranganfile14'],
            $input['tanggalketeranganfile15'],
            $input['tanggalketeranganfile16']
        ];
        $tanggalketeranganfile = implode("^", $tanggalketeranganfilepost);

        $luastkdpost = [
            $input['luas_tkd'],
            $input['luas_tkd1']
        ];
        $luastkd = implode(" ", $luastkdpost);

        $penggantipost = [
            $input['pengganti'],
            $input['pengganti1']
        ];
        $pengganti = implode(" ", $penggantipost);

        $insert = array(
            "kecamatan" => $input['kecamatan'],
            "desa" => $input['desa'],
            "kategori" => $input['kategori'],
            "subkategori" => $input['subkategori'],
            "nama_trans" => $input['nama_trans'],
            // "jenis_peruntukan" => $input['jenis'],
            "luas_tkd" => $luastkd,
            "pengganti" => $pengganti,
            "tahun_upload" => $input['tahun_upload'],
            "keterangan" => $input['keterangan'],
            "ugr" => $input['ugr'],
            "sisa_ugr" => $input['sisa_ugr'],
            "petugas" => $input['petugas'],
            "catatan_member" => $input['catatanmember'],
            "keteranganfile" => $input['keteranganfile'],
            "tanggalketeranganfile" => $tanggalketeranganfile,
            "tanggal_revisi" => $input['tanggalrevisi'],
            "tanggal_upload" => $tanggalupload,
            "status_laporan" => $input['status_laporan'],
            "permendagri_id" => $input['permendagri_id'],
            "status_uraian" => $input['statusfile'],
            "read" => $input['read'],
            "tanggal" => $input['tanggal']
        );
        $builder->insert($insert);
    }

    public function uploadFilePdf($file_id, $input, $file)
    {
        $request = \Config\Services::request();
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $data['dokumen'] = $builder->getWhere(['file_id' => $file_id])->getRowArray();

        $nmfile = $file->getRandomName();

        if ($file == $request->getFile('file1')) {
            $old_file = $data['dokumen']['file1'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file1', $nmfile);
        }

        if ($file == $request->getFile('file2')) {
            $old_file = $data['dokumen']['file2'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file2', $nmfile);
        }

        if ($file == $request->getFile('file3')) {
            $old_file = $data['dokumen']['file3'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file3', $nmfile);
        }

        if ($file == $request->getFile('file4')) {
            $old_file = $data['dokumen']['file4'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file4', $nmfile);
        }

        if ($file == $request->getFile('file5')) {
            $old_file = $data['dokumen']['file5'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file5', $nmfile);
        }

        if ($file == $request->getFile('file6')) {
            $old_file = $data['dokumen']['file6'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file6', $nmfile);
        }

        if ($file == $request->getFile('file7')) {
            $old_file = $data['dokumen']['file7'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file7', $nmfile);
        }

        if ($file == $request->getFile('file8')) {
            $old_file = $data['dokumen']['file8'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file8', $nmfile);
        }

        if ($file == $request->getFile('file9')) {
            $old_file = $data['dokumen']['file9'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file9', $nmfile);
        }

        if ($file == $request->getFile('file10')) {
            $old_file = $data['dokumen']['file10'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file10', $nmfile);
        }

        if ($file == $request->getFile('file11')) {
            $old_file = $data['dokumen']['file11'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file11', $nmfile);
        }

        if ($file == $request->getFile('file12')) {
            $old_file = $data['dokumen']['file12'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file12', $nmfile);
        }

        if ($file == $request->getFile('file13')) {
            $old_file = $data['dokumen']['file13'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file13', $nmfile);
        }

        if ($file == $request->getFile('file14')) {
            $old_file = $data['dokumen']['file14'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file14', $nmfile);
        }

        if ($file == $request->getFile('file15')) {
            $old_file = $data['dokumen']['file15'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file15', $nmfile);
        }

        if ($file == $request->getFile('file16')) {
            $old_file = $data['dokumen']['file16'];
            if ($old_file != null) {
                if ($old_file != 'default.pdf') {
                    unlink('data/sitkd/file/laporanpdf/' . $old_file);
                }
            }
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file16', $nmfile);
        }

        $catatanmem = [
            $input['catatan1'],
            $input['catatan2'],
            $input['catatan3'],
            $input['catatan4'],
            $input['catatan5'],
            $input['catatan6'],
            $input['catatan7'],
            $input['catatan8'],
            $input['catatan9'],
            $input['catatan10'],
            $input['catatan11'],
            $input['catatan12'],
            $input['catatan13'],
            $input['catatan14'],
            $input['catatan15'],
            $input['catatan16']
        ];
        $catatan = implode("^", $catatanmem);
        $builder->set('catatan_member', $catatan);

        $tanggaluploadpost = [
            $input['tanggalupload1'],
            $input['tanggalupload2'],
            $input['tanggalupload3'],
            $input['tanggalupload4'],
            $input['tanggalupload5'],
            $input['tanggalupload6'],
            $input['tanggalupload7'],
            $input['tanggalupload8'],
            $input['tanggalupload9'],
            $input['tanggalupload10'],
            $input['tanggalupload11'],
            $input['tanggalupload12'],
            $input['tanggalupload13'],
            $input['tanggalupload14'],
            $input['tanggalupload15'],
            $input['tanggalupload16']
        ];
        $tanggalupload = implode("^", $tanggaluploadpost);
        $builder->set('tanggal_upload', $tanggalupload);

        $keteranganpost = [
            $input['keterangan1'],
            $input['keterangan2'],
            $input['keterangan3'],
            $input['keterangan4'],
            $input['keterangan5'],
            $input['keterangan6'],
            $input['keterangan7'],
            $input['keterangan8'],
            $input['keterangan9'],
            $input['keterangan10'],
            $input['keterangan11'],
            $input['keterangan12'],
            $input['keterangan13'],
            $input['keterangan14'],
            $input['keterangan15'],
            $input['keterangan16']
        ];
        $keterangan = implode("^", $keteranganpost);
        $builder->set('keterangan', $keterangan);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function getUraian($file_id)
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->select('*');
        $builder->join('sitkd_dispermades', 'sitkd_dokumen_laporan.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->where('file_id', $file_id);
        return $builder->get()->getResultArray();
    }

    public function getMyprofile($sessionEmail)
    {
        $builder = $this->db->table('sitkd_user');
        $builder->select('*');
        $builder->join('sitkd_dispermades', 'sitkd_user.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->where('email', $sessionEmail);
        $query = $builder->get();
        return $query->getResult();
    }

    public function revisiFile($file_id, $input, $file)
    {
        $request = \Config\Services::request();
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $data['dokumen'] = $builder->getWhere(['file_id' => $file_id])->getRowArray();

        $nmfile = $file->getRandomName();

        if ($file == $request->getFile('file1')) {
            $old_file = $data['dokumen']['file1'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file1', $nmfile);
        }

        if ($file == $request->getFile('file2')) {
            $old_file = $data['dokumen']['file2'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file2', $nmfile);
        }

        if ($file == $request->getFile('file3')) {
            $old_file = $data['dokumen']['file3'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file3', $nmfile);
        }

        if ($file == $request->getFile('file4')) {
            $old_file = $data['dokumen']['file4'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file4', $nmfile);
        }

        if ($file == $request->getFile('file5')) {
            $old_file = $data['dokumen']['file5'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file5', $nmfile);
        }

        if ($file == $request->getFile('file6')) {
            $old_file = $data['dokumen']['file6'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file6', $nmfile);
        }

        if ($file == $request->getFile('file7')) {
            $old_file = $data['dokumen']['file7'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file7', $nmfile);
        }

        if ($file == $request->getFile('file8')) {
            $old_file = $data['dokumen']['file8'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file8', $nmfile);
        }

        if ($file == $request->getFile('file9')) {
            $old_file = $data['dokumen']['file9'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file9', $nmfile);
        }

        if ($file == $request->getFile('file10')) {
            $old_file = $data['dokumen']['file10'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file10', $nmfile);
        }

        if ($file == $request->getFile('file11')) {
            $old_file = $data['dokumen']['file11'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file11', $nmfile);
        }

        if ($file == $request->getFile('file12')) {
            $old_file = $data['dokumen']['file12'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file12', $nmfile);
        }

        if ($file == $request->getFile('file13')) {
            $old_file = $data['dokumen']['file13'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file13', $nmfile);
        }

        if ($file == $request->getFile('file14')) {
            $old_file = $data['dokumen']['file14'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file14', $nmfile);
        }

        if ($file == $request->getFile('file15')) {
            $old_file = $data['dokumen']['file15'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file15', $nmfile);
        }

        if ($file == $request->getFile('file16')) {
            $old_file = $data['dokumen']['file16'];
            unlink('data/sitkd/file/laporanpdf/' . $old_file);
            $file->move('data/sitkd/file/laporanpdf', $nmfile);
            $builder->set('file16', $nmfile);
        }

        $catatapost = [
            $input['catatan1'],
            $input['catatan2'],
            $input['catatan3'],
            $input['catatan4'],
            $input['catatan5'],
            $input['catatan6'],
            $input['catatan7'],
            $input['catatan8'],
            $input['catatan9'],
            $input['catatan10'],
            $input['catatan11'],
            $input['catatan12'],
            $input['catatan13'],
            $input['catatan14'],
            $input['catatan15'],
            $input['catatan16']
        ];
        $catatan = implode("^", $catatapost);
        $builder->set('catatan_member', $catatan);

        $tanggalrevisipost = [
            $input['tanggal_revisi1'],
            $input['tanggal_revisi2'],
            $input['tanggal_revisi3'],
            $input['tanggal_revisi4'],
            $input['tanggal_revisi5'],
            $input['tanggal_revisi6'],
            $input['tanggal_revisi7'],
            $input['tanggal_revisi8'],
            $input['tanggal_revisi9'],
            $input['tanggal_revisi10'],
            $input['tanggal_revisi11'],
            $input['tanggal_revisi12'],
            $input['tanggal_revisi13'],
            $input['tanggal_revisi14'],
            $input['tanggal_revisi15'],
            $input['tanggal_revisi16']
        ];
        $tanggalrevisi = implode("^", $tanggalrevisipost);
        $builder->set('tanggal_revisi', $tanggalrevisi);

        $statusuraianpost = [
            $input['status_uraian1'],
            $input['status_uraian2'],
            $input['status_uraian3'],
            $input['status_uraian4'],
            $input['status_uraian5'],
            $input['status_uraian6'],
            $input['status_uraian7'],
            $input['status_uraian8'],
            $input['status_uraian9'],
            $input['status_uraian10'],
            $input['status_uraian11'],
            $input['status_uraian12'],
            $input['status_uraian13'],
            $input['status_uraian14'],
            $input['status_uraian15'],
            $input['status_uraian16']
        ];
        $statusuraian = implode("^", $statusuraianpost);
        $builder->set('status_uraian', $statusuraian);

        $keteranganpost = [
            $input['keterangan1'],
            $input['keterangan2'],
            $input['keterangan3'],
            $input['keterangan4'],
            $input['keterangan5'],
            $input['keterangan6'],
            $input['keterangan7'],
            $input['keterangan8'],
            $input['keterangan9'],
            $input['keterangan10'],
            $input['keterangan11'],
            $input['keterangan12'],
            $input['keterangan13'],
            $input['keterangan14'],
            $input['keterangan15'],
            $input['keterangan16']
        ];
        $keterangan = implode("^", $keteranganpost);
        $builder->set('keterangan', $keterangan);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function detailUraian($file_id, $input)
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $keteranganfilepost = [
            $input['keteranganfile1'],
            $input['keteranganfile2'],
            $input['keteranganfile3'],
            $input['keteranganfile4'],
            $input['keteranganfile5'],
            $input['keteranganfile6'],
            $input['keteranganfile7'],
            $input['keteranganfile8'],
            $input['keteranganfile9'],
            $input['keteranganfile10'],
            $input['keteranganfile11'],
            $input['keteranganfile12'],
            $input['keteranganfile13'],
            $input['keteranganfile14'],
            $input['keteranganfile15'],
            $input['keteranganfile16']
        ];
        $keteranganfiles = implode("^", $keteranganfilepost);
        $builder->set('keteranganfile', $keteranganfiles);

        $tanggalketeranganfilepost = [
            $input['tanggalketeranganfile1'],
            $input['tanggalketeranganfile2'],
            $input['tanggalketeranganfile3'],
            $input['tanggalketeranganfile4'],
            $input['tanggalketeranganfile5'],
            $input['tanggalketeranganfile6'],
            $input['tanggalketeranganfile7'],
            $input['tanggalketeranganfile8'],
            $input['tanggalketeranganfile9'],
            $input['tanggalketeranganfile10'],
            $input['tanggalketeranganfile11'],
            $input['tanggalketeranganfile12'],
            $input['tanggalketeranganfile13'],
            $input['tanggalketeranganfile14'],
            $input['tanggalketeranganfile15'],
            $input['tanggalketeranganfile16']
        ];
        $keteranganfiles = implode("^", $tanggalketeranganfilepost);
        $builder->set('tanggalketeranganfile', $keteranganfiles);

        $tanggaluploadpost = [
            $input['keterangan1'],
            $input['keterangan2'],
            $input['keterangan3'],
            $input['keterangan4'],
            $input['keterangan5'],
            $input['keterangan6'],
            $input['keterangan7'],
            $input['keterangan8'],
            $input['keterangan9'],
            $input['keterangan10'],
            $input['keterangan11'],
            $input['keterangan12'],
            $input['keterangan13'],
            $input['keterangan14'],
            $input['keterangan15'],
            $input['keterangan16']
        ];
        $tanggaluploads = implode("^", $tanggaluploadpost);
        $builder->set('keterangan', $tanggaluploads);
        $builder->where('file_id', $file_id);
        $builder->update();
    }

    public function Notifikasi($input)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $insert = array(
            "permendagri_id" => $input['permendagri_id'],
            "file_id" => (!empty($input['file_id'])) ? $input['file_id'] : NULL,
            "target" => $input['targetnotif'],
            "read" => $input['readnotif'],
            "tanggal" => $input['tanggalnotif'],
            "keterangan" => $input['keterangannotif'],
            "jenis" => $input['jenisnotif'],
            "icon" => $input['iconnotif']
        );
        $builder->insert($insert);
    }

    public function editProfile($user_id, $input, $file)
    {
        $builder = $this->db->table('sitkd_user');
        $data['user'] = $builder->getWhere(['user_id' => $user_id])->getRowArray();
        $nama = $input['nama'];
        $hp = $input['hp'];

        if ($file->getError() == 4) {
            $nmfile = $input['imagelama'];
        } else {
            $nmfile = $file->getRandomName();
            $file->move('img/profile', $nmfile);
            if ($input['imagelama'] != 'default.jpg') {
                unlink('img/profile/' . $input['imagelama']);
            }
        }
        $builder->set('image', $nmfile);
        $builder->set('nama', $nama);
        $builder->set('hp', $hp);
        $builder->where('user_id', $user_id);
        $builder->update();
    }
}
