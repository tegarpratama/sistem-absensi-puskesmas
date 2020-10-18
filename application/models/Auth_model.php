<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function checkEmail()
	{
		return $this->db->get_where('users', ['email' => $this->input->post('email')])->row_array();
	}

}

/* End of file ModelName.php */
