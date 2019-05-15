<?php
/**
 * Listes des fonctions spécifiques à la tavle des capteurs
 *  - récupérer les requêtes
 *  - définir le nom de la table
 */
include('requete.generique.php');

//on définit le nom de la table
$table = "capteurs";



/**
 * Recherche les capteurs en fonction du type passé en paramètre
 * @param PDO $bdd
 * @param string $table
 * @param string $type
 * @return array
 */
function rechercheParType(PDO $bdd, $table, $type){
    return recherche($bdd, $table, ['type' => $type]);
}

/**
 * @param PDO $bdd
 * @param $id
 * @return mixed
 */
function affichemaison(PDO $bdd, $id){
    $query=$bdd->prepare('SELECT * FROM maison WHERE IDutilisateur = :idutilisateur');
    $query->bindValue('idutilisateur', $id, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetchall();
}

/**
 * @param PDO $bdd
 * @param $nom_maison
 * @param $ville
 * @param $pays
 * @param $code_postal
 * @param $adresse
 * @param $idutilisateur
 * @return bool
 */
function inserer_maison(PDO $bdd, $nom_maison, $ville, $pays, $code_postal , $adresse, $idutilisateur)
{
    $inserermaison = $bdd->prepare("INSERT INTO maison(Nom_maison, Ville, Pays, Code_postal, Adresse, IDutilisateur) VALUES (?,?,?,?,?,?)");
    return $inserermaison->execute(array($nom_maison,$ville, $pays, $code_postal, $adresse, $idutilisateur));
}

/**
 * @param PDO $bdd
 * @param $id
 * @return array
 */
function maison_existe(PDO $bdd, $id){
    $query=$bdd->prepare('SELECT * FROM maison WHERE IDutilisateur = :id');
    $query->bindValue(':id',$id, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetchall();
}


function maison_est_dans_bdd(PDO $bdd, $id, $nom){
    $query=$bdd->prepare('SELECT * FROM maison WHERE IDutilisateur = :id AND Nom_maison =:maison');
    $query->bindValue(':id',$id, PDO::PARAM_STR);
    $query->bindValue(':maison',$nom, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetch();
}


function maison_supprimer(PDO $bdd, $id, $maison){
    $query=$bdd->prepare('DELETE FROM maison WHERE IDutilisateur = :id AND Nom_maison = :maison');
    $query->bindValue(':id',$id, PDO::PARAM_STR);
    $query->bindValue(':maison',$maison, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetch();
}









function affichepiece(PDO $bdd, $id){
    $query=$bdd->prepare('SELECT * FROM piece WHERE idMaison = :idmaison');
    $query->bindValue('idmaison', $id, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetchall();
}

function inserer_piece(PDO $bdd, $nom, $superficie, $type, $idMaison)
{
    $inserermaison = $bdd->prepare("INSERT INTO piece(Nom, Superficie, Type_, idMaison) VALUES (?,?,?,?)");
    return $inserermaison->execute(array($nom,$superficie, $type, $idMaison,));
}

function piece_existe(PDO $bdd, $id)
{
    $query=$bdd->prepare('SELECT * FROM piece WHERE idMaison = :id');
    $query->bindValue(':id',$id, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetchall();
}


function piece_est_dans_bdd(PDO $bdd, $id, $nom)
{
    $query=$bdd->prepare('SELECT * FROM piece WHERE idMaison = :id AND Nom =:piece');
    $query->bindValue(':id',$id, PDO::PARAM_STR);
    $query->bindValue(':piece',$nom, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetch();
}

function piece_supprimer(PDO $bdd, $id, $piece)
{
    $query=$bdd->prepare('DELETE FROM piece WHERE idMaison = :id AND Nom = :piece');
    $query->bindValue(':id',$id, PDO::PARAM_STR);
    $query->bindValue(':piece',$piece, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetch();
}



?>