<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $ancienMotDePasse = $_POST["ancienMotDePasse"];
    $nouveauMotDePasse = $_POST["nouveauMotDePasse"];
    $confirmation = $_POST["confirmation"];

    // Vérifier si les mots de passe correspondent
    if ($nouveauMotDePasse !== $confirmation) {
        $_SESSION['notif'] = "Les nouveaux mots de passe ne correspondent pas.";
        header('Location: ../mon-profil');
        exit();
    }

    // Vérifier si l'ancien mot de passe est correct
    $motDePasseActuel = getPasswordFromDatabase($_SESSION['utilisateur']); // Remplacez cela par la logique réelle
    if (!password_verify($ancienMotDePasse, $motDePasseActuel)) {
        $_SESSION['notif'] = "L'ancien mot de passe est incorrect.";
        header('Location: ../mon-profil');
        exit();
    }

    // Mettre à jour le mot de passe dans la base de données
    updatePasswordInDatabase($_SESSION['utilisateur'], $nouveauMotDePasse);

    $_SESSION['notif'] = "Le mot de passe a été changé avec succès.";
    header('Location: ../mon-profil'); // Redirigez vers la page d'accueil ou une autre page appropriée
    exit();
}

// Fonction pour obtenir le mot de passe actuel à partir de la base de données
function getPasswordFromDatabase($userId) {
    // Paramètres de connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nomBaseDeDonnees = "basecid";

    // Connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nomBaseDeDonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    }

    // Préparer la requête SQL
    $requete = $connexion->prepare("SELECT mot_de_passe FROM Utilisateur WHERE id_utilisateur = ?");
    $requete->bind_param("i", $userId);

    // Exécution de la requête
    $requete->execute();

    // Liaison des résultats
    $requete->bind_result($motDePasseHash);

    // Récupération des résultats
    $requete->fetch();

    // Fermeture de la requête et de la connexion
    $requete->close();
    $connexion->close();

    // Retourner le mot de passe haché
    return $motDePasseHash;
}


// Fonction pour mettre à jour le mot de passe dans la base de données
function updatePasswordInDatabase($userId, $nouveauMotDePasse) {
    // Paramètres de connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nomBaseDeDonnees = "basecid";

    // Connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nomBaseDeDonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    }

    // Hasher le nouveau mot de passe
    $nouveauMotDePasseHash = password_hash($nouveauMotDePasse, PASSWORD_BCRYPT);

    // Préparer la requête SQL
    $requete = $connexion->prepare("UPDATE Utilisateur SET mot_de_passe = ? WHERE id_utilisateur = ?");
    $requete->bind_param("si", $nouveauMotDePasseHash, $userId);

    // Exécution de la requête
    $requete->execute();

    // Fermeture de la requête et de la connexion
    $requete->close();
    $connexion->close();
}

