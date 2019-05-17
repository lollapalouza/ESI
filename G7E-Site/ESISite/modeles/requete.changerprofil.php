<?php
/* traitement des données pour changer ses informations personnels */
function bdd() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=maison_connectee_bdd;charset=utf8', 'root', '');
        return $bdd;
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>
<?php

function changerpseudo($pseudo,$id)
{
    $bdd=bdd();
    $ajout= $bdd -> prepare('UPDATE utilisateur SET Pseudo=? WHERE id=?');
    $ajout->execute(array($pseudo,$id));

}

function changerprénom($prenom,$id)
{
    $bdd=bdd();
    $ajout= $bdd -> prepare('UPDATE utilisateur SET Prénom=? WHERE id=?');
    $ajout->execute(array($prenom,$id));

}

function changernom($nom,$id)
{
    $bdd=bdd();
    $ajout= $bdd -> prepare('UPDATE utilisateur SET Nom=? WHERE id=?');
    $ajout->execute(array($nom,$id));

}

function changermdp($mdp,$id)
{
    $bdd=bdd();
    $ajout= $bdd -> prepare('UPDATE utilisateur SET Mot_de_passe=? WHERE id=?');
    $ajout->execute(array($mdp,$id));

}

function changernuméro ($num,$id)
{
    $bdd=bdd();
    $ajout= $bdd -> prepare('UPDATE utilisateur SET Numero_de_telephone=? WHERE id=?');
    $ajout->execute(array($num,$id));

}


if(sha1($_POST['mot_de_passe'])==$_POST['mdp']){
    if (isset($_POST['pseudo'])){
        if ($_POST['pseudo'] != NULL) {
            $id = $_POST['inc'];
            $pseudo = $_POST['pseudo'];
            changerpseudo($pseudo, $id);
        }
    }
    if (isset($_POST['nom'])){
        if ($_POST['nom'] != NULL) {
            $id = $_POST['inc'];
            $nom = $_POST['nom'];
            changernom($nom, $id);
        }
    }
    if (isset($_POST['prenom'])){
        if ($_POST['prenom'] != NULL) {
            $id = $_POST['inc'];
            $prenom = $_POST['prenom'];
            changerprénom($prenom, $id);
        }
    }


    if (isset($_POST['telephone'])){
        if ($_POST['telephone'] != NULL) {
            $id = $_POST['inc'];
            $telephone = $_POST['telephone'];
            changernuméro($telephone, $id);
        }
    }

    if (isset($_POST['new_mot_de_passe'])){
        if ($_POST['new_mot_de_passe'] != NULL) {
            if ( $_POST['new_mot_de_passe']==$_POST['new_confirmation_mot_de_passe'])
            {
                $id = $_POST['inc'];
                $oldmdp = sha1($_POST['new_mot_de_passe']);
                changermdp($oldmdp, $id);
            }
        }
    }
}

header('Location: /g7e-site/ESISite/index.php?cible=utilisateur&fonction=AccueilHorsConnexion');
exit();




?>
