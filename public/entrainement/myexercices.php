<?php
require("../connexion_bdd.php");
require("../verifconnect.php");
$listExercices = $bdd->query("SELECT * FROM `my_exercices` ORDER BY `group_muscu`,`name_exercices`;");
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
    <?php require("../navbar.php") ?>


    <table>
        <?php
        while ($my_exercices = $listExercices->fetch()) { ?>
            <li>
                <?= $my_exercices['name_exercices'] ?>
                <div class="element">
                    <?= $my_exercices['group_muscu'] ?>
                </div>
            </li>
        <?php } ?>



    </table>


    <button onclick="location.href='entrainement/addmyexercices.php'" class="button">+</button>

</body>

</html>