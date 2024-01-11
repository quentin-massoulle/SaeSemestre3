<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idAnnonceToDelete = $_POST["id-photo-to-delete"];

    include './pdo.php';

    $requete = $connexion->prepare("DELETE FROM Photo WHERE id_photo = ?");
    $requete->bind_param("i", $idAnnonceToDelete);
    $resultat = $requete->execute();

    $requete->close();

    $connexion->close();

    if ($resultat) {
        $_SESSION['notif'] = "Photo supprimer avec succès.";
        header('Location: ../gerer-photos');
        exit();
    } else {
        $_SESSION['notif'] = "Erreur lors de la supppression de la photo.";
        header('Location: ../gerer-photos');
        exit();
    }
} else {
    $_SESSION['notif'] = "Erreur lors de la supression de la photo.";
    header('Location: ../gerer-photos');
    exit();
}

?>
