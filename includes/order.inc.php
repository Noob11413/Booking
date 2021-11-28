<?php

include '../includes/dbconnect.php';
include '../includes/book.inc.php';
if(isset($_POST['Quantity'])){
    session_start();
    $tripID = $_SESSION["tripID"];
    $customerID = $_SESSION["customerID"];
    $Quantity = $_POST['Quantity'];
    $Amount = $_POST['Amount'];
    $Status = "UNCONFIRMED";

    $conn = connect();
    $sql = "INSERT INTO orders(customerID, tripID, Quantity, AmountDue, Status) VALUES(?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "FAILED";
    }
    mysqli_stmt_bind_param($stmt, "iiiis", $customerID, $tripID, $Quantity, $Amount, $Status);
    mysqli_stmt_execute($stmt);

    $sql = "UPDATE trip SET FreeSeats = FreeSeats - ? WHERE tripID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "FAILED";
    }
    mysqli_stmt_bind_param($stmt, "ii", $Quantity, $tripID);
    mysqli_stmt_execute($stmt);
}
?>