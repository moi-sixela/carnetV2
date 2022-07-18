<?php

session_start();
$id_user = $_SESSION['id_user'];

require("../connexion_bdd.php");

$listEntrainement = $bdd->query("SELECT * FROM `entrainement` WHERE `id_user` = $id_user ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Entrainement</title>
    <style type="text/css">
        li {
            width: auto;
            background-color: rgb(57, 57, 57);
            color: white;
            padding: 14px 20px;
            display: block;
            cursor: pointer;
            border: 1px solid rgb(27, 26, 26);
            left: 0;
            top: 0;
            font-family: Verdana, sans-serif;

        }
    </style>


</head>

<body>

    <?php require("../navbar.php") ?>

    <?php while ($entrainement = $listEntrainement->fetch()) { ?>
        <li class="button" onclick="location.href='exercices.php?id=<?= $entrainement['id'] ?>'">
            <?= $entrainement['name_entrainement'] ?> - <?= $entrainement['date'] ?>
            <div class="element">
                <?= $entrainement['description_entrainement'] ?>
            </div>
            <a class="right" href="deleteentrainement.php?id=<?= $entrainement['id'] ?>"><span class="material-icons" style="font-size:auto; color:#ff0000">cancel</span></a>
        </li>
    <?php } ?>



    <button onclick="location.href='addentrainement.php'" class="button">+</button>

</body>

</html>