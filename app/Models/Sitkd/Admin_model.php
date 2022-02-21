<?php

namespace App\Models\Sitkd;

use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table = 'sitkd_user';
    protected $primaryKey = 'user_id';
    protected $AllowedFields = ['permendagri_id', 'is_active', 'role_id'];

    public function defaultgetRole()
    {
        $builder = $this->table('sitkd_user');
        $builder->select('*');
        $builder->where('nama !=', 'admin aset desa');
        $builder->join('sitkd_dispermades', 'sitkd_user.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->join('sitkd_role', 'sitkd_user.role_id=sitkd_role.id', 'left');
        return $builder;
    }

    public function getRole($cari)
    {
        $builder = $this->table('sitkd_user');
        $builder->select('*');
        $builder->like('nama', $cari, 'both');
        $builder->where('nama !=', 'admin aset desa');
        $builder->orLike('nip', $cari, 'both');
        $builder->where('nama !=', 'admin aset desa');
        $builder->orLike('kabupaten', $cari, 'both');
        $builder->where('nama !=', 'admin aset desa');
        $builder->orLike('role_akses', $cari, 'both');
        $builder->where('nama !=', 'admin aset desa');
        $builder->join('sitkd_dispermades', 'sitkd_user.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->join('sitkd_role', 'sitkd_user.role_id=sitkd_role.id', 'left');
        $builder->orderBy('nama', 'ASC');
        return $builder;
    }

    public function getMember()
    {
        $builder = $this->db->table('sitkd_user');
        $builder->select('*');
        $builder->where('sitkd_user.role_id = 3');
        return $builder->countAllResults();
    }

    public function getDokumen()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        // $tgl = date("Y");
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_upload !=', NULL);
        return $builder->countAllResults();
    }

    public function getDokumenSukses()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        // $tgl = date("Y");
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses !=', NULL);
        return $builder->countAllResults();
    }

    public function getTahunDokumenSukses()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $builder->select('tahun_sukses');
        $builder->distinct();
        $builder->where('tahun_sukses !=', NULL);
        $builder->orderBy('tahun_sukses', 'DESC');
        return $builder->get()->getResultArray();
    }

    public function kategori1()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $kategori = "Kepentingan umum";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.kategori', $kategori);
        return $builder->countAllResults();
    }

    public function kategori2()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $kategori = "PERMENDAGRI No. 4 / 2007";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.kategori', $kategori);
        return $builder->countAllResults();
    }

    public function kategori3()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $kategori = "Bukan kepentingan umum";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.kategori', $kategori);
        return $builder->countAllResults();
    }

    public function jenis1()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Pertahanan Dan Keamanan Nasional";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis2()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Jalan Umum, Jalan Tol, Terowongan, Jalur Kereta Api, Stasiun Kereta Api, Dan Fasilitas Operasi Kereta Api";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis3()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Waduk, Bendungan, Bendung, Irigasi, Saluran Air Minum, Saluran Pembuangan Air dan Sanitasi, Dan Bangunan Pengairan Lainnya";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis4()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Pelabuhan, Bandar Udara, Dan Terminal";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis5()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Infrastruktur Minyak, Gas, Dan Panas Bumi";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis6()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Pembangkit, Transmisi, Gardu, Jaringan, Dan Distribusi Tenaga Listrik";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis7()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Jaringan Telekomunikasi Dan Informatika Pemerintah";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis8()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Tempat Pembuangan Dan Pengolahan Sampah";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis9()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Rumah Sakit Pemerintah / Pemerintah Daerah";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis10()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Fasilitas Keselamatan Umum";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis11()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Tempat Pemakaman Umum Pemerintah / Pemerintah Daerah";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis12()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Fasilitas Sosial, Fasilitas Umum, Dan Ruang Terbuka Hijau Publik";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis13()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Cagar Alam Dan Cagar Budaya";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis14()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Kantor Pemerintah / Pemerintah Daerah / Desa";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis15()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Penataan Pemukiman Kumuh Perkotaan Dan / Atau Konsolidasi Tanah, Serta Perumahan Untuk Masyarakat Berpenghasilan Rendah Dengan Status Sewa";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis16()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Prasarana Pendidikan Atau Sekolah Pemerintah / Pemerintah Daerah";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis17()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Prasarana Olah Raga Pemerintah / Pemerintah Daerah";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }

    public function jenis18()
    {
        $builder = $this->db->table('sitkd_dokumen_laporan');
        $tgl = date("Y");
        $jenis = "Pasar Umum Dan Lapangan Parkir Umum";
        $builder->select('*');
        $builder->where('sitkd_dokumen_laporan.tahun_sukses', $tgl);
        $builder->where('sitkd_dokumen_laporan.jenis_peruntukan', $jenis);
        return $builder->countAllResults();
    }
}
