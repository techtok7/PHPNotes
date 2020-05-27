<?php
session_start();
include('config.php');
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
?>
<?php include('header.php'); ?>
<main class="">
    <div class="container mb-5">
        <?php include('alert.php'); ?>
        <div class="row">
            <div class="col-12 mt-5">
                <?php
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $user_id = $_SESSION["user_id"];
                    $qry = "SELECT * FROM `note` WHERE `note_id` = '$id' AND `note_user` = '$user_id'";
                    $result = mysqli_query($con, $qry);
                    if ($note = mysqli_fetch_assoc($result)) {
                ?>
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
                <?php
                    } else {
                    }
                } else {
                }
                ?>

            </div>
        </div>
    </div>
</main>
<?php include('footer.php'); ?>