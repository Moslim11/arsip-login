<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu add !</div>');
			redirect('menu');
		}
	}

	public function editMenu($u)
	{
		$data['title'] = 'Edit Menu';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Load model Akun_model
		$this->load->model('Akun_model');
		// Mengambil data menu yang akan diubah berdasarkan ID yang diterima sebagai argumen
		$data['menu'] = $this->Akun_model->editMenu($u);

		// Mengambil semua data menu untuk opsi dalam select dropdown
		$data['all_menus'] = $this->db->get('user_menu')->result_array();

		// Load library form validation
		$this->load->library('form_validation');

		// Atur aturan validasi untuk field-menu, sesuaikan sesuai kebutuhan
		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			// Validasi gagal, muat kembali tampilan form edit dengan pesan kesalahan
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editmenu', $data);
			$this->load->view('templates/footer');
		} else {
			// Validasi berhasil, proses operasi pembaruan data
			$this->Akun_model->updateMenu($u);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu telah diubah.</div>');
			redirect('menu');
		}
	}

	public function hapus($m)
	{

		$this->load->model('Akun_model');
		$this->load->library('form_validation');

		$this->Akun_model->hapusDataMenu($m);
		$this->session->set_flashdata('flash', 'Dihapus');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">your menu has been deleted.</div>');
		redirect('menu');
	}

	public function submenu()
	{
		$data['title'] = 'Sub Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');

		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub menu add !</div>');
			redirect('menu/submenu');
		}
	}

	public function subhapus($sm)
	{

		$this->load->model('Akun_model');
		$this->load->library('form_validation');

		$this->Akun_model->hapusDataSubmenu($sm);
		$this->session->set_flashdata('flash', 'Dihapus');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">your submenu has been deleted.</div>');
		redirect('menu/submenu');
	}

	public function ubahSubmenu($id)
	{
		$data['title'] = 'Edit Submenu';
		// Mengambil data user dari database berdasarkan email session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Load model Akun_model
		$this->load->model('Akun_model');
		// Mengambil data akun yang akan diubah berdasarkan ID yang diterima sebagai argumen
		$data['akun'] = $this->Akun_model->ubahSubmenu($id);

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		// Load model User_model dan User_role_model dilakukan di awal saja, karena tidak berkaitan langsung dengan edit akun
		$this->load->model('User_model');
		$this->load->model('User_role_model');

		// Ambil data dari tabel user dan user_role
		$data['user_submenu'] = $this->User_model->get_user_submenu();
		$data['user_menu'] = $this->User_role_model->get_user_menu();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/ubahsubmenu', $data);
			$this->load->view('templates/footer');
		} else {
			// Jika validasi sukses, proses update data akun
			$this->Akun_model->updateSubmenu($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your submenu has been edited.</div>');
			redirect('menu/submenu');
		}
	}
}
