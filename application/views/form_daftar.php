<div class="container">
	<?php  
	    $msg = $this->session->flashdata('msg');
	    if(isset($msg)){
	      echo $msg;
	    }
	    
	    echo form_open_multipart('Regist/user');

	?>
		<div class="row">
			
			<div class="col-md-5 col-md-offset-3">
		    	<div style="margin-bottom:7%; text-align: center;">
		    		<h1><strong>Sign Up</strong></h1>
		    	</div>

		    	<div class="form-group">
		          <label for="nama">Nama</label>
		          <input class="form-control" type="text" name="nama"/>
		        </div>

		        <div class="form-group">
		          <label for="fakultas">Fakultas</label>
		          <input class="form-control" type="text" name="fakultas"/>
		        </div>

		        <div class="form-group">
		          <label for="jurusan">Jurusan</label>
		          <input class="form-control" type="text" name="jurusan"/>
		        </div>

		        <div class="form-group">
		          <label for="angkatan">Agkatan</label>
		          <input class="form-control" type="text" name="angkatan"/>
		        </div>

		        <div class="form-group">
		          <label for="nama_organisasi">Nama Organisasi</label>
		          <input class="form-control" type="text" name="nama_organisasi"/>
		        </div>

				<div class="form-group">
		          <label for="jabatan">Jabatan</label>
		          <input class="form-control" type="text" name="jabatan"/>
		        </div>		        

				<div class="form-group">
		          <label for="email">Email</label>
		          <input class="form-control" type="text" name="email"/>
		        </div>		        

		        <div class="form-group">
		          <label for="no_hp_wa">Nomor HP/WA</label>
		          <input class="form-control" type="text" name="no_hp_wa"/>
		        </div>

		        <div class="form-group">
		          <label for="alamat">Alamat</label>
		          <textarea name="alamat"></textarea>
		        </div>
		    </div>
		</div>

		<div class="row">
		    <div class="col-md-1 col-md-offset-3">
		      <input type="submit" value="Sign Up" class="btn btn-success" name="regist">
		    </div>
		   	<div class="col-md-4" style="font-size:22px;">
		   		 Have account ? Click <a href="index.php"> Sign In </a>
		   	</div>
		</div>
	</form>
</div>