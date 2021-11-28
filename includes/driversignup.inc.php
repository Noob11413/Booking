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
    $license = $_POST["lnum"];
    $plate = $_POST["pnum"];
    $make = $_POST["make"];
    $model = $_POST["model"];
    $color = $_POST["color"];
    $capacity = $_POST["capacity"];
    $weight = $_POST["weight"];

    require_once 'dbconnect.php';
    require_once 'functions.inc.php';

    // check if all fields are filled
    if (emptyDriver($fname, $lname, $uname, $email, $phone, $DoB, $psw, $Cpass, $license)!== false) {
        header("location: ../php/driver2.php?error=emptyinput");
        exit();
    }

    if (emptyVehicle($plate, $make, $model, $color, $capacity, $weight)!== false) {
        header("location: ../php/driver2.php?error=emptyvhire");
        exit();
    }


    // check if username is valid
    if (invalidUname($uname)!== false) {
        header("location: ../php/driver2.php?error=invaliduname");
        exit();
    }

    // check if email is valid
    if (invalEmail($email)!== false) {
        header("location: ../php/driver2.php?error=invalidemail");
        exit();
    }

    // check if passwords match
    if (passMatch($psw, $Cpass)!== false) {
        header("location: ../php/driver2.php?error=pswdontmatch");
        exit();
    }

    // check if username exists
    if (DunameExist($conn, $uname, $email)!== false) {
        header("location: ../php/driver2.php?error=usernametaken");
        exit();
    }

    createDriver($conn, $fname, $mi, $lname, $uname, $email, $phone, $DoB, $psw, $license, $plate, $make, $model, $color, $capacity, $weight);
}
else {
    header("location: ../php/driverhome.php");
}