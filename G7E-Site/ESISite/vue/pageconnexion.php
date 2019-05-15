<?php
/** Ceci est la page pour le connecter */

session_start();

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
            $_SESSION['pseudo'] = $data['Pseudo'];     // paramètres sessions permettent de faire en sorte qu'on puisse les utiliser ailleurs
            $_SESSION['mail'] = $data['Adresse_mail'];
            $_SESSION['id'] = $data['ID'];
	        $erreur = $_SESSION['pseudo'].' est connecté';
	        header('Location: index.php?cible=utilisateur&fonction=accueil');
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
        <link rel="stylesheet" href="vue/CSS/css.pageconnexion.css"/>
        <title> Connexion </title>
    </head>
    <body>
    <div align="center">
        <div class="conteneur_connexion" align="center">
            <div class="Conteneur_connexion_design"></div>
            <div class="Formulaire">
                <form method="POST" action="">
                    <br/><br/>
                    <h1>Connexion</h1>
                    <br /><br />
                    <input class="style_saisie1" type="text" name="pseudoconnexion" placeholder="Pseudo" value="<?php if(isset($pseudoconnectee)) { echo $pseudoconnectee; }?>">
                    <input  class="style_saisie2" type="password" name="mdpconnexion" placeholder="Mot de passe" >
                    <div class="connexion">
                        <br />
                        <button class="confirmer" name="formconnexion" value="je m'inscrit"> Confirmer </button>
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