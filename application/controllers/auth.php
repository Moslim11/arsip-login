<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Email belum diisi.'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Password masih kosong.'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// Validasi reCAPTCHA
			$recaptchaResponse = $this->input->post('g-recaptcha-response');

			if (!empty($recaptchaResponse)) {
				$secretKey = '6Le9784pAAAAAMcmae_TYLfadjy37VY6rEmwgM4U';
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $recaptchaResponse);
				$responseData = json_decode($verifyResponse);

				if ($responseData->success) {
					// Jika reCAPTCHA valid, lakukan proses login
					$this->_login();
				} else {
					// Jika reCAPTCHA tidak valid
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">reCAPTCHA validation failed. Please try again.</div>');
					redirect('auth');
				}
			} else {
				// Jika reCAPTCHA tidak diisi
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kolom reCAPTCHA belum diisi.</div>');
				redirect('auth');
			}
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar !</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
