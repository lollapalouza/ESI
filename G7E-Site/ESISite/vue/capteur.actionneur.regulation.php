<?php
include('modeles/requete.capteur.php');

$idModule = $_SESSION['capteurActionneur'];
$data = affiche_capteur_actionneur_id($bdd,$idModule);

$nomModule = $data['Nom'];
$typeModule = $data['Type_'];


$data2 = existe_capt($bdd, $idModule);
if (empty($data2)){
    inserer_consigne($bdd, 1, 1, 1, "", $idModule);
}


if (isset($_POST['formactivation'])){
    $type =  htmlspecialchars($_POST['type']);
    if($type === "activer"){
        $valeur = 1;
    }
    else{
        $valeur = 0;
    }
    modifier_valeur($bdd, $valeur, $idModule);
}
?>



<!doctype html>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="vue/CSS/css.capteur.actionneur.regulation.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
<div class="pres">Vous avez choisi un : '<?php echo $typeModule?>' de nom : '<?php echo $nomModule ?>'</div>
<div class="conteneur_interne">
    <?php
        $data3 = recuperer_consigne($bdd, $idModule);
        foreach ($data3 as $value) {
            if($value['Valeur'] == 0){
                $valeur = "désactiver";
            }
            else{
                $valeur = "activer";
            }
        }
    echo $valeur;
    ?>
    <form method="POST" action="">
        <table>
            <tr>
                <td>
                    <select class="select" name="type" id="type">
                        <option value="activer">Activer</option>
                        <option value="desactiver">Désactiver</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="formactivation" value="valider">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>

</html>
