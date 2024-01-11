<?php
// supprimer-photo.php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['admin'])) {
    if (isset($_POST['liste-annonces']) && is_array($_POST['liste-annonces'])) {
        include 'pdo.php';
        foreach ($_POST['liste-annonces'] as $id_annonce) {

            // Si Photo + User = Right -> Delete
            $requete = $connexion->prepare("DELETE FROM Annonce WHERE id_annonce = ?");
            $requete->bind_param("i", $id_annonce);
            $requete->execute();
        }

        // Rediriger ou afficher un message de confirmation
        $_SESSION["notif"] = "[ADMIN] Annonces(s) supprimer.";
        header('Location: ../gerer-annonce');
        exit();
    } else {
        $_SESSION["notif"] = "[ADMIN] La suppression des/de la annonce(s) a échouer.";
        header('Location: ../gerer-annonce');
        exit();
    }
}
else {
    $_SESSION["notif"] = "[ADMIN] La suppression des/de la annonce(s) a échouer.";
    header('Location: ../gerer-annonce');
    exit();
}
?>