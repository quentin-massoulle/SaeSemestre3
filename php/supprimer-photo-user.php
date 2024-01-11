<?php
// supprimer-photo.php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['liste-photos']) && is_array($_POST['liste-photos'])) {
        include 'pdo.php';
        foreach ($_POST['liste-photos'] as $id_photo) {
            $id_utilisateur = $_SESSION["id_utilisateur"];

            // Si Photo + User = Right -> Delete
            $requete = $connexion->prepare("DELETE FROM Photo WHERE id_photo = ? AND id_utilisateur = ?");
            $requete->bind_param("ii", $id_photo, $id_utilisateur);
            $requete->execute();
        }

        // Rediriger ou afficher un message de confirmation
        $_SESSION["notif"] = "Photo(s) supprimer.";
        header('Location: ../gerer-photo');
        exit();
    } else {
        $_SESSION["notif"] = "La suppression des/de la photo(s) a échouer";
        header('Location: ../gerer-photo');
        exit();
    }
}
else {
    $_SESSION["notif"] = "La suppression des/de la photo(s) a échouer";
    header('Location: ../gerer-photo');
    exit();
}
?>