<?php
/**
 * Contrôleur des capteur des capteurs (seuil imposé)
 */


if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}


switch ($function){
    case 'gestion.piece' :
        $vue = "gestion.piece";
        break;
    case 'choix.maison':
        $vue = "choix.maison";
        break;
    case 'temperature':
        $vue = "temperature";
        break;

}


include ('vue/HeaderConnecte.php');
include ('vue/' . $vue . '.php');
include ('vue/footerconnexion.php');
?>