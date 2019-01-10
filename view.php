<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php	
include_once("connection.php");

$result = mysqli_query($db, "SELECT * FROM contacts WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<link rel="stylesheet" href="style.css">
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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
						<a class="nav-link" href="view.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<input class="form-control col-sm-5" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</ul>
				<form class="form-inline my-2 my-lg-0">		
					<ul class="navbar-nav mr-auto">
						<a class="btn btn-sm btn-outline-info" href="view.php">View</a>
						<a class="btn btn-sm btn-outline-info" href="add.php">Add Contact</a>
					</ul>
				</form>
			</div>
	</nav>
	<h2><center>Contact Lists</center></h2></p>
	<div class="container">
		<table class="table">
			<tr bgcolor='skyblue'>
			<td>Firstname</td>
			<td>Lastname</td>
			<td>Phone_number</td>
			<td>Email</td>
			<td>Address</td>
			<td>Action</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['firstname']."</td>";
			echo "<td>".$res['lastname']."</td>";
			echo "<td>".$res['phone_number']."</td>";
			echo "<td>".$res['email']."</td>";
			echo "<td>".$res['address']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
  <tbody>
</table>
</div>
</body>
</html>
