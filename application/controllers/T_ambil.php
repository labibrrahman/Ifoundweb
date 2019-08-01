<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_ambil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_ambil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
         if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
        $t_ambil = $this->T_ambil_model->get_all();

        $data = array(
            't_ambil_data' => $t_ambil
        );

        $this->load->view('t_ambil_list', $data);
    }
}

    public function read($id) 
    {
         if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
        $row = $this->T_ambil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ambil' => $row->id_ambil,
		'id_laporan' => $row->id_laporan,
		'tgl_ambil' => $row->tgl_ambil,
		'p' => $row->p,
	    );
            $this->load->view('t_ambil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ambil'));
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
            'action' => site_url('t_ambil/create_action'),
	    'id_ambil' => set_value('id_ambil'),
	    'id_laporan' => set_value('id_laporan'),
	    'tgl_ambil' => set_value('tgl_ambil'),
	    'p' => set_value('p'),
	);
        $this->load->view('t_ambil_form', $data);
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
		'id_laporan' => $this->input->post('id_laporan',TRUE),
		'tgl_ambil' => $this->input->post('tgl_ambil',TRUE),
		'p' => $this->input->post('p',TRUE),
	    );

            $this->T_ambil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_ambil'));
        }
    }
    }
    
    public function update($id) 
    {
         if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
        $row = $this->T_ambil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_ambil/update_action'),
		'id_ambil' => set_value('id_ambil', $row->id_ambil),
		'id_laporan' => set_value('id_laporan', $row->id_laporan),
		'tgl_ambil' => set_value('tgl_ambil', $row->tgl_ambil),
		'p' => set_value('p', $row->p),
	    );
            $this->load->view('t_ambil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ambil'));
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
            $this->update($this->input->post('id_ambil', TRUE));
        } else {
            $data = array(
		'id_laporan' => $this->input->post('id_laporan',TRUE),
		'tgl_ambil' => $this->input->post('tgl_ambil',TRUE),
		'p' => $this->input->post('p',TRUE),
	    );

            $this->T_ambil_model->update($this->input->post('id_ambil', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_ambil'));
        }
    }
}
    
    public function delete($id) 
    {
         if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
        $row = $this->T_ambil_model->get_by_id($id);

        if ($row) {
            $this->T_ambil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_ambil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_ambil'));
        }
    }
    }

    public function _rules() 
    {
         if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
	$this->form_validation->set_rules('id_laporan', 'id laporan', 'trim|required');
	$this->form_validation->set_rules('tgl_ambil', 'tgl ambil', 'trim|required');
	$this->form_validation->set_rules('p', 'p', 'trim|required');

	$this->form_validation->set_rules('id_ambil', 'id_ambil', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

    public function excel()
    {
         if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
        $this->load->helper('exportexcel');
        $namaFile = "t_ambil.xls";
        $judul = "t_ambil";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Laporan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Ambil");
	xlsWriteLabel($tablehead, $kolomhead++, "P");

	foreach ($this->T_ambil_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_laporan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_ambil);
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
        header("Content-Disposition: attachment;Filename=t_ambil.doc");

        $data = array(
            't_ambil_data' => $this->T_ambil_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_ambil_doc',$data);
    }
}

}

/* End of file T_ambil.php */
/* Location: ./application/controllers/T_ambil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-20 13:20:23 */
/* http://harviacode.com */