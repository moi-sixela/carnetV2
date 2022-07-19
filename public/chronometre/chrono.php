<?php
require("verifconnect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=
    , initial-scale=1.0" />

    <link rel="stylesheet" href="./style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Chronomètre</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
            background-color: rgb(57, 57, 57);
        }

        #wrapper {
            padding: 100px;
            border-radius: 30px;
            background-color: white;
        }

        #chrono {
            text-align: center;
            font-size: 100px;
            margin-bottom: 30px;
        }

        button {
            font-size: 25px;
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }

        button:not(:last-child) {
            margin-right: 15px;
        }

        button:nth-child(2) {
            background-color: #dfdfdf;
        }

        button:last-child {
            background-color: #3a6eff;
            color: white;
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
    <div id="wrapper">
        <div id="chrono">00:00:00</div>
        <div id="buttons">
            <button id="reset" class="button">Reset</button>
            <button id="stop" class="button">Arrêter</button>
            <button id="start" class="button">Démarrer</button>
        </div>
    </div>
    <script src="./chrono.js"></script>
</body>

</html>