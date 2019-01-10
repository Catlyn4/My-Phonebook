<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Adding Contact</title>
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
	<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
	<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
	<style>
		body {
			background:url('img/3.jpg') no-repeat;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-success bg-dark">
		<img src="img/per.jpg" width="50" height="50" alt="img/per.jpg"/>&nbsp;&nbsp;&nbsp;
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								MyProfile
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="logout.php">logout</a>
							</div>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<ul class="navbar-nav mr-auto">
						<a class="btn btn-sm btn-outline-info" href="add.php">add contact</a>
						<a class="btn btn-sm btn-outline-info" href="view.php">View</a>
					</ul>
				</form>
			</div>
	</nav>
<?php

include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone_number = $_POST['phone_number'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$loginId = $_SESSION['id'];
	
		
	$result = mysqli_query($db, "INSERT INTO contacts(firstname, lastname, phone_number, email, address, login_id) VALUES('$firstname', '$lastname', '$phone_number', '$email', '$address', '$loginId')");
		header('location: view.php');
	} 
?>
</br>
<div class="container">
	<form action="add.php" method="post" name="form1">
		<h3>Contacts</h3>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">Firstname</label>
				<div class="col-sm-5">
					<input type="text" name="firstname" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">Lastname</label>
				<div class="col-sm-5">
					<input type="text" name="lastname" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">Phone_number</label>
				<div class="col-sm-5">
					<input type="number" name="phone_number" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-5">
					<input type="email" name="email" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">Address</label>
				<div class="col-sm-5">
					<input type="text" name="address" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
				<div class="col-sm-2">
					<button class="btn btn-outline-danger" type="submit" name="Submit" value="Add">Add</button>
				</div>
		</div>
	</form>
</div>
</body>
</html>
