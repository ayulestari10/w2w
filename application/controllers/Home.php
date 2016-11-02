<?php  

class Home extends CI_Controller{
	
	function index(){
		$data = array(
			'title'		=> 'Judul',
			'content'	=> 'beranda'
		);
		$this->load->view('includes/template', $data);
	}
}

?>