<?php
//passenger
function emptyInput($fname, $lname, $uname, $email, $phone, $DoB, $psw, $Cpass)
{
    if (empty($fname) ||empty($lname) ||empty($uname) ||empty($email) ||empty($phone) ||empty($DoB) ||empty($psw) ||empty($Cpass)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUname($uname) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passMatch($psw, $Cpass) {
    if ($psw !== $Cpass) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function unameExist($conn, $uname, $email) {
    $sql = "SELECT * FROM customer WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../php/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $mi, $phone, $email, $uname, $psw, $DoB) {
    $sql = "INSERT INTO customer(Fname, Mname, Lname, ContactNum, Email, Username, Passwords, DateofBirth) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../php/signup.php?error=stmtfailed");
        exit();
    }
 
    $hashedPass = password_hash($psw, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssissss", $fname, $lname, $mi, $phone, $email, $uname, $hashedPass, $DoB);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT * FROM customer WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../php/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($resultData);

    session_start();
        $_SESSION["customerID"] = $row["CustomerID"];
        $_SESSION["username"] = $row["Username"];
        $_SESSION["fname"] = $row["Fname"];
        header("location: ../php/home.php");
        exit();
}

function emptyLogin($uname, $pass)
{
    if (empty($uname) || empty($pass)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


//driver
function emptyDriver($fname, $lname, $uname, $email, $phone, $DoB, $psw, $Cpass, $license)
{
    if (empty($fname) ||empty($lname) ||empty($uname) ||empty($email) ||empty($phone) ||empty($DoB) ||empty($psw) ||empty($Cpass) ||empty($license)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyVehicle($plate, $make, $model, $color, $capacity, $weight)
{
    if (empty($plate) ||empty($make) ||empty($model) ||empty($color) ||empty($capacity) ||empty($weight)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function DunameExist($conn, $uname, $email) {
    $sql = "SELECT * FROM driver WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../php/driver2.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createDriver($conn, $fname, $mi, $lname, $uname, $email, $phone, $DoB, $psw, $license, $plate, $make, $model, $color, $capacity, $weight) {
    $sql = "INSERT INTO driver(LicenseNum, Fname, Mname, Lname, ContactNum, Email, Username, Passwords, DateofBirth) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../php/signup.php?error=stmtfailed1");
        exit();
    }
 
    $hashedPass = password_hash($psw, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssissss", $license,  $fname, $mi, $lname, $phone, $email, $uname, $hashedPass, $DoB);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT * FROM driver WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../php/driver2.php?error=stmtfailed2");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($resultData);
   
    $sql = "INSERT INTO vhire(driverId, PlateNum, Brand, Model, Color, Capacity, Weight) VALUES(?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../php/signup.php?error=stmtfailed3");
        exit();
    }
 
    mysqli_stmt_bind_param($stmt, "issssii", $row["driverID"], $plate, $make, $model, $color, $capacity, $weight);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
        $_SESSION["driverID"] = $row["driverID"];
        $_SESSION["Dusername"] = $row["Username"];
        $_SESSION["fname"] = $row["Fname"];
        header("location: ../php/driverhome.php");
        exit();
}


function loginUser($conn, $uname, $pass) {
    $unameExists = unameExist($conn, $uname, $uname);

    if ($unameExists === false) {
        header("location: ../php/index.php?error=invalidlogin");
        exit();
    }

    $passHashed = $unameExists["Passwords"];
    $checkPass = password_verify($pass, $passHashed);

    if ($checkPass === false) {
        header("location: ../php/index.php?error=invalidpassword");
        exit();
    }

    else if ($checkPass === true) {
        session_start();
        $_SESSION["customerID"] = $unameExists["customerID"];
        $_SESSION["username"] = $unameExists["Username"];
        $_SESSION["fname"] = $unameExists["Fname"];
        header("location: ../php/home.php");
        exit();
    }
}

function loginDriver($conn, $uname, $pass) {
    $DnameExists = DunameExist($conn, $uname, $uname);

    if ($DnameExists === false) {
        header("location: ../php/Dindex.php?error=invalidlogin");
        exit();
    }

    $passHashed = $DnameExists["Passwords"];
    $checkPass = password_verify($pass, $passHashed);

    if ($checkPass === false) {
        header("location: ../php/Dindex.php?error=invalidpassword");
        exit();
    }

    else if ($checkPass === true) {
        session_start();
        $_SESSION["driverID"] = $DnameExists["driverID"];
        $_SESSION["Dusername"] = $DnameExists["Username"];
        $_SESSION["fname"] = $DnameExists["Fname"];
        header("location: ../php/driverhome.php");
        exit();
    }
}