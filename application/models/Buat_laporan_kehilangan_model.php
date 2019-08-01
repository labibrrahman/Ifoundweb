 <?php 
 class Buat_laporan_kehilangan_model extends CI_Model
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
    'tgl_kehilangan' => $this->input->post('tgl'),
    'lokasi_kehilangan' => $this->input->post('lokasi'),
    'p'=> '1'
  );
   return $this->db->insert('l_kehilangan', $data2);

 }

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


      } ?>