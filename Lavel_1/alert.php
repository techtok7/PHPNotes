<?php
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