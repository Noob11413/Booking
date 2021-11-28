<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/png">
    <link rel="stylesheet" href="../css/sidebar.css">
    <title>VHire</title>
    <style>
    </style>
</head>
<body>
    <?php include '../php/header.php'?>
        
    <div id="Navbar" class="sideNav">
        <a href="../php/home.php" id="home">Home</a>
        <a href="../php/route.php" id="route">Route</a>
        <a href="../php/sched.php" id="sched">Schedule</a>
        <a href="../php/ticket.php" id="tic">Tickets</a>
        <a href="../includes/logout.inc.php" style="cursor: pointer;">Logout</a>
    </div>

    <span class="toggle" onclick="toggleNav()">&#9776;</span>

    <script src="../js/toggle.js"></script>
</body>
</html>