
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_login');

		
	}
	public function index()
	{
		$this->load->view('login');
	}
	
	public function masuk(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');	
		$where = array(
			'email'=>$email,
			'password'=>$password,
			'hak_akses'=>"admin"
		);	
		$cek = $this->Model_login->GetDataLogin('login', $where);
		if(count($cek) > 0 ){
			$data_session = array(
				'email' => $email
				// 'status' => "login"
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('index.php/dashboard1'));

		} else {
			
			// echo'
			// <script>
			// alert("Input data Gagal");
			// </script>';
			// redirect(base_url('index.php/auth'));
			
			$this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Email atau Password anda salah</div>");
			redirect(base_url('index.php/auth'));

		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/auth'));
	}
}
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Auth extends CI_Controller {

	// public function index()
	// {
		// $this->load->view('login');
	// }
        
	// public function login()
	// {
                // redirect('dashboard1');
	// }
        
        // public function logout()
	// {
                // redirect('auth');
	// }
// }
