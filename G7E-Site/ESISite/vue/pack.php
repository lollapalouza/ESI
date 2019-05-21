<?php
/**
 * Vue : affichages des différents packs disponible et de la gestion de l'abonnement à celui-ci
 */
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.pack.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <i class="fa fa-check"></i>
    <title>ESI - PACKS</title>

</head>
<body>
<!-- Bouton retour pour revenir au menu principal -->
<a href="index.php?cible=utilisateur&fonction=accueil">
    <div class="retourConteneur">
        <div class="retour">
        </div>
    </div>
</a>
<!-- Ici on s'occupe de remplir la premiere case du pack urgence. les balises div permettent
ici de separer les différents composants de cette case afin de pouvoir modifier/differencier les couleurs
du titre des bullets point et des logos checks-->
<div id ="PremiereLigne">
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
        <a href="index.php?cible=achats&fonction=achat&pack=29.90">
            <div class="Boutonachat1">
                <div class="achat">
                    Acheter : &#8364; 29,90
                </div>
            </div>
        </a>
    </div>


    <div class="PackSecurite">
        <!-- Logo "home" dans "Etat de la Maison" -->
        <br>
        <div class="w3-padding w3-xlarge w3-text-orange">
        </div>
        PACK SÉCURITÉ
        <br><br><br>
        <div class="memeligne">
            <div class="BulletPoint4"> <!-- div pour la couleur du texte-->
                Alerte instantanée en cas d'intrusion
            </div>
            <div class="check"> <!-- div pour la couleur du check-->
                <i class="fa fa-check"></i>
            </div>
        </div>
        <br><br>
        <div class="memeligne">
            <div class="BulletPoint5"> <!-- ce div pour le bulletpoint est different car il me permet juste d'aggrandir
        le margin entre le texte et le check dans le css afin d'aligner tout les check-->
                Prévention des forces de l'ordre
            </div>
            <div class="check">
                <i class="fa fa-check"></i>
            </div>
        </div>
        <br><br>
        <div class="memeligne">
            <div class="BulletPoint6">
                Services 7/7 24/24
            </div>
            <div class="check">
                <i class="fa fa-check"></i>
            </div>
        </div>
        <br><br>
        <div class="memeligne">
            <div class="BulletPoint7">
                Sécurisation du domaine
            </div>
            <div class="check">
                <i class="fa fa-check"></i>
            </div>
        </div>
        <br>
        <br>
        <a href="index.php?cible=achats&fonction=achat&pack=39.90">
            <div class="Boutonachat3">
                <div class="achat">
                    Acheter : &#8364; 39,90
                </div>
            </div>
        </a>
    </div>



    <div class="PackCamera">
        <br>
        <!-- Logo PACK -->
        <div class="w3-padding w3-xlarge w3-text-orange">
        </div>
        PACK CAMÉRA
        <br><br><br>
        <div class="memeligne">
            <div class="BulletPoint8"> <!-- div pour la couleur du texte-->
                Caméra activée en cas d'intrusion
            </div>
            <div class="check"> <!-- div pour la couleur du check-->
                <i class="fa fa-check"></i>
            </div>
        </div>
        <br><br>
        <div class="memeligne">
            <div class="BulletPoint9"> <!-- ce div pour le bulletpoint est different car il me permet juste d'aggrandir
        le margin entre le texte et le check dans le css afin d'aligner tout les check-->
                Alerte instantanée sur votre appareil
            </div>
            <div class="check">
                <i class="fa fa-check"></i>
            </div>
        </div>
        <br><br>
        <div class="memeligne">
            <div class="BulletPoint10">
                Services 7/7 24/24
            </div>
            <div class="check">
                <i class="fa fa-check"></i>
            </div>
        </div>
        <br><br>
        <div class="memeligne">
            <div class="BulletPoint11">
                Enregistrement dans la base de données
            </div>
            <div class="check">
                <i class="fa fa-check"></i>
            </div>
        </div>
        <br>
        <br>
        <a href="index.php?cible=achats&fonction=achat&pack=49.90">
            <div class="Boutonachat3">
                <div class="achat">
                    Acheter : &#8364; 49,90
                </div>
            </div>
        </a>
    </div>
</div>
</body>
</html>
<map name="Liens" id="Liens">
    <area shape="rect" coords="20,10,1000,500" href="pack.php" alt="PACK" />
</map>
