<?php 

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Buat_laporan_menemukan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Buat_laporan_menemukan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (empty($this->session->userdata('email'))) {
			redirect(base_url('index.php/auth'));
		}else{
		$kotomatis = $this->Buat_laporan_menemukan_model->buat_kode(); // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
		// $this->load->view('template/backend', $data);
		$user = $this->Buat_laporan_menemukan_model->get();
		$data = array(
			'iduser' => $user,
			'kodeunik' => $kotomatis
		);

		$this->load->view('buat_laporan_menemukan', $data);
	}
}

public function upload(){
		$config['upload_path']          = './images/';
		$config['allowed_types']        = 'png|jpg|gif';
		$config['max_size']             = 2048;
		$config['max_width']            = 40000;
		$config['max_height']           = 40000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto_barang'))
		{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('welcome_message', $error);
		}
		else{
			$upload_data = $this->upload->data();
			$name = $upload_data['file_name'];

			$insert = $this->Buat_laporan_menemukan_model->insertGambar($name);
			$insertlaporan = $this->Buat_laporan_menemukan_model->insertlaporan();

			if (($insert) && ($insertlaporan)) {
				$this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Laporan Anada Sudah di Masukan</div>");
				redirect(base_url('index.php/Buat_laporan_menemukan'));
			}else{
				$this->session->set_flashdata("message", "<div class='alert alert-warning' role='alert'>Data sudah dimasukan</div>");
				redirect(base_url('index.php/Buat_laporan_menemukan'));
				
			}
		}
	}

}
