<?php

include 'pdo.php';
session_start();

$verification_utilisateur = $connexion->prepare("SELECT id_utilisateur FROM Utilisateur WHERE id_utilisateur = ?");
$verification_utilisateur->bind_param("i", $_SESSION['id_utilisateur']);
$verification_utilisateur->execute();
$verification_utilisateur->store_result();

if ($verification_utilisateur->num_rows > 0) {
    // Récupération de l'id_utilisateur
    $id_utilisateur = $_SESSION['id_utilisateur'];

    // Téléchargement et enregistrement de la nouvelle photo de profil (au format PNG)
    if ($_FILES['nouvelle_photo']['type'] == 'image/png' || $_FILES['nouvelle_photo']['type'] == 'image/jpeg') {
        $nouveau_chemin_photo = "../uploads/photo_profil/{$id_utilisateur}.png";
        move_uploaded_file($_FILES['nouvelle_photo']['tmp_name'], $nouveau_chemin_photo);
        $nouveau_chemin_photo =  "./uploads/photo_profil/{$id_utilisateur}.png";
        // Mise à jour de la base de données avec le nouveau chemin de la photo de profil
        $mise_a_jour_photo_profil = $connexion->prepare("UPDATE Utilisateur SET photo_profil = ? WHERE id_utilisateur = ?");
        $mise_a_jour_photo_profil->bind_param("si", $nouveau_chemin_photo, $id_utilisateur);
        $mise_a_jour_photo_profil->execute();
        header('Location: ../mon-profil');
    } else {
        header('Location: ../mon-profil');
    }
} else {
    header('Location: ../mon-profil');
}

// Fermeture des requêtes et de la connexion
$verification_utilisateur->close();
$mise_a_jour_photo_profil->close();
$connexion->close();

?>
