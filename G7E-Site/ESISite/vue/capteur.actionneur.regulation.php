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


    <!--
    <label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
    </label> -->
</div>
</body>

</html>
