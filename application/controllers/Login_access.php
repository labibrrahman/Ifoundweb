<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_login');

		
	}
	public function index()
	{
		$this->load->view('template/login');
	}
	
	public function masuk(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');	
		$where = array(
			'username'=>$email,
			'password'=>md5($password)
		);	
		$cek = $this->Model_login->GetDataLogin('login', $where);
		if(count($cek) > 0 ){
			$data_session = array(
				'nama' => $email,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('index.php?page=dashboard'));

		} else {
			echo'
			<script>
			alert("Input data Gagal");
			window.location=("");
			</script>';

			// $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Username atau Password anda salah</div>");
			// redirect(base_url('index.php/login'));

		}
	}
	function logout(){
		$this->session->session_destroy();
		redirect(base_url('login'));
	}
}
 