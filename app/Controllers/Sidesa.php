<?php

namespace App\Controllers;

use App\Models\Sidesa\Visitor_model;
use App\Models\Sidesa\User_datasidesa_model;
use App\Models\Sidesa\Pencarian_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sidesa extends BaseController
{
    protected $Visitor_model;
    protected $User_datasidesa_model;
    protected $Pencarian_model;

    public function __construct()
    {
        $this->Visitor_model = new Visitor_model();
        $this->User_datasidesa_model = new User_datasidesa_model();
        $this->Pencarian_model = new Pencarian_model();
    }

    public function index()
    {
        // Fitur counter data pengunjung
        $ip = $this->request->getIPAddress();
        $date = date("Y-m-d");
        $waktu = time();
        $timeinsert = date("Y-m-d H:i:s");
        $bataswaktu = time() - 300;
        $tahun = date("Y");
        $s = $this->Visitor_model->getVisitor($ip, $date);
        $ss = isset($s) ? ($s) : 0;
        if ($ss == 0) {
            $this->Visitor_model->insertVisitor($ip, $date, $waktu, $timeinsert);
        } else {
            $this->Visitor_model->updateVisitor($ip, $date, $waktu);
        }

        $download = $this->db->table('sidesa_review_data');
        // data olahan
        $data = [
            'title' => 'SIDesa Jawa Tengah',
            'totaldata' => $download->countAllResults(),
            'sidesareview' => $this->User_datasidesa_model->getData(),
            'pencarian' => $this->Pencarian_model->getData(),
            'pengunjunghariini' => $this->Visitor_model->getPengunjunghariini($date),
            'totalpengunjung' => $this->Visitor_model->getTotalpengunjung(),
            'totalakses' => $this->Visitor_model->getTotalakses(),
            'pengunjungonline' => $this->Visitor_model->getPengunjungonline($bataswaktu),
            'januari' => $this->Visitor_model->getJanuari($tahun),
            'februari' => $this->Visitor_model->getFebruari($tahun),
            'maret' => $this->Visitor_model->getMaret($tahun),
            'april' => $this->Visitor_model->getApril($tahun),
            'mei' => $this->Visitor_model->getMei($tahun),
            'juni' => $this->Visitor_model->getJuni($tahun),
            'juli' => $this->Visitor_model->getJuli($tahun),
            'agustus' => $this->Visitor_model->getAgustus($tahun),
            'september' => $this->Visitor_model->getSeptember($tahun),
            'oktober' => $this->Visitor_model->getOktober($tahun),
            'november' => $this->Visitor_model->getNovember($tahun),
            'desember' => $this->Visitor_model->getDesember($tahun),
            'aksesjanuari' => $this->Visitor_model->getAksesjanuari($tahun),
            'aksesfebruari' => $this->Visitor_model->getAksesfebruari($tahun),
            'aksesmaret' => $this->Visitor_model->getAksesmaret($tahun),
            'aksesapril' => $this->Visitor_model->getAksesapril($tahun),
            'aksesmei' => $this->Visitor_model->getAksesmei($tahun),
            'aksesjuni' => $this->Visitor_model->getAksesjuni($tahun),
            'aksesjuli' => $this->Visitor_model->getAksesjuli($tahun),
            'aksesagustus' => $this->Visitor_model->getAksesagustus($tahun),
            'aksesseptember' => $this->Visitor_model->getAksesseptember($tahun),
            'aksesoktober' => $this->Visitor_model->getAksesoktober($tahun),
            'aksesnovember' => $this->Visitor_model->getAksesoktober($tahun),
            'aksesdesember' => $this->Visitor_model->getAksesdesember($tahun),
            'pengunjung2020' => $this->Visitor_model->get2020(),
            'pengunjung2021' => $this->Visitor_model->get2021(),
            'pengunjung2022' => $this->Visitor_model->get2022(),
            'pengunjung2023' => $this->Visitor_model->get2023(),
            'pengunjung2024' => $this->Visitor_model->get2024(),
            'pengunjung2025' => $this->Visitor_model->get2025(),
            'pengunjung2026' => $this->Visitor_model->get2026(),
            'pengunjung2027' => $this->Visitor_model->get2027(),
            'pengunjung2028' => $this->Visitor_model->get2028(),
            'pengunjung2029' => $this->Visitor_model->get2029(),
            'pengunjung2030' => $this->Visitor_model->get2030(),
            'pengunjungakses2020' => $this->Visitor_model->getAkses2020(),
            'pengunjungakses2021' => $this->Visitor_model->getAkses2021(),
            'pengunjungakses2022' => $this->Visitor_model->getAkses2022(),
            'pengunjungakses2023' => $this->Visitor_model->getAkses2023(),
            'pengunjungakses2024' => $this->Visitor_model->getAkses2024(),
            'pengunjungakses2025' => $this->Visitor_model->getAkses2025(),
            'pengunjungakses2026' => $this->Visitor_model->getAkses2026(),
            'pengunjungakses2027' => $this->Visitor_model->getAkses2027(),
            'pengunjungakses2028' => $this->Visitor_model->getAkses2028(),
            'pengunjungakses2029' => $this->Visitor_model->getAkses2029(),
            'pengunjungakses2030' => $this->Visitor_model->getAkses2030(),
        ];
        return view('sidesa/index', $data);
    }

    function download($namadata, $tanggalupload)
    {
        if (substr($namadata, 0, 18) == "Kependudukan Agama") { ///////////////////// PENDUDUK AGAMA

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'periode_uid_semester');
            $sheet->setCellValue('C1', 'kd_wilayah');
            $sheet->setCellValue('D1', 'nm_kab');
            $sheet->setCellValue('E1', 'nm_kec');
            $sheet->setCellValue('F1', 'nm_desa');
            $sheet->setCellValue('G1', 'jiwa_agama_islam_pria');
            $sheet->setCellValue('H1', 'jiwa_agama_islam_perempuan');
            $sheet->setCellValue('I1', 'jiwa_agama_kristen_pria');
            $sheet->setCellValue('J1', 'jiwa_agama_kristen_perempuan');
            $sheet->setCellValue('K1', 'jiwa_agama_katholik_pria');
            $sheet->setCellValue('L1', 'jiwa_agama_katholik_perempuan');
            $sheet->setCellValue('M1', 'jiwa_agama_hindu_pria');
            $sheet->setCellValue('N1', 'jiwa_agama_hindu_perempuan');
            $sheet->setCellValue('O1', 'jiwa_agama_budha_pria');
            $sheet->setCellValue('P1', 'jiwa_agama_budha_perempuan');
            $sheet->setCellValue('Q1', 'jiwa_agama_konghucu_pria');
            $sheet->setCellValue('R1', 'jiwa_agama_konghucu_perempuan');
            $sheet->setCellValue('S1', 'jiwa_agama_alirankepercayaan_pria');
            $sheet->setCellValue('T1', 'jiwa_agama_alirankepercayaan_perempuan');

            $spreadsheet->getActiveSheet()->getStyle('A1:T1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];

            $spreadsheet->getActiveSheet()->getStyle('A1:T1')->applyFromArray($styleArray);


            if ($namadata == "Kependudukan Agama I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_penduduk_agama_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Agama I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_agama_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Agama II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_agama_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Agama I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_agama_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Agama II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_agama_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Agama I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_agama_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Agama II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_agama_II_2023($namadata, $tanggalupload,);
            } // elseif apa gitu kalo ada data agama yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->periode_uid_semester);
                $sheet->setCellValue('C' . $x, $row->kd_wilayah);
                $sheet->setCellValue('D' . $x, $row->nm_kab);
                $sheet->setCellValue('E' . $x, $row->nm_kec);
                $sheet->setCellValue('F' . $x, $row->nm_desa);
                $sheet->setCellValue('G' . $x, $row->jiwa_agama_islam_pria);
                $sheet->setCellValue('H' . $x, $row->jiwa_agama_islam_perempuan);
                $sheet->setCellValue('I' . $x, $row->jiwa_agama_kristen_pria);
                $sheet->setCellValue('J' . $x, $row->jiwa_agama_kristen_perempuan);
                $sheet->setCellValue('K' . $x, $row->jiwa_agama_katholik_pria);
                $sheet->setCellValue('L' . $x, $row->jiwa_agama_katholik_perempuan);
                $sheet->setCellValue('M' . $x, $row->jiwa_agama_hindu_pria);
                $sheet->setCellValue('N' . $x, $row->jiwa_agama_hindu_perempuan);
                $sheet->setCellValue('O' . $x, $row->jiwa_agama_budha_pria);
                $sheet->setCellValue('P' . $x, $row->jiwa_agama_budha_perempuan);
                $sheet->setCellValue('Q' . $x, $row->jiwa_agama_konghucu_pria);
                $sheet->setCellValue('R' . $x, $row->jiwa_agama_konghucu_perempuan);
                $sheet->setCellValue('S' . $x, $row->jiwa_agama_alirankepercayaan_pria);
                $sheet->setCellValue('T' . $x, $row->jiwa_agama_alirankepercayaan_perempuan);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:T' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 27) == "Kependudukan Golongan Darah") { ///////////////////// PENDUDUK GOLONGAN DARAH

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'periode_uid_semester');
            $sheet->setCellValue('C1', 'kd_wilayah');
            $sheet->setCellValue('D1', 'nm_kab');
            $sheet->setCellValue('E1', 'nm_kec');
            $sheet->setCellValue('F1', 'nm_desa');
            $sheet->setCellValue('G1', 'jiwa_goldar_a_pria');
            $sheet->setCellValue('H1', 'jiwa_goldar_a_perempuan');
            $sheet->setCellValue('I1', 'jiwa_goldar_b_pria');
            $sheet->setCellValue('J1', 'jiwa_goldar_b_perempuan');
            $sheet->setCellValue('K1', 'jiwa_goldar_ab_pria');
            $sheet->setCellValue('L1', 'jiwa_goldar_ab_perempuan');
            $sheet->setCellValue('M1', 'jiwa_goldar_o_pria');
            $sheet->setCellValue('N1', 'jiwa_goldar_o_perempuan');
            $sheet->setCellValue('O1', 'jiwa_goldar_a_plus_pria');
            $sheet->setCellValue('P1', 'jiwa_goldar_a_plus_perempuan');
            $sheet->setCellValue('Q1', 'jiwa_goldar_a_minus_pria');
            $sheet->setCellValue('R1', 'jiwa_goldar_a_minus_perempuan');
            $sheet->setCellValue('S1', 'jiwa_goldar_b_plus_pria');
            $sheet->setCellValue('T1', 'jiwa_goldar_b_plus_perempuan');
            $sheet->setCellValue('U1', 'jiwa_goldar_b_minus_pria');
            $sheet->setCellValue('V1', 'jiwa_goldar_b_minus_perempuan');
            $sheet->setCellValue('W1', 'jiwa_goldar_ab_plus_pria');
            $sheet->setCellValue('X1', 'jiwa_goldar_ab_plus_perempuan');
            $sheet->setCellValue('Y1', 'jiwa_goldar_ab_minus_pria');
            $sheet->setCellValue('Z1', 'jiwa_goldar_ab_minus_perempuan');
            $sheet->setCellValue('AA1', 'jiwa_goldar_o_plus_pria');
            $sheet->setCellValue('AB1', 'jiwa_goldar_o_plus_perempuan');
            $sheet->setCellValue('AC1', 'jiwa_goldar_o_minus_pria');
            $sheet->setCellValue('AD1', 'jiwa_goldar_o_minus_perempuan');
            $sheet->setCellValue('AE1', 'jiwa_goldar_tidaktau_pria');
            $sheet->setCellValue('AF1', 'jiwa_goldar_tidaktau_perempuan');

            $spreadsheet->getActiveSheet()->getStyle('A1:AF1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];

            $spreadsheet->getActiveSheet()->getStyle('A1:AF1')->applyFromArray($styleArray);


            if ($namadata == "Kependudukan Golongan Darah I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_penduduk_darah_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Golongan Darah I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_darah_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Golongan Darah II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_darah_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Golongan Darah I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_darah_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Golongan Darah II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_darah_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Golongan Darah I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_darah_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Golongan Darah II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_darah_II_2023($namadata, $tanggalupload,);
            } // elseif apa gitu kalo ada data darah yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->periode_uid_semester);
                $sheet->setCellValue('C' . $x, $row->kd_wilayah);
                $sheet->setCellValue('D' . $x, $row->nm_kab);
                $sheet->setCellValue('E' . $x, $row->nm_kec);
                $sheet->setCellValue('F' . $x, $row->nm_desa);
                $sheet->setCellValue('G' . $x, $row->jiwa_goldar_a_pria);
                $sheet->setCellValue('H' . $x, $row->jiwa_goldar_a_perempuan);
                $sheet->setCellValue('I' . $x, $row->jiwa_goldar_b_pria);
                $sheet->setCellValue('J' . $x, $row->jiwa_goldar_b_perempuan);
                $sheet->setCellValue('K' . $x, $row->jiwa_goldar_ab_pria);
                $sheet->setCellValue('L' . $x, $row->jiwa_goldar_ab_perempuan);
                $sheet->setCellValue('M' . $x, $row->jiwa_goldar_o_pria);
                $sheet->setCellValue('N' . $x, $row->jiwa_goldar_o_perempuan);
                $sheet->setCellValue('O' . $x, $row->jiwa_goldar_a_plus_pria);
                $sheet->setCellValue('P' . $x, $row->jiwa_goldar_a_plus_perempuan);
                $sheet->setCellValue('Q' . $x, $row->jiwa_goldar_a_minus_pria);
                $sheet->setCellValue('R' . $x, $row->jiwa_goldar_a_minus_perempuan);
                $sheet->setCellValue('S' . $x, $row->jiwa_goldar_b_plus_pria);
                $sheet->setCellValue('T' . $x, $row->jiwa_goldar_b_plus_perempuan);
                $sheet->setCellValue('U' . $x, $row->jiwa_goldar_b_minus_pria);
                $sheet->setCellValue('V' . $x, $row->jiwa_goldar_b_minus_perempuan);
                $sheet->setCellValue('W' . $x, $row->jiwa_goldar_ab_plus_pria);
                $sheet->setCellValue('X' . $x, $row->jiwa_goldar_ab_plus_perempuan);
                $sheet->setCellValue('Y' . $x, $row->jiwa_goldar_ab_minus_pria);
                $sheet->setCellValue('Z' . $x, $row->jiwa_goldar_ab_minus_perempuan);
                $sheet->setCellValue('AA' . $x, $row->jiwa_goldar_o_plus_pria);
                $sheet->setCellValue('AB' . $x, $row->jiwa_goldar_o_plus_perempuan);
                $sheet->setCellValue('AC' . $x, $row->jiwa_goldar_o_minus_pria);
                $sheet->setCellValue('AD' . $x, $row->jiwa_goldar_o_minus_perempuan);
                $sheet->setCellValue('AE' . $x, $row->jiwa_goldar_tidaktau_pria);
                $sheet->setCellValue('AF' . $x, $row->jiwa_goldar_tidaktau_perempuan);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:AF' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 26) == "Kependudukan Jenis Kelamin") { ///////////////////// PENDUDUK GOLONGAN DARAH

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'periode_uid_semester');
            $sheet->setCellValue('C1', 'kd_wilayah');
            $sheet->setCellValue('D1', 'nm_kab');
            $sheet->setCellValue('E1', 'nm_kec');
            $sheet->setCellValue('F1', 'nm_desa');
            $sheet->setCellValue('G1', 'jiwa_pria');
            $sheet->setCellValue('H1', 'jiwa_perempuan');

            $spreadsheet->getActiveSheet()->getStyle('A1:H1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];

            $spreadsheet->getActiveSheet()->getStyle('A1:H1')->applyFromArray($styleArray);


            if ($namadata == "Kependudukan Jenis Kelamin I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_penduduk_kelamin_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Jenis Kelamin I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_kelamin_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Jenis Kelamin II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_kelamin_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Jenis Kelamin I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_kelamin_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Jenis Kelamin II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_kelamin_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Jenis Kelamin I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_kelamin_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Jenis Kelamin II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_kelamin_II_2023($namadata, $tanggalupload,);
            } // elseif apa gitu kalo ada data kelamin yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->periode_uid_semester);
                $sheet->setCellValue('C' . $x, $row->kd_wilayah);
                $sheet->setCellValue('D' . $x, $row->nm_kab);
                $sheet->setCellValue('E' . $x, $row->nm_kec);
                $sheet->setCellValue('F' . $x, $row->nm_desa);
                $sheet->setCellValue('G' . $x, $row->jiwa_pria);
                $sheet->setCellValue('H' . $x, $row->jiwa_perempuan);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:H' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 26) == "Kependudukan Kelompok Usia") { ///////////////////// PENDUDUK KELOMPOK USIA

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'periode_uid_semester');
            $sheet->setCellValue('C1', 'kd_wilayah');
            $sheet->setCellValue('D1', 'nm_kab');
            $sheet->setCellValue('E1', 'nm_kec');
            $sheet->setCellValue('F1', 'nm_desa');
            $sheet->setCellValue('G1', 'jw_l_4');
            $sheet->setCellValue('H1', 'jw_p_4');
            $sheet->setCellValue('I1', 'jw_l_9');
            $sheet->setCellValue('J1', 'jw_p_9');
            $sheet->setCellValue('K1', 'jw_l_14');
            $sheet->setCellValue('L1', 'jw_p_14');
            $sheet->setCellValue('M1', 'jw_l_19');
            $sheet->setCellValue('N1', 'jw_p_19');
            $sheet->setCellValue('O1', 'jw_l_24');
            $sheet->setCellValue('P1', 'jw_p_24');
            $sheet->setCellValue('Q1', 'jw_l_29');
            $sheet->setCellValue('R1', 'jw_p_29');
            $sheet->setCellValue('S1', 'jw_l_34');
            $sheet->setCellValue('T1', 'jw_p_34');
            $sheet->setCellValue('U1', 'jw_l_39');
            $sheet->setCellValue('V1', 'jw_p_39');
            $sheet->setCellValue('W1', 'jw_l_44');
            $sheet->setCellValue('X1', 'jw_p_44');
            $sheet->setCellValue('Y1', 'jw_l_49');
            $sheet->setCellValue('Z1', 'jw_p_49');
            $sheet->setCellValue('AA1', 'jw_l_54');
            $sheet->setCellValue('AB1', 'jw_p_54');
            $sheet->setCellValue('AC1', 'jw_l_59');
            $sheet->setCellValue('AD1', 'jw_p_59');
            $sheet->setCellValue('AE1', 'jw_l_64');
            $sheet->setCellValue('AF1', 'jw_p_64');
            $sheet->setCellValue('AG1', 'jw_l_69');
            $sheet->setCellValue('AH1', 'jw_p_69');
            $sheet->setCellValue('AI1', 'jw_l_74');
            $sheet->setCellValue('AJ1', 'jw_p_74');
            $sheet->setCellValue('AK1', 'jw_l_75');
            $sheet->setCellValue('AL1', 'jw_p_75');

            $spreadsheet->getActiveSheet()->getStyle('A1:AL1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:AL1')->applyFromArray($styleArray);

            if ($namadata == "Kependudukan Kelompok Usia I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_penduduk_usia_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kelompok Usia I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_usia_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kelompok Usia II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_usia_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kelompok Usia I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_usia_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kelompok Usia II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_usia_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kelompok Usia I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_usia_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kelompok Usia II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_usia_II_2023($namadata, $tanggalupload,);
            } // elseif apa gitu kalo ada data usia yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->periode_uid_semester);
                $sheet->setCellValue('C' . $x, $row->kd_wilayah);
                $sheet->setCellValue('D' . $x, $row->nm_kab);
                $sheet->setCellValue('E' . $x, $row->nm_kec);
                $sheet->setCellValue('F' . $x, $row->nm_desa);
                $sheet->setCellValue('G' . $x, $row->jw_l_4);
                $sheet->setCellValue('H' . $x, $row->jw_p_4);
                $sheet->setCellValue('I' . $x, $row->jw_l_9);
                $sheet->setCellValue('J' . $x, $row->jw_p_9);
                $sheet->setCellValue('K' . $x, $row->jw_l_14);
                $sheet->setCellValue('L' . $x, $row->jw_p_14);
                $sheet->setCellValue('M' . $x, $row->jw_l_19);
                $sheet->setCellValue('N' . $x, $row->jw_p_19);
                $sheet->setCellValue('O' . $x, $row->jw_l_24);
                $sheet->setCellValue('P' . $x, $row->jw_p_24);
                $sheet->setCellValue('Q' . $x, $row->jw_l_29);
                $sheet->setCellValue('R' . $x, $row->jw_p_29);
                $sheet->setCellValue('S' . $x, $row->jw_l_34);
                $sheet->setCellValue('T' . $x, $row->jw_p_34);
                $sheet->setCellValue('U' . $x, $row->jw_l_39);
                $sheet->setCellValue('V' . $x, $row->jw_p_39);
                $sheet->setCellValue('W' . $x, $row->jw_l_44);
                $sheet->setCellValue('X' . $x, $row->jw_p_44);
                $sheet->setCellValue('Y' . $x, $row->jw_l_49);
                $sheet->setCellValue('Z' . $x, $row->jw_p_49);
                $sheet->setCellValue('AA' . $x, $row->jw_l_54);
                $sheet->setCellValue('AB' . $x, $row->jw_p_54);
                $sheet->setCellValue('AC' . $x, $row->jw_l_59);
                $sheet->setCellValue('AD' . $x, $row->jw_p_59);
                $sheet->setCellValue('AE' . $x, $row->jw_l_64);
                $sheet->setCellValue('AF' . $x, $row->jw_p_64);
                $sheet->setCellValue('AG' . $x, $row->jw_l_69);
                $sheet->setCellValue('AH' . $x, $row->jw_p_69);
                $sheet->setCellValue('AI' . $x, $row->jw_l_74);
                $sheet->setCellValue('AJ' . $x, $row->jw_p_74);
                $sheet->setCellValue('AK' . $x, $row->jw_l_75);
                $sheet->setCellValue('AL' . $x, $row->jw_p_75);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AG')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AI')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AK')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AL')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:AL' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 27) == "Kependudukan Kepemilikan KK") { ///////////////////// PENDUDUK KEPEMILIKAN KK

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'periode_uid_semester');
            $sheet->setCellValue('C1', 'kd_wilayah');
            $sheet->setCellValue('D1', 'nm_kab');
            $sheet->setCellValue('E1', 'nm_kec');
            $sheet->setCellValue('F1', 'nm_desa');
            $sheet->setCellValue('G1', 'kk_pria');
            $sheet->setCellValue('H1', 'kk_perempuan');
            $sheet->setCellValue('I1', 'kk_kepemilikankk_pria');
            $sheet->setCellValue('J1', 'kk_kepemilikankk_perempuan');

            $spreadsheet->getActiveSheet()->getStyle('A1:J1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:J1')->applyFromArray($styleArray);

            if ($namadata == "Kependudukan Kepemilikan KK I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_penduduk_KK_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kepemilikan KK I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_KK_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kepemilikan KK II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_KK_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kepemilikan KK I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_KK_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kepemilikan KK II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_KK_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kepemilikan KK I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_KK_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Kepemilikan KK II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_KK_II_2023($namadata, $tanggalupload,);
            } // elseif apa gitu kalo ada data KK yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->periode_uid_semester);
                $sheet->setCellValue('C' . $x, $row->kd_wilayah);
                $sheet->setCellValue('D' . $x, $row->nm_kab);
                $sheet->setCellValue('E' . $x, $row->nm_kec);
                $sheet->setCellValue('F' . $x, $row->nm_desa);
                $sheet->setCellValue('G' . $x, $row->kk_pria);
                $sheet->setCellValue('H' . $x, $row->kk_perempuan);
                $sheet->setCellValue('I' . $x, $row->kk_kepemilikankk_pria);
                $sheet->setCellValue('J' . $x, $row->kk_kepemilikankk_perempuan);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:J' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 22) == "Kependudukan Pekerjaan") { ///////////////////// PENDUDUK PEKERJAAN

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'periode_uid_semester');
            $sheet->setCellValue('C1', 'kd_wilayah');
            $sheet->setCellValue('D1', 'nm_kab');
            $sheet->setCellValue('E1', 'nm_kec');
            $sheet->setCellValue('F1', 'nm_desa');
            $sheet->setCellValue('G1', 'jiwa_kerja_pendudukan_belum_tidakbekerja_pria');
            $sheet->setCellValue('H1', 'jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan');
            $sheet->setCellValue('I1', 'jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria');
            $sheet->setCellValue('J1', 'jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan');
            $sheet->setCellValue('K1', 'jiwa_kerja_pendudukan_pelajar_mahasiswa_pria');
            $sheet->setCellValue('L1', 'jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan');
            $sheet->setCellValue('M1', 'jiwa_kerja_pendudukan_pensiunan_pria');
            $sheet->setCellValue('N1', 'jiwa_kerja_pendudukan_pensiunan_perempuan');
            $sheet->setCellValue('O1', 'jiwa_kerja_pendudukan_pns_pria');
            $sheet->setCellValue('P1', 'jiwa_kerja_pendudukan_pns_perempuan');
            $sheet->setCellValue('Q1', 'jiwa_kerja_pendudukan_tni_pria');
            $sheet->setCellValue('R1', 'jiwa_kerja_pendudukan_tni_perempuan');
            $sheet->setCellValue('S1', 'jiwa_kerja_pendudukan_polri_pria');
            $sheet->setCellValue('T1', 'jiwa_kerja_pendudukan_polri_perempuan');
            $sheet->setCellValue('U1', 'jiwa_kerja_pendudukan_perdagangan_pria');
            $sheet->setCellValue('V1', 'jiwa_kerja_pendudukan_perdagangan_perempuan');
            $sheet->setCellValue('W1', 'jiwa_kerja_pendudukan_petanipekebun_pria');
            $sheet->setCellValue('X1', 'jiwa_kerja_pendudukan_petanipekebun_perempuan');
            $sheet->setCellValue('Y1', 'jiwa_kerja_pendudukan_peternak_pria');
            $sheet->setCellValue('Z1', 'jiwa_kerja_pendudukan_peternak_perempuan');

            $spreadsheet->getActiveSheet()->getStyle('A1:Z1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:Z1')->applyFromArray($styleArray);

            if ($namadata == "Kependudukan Pekerjaan I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pekerjaan_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pekerjaan I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pekerjaan_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pekerjaan II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pekerjaan_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pekerjaan I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pekerjaan_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pekerjaan II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pekerjaan_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pekerjaan I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pekerjaan_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pekerjaan II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pekerjaan_II_2023($namadata, $tanggalupload,);
            } // elseif apa gitu kalo ada data pekerjaan yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->periode_uid_semester);
                $sheet->setCellValue('C' . $x, $row->kd_wilayah);
                $sheet->setCellValue('D' . $x, $row->nm_kab);
                $sheet->setCellValue('E' . $x, $row->nm_kec);
                $sheet->setCellValue('F' . $x, $row->nm_desa);
                $sheet->setCellValue('G' . $x, $row->jiwa_kerja_pendudukan_belum_tidakbekerja_pria);
                $sheet->setCellValue('H' . $x, $row->jiwa_kerja_pendudukan_belum_tidakbekerja_perempuan);
                $sheet->setCellValue('I' . $x, $row->jiwa_kerja_pendudukan_mengurus_rumah_tangga_pria);
                $sheet->setCellValue('J' . $x, $row->jiwa_kerja_pendudukan_mengurus_rumah_tangga_perempuan);
                $sheet->setCellValue('K' . $x, $row->jiwa_kerja_pendudukan_pelajar_mahasiswa_pria);
                $sheet->setCellValue('L' . $x, $row->jiwa_kerja_pendudukan_pelajar_mahasiswa_perempuan);
                $sheet->setCellValue('M' . $x, $row->jiwa_kerja_pendudukan_pensiunan_pria);
                $sheet->setCellValue('N' . $x, $row->jiwa_kerja_pendudukan_pensiunan_perempuan);
                $sheet->setCellValue('O' . $x, $row->jiwa_kerja_pendudukan_pns_pria);
                $sheet->setCellValue('P' . $x, $row->jiwa_kerja_pendudukan_pns_perempuan);
                $sheet->setCellValue('Q' . $x, $row->jiwa_kerja_pendudukan_tni_pria);
                $sheet->setCellValue('R' . $x, $row->jiwa_kerja_pendudukan_tni_perempuan);
                $sheet->setCellValue('S' . $x, $row->jiwa_kerja_pendudukan_polri_pria);
                $sheet->setCellValue('T' . $x, $row->jiwa_kerja_pendudukan_polri_perempuan);
                $sheet->setCellValue('U' . $x, $row->jiwa_kerja_pendudukan_perdagangan_pria);
                $sheet->setCellValue('V' . $x, $row->jiwa_kerja_pendudukan_perdagangan_perempuan);
                $sheet->setCellValue('W' . $x, $row->jiwa_kerja_pendudukan_petanipekebun_pria);
                $sheet->setCellValue('X' . $x, $row->jiwa_kerja_pendudukan_petanipekebun_perempuan);
                $sheet->setCellValue('Y' . $x, $row->jiwa_kerja_pendudukan_peternak_pria);
                $sheet->setCellValue('Z' . $x, $row->jiwa_kerja_pendudukan_peternak_perempuan);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:Z' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 23) == "Kependudukan Pendidikan") { ///////////////////// PENDUDUK PENDIDIKAN

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'periode_uid_semester');
            $sheet->setCellValue('C1', 'kd_wilayah');
            $sheet->setCellValue('D1', 'nm_kab');
            $sheet->setCellValue('E1', 'nm_kec');
            $sheet->setCellValue('F1', 'nm_desa');
            $sheet->setCellValue('G1', 'kk_pendidikan_belum_tidaksekolah_pria');
            $sheet->setCellValue('H1', 'kk_pendidikan_belum_tidaksekolah_perempuan');
            $sheet->setCellValue('I1', 'kk_pendidikan_belumtamatsd_sederajat_pria');
            $sheet->setCellValue('J1', 'kk_pendidikan_belumtamatsd_sederajat_perempuan');
            $sheet->setCellValue('K1', 'kk_pendidikan_tamatsd_sederajat_pria');
            $sheet->setCellValue('L1', 'kk_pendidikan_tamatsd_sederajat_perempuan');
            $sheet->setCellValue('M1', 'kk_pendidikan_sltp_sederajat_pria');
            $sheet->setCellValue('N1', 'kk_pendidikan_sltp_sederajat_perempuan');
            $sheet->setCellValue('O1', 'kk_pendidikan_slta_sederajat_pria');
            $sheet->setCellValue('P1', 'kk_pendidikan_slta_sederajat_perempuan');
            $sheet->setCellValue('Q1', 'kk_pendidikan_diploma_1_2_pria');
            $sheet->setCellValue('R1', 'kk_pendidikan_diploma_1_2_perempuan');
            $sheet->setCellValue('S1', 'kk_pendidikan_akademi_diploma_3_smuda_pria');
            $sheet->setCellValue('T1', 'kk_pendidikan_akademi_diploma_3_smuda_perempuan');
            $sheet->setCellValue('U1', 'kk_pendidikan_diploma_4_strata_1_pria');
            $sheet->setCellValue('V1', 'kk_pendidikan_diploma_4_strata_1_perempuan');
            $sheet->setCellValue('W1', 'kk_pendidikan_strata2_pria');
            $sheet->setCellValue('X1', 'kk_pendidikan_strata2_perempuan');
            $sheet->setCellValue('Y1', 'kk_pendidikan_strata3_pria');
            $sheet->setCellValue('Z1', 'kk_pendidikan_strata3_perempuan');

            $spreadsheet->getActiveSheet()->getStyle('A1:Z1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:Z1')->applyFromArray($styleArray);

            if ($namadata == "Kependudukan Pendidikan I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pendidikan_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pendidikan I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pendidikan_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pendidikan II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pendidikan_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pendidikan I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pendidikan_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pendidikan II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pendidikan_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pendidikan I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pendidikan_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "Kependudukan Pendidikan II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_penduduk_pendidikan_II_2023($namadata, $tanggalupload,);
            } // elseif apa gitu kalo ada data pendidikan yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->periode_uid_semester);
                $sheet->setCellValue('C' . $x, $row->kd_wilayah);
                $sheet->setCellValue('D' . $x, $row->nm_kab);
                $sheet->setCellValue('E' . $x, $row->nm_kec);
                $sheet->setCellValue('F' . $x, $row->nm_desa);
                $sheet->setCellValue('G' . $x, $row->kk_pendidikan_belum_tidaksekolah_pria);
                $sheet->setCellValue('H' . $x, $row->kk_pendidikan_belum_tidaksekolah_perempuan);
                $sheet->setCellValue('I' . $x, $row->kk_pendidikan_belumtamatsd_sederajat_pria);
                $sheet->setCellValue('J' . $x, $row->kk_pendidikan_belumtamatsd_sederajat_perempuan);
                $sheet->setCellValue('K' . $x, $row->kk_pendidikan_tamatsd_sederajat_pria);
                $sheet->setCellValue('L' . $x, $row->kk_pendidikan_tamatsd_sederajat_perempuan);
                $sheet->setCellValue('M' . $x, $row->kk_pendidikan_sltp_sederajat_pria);
                $sheet->setCellValue('N' . $x, $row->kk_pendidikan_sltp_sederajat_perempuan);
                $sheet->setCellValue('O' . $x, $row->kk_pendidikan_slta_sederajat_pria);
                $sheet->setCellValue('P' . $x, $row->kk_pendidikan_slta_sederajat_perempuan);
                $sheet->setCellValue('Q' . $x, $row->kk_pendidikan_diploma_1_2_pria);
                $sheet->setCellValue('R' . $x, $row->kk_pendidikan_diploma_1_2_perempuan);
                $sheet->setCellValue('S' . $x, $row->kk_pendidikan_akademi_diploma_3_smuda_pria);
                $sheet->setCellValue('T' . $x, $row->kk_pendidikan_akademi_diploma_3_smuda_perempuan);
                $sheet->setCellValue('U' . $x, $row->kk_pendidikan_diploma_4_strata_1_pria);
                $sheet->setCellValue('V' . $x, $row->kk_pendidikan_diploma_4_strata_1_perempuan);
                $sheet->setCellValue('W' . $x, $row->kk_pendidikan_strata2_pria);
                $sheet->setCellValue('X' . $x, $row->kk_pendidikan_strata2_perempuan);
                $sheet->setCellValue('Y' . $x, $row->kk_pendidikan_strata3_pria);
                $sheet->setCellValue('Z' . $x, $row->kk_pendidikan_strata3_perempuan);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:Z' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 8) == "DTKS BAB") { ///////////////////// PENDUDUK PEKERJAAN

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nmkab');
            $sheet->setCellValue('D1', 'nmkec');
            $sheet->setCellValue('E1', 'nmdes');
            $sheet->setCellValue('F1', 'milik_sendiri');
            $sheet->setCellValue('G1', 'bersama');
            $sheet->setCellValue('H1', 'umum');
            $sheet->setCellValue('I1', 'tidak_ada');
            $sheet->setCellValue('J1', 'tanpa_keterangan');
            $sheet->setCellValue('K1', 'grand_total');
            $sheet->setCellValue('L1', 'penetapan');
            $sheet->setCellValue('M1', 'dtks_version');

            $spreadsheet->getActiveSheet()->getStyle('A1:M1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:M1')->applyFromArray($styleArray);

            if ($namadata == "DTKS BAB I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB II" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_II_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB III" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_III_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB IV" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_IV_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB III" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_III_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB IV" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_IV_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_II_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB III" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_III_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAB IV" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_bab_IV_2023($namadata, $tanggalupload,);
            }  // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nmkab);
                $sheet->setCellValue('D' . $x, $row->nmkec);
                $sheet->setCellValue('E' . $x, $row->nmdes);
                $sheet->setCellValue('F' . $x, $row->milik_sendiri);
                $sheet->setCellValue('G' . $x, $row->bersama);
                $sheet->setCellValue('H' . $x, $row->umum);
                $sheet->setCellValue('I' . $x, $row->tidak_ada);
                $sheet->setCellValue('J' . $x, $row->tanpa_keterangan);
                $sheet->setCellValue('K' . $x, $row->grand_total);
                $sheet->setCellValue('L' . $x, $row->penetapan);
                $sheet->setCellValue('M' . $x, $row->dtks_version);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:M' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 13) == "DTKS DESILART") { ///////////////////// DTKS DESIL ART

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nmkab');
            $sheet->setCellValue('D1', 'nmkec');
            $sheet->setCellValue('E1', 'nmdes');
            $sheet->setCellValue('F1', 'desil1');
            $sheet->setCellValue('G1', 'desil2');
            $sheet->setCellValue('H1', 'desil3');
            $sheet->setCellValue('I1', 'desil4');
            $sheet->setCellValue('J1', 'desil4plus');
            $sheet->setCellValue('K1', 'tanpa_keterangan');
            $sheet->setCellValue('L1', 'grand_total');
            $sheet->setCellValue('M1', 'penetapan');
            $sheet->setCellValue('N1', 'dtks_version');

            $spreadsheet->getActiveSheet()->getStyle('A1:N1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:N1')->applyFromArray($styleArray);

            if ($namadata == "DTKS DESILART I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART II" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_II_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART III" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_III_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART IV" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_IV_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART III" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_III_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART IV" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_IV_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_II_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART III" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_III_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILART IV" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilart_IV_2023($namadata, $tanggalupload,);
            }  // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nmkab);
                $sheet->setCellValue('D' . $x, $row->nmkec);
                $sheet->setCellValue('E' . $x, $row->nmdes);
                $sheet->setCellValue('F' . $x, $row->desil1);
                $sheet->setCellValue('G' . $x, $row->desil2);
                $sheet->setCellValue('H' . $x, $row->desil3);
                $sheet->setCellValue('I' . $x, $row->desil4);
                $sheet->setCellValue('J' . $x, $row->desil4plus);
                $sheet->setCellValue('K' . $x, $row->tanpa_keterangan);
                $sheet->setCellValue('L' . $x, $row->grand_total);
                $sheet->setCellValue('M' . $x, $row->penetapan);
                $sheet->setCellValue('N' . $x, $row->dtks_version);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:N' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 13) == "DTKS DESILKRT") { ///////////////////// DTKS DESIL KRT

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nmkab');
            $sheet->setCellValue('D1', 'nmkec');
            $sheet->setCellValue('E1', 'nmdes');
            $sheet->setCellValue('F1', 'desil1');
            $sheet->setCellValue('G1', 'desil2');
            $sheet->setCellValue('H1', 'desil3');
            $sheet->setCellValue('I1', 'desil4');
            $sheet->setCellValue('J1', 'desil4plus');
            $sheet->setCellValue('K1', 'tanpa_keterangan');
            $sheet->setCellValue('L1', 'grand_total');
            $sheet->setCellValue('M1', 'penetapan');
            $sheet->setCellValue('N1', 'dtks_version');

            $spreadsheet->getActiveSheet()->getStyle('A1:N1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:N1')->applyFromArray($styleArray);

            if ($namadata == "DTKS DESILKRT I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT II" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_II_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT III" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_III_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT IV" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_IV_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT III" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_III_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT IV" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_IV_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_II_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT III" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_III_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DESILKRT IV" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_desilkrt_IV_2023($namadata, $tanggalupload,);
            }  // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nmkab);
                $sheet->setCellValue('D' . $x, $row->nmkec);
                $sheet->setCellValue('E' . $x, $row->nmdes);
                $sheet->setCellValue('F' . $x, $row->desil1);
                $sheet->setCellValue('G' . $x, $row->desil2);
                $sheet->setCellValue('H' . $x, $row->desil3);
                $sheet->setCellValue('I' . $x, $row->desil4);
                $sheet->setCellValue('J' . $x, $row->desil4plus);
                $sheet->setCellValue('K' . $x, $row->tanpa_keterangan);
                $sheet->setCellValue('L' . $x, $row->grand_total);
                $sheet->setCellValue('M' . $x, $row->penetapan);
                $sheet->setCellValue('N' . $x, $row->dtks_version);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:N' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 18) == "DTKS BAHAN MEMASAK") { ///////////////////// DTKS BAHAN MASAK

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nmkab');
            $sheet->setCellValue('D1', 'nmkec');
            $sheet->setCellValue('E1', 'nmdes');
            $sheet->setCellValue('F1', 'listrik_gas');
            $sheet->setCellValue('G1', 'minyak_tanah');
            $sheet->setCellValue('H1', 'briket_arang_kayu');
            $sheet->setCellValue('I1', 'tidak_memasak');
            $sheet->setCellValue('J1', 'tanpa_keterangan');
            $sheet->setCellValue('K1', 'grand_total');
            $sheet->setCellValue('L1', 'penetapan');
            $sheet->setCellValue('M1', 'dtks_version');

            $spreadsheet->getActiveSheet()->getStyle('A1:M1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:M1')->applyFromArray($styleArray);

            if ($namadata == "DTKS BAHAN MEMASAK I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK II" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_II_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK III" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_III_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK IV" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_IV_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK III" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_III_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK IV" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_IV_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_II_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK III" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_III_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS BAHAN MEMASAK IV" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_masak_IV_2023($namadata, $tanggalupload,);
            }  // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nmkab);
                $sheet->setCellValue('D' . $x, $row->nmkec);
                $sheet->setCellValue('E' . $x, $row->nmdes);
                $sheet->setCellValue('F' . $x, $row->listrik_gas);
                $sheet->setCellValue('G' . $x, $row->minyak_tanah);
                $sheet->setCellValue('H' . $x, $row->briket_arang_kayu);
                $sheet->setCellValue('I' . $x, $row->tidak_memasak);
                $sheet->setCellValue('J' . $x, $row->tanpa_keterangan);
                $sheet->setCellValue('K' . $x, $row->grand_total);
                $sheet->setCellValue('L' . $x, $row->penetapan);
                $sheet->setCellValue('M' . $x, $row->dtks_version);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:M' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 15) == "DTKS SUMBER AIR") { ///////////////////// DTKS MINUM

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nmkab');
            $sheet->setCellValue('D1', 'nmkec');
            $sheet->setCellValue('E1', 'nmdes');
            $sheet->setCellValue('F1', 'air_kemasan');
            $sheet->setCellValue('G1', 'air_ledeng');
            $sheet->setCellValue('H1', 'sumber_terlindung');
            $sheet->setCellValue('I1', 'sumber_takterlindung');
            $sheet->setCellValue('J1', 'lainnya');
            $sheet->setCellValue('K1', 'tanpa_keterangan');
            $sheet->setCellValue('L1', 'grand_total');
            $sheet->setCellValue('M1', 'penetapan');
            $sheet->setCellValue('N1', 'dtks_version');

            $spreadsheet->getActiveSheet()->getStyle('A1:N1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:N1')->applyFromArray($styleArray);

            if ($namadata == "DTKS SUMBER AIR I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR II" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_II_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR III" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_III_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR IV" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_IV_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR III" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_III_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR IV" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_IV_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_II_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR III" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_III_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS SUMBER AIR IV" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_minum_IV_2023($namadata, $tanggalupload,);
            }  // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nmkab);
                $sheet->setCellValue('D' . $x, $row->nmkec);
                $sheet->setCellValue('E' . $x, $row->nmdes);
                $sheet->setCellValue('F' . $x, $row->air_kemasan);
                $sheet->setCellValue('G' . $x, $row->air_ledeng);
                $sheet->setCellValue('H' . $x, $row->sumber_terlindung);
                $sheet->setCellValue('I' . $x, $row->sumber_takterlindung);
                $sheet->setCellValue('J' . $x, $row->lainnya);
                $sheet->setCellValue('K' . $x, $row->tanpa_keterangan);
                $sheet->setCellValue('L' . $x, $row->grand_total);
                $sheet->setCellValue('M' . $x, $row->penetapan);
                $sheet->setCellValue('N' . $x, $row->dtks_version);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:N' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 15) == "DTKS PENERANGAN") { ///////////////////// DTKS BAHAN PENERANGAN

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nmkab');
            $sheet->setCellValue('D1', 'nmkec');
            $sheet->setCellValue('E1', 'nmdes');
            $sheet->setCellValue('F1', 'pln');
            $sheet->setCellValue('G1', 'nonpln');
            $sheet->setCellValue('H1', 'bukan_listrik');
            $sheet->setCellValue('I1', 'tanpa_keterangan');
            $sheet->setCellValue('J1', 'grand_total');
            $sheet->setCellValue('K1', 'penetapan');
            $sheet->setCellValue('L1', 'dtks_version');

            $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:L1')->applyFromArray($styleArray);

            if ($namadata == "DTKS PENERANGAN I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN II" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_II_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN III" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_III_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN IV" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_IV_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN III" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_III_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN IV" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_IV_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_II_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN III" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_III_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS PENERANGAN IV" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_penerangan_IV_2023($namadata, $tanggalupload,);
            }  // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nmkab);
                $sheet->setCellValue('D' . $x, $row->nmkec);
                $sheet->setCellValue('E' . $x, $row->nmdes);
                $sheet->setCellValue('F' . $x, $row->pln);
                $sheet->setCellValue('G' . $x, $row->nonpln);
                $sheet->setCellValue('H' . $x, $row->bukan_listrik);
                $sheet->setCellValue('I' . $x, $row->tanpa_keterangan);
                $sheet->setCellValue('J' . $x, $row->grand_total);
                $sheet->setCellValue('K' . $x, $row->penetapan);
                $sheet->setCellValue('L' . $x, $row->dtks_version);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:L' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 19) == "DTKS TEMPAT TINGGAL") { ///////////////////// DTKS TINGGAL

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nmkab');
            $sheet->setCellValue('D1', 'nmkec');
            $sheet->setCellValue('E1', 'nmdes');
            $sheet->setCellValue('F1', 'milik_sendiri');
            $sheet->setCellValue('G1', 'kontrak');
            $sheet->setCellValue('H1', 'beban_sewa');
            $sheet->setCellValue('I1', 'dinas');
            $sheet->setCellValue('J1', 'lainnya');
            $sheet->setCellValue('K1', 'tanpa_keterangan');
            $sheet->setCellValue('L1', 'grand_total');
            $sheet->setCellValue('M1', 'penetapan');
            $sheet->setCellValue('N1', 'dtks_version');

            $spreadsheet->getActiveSheet()->getStyle('A1:N1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:N1')->applyFromArray($styleArray);

            if ($namadata == "DTKS TEMPAT TINGGAL I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL II" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_II_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL III" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_III_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL IV" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_IV_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL III" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_III_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL IV" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_IV_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_II_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL III" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_III_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS TEMPAT TINGGAL IV" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_tinggal_IV_2023($namadata, $tanggalupload,);
            }  // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nmkab);
                $sheet->setCellValue('D' . $x, $row->nmkec);
                $sheet->setCellValue('E' . $x, $row->nmdes);
                $sheet->setCellValue('F' . $x, $row->milik_sendiri);
                $sheet->setCellValue('G' . $x, $row->kontrak);
                $sheet->setCellValue('H' . $x, $row->beban_sewa);
                $sheet->setCellValue('I' . $x, $row->dinas);
                $sheet->setCellValue('J' . $x, $row->lainnya);
                $sheet->setCellValue('K' . $x, $row->tanpa_keterangan);
                $sheet->setCellValue('L' . $x, $row->grand_total);
                $sheet->setCellValue('M' . $x, $row->penetapan);
                $sheet->setCellValue('N' . $x, $row->dtks_version);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:N' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 16) == "DTKS DISABILITAS") { ///////////////////// DTKS disabilitas

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nmkab');
            $sheet->setCellValue('D1', 'nmkec');
            $sheet->setCellValue('E1', 'nmdes');
            $sheet->setCellValue('F1', 'daksa');
            $sheet->setCellValue('G1', 'normal');
            $sheet->setCellValue('H1', 'rungu_wicara');
            $sheet->setCellValue('I1', 'netra_daksa');
            $sheet->setCellValue('J1', 'netra_rungu_wicara');
            $sheet->setCellValue('K1', 'rungu_wicara_daksa');
            $sheet->setCellValue('L1', 'rungu_netra_wicara_daksa');
            $sheet->setCellValue('M1', 'mental');
            $sheet->setCellValue('N1', 'jiwa');
            $sheet->setCellValue('O1', 'daksa_mental');
            $sheet->setCellValue('P1', 'tanpa_keterangan');
            $sheet->setCellValue('Q1', 'grand_total');
            $sheet->setCellValue('R1', 'penetapan');
            $sheet->setCellValue('S1', 'dtks_version');

            $spreadsheet->getActiveSheet()->getStyle('A1:S1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:S1')->applyFromArray($styleArray);

            if ($namadata == "DTKS DISABILITAS I" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_I_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS II" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_II_2020($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS I" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_I_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS II" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_II_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS III" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_III_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS IV" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_IV_2021($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS I" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_I_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS II" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_II_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS III" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_III_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS IV" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_IV_2022($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS I" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_I_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS II" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_II_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS III" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_III_2023($namadata, $tanggalupload,);
            } elseif ($namadata == "DTKS DISABILITAS IV" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_dtks_disabilitas_IV_2023($namadata, $tanggalupload,);
            }  // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nmkab);
                $sheet->setCellValue('D' . $x, $row->nmkec);
                $sheet->setCellValue('E' . $x, $row->nmdes);
                $sheet->setCellValue('F' . $x, $row->daksa);
                $sheet->setCellValue('G' . $x, $row->normal);
                $sheet->setCellValue('H' . $x, $row->rungu_wicara);
                $sheet->setCellValue('I' . $x, $row->netra_daksa);
                $sheet->setCellValue('J' . $x, $row->netra_rungu_wicara);
                $sheet->setCellValue('K' . $x, $row->rungu_wicara_daksa);
                $sheet->setCellValue('L' . $x, $row->rungu_netra_wicara_daksa);
                $sheet->setCellValue('M' . $x, $row->mental);
                $sheet->setCellValue('N' . $x, $row->jiwa);
                $sheet->setCellValue('O' . $x, $row->daksa_mental);
                $sheet->setCellValue('P' . $x, $row->tanpa_keterangan);
                $sheet->setCellValue('Q' . $x, $row->grand_total);
                $sheet->setCellValue('R' . $x, $row->penetapan);
                $sheet->setCellValue('S' . $x, $row->dtks_version);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:S' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 27) == "Indeks Desa Membangun (IDM)") { ///////////////////// Indeks Desa Membangun (IDM)

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nm_kab');
            $sheet->setCellValue('D1', 'nm_kec');
            $sheet->setCellValue('E1', 'nm_desa');
            $sheet->setCellValue('F1', 'iks');
            $sheet->setCellValue('G1', 'ike');
            $sheet->setCellValue('H1', 'ikl');
            $sheet->setCellValue('I1', 'nilai_idm');
            $sheet->setCellValue('J1', 'status');

            $spreadsheet->getActiveSheet()->getStyle('A1:J1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:J1')->applyFromArray($styleArray);

            if ($namadata == "Indeks Desa Membangun (IDM)" && $tanggalupload == 2019) {
                $rekap = $this->User_datasidesa_model->download_indeks_desa_membangun_2019($tanggalupload,);
            } elseif ($namadata == "Indeks Desa Membangun (IDM)" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_indeks_desa_membangun_2020($tanggalupload,);
            } elseif ($namadata == "Indeks Desa Membangun (IDM)" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_indeks_desa_membangun_2021($tanggalupload,);
            } elseif ($namadata == "Indeks Desa Membangun (IDM)" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_indeks_desa_membangun_2022($tanggalupload,);
            } elseif ($namadata == "Indeks Desa Membangun (IDM)" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_indeks_desa_membangun_2023($tanggalupload,);
            } // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nm_kab);
                $sheet->setCellValue('D' . $x, $row->nm_kec);
                $sheet->setCellValue('E' . $x, $row->nm_desa);
                $sheet->setCellValue('F' . $x, $row->iks);
                $sheet->setCellValue('G' . $x, $row->ike);
                $sheet->setCellValue('H' . $x, $row->ikl);
                $sheet->setCellValue('I' . $x, $row->nilai_idm);
                $sheet->setCellValue('J' . $x, $row->status);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:J' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 6) == "BUMDES") { /////////////////////////////////////////////////////////////////////// BUMDES

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nm_kab');
            $sheet->setCellValue('D1', 'nm_kec');
            $sheet->setCellValue('E1', 'nm_desa');
            $sheet->setCellValue('F1', 'nm_bumdes');
            $sheet->setCellValue('G1', 'klasifikasi');
            $sheet->setCellValue('H1', 'kelembagaan_1');
            $sheet->setCellValue('I1', 'kelembagaan_2');
            $sheet->setCellValue('J1', 'kelembagaan_3');
            $sheet->setCellValue('K1', 'kelembagaan_4');
            $sheet->setCellValue('L1', 'kelembagaan_5');
            $sheet->setCellValue('M1', 'kelembagaan_6');
            $sheet->setCellValue('N1', 'kelembagaan_jml');
            $sheet->setCellValue('O1', 'kelembagaan_score');
            $sheet->setCellValue('P1', 'aturan_1');
            $sheet->setCellValue('Q1', 'aturan_jml');
            $sheet->setCellValue('R1', 'aturan_score');
            $sheet->setCellValue('S1', 'usaha_1');
            $sheet->setCellValue('T1', 'usaha_2');
            $sheet->setCellValue('U1', 'usaha_3');
            $sheet->setCellValue('V1', 'usaha_jml');
            $sheet->setCellValue('W1', 'usaha_score');
            $sheet->setCellValue('X1', 'admin_1');
            $sheet->setCellValue('Y1', 'admin_2');
            $sheet->setCellValue('Z1', 'admin_3');
            $sheet->setCellValue('AA1', 'admin_jml');
            $sheet->setCellValue('AB1', 'admin_score');
            $sheet->setCellValue('AC1', 'modal_1');
            $sheet->setCellValue('AD1', 'modal_2');
            $sheet->setCellValue('AE1', 'modal_3');
            $sheet->setCellValue('AF1', 'modal_jml');
            $sheet->setCellValue('AG1', 'modal_score');
            $sheet->setCellValue('AH1', 'dampak_1');
            $sheet->setCellValue('AI1', 'dampak_2');
            $sheet->setCellValue('AJ1', 'dampak_3');
            $sheet->setCellValue('AK1', 'dampak_jml');
            $sheet->setCellValue('AL1', 'dampak_score');
            $sheet->setCellValue('AM1', 'jumlah');

            $spreadsheet->getActiveSheet()->getStyle('A1:AM1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:AM1')->applyFromArray($styleArray);

            if ($namadata == "BUMDES" && $tanggalupload == 2019) {
                $rekap = $this->User_datasidesa_model->download_bumdes_2019($tanggalupload);
            } elseif ($namadata == "BUMDES" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_bumdes_2020($tanggalupload);
            } elseif ($namadata == "BUMDES" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_bumdes_2021($tanggalupload);
            } elseif ($namadata == "BUMDES" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_bumdes_2022($tanggalupload);
            } elseif ($namadata == "BUMDES" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_bumdes_2023($tanggalupload);
            } // elseif apa gitu kalo ada data bumdes yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nm_kab);
                $sheet->setCellValue('D' . $x, $row->nm_kec);
                $sheet->setCellValue('E' . $x, $row->nm_desa);
                $sheet->setCellValue('F' . $x, $row->nm_bumdes);
                $sheet->setCellValue('G' . $x, $row->klasifikasi);
                $sheet->setCellValue('H' . $x, $row->kelembagaan_1);
                $sheet->setCellValue('I' . $x, $row->kelembagaan_2);
                $sheet->setCellValue('J' . $x, $row->kelembagaan_3);
                $sheet->setCellValue('K' . $x, $row->kelembagaan_4);
                $sheet->setCellValue('L' . $x, $row->kelembagaan_5);
                $sheet->setCellValue('M' . $x, $row->kelembagaan_6);
                $sheet->setCellValue('N' . $x, $row->kelembagaan_jml);
                $sheet->setCellValue('O' . $x, $row->kelembagaan_score);
                $sheet->setCellValue('P' . $x, $row->aturan_1);
                $sheet->setCellValue('Q' . $x, $row->aturan_jml);
                $sheet->setCellValue('R' . $x, $row->aturan_score);
                $sheet->setCellValue('S' . $x, $row->usaha_1);
                $sheet->setCellValue('T' . $x, $row->usaha_2);
                $sheet->setCellValue('U' . $x, $row->usaha_3);
                $sheet->setCellValue('V' . $x, $row->usaha_jml);
                $sheet->setCellValue('W' . $x, $row->usaha_score);
                $sheet->setCellValue('X' . $x, $row->admin_1);
                $sheet->setCellValue('Y' . $x, $row->admin_2);
                $sheet->setCellValue('Z' . $x, $row->admin_3);
                $sheet->setCellValue('AA' . $x, $row->admin_jml);
                $sheet->setCellValue('AB' . $x, $row->admin_score);
                $sheet->setCellValue('AC' . $x, $row->modal_1);
                $sheet->setCellValue('AD' . $x, $row->modal_2);
                $sheet->setCellValue('AE' . $x, $row->modal_3);
                $sheet->setCellValue('AF' . $x, $row->modal_jml);
                $sheet->setCellValue('AG' . $x, $row->modal_score);
                $sheet->setCellValue('AH' . $x, $row->dampak_1);
                $sheet->setCellValue('AI' . $x, $row->dampak_2);
                $sheet->setCellValue('AJ' . $x, $row->dampak_3);
                $sheet->setCellValue('AK' . $x, $row->dampak_jml);
                $sheet->setCellValue('AL' . $x, $row->dampak_score);
                $sheet->setCellValue('AM' . $x, $row->jumlah);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AG')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AI')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AK')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AL')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('AM')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:AM' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 13) == "Data POSYANDU") { ///////////////////// DATA POSYANDU

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nm_kab');
            $sheet->setCellValue('D1', 'nm_kec');
            $sheet->setCellValue('E1', 'nm_desa');
            $sheet->setCellValue('F1', 'nama_posyandu');
            $sheet->setCellValue('G1', 'jml_kader');
            $sheet->setCellValue('H1', 'strata_posyandu');

            $spreadsheet->getActiveSheet()->getStyle('A1:H1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:H1')->applyFromArray($styleArray);

            if ($namadata == "Data POSYANDU" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_ksht_posyandu_2020($tanggalupload,);
            } elseif ($namadata == "Data POSYANDU" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_ksht_posyandu_2021($tanggalupload,);
            } elseif ($namadata == "Data POSYANDU" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_ksht_posyandu_2022($tanggalupload,);
            } elseif ($namadata == "Data POSYANDU" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_ksht_posyandu_2023($tanggalupload,);
            } // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nm_kab);
                $sheet->setCellValue('D' . $x, $row->nm_kec);
                $sheet->setCellValue('E' . $x, $row->nm_desa);
                $sheet->setCellValue('F' . $x, $row->nama_posyandu);
                $sheet->setCellValue('G' . $x, $row->jml_kader);
                $sheet->setCellValue('H' . $x, $row->strata_posyandu);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:H' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 18) == "Data Sosial Budaya") { ///////////////////// DATA Sosial Budaya

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'tahun');
            $sheet->setCellValue('B1', 'kd_wilayah');
            $sheet->setCellValue('C1', 'nm_kab');
            $sheet->setCellValue('D1', 'nm_kec');
            $sheet->setCellValue('E1', 'nm_desa');
            $sheet->setCellValue('F1', 'no_sk');
            $sheet->setCellValue('G1', 'tanggal_sk');
            $sheet->setCellValue('H1', 'jml_anggota');
            $sheet->setCellValue('I1', 'ketua_satgas');

            $spreadsheet->getActiveSheet()->getStyle('A1:I1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($styleArray);

            if ($namadata == "Data Sosial Budaya" && $tanggalupload == 2019) {
                $rekap = $this->User_datasidesa_model->download_sosbud_satgas_2019($tanggalupload,);
            } elseif ($namadata == "Data Sosial Budaya" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_sosbud_satgas_2020($tanggalupload,);
            } elseif ($namadata == "Data Sosial Budaya" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_sosbud_satgas_2021($tanggalupload,);
            } elseif ($namadata == "Data Sosial Budaya" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_sosbud_satgas_2022($tanggalupload,);
            } elseif ($namadata == "Data Sosial Budaya" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_sosbud_satgas_2023($tanggalupload,);
            } // elseif apa gitu kalo ada data bab yang lain

            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $row->tahun);
                $sheet->setCellValue('B' . $x, $row->kd_wilayah);
                $sheet->setCellValue('C' . $x, $row->nm_kab);
                $sheet->setCellValue('D' . $x, $row->nm_kec);
                $sheet->setCellValue('E' . $x, $row->nm_desa);
                $sheet->setCellValue('F' . $x, $row->no_sk);
                $sheet->setCellValue('G' . $x, $row->tanggal_sk);
                $sheet->setCellValue('H' . $x, $row->jml_anggota);
                $sheet->setCellValue('I' . $x, $row->ketua_satgas);
                $x++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:I' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif (substr($namadata, 0, 18) == "BANKEU Tersalurkan") { ///////////////////// DATA BANKEU salur

            $builder = $this->db->table('sidesa_review_data');
            $builder->set('click', 'click+1', false);
            $builder->where('tahundata', $tanggalupload);
            $builder->where('nm_data', $namadata);
            $builder->update();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'no');
            $sheet->setCellValue('B1', 'tahun');
            $sheet->setCellValue('C1', 'nm_kab');
            $sheet->setCellValue('D1', 'lokasi');
            $sheet->setCellValue('E1', 'jml_bantuan');

            $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArray);

            if ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2013) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2013($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2014) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2014($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2015) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2015($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2016) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2016($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2017) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2017($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2018) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2018($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2019) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2019($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2020) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2020($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2021) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2021($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2022) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2022($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2023) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2023($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2024) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2024($tanggalupload,);
            } elseif ($namadata == "BANKEU Tersalurkan" && $tanggalupload == 2025) {
                $rekap = $this->User_datasidesa_model->download_bankeu_tersalurkan_2025($tanggalupload,);
            } // elseif apa gitu kalo ada data bab yang lain

            $no = 1;
            $x = 2;
            foreach ($rekap as $row) {
                $sheet->setCellValue('A' . $x, $no);
                $sheet->setCellValue('B' . $x, $row->tahun);
                $sheet->setCellValue('C' . $x, $row->nm_kab);
                $sheet->setCellValue('D' . $x, $row->lokasi);
                $sheet->setCellValue('E' . $x, $row->jml_bantuan);
                $x++;
                $no++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

            $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
            $x = $x - 1;
            $sheet->getStyle('A1:E' . $x)->applyFromArray($styleArray);

            $tahun = $tanggalupload;
            $writer = new Xlsx($spreadsheet);
            $filename = $namadata . ' - ';

            ob_end_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif ($namadata == "................") {
        }
    }
}
