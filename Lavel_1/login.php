<?php
session_start();
include('config.php');
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $qry = "SELECT * FROM `user` WHERE `user_name` = '$username' AND `user_password` = '$password'";
    $result = mysqli_query($con,$qry);
    if($row = mysqli_fetch_assoc($result))
    {
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["user_name"] = $row["user_name"];
        $_SESSION["msg"] = "Login Done";
        header("location:index.php");
    }   
    else
    {
        $_SESSION["msg"] = "Invalid Username or Password";
        header("location:login.php");
    }
}
?>
<?php include('header.php'); ?>
<main class="">
    <div class="container">
        <?php include('alert.php'); ?>
        <div class="row">
            <div class="col-4 offset-4 mt-5 ">
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
        </div>
    </div>
</main>
<?php include('footer.php'); ?>