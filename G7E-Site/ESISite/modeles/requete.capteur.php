<?php
/**
 * Created by PhpStorm.
 * User: mathi
 * Date: 16/05/2019
 * Time: 00:42
 */
include('requete.generique.php');

function affiche_capteur_actionneur(PDO $bdd, $idpiece){
    $query=$bdd->prepare('SELECT * FROM catalogue WHERE idPiece = :idpiece');
    $query->bindValue('idpiece', $idpiece, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetchall();
}

function affiche_capteur_actionneur_id(PDO $bdd, $id){
    $query=$bdd->prepare('SELECT * FROM catalogue WHERE ID = :id');
    $query->bindValue('id', $id, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetch();
}

function capteur_actionneur_supprimer(PDO $bdd, $idpiece, $nom){
    $query=$bdd->prepare('DELETE FROM catalogue WHERE idPiece = :id AND Nom = :nom');
    $query->bindValue(':id',$idpiece, PDO::PARAM_STR);
    $query->bindValue(':nom',$nom, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetch();
}

function inserer_capteur_actionneur(PDO $bdd, $nom, $type, $serie, $idCategorie, $idPiece)
{
    $inserer = $bdd->prepare("INSERT INTO catalogue(Nom, Type_, Numero_de_serie, idCategorieProduit, idPiece) VALUES (?,?,?,?,?)");
    return $inserer->execute(array($nom, $type, $serie, $idCategorie, $idPiece));
}

function rechercher_capteur_actionneur(PDO $bdd, $valeur){
    $query=$bdd->prepare('SELECT ID FROM categorie_produit WHERE Nom = :nom');
    $query->bindValue(':nom',$valeur, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetch();
}

function existe_capt(PDO $bdd, $id){
    $query=$bdd->prepare('SELECT * FROM consigne WHERE IDcatalogue = :id');
    $query->bindValue(':id',$id, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetchAll();
}


function inserer_consigne(PDO $bdd, $valeur, $debut, $fin, $envoye, $id)
{
    $inserer = $bdd->prepare("INSERT INTO consigne(Valeur, temps_début, temps_fin, Envoye, IDcatalogue) VALUES (?,?,?,?,?)");
    return $inserer->execute(array($valeur, $debut, $fin, $envoye, $id));
}


function modifier_valeur(PDO $bdd, $valeur, $id){
    $query=$bdd->prepare('UPDATE consigne SET Valeur = :valeur WHERE IDcatalogue = :id');
    $query->bindValue(':id',$id, PDO::PARAM_STR);
    $query->bindValue(':valeur',$valeur, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetchAll();
}

function recuperer_consigne(PDO $bdd, $id){
    $query=$bdd->prepare('SELECT * FROM consigne WHERE IDcatalogue = :id');
    $query->bindValue(':id',$id, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetchall();
}
?>