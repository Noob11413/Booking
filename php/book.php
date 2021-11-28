<?php
        include_once '../includes/dbconnect.php';
        include_once '../includes/book.inc.php';
        session_start();
        $tripID = $_SESSION["tripID"];
        $conn = connect();
        $sql = 'SELECT * FROM trip WHERE tripID = ?;';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "FAILED";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $tripID);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/center.css">
    <link rel="stylesheet" href="../css/table.css">
    <title>VHire</title>
    <style>
        .container{
        height: 600px;
        }
        h2{
            font-size: 28px;
            color: white;
            padding: 10px 20px 10px 20px;
            background-color: #15138D;
            border-radius: 12px;
        }
        form {
            width: 300px;
            margin: 0 auto;
            }

        .value-button {
            display: inline-block;
            border: 1px solid #15138D;
            color: white;
            margin: 0px;
            width: 40px;
            height: 20px;
            text-align: center;
            vertical-align: middle;
            padding: 11px 0;
            background: #15138D;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

        .value-button:hover {
            cursor: pointer;
            }

        form #decrease {
            margin-right: -4px;
            border-radius: 8px 0 0 8px;
            }

        form #increase {
            margin-left: -4px;
            border-radius: 0 8px 8px 0;
            }

        form #input-wrap {
            margin: 0px;
            padding: 0px;
            }

        input#number {
            text-align: center;
            border: none;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 40px;
            }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            } 
        #button{
            cursor: pointer;
            padding: 10px 30px 10px 30px;
            font-size: 18px;
            color: white;
            background-color: #15138D;
            border-radius: 10px;
        }
        #sched {
            background-color: #D80C0C;
        }
    </style>
</head>
<body onload="increaseValue()">
    <?php include '../php/sidebar.php'?>
    <div id="main">
       <div class="center"> 
           <div class="container">
                <?php echo "<input type=\"number\" value=\"".$price."\" id=\"price\" hidden />"; ?>
               <?php echo "<h2>Order for Trip from ".$origin." - ".$destination.
               "</h2>" ?>
               <br/>
               <table>
                   <tr>
                       <td class="fcolumn">Vhire Plate No.</td>
                       <?php echo "<td>".$plate."</td>"; ?>
                   </tr>
                   <tr>
                        <td class="fcolumn">Terminal</td>
                        <?php echo "<td>".$origin."</td>"; ?>
                    </tr>
                    <tr>
                        <td class="fcolumn">Time</td>
                        <?php echo "<td>".substr($ETD, 0, 5)." - ".substr($ETA, 0, 5)."</td>"; ?>
                    </tr>
                    <tr>
                        <td class="fcolumn">Quantity</td>
                        <td>
                            <form>
                                <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input type="number" id="number" value="0"/>
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                              </form>
                        </td>
                    </tr>
                    <tr>
                        <td class="fcolumn">Fare Price</td>
                        <?php echo "<td id=\"price\">PHP ".$price.".00</td>" ?>
                    </tr>
                    <tr>
                        <td class="fcolumn">Total Amount</td>
                        <td id="total"></td>
                    </tr>
                    <tr>
                        <td class="fcolumn"></td>
                        <td><button id="button">Book Now</button></td>
                    </tr>
               </table>
           </div>
       </div>
    </div>
    <script>
        function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
        var price = document.getElementById('price').value;
        var total = value * price;
        document.getElementById('total').innerHTML = "PHP " + total + ".00";
        }

        function decreaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById('number').value = value;
        var price = document.getElementById('price').value;
        var total = value * price;
        document.getElementById('total').innerHTML = "PHP " + total + ".00";
        }

        jQuery(document).ready(function(){
            $('#button').click(function(){
                var Price = document.getElementById('price').value
                var Quantity = document.getElementById('number').value;
                var Amount = Price * Quantity;
                var ajaxurl = "../includes/order.inc.php",
                data =  {'Quantity': Quantity, 'Amount': Amount,};
                $.post(ajaxurl, data, function (response) {
                    location.replace("../php/ticket.php");
                });
            });
        });

    </script>
</body>
</html>