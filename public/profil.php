<?php

require("connexion_bdd.php");
require("verifconnect.php");

$profil = $bdd->query("SELECT * FROM `authentification` WHERE `id_user` = $id_user")->fetch(PDO::FETCH_BOTH);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Profil</title>
    <style type="text/css">
        p {
            font-family: Verdana, sans-serif;
            color: white;
            margin: 10px;
        }

        .name {
            padding: 10px;
        }
    </style>

</head>

<body>

    <?php require("navbar.php") ?>
    <div class="name">
        <p class="last_name">Nom : <?= $profil['last_name'] ?></p>
        <p class="first_name">Prénom : <?= $profil['first_name'] ?></p>
        <p class="date_naissance">Date de naissance : <?= $profil['date_naissance'] ?></p>
        <p class="age">Age : <?= $profil['age'] ?></p>
        <!-- <a class="edit" style="color:white" href="http://localhost/carnetV2/public/modifprofil.php"><span class="material-icons">edit</span></a> -->
    </div>


</body>

</html>