<?php
class User_model extends CI_Model
{
	public function get_users()
	{
		return $this->db->get('user')->result_array();
	}

	public function get_user_submenu()
	{
		return $this->db->get('user_sub_menu')->result_array();
	}

	public function caridatauser()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->select('user.*, user_role.role');
		$this->db->from('user');
		$this->db->join('user_role', 'user.role_id = user_role.id', 'left');
		$this->db->like('name', $keyword);
		$this->db->or_like('email', $keyword);
		$this->db->or_like('role', $keyword);

		return $this->db->get()->result_array();
	}
}
