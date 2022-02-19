<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

class User_menu5a_model extends Model
{
    protected $table = 'danadesa_salur';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['kd_wilayah', 'kabupaten', 'januari', 'februari', 'maret', 'april', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'tahun', 'created'];

    public function danadesa_anggaran($sessionKdwil)
    {
        $builder = $this->db->table('danadesa_anggaran');
        $builder->select('kabupaten, danadesa, bantuan_per_kpm, created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $sessionKdwil);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function danadesa_salur($sessionKdwil)
    {
        $builder = $this->db->table('danadesa_salur');
        $builder->select('kabupaten, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, tahun, created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $sessionKdwil);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function danadesa_reguler($sessionKdwil)
    {
        $builder = $this->db->table('danadesa_reguler');
        $builder->select('kabupaten, persentase, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, tahun, created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $sessionKdwil);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function danadesa_bltdd($sessionKdwil)
    {
        $builder = $this->db->table('danadesa_bltdd');
        $builder->select('kabupaten, persentase, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, tahun, created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $sessionKdwil);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function danadesa_kph($sessionKdwil)
    {
        $builder = $this->db->table('danadesa_kph');
        $builder->select('kabupaten, persentase, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, tahun, created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $sessionKdwil);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function danadesa_covid($sessionKdwil)
    {
        $builder = $this->db->table('danadesa_covid');
        $builder->select('kabupaten, persentase, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember, tahun, created');
        $builder->where('tahun', date('Y'));
        $builder->where('kd_wilayah', $sessionKdwil);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function insertaksesSalur($input, $sessionKdwil, $namakab)
    {
        $januari = $input['januari'] != '' ? $input['januari'] : 0;
        $februari = $input['februari'] != '' ? $input['februari'] : 0;
        $maret = $input['maret'] != '' ? $input['maret'] : 0;
        $april = $input['april'] != '' ? $input['april'] : 0;
        $mei = $input['mei'] != '' ? $input['mei'] : 0;
        $juni = $input['juni'] != '' ? $input['juni'] : 0;
        $juli = $input['juli'] != '' ? $input['juli'] : 0;
        $agustus = $input['agustus'] != '' ? $input['agustus'] : 0;
        $september = $input['september'] != '' ? $input['september'] : 0;
        $oktober = $input['oktober'] != '' ? $input['oktober'] : 0;
        $november = $input['november'] != '' ? $input['november'] : 0;
        $desember = $input['desember'] != '' ? $input['desember'] : 0;

        $builder = $this->db->table('danadesa_salur');
        $salur = array(
            "kd_wilayah" => $sessionKdwil,
            "kabupaten" => $namakab,
            "januari" => str_replace(".", "", $januari),
            "februari" => str_replace(".", "", $februari),
            "maret" => str_replace(".", "", $maret),
            "april" => str_replace(".", "", $april),
            "mei" => str_replace(".", "", $mei),
            "juni" => str_replace(".", "", $juni),
            "juli" => str_replace(".", "", $juli),
            "agustus" => str_replace(".", "", $agustus),
            "september" => str_replace(".", "", $september),
            "oktober" => str_replace(".", "", $oktober),
            "november" => str_replace(".", "", $november),
            "desember" => str_replace(".", "", $desember),
            "tahun" => date("Y"),
            "created" => time()
        );
        $builder->insert($salur);

        $update = $this->db->table('danadesa_anggaran');
        $update->set('created', time());
        $update->where('kd_wilayah', $sessionKdwil);
        $update->where('tahun', date("Y"));
        $update->update();
    }

    public function updateaksesSalur($input, $sessionKdwil)
    {
        $januari = $input['januari'] != '' ? $input['januari'] : 0;
        $februari = $input['februari'] != '' ? $input['februari'] : 0;
        $maret = $input['maret'] != '' ? $input['maret'] : 0;
        $april = $input['april'] != '' ? $input['april'] : 0;
        $mei = $input['mei'] != '' ? $input['mei'] : 0;
        $juni = $input['juni'] != '' ? $input['juni'] : 0;
        $juli = $input['juli'] != '' ? $input['juli'] : 0;
        $agustus = $input['agustus'] != '' ? $input['agustus'] : 0;
        $september = $input['september'] != '' ? $input['september'] : 0;
        $oktober = $input['oktober'] != '' ? $input['oktober'] : 0;
        $november = $input['november'] != '' ? $input['november'] : 0;
        $desember = $input['desember'] != '' ? $input['desember'] : 0;

        $builder = $this->db->table('danadesa_salur');
        $builder->set('januari', str_replace(".", "", $januari));
        $builder->set('februari', str_replace(".", "", $februari));
        $builder->set('maret', str_replace(".", "", $maret));
        $builder->set('april', str_replace(".", "", $april));
        $builder->set('mei', str_replace(".", "", $mei));
        $builder->set('juni', str_replace(".", "", $juni));
        $builder->set('juli', str_replace(".", "", $juli));
        $builder->set('agustus', str_replace(".", "", $agustus));
        $builder->set('september', str_replace(".", "", $september));
        $builder->set('oktober', str_replace(".", "", $oktober));
        $builder->set('november', str_replace(".", "", $november));
        $builder->set('desember', str_replace(".", "", $desember));
        $builder->set('created', time());
        $builder->where('kd_wilayah', $sessionKdwil);
        $builder->where('tahun', date("Y"));
        $builder->update();

        $update = $this->db->table('danadesa_anggaran');
        $update->set('created', time());
        $update->where('kd_wilayah', $sessionKdwil);
        $update->where('tahun', date("Y"));
        $update->update();
    }

    public function updateaksesReguler($input, $sessionKdwil)
    {
        $januari = $input['januari'] != '' ? $input['januari'] : 0;
        $februari = $input['februari'] != '' ? $input['februari'] : 0;
        $maret = $input['maret'] != '' ? $input['maret'] : 0;
        $april = $input['april'] != '' ? $input['april'] : 0;
        $mei = $input['mei'] != '' ? $input['mei'] : 0;
        $juni = $input['juni'] != '' ? $input['juni'] : 0;
        $juli = $input['juli'] != '' ? $input['juli'] : 0;
        $agustus = $input['agustus'] != '' ? $input['agustus'] : 0;
        $september = $input['september'] != '' ? $input['september'] : 0;
        $oktober = $input['oktober'] != '' ? $input['oktober'] : 0;
        $november = $input['november'] != '' ? $input['november'] : 0;
        $desember = $input['desember'] != '' ? $input['desember'] : 0;

        $builder = $this->db->table('danadesa_reguler');
        $builder->set('januari', str_replace(".", "", $januari));
        $builder->set('februari', str_replace(".", "", $februari));
        $builder->set('maret', str_replace(".", "", $maret));
        $builder->set('april', str_replace(".", "", $april));
        $builder->set('mei', str_replace(".", "", $mei));
        $builder->set('juni', str_replace(".", "", $juni));
        $builder->set('juli', str_replace(".", "", $juli));
        $builder->set('agustus', str_replace(".", "", $agustus));
        $builder->set('september', str_replace(".", "", $september));
        $builder->set('oktober', str_replace(".", "", $oktober));
        $builder->set('november', str_replace(".", "", $november));
        $builder->set('desember', str_replace(".", "", $desember));
        $builder->set('created', time());
        $builder->where('kd_wilayah', $sessionKdwil);
        $builder->where('tahun', date("Y"));
        $builder->update();

        $update = $this->db->table('danadesa_anggaran');
        $update->set('created', time());
        $update->where('kd_wilayah', $sessionKdwil);
        $update->where('tahun', date("Y"));
        $update->update();
    }

    public function updateaksesBltdd($input, $sessionKdwil)
    {
        $januari = $input['januari'] != '' ? $input['januari'] : 0;
        $februari = $input['februari'] != '' ? $input['februari'] : 0;
        $maret = $input['maret'] != '' ? $input['maret'] : 0;
        $april = $input['april'] != '' ? $input['april'] : 0;
        $mei = $input['mei'] != '' ? $input['mei'] : 0;
        $juni = $input['juni'] != '' ? $input['juni'] : 0;
        $juli = $input['juli'] != '' ? $input['juli'] : 0;
        $agustus = $input['agustus'] != '' ? $input['agustus'] : 0;
        $september = $input['september'] != '' ? $input['september'] : 0;
        $oktober = $input['oktober'] != '' ? $input['oktober'] : 0;
        $november = $input['november'] != '' ? $input['november'] : 0;
        $desember = $input['desember'] != '' ? $input['desember'] : 0;

        $builder = $this->db->table('danadesa_bltdd');
        $builder->set('januari', str_replace(".", "", $januari));
        $builder->set('februari', str_replace(".", "", $februari));
        $builder->set('maret', str_replace(".", "", $maret));
        $builder->set('april', str_replace(".", "", $april));
        $builder->set('mei', str_replace(".", "", $mei));
        $builder->set('juni', str_replace(".", "", $juni));
        $builder->set('juli', str_replace(".", "", $juli));
        $builder->set('agustus', str_replace(".", "", $agustus));
        $builder->set('september', str_replace(".", "", $september));
        $builder->set('oktober', str_replace(".", "", $oktober));
        $builder->set('november', str_replace(".", "", $november));
        $builder->set('desember', str_replace(".", "", $desember));
        $builder->set('created', time());
        $builder->where('kd_wilayah', $sessionKdwil);
        $builder->where('tahun', date("Y"));
        $builder->update();

        $update = $this->db->table('danadesa_anggaran');
        $update->set('created', time());
        $update->where('kd_wilayah', $sessionKdwil);
        $update->where('tahun', date("Y"));
        $update->update();
    }

    public function updateaksesKph($input, $sessionKdwil)
    {
        $januari = $input['januari'] != '' ? $input['januari'] : 0;
        $februari = $input['februari'] != '' ? $input['februari'] : 0;
        $maret = $input['maret'] != '' ? $input['maret'] : 0;
        $april = $input['april'] != '' ? $input['april'] : 0;
        $mei = $input['mei'] != '' ? $input['mei'] : 0;
        $juni = $input['juni'] != '' ? $input['juni'] : 0;
        $juli = $input['juli'] != '' ? $input['juli'] : 0;
        $agustus = $input['agustus'] != '' ? $input['agustus'] : 0;
        $september = $input['september'] != '' ? $input['september'] : 0;
        $oktober = $input['oktober'] != '' ? $input['oktober'] : 0;
        $november = $input['november'] != '' ? $input['november'] : 0;
        $desember = $input['desember'] != '' ? $input['desember'] : 0;

        $builder = $this->db->table('danadesa_kph');
        $builder->set('januari', str_replace(".", "", $januari));
        $builder->set('februari', str_replace(".", "", $februari));
        $builder->set('maret', str_replace(".", "", $maret));
        $builder->set('april', str_replace(".", "", $april));
        $builder->set('mei', str_replace(".", "", $mei));
        $builder->set('juni', str_replace(".", "", $juni));
        $builder->set('juli', str_replace(".", "", $juli));
        $builder->set('agustus', str_replace(".", "", $agustus));
        $builder->set('september', str_replace(".", "", $september));
        $builder->set('oktober', str_replace(".", "", $oktober));
        $builder->set('november', str_replace(".", "", $november));
        $builder->set('desember', str_replace(".", "", $desember));
        $builder->set('created', time());
        $builder->where('kd_wilayah', $sessionKdwil);
        $builder->where('tahun', date("Y"));
        $builder->update();

        $update = $this->db->table('danadesa_anggaran');
        $update->set('created', time());
        $update->where('kd_wilayah', $sessionKdwil);
        $update->where('tahun', date("Y"));
        $update->update();
    }

    public function updateaksesCovid($input, $sessionKdwil)
    {
        $januari = $input['januari'] != '' ? $input['januari'] : 0;
        $februari = $input['februari'] != '' ? $input['februari'] : 0;
        $maret = $input['maret'] != '' ? $input['maret'] : 0;
        $april = $input['april'] != '' ? $input['april'] : 0;
        $mei = $input['mei'] != '' ? $input['mei'] : 0;
        $juni = $input['juni'] != '' ? $input['juni'] : 0;
        $juli = $input['juli'] != '' ? $input['juli'] : 0;
        $agustus = $input['agustus'] != '' ? $input['agustus'] : 0;
        $september = $input['september'] != '' ? $input['september'] : 0;
        $oktober = $input['oktober'] != '' ? $input['oktober'] : 0;
        $november = $input['november'] != '' ? $input['november'] : 0;
        $desember = $input['desember'] != '' ? $input['desember'] : 0;

        $builder = $this->db->table('danadesa_covid');
        $builder->set('januari', str_replace(".", "", $januari));
        $builder->set('februari', str_replace(".", "", $februari));
        $builder->set('maret', str_replace(".", "", $maret));
        $builder->set('april', str_replace(".", "", $april));
        $builder->set('mei', str_replace(".", "", $mei));
        $builder->set('juni', str_replace(".", "", $juni));
        $builder->set('juli', str_replace(".", "", $juli));
        $builder->set('agustus', str_replace(".", "", $agustus));
        $builder->set('september', str_replace(".", "", $september));
        $builder->set('oktober', str_replace(".", "", $oktober));
        $builder->set('november', str_replace(".", "", $november));
        $builder->set('desember', str_replace(".", "", $desember));
        $builder->set('created', time());
        $builder->where('kd_wilayah', $sessionKdwil);
        $builder->where('tahun', date("Y"));
        $builder->update();

        $update = $this->db->table('danadesa_anggaran');
        $update->set('created', time());
        $update->where('kd_wilayah', $sessionKdwil);
        $update->where('tahun', date("Y"));
        $update->update();
    }
}
