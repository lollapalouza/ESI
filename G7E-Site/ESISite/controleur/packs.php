<?php
/**
 * Contrôleur des packs : gère l'achet et la consultation des packs
 */


if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

switch ($function){
    case 'pack' :
        $vue = "pack";
        break;
    case 'achat_selection_pack':
        $vue = 'achat_selection_pack';
        break;
    case 'pack.hors.connexion':
        $vue = 'pack.hors.connexion';
        break;
}
if($vue === 'pack.hors.connexion'){
    include ('vue/' . $vue . '.php');
    include ('vue/footerHorsConnexion.php');
}
else{
    include ('vue/HeaderConnecte.php');
    include ('vue/' . $vue . '.php');
    include ('vue/footerconnexion.php');
}

?>