<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';
require_once APPPATH.'../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class Cetak_register_informasi extends Base{
	public function cetak($tahun = null){

		if($tahun == null){
			$tahunnya = date('Y');
		}else{
			$tahunnya = $tahun;
		}
		$inputFileType = 'Xls';
		$inputFileName = 'template/register.xls';
		$styleArray = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => '000000'),
				),
			),
			'alignment' => array(
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
			),

		);

		/**  Create a new Reader of the type defined in $inputFileType  **/
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
		/**  Advise the Reader of which WorkSheets we want to load  **/
		$reader->setLoadAllSheets();
		/**  Load $inputFileName to a Spreadsheet Object  **/
		$spreadsheet = $reader->load($inputFileName);
		$data = $this->m_data->select('*')
				->from('data a')
				->join('informasi b','b.data_id = a.id')
				->like(['a.tanggal'=> $tahunnya])
				->order_by('a.tanggal','asc')
				->get('')
				->result_object();
		$baseRow=13;
		$no =1;
		foreach($data as $dt):
			if($dt->instansi == 'ya'){
				$colom10 = '√';
				$colom11 = '-';
				$colom12 = '√';
			}else{
				$colom10 = '-';
				$colom11 = '√';
				$colom12 = '-';
			}
			if($dt->jenis_permohonan == 'B'){
				$colom8 = '√';
				$colom9 = '-';

			}else{
				$colom8 = '-';
				$colom9 = '√';
			}

			if($dt->bentuk_informasi == 'cetak'){
				$colom14 = '√';
				$colom15 = '-';

			}else{
				$colom14 = '-';
				$colom15 = '√';
			}
			$data_tamu = $this->m_data->where(['data_id'=>$dt->data_id])->order_by('id','asc')->get('data_tamu');
			$jumlah_nama_tamu = $data_tamu->num_rows();
			$nama = '';
			$alamat= '';
			$kontak = '';
			$pekerjaan = '';
			$nox = 1;
			if($jumlah_nama_tamu > 0){
				$data_tamunya = $data_tamu->result_object();
				foreach ($data_tamunya as $dtm):
					$number = $nox++;
					if($number != $jumlah_nama_tamu){
						$nama .= $number.'. '.$dtm->nama.PHP_EOL;
						$alamat .= $number.'. '.$dtm->alamat.PHP_EOL;
						$kontak .= $number.'. '.$dtm->no_telp.PHP_EOL;
						$pekerjaan .= $number.'. '.$dtm->pekerjaan.PHP_EOL;
					}else{
						$nama .= $number.'. '.$dtm->nama;
						$alamat .= $number.'. '.$dtm->alamat;
						$kontak .= $number.'. '.$dtm->no_telp;
						$pekerjaan .= $number.'. '.$dtm->pekerjaan;
					}
				endforeach;
			}else{
				$nama .= '';
				$alamat .= '';
				$kontak .= '';
				$pekerjaan .= '';
			}
			$row = $baseRow++;
			$spreadsheet->getActiveSheet('A'.$row,0)
				->setCellValue( 'A'.$row,$no++)
				->setCellValue( 'B'.$row,$dt->nomor_pendaftaran)
				->setCellValue( 'C'.$row,tanggal_indonesia2($dt->tanggal))
				->setCellValue( 'D'.$row,$nama)
				->setCellValue( 'E'.$row,$alamat)
				->setCellValue( 'F'.$row,$kontak)
				->setCellValue( 'G'.$row,$pekerjaan)
				->setCellValue( 'H'.$row,$colom8)
				->setCellValue( 'I'.$row,$colom9)
				->setCellValue( 'J'.$row,$colom10)
				->setCellValue( 'K'.$row,$colom11)
				->setCellValue( 'L'.$row,$colom12)
				->setCellValue( 'M'.$row,$dt->dokumentasi)
				->setCellValue( 'N'.$row,$colom14)
				->setCellValue( 'O'.$row,$colom15)
				->setCellValue( 'P'.$row,$dt->keputusan_ppid)
				->setCellValue( 'Q'.$row,$dt->alasan_ppid)
				->setCellValue( 'R'.$row,tanggal_indonesia2($dt->tgl_pemberian_jawaban))
				->setCellValue( 'S'.$row,tanggal_indonesia2($dt->tgl_pemberian_informasi))
				->setCellValue( 'T'.$row,rupiah($dt->biaya))
				->getStyle('A'.$row.':U'.$row)->applyFromArray($styleArray)->getAlignment()->setWrapText(true)
				->getActiveSheet('A'.$row.':U'.$row,0)
				->getRowDimension($row)->setRowHeight(-1);
		endforeach;

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
}
