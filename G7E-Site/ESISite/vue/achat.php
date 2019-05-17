<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 15/05/2019
 * Time: 09:50
 */
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.pack.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <i class="fa fa-check"></i>
    <title>ESI - ACHAT</title>

</head>
<body>
<!-- Bouton retour pour revenir au menu principal -->
<a href="index.php?cible=packs&fonction=pack">
    <div class="retourConteneur">
        <div class="retour">
        </div>
    </div>
</a>
<div class="PackUrgence">
    <br>
    <!-- Logo "engrenage" dans "Gestion des pièces" -->
    <div class="w3-padding w3-xlarge w3-text-orange"> </div>
    PACK URGENCE
    <br><br><br>
    <div class="memeligne"> <!-- div pour dire que le check et la phrase sont sur la même ligne-->
        <div class="BulletPoint"> <!-- div pour la couleur du texte-->
            Vos proches sont en sécurité
        </div>
        <div class="check"> <!-- div pour la couleur du check-->
            <i class="fa fa-check"></i>
        </div>
    </div>
    <br><br>
    <div class="memeligne">
        <div class="BulletPoint1"> <!-- ce div pour le bulletpoint est different car il me permet juste
     d'aggrandir le margin entre le texte et le check dans le css afin d'aligner tout les check-->
            Intervention rapide
        </div>
        <div class="check">
            <i class="fa fa-check"></i>
        </div>
    </div>
    <br><br>
    <div class="memeligne">
        <div class="BulletPoint2">
            Services 7/7 24/24
        </div>
        <div class="check">
            <i class="fa fa-check"></i>
        </div>
    </div>
    <br><br>
    <div class="memeligne">
        <div class="BulletPoint3">
            Prise en charge complète
        </div>
        <div class="check">
            <i class="fa fa-check"></i>
        </div>
    </div>
    <br>
    <br>
    <a href="index.php?cible=achat&utilisateur=achat">
        <div class="Boutonachat1">
            <div class="achat">
                Acheter : &#8364; 29,90
            </div>
        </div>
    </a>
</div>
</body>
</html>
<map name="Liens" id="Liens">
    <area shape="rect" coords="20,10,1000,500" href="pack.php" alt="PACK" />
</map>
