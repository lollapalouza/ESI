<?php

/**
 * Index du site
 **/

// activation des erreurs
ini_set('display_errors', '1');
//include('vue/pack.php');
//include('vue/gestion.piece.php');0
//include('vue/accueil.php');
//include('vue/pageconnexion.php');
//include('vue/gestion.piece.php')
//include('vue/inscription.php');


include("vue/fonction.generique.vue.php");


if(isset($_GET['cible']) && !empty($_GET['cible'])) {
    // Si la variable cible est passé en GET
    $url = $_GET['cible'];
} else {
    $url = 'utilisateur';
}

include('controleur/' . $url . '.php');

?>