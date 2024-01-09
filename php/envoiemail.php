<?php

function envoyerEmail($to, $mdp,$sujet) {
    $subject = "$sujet ";
    $message = " $mdp";
    $headers = "De : cid@teste.com";

    // Envoi de l'e-mail
    mail($to, $subject, $message, $headers);
}
?>