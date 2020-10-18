<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Kehadiran extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kehadiran_model', 'kehadiran');
		$this->load->helper('date');
	}

	public function konfirmasi_kehadiran()
	{
		$data['title'] 	= 'Konfirmasi Kehadiran';
		$data['page']		= 'admin/kehadiran/konfirmasi';
		$data['absensi']	= $this->kehadiran->getKehadiran();

		$this->load->view('templates/app', $data);
	}

	public function konfirmasi($id)
	{
		$data = $this->kehadiran->getAbsensi($id);
		$data['status'] = 1;
		
		$this->kehadiran->updateAbsensi($id, $data);
		$this->session->set_flashdata('message', 'Absensi berhasil dikonfirmasi.');

		redirect(base_url('kehadiran/konfirmasi_kehadiran'));
	}

	public function tolak($id)
	{
		$data = $this->kehadiran->getAbsensi($id);
		$data['status'] = 2;
		
		$this->kehadiran->updateAbsensi($id, $data);
		$this->session->set_flashdata('message', 'Absensi berhasil ditolak.');

		redirect(base_url('kehadiran/konfirmasi_kehadiran'));
	}

	public function tabel_kehadiran()
	{
		$data['title']   = 'Tabel Kehadiran';
		$data['page']	  = 'admin/kehadiran/tabel';
		$data['absensi'] = $this->kehadiran->getAllKehadiranPerDay();

		$this->load->view('templates/app', $data);
	}

	public function rekap_kehadiran()
	{
		$data['title']   = 'Rekap Kehadiran';
		$data['page']	  = 'admin/kehadiran/rekap';
		$data['rekap']   = $this->kehadiran->getRekap();

		$this->load->view('templates/app', $data);
	}

	public function cetak()
	{
		// make a new spreadsheet object
		$spreadsheet = new Spreadsheet();
		//get current active sheet (first sheet)
		$sheet = $spreadsheet->getActiveSheet();
		//set default font
		$spreadsheet->getDefaultStyle()
			->getFont()
			->setName('Arial')
			->setSize(10)
		;

		//heading
		$spreadsheet->getActiveSheet()
		->setCellValue('A1',"Rekap Absensi Puskesmas");

		//merge heading
		$spreadsheet->getActiveSheet()->mergeCells("A1:G1");

		// set font style
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);

		// set cell alignment
		$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		//setting column width
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);

		//header text
		$spreadsheet->getActiveSheet()
		->setCellValue('A2',"No")
		->setCellValue('B2',"Nama")
		->setCellValue('C2',"Bagian")
		->setCellValue('D2',"Hadir")
		->setCellValue('E2',"Sakit")
		->setCellValue('F2',"Ijin")
		->setCellValue('G2',"Total");

		$data = $this->kehadiran->getRekap();
		// echo '<pre>' . var_export($data, true) . '</pre>'; die;
		
		//loop through the data
		$row = 3; //current row 
		$no = 1;
		$indeks = 0;
		foreach($data as $d) {
			$spreadsheet->getActiveSheet()
				->setCellValue('A' . $row , $no++)
				->setCellValue('B' . $row , $data[$indeks]['name'])
				->setCellValue('C' . $row , $data[$indeks]['position'])
				->setCellValue('D' . $row , $data[$indeks]['M'])
				->setCellValue('E' . $row , $data[$indeks]['S'])
				->setCellValue('F' . $row , $data[$indeks]['I'])
				->setCellValue('G' . $row , $data[$indeks]['total'])
			;

			$row++;
			$indeks++;
		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Rekap Absensi.xlsx"');

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	
}

/* End of file Controllername.php */
