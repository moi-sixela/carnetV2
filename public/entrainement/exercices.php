<?php

require("../connexion_bdd.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idExercices = (int)$_GET['id'];
    $listExercices = $bdd->query("SELECT * FROM `exercices_entrainement` WHERE `id_entrainement` = $idExercices;");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Exercices</title>
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



    <?php while ($exercices = $listExercices->fetch()) { ?>
        <li class="button" onclick="location.href='reps.php?id=<?= $exercices['id'] ?>'">
            <?= $exercices['name_exercices'] ?>
            <a class="right" href="deleteexercices.php?idexercice=<?= $_GET['id'] ?>&id=<?= $exercices['id'] ?>"><span class="material-icons" style="font-size:auto; color:#ff0000">cancel</span></a>

        </li>

    <?php } ?>


    <button onclick="location.href='addexercices.php?id=<?= $_GET['id'] ?>'" class="button">+</button>
</body>

</html>