<?php  

class SuperAdmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$id = $this->session->userdata('id');
		if(!isset($id)){
			redirect('Masuk/admin');
			exit;
		}

		$this->load->model('Admin_model');
		$this->load->model('Regist_model');
		$this->load->model('Posting_model');
	}

	function index(){
		$data = array(
			'title'		=> 'Statistik',
			'content'	=> 'statistik'
		);
		$this->load->view('includes/template', $data);
	}

	function beranda(){
		$data = array(
			'title'		=> 'Beranda',
			'content'	=> 'beranda'
		);
		$this->load->view('includes/template', $data);
	}

	function imk_admin(){
		$data = array(
			'title'		=> 'Tambah admin ',
			'content'	=> 'tambah_admin'
		);
		$this->load->view('includes/template', $data);
	}

	function kunci_admin(){
		if($this->input->post('kunci')){
			$input = array(
				'username'	=> $this->input->post('username'),
				'password'	=> md5($this->input->post('password')),
				'role'		=> 'Admin'
			);

			$this->Admin_model->insert($input);
			$this->session->set_userdata('msg', '<div class="alert alert-success" style="text-align: center;">Data Berhasil Disimpan!</div>');
			redirect('SuperAdmin/imk_admin');
			exit;
		} else {
			redirect('SuperAdmin/beranda');
		}
	}

	function posting(){
		$id = $this->session->userdata('id');

		if($this->input->post('edit')){
			$data = array(
				'judul'		=> $this->input->post('judul'),
				'sifat'		=> $this->input->post('sifat'),
				'image'		=> 'image.png',
				'tanggal'	=> date('m-d-y'),	
				'isi'		=> $this->input->post('isi')	
			);
			$this->Posting_model->insert($data);
			$this->Posting_model->do_uplaod($id);
			
			$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;">Data berhasil disimpan!</div>');
			redirect('SuperAdmin/List_post');
			exit;
		}

		$data = array(
			'title'		=> 'Post',
			'content'	=> 'posting'
		);
		$this->load->view('includes/template', $data);
	}

	function edit_post(){
		$id = $this->segment->uri(3);

		if($this->input->post('edit')){
			$data = array(
				'judul'		=> $this->input->post('judul'),
				'sifat'		=> $this->input->post('sifat'),
				'image'		=> 'image.png',
				'tanggal'	=> date('m-d-y'),	
				'isi'		=> $this->input->post('isi')	
			);
			$this->Posting_model->update($id, $data);
			$this->Posting_model->do_uplaod($id);
			
			$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;">Data berhasil diedit!</div>');
			redirect('SuperAdmin/list_post');
			exit;
		}

		$data = array(
			'title'		=> 'Edit Posting',
			'content'	=> 'edit_post'
		);
		$this->load->view('includes/template', $data);
	}

	function hapus(){
		$id = $this->segment->uri(3);
		if(isset($id)){
			$this->Posting_model->delete($id);
			redirect('SuperAdmin/list_post');
			$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;">Data berhasil dihapus!</div>');
		} else {
			redirect('SuperAdmin/list_post');
		}
	}

	function list_post(){
		$data = array(
			'title'		=> 'List Post',
			'content'	=> 'list_post',
			'dt'		=> $this->Posting_model->get_all()
		);
		$this->load->view('includes/template', $data);
	}

	function list_user(){
		$data = array(
			'title'		=> 'List Post',
			'content'	=> 'list_post',
			'dt'		=> $this->Regist_model->get_all()
		);
		$this->load->view('includes/template', $data);
	}

	function list_admin(){
		$data = array(
			'title'		=> 'List Post',
			'content'	=> 'list_post',
			'dt'		=> $this->Admin_model->get_all()
		);
		$this->load->view('includes/template', $data);
	}
}

?>	