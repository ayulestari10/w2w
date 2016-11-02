<div class="container">
	<?php  
	    $msg = $this->session->flashdata('msg');
	    if(isset($msg)){
	      echo $msg;
	    }
	    
	    echo form_open_multipart('SuperAdmin/kunci_admin');
	?>
	<div class="row">
	       	<div class="col-md-5 col-md-offset-3" >
	       		<div style="margin-bottom: 7%; text-align: center;">
					<h1><strong>Sign Up Admin</strong></h1>
				</div>
	       		<div class="form-group">
		          <label for="username">Username</label>
		          <input class="form-control" type="text" name="username"/>
		        </div>

		        <div class="form-group">
		          <label for="password">Password</label>
		          <input class="form-control" type="password" name="password"/>
		        </div>
	       	</div>
		</div>

		<div class="row">
	        <div class="col-md-1 col-md-offset-3">
	          <input type="submit" value="Sign In" name="kunci" class="btn btn-success">
	        </div>
	    </div>
	</div>
	
	</form>
</div>