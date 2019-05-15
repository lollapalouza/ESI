<?php
/**
 * Vue : gérer le choix pièces (ajouter/supprimer)
 */
include('modeles/requete.maison.php');


$idMaison =  $_SESSION['ID_maison'];
$compt = 0;

if(isset($_POST['formajout'])){
    $nom = htmlspecialchars($_POST['nom_piece']);
    $superficie = htmlspecialchars($_POST['superficie']);
    $type = htmlspecialchars($_POST['type']);
    if(!empty($_POST['nom_piece']) AND !empty($_POST['superficie']) AND !empty($_POST['type'])){
        $data = piece_existe($bdd, $idMaison);
        foreach($data as $value){
            if( $value['Nom'] == $_POST['nom_piece'] AND ($value['Superficie'] == $_POST['superficie'] AND $value['Type_'] == $_POST['type'])){
                $compt=1;
                break;
            }
        }
        if($compt == 1){
            $erreur = "la piece existe déjà";
        }
        else{
            inserer_piece($bdd, $nom, $superficie, $type, $idMaison);
            $erreur = "Success";
        }
    }
    else{
        $erreur = "Remplir tous les champs !";
    }
}


if(isset($_POST['formsuppression'])){
    $nom_piece_suppression = htmlspecialchars($_POST['nom_piece_suppression']);
    $nom_piece_suppression_confirmation = htmlspecialchars($_POST['nom_piece_suppression_confirmation']);
    if(!empty($_POST['nom_piece_suppression']) AND !empty($_POST['nom_piece_suppression_confirmation'])){
        if($_POST['nom_piece_suppression'] == $_POST['nom_piece_suppression_confirmation']){
            $data = piece_est_dans_bdd($bdd, $idMaison, $nom_piece_suppression);
            if(!empty($data)){
                piece_supprimer($bdd, $idMaison, $nom_piece_suppression);
                $erreur2 = "Success";
            }
            else{
                $erreur2 = "La piece n'existe pas";
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



?>

<!doctype html>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="vue/CSS/css.gestion.piece.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
<div class="choix_piece">Les pièces de : <?php echo $_SESSION['maison']?></div>
<div class="conteneur_total">
    <div class="conteneur_haut">
        <ul id="current" class="liste_des_pièces">
        </ul>
        <?php
        $occ = 0;
        $tabid = array();
        $tabnom = array();
        $data2 = affichepiece($bdd, $idMaison);
        foreach($data2 as $value){
            $tabid[] = $value["ID"];
            $tabnom[] = $value["Nom"];
        }
        $tab_to_json_id = json_encode((array)$tabid);
        $tab_to_json_nom = json_encode((array)$tabnom);
        ?>
        
        <script type="text/javascript">
            var tabid_php = <?php echo $tab_to_json_id ?>;
            var tabnom_php = <?php echo $tab_to_json_nom ?>;

            for (var i=0; i< tabid_php.length; i++){
                var newLI = document.createElement("LI");
                var nom = tabnom_php[i];
                if( Math.round(Math.random()) === 1){
                    var xcolor = 29;
                    var ycolor = 29;
                    var zcolor = 29;
                    var x = 190;
                    var y = 183;
                    var z = 188;
                }
                else {
                     xcolor = 1;
                     ycolor = 96;
                     zcolor = 162;
                     x = 255;
                     y = 255;
                     z = 255;
                }

                newLI.style.width =  Math.random()*100 + 100 + "px";
                newLI.style.color = "rgb(" + x + "," + y + "," + z + ")";
                newLI.style.fontFamily = "Segoe UI";
                newLI.style.fontSize = 25 + "px";
                newLI.style.background = "rgb(" + xcolor + "," + ycolor + "," + zcolor + ")";
                newLI.style.cursor = "pointer";

                newLI.className = "liste";
                newLI.id = tabid_php[i];
                newLI.innerHTML = nom;
                newLI.addEventListener("click", function () {
                    var id_session = this.id;
                    $.post("vue/JS/piece.php",{id_sess: id_session},function(){
                        document.location.href="index.php?cible=capteur&fonction=capteur"
                    })
                });
                document.getElementById('current').appendChild(newLI);
            }
        </script>
    </div>
    <div class="conteneur_interne">
        <div class = "Formulaire" align="center">
            Ajout
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="         nom de la pièce" name="nom_piece" id="nom_piece" value="<?php if(isset($nom)) { echo $nom; }?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="          Superficie (cm)" name="superficie" id="superficie" value="<?php if(isset($superficie)) { echo $superficie; }?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="select" name="type" type="text" id="type">
                                <option value="salon">Salon</option>
                                <option value="chambre">Chambre</option>
                                <option value="cuisine">Cuisine</option>
                                <option value="salle de bain">Salle de bain</option>
                                <option value="garage">Garage</option>
                                <option value="dressing">Dressing</option>
                                <option value="toilette">Toilette</option>
                                <option value="grenier">Grenier</option>
                            </select>
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
            Suppression
            <form method="POST" action="" class="formulaire">
                <table>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="         Nom de la pièce" name="nom_piece_suppression" id="nom_piece_suppression" value="<?php if(isset($nom_piece_suppression)) { echo $nom_piece_suppression; }?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="style_saisie" type="text" placeholder="    Confirmation du nom" name="nom_piece_suppression_confirmation" id="nom_piece_suppression_confirmation">
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
</div>
</body>

</html>
