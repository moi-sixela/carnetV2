<?php

session_start();
$id_user = $_SESSION['id_user'];
if (empty($id_user)) {
    header("Location:http://localhost/carnetV2/public/");
};
