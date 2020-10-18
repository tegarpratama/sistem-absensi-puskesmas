<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth');
	}
	
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
			'required'		=> 'Email tidak boleh kosong',
			'valid_email'	=> 'Email tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required',[
			'required'		=> 'Password tidak boleh kosong'
		]);

		if($this->form_validation->run() == FALSE){
			$this->load->view('auth/login');
		}else{
			$password = $this->input->post('password');
			$user = $this->auth->checkEmail();

			// Cek user berdasarkan email
			if(isset($user)){
				// Jika ada
				// Cek password sesuai atau tidak
				if(hashEncryptVerify($password, $user['password']) == TRUE){
					$this->session->set_userdata($user);
					$this->session->set_userdata('login', TRUE);
					
					if($user['role_id'] == 1){
						redirect('admin');
				  }else{
						redirect('user');
				  }
				}else{
					// Jika password tidak sesuai
					$this->session->set_flashdata('message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Email atau password salah!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'); 

					redirect('auth');
				}
			}else{
				// Jika email tidak sesuai
				$this->session->set_flashdata('message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Email atau password salah!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'); 

				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
			
		redirect('auth');
	}

}

/* End of file Controllername.php */
