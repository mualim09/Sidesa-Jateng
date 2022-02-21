<?php

namespace App\Models\Sitkd;

use CodeIgniter\Model;

class Excel_model extends Model
{
    protected $table = 'sitkd_dokumen_laporan';
    protected $primaryKey = 'file_id';
    protected $AllowedFields = ['tahun_upload', 'upload_persetujuan', 'tahun_sukses', 'verifikator', 'penanggungjawab', 'tanggalmulaireview', 'tanggalmulaitinjauan', 'tanggalmulaidiajukan', 'pemeriksa', 'tanggal_clicksukses', 'status_laporan', 'status_uraian', 'keterangan', 'tanggal_review'];

    public function getDokumenSukses()
    {
        $tgl = date('Y');
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->join('sitkd_dispermades', 'sitkd_dokumen_laporan.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        // $builder->where('sitkd_dokumen_laporan.tahun_sukses !=', NULL);
        $builder->orderBy('tanggal_clicksukses', 'ASC');
        return $builder->get()->getResult();
    }

    public function getDokumenSuksesAdmin($tahun) // pakai ini kalo SITKD dijadikan proyek ke CI4
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->join('sitkd_dispermades', 'sitkd_dokumen_laporan.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tahun);
        $builder->orderBy('tanggal_clicksukses', 'ASC');
        return $builder->get()->getResult();
    }
}
