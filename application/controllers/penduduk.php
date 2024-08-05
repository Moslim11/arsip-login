<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Penduduk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Penduduk_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['title'] = 'Data Penduduk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['totalwarga'] = $this->db->count_all('warga');
		$data['warga'] = $this->Penduduk_model->get_warga_sorted();

		$this->db->where('jenis_kelamin', 'L');
		$data['jumlah_laki_laki'] = $this->db->count_all_results('warga');

		$this->db->where('jenis_kelamin', 'P');
		$data['jumlah_perempuan'] = $this->db->count_all_results('warga');

		$data['usia05'] = $this->Penduduk_model->get_total_warga_by_age(0, 5);
		$data['usia016'] = $this->Penduduk_model->get_total_warga_by_age(0, 16);
		$data['usia17100'] = $this->Penduduk_model->get_total_warga_by_age(17, 100);

		// Pagination configuration
		$config['base_url'] = base_url('penduduk/index');
		$config['total_rows'] = $this->Penduduk_model->get_count();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;

		// Styling pagination
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['warga'] = $this->Penduduk_model->get_warga1_sorted($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();

		foreach ($data['warga'] as &$warga) {
			$tanggal_lahir = $warga['tanggal_lahir'];
			if ($tanggal_lahir != '0000-00-00') {
				$tanggal_hari_ini = date('Y-m-d');
				$warga['usia'] = date_diff(date_create($tanggal_lahir), date_create($tanggal_hari_ini))->y;
			} else {
				$warga['usia'] = '';
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('penduduk/index', $data);
		$this->load->view('templates/footer');
	}

	public function search_warga()
	{
		$term = $this->input->get('q');
		$this->db->like('nama', $term);
		$this->db->or_like('nik', $term);
		$query = $this->db->get('warga');
		$data = $query->result_array();
		echo json_encode($data);
	}


	public function hapusDataWarga($dataWarga)
	{

		$this->load->model('Penduduk_model');
		$this->load->library('form_validation');

		$this->Penduduk_model->hapusDataWarga($dataWarga);
		$this->session->set_flashdata('flash', 'Dihapus');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data warga telah dihapus !</div>');
		redirect('penduduk');
	}
	public function hapusDataKK($dataKK)
	{

		$this->load->model('Penduduk_model');
		$this->load->library('form_validation');

		$this->Penduduk_model->hapusDataKK($dataKK);
		$this->session->set_flashdata('flash', 'Dihapus');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data warga telah dihapus !</div>');
		redirect('penduduk/kk');
	}
	public function hapusWarga($id)
	{
		$this->Penduduk_model->hapusWarga($id);
		$this->session->set_flashdata('flash', 'Dihapus');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data warga telah dihapus !</div>');
		redirect('penduduk/kk');
	}


	public function detail($id)
	{
		$this->load->model('Penduduk_model');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$warga = $this->Penduduk_model->get_warga($id);
		if (!$warga) {
			$data['error_message'] = "Data warga tidak ditemukan.";
		} else {
			$data['warga'] = $warga;
		}
		$data['title'] = 'Data Warga';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('penduduk/detailwarga', $data);
		$this->load->view('templates/footer');
	}
	public function detailkk($id_kk)
	{
		$data['title'] = 'Detail Kartu Keluarga';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['keluarga'] = $this->Penduduk_model->get_kartu_keluarga_by_id($id_kk);
		$data['anggota_keluarga'] = $this->Penduduk_model->get_anggota_keluarga($id_kk);
		$data['warga'] = $this->Penduduk_model->get_warga6();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('penduduk/detailkeluarga', $data);
		$this->load->view('templates/footer');
	}

	public function anggota_kk($id)
	{
		$this->load->model('Penduduk_model');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['keluarga'] = $this->Penduduk_model->get_keluarga($id);
		$data['warga'] = $this->Penduduk_model->get_warga6();
		$data['data_warga'] = $this->Penduduk_model->get_warga3();
		$data['warga_dalam_kk'] = $this->Penduduk_model->get_anggota_keluarga($id);

		$this->form_validation->set_rules('anggota_keluarga', 'Anggota Keluarga', 'required|is_unique[warga_kartu_keluarga.id]', [
			'required' => 'Data Belum diisi untuk kolom Anggota Keluarga.',
			'is_unique' => 'Warga sudah ada.'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Anggota Keluarga';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('penduduk/anggota_kk', $data);
			$this->load->view('templates/footer');
		} else {
			$warga_id = $this->input->post('anggota_keluarga', TRUE);

			$warga = $this->db->get_where('warga', ['id' => $warga_id])->row_array();
			if ($warga) {
				$kk_data = [
					'id' => $warga_id,
					'id_kk' => $id,
				];

				$this->db->insert('warga_kartu_keluarga', $kk_data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota keluarga berhasil ditambahkan!</div>');
				redirect('penduduk/anggota_kk/' . $id);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Warga tidak ditemukan!</div>');
				redirect('penduduk/anggota_kk/' . $id);
			}
		}
	}

	public function tambahpenduduk()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Aturan validasi
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[warga.nik]', [
			'required' => 'Data Belum diisi untuk kolom NIK.',
			'numeric' => 'NIK harus berupa angka.',
			'exact_length' => 'Panjang NIK harus tepat 16 angka.',
			'is_unique' => 'NIK sudah ada.'
		]);
		$this->form_validation->set_rules('nama', 'Nama Warga', 'required', [
			'required' => 'Data Belum diisi untuk kolom Nama Warga.'
		]);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
			'required' => 'Data Belum diisi untuk kolom Tempat Lahir.'
		]);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
			'required' => 'Data Belum diisi untuk kolom Tanggal Lahir.'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
			'required' => 'Data Belum diisi untuk kolom Jenis Kelamin.'
		]);
		$this->form_validation->set_rules('alamat_ktp', 'Alamat KTP', 'required', [
			'required' => 'Data Belum diisi untuk kolom Alamat KTP.'
		]);
		$this->form_validation->set_rules('alamat_warga', 'Alamat Warga', 'required', [
			'required' => 'Data Belum diisi untuk kolom Alamat Warga.'
		]);
		$this->form_validation->set_rules('desa_kelurahan', 'Desa Kelurahan', 'required', [
			'required' => 'Data Belum diisi untuk kolom Desa Kelurahan.'
		]);
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
			'required' => 'Data Belum diisi untuk kolom Kecamatan.'
		]);
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required', [
			'required' => 'Data Belum diisi untuk kolom Kabupaten.'
		]);
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required', [
			'required' => 'Data Belum diisi untuk kolom Provinsi.'
		]);
		$this->form_validation->set_rules('negara', 'Negara', 'required', [
			'required' => 'Data Belum diisi untuk kolom Negara.'
		]);
		$this->form_validation->set_rules('rt', 'RT', 'required', [
			'required' => 'Data Belum diisi untuk kolom RT.'
		]);
		$this->form_validation->set_rules('rw', 'RW', 'required', [
			'required' => 'Data Belum diisi untuk kolom RW.'
		]);
		$this->form_validation->set_rules('agama', 'Agama', 'required', [
			'required' => 'Data Belum diisi untuk kolom Agama.'
		]);
		$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required', [
			'required' => 'Data Belum diisi untuk kolom Pendidikan Terakhir.'
		]);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required', [
			'required' => 'Data Belum diisi untuk kolom Pekerjaan.'
		]);
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required', [
			'required' => 'Data Belum diisi untuk kolom Status Perkawinan.'
		]);


		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Data Warga';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('penduduk/tambahpenduduk', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data dari form dengan sanitasi input
			$warga_data = [
				'nik' => $this->input->post('nik', TRUE),
				'nama' => $this->input->post('nama', TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat_ktp' => $this->input->post('alamat_ktp', TRUE),
				'alamat_warga' => $this->input->post('alamat_warga', TRUE),
				'desa_kelurahan' => $this->input->post('desa_kelurahan', TRUE),
				'kecamatan' => $this->input->post('kecamatan', TRUE),
				'kabupaten' => $this->input->post('kabupaten', TRUE),
				'provinsi' => $this->input->post('provinsi', TRUE),
				'negara' => $this->input->post('negara', TRUE),
				'rt' => $this->input->post('rt', TRUE),
				'rw' => $this->input->post('rw', TRUE),
				'agama' => $this->input->post('agama', TRUE),
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir', TRUE),
				'pekerjaan' => $this->input->post('pekerjaan', TRUE),
				'status_perkawinan' => $this->input->post('status_perkawinan', TRUE)
			];

			// Simpan data ke dalam database
			$this->db->insert('warga', $warga_data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data warga berhasil ditambahkan!</div>');
			redirect('penduduk');
		}
	}

	public function ubahdata($id)
	{
		$this->load->model('Penduduk_model');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$warga = $this->Penduduk_model->get_warga_by_id($id);
		$data['warga'] = $warga;

		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[warga.nik]', [
			'required' => 'Data Belum diisi untuk kolom NIK.',
			'numeric' => 'NIK harus berupa angka.',
			'exact_length' => 'Panjang NIK harus tepat 16 angka.',
			'is_unique' => 'NIK sudah ada.'
		]);
		$this->form_validation->set_rules('nama', 'Nama Warga', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat_ktp', 'Alamat KTP', 'required');
		$this->form_validation->set_rules('alamat_warga', 'Alamat Warga', 'required');
		$this->form_validation->set_rules('desa_kelurahan', 'Desa Kelurahan', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('negara', 'Negara', 'required');
		$this->form_validation->set_rules('rt', 'RT', 'required');
		$this->form_validation->set_rules('rw', 'RW', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');


		// Setel aturan validasi untuk bidang lainnya seperti yang Anda lakukan sebelumnya

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Data Warga';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('penduduk/ubahdatawarga', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data dari formulir
			$update_data = [
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat_ktp' => $this->input->post('alamat_ktp'),
				'alamat_warga' => $this->input->post('alamat_warga'),
				'desa_kelurahan' => $this->input->post('desa_kelurahan'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kabupaten' => $this->input->post('kabupaten'),
				'provinsi' => $this->input->post('provinsi'),
				'negara' => $this->input->post('negara'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
				'agama' => $this->input->post('agama', TRUE),
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir', TRUE),
				'pekerjaan' => $this->input->post('pekerjaan', TRUE),
				'status_perkawinan' => $this->input->post('status_perkawinan', TRUE)
				// Ambil data lainnya dari formulir dengan cara yang sama
			];

			// Simpan data ke dalam database
			$this->Penduduk_model->update_warga($id, $update_data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data warga berhasil diubah !</div>');
			redirect('penduduk/detail/' . $id);
		}
	}

	public function cetak()
	{
		$data['warga'] = $this->db->get('warga')->result_array();
		$this->load->view('penduduk/cetak', $data);
	}
	public function cetakkk()
	{
		$data['kartu_keluarga'] = $this->Penduduk_model->get_kartu_keluarga_with_kepala();
		$data['data_warga'] = $this->Penduduk_model->get_warga4();
		$data['jumlah_anggota'] = $this->Penduduk_model->hitung_anggota_keluarga();
		$this->load->view('penduduk/cetakkk', $data);
	}
	public function cetakdata($id)
	{
		$this->load->model('Penduduk_model');
		$data['warga'] = $this->Penduduk_model->get_warga_by_id($id);
		$warga = $this->Penduduk_model->get_warga($id);
		if (!$warga) {
			$data['error_message'] = "Data warga tidak ditemukan.";
		} else {
			$data['warga'] = $warga;
		}
		$this->load->view('penduduk/cetakdata', $data);
	}
	public function cetak_detailkk($id_kk)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['keluarga'] = $this->Penduduk_model->get_kartu_keluarga_by_id($id_kk);
		$data['anggota_keluarga'] = $this->Penduduk_model->get_anggota_keluarga($id_kk);
		$data['warga'] = $this->Penduduk_model->get_warga6();

		$this->load->view('penduduk/cetak_detailkk', $data);
	}

	public function kk()
	{
		$data['title'] = 'Data Kartu Keluarga';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kartu_keluarga'] = $this->Penduduk_model->get_kartu_keluarga_with_kepala();
		$data['data_warga'] = $this->Penduduk_model->get_warga4();
		$data['jumlah_anggota'] = $this->Penduduk_model->hitung_anggota_keluarga();
		$data['totalkk'] = $this->db->count_all('kartu_keluarga');

		// Pagination configuration
		$config['base_url'] = base_url('penduduk/kartukeluarga');
		$config['total_rows'] = $this->Penduduk_model->get_count1();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;

		// Styling pagination
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['kartu_keluarga'] = $this->Penduduk_model->get_warga2($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('penduduk/kartukeluarga', $data);
		$this->load->view('templates/footer');
	}


	public function tambah_kk()
	{
		$data['title'] = 'Tambah Kartu Keluarga';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_warga'] = $this->Penduduk_model->get_warga3();

		// Aturan validasi
		$this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required|numeric|exact_length[16]|is_unique[kartu_keluarga.no_kk]', [
			'required' => 'Data Belum diisi untuk kolom Nomor Kartu Keluarga.',
			'numeric' => 'Nomor Kartu Keluarga harus berupa angka.',
			'exact_length' => 'Panjang nomor kartu keluarga harus tepat 16 angka.',
			'is_unique' => 'Nomor kartu keluarga sudah ada.'
		]);
		$this->form_validation->set_rules('id_kepala_keluarga', 'ID Kepala Keluarga', 'required', [
			'required' => 'Data Belum diisi untuk kolom ID Kepala Keluarga.'
		]);
		$this->form_validation->set_rules('alamat_kk', 'Alamat Kartu Keluarga', 'required', [
			'required' => 'Data Belum diisi untuk kolom Alamat Kartu Keluarga.'
		]);
		$this->form_validation->set_rules('desa_kelurahan_kk', 'Desa Kelurahan', 'required', [
			'required' => 'Data Belum diisi untuk kolom Desa Kelurahan.'
		]);
		$this->form_validation->set_rules('kec_kk', 'Kecamatan', 'required', [
			'required' => 'Data Belum diisi untuk kolom Kecamatan.'
		]);
		$this->form_validation->set_rules('kab_kk', 'Kabupaten/Kota', 'required', [
			'required' => 'Data Belum diisi untuk kolom Kabupaten/Kota.'
		]);
		$this->form_validation->set_rules('prov_kk', 'Provinsi', 'required', [
			'required' => 'Data Belum diisi untuk kolom Provinsi.'
		]);
		$this->form_validation->set_rules('negara_kk', 'Negara', 'required', [
			'required' => 'Data Belum diisi untuk kolom Negara.'
		]);
		$this->form_validation->set_rules('rt_kk', 'RT', 'required', [
			'required' => 'Data Belum diisi untuk kolom RT.'
		]);
		$this->form_validation->set_rules('rw_kk', 'RW', 'required', [
			'required' => 'Data Belum diisi untuk kolom RW.'
		]);
		$this->form_validation->set_rules('kode_pos_kk', 'Kode Pos', 'required', [
			'required' => 'Data Belum diisi untuk kolom Kode Pos.'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('penduduk/tambah_kk', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data dari form dengan sanitasi input
			$kk_data = [
				'no_kk' => $this->input->post('no_kk', TRUE),
				'id_kepala_kk' => $this->input->post('id_kepala_keluarga', TRUE),
				'alamat_kk' => $this->input->post('alamat_kk', TRUE),
				'desa_kelurahan_kk' => $this->input->post('desa_kelurahan_kk', TRUE),
				'kec_kk' => $this->input->post('kec_kk', TRUE),
				'kab_kk' => $this->input->post('kab_kk', TRUE),
				'prov_kk' => $this->input->post('prov_kk', TRUE),
				'negara_kk' => $this->input->post('negara_kk', TRUE),
				'rt_kk' => $this->input->post('rt_kk', TRUE),
				'rw_kk' => $this->input->post('rw_kk', TRUE),
				'kode_pos_kk' => $this->input->post('kode_pos_kk', TRUE)
			];

			// Simpan data ke dalam database
			$this->db->insert('kartu_keluarga', $kk_data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kartu keluarga berhasil ditambahkan!</div>');
			redirect('penduduk/kk');
		}
	}

	public function ubah_kk($id_kk)
	{
		$data['title'] = 'Ubah Kartu Keluarga';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_warga'] = $this->Penduduk_model->get_warga3();
		$data['kartu_keluarga'] = $this->db->get_where('kartu_keluarga', ['id_kk' => $id_kk])->row_array();

		// Aturan validasi
		$this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required|numeric|exact_length[16]', [
			'required' => 'Data Belum diisi untuk kolom Nomor Kartu Keluarga.',
			'numeric' => 'Nomor Kartu Keluarga harus berupa angka.',
			'exact_length' => 'Panjang nomor kartu keluarga harus tepat 16 angka.',
		]);
		$this->form_validation->set_rules('id_kepala_keluarga', 'ID Kepala Keluarga', 'required', [
			'required' => 'Data Belum diisi untuk kolom ID Kepala Keluarga.'
		]);
		$this->form_validation->set_rules('alamat_kk', 'Alamat Kartu Keluarga', 'required', [
			'required' => 'Data Belum diisi untuk kolom Alamat Kartu Keluarga.'
		]);
		$this->form_validation->set_rules('desa_kelurahan_kk', 'Desa Kelurahan', 'required', [
			'required' => 'Data Belum diisi untuk kolom Desa Kelurahan.'
		]);
		$this->form_validation->set_rules('kec_kk', 'Kecamatan', 'required', [
			'required' => 'Data Belum diisi untuk kolom Kecamatan.'
		]);
		$this->form_validation->set_rules('kab_kk', 'Kabupaten/Kota', 'required', [
			'required' => 'Data Belum diisi untuk kolom Kabupaten/Kota.'
		]);
		$this->form_validation->set_rules('prov_kk', 'Provinsi', 'required', [
			'required' => 'Data Belum diisi untuk kolom Provinsi.'
		]);
		$this->form_validation->set_rules('negara_kk', 'Negara', 'required', [
			'required' => 'Data Belum diisi untuk kolom Negara.'
		]);
		$this->form_validation->set_rules('rt_kk', 'RT', 'required', [
			'required' => 'Data Belum diisi untuk kolom RT.'
		]);
		$this->form_validation->set_rules('rw_kk', 'RW', 'required', [
			'required' => 'Data Belum diisi untuk kolom RW.'
		]);
		$this->form_validation->set_rules('kode_pos_kk', 'Kode Pos', 'required', [
			'required' => 'Data Belum diisi untuk kolom Kode Pos.'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('penduduk/ubah_kk', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data dari form dengan sanitasi input
			$kk_data = [
				'no_kk' => $this->input->post('no_kk', TRUE),
				'id_kepala_kk' => $this->input->post('id_kepala_keluarga', TRUE),
				'alamat_kk' => $this->input->post('alamat_kk', TRUE),
				'desa_kelurahan_kk' => $this->input->post('desa_kelurahan_kk', TRUE),
				'kec_kk' => $this->input->post('kec_kk', TRUE),
				'kab_kk' => $this->input->post('kab_kk', TRUE),
				'prov_kk' => $this->input->post('prov_kk', TRUE),
				'negara_kk' => $this->input->post('negara_kk', TRUE),
				'rt_kk' => $this->input->post('rt_kk', TRUE),
				'rw_kk' => $this->input->post('rw_kk', TRUE),
				'kode_pos_kk' => $this->input->post('kode_pos_kk', TRUE)
			];

			// Simpan data ke dalam database
			$this->db->where('id_kk', $id_kk);
			$this->db->update('kartu_keluarga', $kk_data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kartu keluarga berhasil diubah!</div>');
			redirect('penduduk/kk');
		}
	}
}
