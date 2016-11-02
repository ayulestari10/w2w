<?php  

class Regist extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Regist_model');
	}

	function index(){
		$data = array(
			'title'		=> 'Registrasi',
			'content'	=> 'form_daftar'
		);
		$this->load->view('includes/template', $data);
	}

	function user(){
		if($this->input->post('regist')){
			$input = array(
				'nama'				=> $this->input->post('nama'),
				'fakultas'			=> $this->input->post('fakultas'),
				'jurusan'			=> $this->input->post('jurusan'),
				'angkatan'			=> $this->input->post('angkatan'),
				'nama_organisasi' 	=> $this->input->post('nama_organisasi'),
				'jabatan'			=> $this->input->post('jabatan'),
				'email'				=> $this->input->post('email'),
				'no_hp_wa'			=> $this->input->post('no_hp_wa'),
				'alamat'			=> $this->input->post('alamat')
			);	

			$this->Regist_model->insert($input);
			$this->session->set_userdata('msg', '<div class="alert alert-success" style="text-align: center;">Registrasi Berhasil!</div>');
			redirect('Home');
			exit;
		} else {
			redirect('Home');
		}
	}
}

?>