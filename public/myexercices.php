<?php require("connexion_bdd.php");
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

    <table>
        <?php while ($my_exercices = $listExercices->fetch()) { ?>
            <b>
                <?= $my_exercices['name_exercices'] ?>
                <div class="element">
                    <?= $my_exercices['group_muscu'] ?>
                </div>
            </b>
        <?php } ?>



    </table>

    <?php require("navbar.php") ?>

    <button onclick="location.href='addmyexercices.php'" class="button">+</button>

</body>

</html>