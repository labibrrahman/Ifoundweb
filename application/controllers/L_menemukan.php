<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class L_menemukan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('L_menemukan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
       if (empty($this->session->userdata('email'))) {
        redirect(base_url('index.php/auth'));
    }else{
        $l_menemukan = $this->L_menemukan_model->get_all();

        $data = array(
            'l_menemukan_data' => $l_menemukan
        );

        $this->load->view('l_menemukan_list', $data);
    }
}

public function read($id) 
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
    $row = $this->L_menemukan_model->get_by_id($id);
    if ($row) {
        $data = array(
          'id_menemukan' => $row->id_menemukan,
          'id_user' => $row->id_user,
          'id_barang' => $row->id_barang,
          'tgl_menemukan' => $row->tgl_menemukan,
          'lokasi_menemukan' => $row->lokasi_menemukan,
          'p' => $row->p,
      );
        $this->load->view('l_menemukan_read', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('l_menemukan'));
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
        'action' => site_url('l_menemukan/create_action'),
        'id_menemukan' => set_value('id_menemukan'),
        'id_user' => set_value('id_user'),
        'id_barang' => set_value('id_barang'),
        'tgl_menemukan' => set_value('tgl_menemukan'),
        'lokasi_menemukan' => set_value('lokasi_menemukan'),
        'p' => set_value('p'),
    );
    $this->load->view('l_menemukan_form', $data);
}
}

public function create_action() 
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->create();
    } else {
        $data = array(
          'id_user' => $this->input->post('id_user',TRUE),
          'id_barang' => $this->input->post('id_barang',TRUE),
          'tgl_menemukan' => $this->input->post('tgl_menemukan',TRUE),
          'lokasi_menemukan' => $this->input->post('lokasi_menemukan',TRUE),
          'p' => $this->input->post('p',TRUE),
      );

        $this->L_menemukan_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('l_menemukan'));
    }
}
}

public function update($id) 
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
    $row = $this->L_menemukan_model->get_by_id($id);

    if ($row) {
        $data = array(
            'button' => 'Update',
            'action' => site_url('l_menemukan/update_action'),
            'id_menemukan' => set_value('id_menemukan', $row->id_menemukan),
            'id_user' => set_value('id_user', $row->id_user),
            'id_barang' => set_value('id_barang', $row->id_barang),
            'tgl_menemukan' => set_value('tgl_menemukan', $row->tgl_menemukan),
            'lokasi_menemukan' => set_value('lokasi_menemukan', $row->lokasi_menemukan),
            'p' => set_value('p', $row->p),
        );
        $this->load->view('l_menemukan_form', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('l_menemukan'));
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
        $this->update($this->input->post('id_menemukan', TRUE));
    } else {
        $data = array(
          'id_user' => $this->input->post('id_user',TRUE),
          'id_barang' => $this->input->post('id_barang',TRUE),
          'tgl_menemukan' => $this->input->post('tgl_menemukan',TRUE),
          'lokasi_menemukan' => $this->input->post('lokasi_menemukan',TRUE),
          'p' => $this->input->post('p',TRUE),
      );

        $this->L_menemukan_model->update($this->input->post('id_menemukan', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('l_menemukan'));
    }
}
}

public function delete($id) 
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
    $row = $this->L_menemukan_model->get_by_id($id);

    if ($row) {
        $this->L_menemukan_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('l_menemukan'));
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('l_menemukan'));
    }
}
}

public function _rules() 
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('tgl_menemukan', 'tgl menemukan', 'trim|required');
	$this->form_validation->set_rules('lokasi_menemukan', 'lokasi menemukan', 'trim|required');
	$this->form_validation->set_rules('p', 'p', 'trim|required');

	$this->form_validation->set_rules('id_menemukan', 'id_menemukan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}
}
public function excel()
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
    $this->load->helper('exportexcel');
    $namaFile = "l_menemukan.xls";
    $judul = "l_menemukan";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Id User");
    xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
    xlsWriteLabel($tablehead, $kolomhead++, "Tgl Menemukan");
    xlsWriteLabel($tablehead, $kolomhead++, "Lokasi Menemukan");
    xlsWriteLabel($tablehead, $kolomhead++, "P");

    foreach ($this->L_menemukan_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
        xlsWriteLabel($tablebody, $kolombody++, $data->tgl_menemukan);
        xlsWriteLabel($tablebody, $kolombody++, $data->lokasi_menemukan);
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
    header("Content-Disposition: attachment;Filename=l_menemukan.doc");

    $data = array(
        'l_menemukan_data' => $this->L_menemukan_model->get_all(),
        'start' => 0
    );
    
    $this->load->view('l_menemukan_doc',$data);
}
}

}

/* End of file L_menemukan.php */
/* Location: ./application/controllers/L_menemukan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-20 13:20:23 */
/* http://harviacode.com */