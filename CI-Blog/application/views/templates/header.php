<!DOCTYPE html>
<html>
<head>
	<title>CI-Blog</title>
	<link rel="stylesheet"  href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" media="all">
	<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">CI-Blog</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>posts">Posts</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>categories">Categories</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<?php if(!$this->session->userdata('user_login_status')){?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>users/register">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>users/login">Login</a>
				</li>
			<?php }else{ ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>posts/create">Create Post</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>categories/create">Create Catagory</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>users/logout">Logout</a>
				</li>
			<?php }?>
			</ul>
		</div>
	</nav>
	<div class="container">
		<?php if($this->session->flashdata('user_register'))
		{ 
			echo $this->session->flashdata('user_register');
		}
		?>
		<?php if($this->session->flashdata('catergories_created'))
		{
			echo $this->session->flashdata('catergories_created');
		}
		?>
		<?php if($this->session->flashdata('Post_created'))
		{
			echo $this->session->flashdata('Post_created');
		}
		?>
		<?php if($this->session->flashdata('user_login'))
		{
			echo $this->session->flashdata('user_login');
		}
		?>
		<?php if($this->session->flashdata('user_login_fail'))
		{
			echo $this->session->flashdata('user_login_fail');
		}
		?>

		<?php if($this->session->flashdata('user_logout'))
		{
			echo $this->session->flashdata('user_logout');
		}
		?>


