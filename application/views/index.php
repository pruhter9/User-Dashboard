<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->session->sess_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<style>
		div.welcome 
		{
			background-color: lightskyblue;
			padding: 35px;
			border-radius: 5px;
		}
		div.padded
		{
			padding: 15px 30px;
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
	        <li class="active"><a href="#">Home <span class="glyphicon glyphicon-home" aria-hidden="true"></span><span class="sr-only">(current)</span></a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="/login">Sign in <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->

	</nav>	
	<div class="container">
		<div class="welcome">
			<h2>Welcome to the Dashboard</h2>
			<p>This app was built with CodeIgniter and Bootstrap within the MVC Framework.</p>
			<a href="/register" class="btn btn-primary">Start</a>
		</div>
		<div class="col-md-4 padded">
			<h3>Manage Users <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></h3>
			<p>Using this application, you will learn how to add, remove, and edit users for the application.</p>
		</div>
		<div class="col-md-4 padded">
			<h3>Leave Messages <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></h3>
			<p>Users will be able to leave a message to another user using this application.</p>
		</div>
		<div class="col-md-4 padded">
			<h3>Edit User Information <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></h3>
			<p>Admins will be able to edit another user's information (email address, first name, last name, etc.).</p>
		</div>
	</div>
</body>
</html>