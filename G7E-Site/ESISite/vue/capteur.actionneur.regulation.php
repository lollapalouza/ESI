<?php
include('modeles/requete.capteur.php');

$idModule = $_SESSION['capteurActionneur'];
$data = affiche_capteur_actionneur_id($bdd,$idModule);

$nomModule = $data['Nom'];
$typeModule = $data['Type_'];

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
</body>

</html>
