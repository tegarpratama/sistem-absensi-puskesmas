<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('admin_model', 'admin');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] 	= 'dashboard/index';
		$this->load->view('templates/app', $data);
	}

	public function profile()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
			'required' => 'Email tidak boleh kosong.',
			'is_unique'=> 'Email sudah terdaftar.'
		]);

		if($this->form_validation->run() == FALSE){
			$data['title']		= 'Biodata';
			$data['page'] 		= 'admin/profile/profile';
			$data['admin']		= $this->admin->getAdminProfile();
			$data['position'] = $this->admin->getPosition();

			$this->load->view('templates/app', $data);
		}else{
			$data = [
				'email' => $this->input->post('email'),
			];

			$this->admin->updateProfile($data);
			$this->session->set_flashdata('message', 'Data admin berhasil diupdate.');

			redirect(base_url('admin'));
		}
	}

	public function change_password()
	{
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim',[
			'required' => 'Password baru tidak boleh kosong.',
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[new_password]',[
			'required' => 'Konfirmasi password tidak boleh kosong.',
			'matches'  => 'Konfirmasi password tidak sesuai'
		]);

		if($this->form_validation->run() == FALSE){
			$data['title']		= 'Ubah Password';
			$data['page'] 		= 'admin/profile/password';

			$this->load->view('templates/app', $data);
		}else{
			$data = [
				'password' => hashEncrypt($this->input->post('new_password')),
			];

			$this->admin->updatePassword($data);
			$this->session->set_flashdata('message', 'Password berhasil diupdate.');

			redirect(base_url('admin'));
		}
	}

}

/* End of file Anggota.php */
