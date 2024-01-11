<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idAnnonceToDelete = $_POST["id-annonce-to-delete"];

    include './pdo.php';

    $requete = $connexion->prepare("DELETE FROM Annonce WHERE id_annonce = ?");
    $requete->bind_param("i", $idAnnonceToDelete);
    $resultat = $requete->execute();

    $requete->close();

    $connexion->close();

    if ($resultat) {
        $_SESSION['notif'] = "Annonce supprimer avec succès.";
        header('Location: ../gerer-annonces');
        exit();
    } else {
        $_SESSION['notif'] = "Erreur lors de la supppression de l'annonce.";
        header('Location: ../gerer-annonces');
        exit();
    }
} else {
    $_SESSION['notif'] = "Erreur lors de la supression de l'annonce.";
    header('Location: ../gerer-annonces');
    exit();
}

?>
