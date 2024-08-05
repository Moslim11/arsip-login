<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{
	public function get_warga($id)
	{
		$data = $this->db->get_where('warga', array('id' => $id));
		return $data->result_array();
	}
	public function get_keluarga($id)
	{
		$data = $this->db->get_where('kartu_keluarga', array('id_kk' => $id));
		return $data->result_array();
	}

	public function get_warga3()
	{
		$query = $this->db->get('warga');
		return $query->result_array();
	}

	public function get_count()
	{
		return $this->db->count_all('warga');
	}
	public function get_count1()
	{
		return $this->db->count_all('kartu_keluarga');
	}

	public function get_warga1($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get('warga');

		return $query->result_array();
	}
	public function get_warga2($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get('kartu_keluarga');

		return $query->result_array();
	}

	public function hapusDataWarga($id)
	{
		// Periksa apakah id warga memiliki referensi di tabel kartu_keluarga
		$this->db->where('id_kepala_kk', $id);
		$query = $this->db->get('kartu_keluarga');

		if ($query->num_rows() > 0) {
			// Jika ada referensi, set flash data error
			$this->session->set_flashdata('error', 'Data warga tidak dapat dihapus karena merupakan kepala keluarga pada data kartu keluarga.');
			redirect('penduduk'); // Ganti dengan metode redirect yang sesuai
		} else {
			// Jika tidak ada referensi, lanjutkan dengan penghapusan
			$this->db->where('id', $id);
			$this->db->delete('warga');

			// Set flash data sukses
			$this->session->set_flashdata('message', 'Data warga berhasil dihapus.');
			redirect('penduduk'); // Ganti dengan metode redirect yang sesuai
		}
	}

	public function hapusDataKK($k)
	{
		$this->db->where('id_kk', $k);
		$this->db->delete('kartu_keluarga');
	}
	public function hapusWarga($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('warga_kartu_keluarga');
	}

	public function get_warga_by_id($id)
	{
		return $this->db->get_where('warga', array('id' => $id))->row_array();
	}

	public function update_warga($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('warga', $data);
	}

	public function get_kartu_keluarga_with_kepala()
	{
		$query = "SELECT kartu_keluarga.*, warga.nama,warga.nik
              FROM kartu_keluarga 
              LEFT JOIN warga ON kartu_keluarga.id_kk = warga.id";
		return $this->db->query($query)->result_array();
	}
	public function get_warga4()
	{
		$query = $this->db->get('warga');
		return $query->result_array();
	}
	public function get_warga6()
	{
		$query = $this->db->get('warga');
		return $query->result_array();
	}
	public function get_warga7()
	{
		$query = $this->db->get('warga_kartu_keluarga');
		return $query->result_array();
	}
	public function get_warga5()
	{
		$query = $this->db->get('warga_kartu_keluarga');
		return $query->result_array();
	}

	public function hitung_anggota_keluarga()
	{
		$this->db->select('id_kk, COUNT(*) as jumlah_anggota');
		$this->db->group_by('id_kk');
		$query = $this->db->get('warga_kartu_keluarga');
		$result = $query->result_array();

		$jumlah_anggota = [];
		foreach ($result as $row) {
			$jumlah_anggota[$row['id_kk']] = $row['jumlah_anggota'];
		}
		return $jumlah_anggota;
	}

	public function cekAnggotaKeluarga($id_warga, $id_kk)
	{
		$this->db->where('warga_has_kk', $id_warga);
		$this->db->where('id_kk', $id_kk);
		$query = $this->db->get('warga_kartu_keluarga');
		return $query->num_rows() > 0;
	}

	public function tambahAnggotaKeluarga($id_warga, $id_kk)
	{
		$data = [
			'warga_has_kk' => $id_warga,
			'id_kk' => $id_kk
		];
		return $this->db->insert('warga_kartu_keluarga', $data);
	}
	public function get_anggota_keluarga($id_kk)
	{
		$this->db->select('warga.*');
		$this->db->from('warga');
		$this->db->join('warga_kartu_keluarga', 'warga.id = warga_kartu_keluarga.id');
		$this->db->where('warga_kartu_keluarga.id_kk', $id_kk);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kartu_keluarga_by_id($id_kk)
	{
		return $this->db->get_where('kartu_keluarga', ['id_kk' => $id_kk])->row_array();
	}

	public function get_warga_sorted()
	{
		$this->db->order_by('nama', 'ASC');
		return $this->db->get('warga')->result_array();
	}

	public function get_warga1_sorted($limit, $start)
	{
		$this->db->order_by('nama', 'ASC');
		$query = $this->db->get('warga', $limit, $start);
		return $query->result_array();
	}

	public function get_total_warga_by_age($min_age, $max_age)
	{
		$this->db->select('COUNT(*) as total');
		$this->db->from('warga');
		$this->db->where('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >=', $min_age);
		$this->db->where('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <=', $max_age);
		$query = $this->db->get();
		return $query->row()->total;
	}
}
