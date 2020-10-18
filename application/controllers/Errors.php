<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function index()
	{
		$this->load->view('errors/index');
	}

}

/* End of file Controllername.php */
