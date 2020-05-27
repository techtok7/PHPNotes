<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Notes</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark font-weight-bold">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
				<a class="navbar-brand" href="#"><b>PHP Notes-1</b></a>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<?php
					if (isset($_SESSION["user_id"])) {
					?>
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Welcome, <?php echo $_SESSION["user_name"]; ?></a>
						</li>
						<button class="btn btn-outline-success ml-3 pr-3 pl-3" type="submit"  onclick="location.href='logout.php'">Logout</button>
					<?php
					} else {
					?>
						<button class="btn btn-outline-success ml-3 pr-3 pl-3" type="button" onclick="location.href='login.php'">Loin</button>
						<button class="btn btn-outline-success ml-3 pr-3 pl-3" type="button" onclick="location.href='signup.php'">Signup</button>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</nav>