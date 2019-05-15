<?php
/* choix entre l'achat de pack ou la slection des fonctionnalités un pack */
?>

<!doctype html>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.pack.css"/>
    <link rel="stylesheet" type="text/css" href="vue/CSS/css.achat_selection_pack.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <i class="fa fa-check"></i>
</head>

<body>

<!-- Bouton retour pour revenir au menu principal -->
<a href="index.php?cible=utilisateur&fonction=accueil">
    <div class="retourConteneur">
        <div class="retour">
        </div>
    </div>
</a>

<div class="conteneur_total">
    <div class="conteneur_interne">
        <div class="ligne">
                <div class="bloc_exte">
                    <a href="index.php?cible=tutoriel&fonction=tutoriel">
                    <div class="bloc">
                        <div class="w3-padding w3-xlarge">
                            <i class="fa fa-video-camera" style="font-size:58px;color:orange"></i>
                        </div>
                        <div class="interne">Tutoriel</div>
                    </div>
                </div>
            </a>

            <a href="index.php?cible=tutoriel&fonction=FAQ">
                <div class="bloc_exte">
                    <div class="bloc">
                        <div class="w3-padding w3-xlarge">
                            <i class="fa fa-question-circle" style="font-size:58px;color:orange"></i>
                        </div>
                        <div class="interne">FAQ</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
</body>