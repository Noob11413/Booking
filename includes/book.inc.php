<?php

    function connect(){
        $conn = mysqli_connect("localhost", "root", "", "mydb");
        return $conn;
    }

    function displayTrips($rt1, $rt2){
        $conn = connect();

        $sql = 'SELECT * FROM trip WHERE routeID = ? OR routeID = ?;';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "FAILED";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $rt1, $rt2);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result ($stmt);
        while($row = mysqli_fetch_assoc($resultData)){
            $tripID = $row["tripID"];
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

            echo "<tr>
                    <td class=\"vhire\">".$tripID."</td>
                    <td class=\"vhire\">".$plate."</td>
                    <td>".$origin." - ".$destination."</td>
                    <td>".$freeSeats."</td>
                    <td>".substr($ETD, 0, 5)." - ".substr($ETA, 0, 5)."</td>
                    <td>PHP ".$price.".00</td>
                    <td class=\"b\"><input type=\"image\" class=\"button\" value=\"".$tripID."\"src=\"../images/add.png\"></td>
                </tr>";
        }
        mysqli_stmt_close($stmt);
    }
    
    if (isset($_POST['tripID'])) {
        session_start();
        $_SESSION["tripID"] = $_POST['tripID'];
    }
?>