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
        .left{
            width: 600px;
            height: 500px;
            position: relative 
        }
        .left h1{
            position: relative;
            top: 25px;
        }
        .left li a{
            position: relative;
            top: 20px;
        }
        .right{
            width: 600px;
            height: 500px;
            position: absolute;
            right: 0px;
        }
        h1{
            text-align: center;
            color: #D80C0C;
        }
        ul{
            list-style: none;
            text-align: center;
        }
        li a{
            text-align: center;
            color: white;
            text-decoration: none;
            font-size: 22px;
            padding: 12px 150px 12px 150px;
            line-height: 70px;
            background-color: #15138D;
            border-radius: 8px;
        }
        #route {
            background-color: #D80C0C;
        }
    </style>
</head>
<body>
    <?php include '../php/sidebar.php'?>

    <div id="main">
        <div class="center">
            <div class="container">
                <div class="left">
                    <h1>Ayala City Center Cebu (AYLA)</h1>
                    <ul>
                        <li><a href="book.php">AYLA to CLNK</a></li>
                        <li><a href="book.php">AYLA to SMSC</a></li>
                        <li><a href="book.php">more...</a></li>
                    </ul>
                </div>
                <div class="right" style="top: 0px;">
                    <h1>Cebu City Link Terminal (CLNK)</h1>
                    <ul>
                        <li><a href="book.php">CLNK to AYLA</a></li>
                        <li><a href="book.php">CLNK to SMCC</a></li>
                        <li><a href="book.php">more...</a></li>
                    </ul>
                </div>
            </div>
            <div class="container" style="top: 0px;">
                <div class="left">
                    <h1>SM City Cebu (SMCC)</h1>
                    <ul>
                        <li><a href="book.php">SMCC to CLNK</a></li>
                        <li><a href="book.php">SMCC to SMSC</a></li>
                        <li><a href="book.php">more...</a></li>
                    </ul>
                </div>
                <div class="right" style="top: 0px;">
                    <h1>SM Seaside City (SMSC)</h1>
                    <ul>
                        <li><a href="book.php">SMSC to AYLA</a></li>
                        <li><a href="book.php">SMSC to SMCC</a></li>
                        <li><a href="book.php">more...</a></li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
        
    </div>
</body>
</html>