<?php

namespace App\Models\Sidesa;

use CodeIgniter\Model;

use function PHPUnit\Framework\isEmpty;

class User_inputdata_model extends Model
{
    public function updateDataKab($input, $file, $kodekab, $user)
    {
        $builder = $this->db->table('dashboard_kabupaten');
        $inputby = $input['inputby'] != '' ? $input['inputby'] : NULL;
        $news1 = $input['news1'] != nl2br('') ? $input['news1'] : NULL;
        $news2 = $input['news2'] != nl2br('') ? $input['news2'] : NULL;
        $news3 = $input['news3'] != nl2br('') ? $input['news3'] : NULL;
        $news4 = $input['news4'] != nl2br('') ? $input['news4'] : NULL;
        $news5 = $input['news5'] != nl2br('') ? $input['news5'] : NULL;

        if ($file->getError() == 4) {
            $nmfile = $input['imagelama'];
        } else {
            $nmfile = $file->getRandomName();
            $file->move('img/bg/sidesa/kabupaten/', $nmfile);
            if ($input['imagelama'] != 'default.jpg') {
                unlink('img/bg/sidesa/kabupaten/' . $input['imagelama']);
            }
        }
        $builder->set('bghome', $nmfile);
        $builder->set('news1', $news1);
        $builder->set('news2', $news2);
        $builder->set('news3', $news3);
        $builder->set('news4', $news4);
        $builder->set('news5', $news5);
        $builder->set('update_at', time());
        $builder->set('input_by', $inputby);
        $builder->set('user_id', $user['user_id']);
        $builder->where('kodekab', $kodekab);
        $builder->update();
    }

    public function updateDataDes($input, $file, $kodedes, $user)
    {
        $builder = $this->db->table('dashboard_desa');
        $inputby = $input['inputby'] != '' ? $input['inputby'] : NULL;
        $news1 = $input['news1'] != nl2br('') ? $input['news1'] : NULL;
        $news2 = $input['news2'] != nl2br('') ? $input['news2'] : NULL;
        $news3 = $input['news3'] != nl2br('') ? $input['news3'] : NULL;
        $news4 = $input['news4'] != nl2br('') ? $input['news4'] : NULL;
        $news5 = $input['news5'] != nl2br('') ? $input['news5'] : NULL;

        if ($file->getError() == 4) {
            $nmfile = $input['imagelama'];
        } else {
            $nmfile = $file->getRandomName();
            $file->move('img/bg/sidesa/desa/', $nmfile);
            if ($input['imagelama'] != 'default.jpg') {
                unlink('img/bg/sidesa/desa/' . $input['imagelama']);
            }
        }
        $builder->set('bghome', $nmfile);
        $builder->set('news1', $news1);
        $builder->set('news2', $news2);
        $builder->set('news3', $news3);
        $builder->set('news4', $news4);
        $builder->set('news5', $news5);
        $builder->set('update_at', time());
        $builder->set('input_by', $inputby);
        $builder->set('user_id', $user['user_id']);
        $builder->where('kodedes', $kodedes);
        $builder->update();
    }

    public function notifikasi($kode, $user, $whois)
    {
        $builder = $this->db->table('sidesa_notifikasi');

        $insert1 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Input Data",
            "target" => "1",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $kode . ' ' . '(' . $whois . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $insert2 = array(
            "kd_wilayah" => $user['kd_wilayah'],
            "jenis_file" => "Input Data",
            "target" => "2",
            "read" => "N",
            "tanggal" => time(),
            "keterangan" => "waiting",
            "nama_notif" => $kode . ' ' . '(' . $whois . ')',
            "upload_by" => $user['nama'],
            "user_id" => $user['user_id'],
            "image_user" => $user['image']
        );

        $builder->insert($insert1);
        $builder->insert($insert2);
    }
}
