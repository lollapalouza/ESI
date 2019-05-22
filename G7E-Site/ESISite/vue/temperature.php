<?php
/**
 * Created by PhpStorm.
 * User: mathi
 * Date: 25/04/2019
 * Time: 10:48
 */
/* moyenne de température par semaine */




$lundi = 21;
$mardi = 24;
$mercredi = 19;
$jeudi = 20;
$vendredi = 21;
$samedi = 19;
$dimanche = 23;
$tempmoy = ($lundi+$mardi+$mercredi+$jeudi+$vendredi+$samedi+$dimanche)/7;
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ESI - Quotidien</title>
    <link rel="stylesheet" href="vue/CSS/css.temperature.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>


<body>
<div class="conteneur_total">
    <div class="première">
        <div class="stats">
            <div class="graduation">
                <div>0°</div>
                <div>10°</div>
                <div>20°</div>
                <div>30°</div>
                <div>40°</div>
                <div>50°</div>
            </div>
            <div class="echelle">
                <div class="abscisse">
                </div>
                <div class="ordonnee">
                </div>
            </div>
            <ul>
                <li>Lundi<span class="percent v<?php echo $lundi?>"><?php echo $lundi?>°</span></li>
                <li>Mardi<span class="percent v<?php echo $mardi?>"><?php echo $mardi?>°</span></li>
                <li>Mercredi<span class="percent v<?php echo $mercredi?>"><?php echo $mercredi?>°</span></li>
                <li>Jeudi<span class="percent v<?php echo $jeudi?>"><?php echo $jeudi?>°</span></li>
                <li>Vendredi<span class="percent v<?php echo $vendredi?>"><?php echo $vendredi?>°</span></li>
                <li>Samedi<span class="percent v<?php echo $samedi?>"><?php echo $samedi?>°</span></li>
                <li>Dimanche<span class="percent v<?php echo $dimanche?>"><?php echo $dimanche?>°</span></li>
            </ul>
        </div>
    </div>
    <div class="seconde">
        <p>La température moyenne est de <?php echo $tempmoy ?>°. </p>
    </div>
</div>
</div>
</body>
</html>
