
<?php echo validation_errors();?> 
<?php echo form_open('users/register');?>
<form>
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<h1 class="text-center"> <?= $title?> </h1>
			  <div class="form-group">
			    <label name = "name">Name</label>
			    <input type="text" class="form-control" placeholder="Name" name="name">
			  </div>
			   <div class="form-group">
			    <label>Pincode</label>
			    <input type="text" class="form-control" placeholder="Pincode" name="pincode">
			  </div>
			   <div class="form-group">
			    <label name = "name">Email</label>
			    <input type="text" class="form-control" placeholder="Email" name="email">
			  </div>
			   <div class="form-group">
			    <label name = "name">Username</label>
			    <input type="text" class="form-control" placeholder="Username" name="username">
			  </div>
			   <div class="form-group">
			    <label name = "name">Password</label>
			    <input type="password" class="form-control" placeholder="Password" name="password">
			  </div>
			   <div class="form-group">
			    <label name = "name">Confirm Password</label>
			    <input type="password" class="form-control" placeholder="Retype your password" name="confirm_password">
			  </div>
			  <div class="form-group">
			  	<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
			  </div>
			</div>
		</div>
</form>
<?php echo form_close();?>
