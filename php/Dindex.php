<?php
    include_once '../includes/dbconnect.php';
    session_start();
    if(isset($_SESSION["Dusername"])){
        header("Location: dtiverhome.php");
        exit();
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.png" type="image/png">
    <title>VHire</title>
    <style>
        .mid{
            /*background-color: aquamarine;*/
            height: 500px;
            width: 1000px;;
            position: absolute;
            top: 15%;
            left: 20%;
        }
        img {
            height: 280px;
            position: relative;
            left: 20%;
        }
        input[type=text], input[type=password]{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 8px;
        }
        .container {
            /*background-color: blueviolet;*/
            position: relative;
            left: 18%;
            width: 500px;
            height: 200px;
            padding: 16px;
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
        button:hover {
            opacity: 0.8;
        }
        a{
            position: relative;
        }
        p {
            font-style: italic;
            color: red;
            position: absolute;
            top: 265px;
            left: 195px;
        }
    </style>
</head>
<body>
    <div class="mid">
        <img src="../images/title.png">
        <div class="container">
            <form name="login" action="../includes/Dlogin.inc.php" method="post">
               <input type="text" placeholder="Username/Email" name="uname" id="uname" required />
               <input type="password" placeholder="Password" name="psw" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
               <input type="checkbox" onclick="myFunction()" /> Show Password
               <button type="submit" name="submit">Login</button>
            </form>
            <a href="../php/role.php" style="left: 32%">Don't have an account? Sign up</a>
        </div>
        <?php
            if(isset($_GET["error"]))
            {
                if ($_GET["error"]== "emptyinput") {
                    echo "<p>Fill in all fields</p>";
                }
                else if ($_GET["error"]== "invalidlogin") {
                    echo "<p>Username/Email does not exists</p>";
                }
                else if ($_GET["error"]== "invalidpassword") {
                    echo "<p>Incorrect password</p>";
                }
            }
            ?>
    </div>
   
    <script type="text/javascript">
        function myFunction() 
        {
            var x = document.getElementById("psw");
            if (x.type === "password") 
            {
            x.type = "text";
            } 
            else 
            {
            x.type = "password";
            }
        }
        function check(txt)
        {
        var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
        if(txt.value.match(decimal)) 
        {
            alert('Login successful');
            return true;
        }
        }
    </script>
</body>
</html>