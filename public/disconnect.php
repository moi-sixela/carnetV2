<?php
session_start();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Déconnexion</title>
</head>

<style type="text/css">
    button {
        background-color: rgb(31, 152, 251);
        float: left;
        top: 0;
        border-radius: 30%;
        position: relative;

    }
</style>

<body>

    <p style="color:white;"> Vous êtes déconnecter </p>
    <button onclick="location.href='http://localhost/carnetV2/public/'">OK</button>

</body>

</html>