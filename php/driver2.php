<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/center.css">
    <link rel="stylesheet" href="../css/signup.css">
    <title>VHire</title>
    <style>
        .mid {
            background-color: #FFF500;
            position: absolute;
            padding-top: 5px;
            top: 130px;
            height: 1360px;
        }
        .container{
            background-color: transparent;
            position: relative;
            top: 0px;
            width: 700px;
            height: 1200px;
            }
        .left {
            top: 70px;
        }
        .right {
            top: 70px;
        }
        .bottom {
            top: 215px;
            width: 95%;
            padding: 15px;
        }
        .down {
            top: 400px;
            width: 95%;
        }
        .Mi {
            position: absolute;
            top: 0px;
            left: 180px;
            padding: 15px;
        }
        input[type=color]{
            border-style: hidden;
            background-color: transparent;
        }
        .input{
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .input + label {
            font-size: 1.25em;
            padding: 5px 15px 5px 15px;
            margin-top: 5px;
            border-radius: 8px;
            color: white;
            background-color: #15138D;
            display: inline-block;
        }

        .input:focus + label,
        .input + label:hover {
            opacity: .8;
        }
        .input + label {
            cursor: pointer;
        }
        td{
            padding-right: 30px;
        }
    </style>
</head>
<body>
    <?php include '../php/header.php'?>
    <div id="main">
        <div class="mid">
            <div class="container">
            <form name="signup" action="../includes/driversignup.inc.php" method="post">
                    <div class="left">  
                        <label>First Name</label> <br/>
                        <input type="text" name="fname" id="fname" placeholder="Juan" style="width: 50%" required/>    
                        <div class="Mi">
                            <label>Middle Name</label> <br/>
                            <input type="text" name="mi" id="mi" placeholder="M" style="width: 100%" />
                        </div>                        
                        <br/><label>Username</label> <br/>
                        <input type="text" name="uname" id="uname" placeholder="JuanDelaCruz123" required/>
                    </div>
                    <div class="right">
                        <label>Last Name</label> <br/>
                        <input type="text" id="lname" name="lname" placeholder="Dela Cruz" required/>
                        <label>Date of Birth:</label> <br/>
                        <input type="date" id="DoB" name="DoB"/>
                    </div>
                    <div class="bottom">
                        <label>Email Address</label> <br/>
                        <input type="email" name="email" placeholder="JuanDelaCruz@email.com" required/>
                        <label>Phone number</label> <br/>
                        <input type="tel" name="phone" placeholder="09123456789" required/>
                        <label>Password</label>
                        <input type="password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                        <label>Confirm Password</label>
                        <input type="password" name="Cpass" />
                    </div>
                    <div class="left down">
                        <h1>Vehicle Details:</h1>
                        <label>License Number</label> <br/>
                        <input type="text" name="lnum" placeholder="ABC1234" required/>
                        <label>Plate Number</label> <br/>
                        <input type="text" name="pnum" placeholder="ABC1234" required/> 
                        <label>Make</label> <br/>
                        <input type="text" name="make" placeholder="Car Make" required/>
                        <label>Model</label> <br/>
                        <input type="text" name="model" placeholder="Car Model" required/>
                        <label>Color</label><br/>
                        <input type="color" name="color" value="#ff0000" required/>
                        <label>Capacity</label><br/>
                        <input type="number" name="capacity" required/>
                        <label>Weight(kg)</label><br/>
                        <input type="number" name="weight" required/><br/><br/>
                        <button type="submit" name="submit">Sign up</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="../js/uploadProPic.js">        
        </script>
</body>
</html>