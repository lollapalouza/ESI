<?php
/**
 * Vue : Choix de la maison
 */
include('modeles/requete.maison.php');

$idutilisateur =  $_SESSION['id'];
$choix_maison = "";
$compt = 0;

    if(isset($_POST['formajout'])){
        $nom = htmlspecialchars($_POST['nom_maison']);
        $pays = htmlspecialchars($_POST['pays']);
        $ville = htmlspecialchars($_POST['ville']);
        $code_postal = htmlspecialchars($_POST['code_postal']);
        $adresse = htmlspecialchars($_POST['adresse']);
        if(!empty($_POST['nom_maison']) AND !empty($_POST['pays']) AND !empty($_POST['ville']) AND !empty($_POST['code_postal']) AND !empty($_POST['adresse'])){
            $data = maison_existe($bdd, $idutilisateur);
                foreach($data as $value){
                    if( $value['Nom_maison'] == $_POST['nom_maison'] || ($value['Ville'] == $_POST['ville'] AND $value['Pays'] == $_POST['pays'] AND $value['Adresse'] == $_POST['adresse']) ){
                        $compt=1;
                        break;
                    }
                }
                if($compt == 1){
                    $erreur = "la maison existe déjà";
                }
                else{
                    inserer_maison($bdd, $nom, $ville, $pays, $code_postal, $adresse, $idutilisateur);
                    $erreur = "Success";
                }
            }
        }
        else{
            $erreur = "Remplir tous les champs !";
    }


    if(isset($_POST['formsuppression'])){
        $nom_maison_suppression = htmlspecialchars($_POST['nom_maison_suppression']);
        $nom_maison_suppression_confirmation = htmlspecialchars($_POST['nom_maison_suppression_confirmation']);
        if(!empty($_POST['nom_maison_suppression']) AND !empty($_POST['nom_maison_suppression_confirmation'])){
            if($_POST['nom_maison_suppression'] == $_POST['nom_maison_suppression_confirmation']){
                $data = maison_est_dans_bdd($bdd, $idutilisateur, $nom_maison_suppression);
                if(!empty($data)){
                    maison_supprimer($bdd, $idutilisateur, $nom_maison_suppression);
                    $erreur2 = "Success";
                }
                else{
                    $erreur2 = "La maison n'existe pas";
                }
            }
            else{
                $erreur2 = "Les champs ne correspondent pas";
            }
        }
        else{
            $erreur2 = "Remplir tous les champs !";
        }
    }

    if (isset($_POST['formvalidation'])){
        $nom_choix_maison = htmlspecialchars($_POST['choix_de_la_maison']);
        $data3 = maison_est_dans_bdd($bdd, $idutilisateur, $nom_choix_maison);
        if(!empty($data3)){
            $_SESSION['maison'] = $data3['Nom_maison'];
            $_SESSION['ID_maison'] = $data3['ID'];
            $choix_maison = $_SESSION['maison'];
            $erreur3 = "Vous avez choisi ".$_SESSION['maison']."!";
        }
        else{
            $erreur3 = "Il n'y a pas de maison à ce nom";
        }
    }

?>

<!doctype html>
<html>
<head>
    <!-- Liens utiles pour les logos -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.choix.maison.css" type="text/css" media="screen"/>
    <link href='http://fonts.googleapis.com/css?family=Goudy+Bookletter+1911' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
    <title></title>
</head>
<body>
    <div class="conteneur_total">
        <div class="choix_maison">Choix de la maison de <?php echo $_SESSION['pseudo']?></div>
        <div class="conteneur_interne">
            <div class="conteneur_gauche">
                <div class = "Formulaire" align="center">
                    <p>Ajout</p>
                    <form method="POST" action="">
                        <table>
                            <tr>
                                <td>
                                    <input class="style_saisie" type="text" placeholder="       Nom de la maison" name="nom_maison" id="nom_maison" value="<?php if(isset($nom)) { echo $nom; }?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="style_saisie" type="text" placeholder="                  Pays" name="pays" id="pays" value="<?php if(isset($pays)) { echo $pays; }?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="style_saisie" type="text" placeholder="                  Ville" name="ville" id="ville" value="<?php if(isset($ville)) { echo $ville; }?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="style_saisie" type="text" placeholder="            Code postal" name="code_postal" id="code_postal" value="<?php if(isset($code_postal)) { echo $code_postal; }?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="style_saisie" type="text" placeholder="               Adresse" name="adresse" id="adresse" value="<?php if(isset($adresse)) { echo $adresse; }?>">
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <input class="form" type="submit" name="formajout" value="Ajout" />
                                </td>
                            </tr>
                        </table>
                        <?php
                        if(isset($erreur))
                        {
                            echo '<font size="2px" color="white">'. '<strong>' . $erreur."</font>" . '</strong>';
                        }
                        ?>
                    </form>
                </div>


                <div class = "Formulaire2" align="center">
                    <p>Suppression</p>
                    <form method="POST" action="">
                        <table>
                            <tr>
                                <td>
                                    <input class="style_saisie" type="text" placeholder="       Nom de la maison" name="nom_maison_suppression" id="nom_maison_suppression" value="<?php if(isset($nom_maison_suppression)) { echo $nom_maison_suppression; }?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="style_saisie" type="text" placeholder="    Confirmation du nom" name="nom_maison_suppression_confirmation" id="nom_maison_suppression_confirmation">
                                </td>
                            </tr>
                                <td align="center">
                                    <input class="form" type="submit" name="formsuppression" value="Suppression" />
                                </td>
                            </tr>
                        </table>
                        <?php
                        if(isset($erreur2))
                        {
                            echo '<font size="2px" color="white">'. '<strong>' . $erreur2."</font>" . '</strong>';
                        }
                        ?>
                    </form>
                </div>
            </div>

            <div class="conteneur_droit" align="center">

                <div class = "Formulaire3" align="center">
                    <form method="POST" action="">
                        <table>
                            <tr>
                                <td>
                                    <input class="style_saisie2" type="text" placeholder="                        Ecrivez votre choix de maison ici" name="choix_de_la_maison" id="choix_de_la_maison" value="<?php if(isset($choix_de_la_maison)) { echo $choix_de_la_maison; }?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <input class="form2" type="submit" name="formvalidation" value="Valider votre choix" />
                                </td>
                            </tr>
                        </table>
                        <?php
                        if(isset($erreur3))
                        {
                            echo '<font size="3px" color="white">'. $erreur3."</font>";
                        }
                        ?>
                    </form>
                </div>
                <div class="conteneur_droit_interne">
                    <?php
                    $data2 = affichemaison($bdd, $idutilisateur);
                    foreach($data2 as $value){
                        echo '<div class="bloc_maison">'.$value['Nom_maison'].'</div>';
                    }
                        ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

