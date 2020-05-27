<?php
session_start();
include('config.php');
if (isset($_POST["signup"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $qry = "INSERT INTO `user`(`user_id`, `user_name`, `user_password`) VALUES (NULL, '$username', '$password')";
    if (mysqli_query($con, $qry)) {
        $_SESSION["msg"] = "Signup Successfully";
        header('location:login.php');
    } else {
        $_SESSION["msg"] = "Error";
        header('location:signup.php');
    }
}
?>
<?php include('header.php'); ?>
<main class="">
    <div class="container">
        <?php include('alert.php'); ?>
        <div class="row">
            <div class="col-4 offset-4 mt-5 ">
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
        </div>
    </div>
</main>
<?php include('footer.php'); ?>