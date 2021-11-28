<?php
    if (isset($_POST['orderID'])) {
        session_start();
        $_SESSION["orderID"] = $_POST['orderID'];
    }
?>
