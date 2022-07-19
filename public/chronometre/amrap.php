<?php
require("verifconnect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Timer</title>
    <style type="text/css">
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
            background-color: rgb(57, 57, 57);
        }

        .timer {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: white;
            text-align: center;
            font-size: 100px;
            margin-bottom: 30px;
            border-radius: 30px;
        }

        .timer__part {
            font-size: 60px;
            font-weight: bold;
        }

        .timer__btn {
            width: 50px;
            height: 50px;
            margin-left: 16px;
            border-radius: 50%;
            border: none;
            color: white;
            background: #8208e6;
            cursor: pointer;
        }

        .timer__btn--start {
            background: #00b84c;
        }

        .timer__btn--stop {
            background: #ff0256;
        }

        a {
            position: fixed;
            left: 10px;
            top: 10px;
            color: white;
        }
    </style>
</head>

<body>
    <a href="javascript:history.back()"><span class="material-icons" style="font-size:40px">arrow_back</span></a>
    <div class="timer">
        <span class="timer__part timer__part -- minutes">00</span>
        <span class="timer__part">:</span>
        <span class="timer__part timer__part -- seconds">00</span>
        <button type="button" class="timer__btn timer__btn -- control timer__btn -- start">
            <span class="material-icons">play_arrow</span>
        </button>
        <button type="button" class="timer__btn timer__btn -- reset">
            <span class="material-icons">timer</span>
        </button>
    </div>
    <script src="timer.js" type="module"></script>
</body>

</html>

</html>