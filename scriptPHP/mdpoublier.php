<?php
include 'generer-mdp.php';


function envoyerEmail($to) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "BaseCID";

    // Connexion à la base de données
    $connexion = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    // Générer un nouveau mot de passe
    $nouveauMotDePasse = genererMotDePasse();

    // Hasher le nouveau mot de passe avant de l'envoyer par e-mail
    $hashedNouveauMotDePasse = password_hash($nouveauMotDePasse, PASSWORD_BCRYPT);

    // Requête SQL avec une requête préparée
    $requete = $connexion->prepare("UPDATE Utilisateur SET mot_de_passe=? WHERE mail=?");
    $requete->bind_param("ss", $hashedNouveauMotDePasse, $to);

    // Exécution de la requête
    $requete->execute();

    // Vérification de la mise à jour
    if ($requete->affected_rows > 0) {
        // Envoi de l'e-mail avec le nouveau mot de passe
        $subject = "Réinitialisation du mot de passe";
        $message = "Votre nouveau mot de passe du CID est : $nouveauMotDePasse";
        $headers = "De : cid@teste.com";
        mail($to, $subject, $message, $headers);

    }
    // Fermer la connexion à la base de données
    $connexion->close();
    header("Location: ../accueil");
}

// Rediriger l'utilisateur ou afficher un message de confirmation, etc.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la valeur du champ "resetEmail"
    $resetEmail = $_POST['resetEmail'];

    // Appeler la fonction envoyerEmail
    envoyerEmail($resetEmail);
}
exit();
?>