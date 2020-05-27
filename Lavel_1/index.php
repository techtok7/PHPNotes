<?php
session_start();
include('config.php');
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
?>
<?php include('header.php'); ?>
<main class="">
	<div class="container mb-5">
		<?php include('alert.php'); ?>
		<div class="row">
			<?php
			if (isset($_SESSION["user_id"])) {
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
										<a href="edit.php?id=<?php echo $note["note_id"]; ?>"><button class="btn btn-success">Edit</button></a>
										<a href="delete.php?id=<?php echo $note["note_id"]; ?>"><button class="btn btn-success ml-3">Delete</button></a>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			<?php
			} else {
			?>
				<div class="col-12 mt-5 ">
					<h2>Welcome to PHP Notes.</h2>
					<h3>Login or Register to Save Your Content</h3>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</main>
<?php include('footer.php'); ?>