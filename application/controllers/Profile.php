<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model', 'profile');
		$this->load->model('anggota_model', 'anggota');
		$this->load->library('form_validation');
		is_login();
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$user = $this->profile->getProfile($id);

		$data['title']		= 'Biodata';
		$data['page'] 		= 'user/profile/index';
		$data['user']		= $user;
		$data['position'] = $this->anggota->getPosition();

		$this->load->view('templates/app', $data);
	}

	public function edit()
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
			$data['user'] 	= $this->anggota->getUser($id);
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

}

/* End of file Profile.php */
