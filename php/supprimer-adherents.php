<?php
// supprimer-adherents.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['adherents']) && is_array($_POST['adherents'])) {
        include 'pdo.php';
        foreach ($_POST['adherents'] as $id_adherent) {
            // Supprimer les annonces de l'adhérent
            $requete = $connexion->prepare("DELETE FROM Annonce WHERE id_utilisateur = ?");
            $requete->bind_param("i", $id_adherent);
            $requete->execute();

            $requete = $connexion->prepare("DELETE FROM Photo WHERE id_utilisateur = ?");
            $requete->bind_param("i", $id_adherent);
            $requete->execute();

            // Supprimer les photos de l'adhérent
            $requete = $connexion->prepare("DELETE FROM adherent WHERE id_utilisateur = ?");
            $requete->bind_param("i", $id_adherent);
            $requete->execute();

            // Supprimer l'adhérent
            $requete = $connexion->prepare("DELETE FROM utilisateur WHERE id_utilisateur = ?");
            $requete->bind_param("i", $id_adherent);
            $requete->execute();
        }

        $_SESSION["notif"] = "Adhérent(s) supprimer.";
        header('Location: ../liste-adherent');
        exit();
    } else {
        $_SESSION["notif"] = "[ADMIN] La suppression des/de l'adhérent(s) a échouer.";
        header('Location: ../liste-adherent');
        exit();
    }
} else {
    $_SESSION["notif"] = "[ADMIN] La suppression des/de l'adhérent(s) a échouer.";
    header('Location: ../liste-adherent');
    exit();
}
    
?>
