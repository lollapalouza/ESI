<?php
/**
 * Page de la foire aux questions
 */

?>

<!doctype html>
<html xmlns:align="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.faq.css"/>
    <title> ESI - FAQ</title>
</head>
<body>

<div class = "BlocEcritureQuestion">
    <table>
        <tr>
            <td><br>
                Si votre question ne figure pas parmi les propositions ci-dessous, vous pouvez
                l'écrire ici, un membre de l'équipe support vous répondra dans les plus brefs délais :
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <input class="EcritureQuestion" type="text" placeholder="Veuillez écrire votre question ici"
                       name="QuestionUtilisateur" id="" value=""
            </td>
        </tr>
        <tr>
            <td>
                <input class="ValidationQuestion" type="submit" name="formvalidation" value="Soumettre" />
            </td>
        </tr>
    </table>
</div>
<br><br><br><br>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script>
    $(document).ready(function() {

        $('.faq_question').click(function() {

            if ($(this).parent().is('.open')){
                $(this).closest('.faq').find('.faq_answer_container').animate({'height':'0'},500);
                $(this).closest('.faq').removeClass('open');

            }else{
                var newHeight =$(this).closest('.faq').find('.faq_answer').height() +'px';
                $(this).closest('.faq').find('.faq_answer_container').animate({'height':newHeight},500);
                $(this).closest('.faq').addClass('open');
            }
        });
    });
</script>

<div class="faq_container">
    <div class="faq">
        <div class="faq_question">J'ai oublié mon mot de passe...que faire ?</div>
        <div class="faq_answer_container">
            <div class="faq_answer"> REPONSE 1</div>
        </div>

        <div class="faq_question">Puis-je modifier mon mot de passe ?</div>
        <div class="faq_answer_container">
            <div class="faq_answer" style="font-size:20px;" >Oui ! Pour cela, il faut accéder au profil utilisateur
                (passez la souris sur votre pseudo en haut à droite de l'écran),
                puis suivez les instructions en écrivant votre nouveau mot
                de passe. Nous vous conseillons de choisir un mot de passe
                sécurisé, avec des majuscules et des chiffres. Évitez votre date
                de naissance et votre nom de famille.</div>
        </div>

        <div class="faq_question">Comment ajouter un capteur ?</div>
        <div class="faq_answer_container">
            <div class="faq_answer">Pour ajouter un capteur, rendez-vous sur la page "Gestion des pièces",
                puis sélectionner la pièce correspondante. Enfin, cliquez sur "+"
                et laissez vous guider.</div>
        </div>


        <div class="faq_question">Je souhaite obtenir des conseils concernant l'architecture de mes capteurs.
            Comment dois-je m'y prendre ?</div>
        <div class="faq_answer_container">
            <div class="faq_answer">En bas de la page se trouve un lien "Nous contacter" qui sert à nous envoyer un mail.
                Nous serons ravis de vous répondre dans les plus brefs délais.</div>
        </div>

    </div>
</div>
<!--
    <div class="conteneur_total">
        <div class="conteneur_questions">
            <div class="ligne">
                    BONJOUR
            </div>
        </div>
    </div>
-->
</body>
</html>