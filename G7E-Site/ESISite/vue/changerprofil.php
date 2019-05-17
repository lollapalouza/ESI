<?php
/**changer les inforamtion de l'utilisateur*/




?>

<?php
$personnne= $_SESSION['pseudo'];
$id=$_SESSION['id'];

$reponse = $bdd->prepare('SELECT * FROM  utilisateur WHERE id=(?)' );
$reponse->execute(array($id));

// On affiche chaque entrée une à une
while ($infoutilisateur = $reponse->fetch())
{
    ?>



    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">

        <!-- Lien vers la page CSS -->
        <link rel="stylesheet" href="vue/CSS/css.changerinscription.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!--    .gros {color:green;font-size: 3rem;}
            input[type=checkbox] {display:none;}
            input[type=checkbox] + label {cursor:pointer;margin-right:3rem}
            input[type=checkbox] + label:before {font-family: FontAwesome;display: inline-block;content: "\f096";width:3rem;}
            input[type=checkbox]:checked + label:before {content: "\f046";}
            <title> Inscription </title> -->
    </head>
    <body onload="document.getElementById('mot_de_passe').select();">
    <div align="center">
        <div class = "Conteneur_inscription" align = "center">
            <div class="Conteneur_inscription_design"></div>
            <div class = "Formulaire">
                <h1>
                    Changez les informations de votre profil :
                </h1>
                <br/><br/>
                <form method="POST" action="modeles/requete.changerprofil.php"  name="saisie">
                    <table>
                        <tr>
                            <td>
                                <input class="style_saisie" type="text"
                                       placeholder="Votre Pseudo : <?php echo $infoutilisateur['Pseudo'];?> " name="pseudo" id="pseudo"
                                       value="<?php if(isset($pseudo)) { echo $pseudo ; }?>">
                                <br/><br/>
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <td>
                                <input class="style_saisie" type="text" placeholder="Votre prénom : <?php echo $infoutilisateur['Prénom'];?>" name="prenom" id="prenom"
                                       value="<?php if(isset($prenom)) { echo $prenom; }?>">
                                <br/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="style_saisie" type="text" placeholder="Votre nom : <?php echo $infoutilisateur['Nom'];?>"
                                       name="nom" id="nom" value="<?php if(isset($nom)) { echo $nom; }?>">
                                <br/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="style_saisie" type="email" placeholder="Votre adresse mail : <?php echo $infoutilisateur['Adresse_mail']?>" name="mail" id="mail"
                                       value="<?php if(isset($mail)) { echo $mail; }?>">
                                <br/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="style_saisie" type="password" onblur="valider()"
                                       placeholder="Mot de passe actuel" name="mot_de_passe" id="mot_de_passe">
                                <br/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="style_saisie" type="password"
                                       placeholder="Nouveau mot de passe" name="new_mot_de_passe" id="new_mot_de_passe">
                                <br/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="style_saisie" type="password"
                                       placeholder="Confirmation du nouveau mot de passe" name="new_confirmation_mot_de_passe" id="new_confirmation_mot_de_passe">
                                <br/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="style_saisie" type="text" placeholder="Numéro de téléphone : <?php echo $infoutilisateur['Numero_de_telephone']?>"
                                       name="telephone" id="telephone" value="<?php if(isset($telephone)) { echo $telephone; }?>">
                                <br/>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <br />
                                <input class="forminscription" type="submit" name="forminscription" value="Validation" />
                            </td>
                        </tr>
                    </table>
                    <br />
                    <input type="hidden" name="inc" value="<?php echo $id ?>"/>
                    <input type="hidden" name="mdp" value="<?php echo $infoutilisateur['Mot_de_passe'] ?>"/>

                </form>
            </div>

        </div>
    </div>
    </body>
    </html>
    <script>

        function valider() {
            if (document.saisie.mot_de_passe.value == "" ) {
                alert("Entrer votre mot de passe");
            }

        }

    </script>

    <?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>