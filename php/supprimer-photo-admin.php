<?php
// supprimer-photo.php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['admin'])) {
    if (isset($_POST['liste-photos']) && is_array($_POST['liste-photos'])) {
        include 'pdo.php';
        foreach ($_POST['liste-photos'] as $id_photo) {

            // Si Anonnce + User = Right -> Delete
            $requete = $connexion->prepare("DELETE FROM Photo WHERE id_photo = ?");
            $requete->bind_param("i", $id_photo,);
            $requete->execute();
        }

        // Rediriger ou afficher un message de confirmation
        $_SESSION["notif"] = "[ADMIN] Photo(s) supprimer.";
        header('Location: ../gerer-photo');
        exit();
    } else {
        $_SESSION["notif"] = "[ADMIN] La suppression des/de la photo(s) a échouer";
        header('Location: ../gerer-photo');
        exit();
    }
}
else {
    $_SESSION["notif"] = "[ADMIN] La suppression des/de la photo(s) a échouer";
    header('Location: ../');
    exit();
}
?>