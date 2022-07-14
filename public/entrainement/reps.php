<?php

require("connexion_bdd.php");
$listPoidsCharge = $bdd->query("SELECT * FROM `charge_repetition`;");

$idExercices = (int)$_GET['id'];
if (isset($_POST['repetitions'], $_POST['charges'])) {
    if (!empty($_POST['repetitions']) && !empty($_POST['charges'])) {
        $repetitions = htmlspecialchars($_POST['repetitions']);
        $charges = htmlspecialchars($_POST['charges']);
        $req = $bdd->prepare('INSERT INTO `charge_repetition`(`id_exercices`,`charges`,`repetitions`) VALUES (?,?,?)');
        $req->execute(array(
            $idExercices,
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
    <link rel="stylesheet" href="http://localhost/carnetV2/public/mesures/mesures.css">
</head>

<body>
</body>
<?php require("navbar.php") ?>


<form action="reps.php?id=<?= $_GET['id'] ?>" method="post" class="form-inline">
    <input type="int" id="int" placeholder="Nombre de répétitions" name="repetitions">
    <input type="int" id="int" placeholder="Poids (en kg)" name="charges">
    <button type="submit">Submit</button>
</form>
<table>
    <table>
        <?php
        while ($charge_repetition = $listPoidsCharge->fetch()) { ?>
            <a type="text">
                <?= $charge_repetition['repetitions'] ?>x</span><?= $charge_repetition['charges'] ?> kg


            </a>
        <?php } ?>



    </table>


</table>

</html>