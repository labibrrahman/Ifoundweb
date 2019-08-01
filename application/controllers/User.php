<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class User extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Login_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
  }else{
    // $join = $this->User_model->GetDataJoin("SELECT `user`.`id_user`, `user`.`nik`, `login`.`nama_user`, `user`.`tempat_lahir`, `user`.`tanggal_lahir`, `user`.`jk`, `user`.`alamat`, `user`.`no_telp`, `user`.`email` FROM `user` INNER JOIN `login` ON `user`.`email` = `login`.`email`");
    $user = $this->User_model->get_all();
    // $login = $this->Login_model->get_all();

    $data = array(
      'user_data' => $user,
      // 'datajoinloginnuser' => $join
    );

    $this->load->view('user_list', $data);
  }
}

public function read($id) 
{
 if (empty($this->session->userdata('email'))) {
  redirect(base_url('index.php/auth'));
}else{
  $row = $this->User_model->get_by_id($id);
  if ($row) {
    $data = array(
      'id_user' => $row->id_user,
      'nama_user' => $row->nama_user,
      'tempat_lahir' => $row->tempat_lahir,
      'tanggal_lahir' => $row->tanggal_lahir,
      'jk' => $row->jk,
      'alamat' => $row->alamat,
      'no_telp' => $row->no_telp,
      'email' => $row->email,
      'nik' => $row->nik,
      'p' => $row->p,
    );
    $this->load->view('user_read', $data);
  } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('user'));
  }
}
}

public function create() 
{
 if (empty($this->session->userdata('email'))) {
  redirect(base_url('index.php/auth'));
}else{
  $data = array(
    'button' => 'Create',
    'action' => site_url('user/create_action'),
    'id_user' => set_value('id_user'),
    'nama_user' => set_value('nama_user'),
    'tempat_lahir' => set_value('tempat_lahir'),
    'tanggal_lahir' => set_value('tanggal_lahir'),
    'jk' => set_value('jk'),
    'alamat' => set_value('alamat'),
    'no_telp' => set_value('no_telp'),
    'email' => set_value('email'),
    'password' => set_value('password'),
    'nik' => set_value('nik'),
    'p' => set_value('p'),
  );
  $this->load->view('user_form', $data);
}
}

public function create_action() 
{
 if (empty($this->session->userdata('email'))) {
  redirect(base_url('index.php/auth'));
}else
if ($this->input->post('password') <> $this->input->post('password2')){
}else{
  $this->_rules();

  if ($this->form_validation->run() == FALSE) {
    $this->create();
  } else {
    $datauser = array(
      'nama_user' => $this->input->post('nama_user',TRUE),
      'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
      'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
      'jk' => $this->input->post('jk',TRUE),
      'alamat' => $this->input->post('alamat',TRUE),
      'no_telp' => $this->input->post('no_telp',TRUE),
      'email' => $this->input->post('email',TRUE),
      'nik' => $this->input->post('nik',TRUE),
      'p' => $this->input->post('p',TRUE),
    );
    $datalogin = array(
      'nama_user' => $this->input->post('nama_user',TRUE),
      'email' => $this->input->post('email',TRUE),
      'password' => $this->input->post('password',TRUE),
    );

    if (($datalogin) && ($datauser)){
      $this->User_model->insertlogin($datalogin);
      $this->User_model->insert($datauser);
      $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data sudah dimasukan</div>");
      redirect(site_url('user'));
    }else{
      $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Input Data Gagal</div>");
      redirect(site_url('user'));
    }

    
    // $this->session->set_flashdata('message', 'Create Record Success');
    
  }
}
}

public function update($id) 
{
 if (empty($this->session->userdata('email'))) {
  redirect(base_url('index.php/auth'));
}else{
  $row = $this->User_model->get_by_id($id);

  if ($row) {
    $data = array(
      'button' => 'Update',
      'action' => site_url('user/update_action'),
      'id_user' => set_value('id_user', $row->id_user),
      'nama_user' => set_value('nama_user', $row->nama_user),
      'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
      'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
      'jk' => set_value('jk', $row->jk),
      'alamat' => set_value('alamat', $row->alamat),
      'no_telp' => set_value('no_telp', $row->no_telp),
      'email' => set_value('email', $row->email),
      'nik' => set_value('nik', $row->nik),
      'p' => set_value('p', $row->p),
    );
    $this->load->view('user_form', $data);
  } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('user'));
  }
}
}

