<?php
/** page d'accueil */

if(isset($_SESSION['maison'])){
    $maison = $_SESSION['maison'];
}
else{
    $maison = "";
}

?>

<!doctype html>
<html>
<head>
    <!-- Liens utiles pour les logos -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.accueil.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <!-- Titre de la page -->
    <title>ESI - Bienvenue <?php echo $_SESSION['pseudo']?></title>

</head>
<body>

    <div class="conteneur_total">
        <div class="bienvenue">Bienvenue <?php echo $_SESSION['pseudo']?></div>
        <div class="conteneur_interne">
            <div class="ligne">
                <a href="index.php?cible=capteur&fonction=gestion.piece">
                <div class="bloc_exte">
                    <div class="bloc">
                        <div class="w3-padding w3-xlarge">
                            <i class="fa fa-gear" style="font-size:40px;color:orange"></i>
                        </div>
                        <div class="interne">
                            Gestion des pièces</div>
                    </div>
                </div>
                <a/>
                <div class="bloc_exte">
                    <div class="bloc">
                        <div class="w3-padding w3-xlarge">
                            <i class="fa fa-check-circle" style="font-size:38px;color:orange"></i>
                        </div>
                        <div class="interne">État de la maison</div>
                    </div>
                </div>

                <a href="index.php?cible=packs&fonction=pack">
                    <div class="bloc_exte">
                        <div class="bloc">
                            <div class="w3-padding w3-xlarge">
                                <i class="fa fa-file-text" style="font-size:38px;color:orange"></i>
                            </div>
                            <div class="interne">Packs</div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="ligne">
                <a href="index.php?cible=utilisateur&fonction=statistiques">
                    <div class="bloc_exte">
                        <div class="bloc">
                            <div class="w3-padding w3-xlarge">
                                <i class="fa fa-wrench" style="font-size:35px;color:orange"></i>
                            </div>
                            <div class="interne" align="center">Historique des données<br/> et statistiques</div>
                        </div>
                    </div>
                </a>
                <a href="index.php?cible=capteur&fonction=choix.maison">
                    <div class="bloc_exte">
                        <div class="bloc">
                            <div class="w3-padding w3-xlarge">
                                <i class="fa fa-globe" style="font-size:38px;color:orange"></i>
                            </div>
                            <div class="interne">Choix de la maison <br /> <?php echo $maison ?></div>
                        </div>
                    </div>
                </a>
                <div class="bloc_exte">
                    <div align="center" class="bloc">
                        <div class="interne">Date & heure <br>
                            <span id="Paris_z71f" style="font-size:15px"></span>
                            <script src="//widget.time.is/fr.js"></script>
                            <script>
                                time_is_widget.init({Paris_z71f:{template:"DATE<br>TIME" +
                                            "<br>" +
                                            "SUN", time_format:"hours:minutes", date_format:"dayname dnum monthname year",
                                        sun_format:"Lever du soleil : srhour:srminute <br> Coucher du soleil : sshour:ssminute<br>",
                                        coords:"48.8534100,2.3488000"}});
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ligne">
                <a href="index.php?cible=tutoriel&fonction=choix">
                <div class="bloc_exte">
                    <div class="bloc">
                        <div class="w3-padding w3-xlarge">
                            <i class="fa fa-info-circle" style="font-size:48px;color:orange"></i>
                        </div>
                        <div class="interne">Aides</div>
                    </div>
                </div>
                <a href="index.php?cible=capteur&fonction=temperature">
                    <div class="bloc_exte">
                        <div class="bloc">
                            <div class="w3-padding w3-xlarge">
                                <i class='fas fa-temperature-high' style='font-size:40px;color:orange'></i>
                            </div>
                            <div class="interne">Température ambiante</div>
                        </div>
                    </div>
                </a>
                <div class="bloc_exte">
                    <div class="bloc">
                        <div class="w3-padding w3-xlarge">
                            <i class="fa fa-film" style="font-size:38px;color:orange"></i>
                        </div>
                        <div class="interne">Scènes</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
