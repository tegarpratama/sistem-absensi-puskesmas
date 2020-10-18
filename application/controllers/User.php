<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('profile_model', 'profile');
		$this->load->model('anggota_model', 'anggota');
		$this->load->model('user_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] 	= 'dashboard/index';
		$this->load->view('templates/app', $data);
	}

	public function profile()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required|trim',[
			'required' => 'Nama tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required' => 'Email tidak boleh kosong.'
		]);

		if($this->form_validation->run() == FALSE){
			$id = $this->session->userdata('id_users');
			$user = $this->profile->getProfile($id);

			$data['title']		= 'Biodata';
			$data['page'] 		= 'user/profile/profile';
			$data['user']		= $user;
			$data['position'] = $this->anggota->getPosition();

			$this->load->view('templates/app', $data);
		}else{
			$id = $this->input->post('id');

			$data = [
				'name'	=> $this->input->post('name'),
				'email' 	=> $this->input->post('email'),
				'gender'	=> $this->input->post('gender'),
			];

			// Jika foto diubah
			if(!empty($_FILES['photo']['name'])){
				$upload 	 = $this->profile->uploadImage();

				// Jika upload berhasil
				if($upload){
					// Ambil data user
					$imageProfile = $this->profile->getProfile($id);
					// Hapus foto user sebelum di update
					if(file_exists('image/' . $imageProfile['photo']) && $imageProfile['photo']){
						unlink('image/' . $imageProfile['photo']);
					}
					
					// Timpa data foto dengan nama yg baru
					$data['photo'] = $upload;
				}else{
					redirect(base_url("user/profile"));
				}
			}

			$this->profile->updateProfile($id, $data);
			$this->session->set_flashdata('message', 'Biodata Berhasil Diupdate. Silahkan login kembali untuk memperbaharui profile.');

			redirect(base_url('user/profile'));
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
			$data['page'] 		= 'user/profile/password';

			$this->load->view('templates/app', $data);
		}else{
			$id = $this->session->userdata('id_users');

			$data = [
				'password' => hashEncrypt($this->input->post('new_password')),
			];

			$this->user->updatePassword($id, $data);
			$this->session->set_flashdata('message', 'Password berhasil diupdate.');

			redirect(base_url('user'));
		}
	}

	

}

/* End of file User*/
