<?php

// function sistem_information() // buat ngebatasin member mengakses file_id yang ga sesuai dengan permendagri_id nya
// {
//     helper('url');
//     $db = \Config\Database::connect();
//     $request = \Config\Services::request();
//     if (!session()->get('email')) {
//         return redirect()->to(site_url('sitkd/auth'));
//         // echo view('sitkd/auth/login');
//         die;
//     } else {
//         $builder = $db->table('dokumen_laporan');
//         $permendagri_id = session()->get('permendagri_id'); // aku butuh permendagri_id nya bukan file_id nya tapi berdasarkan file_id yang di click
//         $file_id = $request->uri->getSegment(4);

//         $builder->where(['permendagri_id' => $permendagri_id, 'file_id' => $file_id]);
//         $builder->where(['file_id' => $file_id]);
//         $userAccess = $builder->countAllResults();
//         // dd($userAccess);

//         if ($userAccess < 1) {
//             return redirect()->to(base_url('sitkd/auth/blocked'));
//             // return redirect(site_url('sitkd/auth/blocked'));
//             // echo view('sitkd/auth/blocked');
//             // die;
//         }
//     }
// }

// function buangspasi($teks)
// {
//     $teks = trim($teks);
//     while (strpos($teks, ' ')) {
//         $teks = str_replace(' ', '', $teks);
//     }
//     return $teks;
// }


function check_access($role_id, $menu_id) // untuk kegunaan menu apa saja yang bisa di kontrol admin SITKD
{
    $db = \Config\Database::connect();

    $builder = $db->table('sitkd_user_access_menu');
    $builder->where('role_id', $role_id);
    $builder->where('menu_id', $menu_id);

    if ($builder->countAllResults() > 0) {
        return "checked='checked'";
    }
}

function check_accessm($role_idm, $menu_idm) // untuk kegunaan menu apa saja yang bisa di kontrol moderator SITKD
{
    $db = \Config\Database::connect();

    $builder = $db->table('sitkd_user_access_menu');
    $builder->where('role_id', $role_idm);
    $builder->where('menu_id', $menu_idm);

    if ($builder->countAllResults() > 0) {
        return "checked='checked'";
    }
}

function check_access_sidesa($role_id, $menu_id) // untuk kegunaan menu apa saja yang bisa di kontrol admin SITKD
{
    $db = \Config\Database::connect();

    $builder = $db->table('sidesa_user_access_menu');
    $builder->where('role_id', $role_id);
    $builder->where('menu_id', $menu_id);

    if ($builder->countAllResults() > 0) {
        return "checked='checked'";
    }
}

function check_accessm_sidesa($role_idm, $menu_idm) // untuk kegunaan menu apa saja yang bisa di kontrol moderator SITKD
{
    $db = \Config\Database::connect();

    $builder = $db->table('sidesa_user_access_menu');
    $builder->where('role_id', $role_idm);
    $builder->where('menu_id', $menu_idm);

    if ($builder->countAllResults() > 0) {
        return "checked='checked'";
    }
}

function timeAgo($timestamp) // untuk kegunaan di fitur trackingnya SITKD
{
    date_default_timezone_set('Asia/Jakarta');
    $time = time() - intval($timestamp);

    if ($time < 60)
        return ($time > 1) ? $time . ' detik' : '1 detik';
    elseif ($time < 3600) {
        $tmp = floor($time / 60);
        return ($tmp > 1) ? $tmp . ' menit' : ' 1 menit';
    } elseif ($time < 86400) {
        $tmp = floor($time / 3600);
        return ($tmp > 1) ? $tmp . ' jam' : ' 1 jam';
    } elseif ($time < 2592000) {
        $tmp = floor($time / 86400);
        return ($tmp > 1) ? $tmp . ' hari' : ' 1 hari';
    } elseif ($time < 946080000) {
        $tmp = floor($time / 2592000);
        return ($tmp > 1) ? $tmp . ' bulan' : ' 1 bulan';
    } else {
        $tmp = floor($time / 946080000);
        return ($tmp > 1) ? $tmp . ' tahun' : ' 1 tahun';
    }
}

if (!function_exists('bulan')) { // untuk kegunaan di fitur trackingnya SITKD
    function bulan()
    {
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "JANUARI";
                break;
            case 2:
                $bulan = "FEBRUARI";
                break;
            case 3:
                $bulan = "MARET";
                break;
            case 4:
                $bulan = "APRIL";
                break;
            case 5:
                $bulan = "MEI";
                break;
            case 6:
                $bulan = "JUNI";
                break;
            case 7:
                $bulan = "JULI";
                break;
            case 8:
                $bulan = "AGUSTUS";
                break;
            case 9:
                $bulan = "SEPTEMBER";
                break;
            case 10:
                $bulan = "OKTOBER";
                break;
            case 11:
                $bulan = "NOVEMBER";
                break;
            case 12:
                $bulan = "DESEMBER";
                break;

            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }

    if (!function_exists('format_indo')) {
        function format_indo($date)
        {
            date_default_timezone_set('Asia/Jakarta');
            // array hari dan bulan
            $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
            $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

            // pemisahan tahun, bulan, hari, dan waktu
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl = substr($date, 8, 2);
            $waktu = substr($date, 11, 5);
            $hari = date("w", strtotime($date));
            $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;
            // $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

            return $result;
        }

        function format_indo_home($date)
        {
            date_default_timezone_set('Asia/Jakarta');
            // array hari dan bulan
            $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
            $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

            // pemisahan tahun, bulan, hari, dan waktu
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl = substr($date, 8, 2);
            $waktu = substr($date, 11, 5);
            $hari = date("w", strtotime($date));
            $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;

            return $result;
        }
    }
}
