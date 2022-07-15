<?php

require("../connexion_bdd.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idExercices = (int)$_GET['id'];
    $ret = $bdd->exec("DELETE FROM `exercices_entrainement` WHERE `id` = $idExercices");
}
echo $_GET['idexercice'];
echo $_GET['id'];


header("Location: ../entrainement/exercices.php?id=" . $_GET['idexercice']);

