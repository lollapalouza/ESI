<?php
/**
 * Le contrôleur :
 *  - définit le contenu des variables à affiché
 *  - identifie et appelle la vue
 *
 *  - contrôleur de l'utilisateur
 */

include('./modeles/requete.utilisateur.php');

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "AccueilHorsConnexion";
} else {
    $function = $_GET['fonction'];
}

switch ($function){
    case 'pageconnexion' :
        $vue = "pageconnexion";
        break;
    case 'inscription' :
        $vue = "inscription";
        break;
    case 'liste.inscrit' :
        $vue = "liste.inscrit";
        break;
    case 'accueil' :
        $vue = "accueil";
        break;
    case 'AccueilHorsConnexion' :
        $vue = "AccueilHorsConnexion";
        break;
    case 'statistiques':
        $vue = "statistiques";
        break;
    case 'changerprofil':
        $vue="changerprofil";
        break;
}

if($vue == 'pageconnexion' || $vue == 'inscription'){
    include ('vue/headerconnexion.php');
    include ('vue/' . $vue . '.php');
}
elseif ($vue == 'AccueilHorsConnexion'){
    include ('vue/headerconnexion.php');
    include ('vue/' . $vue . '.php');
    include ('vue/footerconnexion.php');
}
elseif ($vue=='changerprofil'){
    include ('vue/HeaderConnecte.php');
    include ('vue/'.$vue.'.php');
    include ('vue/footerconnexion.php');
}
else{
    include ('vue/HeaderConnecte.php');
    include ('vue/' . $vue . '.php');
    include ('vue/footerconnexion.php');
}
?>