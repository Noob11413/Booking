<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.png" type="image/png">
    <title>VHire</title>
    <style>
        #main {
        transition: margin-left .5s;
        padding: 20px;
        }
        .icon{
            position: relative;
            left: 35%;
        }
        .container {
            /*background-color: blueviolet;*/
            position: relative;
            left: 28%;
            width: 600px;
            height: 200px;
            padding: 16px;
        }
        .left{
            position: relative;
            left: 0%;
        }
        .right{
            width: 105%;
            position:absolute;
            top: 8%;
            left: 52%;
        }
        a {
            text-decoration: none;
            color: white;
        }
        select{
            width: 35%;
            position: relative;
            top: 0%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }
        label{
            font-size: 23px;
            color: #D80C0C;
            font-weight: bold;
            padding-right: 10px;
        }
        button {
            background-color: #15138D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 8px;
            font-family: Verdana;
            font-size: 15px;
        }
        #home {
            background-color: #D80C0C;
        }
        h2 {
            color: #15138D;
            position: relative;
            text-align: center;
            top: -40px;
            left: -40px;
        }
    </style>
</head>
<body>
   <?php include '../php/sidebar.php'?>
    <div id="main">
        <img src="../images/icon.png" class="icon"/>
        <?php 
            echo "<h2>Welcome, ".$_SESSION["fname"]."!</h2>";
        ?>
        <div class="container">
            <form>
               <div class="left">
               <label>From: </label>
               <select class="slectloc" style="width: 35%;">
                        <option value="0">Current Location:</option>
                        <option value="1">Ayala City Center Cebu</option>
                        <option value="2">Cebu City Link Terminal</option>
                        <option value="3">SM City Cebu</option>
                        <option value="4">SM Seaside City </option>
                    </select>
               </div>
               <div class="right">
                <label>To: </label>
                <select class="slectloc" style="width: 35%;">
                        <option value="0">Destination:</option>
                        <option value="1">Ayala City Center Cebu</option>
                        <option value="2">Cebu City Link Terminal</option>
                        <option value="3">SM City Cebu</option>
                        <option value="4">SM Seaside City </option>
                    </select>
                </div>
                <label>Time: </label>
                <select id="time" style="width: 86.5%;" placeholder="Choose time...">
                    <option value="#">1:00 - 3:00</option>
                    <option value="#">3:30 - 4:00</option>
                    <option value="#">4:10 - 4:30</option>
                    <option value="#">5:00 - 6:30</option>
                  </select>
               <button ><a href="search.php">Search for Available Seats</a></button>
            </form>
        </div>
    </div>
</body>
</html>