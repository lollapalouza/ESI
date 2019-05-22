<?php
/**
 * Page de la foire aux questions
 */
include ('modeles/requete.faq.php');

if(isset($_POST['formvalidation']))
{
    echo "1";
    $adresse_mail_utilisateur = htmlspecialchars($_POST['mail']);
    $question_utilisateur = htmlspecialchars($_POST['QuestionUtilisateur']);
    if (empty($_POST['mail']) || empty($_POST['QuestionUtilisateur']) ) //verifier si les champs sont vides ou non
        {
            $erreur = 'Tous les champs doivent être remplis';
            echo "2";
        }
    else {
        echo "3";
        //$adresse_anvi = "esi.mamaison@gmail.com";
        ini_set('display_errors', 1);
        ini_set('SMTP','smtp.google.com');
        ini_set('sendmail_from', $adresse_mail_utilisateur);
        error_reporting(E_ALL);
        $from = $adresse_mail_utilisateur;
        $to = "hubert.laurent.isep@gmail.com";
        //$to = $adresse_anvi;
        $subject = "Question d'un utilisateur";
        $message = $question_utilisateur;
        $mail_envoye = mail($from, $to, $subject, $message);

        if($mail_envoye) echo "Mail envoye  avec succes";
        else echo "Erreur d'envoi du Mail ";
        }
    }
?>

<!DOCTYPE html>
<html align="center">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.faq.css"/>
    <title> ESI - FAQ</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.faq_question').click(function() {
                if ($(this).parent().is('.open')) {
                    $(this).closest('.faq').find('.faq_answer_container').slideUp();
                    $(this).closest('.faq').removeClass('open');
                } else {
                    $('.faq_answer_container').slideUp();
                    $('.faq').removeClass('open');
                    $(this).closest('.faq').find('.faq_answer_container').slideDown();
                    $(this).closest('.faq').addClass('open');
                }
            });
        });
    </script>
</head>
<body>


<div class = "BlocEcritureQuestion">
    <table align="center">
        <form method="POST" action="">
            <tr>
             <td><br>
                   Si votre question ne figure pas parmi les propositions ci-dessous, vous pouvez
                   l'écrire ici, un membre de l'équipe support vous répondra dans les plus brefs délais :
                </td>
            </tr>

            <tr>
                <td><br>
                    <input class="Mail_utilisateur" type="text"
                           placeholder="Votre adresse mail" name="mail" id="mail"
                           value=""
                    <br>
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
                <td><br>
                    <input class="ValidationQuestion" type="submit" name="formvalidation" value="Soumettre" />
                </td>
            </tr>
        </form>
    </table>
</div>

<div class="conteneur_faq">
    <ul id="questionreponse">
    </ul>

    <?php
    $tabid = array();
    $tabquestion = array();
    $tabreponse = array();
    $data2 = recuperer_faq($bdd);
    foreach($data2 as $value){
        $tabid[] = $value["ID"];
        $tabquestion[] = $value["Question"];
        $tabreponse[] = $value["Reponse"];
    }
    $tab_to_json_question = json_encode((array)$tabquestion);
    $tab_to_json_reponse = json_encode((array)$tabreponse);
    $tab_to_json_id = json_encode((array)$tabid);
    ?>

    <script type="text/javascript">
        var tabreponse_php = <?php echo $tab_to_json_reponse ?>;
        var tabid_php = <?php echo $tab_to_json_id ?>;
        var tabquestion_php = <?php echo $tab_to_json_question ?>;

        for (var i=0; i< tabid_php.length; i++){
            var newquestion = document.createElement("LI");
            var newreponse = document.createElement("LI");

            var question = tabquestion_php[i];
            var reponse = tabreponse_php[i];

            newquestion.innerHTML = question;
            newreponse.innerHTML = reponse;

            newquestion.className = "question";
            newreponse.className = "reponse";

            document.getElementById('questionreponse').appendChild(newquestion);
            document.getElementById('questionreponse').appendChild(newreponse);
        }
    </script>

</div>

</body>

</html>