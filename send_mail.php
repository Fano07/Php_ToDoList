<?php
    include_once "config_www/config.php";

    $headers ='From: "nom"<$from_mail>'."\n";
    $headers .='Reply-To: $reply_mail'."\n";
    $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
    $headers .='Content-Transfer-Encoding: 8bit';

    if (empty($message)) {$message="Hello wordl To do list test";}//J'utilise cette ligne pour mes tests


    if(mail($destinataire_mail, $sujet_mail, $message_mail, $headers))
    {
         echo 'Le message a bien été envoyé';
    }
    else
    {
         echo 'Le message n\'a pu être envoyé';
    }
?>
