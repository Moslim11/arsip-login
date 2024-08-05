<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Surat_model extends CI_Model
{
	public function getYears()
	{
		// Ambil daftar tahun dari database (gunakan GROUP BY pada kolom tahun)
		$this->db->select("YEAR(tanggal_surat) AS tahun");
		$this->db->group_by("YEAR(tanggal_surat)");
		$this->db->order_by("tanggal_surat", "DESC");
		$query = $this->db->get("surat_masuk");
		return $query->result_array();
	}

	public function getMonths($tahun)
	{
		$this->db->select("MONTH(tanggal_surat) AS bulan");
		$this->db->where("YEAR(tanggal_surat)", $tahun);
		$this->db->group_by("MONTH(tanggal_surat)");
		$query = $this->db->get("surat_masuk");
		return $query->result_array();
	}

	public function getSuratByYearMonth($tahun, $bulan)
	{
		$this->db->where("YEAR(tanggal_surat)", $tahun);
		$this->db->where("MONTH(tanggal_surat)", $bulan);
		$query = $this->db->get("surat_masuk");
		return $query->result_array();
	}

	public function getYears1()
	{
		// Ambil daftar tahun dari database (gunakan GROUP BY pada kolom tahun)
		$this->db->select("YEAR(tanggal_surat) AS tahun");
		$this->db->group_by("YEAR(tanggal_surat)");
		$this->db->order_by("tanggal_surat", "DESC");
		$query = $this->db->get("surat_keluar");
		return $query->result_array();
	}

	public function getMonths1($tahun)
	{
		$this->db->select("MONTH(tanggal_surat) AS bulan");
		$this->db->where("YEAR(tanggal_surat)", $tahun);
		$this->db->group_by("MONTH(tanggal_surat)");
		$query = $this->db->get("surat_keluar");
		return $query->result_array();
	}

	public function getSuratByYearMonth1($tahun, $bulan)
	{
		$this->db->where("YEAR(tanggal_surat)", $tahun);
		$this->db->where("MONTH(tanggal_surat)", $bulan);
		$query = $this->db->get("surat_keluar");
		return $query->result_array();
	}

	public function caridatasurat()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->from('surat_masuk');
		$this->db->select('*');
		$this->db->like('nomor_surat', $keyword);
		$this->db->or_like('tanggal_surat', $keyword);
		$this->db->or_like('asal_surat', $keyword);
		$this->db->or_like('perihal', $keyword);

		return $this->db->get()->result_array();
	}

	public function caridatasuratkeluar()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->from('surat_keluar');
		$this->db->select('*');
		$this->db->like('nomor_surat', $keyword);
		$this->db->or_like('tanggal_surat', $keyword);
		$this->db->or_like('asal_surat', $keyword);
		$this->db->or_like('perihal', $keyword);

		return $this->db->get()->result_array();
	}

	public function get_surat_by_id($id)
	{
		$query = $this->db->get_where('surat_masuk', array('id' => $id));
		return $query->row();
	}

	public function get_surat_by_id1($id)
	{
		$query = $this->db->get_where('surat_keluar', array('id' => $id));
		return $query->row();
	}

	public function getSuratById($id)
	{
		$query = $this->db->get_where('surat_masuk', array('id' => $id));
		return $query->row();
	}

	public function getSuratById1($id)
	{
		$query = $this->db->get_where('surat_keluar', array('id' => $id));
		return $query->row();
	}
}
