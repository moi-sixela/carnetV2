<?php

require("../connexion_bdd.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idEntrainement = (int)$_GET['id'];
    $ret = $bdd->exec("DELETE FROM `entrainement` WHERE `id` = $idEntrainement");
    $ret = $bdd->exec("DELETE FROM `exercices_entrainement` WHERE `id_entrainement` = $idEntrainement");
    $ret = $bdd->exec("DELETE FROM `charge_repetition` WHERE `id_entrainement` = $idEntrainement");
}



header("Location: ../entrainement/entrainement.php");
