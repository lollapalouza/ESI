<?php
/**
 * Contrôleur des packs : gère l'achet et la consultation du tutoriel du site
 */

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

switch ($function){
    case 'choix':
        $vue ="aides";
        break;
    case 'tutoriel' :
        $vue = "videopresentation";
        break;
    case 'FAQ':
        $vue = "faq";
        break;
}
include ('vue/HeaderConnecte.php');
include ('vue/' . $vue . '.php');
include ('vue/footerconnexion.php');
?>