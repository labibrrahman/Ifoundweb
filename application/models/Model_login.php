 <?php 
 class Model_login extends CI_Model
 {
	public function GetDataLogin($table, $where){
		return $this->db->where($where)->get($table)->result();
	}
 } ?>