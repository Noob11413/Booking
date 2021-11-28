<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.png" type="image/png">
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
            height: 680px;
        }
        .container{
            /*background-color: red;*/
            position: relative;
            top: 0px;
            width: 700px;
            height: 700px;
            }
        .bottom {
            top: 215px;
            width: 95%;
            padding: 15px;
        }
        .Mi {
            position: absolute;
            top: 0px;
            left: 180px;
            padding: 15px;
        }
        .left {
            position: relative;
            top: 70px;
        }
        .right{
            float: right;
            top:70px;
        }
        p {
            font-style: italic;
            color: red;
            position: absolute;
            top: 130px;
            left: 95px;
        }
    </style>
</head>
<body>
    <?php include '../php/header.php'?>
    <div id="main">
        <div class="mid">
            <div class="container">
                <form name="signup" action="../includes/signup.inc.php" method="post" enctype="multipart/form-data"> 
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
                        <input type="text" name="lname" id="lname" placeholder="Dela Cruz" required/>
                        <br/><label>Date of Birth:</label> <br/>
                        <input type="date" name="DoB" id="DoB"/>
                    </div>
                    <div class="bottom">
                        <label>Email Address</label> <br/>
                        <input type="email" name="email" id="email" placeholder="JuanDelaCruz@email.com" required/>
                        <label>Phone number</label> <br/>
                        <input type="tel"  name="phone" id="phone" placeholder="09123456789" required/>
                        <label>Password</label>
                        <input type="password"  name="psw" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                        <label>Confirm Password</label>
                        <input type="password"  name="Cpass" id="Cpass" /><br/><br/>
                        <button type="submit" name="submit">Sign up</button>
                    </div>
                </form>
            </div>
            <?php
            if(isset($_GET["error"]))
            {
                if ($_GET["error"]== "emptyinput") {
                    echo "<p>Fill in all fields</p>";
                }
                else if ($_GET["error"]== "invaliduname") {
                    echo "<p>Enter a valid username</p>";
                }
                else if ($_GET["error"]== "invalidemail") {
                    echo "<p>Enter a valid email</p>";
                }
                else if ($_GET["error"]== "pswdontmatch") {
                    echo "<p>Passwords don't match</p>";
                }
                else if ($_GET["error"]== "usernametaken") {
                    echo "<p>Username already taken</p>";
                }
            }
            ?>
        </div>
        
    </div>
    
    
    <script src="../js/uploadProPic.js">        
    </script>
</body>
</html>