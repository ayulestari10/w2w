<?php  

class Posting_model extends CI_Model{
	private $table;
	private $key;

	var $images;
	var $config;

	function __construct(){
		parent::__construct();
		$this->table 	= 'post';
		$this->key 		= 'id_post';
		$images			= realpath(APPPATH.'../images/post');
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

	function get_id($judul){
		$this->db->where('judul', $judul);
		$query = $this->db->get($this->table);
		foreach($query->result() as $row){
			$id 	= $row->id_post;
		}

		return $id;
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

	function do_upload($id){
		$config = array(
			'file_name'		=> $id.'.png',
			'upload_path'	=> $this->images,
			'allowed_types'	=> 'jpg|jpeg|png',
			'max_size'		=> 4000
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
	}

	public function upload($id, $album)
	{
	    $album = strtolower($album);

	    $upload_config = array(
	    	'upload_path' 	=> './images/post/' . $album, 
	    	'file_name'		=>	$id.'.png', 
	    	'allowed_types' => 'jpg|jpeg|gif|png',
	    	'max_size' 		=> 3000 
	    	);

	    $this->load->library('upload', $upload_config);

	    // create an album if not already exist in uploads dir
	    // wouldn't make more sence if this part is done if there are no errors and right before the upload ??
	    if (!is_dir('images/post')){
	        mkdir('./images/post', 0777, true);
	    }
	    $dir_exist = true; // flag for checking the directory exist or not
	    if (!is_dir('images/post/' . $album))
	    {
	        mkdir('./images/post/' . $album, 0777, true);
	        $dir_exist = false; // dir not exist
	    }
	    else{

	    }

	    if (!$this->upload->do_upload('foto1'))
	    {
	        // upload failed
	        //delete dir if not exist before upload
	        if(!$dir_exist)
	          rmdir('./images/post/' . $album);

	        return array('error' => $this->upload->display_errors('<span>', '</span>'));
	    	//exit;
	    } else
	    {
	        // upload success
	        $upload_data = $this->upload->data();
	        return true;
	    }

	    if (!$this->upload->do_upload('foto2'))
	    {
	        // upload failed
	        //delete dir if not exist before upload
	        if(!$dir_exist)
	          rmdir('./images/post/' . $album);

	        return array('error' => $this->upload->display_errors('<span>', '</span>'));
	    } else
	    {
	        // upload success
	        $upload_data = $this->upload->data();
	        return true;
	    }

	    if (!$this->upload->do_upload('foto3'))
	    {
	        // upload failed
	        //delete dir if not exist before upload
	        if(!$dir_exist)
	          rmdir('./images/post/' . $album);

	        return array('error' => $this->upload->display_errors('<span>', '</span>'));
	    } else
	    {
	        // upload success
	        $upload_data = $this->upload->data();
	        return true;
	    }

	    if (!$this->upload->do_upload('foto4'))
	    {
	        // upload failed
	        //delete dir if not exist before upload
	        if(!$dir_exist)
	          rmdir('./images/post/' . $album);

	        return array('error' => $this->upload->display_errors('<span>', '</span>'));
	    } else
	    {
	        // upload success
	        $upload_data = $this->upload->data();
	        return true;
	    }

	    if (!$this->upload->do_upload('foto5'))
	    {
	        // upload failed
	        //delete dir if not exist before upload
	        if(!$dir_exist)
	          rmdir('./images/post/' . $album);

	        return array('error' => $this->upload->display_errors('<span>', '</span>'));
	    } else
	    {
	        // upload success
	        $upload_data = $this->upload->data();
	        return true;
	    }

	    if (!$this->upload->do_upload('foto6'))
	    {
	        // upload failed
	        //delete dir if not exist before upload
	        if(!$dir_exist)
	          rmdir('./images/post/' . $album);

	        return array('error' => $this->upload->display_errors('<span>', '</span>'));
	    } else
	    {
	        // upload success
	        $upload_data = $this->upload->data();
	        return true;
	    }
	}
}

?>