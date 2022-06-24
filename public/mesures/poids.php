<?php

require("connexion_bdd.php");
$listPoids = $bdd->query("SELECT * FROM `my_poids` ORDER BY `date`,`poids`;");



if (isset($_POST['date'], $_POST['poids'])) {
    if (!empty($_POST['date']) && !empty($_POST['poids'])) {
        $date = htmlspecialchars($_POST['date']);
        $poids = htmlspecialchars($_POST['poids']);
        $req = $bdd->prepare('INSERT INTO `my_poids`(`date`,`poids`) VALUES (?,?)');
        $req->execute(array(
            $date,
            $poids



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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mesures.css">
    <title>Poids</title>
</head>

<body>
    <?php require("navbar.php") ?>
    <form action="poids.php" method="post" class="form-inline">
        <input type="date" id="date" placeholder="Date" name="date">
        <input type="int" id="int" placeholder="Poids (en kg)" name="poids">
        <button type="submit">Submit</button>
    </form>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <table>
        <table>
            <?php
            while ($my_poids = $listPoids->fetch()) { ?>
                <a type="text">
                    <?= $my_poids['date'] ?><span style="padding-left:70px;"></span><?= $my_poids['poids'] ?> kg

                </a>
            <?php } ?>



        </table>


    </table>
</body>

</html>