<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran_model extends CI_Model {

	public function getKehadiran()
	{
		$format = "Y-m-d";
		$this->db->select('presents.*, users.name');
		$this->db->from('presents');
      $this->db->join('users', 'users.id_users = presents.user_id');
		$this->db->where('presents.date', date($format));
		$this->db->where('status', 0);
		return $this->db->get()->result_array();
	}

	public function getAbsensi($id)
	{
		$this->db->select('presents.user_id, presents.date, presents.time, presents.information,presents.status');
		$this->db->from('presents');
		$this->db->where('id_presents', $id);
		return $this->db->get()->row_array();
	}

	public function getAllKehadiranPerDay()
	{
		$format = "Y-m-d";
		$this->db->select('presents.*, users.name, positions.position_name');
		$this->db->from('presents');
		$this->db->join('users', 'users.id_users = presents.user_id');
      $this->db->join('positions', 'positions.id_positions = users.position_id');
		$this->db->like('date', date($format));
		$this->db->where('status', 1);
		$this->db->order_by('id_presents', 'desc');
		return $this->db->get()->result_array();
	}

	public function getRekap()
	{
		$query = "SELECT DISTINCT presents.user_id, users.name AS name, positions.position_name AS position, 
				(SELECT COUNT(information) FROM presents WHERE (information = 'M') AND (STATUS = 1) AND (presents.user_id = users.id_users)) AS M,
				(SELECT COUNT(information) FROM presents WHERE (information = 'I') AND (STATUS = 1) AND (presents.user_id = users.id_users)) AS I,
				(SELECT COUNT(information) FROM presents WHERE (information = 'S') AND (STATUS = 1) AND (presents.user_id = users.id_users)) AS S,
				(SELECT COUNT(information) FROM presents WHERE (STATUS = 1) AND (presents.user_id = users.id_users)) AS total
			FROM presents JOIN users
			ON presents.user_id = users.id_users
			JOIN positions ON users.position_id = positions.id_positions
			WHERE presents.status = 1
			AND MONTH(date) = MONTH(CURRENT_DATE())
			AND YEAR(date) = YEAR(CURRENT_DATE())
			GROUP BY presents.user_id";

		return $this->db->query($query)->result_array();
	}

	public function updateAbsensi($id, $data)
	{
		$this->db->update('presents', $data, ['id_presents' => $id]);
	}

}

/* End of file ModelName.php */
