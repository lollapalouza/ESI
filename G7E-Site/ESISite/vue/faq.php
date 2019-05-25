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

    // Si tous les champs ne sont pas remplis, renvoie une erreur
    if (empty($_POST['mail']) || empty($_POST['QuestionUtilisateur']) ) //verifier si les champs sont vides ou non
    {
        $erreur = 'Tous les champs doivent être remplis';
        echo "2";
    }
    // Envoi de mail
    else {
        echo "3";
        //$adresse_anvi = "anvi.maisonconnectee@gmail.com";
        $header = "MIME-Version:1.0\r\n";
        $header.= 'From:"support ANVI"<anvi.maisonconnectee@gmail.com>'."\n";
        $header.= 'Content-Type:text/html; cahset="utf-8"'."\n";
        $header.= 'Content-Transfer-Encoding: 8bit';
        ini_set('display_errors', 1);
        ini_set('SMTP','smtp.gmail.com');
        //ini_set('sendmail_from', $adresse_mail_utilisateur);
        error_reporting(E_ALL);

        $corpsdumail = '
        <html>
            <body>
                <div>
                    Adresse mail de l\'expediteur : '.$adresse_mail_utilisateur.'<br>
                    '.nl2br($question_utilisateur).'
                </div>
            </body>
        </html>';

        //$from = $adresse_anvi;
        $subject = "Question d'un utilisateur";
        //$message = '<html> <body> <div> $question_utilisateur; </div></body></html>';
        mail("anvi.maisonconnectee@gmail.com", $subject, $corpsdumail, $header);
        echo "Mail envoye  avec succes";
    }
}
?>

<!DOCTYPE html>
<html align="center">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vue/CSS/css.faq.css"/>
    <title> ESI - FAQ</title>

    <!-- Permet de montrer/cacher les reponses -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.question').click(function() {
                if ($(this).parent().is('.open')) {
                    $(this).closest('.conteneur_faq').find('.reponse').slideUp();
                    $(this).closest('.conteneur_faq').removeClass('open');
                } else {
                    $('.reponse').slideUp();
                    $('.conteneur_faq').removeClass('open');
                    $(this).closest('.conteneur_faq').find('.reponse').slideDown();
                    $(this).closest('.conteneur_faq').addClass('open');
                }
            });
        });
    </script>
</head>
<body>

<!-- Bloc pour rediger sa question -->
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

<div class="conteneur_faq open">
    <ul id="questionreponse">
    </ul>

    <!-- Permet d'afficher directement les questions a partir de la BDD -->
    <?php
    $tabid = array();
    $tabquestion = array();
    $tabreponse = array();
    $data2 = recuperer_faq($bdd);
    foreach($data2 as $value) {
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

            newquestion.id = tabid_php[i];
            newreponse.id = tabid_php[i];

            newquestion("click", function () {
                onpageshow(newreponse);
            });


            document.getElementById('questionreponse').appendChild(newquestion);
            document.getElementById('questionreponse').appendChild(newreponse);


        }
    </script>



</div>

</body>

</html>
