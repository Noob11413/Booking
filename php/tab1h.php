<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    h1 {
        position: absolute;
        top: -10px;
        left: 30px;
    }
    .head {
        position: absolute;
        top: 50px;
        left: 30px;
        font-size: 22px;      
    }
    .watch {
        width: 500px;
        position: absolute;
        top: 50px;
        left: 870px;
        font-size: 22px;      
    }
    .controls {
        position: relative;
        top: -5px;
        left: 100px;
    }
    .display {
        position: relative;
        top: -30px;
        left: -130px;
    }
    button {
        background-color: #15138D;
        padding: 5px 20px;
        color: white;
        font-size: 14px;
        border-radius: 8px;
        cursor: pointer;
    }
    </style>
</head>
<body>
<h1>Origin - Destination</h1>
        <h2>(ETD - ETA)</h2>
        <table class="head">
            <tr>
                <td>Route Id - #AABBC01</td>
                <td>Available Seats: #</td>
                <td>Maximum Capacity: #</td>
                <td>Php Fare</td>
            </tr>
            
            <div class="watch">
            <div class="controls">
                <button class="start" id="start">Start Ride</button>
                <button class="stop" style="left: 20px;" id="stop">Stop Ride</button>
                <button class="reset" style="left: 30px;" id="reset">Reset</button>
            </div>
            <div class="display">
                <span class="minutes">00</span>
                <span style="left: 23.5px;">:</span>
                <span class="seconds" style="left: 30px;">00</span>
                <span style="left: 53.5px;">:</span>
                <span class="centiseconds" style="left: 60px;">00</span>
            </div>
            </div>
        </table>

        <script src="timer.js"></script>
</body>
</html>