<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $barang = $this->Barang_model->get_all();

            $data = array(
                'barang_data' => $barang,
            );

            $this->load->view('barang_list', $data);
        }
    }

    public function hapusFile($id){
        $data = $this->Barang_model->getDataByID($id)->row();
        $nama = './images/'.$data->foto;

        if(is_readable($nama) && unlink($nama)){
            $delete = $this->Barang_model->hapusFileBarang($id);
            $deleteLaporanMenemukan = $this->Barang_model->hapusFileLaporanMenemukan($id);
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Record Sudah DI Hapus</div>");
            redirect(base_url('index.php/Barang'));
        }else{
            $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Hapus File gagal</div>");
            redirect(base_url('index.php/barang'));
            // echo "Gagal";
        }
    }

    public function read($id) 
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $row = $this->Barang_model->get_by_id($id);
            if ($row) {
                $data = array(
                  'id_barang' => $row->id_barang,
                  'nama_barang' => $row->nama_barang,
                  'deskripsi_barang' => $row->deskripsi_barang,
                  'jenis_barang' => $row->jenis_barang,
                  'foto' => $row->foto,
                  'p' => $row->p,
              );
                $this->load->view('barang_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('barang'));
            }
        }
    }

    // public function create() 
    // {
    //     if (empty($this->session->userdata('email'))) {
    //         redirect(base_url('index.php/auth'));
    //     }else{
    //         $data = array(
    //             'button' => 'Create',
    //             'action' => site_url('barang/create_action'),
    //             'id_barang' => set_value('id_barang'),
    //             'nama_barang' => set_value('nama_barang'),
    //             'deskripsi_barang' => set_value('deskripsi_barang'),
    //             'jenis_barang' => set_value('jenis_barang'),
    //             'foto' => set_value('foto'),
    //             'p' => set_value('p'),
    //         );
    //         $this->load->view('barang_form', $data);
    //     }
    // }
    
    // public function create_action() 
    // {
    //     if (empty($this->session->userdata('email'))) {
    //         redirect(base_url('index.php/auth'));
    //     }else{
    //         $this->_rules();

    //         if ($this->form_validation->run() == FALSE) {
    //             $this->create();
    //         } else {
    //             $data = array(
    //               'nama_barang' => $this->input->post('nama_barang',TRUE),
    //               'deskripsi_barang' => $this->input->post('deskripsi_barang',TRUE),
    //               'jenis_barang' => $this->input->post('jenis_barang',TRUE),
    //               'foto' => $this->input->post('foto',TRUE),
    //               'p' => $this->input->post('p',TRUE),
    //           );
    //             if ($data) {
    //                 $this->Barang_model->insert($data);
    //                 $this->session->set_flashdata("pesan", "<div class='alert alert-success' role='alert'>Data sudah dimasukan</div>");
    //                 redirect(site_url('barang'));
    //             } else {
    //                 $this->session->set_flashdata("pesan", "<div class='alert alert-danger' role='alert'>Input Data Gagal</div>");
    //                 redirect(base_url('index.php/barang'));
    //             }
                
    //         }
    //     }
    // }
    
    public function update($id) 
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $row = $this->Barang_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('barang/update_action'),
                    'id_barang' => set_value('id_barang', $row->id_barang),
                    'nama_barang' => set_value('nama_barang', $row->nama_barang),
                    'deskripsi_barang' => set_value('deskripsi_barang', $row->deskripsi_barang),
                    'jenis_barang' => set_value('jenis_barang', $row->jenis_barang),
                    'foto' => set_value('foto', $row->foto),
                    'p' => set_value('p', $row->p),
                );
                $this->load->view('barang_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('barang'));
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
                $this->update($this->input->post('id_barang', TRUE));
            } else {
                $data = array(
                  'nama_barang' => $this->input->post('nama_barang',TRUE),
                  'deskripsi_barang' => $this->input->post('deskripsi_barang',TRUE),
                  'jenis_barang' => $this->input->post('jenis_barang',TRUE),
                  'foto' => $this->input->post('foto',TRUE),
                  'p' => $this->input->post('p',TRUE),
              );
                if ($data){
                    $this->Barang_model->update($this->input->post('id_barang', TRUE), $data);    
                    $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data sudah dimasukan</div>");
                    redirect(site_url('barang'));
                } else {
                     $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Update Data Gagal</div>");
                    redirect(site_url('barang'));
                }
                // $this->session->set_flashdata('message', 'Update Record Success');
                
            }
        }
    }
    
    public function delete($id) 
    {
        if (empty($this->session->userdata('email'))) {
            redirect(base_url('index.php/auth'));
        }else{
            $row = $this->Barang_model->get_by_id($id);

            if ($row) {
                $this->Barang_model->delete($id);
                $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Record Telah DI Hapus</div>");
                redirect(site_url('barang'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('barang'));
            }
        }
    }

    public function _rules() 
    {
     if (empty($this->session->userdata('email'))) {
        redirect(base_url('index.php/auth'));
    }else{    
     $this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
     $this->form_validation->set_rules('deskripsi_barang', 'deskripsi barang', 'trim|required');
     $this->form_validation->set_rules('jenis_barang', 'jenis barang', 'trim|required');
     $this->form_validation->set_rules('foto', 'foto', 'trim|required');
     $this->form_validation->set_rules('p', 'p', 'trim|required');

     $this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }
}
public function excel()
{
 if (empty($this->session->userdata('email'))) {
    redirect(base_url('index.php/auth'));
}else{
    $this->load->helper('exportexcel');
    $namaFile = "barang.xls";
    $judul = "barang";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
    xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi Barang");
    xlsWriteLabel($tablehead, $kolomhead++, "Jenis Barang");
    xlsWriteLabel($tablehead, $kolomhead++, "Foto");
    xlsWriteLabel($tablehead, $kolomhead++, "P");

    foreach ($this->Barang_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
        xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi_barang);
        xlsWriteLabel($tablebody, $kolombody++, $data->jenis_barang);
        xlsWriteLabel($tablebody, $kolombody++, $data->foto);
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
    header("Content-Disposition: attachment;Filename=barang.doc");

    $data = array(
        'barang_data' => $this->Barang_model->get_all(),
        'start' => 0
    );
    
    $this->load->view('barang_doc',$data);
}
}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-20 13:20:23 */
/* http://harviacode.com */