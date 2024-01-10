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
            $requete = $connexion->prepare("DELETE FROM Photo WHERE id_utilisateur = ?");
            $requete->bind_param("i", $id_adherent);
            $requete->execute();

            // Supprimer l'adhérent
            $requete = $connexion->prepare("DELETE FROM Adherent WHERE id_adherent = ?");
            $requete->bind_param("i", $id_adherent);
            $requete->execute();
        }

        // Rediriger ou afficher un message de confirmation
        header('Location: ../liste-adherent');
    } else {
        header('Location: ../liste-adherent');
    }
}
?>

?>
