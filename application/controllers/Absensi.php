<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('absensi_model', 'absensi');
	}
	
	public function entri()
	{
		$data['title'] = 'Entri Kehadiran';
		$data['page']	= 'user/kehadiran/entri';

		$this->load->view('templates/app', $data);
	}

	public function masuk()
	{
		$data = [
			'user_id'		=> $this->session->userdata('id_users'),
			'date'			=> date('Y-m-d'),
			'time'			=> date('H:i:s'),
			'information'	=> 'M',
			'status'			=> 0
		];

		$this->absensi->insertEntri($data);
		$this->session->set_flashdata('message', 'Entri kehadiran berhasil. Silahkan tunggu konfirmasi oleh administator.');

		redirect(base_url('absensi/entri'));
	}

	public function ijin()
	{
		$data = [
			'user_id'		=> $this->session->userdata('id_users'),
			'date'			=> date('Y-m-d'),
			'time'			=> date('H:i:s'),
			'information'	=> 'I',
			'status'			=> 0
		];

		$this->absensi->insertEntri($data);
		$this->session->set_flashdata('message', 'Entri kehadiran berhasil. Silahkan tunggu konfirmasi oleh administator.');

		redirect(base_url('absensi/entri'));
	}

	public function sakit()
	{
		$data = [
			'user_id'		=> $this->session->userdata('id_users'),
			'date'			=> date('Y-m-d'),
			'time'			=> date('H:i:s'),
			'information'	=> 'S',
			'status'			=> 0
		];

		$this->absensi->insertEntri($data);
		$this->session->set_flashdata('message', 'Entri kehadiran berhasil. Silahkan tunggu konfirmasi oleh administator.');

		redirect(base_url('absensi/entri'));
	}

	public function tabel()
	{
		$data['title'] 	= 'Tabel Kehadiran';
		$data['page']		= 'user/kehadiran/tabel';
		$data['absensi'] 	= $this->absensi->getAbsensi();

		$this->load->view('templates/app', $data);
	}

	public function rekap()
	{
		$data['title'] 	= 'Rekap Kehadiran';
		$data['page']		= 'user/kehadiran/rekap';
		$data['hadir'] 	= $this->absensi->getHadir();
		$data['ijin'] 		= $this->absensi->getIjin();
		$data['sakit'] 	= $this->absensi->getSakit();

		$this->load->view('templates/app', $data);
	}

}

/* End of file Controllername.php */
