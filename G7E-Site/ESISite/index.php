<?php

/**
 * Index du site
 **/

ini_set('display_errors', '1');
include("vue/fonction.generique.vue.php");

if(isset($_GET['cible']) && !empty($_GET['cible'])) {
    $url = $_GET['cible'];
} else {
    $url = 'utilisateur';
}
include('controleur/' . $url . '.php');
?>