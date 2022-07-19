<?php

require("../verifconnect.php");

require("../connexion_bdd.php");

$addition = 0;
$idExercices = (int)$_GET['id'];
$idEntrainement = (int)$_GET['identrainement'];
$listPoidsCharge = $bdd->query("SELECT * FROM `charge_repetition` WHERE `id_exercices`= $idExercices AND `id_user` = $id_user");
$date = $bdd->query("SELECT * FROM `entrainement` WHERE `id`= $idEntrainement");

if (isset($_POST['repetitions'], $_POST['charges'])) {
    if (!empty($_POST['repetitions']) && !empty($_POST['charges'])) {
        $repetitions = htmlspecialchars($_POST['repetitions']);
        $charges = htmlspecialchars($_POST['charges']);
        $req = $bdd->prepare('INSERT INTO `charge_repetition`(`id_user`,`id_exercices`,`id_entrainement`,`charges`,`repetitions`) VALUES (?,?,?,?,?)');
        $req->execute(array(
            $id_user,
            $idExercices,
            $idEntrainement,
            $charges,
            $repetitions



        ));
        header("Refresh:0");
    } else {
        echo "Veuillez remplir tous les champs";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <link rel="stylesheet" href="reps.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
</body>

<?php require("../navbar.php") ?>

<a type=button href="exercices.php?id=<?= $idEntrainement ?>"><span class="material-icons" style="font-size:40px">arrow_back</span></a>
<form action="reps.php?id=<?= $_GET['id'] ?>&identrainement=<?= $idEntrainement ?>" method="post" class="form-inline">
    <input type="int" id="int" placeholder="Nombre de répétitions" name="repetitions">
    <input type="int" id="int" placeholder="Poids (en kg)" name="charges">
    <button type="submit">Submit</button>
</form>
<table>
    <table>
        <?php
        while ($charge_repetition = $listPoidsCharge->fetch()) { ?>
            <li type="text">
                <div class="element" type="text" <?= $repetition = $charge_repetition['repetitions'] ?> <?= $charge = $charge_repetition['charges'] ?> <?= $multiplication = $charge * $repetition ?><?= $addition = $multiplication + $addition ?>></div>
                <?= $charge_repetition['repetitions'] ?>x<?= $charge_repetition['charges'] ?> kg
                <a class="right" href="deletechargerepetition.php?idexercice=<?= $_GET['id'] ?>&id=<?= $charge_repetition['id'] ?>"><span class="material-icons" style="font-size:auto; color:#ff0000">cancel</span></a>
            </li>
        <?php } ?>
        <div class="element" style="margin:30px" type="text">Poids total : <?= $addition ?> kg</div>
        <?php
        while ($dates = $date->fetch()) {
            $date_entrainement = $dates['date'];
        }
        if (isset($addition)) {
            $id = $_GET["id"];
            $id_entrainement = $idEntrainement;
            $poids_total = htmlspecialchars($addition);
            $req = $bdd->prepare('UPDATE `exercices_entrainement` SET `poids_total`=?, `date`=?   WHERE `id`=? AND `id_entrainement`=? ');
            $req->execute(array(
                $poids_total,
                $date_entrainement,
                $id,
                $id_entrainement

            ));
        };

        ?>
    </table>

</table>

</html>