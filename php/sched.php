<?php
    include_once '../includes/dbconnect.php';
    include_once '../includes/book.inc.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.png" type="image/png">
    <link rel="stylesheet" href="../css/center.css">
    <title>VHire</title>
    <style>
        p {
            color: white;
            font-size: 22px;
            padding: 10px 0px 10px 20px;
            background-color: #15138D;
            border-radius: 8px;
        }
        h1{
            color: #D80C0C;
            font-size: 40px;
        }
        td {
            color: #15138D;
            font-size: 20px;
            padding: 10px 110px 10px 0px;
        }
        .b{
            padding-left: 10px;
            padding-right: 0px;
        }
        img {
            height: 30px;
            cursor: pointer;
        }
        .vhire{
            font-weight: bold;
        }
        a {
            color: #15138D;
            font-size: 20px;
            font-weight: bold;
        }
        #sched {
            background-color: #D80C0C;
        }
        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <span style="z-index: index 1000000000;"><?php include '../php/sidebar.php'?></span>

    <div id="main">
       <div class="center"> 
           <div class="container">
           
               <h1>Schedule for <span id="datetime"></span></h1>
               <script>
                    var dt = new Date();
                    let options = { year: 'numeric', month: 'long', day: 'numeric' };
                    document.getElementById("datetime").innerHTML=dt.toLocaleString('en-US', options);
                console.log(dt);
               </script>
               <p>Ayala Center Cebu (AYLA) - Cebu City Link Terminal (CLNK)</p>
               <table>
                    <?php
                        displayTrips("AYLA-CLNK", "CLNK-AYLA");
                    ?>
               </table>

               <p>Cebu City Link Terminal (CLNK) - SM City Cebu (SMCC)</p>
            <table>
                <?php
                    displayTrips("CLNK-SMCC", "SMCC-CLNK");
                ?>
            </table>
            
               <p>SM City Cebu (SMCC) - SM Seaside City Cebu (SMSC)</p>
               <table>
                <?php
                    displayTrips("SMCC-SMSC", "SMSC-SMCC");
                ?>
               </table>

               <p>SM Seaside City Cebu (SMSC) - Ayala Center Cebu (AYLA)</p>
            <table>
            <?php
                displayTrips("SMSC-AYLA", "AYLA-SMSC");
            ?>
            </table>
           </div>
       </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            $('.button').click(function(){
                var clickBtnValue = $(this).val();
                var ajaxurl = '../includes/book.inc.php',
                data =  {'tripID': clickBtnValue};
                $.post(ajaxurl, data, function (response) {
                    // Response div goes here.
                    location.replace("../php/book.php");
                });
            });
        });
    </script>
</body>
</html>