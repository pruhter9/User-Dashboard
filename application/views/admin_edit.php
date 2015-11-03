<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->library('form_validation');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<style>
		h2
		{
			margin-bottom: 20px;
		}
		div.blue
		{
			background-color: lightskyblue;
			border-radius: 5px;
			padding-top: 10px;
			padding-bottom: 30px;
		}
		p.small
		{
			font-size: 0.8em;
			color: black;
		}
		p
		{
			color: red;
			font-size: 0.8em;
		}
		div.padded
		{
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Dojo Dashboard</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
<?php 
if($this->session->userdata('admin'))
{
 ?>
	      	<li><a href="/dashboard/admin">Dashboard <span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
<?php 
}
else
{
 ?>
 			<li><a href="/dashboard">Dashboard <span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
 <?php 
}
  ?>
	        <li class="active"><a href="#">Profile <span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="sr-only">(current)</span></a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="/login">Log off <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->

	</nav>	
	<!-- main content -->
	<div class="container">
		<h2>Edit user #<?= $id ?></h2>
		<div class="col-md-6 blue">
			<h3>Edit Information</h3>
			<form action="/users/edit/<?= $id ?>" method="post">
				<input type="hidden" name="form_id" value="user_info">
				<div class="form-group">
					<label>Email address</label>
					<p><?= form_error('email'); ?></p>
					<input type="text" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="email" />
				</div>
				<div class="form-group">
					<label>First Name</label>
					<p><?= form_error('first'); ?></p>
					<input type="text" name="first" class="form-control" value="<?= set_value('first') ?>" placeholder="first name" />
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<p><?= form_error('last'); ?></p>
					<input type="text" name="last" class="form-control" value="<?= set_value('last') ?>" placeholder="last name" />
				</div>
				<div class="form-group">
					<label>User Level</label>
					<p><?= form_error('last'); ?></p>
					<select name="user_level" class="form-control">
						<option>normal</option>
						<option>admin</option>
					</select>
				</div>
				<button class="btn btn-success pull-right" type="submit">Save</button>
			</form>
		</div>
		<div class="col-md-5 blue pull-right">
			<h3>Change Password</h3>
			<form action="/users/edit/<?= $id ?>" method="post">
				<input type="hidden" name="form_id" value="user_password">
				<div class="form-group">
					<label>Password</label>
					<p><?= form_error('password'); ?></p>
					<input type="password" name="password" class="form-control" placeholder="password" />
				</div>
				<div class="form-group">
					<label>Password Confirm</label>
					<p><?= form_error('confirm'); ?></p>
					<input type="password" name="confirm" class="form-control" placeholder="password" />
				</div>
				<button class="btn btn-success pull-right" type="submit">Update Password</button>
			</form>
		</div>
	</div>
</body>
</html>