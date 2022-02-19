<?php

namespace App\Validation;

class Userrulesitkd
{
    protected $validation;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function validasiSITKD(string $str, string $fields, array $data)
    {
        $builder = $this->db->table('sitkd_user');
        $user = $builder->getWhere(['nip' => $data['nip']])->getRowArray();

        if (!password_verify($data['password'], $user['password']))
            return false;

        if (password_verify($data['password'], $user['password']))
            return true;
    }

    public function aktivasiSITKD(string $str, string $fields, array $data)
    {
        $builder = $this->db->table('sitkd_user');
        $user = $builder->getWhere(['nip' => $data['nip']])->getRowArray();

        if ($user['is_active'] != 1)
            return false;

        if ($user['is_active'] == 1)
            return true;
    }

    public function registrasiSITKD(string $str, string $fields, array $data)
    {
        $builder = $this->db->table('sitkd_user');
        $user = $builder->getWhere(['nip' => $data['nip']])->getRowArray();

        if (!$user)
            return false;

        if ($user)
            return true;
    }





    // if ($user) {
    //     if ($user['is_active'] == 1) {
    //         if (password_verify($data['password'], $user['password'])) {
    //             return true;
    //         } else {
    //             $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Password/NIP tidak terdaftar</div>');
    //             return redirect('sitkd/auth');
    //         }
    //     } else {
    //         $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Akun belum diaktifkan. Mohon hubungi admin / moderator!</div>');
    //         return redirect('sitkd/auth');
    //     }
    // } else {
    //     $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">NIP belum terdaftar. Silahkan registrasi</div>');
    //     return redirect('sitkd/auth');
    // }
}
