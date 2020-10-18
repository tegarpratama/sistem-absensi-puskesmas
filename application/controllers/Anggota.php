<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('anggota_model', 'anggota');
	}

	public function dokter()
	{
		$data['title']	= 'Dokter';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getDocters();

		$this->load->view('templates/app', $data);
	}

	public function perawat()
	{
		$data['title']	= 'Perawat';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getNurses();

		$this->load->view('templates/app', $data);
	}

	public function apoteker()
	{
		$data['title']	= 'Apoteker';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getPharmacists();

		$this->load->view('templates/app', $data);
	}

	public function akuntan()
	{
		$data['title']	= 'Akuntan';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getAccountants();

		$this->load->view('templates/app', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('no_employee', 'No Karyawan', 'required|trim|is_unique[users.no_employee]',[
			'required'  => 'No karyawan tidak boleh kosong.',
			'is_unique' => 'No karyawan sudah terdaftar.' 
		]);
		$this->form_validation->set_rules('name', 'Nama', 'required|trim',[
			'required' => 'Nama tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
			'required' 	  => 'Email tidak boleh kosong.',
			'valid_email' => 'Email tidak valid',
		   'is_unique'	  => 'Email sudah terdaftar.' 
		]);

		if($this->form_validation->run() == FALSE){
			$data['title']		= 'Tambah Anggota';
			$data['page']		= 'admin/anggota/add';
			$data['position'] = $this->anggota->getPosition();

			$this->load->view('templates/app', $data);
		}else{
			$data = [
				'no_employee' 	=> $this->input->post('no_employee'),
				'name'			=> $this->input->post('name'),
				'gender'			=> $this->input->post('gender'),
				'email' 			=> strtolower($this->input->post('email')),
				'photo' 			=> null,
				'password' 		=> hashEncrypt($this->input->post('password')),
				'role_id' 		=> 2,
				'position_id' 	=> $this->input->post('position_id'),
				'date_created'	=> date('Y-m-d')
			];
			
			$this->anggota->insertUser($data);
			$this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan.');
			
			if($data['position_id'] == 1){
				redirect(base_url('anggota/dokter'));
			}else if($data['position_id'] == 2){
				redirect(base_url('anggota/perawat'));
			}else if($data['position_id'] == 3){
				redirect(base_url('anggota/apoteker'));
			}else if($data['position_id'] == 4){
				redirect(base_url('anggota/akuntan'));
			}
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('no_employee', 'No Karyawan', 'required|trim',[
			'required' => 'No karyawan tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('name', 'Nama', 'required|trim',[
			'required' => 'Nama tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			$data['title']		= 'Ubah Anggota';
			$data['page']		= 'admin/anggota/edit';
			$data['user'] 		= $this->anggota->getDetailUser($id);
			$data['position'] = $this->anggota->getPosition();

			$this->load->view('templates/app', $data);
		}else{
			$data = [
				'no_employee' => $this->input->post('no_employee'),
				'name' => $this->input->post('name'),
				'gender' => $this->input->post('gender'),
				'position_id' => $this->input->post('position_id'),
			];

			$this->anggota->updateUser($id, $data);
			$this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan.');

			if($data['position_id'] == 1){
				redirect(base_url('anggota/dokter'));
			}else if($data['position_id'] == 2){
				redirect(base_url('anggota/perawat'));
			}else if($data['position_id'] == 3){
				redirect(base_url('anggota/apoteker'));
			}else if($data['position_id'] == 4){
				redirect(base_url('anggota/akuntan'));
			}
		}
	}

	public function delete($id)
	{
		$user	= $this->anggota->getDetailUser($id);
		$this->anggota->deleteUser($id);
		$this->session->set_flashdata('message', 'Data anggota berhasil dihapus.');

		if($user['position_id'] == 1){
			redirect(base_url('anggota/dokter'));
		}else if($user['position_id'] == 2){
			redirect(base_url('anggota/perawat'));
		}else if($user['position_id'] == 3){
			redirect(base_url('anggota/apoteker'));
		}else if($user['position_id'] == 4){
			redirect(base_url('anggota/akuntan'));
		}
	}

}

/* End of file Controllername.php */
