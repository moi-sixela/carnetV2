<?php

session_start();
$id_user = $_SESSION['id_user'];

require("../connexion_bdd.php");


if (isset($_POST['nameentrainement'], $_POST['descriptionentrainement'], $_POST['date'])) {
    if (!empty($_POST['nameentrainement'])) {
        $nameEntrainement = htmlspecialchars($_POST['nameentrainement']);
        $description = htmlspecialchars($_POST['descriptionentrainement']);
        $date = htmlspecialchars($_POST['date']);
        $req = $bdd->prepare('INSERT INTO `entrainement`(`id_user`,`name_entrainement`, `description_entrainement`, `date`) VALUES (?,?,?,?)');
        $req->execute(array(
            $id_user,
            $nameEntrainement,
            $description,
            $date
        ));
        header("Location: http://localhost/carnetV2/public/entrainement/entrainement.php");
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
    <title>AddEntrainement</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<style type="text/css">
    a {
        position: fixed;
        left: 10px;
        top: 10px;
        color: white;
    }
</style>

<body>
    <a href="javascript:history.back()"><span class="material-icons" style="font-size:40px">arrow_back</span></a>
    <form action="addentrainement.php" method="post">
        <div>
            <input type="text" id="nameentrainement" name="nameentrainement" required="required" placeholder="Nom de l'entrainement" />
            <input type="text" id="descriptionentrainement" name="descriptionentrainement" placeholder="Description" />
            <input type="date" id="date" name="date" placeholder="Date" />
        </div>
        <input type="submit" value="Envoyer" />
    </form>
</body>

</html>