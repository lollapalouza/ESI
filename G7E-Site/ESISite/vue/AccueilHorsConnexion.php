<!doctype html>
<html>
<head>
    <!-- Liens utiles pour les logos -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.accueilHorsConnexion.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <!-- Titre de la page -->

    <title>ESI - Bienvenue</title>

</head>

<body>

<div class="conteneur_total">

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

    <div class="presentation">

        <h1> Révolutionnez votre quotidien </h1>
        <br/>
        <h2> et entrez dans une <em><strong> nouvelle dimension</strong></em></h2>
        <br/>
        <h3> avec </h3>
        <div class="image_ESI" align="center"><img id="Logo" src="vue/image/logoESI.png" alt="icone logo"/></div>
    </div>

    <div class="video_container">
        <video autoplay loop>
            <source src="vue/image/test.mp4" type="video/mp4">
            <source src="vue/image/test.ogv" type="video/ogv">
        </video>
    </div>


</div>

</body>

</html>