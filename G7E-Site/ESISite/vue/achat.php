<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 15/05/2019
 * Time: 09:50
 */
if(isset($_POST['paiement'])) {
    $titulairedecarte = htmlspecialchars($_POST['titulaire_de_carte']);
    $titulairedecartelenght = strlen($titulairedecarte);
    $numerocarte = sha1($_POST['numero_carte']);
    $numerolength = strlen($numerocarte);
    $cryptogramme = sha1($_POST['cryptogramme']);
    $cryptogrammelength = strlen($cryptogramme);
    if (!empty($_POST['titulaire_de_carte']) AND !empty($_POST['numerocarte']) AND !empty($_POST['cryptogramme'])) {
        if (($titulairedecartelength) <= 255) {
            if (($numerolength)<=16 ){
                if(($cryptogrammelength)<3) {
                    inserer_membre($bdd, $titulairedecarte, $cryptogramme, $numerocarte, "none");
                    $erreur = "Le paiement à été effectué";
                }
                else {
                    $erreur = "Entrer le bon cryptogramme";
                }
                }
            else{
                $erreur = "Rentrer le nombre exact de chiffre de votre carte";
            }
            } else {
                $erreur = "Votre nom ne doit pas excéder 255 caractères !";
        }
    }
            else{
                $erreur="Tous les champs doivent être remplis";
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.achat.css"/>
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
<div id ="PremiereLigne">
    <div class ="blocAchat">
    <div class = "Conteneur_inscription" align = "center">
        <div class="Conteneur_inscription_design"></div>
        <div class = "titre">
        <h1>
            Paiement
            </h1>
        </div>
        <br>
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text"
                                   placeholder="Nom du titulaire de la carte" name="titulaire_de_carte" id="titulaire_de_carte"
                                   value="<?php if(isset($titulairedecarte)) { echo $titulairedecarte; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="Votre numéro de carte" name="numero_carte" id="numero_carte"
                                   value="<?php if(isset($numerocarte)) { echo $numerocarte; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="Cryptogramme visuel "
                                   name="cryptogramme" id="cryptogramme" value="<?php if(isset($cryptogramme)) { echo $cryptogramme; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align = center>
                            <a href="index.php?cible=achats&fonction=achat">
                            <input type="button" value="Valider">
                            </a>

                            </div>
                        </td>
                    </tr>
                </table>
            </form>

    </div>
</div>
    </div>
</div>
</div>
</body>
</html>
<map name="Liens" id="Liens">
    <area shape="rect" coords="20,10,1000,500" href="achat.php" alt="ACHAT" />
</map>
