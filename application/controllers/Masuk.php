<?php  

class Masuk extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Admin_model');
	}

	function index(){
		$data = array(
			'title'		=> 'Masuk',
			'content'	=> 'form_masuk'
		);
		$this->load->view('includes/template', $data);
	}

	function admin(){
		if($this->input->post('login')){
			$data = array(
				'username'	=> $this->input->post('username'),
				'password'	=> md5($this->input->post('password'))
			);

			$data_admin = $this->Login_model->cek_login_admin($data);
			if($this->Login_model->rows == 1){
				$id 		= $this->Admin_model->get_id($this->input->post('username'));
				$role 		= $this->Admin_model->get_role($this->input->post('username'));
				$nama_bo	= $this->Admin_model->get_nama_bo($this->input->post('username'));
				
				if($role == 'Admin'){
					$this->session->set_userdata('id', $id);
					$this->session->set_userdata('nama_bo', $nama_bo);
					$this->session->set_userdata($data);
					redirect('Admin');
				}
				else if($role == 'superadmin'){
					$this->session->set_userdata('id', $id);
					$this->session->set_userdata($data);
					redirect('SuperAdmin');
				} 

			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="text-align:center;">Gagal Masuk!</div>');
				redirect('Masuk/Admin');
				exit;
			}
		}
		$data = array(
			'title'		=> 'Masuk',
			'content'	=> 'form_masuk'
		);
		$this->load->view('includes/template', $data);
	}
}

?>