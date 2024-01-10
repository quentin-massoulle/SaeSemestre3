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
    $motDePasseActuel = getPasswordFromDatabase($_SESSION['id_utilisateur']); // Remplacez cela par la logique réelle
    if (!password_verify($ancienMotDePasse, $motDePasseActuel)) {
        $_SESSION['notif'] = "L'ancien mot de passe est incorrect.";
        header('Location: ../mon-profil');
        exit();
    }

    // Mettre à jour le mot de passe dans la base de données
    updatePasswordInDatabase($_SESSION['id_utilisateur'], $nouveauMotDePasse);

    $_SESSION['notif'] = "Le mot de passe a été changé avec succès.";
    header('Location: ../mon-profil'); // Redirigez vers la page d'accueil ou une autre page appropriée
    exit();
}

// Fonction pour obtenir le mot de passe actuel à partir de la base de données
function getPasswordFromDatabase($userId) {
    // Utilisation de PDO pour la connexion à la base de données
    $dsn = "mysql:host=localhost;dbname=basecid";
    $utilisateur = "root";
    $mot_de_passe = "";
    
    try {
        $connexion = new PDO($dsn, $utilisateur, $mot_de_passe);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Préparer la requête SQL
        $requete = $connexion->prepare("SELECT mot_de_passe FROM Utilisateur WHERE id_utilisateur = :userId");
        $requete->bindParam(':userId', $userId, PDO::PARAM_INT);
        
        // Exécution de la requête
        $requete->execute();
        
        // Récupération des résultats
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        
        // Fermeture de la connexion
        $connexion = null;
        
        // Retourner le mot de passe haché
        return $resultat['mot_de_passe'];
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Fonction pour mettre à jour le mot de passe dans la base de données
function updatePasswordInDatabase($userId, $nouveauMotDePasse) {
    // Utilisation de PDO pour la connexion à la base de données
    $dsn = "mysql:host=localhost;dbname=basecid";
    $utilisateur = "root";
    $mot_de_passe = "";
    
    try {
        $connexion = new PDO($dsn, $utilisateur, $mot_de_passe);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Hasher le nouveau mot de passe
        $nouveauMotDePasseHash = password_hash($nouveauMotDePasse, PASSWORD_BCRYPT);
        
        // Préparer la requête SQL
        $requete = $connexion->prepare("UPDATE Utilisateur SET mot_de_passe = :nouveauMotDePasse WHERE id_utilisateur = :userId");
        $requete->bindParam(':nouveauMotDePasse', $nouveauMotDePasseHash, PDO::PARAM_STR);
        $requete->bindParam(':userId', $userId, PDO::PARAM_INT);
        
        // Exécution de la requête
        $requete->execute();
        
        // Fermeture de la connexion
        $connexion = null;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>
