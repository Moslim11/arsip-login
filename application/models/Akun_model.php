<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Akun_model extends CI_Model
{
	public function hapusDataUser($ua)
	{
		$this->db->where('id', $ua);
		$this->db->delete('user');
	}

	public function hapusDataMenu($m)
	{
		$this->db->where('id', $m);
		$this->db->delete('user_menu');
	}
	public function hapusDataSubmenu($sm)
	{
		$this->db->where('id', $sm);
		$this->db->delete('user_sub_menu');
	}
	public function hapusDataRole($r)
	{
		$this->db->where('id', $r);
		$this->db->delete('user_role');
	}
	public function hapusDataSm($suratm)
	{
		$this->db->where('id', $suratm);
		$this->db->delete('surat_masuk');
	}

	public function hapusDataSk($suratk)
	{
		$this->db->where('id', $suratk);
		$this->db->delete('surat_keluar');
	}

	public function editAkun($m)
	{
		// Mengambil data user berdasarkan ID yang diterima sebagai argumen
		return $this->db->get_where('user', ['id' => $m])->row_array();
	}

	public function updateAkun($m)
	{
		// Memperbarui data akun berdasarkan ID yang diterima sebagai argumen
		$data = [
			'name' => $this->input->post('name', true),
			'role_id' => $this->input->post('role'),
		];

		$this->db->where('id', $m);
		$this->db->update('user', $data);
	}

	public function ubahSubmenu($id)
	{
		// Mengambil data user berdasarkan ID yang diterima sebagai argumen
		return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
	}

	public function updateSubmenu($id)
	{
		// Memperbarui data akun berdasarkan ID yang diterima sebagai argumen
		$data = [
			'title' => $this->input->post('title', true),
			'menu_id' => $this->input->post('menu'),
			'url' => $this->input->post('url', true),
			'icon' => $this->input->post('icon', true)
		];

		$this->db->where('id', $id);
		$this->db->update('user_sub_menu', $data);
	}

	public function editMenu($u)
	{
		// Mengambil data menu berdasarkan ID yang diterima sebagai argumen
		return $this->db->get_where('user_menu', ['id' => $u])->row_array();
	}

	public function updateMenu($u)
	{
		// Memperbarui data menu berdasarkan ID yang diterima sebagai argumen
		$data = [
			'menu' => $this->input->post('menu'),
		];

		$this->db->where('id', $u);
		$this->db->update('user_menu', $data);
	}
}
