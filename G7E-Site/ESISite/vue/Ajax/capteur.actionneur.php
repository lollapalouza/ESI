<?php
session_start();
try{
    $bdd = new PDO("mysql:host=localhost; dbname=maison_connectee_bdd;charset=utf8", 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

function recherche_capteur(PDO $bdd){
    $query=$bdd->prepare('SELECT * FROM categorie_produit WHERE ID = 1 OR ID = 2 OR ID = 3 OR ID = 4 ');
    $query->execute();
    return $fin=$query->fetchAll();
}

function recherche_actionneur(PDO $bdd){
    $query=$bdd->prepare('SELECT * FROM categorie_produit WHERE ID = 5 OR ID = 6 OR ID = 7');
    $query->execute();
    return $fin=$query->fetchAll();
}

extract($_POST);
$tabid = array();
if ($val == 'capteur'){
    $data = recherche_capteur($bdd);
}
else{
    $data = recherche_actionneur($bdd);
}

foreach ($data as $value){
    $tabnom[] = $value['Nom'];
}
$tabnom_json = json_encode((array) $tabnom);
echo $tabnom_json;
?>