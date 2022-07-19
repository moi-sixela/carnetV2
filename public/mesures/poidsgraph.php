<?php

require("verifconnect.php");

require("../connexion_bdd.php");
$query = sprintf("SELECT `poids`,`date` FROM `my_poids` WHERE `id_user` = $id_user ORDER BY `date`");
$results = $bdd->query($query);
$data = array();
while ($result = $results->fetch(PDO::FETCH_ASSOC)) {
    array_push($data, $result);
}
print(json_encode($data));
