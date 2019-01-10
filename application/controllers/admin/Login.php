<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		// $this->load->model("admin/mod_user", 'users', TRUE);
		$this->load->model("login_model", 'mod_login', TRUE);
	}

	public function index()
	{
		$tmp['title'] = 'Login';

		$this->load->view('admin/login', $tmp);
	}

	public function auth() {

		//load library form validasi, agar login lebih aman
		$this->load->library('form_validation');

		//digunakan untuk fungsi redirect di bawah	
		// $this->load->helper('url');

		if($this->input->post('input_username')=='' && $this->input->post('ip-pass')==''){
			$this->session->set_userdata('message', "inputan tidak boleh kosong");
			redirect('admin/login', 'refresh');
		} else {

			//rules
			$this->form_validation->set_rules('input_username','username','trim|required|xss_clean');
			$this->form_validation->set_rules('input_pass','password','trim|required|xss_clean');
			//disini terdapat callback : callback_check database
			//digunakan untuk memanggil function check_database() di bawah

			//jika validasi gagal maka akan langsung dikembalikan ke login
			if($this->form_validation->run()==FALSE) {
				$this->session->set_userdata('message', "username / password anda tidk valid");
				redirect('admin/login', 'refresh');
			} else {

				

				//mengecek kedua dengan cara mengecek database
				$username = $this->input->post('input_username');
				$password = $this->input->post('input_pass');

				$result = $this->mod_login->login($username, $password);

				//jika hasilnya ada maka masukan ke session field nama dan username dengan nama session login
				if($result){
					foreach ($result as $row) {
						$sess_array=array(
							'username'=>$row->nama_user,
							'id_user'=>$row->id_user,
							'level'=>$row->level
						);
						$this->session->set_userdata('login', $sess_array);
						$this->session->set_userdata('username', $row->nama_user);
					}
					$this->session->unset_userdata('message');
					redirect('admin/dashboard', 'location');
				} else {
					$this->session->set_userdata('message', "username / password anda salah");
					redirect('admin/login', 'refresh');
				}
			}
		}
	}

	public function logout() {
		$this->load->library('session');
		$this->load->helper('url');
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('username');

		redirect('admin/login', 'refresh');
	}
}
