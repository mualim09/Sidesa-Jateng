<?php

namespace App\Controllers\Sitkd;

use App\Models\Sitkd\Excel_model;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends BaseController
{
    protected $Excel_model;

    public function __construct()
    {
        $this->Excel_model = new Excel_model();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function rekap()
    {
        $spreadsheet = new Spreadsheet();
        $tahun = date("Y");
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('A1:J1');
        $sheet->setCellValue('A1', 'REKAP PERSETUJUAN GUBERNUR TUKAR MENUKAR TANAH KAS DESA');
        $sheet->mergeCells('A2:J2');
        $sheet->setCellValue('A2', 'TAHUN ' . $tahun);
        $sheet->setCellValue('A4', 'NO');
        $sheet->setCellValue('B4', 'TANGGAL');
        $sheet->setCellValue('C4', 'KABUPATEN');
        $sheet->setCellValue('D4', 'DESA');
        $sheet->setCellValue('E4', 'KECAMATAN');
        $sheet->setCellValue('F4', 'TKD YANG DILEPAS');
        $sheet->setCellValue('G4', 'TANAH PENGGANTI');
        $sheet->setCellValue('H4', 'UGR');
        $sheet->setCellValue('I4', 'SISA UGR');
        $sheet->setCellValue('J4', 'KETERANGAN');

        $spreadsheet->getActiveSheet()->getStyle('A1:J4')
            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:J4')->applyFromArray($styleArray);

        $rekap = $this->Excel_model->getDokumenSukses();
        $no = 1;
        $x = 5;

        foreach ($rekap as $row) {
            $sheet->setCellValue('A' . $x, $no);
            $sheet->setCellValue('B' . $x, $row->tanggal_clicksukses);
            $sheet->setCellValue('C' . $x, $row->kabupaten);
            $sheet->setCellValue('D' . $x, $row->desa);
            $sheet->setCellValue('E' . $x, $row->kecamatan);
            $sheet->setCellValue('F' . $x, $row->luas_tkd);
            $sheet->setCellValue('G' . $x, $row->pengganti);
            $sheet->setCellValue('H' . $x, $row->ugr);
            $sheet->setCellValue('I' . $x, $row->sisa_ugr);
            $sheet->setCellValue('J' . $x, $row->nama_trans);
            $x++;
            $no++;
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
        $sheet->getStyle('A4:J' . $x)->applyFromArray($styleArray);

        $tahun = date("Y");
        $writer = new Xlsx($spreadsheet);
        $filename = 'rekapan-persetujuan-gubernur-TMTKD-';

        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . $tahun . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function rekapadmin() //ini yang buat proyek CI4 SITKD
    {
        $spreadsheet = new Spreadsheet();
        $tahun = $this->request->getVar('tahunsukses');
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('A1:J1');
        $sheet->setCellValue('A1', 'REKAP PERSETUJUAN GUBERNUR TUKAR MENUKAR TANAH KAS DESA');
        $sheet->mergeCells('A2:J2');
        $sheet->setCellValue('A2', 'TAHUN ' . $tahun);
        $sheet->setCellValue('A4', 'NO');
        $sheet->setCellValue('B4', 'TANGGAL');
        $sheet->setCellValue('C4', 'KABUPATEN');
        $sheet->setCellValue('D4', 'DESA');
        $sheet->setCellValue('E4', 'KECAMATAN');
        $sheet->setCellValue('F4', 'TKD YANG DILEPAS');
        $sheet->setCellValue('G4', 'TANAH PENGGANTI');
        $sheet->setCellValue('H4', 'UGR');
        $sheet->setCellValue('I4', 'SISA UGR');
        $sheet->setCellValue('J4', 'KETERANGAN');

        $spreadsheet->getActiveSheet()->getStyle('A1:J4')
            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:J4')->applyFromArray($styleArray);

        $rekap = $this->Excel_model->getDokumenSuksesAdmin($tahun);
        $no = 1;
        $x = 5;

        foreach ($rekap as $row) {
            $sheet->setCellValue('A' . $x, $no);
            $sheet->setCellValue('B' . $x, $row->tanggal_clicksukses);
            $sheet->setCellValue('C' . $x, $row->kabupaten);
            $sheet->setCellValue('D' . $x, $row->desa);
            $sheet->setCellValue('E' . $x, $row->kecamatan);
            $sheet->setCellValue('F' . $x, $row->luas_tkd);
            $sheet->setCellValue('G' . $x, $row->pengganti);
            $sheet->setCellValue('H' . $x, $row->ugr);
            $sheet->setCellValue('I' . $x, $row->sisa_ugr);
            $sheet->setCellValue('J' . $x, $row->nama_trans);
            $x++;
            $no++;
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
        $sheet->getStyle('A4:J' . $x)->applyFromArray($styleArray);

        $tahunfile = $this->request->getVar('tahunsukses');
        $writer = new Xlsx($spreadsheet);
        $filename = 'rekapan-persetujuan-gubernur-TMTKD-';

        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . $tahunfile . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
