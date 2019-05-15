<?php
/**
 * - Récupérer tous les éléments d'une table
 *
 * - Rechercher des éléments en fonction des attributs passés en paramètre
 *
 * - Insérer un nouvel élément dans une table
 */


// pouvoir récupérer la table
include('connexion.php');

/** Récupère toutes les valeurs de la BDD
 * $bdd = notre base de donnée
 * $table = la table dans laquelle on récupère les données
 * @param PDO $bdd
 * @param $table
 * @return array|void
 */
function recupereTous(PDO $bdd, $table){
    if(!is_string($table)){
        trigger_error("Ce n'est pas un string" );
        return;
    }
    $query = 'SELECT * FROM ' . $table;
    return $bdd->query($query)->fetchAll();
}

/** Recherche des éléments en fonction des attributs passés en paramètre
 * $bdd = notre base de donnée
 * $table = la table dans laquelle on récupère les données
 * $attribut = l'attribut que l'on recherche
 * @param PDO $bdd
 * @param $table
 * @param array $attributs
 * @return array
 */

function recherche(PDO $bdd,$table, array $attributs){
    if(!is_string($table)){
        trigger_error("Ce n'est pas un string" );
        return;
    }
    $where = "";
    foreach($attributs as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    $where = substr_replace($where, '', -2, 2);
    $statement = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE ' . $where);
    foreach($attributs as $key => $value) {
        $statement->bindParam(":$key", $value);
    }
    $statement->execute();

    return $statement->fetchAll();
}

/**
 * Insère un nouvel élément dans une table
 * $bdd = notre base de donnée
 * $table = la table dans laquelle on récupère les données
 * $table = la table dans laquelle on insert la/les valeurs
 * @param PDO $bdd
 * @param array $values
 * @param string $table
 * @return boolean
 */

function insertion(PDO $bdd, array $values, $table){
    if(!is_string($table)){
        trigger_error("Ce n'est pas un string" );
        return;
    }
    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {
        $attributs .= $key . ', ';
        $valeurs .= ':' . $key . ', ';
        $v[] = $value;
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 2);
    $query = ' INSERT INTO ' . $table . ' (' . $attributs . ') VALUES (' . $valeurs . ')';
    $donnees = $bdd->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        $donnees->bindParam($key, $values[$key], PDO::PARAM_STR);
    }
    return $donnees->execute();
}
?>