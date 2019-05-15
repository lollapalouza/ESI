<?php
/**
 * Inscription d'un nouvel utilisateur sur le site
 */


if(isset($_POST['forminscription']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pseudolength = strlen($pseudo);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $motdepasse = sha1($_POST['mot_de_passe']);
    $verifmotdepasse = sha1($_POST['confirmation_mot_de_passe']);
    $telephone = htmlspecialchars($_POST['telephone']);

    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail'])
        AND !empty($_POST['mot_de_passe']) AND !empty($_POST['confirmation_mot_de_passe']) AND !empty($_POST['telephone'])) {
        if (($pseudolength) <= 255) {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $nombredemailaverifier = verif_mail($bdd, $mail);
                if ($nombredemailaverifier == 0) {
                    if ($motdepasse == $verifmotdepasse) {
                        inserer_membre($bdd, $prenom, $nom, $pseudo, $motdepasse, $mail, $telephone, "none");
                        $erreur = "Votre compte a été créé";
                        echo "Nickel";
                    } else {
                        $erreur = "Les mots de passe ne correspondent pas";
                    }
                } else {
                    $erreur = "L'adresse mail est déjà utilisée pour un autre compte";
                }
            } else {
                $erreur = "L'adresse mail n'est pas valide";
            }
        } else {
            $erreur = "Votre pseudo ne doit pas excéder 255 caractères !";
        }
    }
    else{
        $erreur="Tous les champs doivent être remplis";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <!-- Lien vers la page CSS -->
    <link rel="stylesheet" href="vue/CSS/css.inscription.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--    .gros {color:green;font-size: 3rem;}
    input[type=checkbox] {display:none;}
    input[type=checkbox] + label {cursor:pointer;margin-right:3rem}
    input[type=checkbox] + label:before {font-family: FontAwesome;display: inline-block;content: "\f096";width:3rem;}
    input[type=checkbox]:checked + label:before {content: "\f046";}
    <title> Inscription </title> -->
</head>
<body>
<div align="center">
    <div class = "Conteneur_inscription" align = "center">
        <div class="Conteneur_inscription_design"></div>
        <div class = "Formulaire">
            <h1>
                Inscription
            </h1>
            <br/><br/>
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text"
                                   placeholder="          Votre Pseudo" name="pseudo" id="pseudo"
                                   value="<?php if(isset($pseudo)) { echo $pseudo; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="          Votre prénom" name="prenom" id="prenom"
                                   value="<?php if(isset($prenom)) { echo $prenom; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="             Votre nom"
                                   name="nom" id="nom" value="<?php if(isset($nom)) { echo $nom; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="email" placeholder="      Votre adresse mail" name="mail" id="mail"
                                   value="<?php if(isset($mail)) { echo $mail; }?>">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="password"
                                   placeholder="      Votre mot de passe" name="mot_de_passe" id="mot_de_passe">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="password"
                                   placeholder="    Confirmation du mdp" name="confirmation_mot_de_passe" id="confirmation_mot_de_passe">
                            <br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="    Numéro de téléphone"
                                   name="telephone" id="telephone" value="<?php if(isset($telephone)) { echo $telephone; }?>">
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <br />
                            <input class="forminscription" type="submit" name="forminscription" value="Je m'inscris" />
                        </td>
                    </tr>
                </table>
                <br />
                <?php
                if(isset($erreur))
                {
                    echo '<font color="white">'. '<strong>' . $erreur."</font>" . '</strong>';
                    // Ecrit l'erreur en rouge gras, sous le formulaire
                }
                ?>
            </form>
        </div>

    </div>
</div>
</body>
</html>
