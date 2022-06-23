<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chronomètre</title>
</head>

<body>
    <button class="amrap" type="button" href="chronometre/amrap.php">AMRAP</button>
    <button class="emom" type="button">EMOM</button>
    <button class="tabata" type="button">TABATA</button>
    <button class="chrono" type="button" onclick="location.href='chronometre/chrono.php'">CHRONO</button>
    <button class="timer" type="button" onclick="location.href='chronometre/timer.php'">TIMER</button>


    <?php require("navbar.php") ?>


</body>

</html>