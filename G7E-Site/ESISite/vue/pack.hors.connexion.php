<?php
/**
 * Vue : affichages des différents packs disponible et de la gestion de l'abonnement à celui-ci
 */
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.pack.hors.connexion.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>ESI - PACKS</title>

</head>
<body>

<div id="conteneur_header"> <!-- Le conteneur -->
    <div class="HeaderPartieGauche" id="logo">  <!-- Le logo des reseaux sociaux -->
        <a href="index.php?cible=utilisateur&fonction=AccueilHorsConnexion"><img src="vue/image/logoESI.png" alt="ESI"/></a>
    </div>
    <div class="HeaderPartieDroit" id="lien"> <!-- Lien pour nous contacter -->
        <a class="inscription" href = "index.php?cible=utilisateur&fonction=inscription">Inscription</a>
        <a class="connexion" href = "index.php?cible=utilisateur&fonction=pageconnexion">Connexion</a>
    </div>
</div>


<div class="video_container">
    <video autoplay loop>
        <source src="vue/image/test.mp4" type="video/mp4">
        <source src="vue/image/test.ogv" type="video/ogv">
    </video>
</div>



<div class="packs">
    <div class="pack">
        <div class="pack-inner">
            <div class="pack-front">
                <h1>Pack Urgence</h1><br/>
            </div>
            <div class="pack-back">
                <h3>Le pack urgence</h3>
                <p>- garantir la sécurité des proches<br/>
                - intervention rapide<br/>
                - service 24/24</p>
                <h2>29,90 €</h2>
            </div>
        </div>
    </div>
    <div class="pack2">
        <div class="pack2-inner">
            <div class="pack2-front">
                <h1>Pack Sécurité</h1><br/>
            </div>
            <div class="pack2-back">
                <h3>Le pack sécurité</h3>
                <p>- Alerte instantané<br/>
                    - prévention des forces de l'ordre<br/>
                    - Sécurisation du domaine</p>
                <h2>39,90 €</h2>
            </div>
        </div>
    </div>
    <div class="pack3">
        <div class="pack3-inner">
            <div class="pack3-front">
                <h1>Pack Caméra</h1><br/>
            </div>
            <div class="pack3-back">
                <h3>Le pack caméra</h3>
                <p>- Installation des caméras<br/>
                    - Alerte via le smartphone<br/>
                    - Historique des vidéos</p>
                <h2>49,90 €</h2>
            </div>
        </div>
    </div>
</div>

</body>
</html>