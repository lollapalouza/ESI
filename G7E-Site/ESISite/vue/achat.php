<?php
/** Ceci est la page pour le connecter */
include ('modeles/requete.utilisateur.php');

if(isset($_POST['formconnexion']))
{
    $pseudoconnectee = htmlspecialchars($_POST['pseudoconnexion']);
    if (empty($_POST['pseudoconnexion']) || empty($_POST['mdpconnexion']) ) //verifier si les champs sont vides ou non
    {
        $erreur = 'Tous les champs doivent être remplis';
    }
    else
    {
        $data = utilisateur_existe($bdd, $_POST['pseudoconnexion']);
        if ($data['Mot_de_passe'] == sha1($_POST['mdpconnexion']))    // verifier si les mdp correspondent entre celui rentrer dans pageconnexion.php et la bdd
        {

            header('Location: https://www.paypal.com/fr/home');
        }
        else // Acces pas OK !
        {
            $erreur = "Le pseudo ou le mot de passe n'existe pas";
        }
    }
}
?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="vue/CSS/css.achat.css"/>
        <title> Paiement </title>
    </head>
    <body>
    <!-- Bouton retour pour revenir au menu principal -->
    <a href="index.php?cible=packs&fonction=pack">
    <div class="retourConteneur">
        <div class="retour">
        </div>
    </div>
    </a>
    <div align="center">
        <div class="conteneur_connexion" align="center">
            <div class="Conteneur_connexion_design"></div>
            <div class="Formulaire">
                <form method="POST" action="">
                    <br/><br/>
                    <h1>Paiement</h1>
                    <div class="text">
                        <strong>
                    Veuillez confirmer vos identifiants et mot de passe
                        </strong>
                    </div>
                    <br /><br />
                    <input class="style_saisie1" type="text" name="pseudoconnexion" placeholder="Pseudo" value="<?php if(isset($pseudoconnectee)) { echo $pseudoconnectee; }?>">
                    <input  class="style_saisie2" type="password" name="mdpconnexion" placeholder="Mot de passe" >
                    <div class="connexion">
                        <br />
                        <button class="confirmer" name="formconnexion" value="Payer" onclick="confirm('Etes-vous sûr de vouloir continuer ?')"> Passer sur la page de paiement </button>
                    </div>
                    <br />
                    <?php
                    if(isset($erreur)){
                        echo '<font color="white">'. '<strong>' . $erreur."</font>" . '</strong>';
                    }
                    ?>
                    <br />
                </form>
            </div>
        </div>
    </body>
    </html>
<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 15/05/2019
 * Time: 09:50
 */
/*
include ('modeles/requete.achat.php');
$Pack=htmlspecialchars($_GET['pack']);
$IdUtilisateur = $_SESSION['id'];
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
                    attribuer_pack($bdd, $Pack,$IdUtilisateur);
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
*/?>
<!--
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
-->
<!-- Bouton retour pour revenir au menu principal -->
<!-- <a href="index.php?cible=packs&fonction=pack">
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
                                   value="<?php // if(isset($titulairedecarte)) { echo $titulairedecarte; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="Votre numéro de carte" name="numero_carte" id="numero_carte"
                                   value="<?php// if(isset($numerocarte)) { echo $numerocarte; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="Cryptogramme visuel "
                                   name="cryptogramme" id="cryptogramme" value="<?php // if(isset($cryptogramme)) { echo $cryptogramme; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align = center>
                            <a href="">
                            <input type="button" value="Valider">
                            </a>

                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        -->
        <?php ?>
       <!-- if(isset($erreur))
        {
            echo '<font color="white">'. '<strong>' . $erreur."</font>" . '</strong>';
            // Ecrit l'erreur en rouge gras, sous le formulaire
        }
        ?>
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
-->