<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mesures.css">
    <title>Poids</title>
</head>

<body>
    <?php require("navbar.php") ?>
    <form class="form-inline" action="/action_page.php">
        <input type="date" id="date" placeholder="Date" name="date">
        <input type="int" id="int" placeholder="Poids (en kg)" name="poids">
        <button type="submit">Submit</button>
    </form>
</body>

</html>