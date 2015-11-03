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
	      	<li><a href="/">Home <span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	        <li><a href="/register">Register <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="active"><a href="#">Sign in <span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->

	</nav>	
	<!-- main content -->
	<div class="container">
		<div class="col-md-4 padded blue">
			<h2>Login</h2>
<?php 
if($this->session->flashdata('login_error'))
{ ?>
			<p><?= $this->session->flashdata('login_error') ?></p>
<?php
}
?>
			<form action="/login" method="post">
				<div class="form-group">
					<label>Email</label>
					<p><?= form_error('email'); ?></p>
					<input type="text" name="email" class="form-control" placeholder="email@domain.com" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<p><?= form_error('password'); ?></p>
					<input type="password" name="password" class="form-control" placeholder="password" />
				</div>
				<button class="btn btn-success pull-right" type="submit">Login</button>
			</form>
			<p class="small">Don't have an account? <a href="/register">Register</a></p>
		</div>
	</div>
</body>
</html>
<?php 
$this->session->sess_destroy();
 ?>