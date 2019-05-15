<?php
session_start();

if(isset($_POST['formdeconnexion'])){
    session_destroy();
    header('Location: index.php?cible=utilisateur&fonction=AccueilHorsConnexion');
}
?>

<!doctype html>

<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="vue/CSS/css.header.connecte.css" />
</head>

<body>
<header>
    <div class="BarreHeader"></div>
    <div class="conteneur">
        <div class="header_gauche">
            <a href="index.php?cible=utilisateur&fonction=accueil"><img src="vue/image/logoESI.png" alt="Logosociaux" /></a>
        </div>
        <div class="header_droit">
            <nav class="menu">
                <form method="POST" action="">
                    <section class="categorie">
                        <div class="nom"><?php echo $_SESSION['pseudo']?></div>
                        <ul>
                            <li><a href="index.php?cible=utilisateur&fonction=changerprofil">Profil</a></li>
                            <li><a href="#">Item 1</a></li>
                            <li><input class="formHeader" type="submit" name="formdeconnexion" value="Déconnexion" /></li>
                        </ul>
                    </section>
                </form>
            </nav>
            <img src="vue/image/IconeConnexion.png" alt="icône logo" />
        </div>
    </div>
</header>
</body>
</html>