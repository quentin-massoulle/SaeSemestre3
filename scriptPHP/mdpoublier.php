<?php
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

    // Requête SQL avec une requête préparée
    $requete = $connexion->prepare("SELECT mdp FROM utilisateur WHERE mails=? ");
    $requete->bind_param("s", $to);

    // Exécution de la requête
    $requete->execute();

    // Récupération des résultats
    $resultat = $requete->get_result();

    // Vérification de l'authentification
    if ($resultat->num_rows > 0) {
        // Récupérer les données de l'utilisateur
        $row = $resultat->fetch_assoc();
        
        // Récupérer le mot de passe depuis la base de données
        $mdp = $row['mdp'];

        echo "Utilisateur trouvé dans la base de données.";

        // Fermer la requête préparée
        $requete->close();

        // Fermer la connexion à la base de données
        $connexion->close();

        $subject = "mdpoublier";
        $message = "Votre mot de passe du CID est : $mdp";
        $headers = "De : cid@teste.com";
        // Envoi de l'e-mail
        mail($to, $subject, $message, $headers);
    } else {
        echo "Utilisateur non trouvé dans la base de données.";

        // Fermer la requête préparée
        $requete->close();

        // Fermer la connexion à la base de données
        $connexion->close();
    }
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