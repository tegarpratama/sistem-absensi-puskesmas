<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getPosition()
	{
		return $this->db->get('positions')->result_array();
	}

	public function getAdminProfile()
	{
		return $this->db->get_where('users', ['id_users' => 1])->row_array();
	}

	public function updateProfile($data)
	{
		$this->db->update('users', $data, ['id_users' => 1]);
		return $this->db->affected_rows();
	}

	public function updatePassword($data)
	{
		$this->db->update('users', $data, ['id_users' => 1]);
		return $this->db->affected_rows();
	}

}

/* End of file ModelName.php */
