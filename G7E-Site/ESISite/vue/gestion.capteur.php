<?php
/**
 * Page pour AJAX de gestion.capteur
 */
include('modeles/requete.capteur.php');
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
    </div>
    <div class="conteneur_bas">
        <form method="POST" action="" align ="center">
            <table>
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
            </table>
        </form>
    </div>
</div>
</body>
</html>
