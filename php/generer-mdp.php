<?php
function genererMotDePasse($longueur = 12) {
    // Caractères possibles dans le mot de passe
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // Mélanger les caractères  
    $melangeCaracteres = str_shuffle($caracteres);

    // Extraire la sous-chaîne de la longueur souhaitée
    $motDePasse = substr($melangeCaracteres, 0, $longueur);

    return $motDePasse;
}
?>