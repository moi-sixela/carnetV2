<?php

require("../verifconnect.php");

require("../connexion_bdd.php");


if (isset($_POST['name_exercices'], $_POST['group_muscu'], $_POST['type'], $_POST['description_exercices'])) {
    if (!empty($_POST['name_exercices']) && !empty($_POST['group_muscu']) && !empty($_POST['type'])) {
        $nameExercices = htmlspecialchars($_POST['name_exercices']);
        $description_exercices = htmlspecialchars($_POST['description_exercices']);
        $groupMuscu = htmlspecialchars($_POST['group_muscu']);
        $type = htmlspecialchars($_POST['type']);
        $req = $bdd->prepare('INSERT INTO `my_exercices`(`name_exercices`,`description_exercices`,`group_muscu`,`type`) VALUES (?,?,?,?)');
        $req->execute(array(
            $nameExercices,
            $description_exercices,
            $groupMuscu,
            $type


        ));
        header("Location: http://localhost/carnetV2/public/myexercices.php");
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
    <title>AddExercise</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <a type=button href="../myexercices.php"><span class="material-icons" style="font-size:40px">arrow_back</span></a>
    <form action="addmyexercices.php" method="post">
        <input type="text" id="name_exercices" name="name_exercices" required="required" placeholder="Nom de l'exercice" />
        <input type="text" id="description_exercices" name="description_exercices" placeholder="Description" />
        <select name="group_muscu" id="group_muscu" required="required" >
            <option value="">--- Choisir une groupe musculaire ---</option>
            <option value="Biceps">Biceps</option>
            <option value="Triceps">Triceps</option>
            <option value="Jambes">Jambes</option>
            <option value="Dos">Dos</option>
            <option value="Abdominaux">Abdominaux</option>
            <option value="Deltoides">Deltoides</option>
            <option value="Pectoraux">Pectoraux</option>
            <option value="Autres">Autres</option>
        </select>
        <select name="type" id="type" required="required">
            <option value="">--- Choisir un type ---</option>
            <option value="Charge et répétition">Charge et répétition</option>
            <option value="Temps">Temps</option>
            <input type="submit" value="Envoyer" />
    </form>


</body>

</html>