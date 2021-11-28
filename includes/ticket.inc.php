<?php
    include '../includes/book.inc.php';
                          
    function displayTickets(){
        session_start();
        $customer = $_SESSION["customerID"];
        $conn = connect();

        $sql = 'SELECT * FROM orders WHERE customerID = ? ORDER BY orderID DESC;';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "FAILED";
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $customer);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result ($stmt);
        if($resultData->num_rows > 0){
        while($row = mysqli_fetch_assoc($resultData)){
            $order = $row["orderID"];
            $trip = $row["tripID"];
            $Quantity = $row["Quantity"];
            $Amount = $row["AmountDue"];
            $date = $row["Date"];
            
            $sql = "SELECT * FROM trip WHERE tripID = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "FAILED";
                exit();
            }
            mysqli_stmt_bind_param($stmt, "i", $trip);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result ($stmt);
            $in = mysqli_fetch_assoc($results);

            $myRoute = $in["routeID"];
            $ETD = $in["ETD"];
            $ETA = $in["ETA"];

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

            echo "<div class=\"ticket\" value=\"".$order."\">
                <table>
                    <tr class=\"first\">
                        <td>".$origin." - ".$destination."</td>
                        <td style=\"text-align: right; padding-right: 0%;\">Php ".$Amount.".00</td>
                    </tr>
                    <tr>
                        <td>Sched: ".substr($ETD, 0, 5)." - ".substr($ETA, 0, 5)." Date: ".$date." Origin: ".$origin." Seats: ".$Quantity."</td>
                        <td>Order No. </td>
                        <td id=\"order\">".$order."</td>
                    </tr>
                </table>
        </div>";
        }
        }else{
            echo "<div style=\"color: blue;\"><h1 style=\"z-value: 1000000000000; text-align: center;\">No Transaction History!!!</h1></div>";
        }
        mysqli_stmt_close($stmt);
    }    
?>