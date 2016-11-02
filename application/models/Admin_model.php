<?php  

class Admin_model extends CI_Model{
	private $table;
	private $key;

	function __construct(){
		parent::__construct();
		$this->table 	= 'admin';
		$this->key 		= 'id_admin';
	}

	function get_all(){
		$query = $this->db->get($this->table);
		return $query->result;
	}

	function get_dataById($id){
		$this->db->where($this->key, $id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	function get_id($username){
		$this->db->where('username', $username);
		$query = $this->db->get($this->table);
		foreach($query->result() as $row){
			$id 	= $row->id_admin;
		}

		return $id;
	}

	function get_role($username){
		$this->db->where('username', $username);
		$query = $this->db->get($this->table);
		foreach($query->result() as $row){
			$role 	= $row->role;
		}

		return $role;
	}

	function get_nama_bo($username){
		$this->db->where('username', $username);
		$query = $this->db->get($this->table);
		foreach($query->result() as $row){
			$nama_organisasi = $row->nama_organisasi;
		}

		return $nama_organisasi;
	}

	function get_data_byConditional($condition){
		$this->db->where($condition);
		$query = $this->db->get($this->table);
		return $query;
	}

	function insert($data){
		return $this->db->insert($this->table, $data);
	}

	function update($id, $data){
		$this->db->where($this->key, $id);
		return $this->db->update($this->table, $data);
	}

	function delete($id){
		return $this->db->delete($this->table, array($this->key => $id));
	}
}

?>