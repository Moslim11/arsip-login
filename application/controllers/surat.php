<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function suratMasuk()
	{
		$this->load->model('Surat_model');
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['years'] = $this->Surat_model->getYears();

		$tahun = 2023; // Ganti dengan tahun yang sesuai
		$data['months'] = $this->Surat_model->getMonths($tahun);

		$bulan = 12; // Ganti dengan bulan yang sesuai
		$data['surat'] = $this->Surat_model->getSuratByYearMonth($tahun, $bulan);

		$data['totalSuratMasuk'] = $this->db->count_all('surat_masuk');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/suratmasuk', $data);
		$this->load->view('templates/footer');
	}
	public function suratKeluar()
	{
		$this->load->model('Surat_model');
		$data['title'] = 'Surat Keluar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['years'] = $this->Surat_model->getYears1();

		$tahun = 2023; // Ganti dengan tahun yang sesuai
		$data['months'] = $this->Surat_model->getMonths1($tahun);

		$bulan = 12; // Ganti dengan bulan yang sesuai
		$data['surat'] = $this->Surat_model->getSuratByYearMonth1($tahun, $bulan);

		$data['totalSuratKeluar'] = $this->db->count_all('surat_Keluar');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/suratkeluar', $data);
		$this->load->view('templates/footer');
	}

	public function showSuratByYear($tahun)
	{
		$this->load->model('Surat_model');
		$data['title'] = "Surat Masuk - Tahun $tahun";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tahun'] = $tahun;
		$data['bulan'] = null;


		$data['years'] = $this->Surat_model->getYears();
		$data['months'] = $this->Surat_model->getMonths($tahun);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/bulan', $data);
		$this->load->view('templates/footer');
	}

	public function showSuratByMonth($tahun, $bulan)
	{
		$this->load->model('Surat_model');
		$data['title'] = "Surat Masuk - Bulan " . date("F", mktime(0, 0, 0, $bulan, 1)) . " $tahun";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tahun'] = $tahun;
		$data['bulan'] = $bulan;


		$data['years'] = $this->Surat_model->getYears();
		$data['months'] = $this->Surat_model->getMonths($tahun);
		$data['surat'] = $this->Surat_model->getSuratByYearMonth($tahun, $bulan);

		if ($this->input->post('keyword')) {
			$data['surat'] = $this->Surat_model->caridatasurat();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/isisuratmasuk', $data);
		$this->load->view('templates/footer');
	}

	public function showSuratByYear1($tahun)
	{
		$this->load->model('Surat_model');
		$data['title'] = "Surat Keluar - Tahun $tahun";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tahun'] = $tahun;
		$data['bulan'] = null;


		$data['years'] = $this->Surat_model->getYears1();
		$data['months'] = $this->Surat_model->getMonths1($tahun);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/bulansk', $data);
		$this->load->view('templates/footer');
	}

	public function showSuratByMonth1($tahun, $bulan)
	{
		$this->load->model('Surat_model');
		$data['title'] = "Surat Keluar - Bulan " . date("F", mktime(0, 0, 0, $bulan, 1)) . " $tahun";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tahun'] = $tahun;
		$data['bulan'] = $bulan;


		$data['years'] = $this->Surat_model->getYears1();
		$data['months'] = $this->Surat_model->getMonths1($tahun);
		$data['surat'] = $this->Surat_model->getSuratByYearMonth1($tahun, $bulan);

		if ($this->input->post('keyword')) {
			$data['surat'] = $this->Surat_model->caridatasuratkeluar();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/isisuratkeluar', $data);
		$this->load->view('templates/footer');
	}

	public function tambahsm()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required|trim|is_unique[surat_masuk.nomor_surat]', [
			'is_unique' => 'Nomor surat sudah ada !'
		]);
		$this->form_validation->set_rules('asal_surat', 'Asal Surat', 'required|trim');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Data Surat';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat/tambahsm');
			$this->load->view('templates/footer');
		} else {
			$config['upload_path'] = './assets/uploads/sm/';
			$config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png|webp|svg';
			$config['max_size'] = 51200;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file_surat')) {
				$upload_data = $this->upload->data();
				$file_surat = $upload_data['file_name'];

				$data = [
					'nomor_surat' => $this->input->post('nomor_surat', true),
					'tanggal_surat' => date('Y-m-d', strtotime($this->input->post('tanggal_surat', true))),
					'asal_surat' => $this->input->post('asal_surat', true),
					'penerima' => $this->input->post('penerima', true),
					'perihal' => $this->input->post('perihal', true),
					'file_surat' => $file_surat // Add this line to set the 'file_surat' column
				];

				$this->db->insert('surat_masuk', $data);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data surat berhasil ditambahkan !</div>');
				redirect('surat/suratmasuk');
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
				redirect('surat/tambahsm');
			}
		}
	}

	public function tambahsk()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required|trim|is_unique[surat_keluar.nomor_surat]', [
			'is_unique' => 'Nomor surat sudah ada !'
		]);
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Data Surat';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat/tambahsk');
			$this->load->view('templates/footer');
		} else {
			$config['upload_path'] = './assets/uploads/sk/';
			$config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png|webp|svg';
			$config['max_size'] = 51200;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file_surat')) {
				$upload_data = $this->upload->data();
				$file_surat = $upload_data['file_name'];

				$data = [
					'nomor_surat' => $this->input->post('nomor_surat', true),
					'tanggal_surat' => date('Y-m-d', strtotime($this->input->post('tanggal_surat', true))),
					'tujuan' => $this->input->post('tujuan', true),
					'penerima' => $this->input->post('penerima', true),
					'perihal' => $this->input->post('perihal', true),
					'file_surat' => $file_surat // Add this line to set the 'file_surat' column
				];

				$this->db->insert('surat_keluar', $data);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data surat berhasil ditambahkan !</div>');
				redirect('surat/suratkeluar');
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
				redirect('surat/tambahsk');
			}
		}
	}

	public function hapusDataSm($suratm)
	{

		$this->load->model('Akun_model');
		$this->load->library('form_validation');

		$this->Akun_model->hapusDataSm($suratm);
		$this->session->set_flashdata('flash', 'Dihapus');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data surat telah dihapus !</div>');
		redirect('surat/suratmasuk');
	}

	public function hapusDataSk($suratk)
	{

		$this->load->model('Akun_model');
		$this->load->library('form_validation');

		$this->Akun_model->hapusDataSk($suratk);
		$this->session->set_flashdata('flash', 'Dihapus');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data surat telah dihapus !</div>');
		redirect('surat/suratkeluar');
	}

	public function ubahsm($id)
	{
		$this->load->model('Surat_model');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat'] = $this->Surat_model->get_surat_by_id($id);

		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required|trim');
		$this->form_validation->set_rules('asal_surat', 'Asal Surat', 'required|trim');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Edit Data Surat';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat/ubahsm', $data);
			$this->load->view('templates/footer');
		} else {
			$tanggal_surat = $this->input->post('tanggal_surat', true);

			if (!empty($_FILES['file_surat']['name'])) {
				$config['upload_path'] = './assets/uploads/sm/';
				$config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png|webp|svg';
				$config['max_size'] = 51200;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file_surat')) {
					$upload_data = $this->upload->data();
					$file_surat = $upload_data['file_name'];

					$file_lama = $data['surat']->file_surat;
					$file_path = './assets/uploads/sm/' . $file_lama;
					if (file_exists($file_path)) {
						unlink($file_path);
					}

					$data_update = [
						'nomor_surat' => $this->input->post('nomor_surat', true),
						'tanggal_surat' => date('Y-m-d', strtotime($tanggal_surat)),
						'asal_surat' => $this->input->post('asal_surat', true),
						'penerima' => $this->input->post('penerima', true),
						'perihal' => $this->input->post('perihal', true),
						'file_surat' => $file_surat
					];
					$this->db->where('id', $id);
					$this->db->update('surat_masuk', $data_update);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data surat berhasil diubah !</div>');
					redirect('surat/suratmasuk');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
					redirect('surat/ubahsm/' . $id);
				}
			} else {
				$data_update = [
					'nomor_surat' => $this->input->post('nomor_surat', true),
					'tanggal_surat' => date('Y-m-d', strtotime($tanggal_surat)),
					'asal_surat' => $this->input->post('asal_surat', true),
					'penerima' => $this->input->post('penerima', true),
					'perihal' => $this->input->post('perihal', true)
				];
				$this->db->where('id', $id);
				$this->db->update('surat_masuk', $data_update);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data surat berhasil diubah !</div>');
				redirect('surat/suratmasuk');
			}
		}
	}


	public function ubahsk($id)
	{
		$this->load->model('Surat_model');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat'] = $this->Surat_model->get_surat_by_id1($id);

		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required|trim');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Edit Data Surat';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat/ubahsk', $data);
			$this->load->view('templates/footer');
		} else {
			$tanggal_surat = $this->input->post('tanggal_surat', true);

			if (!empty($_FILES['file_surat']['name'])) {
				$config['upload_path'] = './assets/uploads/sk/';
				$config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png|webp|svg';
				$config['max_size'] = 51200;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file_surat')) {
					$upload_data = $this->upload->data();
					$file_surat = $upload_data['file_name'];

					// Hapus file lama dari direktori
					$file_lama = $data['surat']->file_surat;
					$file_path = './assets/uploads/sk/' . $file_lama;
					if (file_exists($file_path)) {
						unlink($file_path);
					}

					$data_update = [
						'nomor_surat' => $this->input->post('nomor_surat', true),
						'tanggal_surat' => date('Y-m-d', strtotime($tanggal_surat)),
						'tujuan' => $this->input->post('tujuan', true),
						'penerima' => $this->input->post('penerima', true),
						'perihal' => $this->input->post('perihal', true),
						'file_surat' => $file_surat
					];
					$this->db->where('id', $id);
					$this->db->update('surat_keluar', $data_update);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data surat berhasil diubah !</div>');
					redirect('surat/suratkeluar');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
					redirect('surat/ubahsk/' . $id);
				}
			} else {
				// Tidak ada file baru diunggah, hanya perbarui data lainnya
				$data_update = [
					'nomor_surat' => $this->input->post('nomor_surat', true),
					'tanggal_surat' => date('Y-m-d', strtotime($tanggal_surat)),
					'tujuan' => $this->input->post('tujuan', true),
					'penerima' => $this->input->post('penerima', true),
					'perihal' => $this->input->post('perihal', true)
				];
				$this->db->where('id', $id);
				$this->db->update('surat_keluar', $data_update);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data surat berhasil diubah !</div>');
				redirect('surat/suratkeluar');
			}
		}
	}


	public function viewFile($id)
	{
		$this->load->model('Surat_model');
		$data['surat'] = $this->Surat_model->getSuratById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

		$fileUrl = base_url('assets/uploads/sm/' . $data['surat']->file_surat);
		$data['fileUrl'] = $fileUrl;

		$fileExtension = pathinfo($data['surat']->file_surat, PATHINFO_EXTENSION);
		$allowedExtensions = array('pdf', 'doc', 'docx', 'JPG', 'jpeg', 'png', 'webp', 'svg', 'jpg', 'PNG', 'WEBP', 'SVG');

		if (in_array($fileExtension, $allowedExtensions)) {
			if ($fileExtension == 'pdf') {
				$this->load->view('surat/view_file', $data);
			} elseif ($fileExtension == 'doc' || $fileExtension == 'docx') {
				$this->load->view('surat/view_file', $data);
			} elseif (in_array($fileExtension, array('JPG', 'jpeg', 'png', 'webp', 'svg', 'jpg', 'PNG', 'WEBP', 'SVG'))) {
				$this->load->view('surat/viewimage', $data);
			}
		} else {
			echo "Format file tidak didukung.";
		}
	}

	public function viewFile1($id)
	{
		$this->load->model('Surat_model');
		$data['surat'] = $this->Surat_model->getSuratById1($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

		$fileUrl = base_url('assets/uploads/sk/' . $data['surat']->file_surat);
		$data['fileUrl'] = $fileUrl;

		$fileExtension = pathinfo($data['surat']->file_surat, PATHINFO_EXTENSION);
		$allowedExtensions = array('pdf', 'doc', 'docx', 'JPG', 'jpeg', 'png', 'webp', 'svg', 'jpg', 'PNG', 'WEBP', 'SVG');

		if (in_array($fileExtension, $allowedExtensions)) {
			if ($fileExtension == 'pdf') {
				$this->load->view('surat/view_file1', $data);
			} elseif ($fileExtension == 'doc' || $fileExtension == 'docx') {
				$this->load->view('surat/view_file1', $data);
			} elseif (in_array($fileExtension, array('JPG', 'jpeg', 'png', 'webp', 'svg', 'jpg', 'PNG', 'WEBP', 'SVG'))) {
				$this->load->view('surat/viewimage', $data);
			}
		} else {
			echo "Format file tidak didukung.";
		}
	}
}
