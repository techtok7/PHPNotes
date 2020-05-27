<?php
session_start();
include('config.php');
if(isset($_GET["id"]))
{
    $note_id = $_GET["id"];
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
?>