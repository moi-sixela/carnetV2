<?php
require("../verifconnect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body {
            background-color: rgb(57, 57, 57);
            margin: 0;

        }

        .element {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
            font-weight: 100;
            color: rgb(182, 179, 179);
            font-size: 10px;
            font-family: Verdana, sans-serif;

        }

        a.button {
            width: auto;
            background-color: rgb(57, 57, 57);
            color: white;
            padding: 14px 20px;
            display: block;
            cursor: pointer;
            position: relative;
            font-family: Verdana, sans-serif;
            text-decoration: none;

        }
    </style>
</head>

<body>
    <?php require("../navbar.php") ?>

    <a class="button" type="button" href="mesures/poids.php">Poids</a>
    <a class="button" type="button" href="mesures/height.php">Taille</a>




</body>

</html>