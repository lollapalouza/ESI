<?php
/**
 * Page pour AJAX de gestion.capteur
 */
include('modeles/requete.capteur.php');


$idpiece = $_SESSION['piece'];

if(isset($_POST['form'])){
    $nom = htmlspecialchars($_POST['formNom']);
    $type = htmlspecialchars($_POST['type']);
    $choix = htmlspecialchars($_POST['add']);
    $serie = htmlspecialchars($_POST['formSerie']);
    $data = rechercher_capteur_actionneur($bdd,$choix);
    if(!empty($_POST['type']) AND !empty($_POST['formSerie'])){
        inserer_capteur_actionneur($bdd, $nom, $type, $serie, $data['ID'], $idpiece);
        $erreur = "success";
    }
    else{
        $erreur = "remplir les champs";
    }
}

if(isset($_POST['formSuppression'])){
    $suppression = htmlspecialchars($_POST['formSuppression1']);
    $supression_confirmation = htmlspecialchars($_POST['formSuppression2']);
    if(!empty($_POST['formSuppression1']) AND !empty($_POST['formSuppression2'])){
        if ($suppression == $supression_confirmation){
            capteur_actionneur_supprimer($bdd, $idpiece, $suppression);
            $erreur2 = "success";
        }
        else{
            $erreur2 = "Les noms ne correspondent pas";
        }
    }
    else{
        $erreur2 = "remplir les champs";
    }
}
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.gestion.capteur.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script language="JavaScript">
        function suppression(tab){
            var tab1 = tab.replace('[','');
            var tab2 = tab1.replace(']','');
            var tab3 = tab2.replace(/"/g,'');
            var tab4 = tab3.split(',');
            return tab4;
        }
        function comparaison() {
            document.getElementById('cacher').style.display = 'none';
            var select = document.getElementById("add");
            $('#add').empty();
            var type = document.getElementById('type');
            var valeur = type.options[type.selectedIndex].value;
            $.post('vue/Ajax/capteur.actionneur.php',{val : valeur}, function (data) {
                var tab = data.toString();
                var tab_nom = suppression(tab);
                for (var i=0; i< tab_nom.length; i++){
                    var newOption = new Option(tab_nom[i],tab_nom[i]);
                    select.options.add(newOption);
                }
            });
         }
    </script>
    <title>ESI - GESTION CAPTEUR</title>
</head>
<body>
<div class="conteneur_interne">
    <div class="conteneur_haut">
        <ul id="capteurs">
        </ul>
        <?php
        $occ = 0;
        $tabid = array();
        $tabnom = array();
        $data2 = affiche_capteur_actionneur($bdd, $idpiece);
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
                newLI.style.fontFamily = "Segoe UI";
                newLI.style.fontSize = 20 + "px";
                newLI.style.cursor = "pointer";
                newLI.className = "liste";
                newLI.id = tabid_php[i];
                newLI.innerHTML = nom;
                /*newLI.addEventListener("click", function () {
                    var id_session = this.id;
                    $.post("vue/Ajax/piece.php",{id_sess: id_session},function(){
                        document.location.href="index.php?cible=capteur&fonction=capteur"
                    })
                });
                */
                document.getElementById('capteurs').appendChild(newLI);
            }
        </script>
    </div>
    <div class="conteneur_bas">
        <div class="ajouter">
            <form method="POST" action="" align ="center">
                <table>
                    <tr>
                        <td>
                            <div class = "ecriture">AJOUTER</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="formNom" type="text" placeholder="         nom du capteur" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="select" name="type" id="type" onchange="comparaison()">
                                <option value="" id="cacher">Selectionner</option>
                                <option value="capteur">Capteur</option>
                                <option value="actionneur">Actionneur</option>
                            </select>
                            <script language="JavaScript">
                                document.getElementById('cacher').style.fontWeight = 'bold';
                                document.getElementById('type').style.fontWeight = 'bold';
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="select" name="add" id="add">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="formSerie" type="text" placeholder="            N° de série" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="form" type="submit"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            if(isset($erreur))
                            {
                                echo '<font size="2px" color="white">'. '<strong>' . $erreur."</font>" . '</strong>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="ajouter">
            <form method="POST" action="" align ="center">
                <table>
                    <tr>
                        <td>
                            <div class="ecriture">SUPPRIMER</div>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="formSuppression1" type="text" placeholder="            Supprimer" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="formSuppression2" type="text" placeholder="            Confirmation" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="formSuppression" type="submit"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            if(isset($erreur2))
                            {
                                echo '<font size="2px" color="white">'. '<strong>' . $erreur2."</font>" . '</strong>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>
