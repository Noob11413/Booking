<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.png" type="image/png">
    <link rel="stylesheet" href="../css/center.css">
    <title>VHire</title>
    <style>
    .middle{

        width: 900px;
        height: 500px;
        position: relative;
        top: 100px;
        left: 20%;
        z-index: 1;
    }
    .header{
        color: #A59595;
        position: relative;
        top: 50px;
        left: 200px;
        padding: 0%;
    }
    .container {
        position: relative;
        width: 30%;
        top: 70px;
    }

    .container img {
        width: 100%;
        height: auto;
    }

    .container .btn {
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .container .btn:hover {
        background-color: black;
    }

    .right {
            position: absolute;
            top: 130px;
            left: 50%;
    }
    </style>
</head>
<body>
<?php include '../php/header.php'?>
<div class="middle">
        <h1 class="header">Are you a...</h1>
        <div class="container">
            <img src="../images/passenger.png">
            <button class="btn" id="passenger" onclick="next(this.id)">Passenger</button>
        </div>
        <div class="container right">
            <img src="../images/driver.png">
            <button class="btn" id="driver" onclick="next(this.id)">Driver</button>
        </div>
    </div>

    <script>
        function next(id)
        {
            if (id == "passenger") {
                window.location.replace("signup.php");
            }
            else if (id == "driver") {
                window.location.replace("driver2.php");
            } 
        }
    </script>
</body>
</html>