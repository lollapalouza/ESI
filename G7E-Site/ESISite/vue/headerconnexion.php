<?php
/**
 * Vue : affichage de l'entête inscription et connexion
 */
?>

<!doctype html>

<html>
<head>
    <meta charset="UTF-8">
    <title>ESI - ACCUEIL</title>
    <link rel="stylesheet" type="text/css" href="vue/CSS/css.headerconnexion.css" />
</head>

<body>
<header>
    <div id="conteneur_header"> <!-- Le conteneur -->
        <div class="HeaderPartieGauche" >  <!-- Le logo des reseaux sociaux -->
            <a href="index.php?cible=utilisateur&fonction=AccueilHorsConnexion"><img src="vue/image/logoESI.png" alt="ESI"/></a>
        </div>
        <div class="HeaderPartieDroit"> <!-- Lien pour nous contacter -->
            <a class="inscription" href = "index.php?cible=utilisateur&fonction=inscription">Inscription</a>
            <a class="connexion" href = "index.php?cible=utilisateur&fonction=pageconnexion">Connexion</a>
        </div>
        <div class="BarreHeader"><p></p></div>
    </div>
</header>
</body>

</html>