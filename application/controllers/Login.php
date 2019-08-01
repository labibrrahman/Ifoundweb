<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $login = $this->Login_model->get_all();

            $data = array(
                'login_data' => $login
            );

            $this->load->view('login_list', $data);
        }
    }

    public function read($id) 
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $row = $this->Login_model->get_by_id($id);
            if ($row) {
                $data = array(
                  'id' => $row->id,  
                  'email' => $row->email,
                  'password' => $row->password,
                  'hak_akses' => $row->hak_akses,
              );
                $this->load->view('login_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('login'));
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
                'action' => site_url('login/create_action'),
                'id' => site_url('id'),
                'nama_user' => site_url('nama_user'),
                'email' => set_value('email'),
                'password' => set_value('password'),
                'hak_akses' => set_value('hak_akses'),
            );
            $this->load->view('login_form', $data);
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
                    'id' => $this->input->post('id', TRUE),
                    'nama_user' => $this->input->post('nama_user', TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'password' => $this->input->post('password',TRUE),
                    'hak_akses' => $this->input->post('hak_akses',TRUE),
                );

                $this->Login_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('login'));
            }
        }
    }

    public function update($id) 
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $row = $this->Login_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('login/update_action'),
                    'id' => set_value('id', $row->id), 
                    'nama_user' => set_value('nama_user', $row->nama_user),       
                    'email' => set_value('email', $row->email),
                    'password' => set_value('password', $row->password),
                    'hak_akses' => set_value('hak_akses', $row->hak_akses),
                );
                $this->load->view('login_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('login'));
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
                $this->update($this->input->post('id', TRUE));
            } else {
                $data = array(
                    'nama_user' => $this->input->post('nama_user',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'password' => $this->input->post('password',TRUE),
                    'hak_akses' => $this->input->post('hak_akses',TRUE),
                );

                $this->Login_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('login'));
            }
        }
    }
    public function delete($id) 
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $row = $this->Login_model->get_by_id($id);

            if ($row) {
                $this->Login_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('login'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('login'));
            }
        }
    }
    public function _rules() 
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');
            $this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');

            $this->form_validation->set_rules('email', 'email', 'trim');
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        }
    }
    public function excel()
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $this->load->helper('exportexcel');
            $namaFile = "login.xls";
            $judul = "login";
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
            xlsWriteLabel($tablehead, $kolomhead++, "Email");
            xlsWriteLabel($tablehead, $kolomhead++, "Password");
            xlsWriteLabel($tablehead, $kolomhead++, "Hak Akses");

            foreach ($this->Login_model->get_all() as $data) {
                $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, $data->email);
                xlsWriteLabel($tablebody, $kolombody++, $data->password);
                xlsWriteLabel($tablebody, $kolombody++, $data->hak_akses);

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
            header("Content-Disposition: attachment;Filename=login.doc");

            $data = array(
                'login_data' => $this->Login_model->get_all(),
                'start' => 0
            );

            $this->load->view('login_doc',$data);
        }
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-20 13:20:23 */
/* http://harviacode.com */