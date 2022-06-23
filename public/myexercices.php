<?php require("connexion_bdd.php");
$listExercices = $bdd->query("SELECT `name_exercices` FROM `my_exercices`;");
$listGroupmuscu = $bdd->query("SELECT `group_muscu` FROM `my_exercices`;");
$listId = $bdd->query("SELECT `id_exercices` FROM `my_exercices`;");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>


</head>

<body>

    <table>

        <?php 
            while ($my_exercices = $listGroupmuscu->fetch()) { ?>
            <b type=exo class="button" href="#">
                <?= $my_exercices['name_exercices'] ?>
            </b>
        <?php } ?>

    </table>

    <?php require("navbar.php") ?>

    <button onclick="location.href='addmyexercices.php'" class="button">+</button>

</body>

</html>