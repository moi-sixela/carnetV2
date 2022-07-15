<?php

require("../connexion_bdd.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idEntrainement = (int)$_GET['id'];
    $ret = $bdd->exec("DELETE FROM `entrainement` WHERE `id` = $idEntrainement");
}



header("Location: ../entrainement/entrainement.php");
