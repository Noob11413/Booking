<?php
    session_start();
    if(!isset($_SESSION["Dusername"])){
        header("Location: Dindex.php");
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
    <link rel="stylesheet" href="../css/center.css">
    <title>VHire</title>
    <style>
    .middle{
        width: 1519.5px;
        height: 652px;
        position: relative;
        top: 70px;
        left: -10px;
        z-index: 1;
    }
    .tablink {
        background-color: #f3d75b;
        font-weight: bold;
        color: #15138D;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px;
        font-size: 17px;
        width: 20%;
        border-radius: 0px;
    }

    .tablink:hover {
        background-color: #f8cf17;
    }

    .tabcontent {
        height: 504px;
        width: 93.41%;
        color: #15138D;
        display: none;
        padding: 50px;
        text-align: center;
    }
    .scroll {
        background-color: #8cc8fa;
        color: #15138D;
        position: relative;
        top: 40px;
        left: -50px;
        height: 514px;
        width: 1519.5px;
        flex: 1;
        overflow-y: scroll;
    }
    h2 {
        position: absolute;
        top: -2px;
        left: 21%;
        font-weight: lighter;
    }
    p {
        position: absolute;
        top: -20px;
        left: 0px;
    }
    </style>
</head>
<body>
<?php include '../php/header.php'?>
<?php 
            echo "<h1 style='color:white;'>Welcome, ".$_SESSION["fname"]."!</h1>";
        ?>
<div class="middle">
    <div id="t1" class="tabcontent">
    <?php include '../php/tab1h.php'?>
        <div class="scroll">
        <?php include '../php/tab1b.php'?>
        </div>
    </div>
      
    <div id="t2" class="tabcontent">
    <?php include '../php/tab1h.php'?>
        <div class="scroll">
        <?php include '../php/tab1b.php'?>
        </div>
    </div>

    <div id="t3" class="tabcontent">
    <?php include '../php/tab1h.php'?>
        <div class="scroll">
        <?php include '../php/tab1b.php'?>
        </div>
    </div>

    <div id="t4" class="tabcontent">
    <?php include '../php/tab1h.php'?>
        <div class="scroll">
        <?php include '../php/tab1b.php'?>
        </div>
    </div>
      
      <button class="tablink" onclick="openTab('t1', this, '#8cc8fa')" id="defaultOpen">Trip 1</button>
      <button class="tablink" onclick="openTab('t2', this, '#8cc8fa')">Trip 2</button>
      <button class="tablink" onclick="openTab('t3', this, '#8cc8fa')">Trip 3</button>
      <button class="tablink" onclick="openTab('t4', this, '#8cc8fa')">Trip 4</button>
      <button class="tablink" ><a href="../includes/logout.inc.php" style="cursor: pointer; color: #15138D;">Logout</a></button>
      <script>
      function openTab(tab,elmnt,color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(tab).style.display = "block";
        elmnt.style.backgroundColor = color;
      
      }
      document.getElementById("defaultOpen").click();
      
      </script>
         
</body>
</html>