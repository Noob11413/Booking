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
        #home {
            background-color: #D80C0C;
        }
        label{
            font-size: 23px;
            color: #D80C0C;
            font-weight: bold;
            padding-right: 10px;
        }
        .left{
            position: relative;
            left: 0%;
            top: 40px;
        }
        .right{
            width: 105%;
            position:absolute;
            top: 8%;
            left: 43%;
        }
        input[type=text], select{
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
        td {
            color: #15138D;
            font-size: 24px;
            padding: 15px 40px 10px 40px;
        }
        table {
            width: 1500px;
            position: relative;
            top: 100px;
            left: -40px;
        }
        button {
            background-color: #15138D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-family: Verdana;
            font-size: 15px;
        }
        .b{
            padding-left: 110px;
            padding-right: 0px;
        }
    </style>
</head>
<body>
    <?php include '../php/sidebar.php'?>
    <div id="main">
        <div class="center"> 
            <div class="container">
                <form>
                    <div class="left">
                    <label>From: </label>
                    <select class="slectloc" style="width: 35%;">
                        <option value="0">Current location:</option>
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
                     <button ><a href="search.php">Search for Available Seats</a></button>
                     </div>
                </form>
                <table>
                    <tr>
                        <td class="fcolumn">Origin</td>
                        <td class="fcolumn">Destination</td>
                        <td class="fcolumn">Departure Time</td>
                        <td class="fcolumn">Vhire No.</td>
                        <td class="fcolumn">no. of available seats</td>
                        <td class="fcolumn">Fare Price</td>
                    </tr>
                    <tr>
                        <td>Origin</td>
                        <td>Destination</td>
                        <td>Departure Time</td>
                        <td>Vhire No.</td>
                        <td>no. of available seats</td>
                        <td>Fare Price</td>
                        <td class="b"><a href="../php/book.php"><img src="../images/add.png" onclick="add()"></a></td>
                    </tr>
                    <tr>
                        <td>Origin</td>
                        <td>Destination</td>
                        <td>Departure Time</td>
                        <td>Vhire No.</td>
                        <td>no. of available seats</td>
                        <td>Fare Price</td>
                        <td class="b"><a href="../php/book.php"><img src="../images/add.png" onclick="add()"></a></td>
                    </tr>
                    <tr>
                        <td>Origin</td>
                        <td>Destination</td>
                        <td>Departure Time</td>
                        <td>Vhire No.</td>
                        <td>no. of available seats</td>
                        <td>Fare Price</td>
                        <td class="b"><a href="../php/book.php"><img src="../images/add.png" onclick="add()"></a></td>
                    </tr>
                    <tr>
                        <td>Origin</td>
                        <td>Destination</td>
                        <td>Departure Time</td>
                        <td>Vhire No.</td>
                        <td>no. of available seats</td>
                        <td>Fare Price</td>
                        <td class="b"><a href="../php/book.php"><img src="../images/add.png" onclick="add()"></a></td>
                    </tr>
                    <tr>
                        <td>Origin</td>
                        <td>Destination</td>
                        <td>Departure Time</td>
                        <td>Vhire No.</td>
                        <td>no. of available seats</td>
                        <td>Fare Price</td>
                        <td class="b"><a href="../php/book.php"><img src="../images/add.png" onclick="add()"></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>