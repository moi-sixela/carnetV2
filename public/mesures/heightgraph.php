<?php

session_start();
$id_user = $_SESSION['id_user'];

require("../connexion_bdd.php");
$query = sprintf("SELECT `height`,`date` FROM `my_height` WHERE `id_user` = $id_user ORDER BY `date`");
$results = $bdd->query($query);
$data = array();
while ($result = $results->fetch(PDO::FETCH_ASSOC)) {
    array_push($data, $result);
}
print(json_encode($data));
