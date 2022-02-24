<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class User_admin5a_model extends Model
{
    protected $table = 'danadesa_anggaran';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['danadesa', 'bantuan_per_kpm', 'tahun', 'created'];

    public function danadesa_anggaran()
    {
        $builder = $this->db->table('danadesa_anggaran');
        $builder->select('kabupaten, danadesa, bantuan_per_kpm, created');
        $builder->where('tahun', date('Y'));
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function salur_reguler($kd_wilayah)
    {
        $builder = $this->db->table('danadesa_reguler');
        $builder->select('kabupaten, persentase, salur_januari, salur_februari, salur_maret, salur_april, salur_mei, salur_juni, salur_juli, salur_agustus, salur_september, salur_oktober, salur_november, salur_desember, tahun, created, salur_created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $kd_wilayah);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function salur_bltdd($kd_wilayah)
    {
        $builder = $this->db->table('danadesa_bltdd');
        $builder->select('kabupaten, persentase, salur_januari, salur_februari, salur_maret, salur_april, salur_mei, salur_juni, salur_juli, salur_agustus, salur_september, salur_oktober, salur_november, salur_desember, tahun, created, salur_created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $kd_wilayah);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function salur_kph($kd_wilayah)
    {
        $builder = $this->db->table('danadesa_kph');
        $builder->select('kabupaten, persentase, salur_januari, salur_februari, salur_maret, salur_april, salur_mei, salur_juni, salur_juli, salur_agustus, salur_september, salur_oktober, salur_november, salur_desember, tahun, created, salur_created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $kd_wilayah);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function salur_covid($kd_wilayah)
    {
        $builder = $this->db->table('danadesa_covid');
        $builder->select('kabupaten, persentase, salur_januari, salur_februari, salur_maret, salur_april, salur_mei, salur_juni, salur_juli, salur_agustus, salur_september, salur_oktober, salur_november, salur_desember, tahun, created, salur_created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $kd_wilayah);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function danadesa_reguler()
    {
        $builder = $this->db->table('danadesa_reguler');
        $builder->select('kabupaten, persentase, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, tahun, created');
        $builder->where('tahun', date('Y'));
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function danadesa_bltdd()
    {
        $builder = $this->db->table('danadesa_bltdd');
        $builder->select('kabupaten, persentase, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, tahun, created');
        $builder->where('tahun', date('Y'));
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function danadesa_kph()
    {
        $builder = $this->db->table('danadesa_kph');
        $builder->select('kabupaten, persentase, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, tahun, created');
        $builder->where('tahun', date('Y'));
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function danadesa_covid()
    {
        $builder = $this->db->table('danadesa_covid');
        $builder->select('kabupaten, persentase, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, tahun, created');
        $builder->where('tahun', date('Y'));
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function insertakses($input)
    {
        $builder = $this->db->table('danadesa_anggaran');
        $insert1 = array(
            "kd_wilayah" => "33.01",
            "kabupaten" => "Cilacap",
            "danadesa" => str_replace(".", "", $input['danadesa1']),
            "tahun" => date("Y")
        );
        $insert2 = array(
            "kd_wilayah" => "33.02",
            "kabupaten" => "Banyumas",
            "danadesa" => str_replace(".", "", $input['danadesa2']),
            "tahun" => date("Y")
        );
        $insert3 = array(
            "kd_wilayah" => "33.03",
            "kabupaten" => "Purbalingga",
            "danadesa" => str_replace(".", "", $input['danadesa3']),
            "tahun" => date("Y")
        );
        $insert4 = array(
            "kd_wilayah" => "33.04",
            "kabupaten" => "Banjarnegara",
            "danadesa" => str_replace(".", "", $input['danadesa4']),
            "tahun" => date("Y")
        );
        $insert5 = array(
            "kd_wilayah" => "33.05",
            "kabupaten" => "Kebumen",
            "danadesa" => str_replace(".", "", $input['danadesa5']),
            "tahun" => date("Y")
        );
        $insert6 = array(
            "kd_wilayah" => "33.06",
            "kabupaten" => "Purworejo",
            "danadesa" => str_replace(".", "", $input['danadesa6']),
            "tahun" => date("Y")
        );
        $insert7 = array(
            "kd_wilayah" => "33.07",
            "kabupaten" => "Wonosobo",
            "danadesa" => str_replace(".", "", $input['danadesa7']),
            "tahun" => date("Y")
        );
        $insert8 = array(
            "kd_wilayah" => "33.08",
            "kabupaten" => "Magelang",
            "danadesa" => str_replace(".", "", $input['danadesa8']),
            "tahun" => date("Y")
        );
        $insert9 = array(
            "kd_wilayah" => "33.09",
            "kabupaten" => "Boyolali",
            "danadesa" => str_replace(".", "", $input['danadesa9']),
            "tahun" => date("Y")
        );
        $insert10 = array(
            "kd_wilayah" => "33.10",
            "kabupaten" => "Klaten",
            "danadesa" => str_replace(".", "", $input['danadesa10']),
            "tahun" => date("Y")
        );
        $insert11 = array(
            "kd_wilayah" => "33.11",
            "kabupaten" => "Sukoharjo",
            "danadesa" => str_replace(".", "", $input['danadesa11']),
            "tahun" => date("Y")
        );
        $insert12 = array(
            "kd_wilayah" => "33.12",
            "kabupaten" => "Wonogiri",
            "danadesa" => str_replace(".", "", $input['danadesa12']),
            "tahun" => date("Y")
        );
        $insert13 = array(
            "kd_wilayah" => "33.13",
            "kabupaten" => "Karanganyar",
            "danadesa" => str_replace(".", "", $input['danadesa13']),
            "tahun" => date("Y")
        );
        $insert14 = array(
            "kd_wilayah" => "33.14",
            "kabupaten" => "Sragen",
            "danadesa" => str_replace(".", "", $input['danadesa14']),
            "tahun" => date("Y")
        );
        $insert15 = array(
            "kd_wilayah" => "33.15",
            "kabupaten" => "Grobogan",
            "danadesa" => str_replace(".", "", $input['danadesa15']),
            "tahun" => date("Y")
        );
        $insert16 = array(
            "kd_wilayah" => "33.16",
            "kabupaten" => "Blora",
            "danadesa" => str_replace(".", "", $input['danadesa16']),
            "tahun" => date("Y")
        );
        $insert17 = array(
            "kd_wilayah" => "33.17",
            "kabupaten" => "Rembang",
            "danadesa" => str_replace(".", "", $input['danadesa17']),
            "tahun" => date("Y")
        );
        $insert18 = array(
            "kd_wilayah" => "33.18",
            "kabupaten" => "Pati",
            "danadesa" => str_replace(".", "", $input['danadesa18']),
            "tahun" => date("Y")
        );
        $insert19 = array(
            "kd_wilayah" => "33.19",
            "kabupaten" => "Kudus",
            "danadesa" => str_replace(".", "", $input['danadesa19']),
            "tahun" => date("Y")
        );
        $insert20 = array(
            "kd_wilayah" => "33.20",
            "kabupaten" => "Jepara",
            "danadesa" => str_replace(".", "", $input['danadesa20']),
            "tahun" => date("Y")
        );
        $insert21 = array(
            "kd_wilayah" => "33.21",
            "kabupaten" => "Demak",
            "danadesa" => str_replace(".", "", $input['danadesa21']),
            "tahun" => date("Y")
        );
        $insert22 = array(
            "kd_wilayah" => "33.22",
            "kabupaten" => "Semarang",
            "danadesa" => str_replace(".", "", $input['danadesa22']),
            "tahun" => date("Y")
        );
        $insert23 = array(
            "kd_wilayah" => "33.23",
            "kabupaten" => "Temanggung",
            "danadesa" => str_replace(".", "", $input['danadesa23']),
            "tahun" => date("Y")
        );
        $insert24 = array(
            "kd_wilayah" => "33.24",
            "kabupaten" => "Kendal",
            "danadesa" => str_replace(".", "", $input['danadesa24']),
            "tahun" => date("Y")
        );
        $insert25 = array(
            "kd_wilayah" => "33.25",
            "kabupaten" => "Batang",
            "danadesa" => str_replace(".", "", $input['danadesa25']),
            "tahun" => date("Y")
        );
        $insert26 = array(
            "kd_wilayah" => "33.26",
            "kabupaten" => "Pekalongan",
            "danadesa" => str_replace(".", "", $input['danadesa26']),
            "tahun" => date("Y")
        );
        $insert27 = array(
            "kd_wilayah" => "33.27",
            "kabupaten" => "Pemalang",
            "danadesa" => str_replace(".", "", $input['danadesa27']),
            "tahun" => date("Y")
        );
        $insert28 = array(
            "kd_wilayah" => "33.28",
            "kabupaten" => "Tegal",
            "danadesa" => str_replace(".", "", $input['danadesa28']),
            "tahun" => date("Y")
        );
        $insert29 = array(
            "kd_wilayah" => "33.29",
            "kabupaten" => "Brebes",
            "danadesa" => str_replace(".", "", $input['danadesa29']),
            "tahun" => date("Y")
        );

        $builder->insert($insert1);
        $builder->insert($insert2);
        $builder->insert($insert3);
        $builder->insert($insert4);
        $builder->insert($insert5);
        $builder->insert($insert6);
        $builder->insert($insert7);
        $builder->insert($insert8);
        $builder->insert($insert9);
        $builder->insert($insert10);
        $builder->insert($insert11);
        $builder->insert($insert12);
        $builder->insert($insert13);
        $builder->insert($insert14);
        $builder->insert($insert15);
        $builder->insert($insert16);
        $builder->insert($insert17);
        $builder->insert($insert18);
        $builder->insert($insert19);
        $builder->insert($insert20);
        $builder->insert($insert21);
        $builder->insert($insert22);
        $builder->insert($insert23);
        $builder->insert($insert24);
        $builder->insert($insert25);
        $builder->insert($insert26);
        $builder->insert($insert27);
        $builder->insert($insert28);
        $builder->insert($insert29);
    }

    public function updateakses($input)
    {
        $cilacap = $this->db->table('danadesa_anggaran');
        $cilacap->set('danadesa', str_replace(".", "", $input['danadesa1']));
        $cilacap->where('kd_wilayah', "33.01");
        $cilacap->where('tahun', date("Y"));
        $cilacap->update();

        $banyumas = $this->db->table('danadesa_anggaran');
        $banyumas->set('danadesa', str_replace(".", "", $input['danadesa2']));
        $banyumas->where('kd_wilayah', "33.02");
        $banyumas->where('tahun', date("Y"));
        $banyumas->update();

        $purbalingga = $this->db->table('danadesa_anggaran');
        $purbalingga->set('danadesa', str_replace(".", "", $input['danadesa3']));
        $purbalingga->where('kd_wilayah', "33.03");
        $purbalingga->where('tahun', date("Y"));
        $purbalingga->update();

        $banjarnegara = $this->db->table('danadesa_anggaran');
        $banjarnegara->set('danadesa', str_replace(".", "", $input['danadesa4']));
        $banjarnegara->where('kd_wilayah', "33.04");
        $banjarnegara->where('tahun', date("Y"));
        $banjarnegara->update();

        $kebumen = $this->db->table('danadesa_anggaran');
        $kebumen->set('danadesa', str_replace(".", "", $input['danadesa5']));
        $kebumen->where('kd_wilayah', "33.05");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $kebumen = $this->db->table('danadesa_anggaran');
        $kebumen->set('danadesa', str_replace(".", "", $input['danadesa6']));
        $kebumen->where('kd_wilayah', "33.06");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $wonosobo = $this->db->table('danadesa_anggaran');
        $wonosobo->set('danadesa', str_replace(".", "", $input['danadesa7']));
        $wonosobo->where('kd_wilayah', "33.07");
        $wonosobo->where('tahun', date("Y"));
        $wonosobo->update();

        $magelang = $this->db->table('danadesa_anggaran');
        $magelang->set('danadesa', str_replace(".", "", $input['danadesa8']));
        $magelang->where('kd_wilayah', "33.08");
        $magelang->where('tahun', date("Y"));
        $magelang->update();

        $boyolali = $this->db->table('danadesa_anggaran');
        $boyolali->set('danadesa', str_replace(".", "", $input['danadesa9']));
        $boyolali->where('kd_wilayah', "33.09");
        $boyolali->where('tahun', date("Y"));
        $boyolali->update();

        $klaten = $this->db->table('danadesa_anggaran');
        $klaten->set('danadesa', str_replace(".", "", $input['danadesa10']));
        $klaten->where('kd_wilayah', "33.10");
        $klaten->where('tahun', date("Y"));
        $klaten->update();

        $sukoharjo = $this->db->table('danadesa_anggaran');
        $sukoharjo->set('danadesa', str_replace(".", "", $input['danadesa11']));
        $sukoharjo->where('kd_wilayah', "33.11");
        $sukoharjo->where('tahun', date("Y"));
        $sukoharjo->update();

        $wonogiri = $this->db->table('danadesa_anggaran');
        $wonogiri->set('danadesa', str_replace(".", "", $input['danadesa12']));
        $wonogiri->where('kd_wilayah', "33.12");
        $wonogiri->where('tahun', date("Y"));
        $wonogiri->update();

        $karanganyar = $this->db->table('danadesa_anggaran');
        $karanganyar->set('danadesa', str_replace(".", "", $input['danadesa13']));
        $karanganyar->where('kd_wilayah', "33.13");
        $karanganyar->where('tahun', date("Y"));
        $karanganyar->update();

        $sragen = $this->db->table('danadesa_anggaran');
        $sragen->set('danadesa', str_replace(".", "", $input['danadesa14']));
        $sragen->where('kd_wilayah', "33.14");
        $sragen->where('tahun', date("Y"));
        $sragen->update();

        $grobogan = $this->db->table('danadesa_anggaran');
        $grobogan->set('danadesa', str_replace(".", "", $input['danadesa15']));
        $grobogan->where('kd_wilayah', "33.15");
        $grobogan->where('tahun', date("Y"));
        $grobogan->update();

        $blora = $this->db->table('danadesa_anggaran');
        $blora->set('danadesa', str_replace(".", "", $input['danadesa16']));
        $blora->where('kd_wilayah', "33.16");
        $blora->where('tahun', date("Y"));
        $blora->update();

        $rembang = $this->db->table('danadesa_anggaran');
        $rembang->set('danadesa', str_replace(".", "", $input['danadesa17']));
        $rembang->where('kd_wilayah', "33.17");
        $rembang->where('tahun', date("Y"));
        $rembang->update();

        $pati = $this->db->table('danadesa_anggaran');
        $pati->set('danadesa', str_replace(".", "", $input['danadesa18']));
        $pati->where('kd_wilayah', "33.18");
        $pati->where('tahun', date("Y"));
        $pati->update();

        $kudus = $this->db->table('danadesa_anggaran');
        $kudus->set('danadesa', str_replace(".", "", $input['danadesa19']));
        $kudus->where('kd_wilayah', "33.19");
        $kudus->where('tahun', date("Y"));
        $kudus->update();

        $jepara = $this->db->table('danadesa_anggaran');
        $jepara->set('danadesa', str_replace(".", "", $input['danadesa20']));
        $jepara->where('kd_wilayah', "33.20");
        $jepara->where('tahun', date("Y"));
        $jepara->update();

        $demak = $this->db->table('danadesa_anggaran');
        $demak->set('danadesa', str_replace(".", "", $input['danadesa21']));
        $demak->where('kd_wilayah', "33.21");
        $demak->where('tahun', date("Y"));
        $demak->update();

        $semarang = $this->db->table('danadesa_anggaran');
        $semarang->set('danadesa', str_replace(".", "", $input['danadesa22']));
        $semarang->where('kd_wilayah', "33.22");
        $semarang->where('tahun', date("Y"));
        $semarang->update();

        $temanggung = $this->db->table('danadesa_anggaran');
        $temanggung->set('danadesa', str_replace(".", "", $input['danadesa23']));
        $temanggung->where('kd_wilayah', "33.23");
        $temanggung->where('tahun', date("Y"));
        $temanggung->update();

        $kendal = $this->db->table('danadesa_anggaran');
        $kendal->set('danadesa', str_replace(".", "", $input['danadesa24']));
        $kendal->where('kd_wilayah', "33.24");
        $kendal->where('tahun', date("Y"));
        $kendal->update();

        $batang = $this->db->table('danadesa_anggaran');
        $batang->set('danadesa', str_replace(".", "", $input['danadesa25']));
        $batang->where('kd_wilayah', "33.25");
        $batang->where('tahun', date("Y"));
        $batang->update();

        $pekalongan = $this->db->table('danadesa_anggaran');
        $pekalongan->set('danadesa', str_replace(".", "", $input['danadesa26']));
        $pekalongan->where('kd_wilayah', "33.26");
        $pekalongan->where('tahun', date("Y"));
        $pekalongan->update();

        $pemalang = $this->db->table('danadesa_anggaran');
        $pemalang->set('danadesa', str_replace(".", "", $input['danadesa27']));
        $pemalang->where('kd_wilayah', "33.27");
        $pemalang->where('tahun', date("Y"));
        $pemalang->update();

        $tegal = $this->db->table('danadesa_anggaran');
        $tegal->set('danadesa', str_replace(".", "", $input['danadesa28']));
        $tegal->where('kd_wilayah', "33.28");
        $tegal->where('tahun', date("Y"));
        $tegal->update();

        $brebes = $this->db->table('danadesa_anggaran');
        $brebes->set('danadesa', str_replace(".", "", $input['danadesa29']));
        $brebes->where('kd_wilayah', "33.29");
        $brebes->where('tahun', date("Y"));
        $brebes->update();
    }

    public function insertaksesPersentase($input)
    {
        $cilacap = $this->db->table('danadesa_anggaran');
        $cilacap->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $cilacap->where('kd_wilayah', "33.01");
        $cilacap->where('tahun', date("Y"));
        $cilacap->update();

        $banyumas = $this->db->table('danadesa_anggaran');
        $banyumas->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $banyumas->where('kd_wilayah', "33.02");
        $banyumas->where('tahun', date("Y"));
        $banyumas->update();

        $purbalingga = $this->db->table('danadesa_anggaran');
        $purbalingga->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $purbalingga->where('kd_wilayah', "33.03");
        $purbalingga->where('tahun', date("Y"));
        $purbalingga->update();

        $banjarnegara = $this->db->table('danadesa_anggaran');
        $banjarnegara->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $banjarnegara->where('kd_wilayah', "33.04");
        $banjarnegara->where('tahun', date("Y"));
        $banjarnegara->update();

        $kebumen = $this->db->table('danadesa_anggaran');
        $kebumen->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $kebumen->where('kd_wilayah', "33.05");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $kebumen = $this->db->table('danadesa_anggaran');
        $kebumen->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $kebumen->where('kd_wilayah', "33.06");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $wonosobo = $this->db->table('danadesa_anggaran');
        $wonosobo->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $wonosobo->where('kd_wilayah', "33.07");
        $wonosobo->where('tahun', date("Y"));
        $wonosobo->update();

        $magelang = $this->db->table('danadesa_anggaran');
        $magelang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $magelang->where('kd_wilayah', "33.08");
        $magelang->where('tahun', date("Y"));
        $magelang->update();

        $boyolali = $this->db->table('danadesa_anggaran');
        $boyolali->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $boyolali->where('kd_wilayah', "33.09");
        $boyolali->where('tahun', date("Y"));
        $boyolali->update();

        $klaten = $this->db->table('danadesa_anggaran');
        $klaten->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $klaten->where('kd_wilayah', "33.10");
        $klaten->where('tahun', date("Y"));
        $klaten->update();

        $sukoharjo = $this->db->table('danadesa_anggaran');
        $sukoharjo->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $sukoharjo->where('kd_wilayah', "33.11");
        $sukoharjo->where('tahun', date("Y"));
        $sukoharjo->update();

        $wonogiri = $this->db->table('danadesa_anggaran');
        $wonogiri->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $wonogiri->where('kd_wilayah', "33.12");
        $wonogiri->where('tahun', date("Y"));
        $wonogiri->update();

        $karanganyar = $this->db->table('danadesa_anggaran');
        $karanganyar->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $karanganyar->where('kd_wilayah', "33.13");
        $karanganyar->where('tahun', date("Y"));
        $karanganyar->update();

        $sragen = $this->db->table('danadesa_anggaran');
        $sragen->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $sragen->where('kd_wilayah', "33.14");
        $sragen->where('tahun', date("Y"));
        $sragen->update();

        $grobogan = $this->db->table('danadesa_anggaran');
        $grobogan->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $grobogan->where('kd_wilayah', "33.15");
        $grobogan->where('tahun', date("Y"));
        $grobogan->update();

        $blora = $this->db->table('danadesa_anggaran');
        $blora->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $blora->where('kd_wilayah', "33.16");
        $blora->where('tahun', date("Y"));
        $blora->update();

        $rembang = $this->db->table('danadesa_anggaran');
        $rembang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $rembang->where('kd_wilayah', "33.17");
        $rembang->where('tahun', date("Y"));
        $rembang->update();

        $pati = $this->db->table('danadesa_anggaran');
        $pati->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $pati->where('kd_wilayah', "33.18");
        $pati->where('tahun', date("Y"));
        $pati->update();

        $kudus = $this->db->table('danadesa_anggaran');
        $kudus->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $kudus->where('kd_wilayah', "33.19");
        $kudus->where('tahun', date("Y"));
        $kudus->update();

        $jepara = $this->db->table('danadesa_anggaran');
        $jepara->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $jepara->where('kd_wilayah', "33.20");
        $jepara->where('tahun', date("Y"));
        $jepara->update();

        $demak = $this->db->table('danadesa_anggaran');
        $demak->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $demak->where('kd_wilayah', "33.21");
        $demak->where('tahun', date("Y"));
        $demak->update();

        $semarang = $this->db->table('danadesa_anggaran');
        $semarang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $semarang->where('kd_wilayah', "33.22");
        $semarang->where('tahun', date("Y"));
        $semarang->update();

        $temanggung = $this->db->table('danadesa_anggaran');
        $temanggung->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $temanggung->where('kd_wilayah', "33.23");
        $temanggung->where('tahun', date("Y"));
        $temanggung->update();

        $kendal = $this->db->table('danadesa_anggaran');
        $kendal->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $kendal->where('kd_wilayah', "33.24");
        $kendal->where('tahun', date("Y"));
        $kendal->update();

        $batang = $this->db->table('danadesa_anggaran');
        $batang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $batang->where('kd_wilayah', "33.25");
        $batang->where('tahun', date("Y"));
        $batang->update();

        $pekalongan = $this->db->table('danadesa_anggaran');
        $pekalongan->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $pekalongan->where('kd_wilayah', "33.26");
        $pekalongan->where('tahun', date("Y"));
        $pekalongan->update();

        $pemalang = $this->db->table('danadesa_anggaran');
        $pemalang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $pemalang->where('kd_wilayah', "33.27");
        $pemalang->where('tahun', date("Y"));
        $pemalang->update();

        $tegal = $this->db->table('danadesa_anggaran');
        $tegal->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $tegal->where('kd_wilayah', "33.28");
        $tegal->where('tahun', date("Y"));
        $tegal->update();

        $brebes = $this->db->table('danadesa_anggaran');
        $brebes->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $brebes->where('kd_wilayah', "33.29");
        $brebes->where('tahun', date("Y"));
        $brebes->update();

        $reguler = $this->db->table('danadesa_reguler');
        $bltdd = $this->db->table('danadesa_bltdd');
        $kph = $this->db->table('danadesa_kph');
        $covid = $this->db->table('danadesa_covid');

        $reguler1 = array(
            "kd_wilayah" => "33.01",
            "kabupaten" => "Cilacap",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler2 = array(
            "kd_wilayah" => "33.02",
            "kabupaten" => "Banyumas",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler3 = array(
            "kd_wilayah" => "33.03",
            "kabupaten" => "Purbalingga",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler4 = array(
            "kd_wilayah" => "33.04",
            "kabupaten" => "Banjarnegara",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler5 = array(
            "kd_wilayah" => "33.05",
            "kabupaten" => "Kebumen",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler6 = array(
            "kd_wilayah" => "33.06",
            "kabupaten" => "Purworejo",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler7 = array(
            "kd_wilayah" => "33.07",
            "kabupaten" => "Wonosobo",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler8 = array(
            "kd_wilayah" => "33.08",
            "kabupaten" => "Magelang",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler9 = array(
            "kd_wilayah" => "33.09",
            "kabupaten" => "Boyolali",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler10 = array(
            "kd_wilayah" => "33.10",
            "kabupaten" => "Klaten",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler11 = array(
            "kd_wilayah" => "33.11",
            "kabupaten" => "Sukoharjo",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler12 = array(
            "kd_wilayah" => "33.12",
            "kabupaten" => "Wonogiri",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler13 = array(
            "kd_wilayah" => "33.13",
            "kabupaten" => "Karanganyar",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler14 = array(
            "kd_wilayah" => "33.14",
            "kabupaten" => "Sragen",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler15 = array(
            "kd_wilayah" => "33.15",
            "kabupaten" => "Grobogan",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler16 = array(
            "kd_wilayah" => "33.16",
            "kabupaten" => "Blora",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler17 = array(
            "kd_wilayah" => "33.17",
            "kabupaten" => "Rembang",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler18 = array(
            "kd_wilayah" => "33.18",
            "kabupaten" => "Pati",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler19 = array(
            "kd_wilayah" => "33.19",
            "kabupaten" => "Kudus",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler20 = array(
            "kd_wilayah" => "33.20",
            "kabupaten" => "Jepara",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler21 = array(
            "kd_wilayah" => "33.21",
            "kabupaten" => "Demak",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler22 = array(
            "kd_wilayah" => "33.22",
            "kabupaten" => "Semarang",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler23 = array(
            "kd_wilayah" => "33.23",
            "kabupaten" => "Temanggung",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler24 = array(
            "kd_wilayah" => "33.24",
            "kabupaten" => "Kendal",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler25 = array(
            "kd_wilayah" => "33.25",
            "kabupaten" => "Batang",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler26 = array(
            "kd_wilayah" => "33.26",
            "kabupaten" => "Pekalongan",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler27 = array(
            "kd_wilayah" => "33.27",
            "kabupaten" => "Pemalang",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler28 = array(
            "kd_wilayah" => "33.28",
            "kabupaten" => "Tegal",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );
        $reguler29 = array(
            "kd_wilayah" => "33.29",
            "kabupaten" => "Brebes",
            "persentase" => str_replace(".", "", $input['reguler']),
            "tahun" => date("Y")
        );

        $bltdd1 = array(
            "kd_wilayah" => "33.01",
            "kabupaten" => "Cilacap",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd2 = array(
            "kd_wilayah" => "33.02",
            "kabupaten" => "Banyumas",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd3 = array(
            "kd_wilayah" => "33.03",
            "kabupaten" => "Purbalingga",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd4 = array(
            "kd_wilayah" => "33.04",
            "kabupaten" => "Banjarnegara",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd5 = array(
            "kd_wilayah" => "33.05",
            "kabupaten" => "Kebumen",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd6 = array(
            "kd_wilayah" => "33.06",
            "kabupaten" => "Purworejo",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd7 = array(
            "kd_wilayah" => "33.07",
            "kabupaten" => "Wonosobo",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd8 = array(
            "kd_wilayah" => "33.08",
            "kabupaten" => "Magelang",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd9 = array(
            "kd_wilayah" => "33.09",
            "kabupaten" => "Boyolali",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd10 = array(
            "kd_wilayah" => "33.10",
            "kabupaten" => "Klaten",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd11 = array(
            "kd_wilayah" => "33.11",
            "kabupaten" => "Sukoharjo",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd12 = array(
            "kd_wilayah" => "33.12",
            "kabupaten" => "Wonogiri",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd13 = array(
            "kd_wilayah" => "33.13",
            "kabupaten" => "Karanganyar",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd14 = array(
            "kd_wilayah" => "33.14",
            "kabupaten" => "Sragen",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd15 = array(
            "kd_wilayah" => "33.15",
            "kabupaten" => "Grobogan",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd16 = array(
            "kd_wilayah" => "33.16",
            "kabupaten" => "Blora",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd17 = array(
            "kd_wilayah" => "33.17",
            "kabupaten" => "Rembang",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd18 = array(
            "kd_wilayah" => "33.18",
            "kabupaten" => "Pati",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd19 = array(
            "kd_wilayah" => "33.19",
            "kabupaten" => "Kudus",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd20 = array(
            "kd_wilayah" => "33.20",
            "kabupaten" => "Jepara",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd21 = array(
            "kd_wilayah" => "33.21",
            "kabupaten" => "Demak",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd22 = array(
            "kd_wilayah" => "33.22",
            "kabupaten" => "Semarang",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd23 = array(
            "kd_wilayah" => "33.23",
            "kabupaten" => "Temanggung",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd24 = array(
            "kd_wilayah" => "33.24",
            "kabupaten" => "Kendal",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd25 = array(
            "kd_wilayah" => "33.25",
            "kabupaten" => "Batang",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd26 = array(
            "kd_wilayah" => "33.26",
            "kabupaten" => "Pekalongan",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd27 = array(
            "kd_wilayah" => "33.27",
            "kabupaten" => "Pemalang",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd28 = array(
            "kd_wilayah" => "33.28",
            "kabupaten" => "Tegal",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );
        $bltdd29 = array(
            "kd_wilayah" => "33.29",
            "kabupaten" => "Brebes",
            "persentase" => str_replace(".", "", $input['bltdd']),
            "tahun" => date("Y")
        );

        $kph1 = array(
            "kd_wilayah" => "33.01",
            "kabupaten" => "Cilacap",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph2 = array(
            "kd_wilayah" => "33.02",
            "kabupaten" => "Banyumas",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph3 = array(
            "kd_wilayah" => "33.03",
            "kabupaten" => "Purbalingga",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph4 = array(
            "kd_wilayah" => "33.04",
            "kabupaten" => "Banjarnegara",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph5 = array(
            "kd_wilayah" => "33.05",
            "kabupaten" => "Kebumen",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph6 = array(
            "kd_wilayah" => "33.06",
            "kabupaten" => "Purworejo",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph7 = array(
            "kd_wilayah" => "33.07",
            "kabupaten" => "Wonosobo",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph8 = array(
            "kd_wilayah" => "33.08",
            "kabupaten" => "Magelang",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph9 = array(
            "kd_wilayah" => "33.09",
            "kabupaten" => "Boyolali",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph10 = array(
            "kd_wilayah" => "33.10",
            "kabupaten" => "Klaten",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph11 = array(
            "kd_wilayah" => "33.11",
            "kabupaten" => "Sukoharjo",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph12 = array(
            "kd_wilayah" => "33.12",
            "kabupaten" => "Wonogiri",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph13 = array(
            "kd_wilayah" => "33.13",
            "kabupaten" => "Karanganyar",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph14 = array(
            "kd_wilayah" => "33.14",
            "kabupaten" => "Sragen",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph15 = array(
            "kd_wilayah" => "33.15",
            "kabupaten" => "Grobogan",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph16 = array(
            "kd_wilayah" => "33.16",
            "kabupaten" => "Blora",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph17 = array(
            "kd_wilayah" => "33.17",
            "kabupaten" => "Rembang",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph18 = array(
            "kd_wilayah" => "33.18",
            "kabupaten" => "Pati",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph19 = array(
            "kd_wilayah" => "33.19",
            "kabupaten" => "Kudus",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph20 = array(
            "kd_wilayah" => "33.20",
            "kabupaten" => "Jepara",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph21 = array(
            "kd_wilayah" => "33.21",
            "kabupaten" => "Demak",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph22 = array(
            "kd_wilayah" => "33.22",
            "kabupaten" => "Semarang",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph23 = array(
            "kd_wilayah" => "33.23",
            "kabupaten" => "Temanggung",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph24 = array(
            "kd_wilayah" => "33.24",
            "kabupaten" => "Kendal",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph25 = array(
            "kd_wilayah" => "33.25",
            "kabupaten" => "Batang",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph26 = array(
            "kd_wilayah" => "33.26",
            "kabupaten" => "Pekalongan",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph27 = array(
            "kd_wilayah" => "33.27",
            "kabupaten" => "Pemalang",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph28 = array(
            "kd_wilayah" => "33.28",
            "kabupaten" => "Tegal",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );
        $kph29 = array(
            "kd_wilayah" => "33.29",
            "kabupaten" => "Brebes",
            "persentase" => str_replace(".", "", $input['kph']),
            "tahun" => date("Y")
        );

        $covid1 = array(
            "kd_wilayah" => "33.01",
            "kabupaten" => "Cilacap",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid2 = array(
            "kd_wilayah" => "33.02",
            "kabupaten" => "Banyumas",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid3 = array(
            "kd_wilayah" => "33.03",
            "kabupaten" => "Purbalingga",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid4 = array(
            "kd_wilayah" => "33.04",
            "kabupaten" => "Banjarnegara",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid5 = array(
            "kd_wilayah" => "33.05",
            "kabupaten" => "Kebumen",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid6 = array(
            "kd_wilayah" => "33.06",
            "kabupaten" => "Purworejo",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid7 = array(
            "kd_wilayah" => "33.07",
            "kabupaten" => "Wonosobo",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid8 = array(
            "kd_wilayah" => "33.08",
            "kabupaten" => "Magelang",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid9 = array(
            "kd_wilayah" => "33.09",
            "kabupaten" => "Boyolali",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid10 = array(
            "kd_wilayah" => "33.10",
            "kabupaten" => "Klaten",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid11 = array(
            "kd_wilayah" => "33.11",
            "kabupaten" => "Sukoharjo",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid12 = array(
            "kd_wilayah" => "33.12",
            "kabupaten" => "Wonogiri",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid13 = array(
            "kd_wilayah" => "33.13",
            "kabupaten" => "Karanganyar",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid14 = array(
            "kd_wilayah" => "33.14",
            "kabupaten" => "Sragen",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid15 = array(
            "kd_wilayah" => "33.15",
            "kabupaten" => "Grobogan",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid16 = array(
            "kd_wilayah" => "33.16",
            "kabupaten" => "Blora",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid17 = array(
            "kd_wilayah" => "33.17",
            "kabupaten" => "Rembang",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid18 = array(
            "kd_wilayah" => "33.18",
            "kabupaten" => "Pati",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid19 = array(
            "kd_wilayah" => "33.19",
            "kabupaten" => "Kudus",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid20 = array(
            "kd_wilayah" => "33.20",
            "kabupaten" => "Jepara",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid21 = array(
            "kd_wilayah" => "33.21",
            "kabupaten" => "Demak",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid22 = array(
            "kd_wilayah" => "33.22",
            "kabupaten" => "Semarang",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid23 = array(
            "kd_wilayah" => "33.23",
            "kabupaten" => "Temanggung",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid24 = array(
            "kd_wilayah" => "33.24",
            "kabupaten" => "Kendal",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid25 = array(
            "kd_wilayah" => "33.25",
            "kabupaten" => "Batang",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid26 = array(
            "kd_wilayah" => "33.26",
            "kabupaten" => "Pekalongan",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid27 = array(
            "kd_wilayah" => "33.27",
            "kabupaten" => "Pemalang",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid28 = array(
            "kd_wilayah" => "33.28",
            "kabupaten" => "Tegal",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );
        $covid29 = array(
            "kd_wilayah" => "33.29",
            "kabupaten" => "Brebes",
            "persentase" => str_replace(".", "", $input['covid']),
            "tahun" => date("Y")
        );

        $reguler->insert($reguler1);
        $reguler->insert($reguler2);
        $reguler->insert($reguler3);
        $reguler->insert($reguler4);
        $reguler->insert($reguler5);
        $reguler->insert($reguler6);
        $reguler->insert($reguler7);
        $reguler->insert($reguler8);
        $reguler->insert($reguler9);
        $reguler->insert($reguler10);
        $reguler->insert($reguler11);
        $reguler->insert($reguler12);
        $reguler->insert($reguler13);
        $reguler->insert($reguler14);
        $reguler->insert($reguler15);
        $reguler->insert($reguler16);
        $reguler->insert($reguler17);
        $reguler->insert($reguler18);
        $reguler->insert($reguler19);
        $reguler->insert($reguler20);
        $reguler->insert($reguler21);
        $reguler->insert($reguler22);
        $reguler->insert($reguler23);
        $reguler->insert($reguler24);
        $reguler->insert($reguler25);
        $reguler->insert($reguler26);
        $reguler->insert($reguler27);
        $reguler->insert($reguler28);
        $reguler->insert($reguler29);

        $bltdd->insert($bltdd1);
        $bltdd->insert($bltdd2);
        $bltdd->insert($bltdd3);
        $bltdd->insert($bltdd4);
        $bltdd->insert($bltdd5);
        $bltdd->insert($bltdd6);
        $bltdd->insert($bltdd7);
        $bltdd->insert($bltdd8);
        $bltdd->insert($bltdd9);
        $bltdd->insert($bltdd10);
        $bltdd->insert($bltdd11);
        $bltdd->insert($bltdd12);
        $bltdd->insert($bltdd13);
        $bltdd->insert($bltdd14);
        $bltdd->insert($bltdd15);
        $bltdd->insert($bltdd16);
        $bltdd->insert($bltdd17);
        $bltdd->insert($bltdd18);
        $bltdd->insert($bltdd19);
        $bltdd->insert($bltdd20);
        $bltdd->insert($bltdd21);
        $bltdd->insert($bltdd22);
        $bltdd->insert($bltdd23);
        $bltdd->insert($bltdd24);
        $bltdd->insert($bltdd25);
        $bltdd->insert($bltdd26);
        $bltdd->insert($bltdd27);
        $bltdd->insert($bltdd28);
        $bltdd->insert($bltdd29);

        $kph->insert($kph1);
        $kph->insert($kph2);
        $kph->insert($kph3);
        $kph->insert($kph4);
        $kph->insert($kph5);
        $kph->insert($kph6);
        $kph->insert($kph7);
        $kph->insert($kph8);
        $kph->insert($kph9);
        $kph->insert($kph10);
        $kph->insert($kph11);
        $kph->insert($kph12);
        $kph->insert($kph13);
        $kph->insert($kph14);
        $kph->insert($kph15);
        $kph->insert($kph16);
        $kph->insert($kph17);
        $kph->insert($kph18);
        $kph->insert($kph19);
        $kph->insert($kph20);
        $kph->insert($kph21);
        $kph->insert($kph22);
        $kph->insert($kph23);
        $kph->insert($kph24);
        $kph->insert($kph25);
        $kph->insert($kph26);
        $kph->insert($kph27);
        $kph->insert($kph28);
        $kph->insert($kph29);

        $covid->insert($covid1);
        $covid->insert($covid2);
        $covid->insert($covid3);
        $covid->insert($covid4);
        $covid->insert($covid5);
        $covid->insert($covid6);
        $covid->insert($covid7);
        $covid->insert($covid8);
        $covid->insert($covid9);
        $covid->insert($covid10);
        $covid->insert($covid11);
        $covid->insert($covid12);
        $covid->insert($covid13);
        $covid->insert($covid14);
        $covid->insert($covid15);
        $covid->insert($covid16);
        $covid->insert($covid17);
        $covid->insert($covid18);
        $covid->insert($covid19);
        $covid->insert($covid20);
        $covid->insert($covid21);
        $covid->insert($covid22);
        $covid->insert($covid23);
        $covid->insert($covid24);
        $covid->insert($covid25);
        $covid->insert($covid26);
        $covid->insert($covid27);
        $covid->insert($covid28);
        $covid->insert($covid29);
    }

    public function updateaksesPersentase($input)
    {
        $cilacap = $this->db->table('danadesa_anggaran');
        $cilacap->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $cilacap->where('kd_wilayah', "33.01");
        $cilacap->where('tahun', date("Y"));
        $cilacap->update();

        $banyumas = $this->db->table('danadesa_anggaran');
        $banyumas->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $banyumas->where('kd_wilayah', "33.02");
        $banyumas->where('tahun', date("Y"));
        $banyumas->update();

        $purbalingga = $this->db->table('danadesa_anggaran');
        $purbalingga->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $purbalingga->where('kd_wilayah', "33.03");
        $purbalingga->where('tahun', date("Y"));
        $purbalingga->update();

        $banjarnegara = $this->db->table('danadesa_anggaran');
        $banjarnegara->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $banjarnegara->where('kd_wilayah', "33.04");
        $banjarnegara->where('tahun', date("Y"));
        $banjarnegara->update();

        $kebumen = $this->db->table('danadesa_anggaran');
        $kebumen->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $kebumen->where('kd_wilayah', "33.05");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $kebumen = $this->db->table('danadesa_anggaran');
        $kebumen->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $kebumen->where('kd_wilayah', "33.06");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $wonosobo = $this->db->table('danadesa_anggaran');
        $wonosobo->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $wonosobo->where('kd_wilayah', "33.07");
        $wonosobo->where('tahun', date("Y"));
        $wonosobo->update();

        $magelang = $this->db->table('danadesa_anggaran');
        $magelang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $magelang->where('kd_wilayah', "33.08");
        $magelang->where('tahun', date("Y"));
        $magelang->update();

        $boyolali = $this->db->table('danadesa_anggaran');
        $boyolali->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $boyolali->where('kd_wilayah', "33.09");
        $boyolali->where('tahun', date("Y"));
        $boyolali->update();

        $klaten = $this->db->table('danadesa_anggaran');
        $klaten->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $klaten->where('kd_wilayah', "33.10");
        $klaten->where('tahun', date("Y"));
        $klaten->update();

        $sukoharjo = $this->db->table('danadesa_anggaran');
        $sukoharjo->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $sukoharjo->where('kd_wilayah', "33.11");
        $sukoharjo->where('tahun', date("Y"));
        $sukoharjo->update();

        $wonogiri = $this->db->table('danadesa_anggaran');
        $wonogiri->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $wonogiri->where('kd_wilayah', "33.12");
        $wonogiri->where('tahun', date("Y"));
        $wonogiri->update();

        $karanganyar = $this->db->table('danadesa_anggaran');
        $karanganyar->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $karanganyar->where('kd_wilayah', "33.13");
        $karanganyar->where('tahun', date("Y"));
        $karanganyar->update();

        $sragen = $this->db->table('danadesa_anggaran');
        $sragen->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $sragen->where('kd_wilayah', "33.14");
        $sragen->where('tahun', date("Y"));
        $sragen->update();

        $grobogan = $this->db->table('danadesa_anggaran');
        $grobogan->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $grobogan->where('kd_wilayah', "33.15");
        $grobogan->where('tahun', date("Y"));
        $grobogan->update();

        $blora = $this->db->table('danadesa_anggaran');
        $blora->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $blora->where('kd_wilayah', "33.16");
        $blora->where('tahun', date("Y"));
        $blora->update();

        $rembang = $this->db->table('danadesa_anggaran');
        $rembang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $rembang->where('kd_wilayah', "33.17");
        $rembang->where('tahun', date("Y"));
        $rembang->update();

        $pati = $this->db->table('danadesa_anggaran');
        $pati->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $pati->where('kd_wilayah', "33.18");
        $pati->where('tahun', date("Y"));
        $pati->update();

        $kudus = $this->db->table('danadesa_anggaran');
        $kudus->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $kudus->where('kd_wilayah', "33.19");
        $kudus->where('tahun', date("Y"));
        $kudus->update();

        $jepara = $this->db->table('danadesa_anggaran');
        $jepara->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $jepara->where('kd_wilayah', "33.20");
        $jepara->where('tahun', date("Y"));
        $jepara->update();

        $demak = $this->db->table('danadesa_anggaran');
        $demak->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $demak->where('kd_wilayah', "33.21");
        $demak->where('tahun', date("Y"));
        $demak->update();

        $semarang = $this->db->table('danadesa_anggaran');
        $semarang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $semarang->where('kd_wilayah', "33.22");
        $semarang->where('tahun', date("Y"));
        $semarang->update();

        $temanggung = $this->db->table('danadesa_anggaran');
        $temanggung->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $temanggung->where('kd_wilayah', "33.23");
        $temanggung->where('tahun', date("Y"));
        $temanggung->update();

        $kendal = $this->db->table('danadesa_anggaran');
        $kendal->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $kendal->where('kd_wilayah', "33.24");
        $kendal->where('tahun', date("Y"));
        $kendal->update();

        $batang = $this->db->table('danadesa_anggaran');
        $batang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $batang->where('kd_wilayah', "33.25");
        $batang->where('tahun', date("Y"));
        $batang->update();

        $pekalongan = $this->db->table('danadesa_anggaran');
        $pekalongan->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $pekalongan->where('kd_wilayah', "33.26");
        $pekalongan->where('tahun', date("Y"));
        $pekalongan->update();

        $pemalang = $this->db->table('danadesa_anggaran');
        $pemalang->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $pemalang->where('kd_wilayah', "33.27");
        $pemalang->where('tahun', date("Y"));
        $pemalang->update();

        $tegal = $this->db->table('danadesa_anggaran');
        $tegal->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $tegal->where('kd_wilayah', "33.28");
        $tegal->where('tahun', date("Y"));
        $tegal->update();

        $brebes = $this->db->table('danadesa_anggaran');
        $brebes->set('bantuan_per_kpm', str_replace(".", "", $input['kpm']));
        $brebes->where('kd_wilayah', "33.29");
        $brebes->where('tahun', date("Y"));
        $brebes->update();

        $cilacap = $this->db->table('danadesa_reguler');
        $cilacap->set('persentase', str_replace(".", "", $input['reguler']));
        $cilacap->where('kd_wilayah', "33.01");
        $cilacap->where('tahun', date("Y"));
        $cilacap->update();

        $banyumas = $this->db->table('danadesa_reguler');
        $banyumas->set('persentase', str_replace(".", "", $input['reguler']));
        $banyumas->where('kd_wilayah', "33.02");
        $banyumas->where('tahun', date("Y"));
        $banyumas->update();

        $purbalingga = $this->db->table('danadesa_reguler');
        $purbalingga->set('persentase', str_replace(".", "", $input['reguler']));
        $purbalingga->where('kd_wilayah', "33.03");
        $purbalingga->where('tahun', date("Y"));
        $purbalingga->update();

        $banjarnegara = $this->db->table('danadesa_reguler');
        $banjarnegara->set('persentase', str_replace(".", "", $input['reguler']));
        $banjarnegara->where('kd_wilayah', "33.04");
        $banjarnegara->where('tahun', date("Y"));
        $banjarnegara->update();

        $kebumen = $this->db->table('danadesa_reguler');
        $kebumen->set('persentase', str_replace(".", "", $input['reguler']));
        $kebumen->where('kd_wilayah', "33.05");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $kebumen = $this->db->table('danadesa_reguler');
        $kebumen->set('persentase', str_replace(".", "", $input['reguler']));
        $kebumen->where('kd_wilayah', "33.06");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $wonosobo = $this->db->table('danadesa_reguler');
        $wonosobo->set('persentase', str_replace(".", "", $input['reguler']));
        $wonosobo->where('kd_wilayah', "33.07");
        $wonosobo->where('tahun', date("Y"));
        $wonosobo->update();

        $magelang = $this->db->table('danadesa_reguler');
        $magelang->set('persentase', str_replace(".", "", $input['reguler']));
        $magelang->where('kd_wilayah', "33.08");
        $magelang->where('tahun', date("Y"));
        $magelang->update();

        $boyolali = $this->db->table('danadesa_reguler');
        $boyolali->set('persentase', str_replace(".", "", $input['reguler']));
        $boyolali->where('kd_wilayah', "33.09");
        $boyolali->where('tahun', date("Y"));
        $boyolali->update();

        $klaten = $this->db->table('danadesa_reguler');
        $klaten->set('persentase', str_replace(".", "", $input['reguler']));
        $klaten->where('kd_wilayah', "33.10");
        $klaten->where('tahun', date("Y"));
        $klaten->update();

        $sukoharjo = $this->db->table('danadesa_reguler');
        $sukoharjo->set('persentase', str_replace(".", "", $input['reguler']));
        $sukoharjo->where('kd_wilayah', "33.11");
        $sukoharjo->where('tahun', date("Y"));
        $sukoharjo->update();

        $wonogiri = $this->db->table('danadesa_reguler');
        $wonogiri->set('persentase', str_replace(".", "", $input['reguler']));
        $wonogiri->where('kd_wilayah', "33.12");
        $wonogiri->where('tahun', date("Y"));
        $wonogiri->update();

        $karanganyar = $this->db->table('danadesa_reguler');
        $karanganyar->set('persentase', str_replace(".", "", $input['reguler']));
        $karanganyar->where('kd_wilayah', "33.13");
        $karanganyar->where('tahun', date("Y"));
        $karanganyar->update();

        $sragen = $this->db->table('danadesa_reguler');
        $sragen->set('persentase', str_replace(".", "", $input['reguler']));
        $sragen->where('kd_wilayah', "33.14");
        $sragen->where('tahun', date("Y"));
        $sragen->update();

        $grobogan = $this->db->table('danadesa_reguler');
        $grobogan->set('persentase', str_replace(".", "", $input['reguler']));
        $grobogan->where('kd_wilayah', "33.15");
        $grobogan->where('tahun', date("Y"));
        $grobogan->update();

        $blora = $this->db->table('danadesa_reguler');
        $blora->set('persentase', str_replace(".", "", $input['reguler']));
        $blora->where('kd_wilayah', "33.16");
        $blora->where('tahun', date("Y"));
        $blora->update();

        $rembang = $this->db->table('danadesa_reguler');
        $rembang->set('persentase', str_replace(".", "", $input['reguler']));
        $rembang->where('kd_wilayah', "33.17");
        $rembang->where('tahun', date("Y"));
        $rembang->update();

        $pati = $this->db->table('danadesa_reguler');
        $pati->set('persentase', str_replace(".", "", $input['reguler']));
        $pati->where('kd_wilayah', "33.18");
        $pati->where('tahun', date("Y"));
        $pati->update();

        $kudus = $this->db->table('danadesa_reguler');
        $kudus->set('persentase', str_replace(".", "", $input['reguler']));
        $kudus->where('kd_wilayah', "33.19");
        $kudus->where('tahun', date("Y"));
        $kudus->update();

        $jepara = $this->db->table('danadesa_reguler');
        $jepara->set('persentase', str_replace(".", "", $input['reguler']));
        $jepara->where('kd_wilayah', "33.20");
        $jepara->where('tahun', date("Y"));
        $jepara->update();

        $demak = $this->db->table('danadesa_reguler');
        $demak->set('persentase', str_replace(".", "", $input['reguler']));
        $demak->where('kd_wilayah', "33.21");
        $demak->where('tahun', date("Y"));
        $demak->update();

        $semarang = $this->db->table('danadesa_reguler');
        $semarang->set('persentase', str_replace(".", "", $input['reguler']));
        $semarang->where('kd_wilayah', "33.22");
        $semarang->where('tahun', date("Y"));
        $semarang->update();

        $temanggung = $this->db->table('danadesa_reguler');
        $temanggung->set('persentase', str_replace(".", "", $input['reguler']));
        $temanggung->where('kd_wilayah', "33.23");
        $temanggung->where('tahun', date("Y"));
        $temanggung->update();

        $kendal = $this->db->table('danadesa_reguler');
        $kendal->set('persentase', str_replace(".", "", $input['reguler']));
        $kendal->where('kd_wilayah', "33.24");
        $kendal->where('tahun', date("Y"));
        $kendal->update();

        $batang = $this->db->table('danadesa_reguler');
        $batang->set('persentase', str_replace(".", "", $input['reguler']));
        $batang->where('kd_wilayah', "33.25");
        $batang->where('tahun', date("Y"));
        $batang->update();

        $pekalongan = $this->db->table('danadesa_reguler');
        $pekalongan->set('persentase', str_replace(".", "", $input['reguler']));
        $pekalongan->where('kd_wilayah', "33.26");
        $pekalongan->where('tahun', date("Y"));
        $pekalongan->update();

        $pemalang = $this->db->table('danadesa_reguler');
        $pemalang->set('persentase', str_replace(".", "", $input['reguler']));
        $pemalang->where('kd_wilayah', "33.27");
        $pemalang->where('tahun', date("Y"));
        $pemalang->update();

        $tegal = $this->db->table('danadesa_reguler');
        $tegal->set('persentase', str_replace(".", "", $input['reguler']));
        $tegal->where('kd_wilayah', "33.28");
        $tegal->where('tahun', date("Y"));
        $tegal->update();

        $brebes = $this->db->table('danadesa_reguler');
        $brebes->set('persentase', str_replace(".", "", $input['reguler']));
        $brebes->where('kd_wilayah', "33.29");
        $brebes->where('tahun', date("Y"));
        $brebes->update();

        $cilacap = $this->db->table('danadesa_bltdd');
        $cilacap->set('persentase', str_replace(".", "", $input['bltdd']));
        $cilacap->where('kd_wilayah', "33.01");
        $cilacap->where('tahun', date("Y"));
        $cilacap->update();

        $banyumas = $this->db->table('danadesa_bltdd');
        $banyumas->set('persentase', str_replace(".", "", $input['bltdd']));
        $banyumas->where('kd_wilayah', "33.02");
        $banyumas->where('tahun', date("Y"));
        $banyumas->update();

        $purbalingga = $this->db->table('danadesa_bltdd');
        $purbalingga->set('persentase', str_replace(".", "", $input['bltdd']));
        $purbalingga->where('kd_wilayah', "33.03");
        $purbalingga->where('tahun', date("Y"));
        $purbalingga->update();

        $banjarnegara = $this->db->table('danadesa_bltdd');
        $banjarnegara->set('persentase', str_replace(".", "", $input['bltdd']));
        $banjarnegara->where('kd_wilayah', "33.04");
        $banjarnegara->where('tahun', date("Y"));
        $banjarnegara->update();

        $kebumen = $this->db->table('danadesa_bltdd');
        $kebumen->set('persentase', str_replace(".", "", $input['bltdd']));
        $kebumen->where('kd_wilayah', "33.05");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $kebumen = $this->db->table('danadesa_bltdd');
        $kebumen->set('persentase', str_replace(".", "", $input['bltdd']));
        $kebumen->where('kd_wilayah', "33.06");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $wonosobo = $this->db->table('danadesa_bltdd');
        $wonosobo->set('persentase', str_replace(".", "", $input['bltdd']));
        $wonosobo->where('kd_wilayah', "33.07");
        $wonosobo->where('tahun', date("Y"));
        $wonosobo->update();

        $magelang = $this->db->table('danadesa_bltdd');
        $magelang->set('persentase', str_replace(".", "", $input['bltdd']));
        $magelang->where('kd_wilayah', "33.08");
        $magelang->where('tahun', date("Y"));
        $magelang->update();

        $boyolali = $this->db->table('danadesa_bltdd');
        $boyolali->set('persentase', str_replace(".", "", $input['bltdd']));
        $boyolali->where('kd_wilayah', "33.09");
        $boyolali->where('tahun', date("Y"));
        $boyolali->update();

        $klaten = $this->db->table('danadesa_bltdd');
        $klaten->set('persentase', str_replace(".", "", $input['bltdd']));
        $klaten->where('kd_wilayah', "33.10");
        $klaten->where('tahun', date("Y"));
        $klaten->update();

        $sukoharjo = $this->db->table('danadesa_bltdd');
        $sukoharjo->set('persentase', str_replace(".", "", $input['bltdd']));
        $sukoharjo->where('kd_wilayah', "33.11");
        $sukoharjo->where('tahun', date("Y"));
        $sukoharjo->update();

        $wonogiri = $this->db->table('danadesa_bltdd');
        $wonogiri->set('persentase', str_replace(".", "", $input['bltdd']));
        $wonogiri->where('kd_wilayah', "33.12");
        $wonogiri->where('tahun', date("Y"));
        $wonogiri->update();

        $karanganyar = $this->db->table('danadesa_bltdd');
        $karanganyar->set('persentase', str_replace(".", "", $input['bltdd']));
        $karanganyar->where('kd_wilayah', "33.13");
        $karanganyar->where('tahun', date("Y"));
        $karanganyar->update();

        $sragen = $this->db->table('danadesa_bltdd');
        $sragen->set('persentase', str_replace(".", "", $input['bltdd']));
        $sragen->where('kd_wilayah', "33.14");
        $sragen->where('tahun', date("Y"));
        $sragen->update();

        $grobogan = $this->db->table('danadesa_bltdd');
        $grobogan->set('persentase', str_replace(".", "", $input['bltdd']));
        $grobogan->where('kd_wilayah', "33.15");
        $grobogan->where('tahun', date("Y"));
        $grobogan->update();

        $blora = $this->db->table('danadesa_bltdd');
        $blora->set('persentase', str_replace(".", "", $input['bltdd']));
        $blora->where('kd_wilayah', "33.16");
        $blora->where('tahun', date("Y"));
        $blora->update();

        $rembang = $this->db->table('danadesa_bltdd');
        $rembang->set('persentase', str_replace(".", "", $input['bltdd']));
        $rembang->where('kd_wilayah', "33.17");
        $rembang->where('tahun', date("Y"));
        $rembang->update();

        $pati = $this->db->table('danadesa_bltdd');
        $pati->set('persentase', str_replace(".", "", $input['bltdd']));
        $pati->where('kd_wilayah', "33.18");
        $pati->where('tahun', date("Y"));
        $pati->update();

        $kudus = $this->db->table('danadesa_bltdd');
        $kudus->set('persentase', str_replace(".", "", $input['bltdd']));
        $kudus->where('kd_wilayah', "33.19");
        $kudus->where('tahun', date("Y"));
        $kudus->update();

        $jepara = $this->db->table('danadesa_bltdd');
        $jepara->set('persentase', str_replace(".", "", $input['bltdd']));
        $jepara->where('kd_wilayah', "33.20");
        $jepara->where('tahun', date("Y"));
        $jepara->update();

        $demak = $this->db->table('danadesa_bltdd');
        $demak->set('persentase', str_replace(".", "", $input['bltdd']));
        $demak->where('kd_wilayah', "33.21");
        $demak->where('tahun', date("Y"));
        $demak->update();

        $semarang = $this->db->table('danadesa_bltdd');
        $semarang->set('persentase', str_replace(".", "", $input['bltdd']));
        $semarang->where('kd_wilayah', "33.22");
        $semarang->where('tahun', date("Y"));
        $semarang->update();

        $temanggung = $this->db->table('danadesa_bltdd');
        $temanggung->set('persentase', str_replace(".", "", $input['bltdd']));
        $temanggung->where('kd_wilayah', "33.23");
        $temanggung->where('tahun', date("Y"));
        $temanggung->update();

        $kendal = $this->db->table('danadesa_bltdd');
        $kendal->set('persentase', str_replace(".", "", $input['bltdd']));
        $kendal->where('kd_wilayah', "33.24");
        $kendal->where('tahun', date("Y"));
        $kendal->update();

        $batang = $this->db->table('danadesa_bltdd');
        $batang->set('persentase', str_replace(".", "", $input['bltdd']));
        $batang->where('kd_wilayah', "33.25");
        $batang->where('tahun', date("Y"));
        $batang->update();

        $pekalongan = $this->db->table('danadesa_bltdd');
        $pekalongan->set('persentase', str_replace(".", "", $input['bltdd']));
        $pekalongan->where('kd_wilayah', "33.26");
        $pekalongan->where('tahun', date("Y"));
        $pekalongan->update();

        $pemalang = $this->db->table('danadesa_bltdd');
        $pemalang->set('persentase', str_replace(".", "", $input['bltdd']));
        $pemalang->where('kd_wilayah', "33.27");
        $pemalang->where('tahun', date("Y"));
        $pemalang->update();

        $tegal = $this->db->table('danadesa_bltdd');
        $tegal->set('persentase', str_replace(".", "", $input['bltdd']));
        $tegal->where('kd_wilayah', "33.28");
        $tegal->where('tahun', date("Y"));
        $tegal->update();

        $brebes = $this->db->table('danadesa_bltdd');
        $brebes->set('persentase', str_replace(".", "", $input['bltdd']));
        $brebes->where('kd_wilayah', "33.29");
        $brebes->where('tahun', date("Y"));
        $brebes->update();

        $cilacap = $this->db->table('danadesa_kph');
        $cilacap->set('persentase', str_replace(".", "", $input['kph']));
        $cilacap->where('kd_wilayah', "33.01");
        $cilacap->where('tahun', date("Y"));
        $cilacap->update();

        $banyumas = $this->db->table('danadesa_kph');
        $banyumas->set('persentase', str_replace(".", "", $input['kph']));
        $banyumas->where('kd_wilayah', "33.02");
        $banyumas->where('tahun', date("Y"));
        $banyumas->update();

        $purbalingga = $this->db->table('danadesa_kph');
        $purbalingga->set('persentase', str_replace(".", "", $input['kph']));
        $purbalingga->where('kd_wilayah', "33.03");
        $purbalingga->where('tahun', date("Y"));
        $purbalingga->update();

        $banjarnegara = $this->db->table('danadesa_kph');
        $banjarnegara->set('persentase', str_replace(".", "", $input['kph']));
        $banjarnegara->where('kd_wilayah', "33.04");
        $banjarnegara->where('tahun', date("Y"));
        $banjarnegara->update();

        $kebumen = $this->db->table('danadesa_kph');
        $kebumen->set('persentase', str_replace(".", "", $input['kph']));
        $kebumen->where('kd_wilayah', "33.05");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $kebumen = $this->db->table('danadesa_kph');
        $kebumen->set('persentase', str_replace(".", "", $input['kph']));
        $kebumen->where('kd_wilayah', "33.06");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $wonosobo = $this->db->table('danadesa_kph');
        $wonosobo->set('persentase', str_replace(".", "", $input['kph']));
        $wonosobo->where('kd_wilayah', "33.07");
        $wonosobo->where('tahun', date("Y"));
        $wonosobo->update();

        $magelang = $this->db->table('danadesa_kph');
        $magelang->set('persentase', str_replace(".", "", $input['kph']));
        $magelang->where('kd_wilayah', "33.08");
        $magelang->where('tahun', date("Y"));
        $magelang->update();

        $boyolali = $this->db->table('danadesa_kph');
        $boyolali->set('persentase', str_replace(".", "", $input['kph']));
        $boyolali->where('kd_wilayah', "33.09");
        $boyolali->where('tahun', date("Y"));
        $boyolali->update();

        $klaten = $this->db->table('danadesa_kph');
        $klaten->set('persentase', str_replace(".", "", $input['kph']));
        $klaten->where('kd_wilayah', "33.10");
        $klaten->where('tahun', date("Y"));
        $klaten->update();

        $sukoharjo = $this->db->table('danadesa_kph');
        $sukoharjo->set('persentase', str_replace(".", "", $input['kph']));
        $sukoharjo->where('kd_wilayah', "33.11");
        $sukoharjo->where('tahun', date("Y"));
        $sukoharjo->update();

        $wonogiri = $this->db->table('danadesa_kph');
        $wonogiri->set('persentase', str_replace(".", "", $input['kph']));
        $wonogiri->where('kd_wilayah', "33.12");
        $wonogiri->where('tahun', date("Y"));
        $wonogiri->update();

        $karanganyar = $this->db->table('danadesa_kph');
        $karanganyar->set('persentase', str_replace(".", "", $input['kph']));
        $karanganyar->where('kd_wilayah', "33.13");
        $karanganyar->where('tahun', date("Y"));
        $karanganyar->update();

        $sragen = $this->db->table('danadesa_kph');
        $sragen->set('persentase', str_replace(".", "", $input['kph']));
        $sragen->where('kd_wilayah', "33.14");
        $sragen->where('tahun', date("Y"));
        $sragen->update();

        $grobogan = $this->db->table('danadesa_kph');
        $grobogan->set('persentase', str_replace(".", "", $input['kph']));
        $grobogan->where('kd_wilayah', "33.15");
        $grobogan->where('tahun', date("Y"));
        $grobogan->update();

        $blora = $this->db->table('danadesa_kph');
        $blora->set('persentase', str_replace(".", "", $input['kph']));
        $blora->where('kd_wilayah', "33.16");
        $blora->where('tahun', date("Y"));
        $blora->update();

        $rembang = $this->db->table('danadesa_kph');
        $rembang->set('persentase', str_replace(".", "", $input['kph']));
        $rembang->where('kd_wilayah', "33.17");
        $rembang->where('tahun', date("Y"));
        $rembang->update();

        $pati = $this->db->table('danadesa_kph');
        $pati->set('persentase', str_replace(".", "", $input['kph']));
        $pati->where('kd_wilayah', "33.18");
        $pati->where('tahun', date("Y"));
        $pati->update();

        $kudus = $this->db->table('danadesa_kph');
        $kudus->set('persentase', str_replace(".", "", $input['kph']));
        $kudus->where('kd_wilayah', "33.19");
        $kudus->where('tahun', date("Y"));
        $kudus->update();

        $jepara = $this->db->table('danadesa_kph');
        $jepara->set('persentase', str_replace(".", "", $input['kph']));
        $jepara->where('kd_wilayah', "33.20");
        $jepara->where('tahun', date("Y"));
        $jepara->update();

        $demak = $this->db->table('danadesa_kph');
        $demak->set('persentase', str_replace(".", "", $input['kph']));
        $demak->where('kd_wilayah', "33.21");
        $demak->where('tahun', date("Y"));
        $demak->update();

        $semarang = $this->db->table('danadesa_kph');
        $semarang->set('persentase', str_replace(".", "", $input['kph']));
        $semarang->where('kd_wilayah', "33.22");
        $semarang->where('tahun', date("Y"));
        $semarang->update();

        $temanggung = $this->db->table('danadesa_kph');
        $temanggung->set('persentase', str_replace(".", "", $input['kph']));
        $temanggung->where('kd_wilayah', "33.23");
        $temanggung->where('tahun', date("Y"));
        $temanggung->update();

        $kendal = $this->db->table('danadesa_kph');
        $kendal->set('persentase', str_replace(".", "", $input['kph']));
        $kendal->where('kd_wilayah', "33.24");
        $kendal->where('tahun', date("Y"));
        $kendal->update();

        $batang = $this->db->table('danadesa_kph');
        $batang->set('persentase', str_replace(".", "", $input['kph']));
        $batang->where('kd_wilayah', "33.25");
        $batang->where('tahun', date("Y"));
        $batang->update();

        $pekalongan = $this->db->table('danadesa_kph');
        $pekalongan->set('persentase', str_replace(".", "", $input['kph']));
        $pekalongan->where('kd_wilayah', "33.26");
        $pekalongan->where('tahun', date("Y"));
        $pekalongan->update();

        $pemalang = $this->db->table('danadesa_kph');
        $pemalang->set('persentase', str_replace(".", "", $input['kph']));
        $pemalang->where('kd_wilayah', "33.27");
        $pemalang->where('tahun', date("Y"));
        $pemalang->update();

        $tegal = $this->db->table('danadesa_kph');
        $tegal->set('persentase', str_replace(".", "", $input['kph']));
        $tegal->where('kd_wilayah', "33.28");
        $tegal->where('tahun', date("Y"));
        $tegal->update();

        $brebes = $this->db->table('danadesa_kph');
        $brebes->set('persentase', str_replace(".", "", $input['kph']));
        $brebes->where('kd_wilayah', "33.29");
        $brebes->where('tahun', date("Y"));
        $brebes->update();

        $cilacap = $this->db->table('danadesa_covid');
        $cilacap->set('persentase', str_replace(".", "", $input['covid']));
        $cilacap->where('kd_wilayah', "33.01");
        $cilacap->where('tahun', date("Y"));
        $cilacap->update();

        $banyumas = $this->db->table('danadesa_covid');
        $banyumas->set('persentase', str_replace(".", "", $input['covid']));
        $banyumas->where('kd_wilayah', "33.02");
        $banyumas->where('tahun', date("Y"));
        $banyumas->update();

        $purbalingga = $this->db->table('danadesa_covid');
        $purbalingga->set('persentase', str_replace(".", "", $input['covid']));
        $purbalingga->where('kd_wilayah', "33.03");
        $purbalingga->where('tahun', date("Y"));
        $purbalingga->update();

        $banjarnegara = $this->db->table('danadesa_covid');
        $banjarnegara->set('persentase', str_replace(".", "", $input['covid']));
        $banjarnegara->where('kd_wilayah', "33.04");
        $banjarnegara->where('tahun', date("Y"));
        $banjarnegara->update();

        $kebumen = $this->db->table('danadesa_covid');
        $kebumen->set('persentase', str_replace(".", "", $input['covid']));
        $kebumen->where('kd_wilayah', "33.05");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $kebumen = $this->db->table('danadesa_covid');
        $kebumen->set('persentase', str_replace(".", "", $input['covid']));
        $kebumen->where('kd_wilayah', "33.06");
        $kebumen->where('tahun', date("Y"));
        $kebumen->update();

        $wonosobo = $this->db->table('danadesa_covid');
        $wonosobo->set('persentase', str_replace(".", "", $input['covid']));
        $wonosobo->where('kd_wilayah', "33.07");
        $wonosobo->where('tahun', date("Y"));
        $wonosobo->update();

        $magelang = $this->db->table('danadesa_covid');
        $magelang->set('persentase', str_replace(".", "", $input['covid']));
        $magelang->where('kd_wilayah', "33.08");
        $magelang->where('tahun', date("Y"));
        $magelang->update();

        $boyolali = $this->db->table('danadesa_covid');
        $boyolali->set('persentase', str_replace(".", "", $input['covid']));
        $boyolali->where('kd_wilayah', "33.09");
        $boyolali->where('tahun', date("Y"));
        $boyolali->update();

        $klaten = $this->db->table('danadesa_covid');
        $klaten->set('persentase', str_replace(".", "", $input['covid']));
        $klaten->where('kd_wilayah', "33.10");
        $klaten->where('tahun', date("Y"));
        $klaten->update();

        $sukoharjo = $this->db->table('danadesa_covid');
        $sukoharjo->set('persentase', str_replace(".", "", $input['covid']));
        $sukoharjo->where('kd_wilayah', "33.11");
        $sukoharjo->where('tahun', date("Y"));
        $sukoharjo->update();

        $wonogiri = $this->db->table('danadesa_covid');
        $wonogiri->set('persentase', str_replace(".", "", $input['covid']));
        $wonogiri->where('kd_wilayah', "33.12");
        $wonogiri->where('tahun', date("Y"));
        $wonogiri->update();

        $karanganyar = $this->db->table('danadesa_covid');
        $karanganyar->set('persentase', str_replace(".", "", $input['covid']));
        $karanganyar->where('kd_wilayah', "33.13");
        $karanganyar->where('tahun', date("Y"));
        $karanganyar->update();

        $sragen = $this->db->table('danadesa_covid');
        $sragen->set('persentase', str_replace(".", "", $input['covid']));
        $sragen->where('kd_wilayah', "33.14");
        $sragen->where('tahun', date("Y"));
        $sragen->update();

        $grobogan = $this->db->table('danadesa_covid');
        $grobogan->set('persentase', str_replace(".", "", $input['covid']));
        $grobogan->where('kd_wilayah', "33.15");
        $grobogan->where('tahun', date("Y"));
        $grobogan->update();

        $blora = $this->db->table('danadesa_covid');
        $blora->set('persentase', str_replace(".", "", $input['covid']));
        $blora->where('kd_wilayah', "33.16");
        $blora->where('tahun', date("Y"));
        $blora->update();

        $rembang = $this->db->table('danadesa_covid');
        $rembang->set('persentase', str_replace(".", "", $input['covid']));
        $rembang->where('kd_wilayah', "33.17");
        $rembang->where('tahun', date("Y"));
        $rembang->update();

        $pati = $this->db->table('danadesa_covid');
        $pati->set('persentase', str_replace(".", "", $input['covid']));
        $pati->where('kd_wilayah', "33.18");
        $pati->where('tahun', date("Y"));
        $pati->update();

        $kudus = $this->db->table('danadesa_covid');
        $kudus->set('persentase', str_replace(".", "", $input['covid']));
        $kudus->where('kd_wilayah', "33.19");
        $kudus->where('tahun', date("Y"));
        $kudus->update();

        $jepara = $this->db->table('danadesa_covid');
        $jepara->set('persentase', str_replace(".", "", $input['covid']));
        $jepara->where('kd_wilayah', "33.20");
        $jepara->where('tahun', date("Y"));
        $jepara->update();

        $demak = $this->db->table('danadesa_covid');
        $demak->set('persentase', str_replace(".", "", $input['covid']));
        $demak->where('kd_wilayah', "33.21");
        $demak->where('tahun', date("Y"));
        $demak->update();

        $semarang = $this->db->table('danadesa_covid');
        $semarang->set('persentase', str_replace(".", "", $input['covid']));
        $semarang->where('kd_wilayah', "33.22");
        $semarang->where('tahun', date("Y"));
        $semarang->update();

        $temanggung = $this->db->table('danadesa_covid');
        $temanggung->set('persentase', str_replace(".", "", $input['covid']));
        $temanggung->where('kd_wilayah', "33.23");
        $temanggung->where('tahun', date("Y"));
        $temanggung->update();

        $kendal = $this->db->table('danadesa_covid');
        $kendal->set('persentase', str_replace(".", "", $input['covid']));
        $kendal->where('kd_wilayah', "33.24");
        $kendal->where('tahun', date("Y"));
        $kendal->update();

        $batang = $this->db->table('danadesa_covid');
        $batang->set('persentase', str_replace(".", "", $input['covid']));
        $batang->where('kd_wilayah', "33.25");
        $batang->where('tahun', date("Y"));
        $batang->update();

        $pekalongan = $this->db->table('danadesa_covid');
        $pekalongan->set('persentase', str_replace(".", "", $input['covid']));
        $pekalongan->where('kd_wilayah', "33.26");
        $pekalongan->where('tahun', date("Y"));
        $pekalongan->update();

        $pemalang = $this->db->table('danadesa_covid');
        $pemalang->set('persentase', str_replace(".", "", $input['covid']));
        $pemalang->where('kd_wilayah', "33.27");
        $pemalang->where('tahun', date("Y"));
        $pemalang->update();

        $tegal = $this->db->table('danadesa_covid');
        $tegal->set('persentase', str_replace(".", "", $input['covid']));
        $tegal->where('kd_wilayah', "33.28");
        $tegal->where('tahun', date("Y"));
        $tegal->update();

        $brebes = $this->db->table('danadesa_covid');
        $brebes->set('persentase', str_replace(".", "", $input['covid']));
        $brebes->where('kd_wilayah', "33.29");
        $brebes->where('tahun', date("Y"));
        $brebes->update();
    }
}
