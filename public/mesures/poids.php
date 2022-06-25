<?php

require("connexion_bdd.php");
$listPoids = $bdd->query("SELECT * FROM `my_poids` ORDER BY `date`,`poids`;");


if (isset($_POST['date'], $_POST['poids'])) {
    if (!empty($_POST['date']) && !empty($_POST['poids'])) {
        $date = htmlspecialchars($_POST['date']);
        $poids = htmlspecialchars($_POST['poids']);
        $req = $bdd->prepare('INSERT INTO `my_poids`(`date`,`poids`) VALUES (?,?)');
        $req->execute(array(
            $date,
            $poids



        ));
        header("Refresh:0");
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
    <link rel="stylesheet" href="mesures.css">
    <title>Poids</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script src="http://localhost/carnetV2/node_modules/chart.js"></script>
    <style type="text/css">
        canvas {
            width: 1000px;
            height: 100%;
            margin: auto;
            padding: 0;
            border: none;
            background-color: rgb(20, 20, 20);
        }
    </style>
</head>

<body>
    <?php require("navbar.php") ?>
    <div type="canvas">
        <canvas id="mycanvas"></canvas>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "http://localhost/carnetV2/public/mesures/poidsgraph.php",
                type: "GET",
                success: function(data) {
                    console.log(data)
                    var date = [];
                    var poids = [];

                    for (var i in data) {

                        date.push("d" + data[i].date)
                        poids.push(data[i].poids)
                    }
                    var chartdata = {
                        labels: date,
                        datasets: [{
                            label: "poids",
                            fill: false,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                            ],
                            data: poids
                        }]
                    }
                    const ctx = document.getElementById('mycanvas').getContext('2d');

                    var mycanvas = new Chart(ctx, {
                        type: 'line',
                        data: chartdata
                    })
                },
                error: function(data) {}
            });
        });
    </script>


    <form action="poids.php" method="post" class="form-inline">
        <input type="date" id="date" placeholder="Date" name="date">
        <input type="int" id="int" placeholder="Poids (en kg)" name="poids">
        <button type="submit">Submit</button>
    </form>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <table>
        <table>
            <?php
            while ($my_poids = $listPoids->fetch()) { ?>
                <a type="text">
                    <?= $my_poids['date'] ?><span style="padding-left:70px;"></span><?= $my_poids['poids'] ?> kg

                </a>
            <?php } ?>



        </table>


    </table>
</body>

</html>