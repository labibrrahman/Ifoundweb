<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller {
 function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('l_kehilangan_model');
        $this->load->model('l_menemukan_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }
	public function index()
	{
		if (empty($this->session->userdata('email'))) {
			redirect(base_url('index.php/auth'));
		}else{

		$barang = $this->Barang_model->total_rows();
		$l_kehilangan = $this->l_kehilangan_model->total_rows();
		$l_menemukan = $this->l_menemukan_model->total_rows();
		$user = $this->User_model->total_rows();

		          $data = array(
                'barang_data' => $barang,
                'kehilangan' => $l_kehilangan,
                'menemukan' => $l_menemukan,
                'user' => $user
            );
			$this->load->view('dashboard1', $data);
		}
		
	}
}
