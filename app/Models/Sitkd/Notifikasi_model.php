<?php

namespace App\Models\Sitkd;

use CodeIgniter\Model;

class Notifikasi_model extends Model
{
    protected $table = 'sitkd_notifikasi';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['read', 'keterangan'];

    public function newFile($id)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->set('read', "Y");
        // $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
        // $builder->delete('notifikasi', array('id' => $id));
    }

    public function uploadFile($id)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
        // $builder->delete('notifikasi', array('id' => $id));
    }

    public function revisiFile($id)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
        // $builder->delete('notifikasi', array('id' => $id));
    }

    public function hasilrevrev($id)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
        // $builder->delete('notifikasi', array('id' => $id));
    }

    public function hasilrevpen($id)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
        // $builder->delete('notifikasi', array('id' => $id));
    }

    public function hasilVerif($id)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
        // $builder->delete('notifikasi', array('id' => $id));
    }

    public function perubahanStat($id)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
        // $builder->delete('notifikasi', array('id' => $id));
    }

    public function persetujuanStat($id)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
        // $builder->delete('notifikasi', array('id' => $id));
    }

    public function catatanStat($id)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->set('read', "Y");
        $builder->set('keterangan', "processed");
        $builder->where('id', $id);
        $builder->update();
        // $builder->delete('notifikasi', array('id' => $id));
    }

    public function countData($user)
    {
        $builder = $this->db->table('sitkd_notifikasi');
        $builder->join('sitkd_dispermades', 'sitkd_notifikasi.permendagri_id=sitkd_dispermades.permendagri_id', 'left');
        $builder->orderBy('tanggal', 'DESC');
        if ($user['role_id'] <= 2) {
            $builder->where('target', 2);
        } else {
            $builder->where('target', $user['permendagri_id']);
        }
        return $builder->get()->getResultArray();
    }
}
