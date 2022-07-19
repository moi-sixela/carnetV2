<?php

require("connexion_bdd.php");
require("verifconnect.php");

$profil = $bdd->query("SELECT * FROM `authentification` WHERE `id_user` = $id_user")->fetch(PDO::FETCH_BOTH);

if (isset($_POST['first_name'], $_POST['last_name'], $_POST['date_naissance'], $_POST['age'])) {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $age = htmlspecialchars($_POST['age']);
    $req = $bdd->prepare('UPDATE `authentification` SET `first_name`,`last_name`,`date_naissance`,`age` VALUES (?,?,?,?)');
    $req->execute(array(
        $first_name,
        $last_name,
        $date_naissance,
        $age
    ));

    header("Location: http://localhost/carnetV2/public/entrainement/entrainement.php");
} else {
    echo "Veuillez remplir tous les champs";
}

echo $date_naissance,
$age;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Profil</title>
    <style type="text/css">
        p {
            font-family: Verdana, sans-serif;
            color: white;
            margin: 10px;
        }

        .name {
            padding: 10px;
        }
    </style>

</head>

<body>

    <?php require("navbar.php") ?>
    <a href="javascript:history.back()"><span class="material-icons" style="font-size:40px; color:white">arrow_back</span></a>
    <form action="" method="post">
        <div>
            <input class="last_name" placeholder="Nom : <?= $profil['last_name'] ?> "></input>
            <input class="first_name" placeholder="Prénom : <?= $profil['first_name'] ?> "></input>
            <input type="date" class="date_naissance" placeholder="Date de naissance : <?= $profil['date_naissance'] ?>"></input>
            <input class="age" placeholder="Age : <?= $profil['age'] ?> "></input>
            <input type="submit" style="width: 10%; background-color: rgb(31, 152, 251); color: white; padding: 14px 20px; display: block; position: relative; margin: 0; margin-left: auto; margin-right: auto; border: none; border-radius: 30px;" value="Modifier"></input>
        </div>

    </form>


</body>

</html>