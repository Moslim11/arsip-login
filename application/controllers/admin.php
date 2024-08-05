<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['totalUsers'] = $this->db->count_all('user');
		$data['totalSuratMasuk'] = $this->db->count_all('surat_masuk');
		$data['totalSuratKeluar'] = $this->db->count_all('surat_keluar');
		$data['totalwarga'] = $this->db->count_all('warga');
		$data['totalkk'] = $this->db->count_all('kartu_keluarga');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'role' => $this->input->post('role')
			];

			$this->db->insert('user_role', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role baru berhasil ditambahkan !</div>');
			redirect('admin/role');
		}
	}

	public function hapusRole($data)
	{

		$this->load->model('Akun_model');
		$this->load->library('form_validation');

		$this->Akun_model->hapusDataRole($data);
		$this->session->set_flashdata('flash', 'Dihapus');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil dihapus.</div>');
		redirect('admin/role');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Akses Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses diubah !</div>');
	}

	public function akun()
	{
		$data['title'] = 'Akun';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('User_model');
		$this->load->model('User_role_model');

		// Ambil data dari tabel user dan user_role
		$users = $this->User_model->get_users();
		$user_roles = $this->User_role_model->get_user_roles();

		// Lakukan proses penggabungan data
		$merged_data = array();
		foreach ($users as $user) {
			$user_id = $user['id'];
			foreach ($user_roles as $role) {
				if ($role['id'] == $user['role_id']) {
					$user['role'] = $role['role'];
					break;
				}
			}
			$merged_data[] = $user;
		}
		$data['users'] = $merged_data;
		if ($this->input->post('keyword')) {
			$data['users'] = $this->User_model->caridatauser();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/akun', $data);
		$this->load->view('templates/footer');
	}
	public function registration()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim', [
			'required' => 'Data Belum diisi untuk kolom Nama.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email ini sudah terdaftar !',
			'required' => 'Data Belum diisi untuk kolom Email.'
		]);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[8]|matches[password2]',
			[
				'matches' => 'Password harus sama !', 'min_length' => 'Password terlalu pendek !',
				'required' => 'Data Belum diisi untuk kolom Password.'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
			'required' => 'Data Belum diisi untuk kolom Password.'
		]);

		$data['user_roles'] = $this->db->get('user_role')->result_array();

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/registration');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('role', true),
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat ! akun baru berhasil dibuat !.</div>');
			redirect('admin/akun');
		}
	}

	public function hapus($ua)
	{

		$this->load->model('Akun_model');
		$this->load->library('form_validation');

		$this->Akun_model->hapusDataUser($ua);
		$this->session->set_flashdata('flash', 'Dihapus');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dihapus !.</div>');
		redirect('admin/akun');
	}

	public function editakun($m)
	{
		$data['title'] = 'Ubah Akun';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Akun_model');
		$data['akun'] = $this->Akun_model->editAkun($m);

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->load->model('User_model');
		$this->load->model('User_role_model');

		$data['users'] = $this->User_model->get_users();
		$data['user_roles'] = $this->User_role_model->get_user_roles();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editakun', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Akun_model->updateAkun($m);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diubah !.</div>');
			redirect('admin/akun');
		}
	}
}
