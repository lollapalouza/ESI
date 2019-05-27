<!doctype html>
<html>
<head>
    <!-- Liens utiles pour les logos -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.accueilHorsConnexion.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">




    <!-- Titre de la page -->

    <title>ESI - Bienvenue</title>

</head>

<body>

<div class="conteneur_total">

    <div id="conteneur_header"> <!-- Le conteneur -->
        <div class="HeaderPartieGauche" id="logo">  <!-- Le logo des reseaux sociaux -->
            <a href="index.php?cible=utilisateur&fonction=AccueilHorsConnexion"><img src="vue/image/logoESI.png" alt="ESI"/></a>
        </div>
        <div class="HeaderPartieDroit" id="lien"> <!-- Lien pour nous contacter -->
            <a class="inscription" href = "index.php?cible=utilisateur&fonction=inscription">Inscription</a>
            <a class="connexion" href = "index.php?cible=utilisateur&fonction=pageconnexion">Connexion</a>
        </div>
    </div>

    <script>
        apparition = function(id){
            setTimeout(function() {var elmt = document.getElementById(id); elmt.style.opacity = 1;}, 2000);
        };
        onload = apparition("logo");
        onload = apparition("lien")
    </script>

    <div class="video_container">
        <video autoplay loop>
            <source src="vue/image/test.mp4" type="video/mp4">
            <source src="vue/image/test.ogv" type="video/ogv">
        </video>
    </div>


</div>

</body>

</html>