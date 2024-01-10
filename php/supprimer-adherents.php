<?php
// supprimer-adherents.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['adherents']) && is_array($_POST['adherents'])) {
        include 'pdo.php';  // Inclure votre fichier de connexion à la base de données

        foreach ($_POST['adherents'] as $id_adherent) {
            $requete = $connexion->prepare("DELETE FROM adherent WHERE id_adherent = ?");
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
