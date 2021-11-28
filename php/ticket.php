<?php
    include '../includes/ticket.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="../images/icon.png" type="image/png">
    <link rel="stylesheet" href="../css/center.css">
    <title>VHire</title>
    <style>
        h1{
            color: #D80C0C;
            font-size: 36px;
        }
        .ticket{
            background-color: #D80C0C;
            width: 100%;
            height: 150px;
            position: relative;
            top: 5%;
            border-radius: 20px;
            margin: 20px;
            margin-left: 0px;
            z-index: 0;
            cursor: pointer;
        }
        td {
            color: white;
            font-size: 28px;
            padding-top: 10px;
            padding-left: 30px;
        } 
        .first td{
            padding: 25px 499px 10px 30px;
    } 
    </style>
</head>
<body>
    <span style="z-index: 100000000000000000000;"><?php include '../php/sidebar.php'?></span>

    <div id="main">
        <div class="center">
            <div class="container">
                <h1>Ticket History</h1>
                <?php 
                    displayTickets();
                ?>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function(){
            $('.ticket').click(function(){
                var order = $(this).attr("value");
                console.log(order);
                var ajaxurl = "../includes/confirm.inc.php",
                data =  {'orderID': order};
                $.post(ajaxurl, data, function (response) {
                    location.replace("../php/confirm.php");
                });
            });
        });
    </script>
</body>
</html>