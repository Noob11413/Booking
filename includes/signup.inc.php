<?php
if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mi = $_POST["mi"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $psw = $_POST["psw"];
    $Cpass = $_POST["Cpass"];

    $DoB = $_POST["DoB"];
    $date = new DateTime($DoB);
    $DoB = $date->format('Y-m-d');

    require_once 'dbconnect.php';
    require_once 'functions.inc.php';

    // check if all fields are filled
    if (emptyInput($fname, $lname, $uname, $email, $phone, $DoB, $psw, $Cpass)!== false) {
        header("location: ../php/signup.php?error=emptyinput");
        exit();
    }

    // check if username is valid
    if (invalidUname($uname)!== false) {
        header("location: ../php/signup.php?error=invaliduname");
        exit();
    }

    // check if email is valid
    if (invalEmail($email)!== false) {
        header("location: ../php/signup.php?error=invalidemail");
        exit();
    }

    // check if passwords match
    if (passMatch($psw, $Cpass)!== false) {
        header("location: ../php/signup.php?error=pswdontmatch");
        exit();
    }

    // check if username exists
    if (unameExist($conn, $uname, $email)!== false) {
        header("location: ../php/signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $fname, $lname, $mi, $phone, $email, $uname, $psw, $DoB);
}
else {
    header("location: ../php/home.php");
}