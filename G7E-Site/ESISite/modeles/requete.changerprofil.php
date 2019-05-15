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

if (isset($_POST['pseudo'])){
    if ($_POST['pseudo'] != NULL) {
        $id = $_POST['inc'];
        echo $id;
        $pseudo = $_POST['pseudo'];
        echo $pseudo;
        changerpseudo($pseudo, $id);
    }
}
if (isset($_POST['nom'])){
    if ($_POST['nom'] != NULL) {
        $id = $_POST['inc'];
        echo $id;
        $nom = $_POST['nom'];
        changernom($nom, $id);
    }
}
if (isset($_POST['prenom'])){
    if ($_POST['prenom'] != NULL) {
        $id = $_POST['inc'];
        echo $id;
        $prenom = $_POST['prenom'];
        changerprénom($prenom, $id);
    }
}


if (isset($_POST['telephone'])){
    if ($_POST['telephone'] != NULL) {
        $id = $_POST['inc'];
        echo $id;
        $telephone = $_POST['telephone'];
        changernuméro($telephone, $id);
    }
}
?>
