<?php

include_once '../includes/dbconnect.php';
include_once '../includes/order.inc.php';
include_once '../includes/confirm.inc.php';
session_start();
$order = $_SESSION["orderID"];

$conn = connect();
$sql = "SELECT * FROM orders WHERE orderID = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "FAILED";
    exit();
}
mysqli_stmt_bind_param($stmt, "i", $order);
mysqli_stmt_execute($stmt);
$results = mysqli_stmt_get_result ($stmt);
$in = mysqli_fetch_assoc($results);
$trip = $in["tripID"];
$Quantity = $in["Quantity"];
$Amount = $in["AmountDue"];

$sql = 'SELECT * FROM trip WHERE tripID = ?;';
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "FAILED";
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $trip);
mysqli_stmt_execute($stmt);
$resultData = mysqli_stmt_get_result ($stmt);
$row = mysqli_fetch_assoc($resultData);
$freeSeats = $row["FreeSeats"];
$myRoute = $row["routeID"];
$myVhire = $row["vehicleID"];
$ETD = $row["ETD"];
$ETA = $row["ETA"];

$sql = "SELECT * FROM route WHERE routeID = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "FAILED";
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $myRoute);
mysqli_stmt_execute($stmt);
$results = mysqli_stmt_get_result ($stmt);
$in = mysqli_fetch_assoc($results);
$origin = $in["O_termID"];
$destination = $in["D_termID"];
$price = $in["Fare"];

$sql = "SELECT * FROM vhire WHERE vehicleID = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "FAILED";
    exit();
}
mysqli_stmt_bind_param($stmt, "i", $myVhire);
mysqli_stmt_execute($stmt);
$results = mysqli_stmt_get_result ($stmt);
$in = mysqli_fetch_assoc($results);
$plate = $in["PlateNum"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.png" type="image/png">
    <link rel="stylesheet" href="../css/center.css">
    <link rel="stylesheet" href="../css/table.css">
    <title>VHire</title>
    <style>
        h2{
            font-size: 28px;
            color: white;
            padding: 10px 20px 10px 20px;
            background-color: #15138D;
            border-radius: 12px;
        }
        .container{
            width: 1000px;
            height: 600px;
        }
        td{
            padding-right: 240px;
        }
        .rec{
            /*border: 3px solid black;*/
            width: 400px;
            height: 600px;
            position: absolute;
            top: 22px;
            right: -550px;
            border-radius: 20px;
        }
        p {
            color: #15138D;
            font-size: 24px;
            font-weight: normal;
        }
        button{
            cursor: pointer;
            padding: 10px 30px 10px 30px;
            font-size: 18px;
            color: white;
            background-color: #15138D;
            border-radius: 10px;
        }
        #tic {
            background-color: #D80C0C;
        }
        .h {
            /*background-color: red;*/
            position: absolute;
            top: -5px;
            left: 150px;
            width: 250px;
            height: 120px;
            padding-left: 15px;
        }
        .ellipse {
            background-color: #15138D;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            position: relative;
            left: 5%;
        }
        .block {
            position: relative;
            top: 20px;
            /*background-color: green;*/
            height: 130px;
            width: 300px;
        }
        .line {
            background-color: #15138D;
            height: 100px;
            width: 5px;
            position: relative;
            left: 9%;
        }
        .text {
            /*background-color: red;*/
            position: absolute;
            top: 0px;
            left: 50px;
            height: 130px;
            width: 250px;
            z-index: 1;
            padding-left: 10px;
        }
    </style>
</head>
<body>
    <span style="z-index: 100000000000000000;"><?php include '../php/sidebar.php'?></span>

    <div id="main">
       <div class="center"> 
           <div class="container">
               <?php echo "<h2> <span id='datetime'></span></h2>" ?>
               <script>
                    var dt = new Date();
                    let options = { year: 'numeric', month: 'long', day: 'numeric' };
                    document.getElementById("datetime").innerHTML=dt.toLocaleString('en-US', options);
                console.log(dt);
               </script>
               <br/>
               <table>
                   <tr>
                       <td class="fcolumn">Vhire (Plate No.)</td>
                       <?php echo "<td>".$plate."</td>"; ?>
                   </tr>
                   <tr>
                        <td class="fcolumn">Terminal</td>
                        <?php echo "<td>".$origin."</td>"; ?>
                    </tr>
                    <tr>
                        <td class="fcolumn">Route</td>
                        <?php echo "<td>".$origin." - ".$destination."</td>"; ?>
                    </tr>
                    <tr>
                        <td class="fcolumn">Time</td>
                        <?php echo "<td>".substr($ETD, 0, 5)." - ".substr($ETA, 0, 5)."</td>"; ?>
                    </tr>
                    <tr>
                        <td class="fcolumn">Quantity</td>
                        <?php echo "<td>".$Quantity."</td>"; ?>
                    </tr>
                    <tr>
                        <td class="fcolumn">Fare Price</td>
                        <?php echo "<td>PHP ".$price.".00</td>"; ?>
                    </tr>
                    <tr>
                        <td class="fcolumn">Total Amount</td>
                        <?php echo "<td>PHP ".$Amount.".00</td>"; ?>
                    </tr>
               </table>
               
               <p style="font-weight: normal;">*Note: Please arrive on time or 10 minutes before departure time otherwise, your booked seat will automatically be cancelled.</p>
           </div>
           <div class="rec">
           <img src="../images/confirm.png" style="position: relative; top: -12px; left: -2px;">
               <div class="h">
                    <p style="line-height: 10px;">Booking Details</p>
                    <p style="line-height: 15px; opacity: 70%;">Order Number</p>
                    <?php echo "<p style='line-height: 0px; font-size: 28px; font-weight: bold;'>#".$order."</p>" ?>
               </div>
               <hr style="border-top: 3px dashed #15138D;">
                    <div class="block">
                        <div class="ellipse"></div>
                        <div class="line" style="opacity: 70%;"></div>
                        <div class="text">
                            <p style="position: relative; top: -25px;">Booking Confirmed</p>
                            <p style="position: relative; top: -40px; opacity: 70%;">06-01-2021</p>
                        </div>
                    </div>
                    <div class="block">
                        <div class="ellipse" style="opacity: 70%;"></div>
                        <div class="line" style="opacity: 70%;"></div>
                        <div class="text">
                            <p style="position: relative; top: -25px;">Vehicle Available</p>
                            <p style="position: relative; top: -40px; opacity: 70%;">06-01-2021</p>
                        </div>
                    </div>
                    <div class="block">
                        <div class="ellipse" style="opacity: 70%;"></div>
                        <div class="text">
                            <p style="position: relative; top: -25px;">Ride Confirmed</p>
                            <p style="position: relative; top: -40px; opacity: 70%;">06-01-2021</p>
                        </div>
                    </div>
           </div>
       </div>
    </div>
</body>
</html>