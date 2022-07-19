<?php

require("../verifconnect.php");

require("../connexion_bdd.php");
$listPoids = $bdd->query("SELECT * FROM `my_poids` WHERE `id_user` = $id_user ORDER BY `date` DESC;");


if (isset($_POST['date'], $_POST['poids'])) {
    if (!empty($_POST['date']) && !empty($_POST['poids'])) {
        $date = htmlspecialchars($_POST['date']);
        $poids = htmlspecialchars($_POST['poids']);
        $req = $bdd->prepare('INSERT INTO `my_poids`(`id_user`,`date`,`poids`) VALUES (?,?,?)');
        $req->execute(array(
            $id_user,
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
            background-color: white;
        }
    </style>
</head>

<body>
    <?php require("../navbar.php") ?>
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


                    var datePoids = [];
                    var poids = [];

                    var val = JSON.parse(data);

                    for (var i in val) {

                        poids.push(val[i].poids)
                        datePoids.push(val[i].date)

                    }

                    var chartdata = {
                        labels: datePoids,
                        datasets: [{
                            label: "poids",
                            fill: false,
                            backgroundColor: [
                                'rgb(65,105,225)',
                            ],
                            borderColor: ['rgb(65,105,225)'],
                            data: poids
                        }]
                    }
                    var ctx = $("#mycanvas");
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