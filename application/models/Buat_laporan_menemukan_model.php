 <?php 
 class Buat_laporan_menemukan_model extends CI_Model
 {

  public function GetDataLogin($table, $where){
    return $this->db->where($where)->get($table)->result();
  }

  function get(){
    $query = $this->db->query('SELECT * FROM user');
    return $query->result();
  }

  public function insertGambar($judul){
    $data = array(
      'id_barang' => $this->input->post('id_barang'),
      'nama_barang' => $this->input->post('nama_barang'),
      'deskripsi_barang' => $this->input->post('des_barang'),
      'jenis_barang' => $this->input->post('jenis_barang'),
      'foto' => $judul,
      'p'=> '1'
    );
    return $this->db->insert('barang', $data);
  }

  public function insertLaporan(){

   $data2 = array(
    'id_user' => $this->input->post('id_user'),
    'id_barang' => $this->input->post('id_barang'),
    'tgl_menemukan' => $this->input->post('tgl'),
    'lokasi_menemukan' => $this->input->post('lokasi'),
    'p'=> '1'
  );
   return $this->db->insert('l_menemukan', $data2);

 }


  // public function InputData($table, $data){
  // public function InputData($judul){
  //   $data = array(
  //   'id_barang' => $this->input->post('id_barang'),
  //   'nama_barang' => $this->input->post('nama_barang'),
  //   'deskripsi_barang' => $this->input->post('des_barang'),
  //   'jenis_barang' => $this->input->post('jenis_barang'),
  //   'foto' => $judul['file']['file_name'],
  //   'p'=> '1'
  //       );

  //   $data2 = array(
  //   'id_user' => $this->input->post('id_user'),
  //   'id_barang' => $this->input->post('id_barang'),
  //   'tgl' => $this->input->post('tgl'),
  //   'lokasi' => $this->input->post('lokasi'),
  //   'p'=> '1'
  //           );

  //       return $this->db->insert('barang', $data);
  //       return $this->db->insert('l_menemukan', $data2);
  //   }
  //   return $this->db->insert($table, $data);
  // }

public function buat_kode(){
  $this->db->select('RIGHT(barang.id_barang,5) as kode', FALSE);
  $this->db->order_by('id_barang','DESC');    
  $this->db->limit(1);     
          $query = $this->db->get('barang');      //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
         }
         else {      
           //jika kode belum ada      
           $kode = 1;    
         }
          $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
          $kodejadi = $kodemax;    // hasilnya ODJ-9921-0001 dst.
          return $kodejadi;  
        }

      //   public function upload(){
      //     $config['upload_path'] = './images/';
      //     $config['allowed_types'] = 'jpg|png|jpeg';
      //     $config['max_size'] = '2048';
      //     $config['remove_space'] = TRUE;

      //   $this->load->library('upload', $config); // Load konfigurasi uploadnya
      //   if($this->upload->do_upload('foto_barang')){ // Lakukan upload dan Cek jika proses upload berhasil
      //       // Jika berhasil :
      //     $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      //     return $return;
      //   }else{
      //       // Jika gagal :
      //     $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      //     return $return;
      //   }
      // }

    // Fungsi untuk menyimpan data ke database
      // public function save($upload){
      //   $data = array(

      //     'id_barang' => $this->input->post('id_barang'),
      //     'nama_barang' => $this->input->post('nama_barang'),
      //     'deskripsi_barang' => $this->input->post('des_barang'),
      //     'jenis_barang' => $this->input->post('jenis_barang'),
      //     'foto' => $upload['file']['file_name'],
      //     'p'=> '1'
      //   );

      //   $data2 = array(
      //     'id_user' => $this->input->post('id_user'),
      //     'id_barang' => $this->input->post('id_barang'),
      //     'tgl' => $this->input->post('tgl'),
      //     'lokasi' => $this->input->post('lokasi'),
      //     'p'=> '1'
      //   );
        
      //   $this->db->insert('barang', $data);
      //   $this->db->insert('l_menemukan', $data2);

      // }


    }
    ?>