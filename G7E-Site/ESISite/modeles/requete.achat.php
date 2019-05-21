<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 20/05/2019
 * Time: 10:30
 */
function attribuer_pack(PDO $bdd, $Pack, $IdUtilisateur)
{
    $attribuer_pack = $bdd->prepare("INSERT INTO utilisateur(Etat_de_connexion) VALUES (?) WHERE ID = :IdUtilisateur");
    $attribuer_pack->bindValue(':IdUtilisateur',$IdUtilisateur, PDO::PARAM_STR);
    return $attribuer_pack->execute(array($Pack));
}