public function update_action() 
{
 if (empty($this->session->userdata('email'))) {
  redirect(base_url('index.php/auth'));
}else{
  $this->_rules();

  if ($this->form_validation->run() == FALSE) {
    $this->update($this->input->post('id_user', TRUE));
  } else {
    $data = array(
      'nama_user' => $this->input->post('nama_user',TRUE),
      'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
      'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
      'jk' => $this->input->post('jk',TRUE),
      'alamat' => $this->input->post('alamat',TRUE),
      'no_telp' => $this->input->post('no_telp',TRUE),
      'email' => $this->input->post('email',TRUE),
      'nik' => $this->input->post('nik',TRUE),
      'p' => $this->input->post('p',TRUE),
    );

    $this->User_model->update($this->input->post('id_user', TRUE), $data);
    $this->session->set_flashdata('message', 'Update Record Success');
    redirect(site_url('user'));
  }
}
}

public function delete($id) 
{
 if (empty($this->session->userdata('email'))) {
  redirect(base_url('index.php/auth'));
}else{
  $row = $this->User_model->get_by_id($id);

  if ($row) {
    $this->User_model->delete($id);
$this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data sudah dimasukan</div>");
    redirect(site_url('user'));
  } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('user'));
  }
}
}

public function _rules() 
{
 if (empty($this->session->userdata('email'))) {
  redirect(base_url('index.php/auth'));
}else{
	$this->form_validation->set_rules('nama_user', 'nama user', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('p', 'p', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}
}

public function excel()
{
 if (empty($this->session->userdata('email'))) {
  redirect(base_url('index.php/auth'));
}else{
  $this->load->helper('exportexcel');
  $namaFile = "user.xls";
  $judul = "user";
  $tablehead = 0;
  $tablebody = 1;
  $nourut = 1;
        //penulisan header
  header("Pragma: public");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
  header("Content-Type: application/force-download");
  header("Content-Type: application/octet-stream");
  header("Content-Type: application/download");
  header("Content-Disposition: attachment;filename=" . $namaFile . "");
  header("Content-Transfer-Encoding: binary ");

  xlsBOF();

  $kolomhead = 0;
  xlsWriteLabel($tablehead, $kolomhead++, "No");
  xlsWriteLabel($tablehead, $kolomhead++, "Nama User");
  xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
  xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
  xlsWriteLabel($tablehead, $kolomhead++, "Jk");
  xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
  xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
  xlsWriteLabel($tablehead, $kolomhead++, "Email");
  xlsWriteLabel($tablehead, $kolomhead++, "Nik");
  xlsWriteLabel($tablehead, $kolomhead++, "P");

  foreach ($this->User_model->get_all() as $data) {
    $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
    xlsWriteNumber($tablebody, $kolombody++, $nourut);
    xlsWriteLabel($tablebody, $kolombody++, $data->nama_user);
    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
    xlsWriteLabel($tablebody, $kolombody++, $data->jk);
    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
    xlsWriteLabel($tablebody, $kolombody++, $data->no_telp);
    xlsWriteLabel($tablebody, $kolombody++, $data->email);
    xlsWriteNumber($tablebody, $kolombody++, $data->nik);
    xlsWriteLabel($tablebody, $kolombody++, $data->p);

    $tablebody++;
    $nourut++;
  }

  xlsEOF();
  exit();
}
}

public function word()
{
 if (empty($this->session->userdata('email'))) {
  redirect(base_url('index.php/auth'));
}else{
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=user.doc");

  $data = array(
    'user_data' => $this->User_model->get_all(),
    'start' => 0
  );

  $this->load->view('user_doc',$data);
}
}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-20 13:20:23 */
/* http://harviacode.com */