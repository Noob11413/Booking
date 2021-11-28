<?php

if (isset($_POST["submit"])) {
    $uname = $_POST["uname"];
    $pass = $_POST["psw"];

    require_once 'dbconnect.php';
    require_once 'functions.inc.php';

    // check if all fields are filled
    if (emptyLogin($uname, $pass)!== false) {
        header("location: ../php/index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $uname, $pass);
}

else {
    header("location: ../php/index.php");
        exit();
}