<?php
require("verifconnect.php");
require("../connexion_bdd.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idExercices = (int)$_GET['id'];
    $ret = $bdd->exec("DELETE FROM `charge_repetition` WHERE `id` = $idExercices");
}



header("Location: ../entrainement/reps.php?id=" . $_GET['idexercice']);
