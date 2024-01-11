<?php
// supprimer-photo.php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['liste-annonces']) && is_array($_POST['liste-annonces'])) {
        include 'pdo.php';
        foreach ($_POST['liste-annonces'] as $id_annonce) {
            $id_utilisateur = $_SESSION["id_utilisateur"];

            // Si Photo + User = Right -> Delete
            $requete = $connexion->prepare("DELETE FROM Annonce WHERE id_annonce = ? AND id_utilisateur = ?");
            $requete->bind_param("ii", $id_annonce, $id_utilisateur);
            $requete->execute();
        }

        // Rediriger ou afficher un message de confirmation
        $_SESSION["notif"] = "Annonces(s) supprimer.";
        header('Location: ../gerer-annonces');
        exit();
    } else {
        $_SESSION["notif"] = "La suppression des/de la annonce(s) a échouer";
        header('Location: ../gerer-annonces');
        exit();
    }
}
else {
    $_SESSION["notif"] = "La suppression des/de la annonce(s) a échouer";
    header('Location: ../gerer-annonces');
    exit();
}
?>