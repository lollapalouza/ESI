<?php
/**
 * connexion à la BDD et gestion d'une erreure SI ça ne fonctionne pas
 */

try{
    $bdd = new PDO("mysql:host=localhost; dbname=maison_connectee_bdd;charset=utf8", 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

