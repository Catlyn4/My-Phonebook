<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
	<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
	<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
	<style>
		body {
			background:url('img/reg.jpg') no-repeat;
			width:3000px;
			height:1000px;
		}
	</style>
</head>
<body>
	<div class="container text-center">
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$db = mysqli_connect('localhost','root','','phonebook');

	if($user == "" || $pass == "" || $firstname == "" || $lastname == "" || $email == "") {
		echo "<br/>";
	} else {
		mysqli_query($db, "INSERT INTO login(firstname, lastname, email, username, password) VALUES('$firstname', '$lastname', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		header('location: login.php');
	}
} else {
?>
		<div class="col-md-8 order-md-2 text-center text-md-left pr-md-2">
			<form name="form1" method="post" action=""><br/>
				<div class="container">
					<h2>Register</h2>
				</div><br/>
					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="validationServer01">First name</label>
								<input type="text" name="firstname" class="form-control is-valid" id="validationServer01"  required>
						</div>&nbsp;
						<div class="col-md-3 mb-3">
							<label for="validationServer01">Last name</label>
								<input type="text" name="lastname" class="form-control is-valid" id="validationServer01"  required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="validationServer01">Email</label>
								<input type="email" name="email" class="form-control is-valid" id="validationServer01"  required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="validationServer01">Username</label>
								<input type="text" name="username" class="form-control is-valid" id="validationServer01"  required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="validationServer01">Password</label>
								<input type="password" name="password" class="form-control is-valid" id="validationServer01"  required>
						</div>
					</div>
					<button class="btn btn-outline-dark" type="submit" name="submit" value="Submit">Register</button><br/><br/>
						<p>
							Already have an account ? &nbsp; <a class="btn btn-sm btn-outline-warning" href="login.php" role="button">Log in</a>
						</p>
			</form>
		</div>
	</div>
<?php
}
?>
</body>
</html>
