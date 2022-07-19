<?php

require("../verifconnect.php");
require("../connexion_bdd.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idExercices = (int)$_GET['id'];
    $listExercices = $bdd->query("SELECT * FROM `exercices_entrainement` WHERE `id_entrainement` = $idExercices AND `id_user` = $id_user ");
    $listEntrainement = $bdd->query("SELECT * FROM `entrainement` WHERE `id` = $idExercices AND `id_user` = $id_user");
}
if (isset($_POST['descriptiongenerale'])) {
    if (!empty($_POST['descriptiongenerale'])) {
        $id = $_GET["id"];
        $descriptiongenerale = htmlspecialchars($_POST['descriptiongenerale']);
        $req = $bdd->prepare('UPDATE `entrainement` SET `descriptiongenerale`=? WHERE `id`=?');
        $req->execute(array(
            $descriptiongenerale,
            $id



        ));
        header("Location: http://localhost/carnetV2/public/entrainement/exercices.php?id=$_GET[id]");
    }
};
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

        form {
            padding-top: 30px;
            left: auto;
        }

        textarea {
            background-color: rgb(29, 25, 25);
            color: white;
            width: 99.5%;
            height: 100px;
            margin-left: auto;
            margin-right: auto;
        }

        input[type="submit"] {
            background-color: rgb(31, 152, 251);
            color: white;
            width: auto;
            height: auto;

        }
    </style>
</head>

<body>
    <?php require("../navbar.php") ?>



    <?php while ($exercices = $listExercices->fetch()) { ?>
        <li class="button" onclick="location.href='reps.php?id=<?= $exercices['id'] ?>&identrainement=<?= $_GET['id'] ?>'">
            <?= $exercices['name_exercices'] ?>
            <a class="right" href="deleteexercices.php?idexercice=<?= $_GET['id'] ?>&id=<?= $exercices['id'] ?>"><span class="material-icons" style="font-size:auto; color:#ff0000">cancel</span></a>

        </li>

    <?php } ?>
    <?php while ($entrainement = $listEntrainement->fetch()) { ?>
        <form action="exercices.php?id=<?= $_GET['id'] ?>" method="post">
            <div>
                <textarea id="descriptiongenerale" name="descriptiongenerale" rows="5" cols="33" placeholder="Description de séance"><?= $entrainement['descriptiongenerale'] ?></textarea>
                <input type="submit" value="Envoyer" style="float:right" />
            </div>

        </form>
    <?php } ?>


    <button onclick="location.href='addexercices.php?id=<?= $_GET['id'] ?>'" class="button">+</button>
</body>

</html>