<?php
require("connexion_bdd.php");
$query = sprintf("SELECT `poids`,`date` FROM `my_poids`");
$result = $bdd->query($query);

$data = array();

foreach ($result as $row) {

    print(json_encode($row));
}
