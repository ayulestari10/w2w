<?php  

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		// $id = $this->session->userdata('id');

		// if(!isset($id)){
		// 	redirect('Masuk');
		// 	exit;
		// }
		
		$this->load->model('Admin_model');
		$this->load->model('Posting_model');
		$this->load->helper(array('form'));
	}

	function index(){
		$data = array(
			'title'		=> 'Beranda',
			'content'	=> 'beranda_admin'
			//'dt'		=> $this->Posting_model->get_data_byKategori($id)
			// ambil data kategori beranda dan id nya
		);
		$this->load->view('includes/template', $data);
	}

	function coba(){
		$data = array(
			'title'		=> 'Beranda',
			'content'	=> 'posting'
		);
		$this->load->view('includes/template', $data);		
	}

	function coba_upload(){
		date_default_timezone_set('Asia/Jakarta');
		if($this->input->post('upload')){
			$id_admin = $this->Admin_model->get_id($this->session->userdata('username'));


			$data = array(
				'id_admin'		=> $id_admin,
				'judul'			=> $this->input->post('judul'),
				// 'kategori'		=> $this->input->post('kategori'),
				// 'sifat'			=> $this->input->post('sifat'),
				'waktu'			=> date('d-m-Y'),
				'isi'			=> $this->input->post('isi'),
				'foto1'			=> '1.png',
				'foto2'			=> '2.png',
				'foto3'			=> '3.png',
				'foto4'			=> '4.png',
				'foto5'			=> '5.png',
				'foto6'			=> '6.png'
			);

			$this->Posting_model->insert($data);

			$id_post = $this->Posting_model->get_id($this->input->post('judul'));

			$i = 1;

			for($i=1; $i <= 5; $i++){
				$this->Posting_model->upload($i, $id_post);
			 	$i++;
			}
			
			$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;">Data berhasil disimpan!</div>');
			redirect('Admin/List_post');
			exit;
		}
		$data = array(
			'title'		=> 'Beranda',
			'content'	=> 'posting'
		);
		$this->load->view('includes/template', $data);
	}

	function upload(){
		 $config['upload_path']   	= realpath(APPPATH . '../uploads/'); 
         $config['allowed_types'] 	= 'jpg|png|jpeg'; 
         $config['file_name']		= '1.png';	
         $config['max_size']      	= 3000; 

         $this->load->library('upload', $config);
         // script upload file pertama
         $this->upload->do_upload('file1');
         $file1 = $this->upload->data();
         // echo "<pre>";
         // print_r($file1);
         // echo "</pre>";


         
         // script upload file kedua
         $this->upload->do_upload('file2');
         $file2 = $this->upload->data();
         // echo "<pre>";
         // print_r($file2);
         // echo "</pre>";
         
	}

	function edit_beranda(){
		if($this->input->post('edit_beranda')){

			$input = array(
				'judul'		=> $this->input->post('judul'),
				'kategori'	=> 'beranda',
				'image'		=> 'image.png',
				'tanggal'	=> date('m-d-y'),	
				'isi'		=> $this->input->post('isi')
			);

			$this->Posting_model->update($id, $input); // tanya
			$this->session->set_userdata('msg', '<div class="alert alert-success" style="text-align: center;">Data Berhasil Disimpan!</div>');
			redirect('Admin');
			exit;
		}
		$data = array(
			'title'		=> 'Beranda',
			'content'	=> 'beranda_admin',
			'dt'		=> $this->Posting_model->get_data_byKategori($id)
			// ambil data kategori beranda dan id nya
		);
		$this->load->view('includes/template', $data);
	}

	function biodata(){
		$id = $this->session->userdata('id');

		if($this->input->post('kunci')){

			$input = array(
				'nama'		=> $this->input->post('nama'),
				'fakultas'	=> $this->input->post('fakultas'),
				'jurusan'	=> $this->input->post('jurusan'),
				'angkatan'	=> $this->input->post('angkatan'),
				'email'		=> $this->input->post('email'),
				'no_hp_wa'	=> $this->input->post('no_hp_wa')
			);

			$this->Admin_model->update($id, $input);
			$this->session->set_userdata('msg', '<div class="alert alert-success" style="text-align: center;">Data Berhasil Disimpan!</div>');
			redirect('Admin/biodata');
			exit;
		}
		$data = array(
			'title'		=> 'Edit Biodata',
			'content'	=> 'edit_biodata',
			'dt'		=> $this->Admin_model->get_data_byId($id)
		);
		$this->load->view('includes/template', $data);
	}

	function edit_password(){
		$id = $this->session->userdata('id');

		if($this->input->post('edit_pass')){
			$pass1 = $this->input->post('password1');
			$pass2 = $this->input->post('password2');

			if(isset($pass1) && isset($pass2)){
				if($pass1 == $pass2){
					$this->Admin_model->update($id, array('password' => $pass1));	
					$this->session->set_userdata('msg', '<div class="alert alert-success" style="text-align: center;">Password berhasil disimpan!</div>');
					redirect('Admin/biodata');
					exit;
				} else {
					$this->session->set_userdata('msg', '<div class="alert alert-warning" style="text-align: center;">Password tidak sama dengan konfirmasi password!</div>');
					redirect('Admin/edit_password');
					exit;
				}

			} else {
				$this->session->set_userdata('msg', '<div class="alert alert-danger" style="text-align: center;">Password harus diisi!</div>');
				redirect('Admin/edit_password');
				exit;
			}
		}
		$data = array(
			'title'		=> 'Edit Password',
			'content'	=> 'edit_pass'
		);
		$this->load->view('includes/template', $data);
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
			redirect('Admin/List_post');
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
			redirect('Admin/list_post');
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
			redirect('Admin/list_post');
			$this->session->set_flashdata('msg', '<div class="alert alert-success" style="text-align:center;">Data berhasil dihapus!</div>');
		} else {
			redirect('Admin/list_post');
		}
	}

	function list_post(){
		$data = array(
			'title'		=> 'List Post',
			'content'	=> 'list_post',
			'dt'		=> $this->Posting_model->get_data_byId($this->session->userdata('id'))
		);
		$this->load->view('includes/template', $data);
	}

}

?>