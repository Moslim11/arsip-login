<?php
class User_role_model extends CI_Model
{
	public function get_user_roles()
	{
		return $this->db->get('user_role')->result_array();
	}

	public function get_user_menu()
	{
		return $this->db->get('user_menu')->result_array();
	}
}
