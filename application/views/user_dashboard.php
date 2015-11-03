<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<style>
		h3
		{
			display: inline-block;
		}
		a.top
		{
			margin-top: 15px;
		}
		table{
			margin-top: 20px;
		}
		a.act-edit
		{
			margin-right: 8px;
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
	      	<li class="active"><a href="/">Dashboard <span class="glyphicon glyphicon-globe" aria-hidden="true"></span><span class="sr-only">(current)</span></a></li>
	        <li><a href="/users/edit">Profile <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="/login">Log off <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->

	</nav>	
	<!-- main content -->
	<div class="container">
<?php
if($this->session->userdata('admin'))
{ ?>
		<h3>Manage Users</h3>
		<a class="btn btn-primary pull-right top" href="/users/new">Add user</a>
<?php 
}
else 
{ ?>
		<h3>All Users</h3>
<?php 
}
 ?>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>
						ID
					</th>
					<th>
						Name
					</th>
					<th>
						Email
					</th>
					<th>
						Created At
					</th>
					<th>
						User Level
					</th>
<?php 
if($this->session->userdata('admin'))
{ ?>
					<th>
						Actions
					</th>
<?php 
}
 ?>
				</tr>
			</thead>
			<tbody>
<?php 
if(!empty($users)){
	foreach($users as $user)
	{ ?>
				<tr>
					<td>
						<?= $user['id'] ?>
					</td>
					<td>
						<a href="/users/show/<?= $user['id'] ?>"><?= $user['first_name'] ?> <?= $user['last_name'] ?></a>
					</td>
					<td>
						<?= $user['email'] ?>
					</td>
					<td>
						<?= $user['created_at'] ?>
					</td>
					<td>
						<?= $user['user_level'] ?>
					</td>
<?php 
if($this->session->userdata('admin'))
{ ?>
					<td>
						<a class="act-edit" href="/users/edit/<?= $user['id'] ?>">edit</a> <a href="/edit/delete/<?= $user['id'] ?>">remove</a>
					</td>
<?php 
}
 ?>
				</tr>
<?php 
} }
 ?>
			</tbody>
		</table>
	</div>
</body>
</html>