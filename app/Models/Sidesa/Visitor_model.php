<?php

namespace App\Models\Sidesa;

use CodeIgniter\Database\BaseBuilder;

class Visitor_model extends BaseBuilder
{
    protected $db;
    protected $allowedFields = ['ip', 'date', 'hits', 'online', 'time'];

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getVisitor($ip, $date)
    {
        $builder = $this->db->table('visitor');
        $builder->where('ip', $ip);
        $builder->where('date', $date);
        $query = $builder->countAllResults();
        return $query;
    }

    public function insertVisitor($ip, $date, $waktu, $timeinsert)
    {
        $builder = $this->db->table('visitor');
        $data = [
            'ip' => $ip,
            'date'  => $date,
            'hits'  => 1,
            'online'  => $waktu,
            'time'  => $timeinsert
        ];
        $builder->insert($data);
        return $this->db->affectedRows();
    }

    public function updateVisitor($ip, $date, $waktu)
    {
        $builder = $this->db->table('visitor');
        $data = [
            'hits' => 'hits+1',
            'online' => $waktu
        ];
        $builder->set($data);
        $builder->where('ip', $ip);
        $builder->where('date', $date);
        $builder->update();
        return $this->db->affectedRows();
    }

    public function getPengunjunghariini($date)
    {
        $builder = $this->db->table('visitor');
        $builder->where('date', $date);
        $builder->groupBy('ip');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getTotalpengunjung()
    {
        $builder = $this->db->table('visitor');
        $builder->selectCount('ip');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getTotalakses()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getPengunjungonline($bataswaktu)
    {
        $builder = $this->db->table('visitor');
        $builder->where('online>', $bataswaktu);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getAksesjanuari($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-01');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesfebruari($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-02');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesmaret($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-03');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesapril($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-04');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesmei($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-05');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesjuni($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-06');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesjuli($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-07');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesagustus($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-08');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesseptember($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-09');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesoktober($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-10');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesnovember($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-11');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAksesdesember($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', $tahun . '-12');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getJanuari($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-01');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getFebruari($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-02');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getMaret($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-03');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getApril($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-04');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getMei($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-05');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getJuni($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-06');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getJuli($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-07');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getAgustus($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-08');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getSeptember($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-09');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getOktober($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-10');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getNovember($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-11');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getDesember($tahun)
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', $tahun . '-12');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2020()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2020');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2021()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2021');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2022()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2022');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2023()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2023');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2024()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2024');
        $query = $builder->countAllResults();
        return $query;
    }


    public function get2025()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2025');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2026()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2026');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2027()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2027');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2028()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2028');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2029()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2029');
        $query = $builder->countAllResults();
        return $query;
    }

    public function get2030()
    {
        $builder = $this->db->table('visitor');
        $builder->like('date', '2030');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getAkses2020()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2020');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2021()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2021');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2022()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2022');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2023()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2023');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2024()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2024');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2025()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2025');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2026()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2026');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2027()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2027');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2028()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2028');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2029()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2029');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getAkses2030()
    {
        $builder = $this->db->table('visitor');
        $builder->selectSum('hits');
        $builder->like('date', '2030');
        $query = $builder->get();
        return $query->getRow();
    }
}
