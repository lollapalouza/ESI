<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 15/05/2019
 * Time: 17:56
 */

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {
    case 'achat' :
        $vue = "achat";
        break;
}

include ('vue/HeaderConnecte.php');
include ('vue/' . $vue . '.php');
include ('vue/footerconnexion.php');
?>