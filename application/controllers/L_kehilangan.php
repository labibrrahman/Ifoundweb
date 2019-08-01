<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class L_kehilangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('L_kehilangan_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{

            $l_kehilangan = $this->L_kehilangan_model->get_all();
           
            $data = array(
                'l_kehilangan_data' => $l_kehilangan
            );

            $this->load->view('l_kehilangan_list', $data);
             
        }
    }

    public function read($id) 
    {
       if (empty($this->session->userdata('email'))) {
        redirect(base_url('index.php/auth'));
    }else{
        $row = $this->L_kehilangan_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_kehilang' => $row->id_kehilang,
              'id_user' => $row->id_user,
              'id_barang' => $row->id_barang,
              'tgl_kehilangan' => $row->tgl_kehilangan,
              'lokasi_kehilangan' => $row->lokasi_kehilangan,
              'p' => $row->p,
          );
            $this->load->view('l_kehilangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('l_kehilangan'));
        }
    }
}

public function create() 
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
 $users = $this->L_kehilangan_model->get();
            // $data2['ids'] = $this->L_kehilangan_model->get();
            // $data2 = array(
            //     'ids' => $users
            // );
 $barangs = $this->L_kehilangan_model->getbarang();
    $data = array(
        'ids' => $users,
        'idbarang' => $barangs,
        'button' => 'Create',
        'action' => site_url('l_kehilangan/create_action'),
        'id_kehilang' => set_value('id_kehilang'),
        'id_user' => set_value('id_user'),
        'id_barang' => set_value('id_barang'),
        'tgl_kehilangan' => set_value('tgl_kehilangan'),
        'lokasi_kehilangan' => set_value('lokasi_kehilangan'),
        'p' => set_value('p'),
    );
    $this->load->view('l_kehilangan_form', $data);
    // $this->load->view('l_kehilangan_form', $data2);
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
          'tgl_kehilangan' => $this->input->post('tgl_kehilangan',TRUE),
          'lokasi_kehilangan' => $this->input->post('lokasi_kehilangan',TRUE),
          'p' => $this->input->post('p',TRUE),
      );

        $this->L_kehilangan_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('l_kehilangan'));
    }
}
}

public function update($id) 
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
    $row = $this->L_kehilangan_model->get_by_id($id);

    if ($row) {
        $data = array(
            'button' => 'Update',
            'action' => site_url('l_kehilangan/update_action'),
            'id_kehilang' => set_value('id_kehilang', $row->id_kehilang),
            'id_user' => set_value('id_user', $row->id_user),
            'id_barang' => set_value('id_barang', $row->id_barang),
            'tgl_kehilangan' => set_value('tgl_kehilangan', $row->tgl_kehilangan),
            'lokasi_kehilangan' => set_value('lokasi_kehilangan', $row->lokasi_kehilangan),
            'p' => set_value('p', $row->p),
        );
        $this->load->view('l_kehilangan_form', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('l_kehilangan'));
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
        $this->update($this->input->post('id_kehilang', TRUE));
    } else {
        $data = array(
          'id_user' => $this->input->post('id_user',TRUE),
          'id_barang' => $this->input->post('id_barang',TRUE),
          'tgl_kehilangan' => $this->input->post('tgl_kehilangan',TRUE),
          'lokasi_kehilangan' => $this->input->post('lokasi_kehilangan',TRUE),
          'p' => $this->input->post('p',TRUE),
      );

        $this->L_kehilangan_model->update($this->input->post('id_kehilang', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('l_kehilangan'));
    }
}
}

public function delete($id) 
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
    $row = $this->L_kehilangan_model->get_by_id($id);

    if ($row) {
        $this->L_kehilangan_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('l_kehilangan'));
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('l_kehilangan'));
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
	$this->form_validation->set_rules('tgl_kehilangan', 'tgl kehilangan', 'trim|required');
	$this->form_validation->set_rules('lokasi_kehilangan', 'lokasi kehilangan', 'trim|required');
	$this->form_validation->set_rules('p', 'p', 'trim|required');

	$this->form_validation->set_rules('id_kehilang', 'id_kehilang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}
}

public function excel()
{
   if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
    $this->load->helper('exportexcel');
    $namaFile = "l_kehilangan.xls";
    $judul = "l_kehilangan";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Tgl Kehilangan");
    xlsWriteLabel($tablehead, $kolomhead++, "Lokasi Kehilangan");
    xlsWriteLabel($tablehead, $kolomhead++, "P");

    foreach ($this->L_kehilangan_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
        xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kehilangan);
        xlsWriteLabel($tablebody, $kolombody++, $data->lokasi_kehilangan);
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
    header("Content-Disposition: attachment;Filename=l_kehilangan.doc");

    $data = array(
        'l_kehilangan_data' => $this->L_kehilangan_model->get_all(),
        'start' => 0
    );
    
    $this->load->view('l_kehilangan_doc',$data);
}
}
}

/* End of file L_kehilangan.php */
/* Location: ./application/controllers/L_kehilangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-20 13:20:23 */
/* http://harviacode.com */