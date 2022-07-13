<?php
require("connexion_bdd.php");
$listExercices = $bdd->query("SELECT * FROM `my_exercices` ORDER BY `group_muscu`,`name_exercices`;");

if (is_array($_POST["checkbox"]) || is_object($_POST["checkbox"])) {
    foreach ($_POST["checkbox"] as $checkoptions) {
        echo nl2br("$checkoptions \n");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddExercices</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        a {
            position: fixed;
            left: 10px;
            top: 10px;
            color: white;
        }

        li {
            width: auto;
            background-color: rgb(57, 57, 57);
            color: white;
            padding: 14px 20px;
            display: block;
            font-family: Verdana, sans-serif;
            left: 20px;
            top: 50px;


        }

        input[type=submit] {
            width: 90%;
            background-color: rgb(31, 152, 251);
            color: white;
            padding: 14px 20px;
            display: block;
            position: sticky;
            bottom: 0;
            margin: 8px;
            margin-left: auto;
            margin-right: auto;
            border: none;
            border-radius: 30px;


        }

        input[type=submit]:hover {
            background-color: rgba(31, 152, 251, 0.742);

        }
    </style>
</head>

<body>
    <a href="javascript:history.back()"><span class="material-icons" style="font-size:40px">arrow_back</span></a>
    <table>
        <form action="" method="post">
            <?php
            while ($my_exercices = $listExercices->fetch()) { ?>

                <li>
                    <input type="checkbox" name="checkbox[]" value="<?= $my_exercices['name_exercices'] ?>">
                    <?= $my_exercices['name_exercices'] ?>
                    <div class="element">
                        <?= $my_exercices['group_muscu'] ?>
                    </div>
                    </input>
                </li>
            <?php } ?>
            <input type="submit" value="Ajouter"></input>

        </form>
    </table>
</body>

</html>