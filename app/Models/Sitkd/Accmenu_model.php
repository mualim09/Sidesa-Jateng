<?php

namespace App\Models\Sitkd;

use CodeIgniter\Model;

class Accmenu_model extends Model
{
    protected $table = 'sitkd_dokumen_laporan';
    protected $primaryKey = 'file_id';
    protected $AllowedFields = ['tahun_upload', 'upload_persetujuan', 'tahun_sukses', 'verifikator', 'penanggungjawab', 'tanggalmulaireview', 'tanggalmulaitinjauan', 'tanggalmulaidiajukan', 'pemeriksa', 'tanggal_clicksukses', 'status_laporan', 'status_uraian', 'keterangan', 'tanggal_review'];

    public function defaultcountData()
    {
        $status = array('review', 'peninjauan', 'diajukan');
        $builder = $this->table('sitkd_dokumen_laporan');
        $builder->select('*');
        $builder->join('sitkd_dispermades', 'sitkd_dokumen_laporan.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->whereIn('status_laporan', $status);
        $builder->orderBy('tanggal', 'DESC');
        return $builder;
    }

    public function defaultcountDatasukses()
    {
        $builder = $this->table('sitkd_dokumen_laporan');
        $builder->select('*');
        $builder->join('sitkd_dispermades', 'sitkd_dokumen_laporan.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->where('status_laporan', 'sukses');
        $builder->orderBy('tanggal', 'DESC');
        return $builder;
    }

    public function countData($cari)
    {
        $status = array('review', 'peninjauan', 'diajukan');
        $builder = $this->table('sitkd_dokumen_laporan');
        $builder->like('nama_trans', $cari);
        $builder->whereIn('status_laporan', $status);
        $builder->orLike('kabupaten', $cari);
        $builder->whereIn('status_laporan', $status);
        $builder->orLike('desa', $cari);
        $builder->whereIn('status_laporan', $status);
        $builder->orLike('luas_tkd', $cari);
        $builder->whereIn('status_laporan', $status);
        $builder->orLike('ugr', $cari);
        $builder->whereIn('status_laporan', $status);
        $builder->orLike('kategori', $cari);
        $builder->whereIn('status_laporan', $status);
        $builder->orLike('tanggal', $cari);
        $builder->whereIn('status_laporan', $status);
        $builder->orLike('status_laporan', $cari);
        $builder->whereIn('status_laporan', $status);
        $builder->join('sitkd_dispermades', 'sitkd_dokumen_laporan.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->orderBy('tanggal', 'DESC');
        return $builder;
    }

    public function countDatasukses($cari)
    {
        $builder = $this->table('sitkd_dokumen_laporan');
        $builder->like('nama_trans', $cari);
        $builder->where('status_laporan', 'sukses');
        $builder->orLike('kabupaten', $cari);
        $builder->where('status_laporan', 'sukses');
        $builder->orLike('desa', $cari);
        $builder->where('status_laporan', 'sukses');
        $builder->orLike('luas_tkd', $cari);
        $builder->where('status_laporan', 'sukses');
        $builder->orLike('ugr', $cari);
        $builder->where('status_laporan', 'sukses');
        $builder->orLike('kategori', $cari);
        $builder->where('status_laporan', 'sukses');
        $builder->orLike('tanggal', $cari);
        $builder->where('status_laporan', 'sukses');
        $builder->join('sitkd_dispermades', 'sitkd_dokumen_laporan.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->orderBy('tanggal', 'DESC');
        return $builder;
    }

    public function getUraian($file_id)
    {
        $builder = $this->table('sitkd_dokumen_laporan');
        $builder->select('*');
        $builder->join('sitkd_dispermades', 'sitkd_dokumen_laporan.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->where('file_id', $file_id);
        $builder->orderBy('tanggal', 'DESC');
        return $builder->get()->getResultArray();
    }

    public function reviewFile($input)
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
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
        $pemeriksapost = [
            $input['pemeriksa1'],
            $input['pemeriksa2'],
            $input['pemeriksa3'],
            $input['pemeriksa4'],
            $input['pemeriksa5'],
            $input['pemeriksa6'],
            $input['pemeriksa7'],
            $input['pemeriksa8'],
            $input['pemeriksa9'],
            $input['pemeriksa10'],
            $input['pemeriksa11'],
            $input['pemeriksa12'],
            $input['pemeriksa13'],
            $input['pemeriksa14'],
            $input['pemeriksa15'],
            $input['pemeriksa16']
        ];
        $pemeriksa = implode("^", $pemeriksapost);
        $builder->set('pemeriksa', $pemeriksa);
        $tanggalreviewpost = [
            $input['tanggal_review1'],
            $input['tanggal_review2'],
            $input['tanggal_review3'],
            $input['tanggal_review4'],
            $input['tanggal_review5'],
            $input['tanggal_review6'],
            $input['tanggal_review7'],
            $input['tanggal_review8'],
            $input['tanggal_review9'],
            $input['tanggal_review10'],
            $input['tanggal_review11'],
            $input['tanggal_review12'],
            $input['tanggal_review13'],
            $input['tanggal_review14'],
            $input['tanggal_review15'],
            $input['tanggal_review16']
        ];
        $tanggalreview = implode("^", $tanggalreviewpost);
        $builder->set('tanggal_review', $tanggalreview);
        $statusuraianpost = [
            $input['statusuraian1'],
            $input['statusuraian2'],
            $input['statusuraian3'],
            $input['statusuraian4'],
            $input['statusuraian5'],
            $input['statusuraian6'],
            $input['statusuraian7'],
            $input['statusuraian8'],
            $input['statusuraian9'],
            $input['statusuraian10'],
            $input['statusuraian11'],
            $input['statusuraian12'],
            $input['statusuraian13'],
            $input['statusuraian14'],
            $input['statusuraian15'],
            $input['statusuraian16']
        ];
        $statusuraian = implode("^", $statusuraianpost);
        $builder->set('status_uraian', $statusuraian);
        $builder->where('file_id', $input['file_id']);
        $builder->update();
    }

    public function Notifikasi($input)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $insert = array(
            "permendagri_id" => $input['permendagri_id'],
            "file_id" => $input['file_id'],
            "target" => $input['targetnotif'],
            "read" => $input['readnotif'],
            "tanggal" => $input['tanggalnotif'],
            "keterangan" => $input['keterangannotif'],
            "jenis" => $input['jenisnotif'],
            "icon" => $input['iconnotif']
        );
        $builder->insert($insert);
    }

    public function uploadPersetujuanPdf($file_id, $input, $file)
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $data['dokumen'] = $builder->getWhere(['file_id' => $file_id])->getRowArray();
        $nmfile = $file->getRandomName();

        $old_file = $data['dokumen']['upload_persetujuan'];
        if ($old_file == null) {
            $file->move('data/sitkd/file/persetujuanpdf', $nmfile);
            $builder->set('upload_persetujuan', $nmfile);
            $builder->where('file_id', $input['file_id']);
            $builder->update();
        } else {
            if ($old_file != 'default.pdf') {
                unlink('data/sitkd/file/persetujuanpdf/' . $old_file);
            }
            $file->move('data/sitkd/file/persetujuanpdf', $nmfile);
            $builder->set('upload_persetujuan', $nmfile);
            $builder->where('file_id', $input['file_id']);
            $builder->update();
        }
    }
}
