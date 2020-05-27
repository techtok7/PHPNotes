<?php
session_start();
$con = mysqli_connect("localhost", "techtok7", "", "demo") or die("Can't Connect");

// Signup
if (isset($_POST["signup"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$qry = "INSERT INTO `user`(`user_id`, `user_name`, `user_password`) VALUES (NULL, '$username', '$password')";
	if (mysqli_query($con, $qry)) {
		$_SESSION["msg"] = "Signup Successfully";
		header('location:index.php');
	} else {
		$_SESSION["msg"] = "Error";
		header('location:index.php');
	}
}

// Login 
if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$qry = "SELECT * FROM `user` WHERE `user_name` = '$username' AND `user_password` = '$password'";
	$result = mysqli_query($con, $qry);
	if ($row = mysqli_fetch_assoc($result)) {
		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["user_name"] = $row["user_name"];
		$_SESSION["msg"] = "Login Done";
		header("location:index.php");
	} else {
		$_SESSION["msg"] = "Invalid Username or Password";
		header("location:index.php");
	}
}

if (isset($_GET["logout"])) {
	session_unset();
	session_destroy();
	header("location:index.php");
}

// Add
if (isset($_POST["add"])) {
	print_r($_POST);
	$user_id = $_SESSION["user_id"];
	$title = $_POST["title"];
	$dis = $_POST["dis"];
	$qry = "INSERT INTO `note`(`note_id`, `note_user`, `note_title`, `note_dis`) VALUES (NULL, '$user_id', '$title', '$dis')";
	if (mysqli_query($con, $qry)) {
		$_SESSION["msg"] = "Note Added";
		header('location:index.php');
	} else {
		$_SESSION["msg"] = "Error";
		header('location:index.php');
	}
}

// Update
if (isset($_POST["update"])) {
	$user_id = $_SESSION["user_id"];
	$note_id = $_POST["note_id"];
	$title = $_POST["title"];
	$dis = $_POST["dis"];
	$qry = "UPDATE `note` SET `note_title` = '$title', `note_dis` = '$dis' WHERE `note_id` = '$note_id' AND `note_user` = '$user_id'";
	if (mysqli_query($con, $qry)) {
		$_SESSION["msg"] = "Note Updated";
		header('location:index.php');
	} else {
		$_SESSION["msg"] = "Error";
		header('location:index.php');
	}
}
// Delete
if (isset($_GET["delete"])) {
	$note_id = $_GET["delete"];
	$user_id = $_SESSION["user_id"];
	$qry = "DELETE FROM `note` WHERE `note_id` = '$note_id' AND `note_user` = '$user_id'";
	if (mysqli_query($con, $qry)) {
		$_SESSION["msg"] = "Note Deleted";
		header('location:index.php');
	} else {
		$_SESSION["msg"] = "Error";
		header('location:index.php');
	}
}


// ==================================
if (isset($_GET["edit"])) {
	$id = $_GET["edit"];
	$user_id = $_SESSION["user_id"];
	$qry = "SELECT * FROM `note` WHERE `note_id` = '$id' AND `note_user` = '$user_id'";
	$result = mysqli_query($con, $qry);
	if ($note = mysqli_fetch_assoc($result)) {
	} else {
		header("location:index.php");
	}
}


?>
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
				<a class="navbar-brand" href="#"><b>PHP Notes-2</b></a>
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<?php
					if (isset($_SESSION["user_id"])) {
					?>
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Welcome, <?php echo $_SESSION["user_name"]; ?></a>
						</li>
						<button class="btn btn-outline-success ml-3 pr-3 pl-3" type="submit" onclick="location.href='index.php?logout'">Logout</button>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</nav>
	<main class="">
		<div class="container mb-5">
			<?php
			// Message
			if (isset($_SESSION["msg"]) && count($_POST) == 0) {
			?>
				<div class="row mt-3">
					<div class="col-12">
						<div class="alert alert-info" role="alert">
							<?php echo $_SESSION["msg"]; ?>
						</div>
					</div>
				</div>
			<?php
				unset($_SESSION["msg"]);
			}
			?>
			<div class="row">
				<?php
				// User is Logged in
				if (isset($_SESSION["user_id"])) {
					if (isset($_GET["edit"]) && isset($note)) {
				?>
						<div class="col-12 mt-5">
							<form method="post">
								<input type="hidden" name="note_id" value="<?php echo $note["note_id"]; ?>">
								<div class="card">
									<div class="card-header">
										<div class="form-group mb-1">
											<label><b>Note Title :</b></label>
											<input type="text" name="title" class="form-control" value="<?php echo $note["note_title"]; ?>">
										</div>
									</div>
									<div class="card-body">
										<div class="form-group mb-0">
											<label><b>Note Discription :</b></label>
											<textarea name="dis" class="form-control" rows="5"><?php echo $note["note_dis"]; ?></textarea>
										</div>
									</div>
									<div class="card-footer">
										<input type="submit" class="btn btn-success" name="update" value="Update Note">
									</div>
								</div>
							</form>
						</div>
					<?php
					} else {
					?>
						<div class="col-12 mt-5">
							<form method="post">
								<div class="card">
									<div class="card-header">
										<div class="form-group mb-1">
											<label><b>Note Title :</b></label>
											<input type="text" name="title" class="form-control">
										</div>
									</div>
									<div class="card-body">
										<div class="form-group mb-0">
											<label><b>Note Discription :</b></label>
											<textarea name="dis" class="form-control" rows="5"></textarea>
										</div>
									</div>
									<div class="card-footer">
										<input type="submit" class="btn btn-success" name="add" value="Add Note">
									</div>
								</div>
							</form>
						</div>
						<div class="col-12 mt-5">
							<div class="row">
								<?php
								$user_id = $_SESSION["user_id"];
								$qry = "SELECT * FROM `note` WHERE `note_user` = '$user_id'";
								$result = mysqli_query($con, $qry);
								while ($note = mysqli_fetch_assoc($result)) {
								?>
									<div class="col-3 ">
										<div class="card h-100">
											<div class="card-header">
												<?php echo $note["note_title"]; ?>
											</div>
											<div class="card-body">
												<?php echo $note["note_dis"]; ?>
											</div>
											<div class="card-footer">
												<a href="index.php?edit=<?php echo $note["note_id"]; ?>"><button class="btn btn-success">Edit</button></a>
												<a href="index.php?delete=<?php echo $note["note_id"]; ?>"><button class="btn btn-success ml-3">Delete</button></a>
											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
					<?php
					}
				} else {
					// Usser Need to Login
					?>
					<div class="col-4 offset-1 mt-5 ">
						<h2>Login Form</h2>
						<form method="POST">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" name="password" class="form-control">
							</div>
							<div>
								<input type="submit" name="login" value="Login" class="btn btn-success">
							</div>
						</form>
					</div>
					<div class="col-4 offset-2 mt-5 ">
						<h2>Signup Form</h2>
						<form method="POST">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" name="password" class="form-control">
							</div>
							<div>
								<input type="submit" name="signup" value="Signup" class="btn btn-success">
							</div>
						</form>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</main>
</body>

</html>