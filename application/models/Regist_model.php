<?php  

class Regist_model extends CI_Model{
	private $table;
	private $key;

	function __construct(){
		parent::__construct();
		$this->table 	= 'user';
		$this->key 		= 'id_user';
	}

	function get_all(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	function get_data_byId($id){
		$this->db->where($this->key, $id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	function insert($data){
		return $this->db->insert($this->table, $data);
	}

	function delete($id){
		return $this->db->delete($this->table, array($this->key => $id));
	}
}

?>