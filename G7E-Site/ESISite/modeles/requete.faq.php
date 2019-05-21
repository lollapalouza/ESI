<?php
include ('requete.generique.php');

function recuperer_faq(PDO $bdd){
    $query=$bdd->prepare('SELECT * FROM faq');
    $query->execute();
    return $fin=$query->fetchall();
}
?>