<?php

require("../verifconnect.php");

require("../connexion_bdd.php");
$listPoids = $bdd->query("SELECT * FROM `my_height` WHERE `id_user` = $id_user ORDER BY `date` DESC;");


if (isset($_POST['date'], $_POST['height'])) {
    if (!empty($_POST['date']) && !empty($_POST['height'])) {
        $date = htmlspecialchars($_POST['date']);
        $height = htmlspecialchars($_POST['height']);
        $req = $bdd->prepare('INSERT INTO `my_height`(`id_user`,`date`,`height`) VALUES (?,?,?)');
        $req->execute(array(
            $id_user,
            $date,
            $height



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
    <link rel="stylesheet" href="mesures.css">
    <title>Taille</title>
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
                url: "http://localhost/carnetV2/public/mesures/heightgraph.php",
                type: "GET",
                success: function(data) {
                    console.log(data)


                    var dateTaille = [];
                    var taille = [];

                    var val = JSON.parse(data);

                    for (var i in val) {

                        taille.push(val[i].height
                        )
                        dateTaille.push(val[i].date)

                    }

                    var chartdata = {
                        labels: dateTaille,
                        datasets: [{
                            label: "taille",
                            fill: false,
                            backgroundColor: [
                                'rgb(65,105,225)',
                            ],
                            borderColor: ['rgb(65,105,225)'],
                            data: taille
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


    <form action="height.php" method="post" class="form-inline">
        <input type="date" id="date" placeholder="Date" name="date">
        <input type="int" id="int" placeholder="Taille (en cm)" name="height">
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
                    <?= $my_poids['date'] ?><span style="padding-left:70px;"></span><?= $my_poids['height'] ?> cm

                </a>
            <?php } ?>



        </table>


    </table>
</body>

</html>