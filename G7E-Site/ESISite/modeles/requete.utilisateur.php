<?php
/**
 * - Récupéré les requêtes générique
 * - Défninir le nom de la table
 *
 * - Rechercher un utilisateur grâce à son nom
 *
 * - Récupérer tous les enregistrement de la table User
 *
 * - Ajouter un nouvel utilisateur dans la BDD
 */

include("connexion.php");

/** inserer un membre pour la connexion
 * @param PDO $bdd
 * @param $Prenom
 * @param $Nom
 * @param $Pseudo
 * @param $Mot_de_passe
 * @param $Adresse_mail
 * @param $Numero_de_telephone
 * @param $Etat_de_connexion
 * @return bool
 */
function inserer_membre(PDO $bdd, $Prenom,$Nom,$Pseudo,$Mot_de_passe,$Adresse_mail,$Numero_de_telephone,$Etat_de_connexion){
    $inserermembre = $bdd -> prepare("INSERT INTO utilisateur(Prénom,Nom,Pseudo,Mot_de_passe,Adresse_mail,Numero_de_telephone,Etat_de_connexion) VALUES (?,?,?,?,?,?,?)");
    return $inserermembre -> execute(array($Prenom,$Nom,$Pseudo,$Mot_de_passe,$Adresse_mail,$Numero_de_telephone,$Etat_de_connexion));
}

/** verification du mail
 * @param PDO $bdd
 * @param $mail
 * @return
 */

function verif_mail(PDO $bdd, $mail){
    $verifmail = $bdd -> prepare("SELECT * FROM utilisateurs WHERE Adresse_Mail = ?");
    $verifmail -> execute(array($mail));
    return $mailexiste = $verifmail -> rowCount();
}

function utilisateur_existe(PDO $bdd, $utilisateur){
    $query=$bdd->prepare('SELECT * FROM utilisateur WHERE Pseudo = :pseudo');
    $query->bindValue(':pseudo',$utilisateur, PDO::PARAM_STR);
    $query->execute();
    return $fin=$query->fetch();
}
?>

