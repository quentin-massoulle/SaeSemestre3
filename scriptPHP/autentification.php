<?php
session_start(); // Démarrez la session

function authentifierUtilisateur($email_connexion, $password_connexion) {
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
    $requete = $connexion->prepare("SELECT * FROM utilisateur WHERE mails=? AND mdp=?");
    $requete->bind_param("ss", $email_connexion, $password_connexion);

    // Exécution de la requête
    $requete->execute();

    // Récupération des résultats
    $resultat = $requete->get_result();

    // Vérification de l'authentification
    if ($resultat->num_rows > 0) {
        // Fermer la requête préparée
        $requete->close();

        // Fermer la connexion à la base de données
        $connexion->close();

        return true;
    } else {
        // Fermer la requête préparée
        $requete->close();

        // Fermer la connexion à la base de données
        $connexion->close();

        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_connexion = $_POST['email_connexion'];
    $password_connexion = $_POST['password_connexion'];

    // Appeler la fonction d'authentification
    if (authentifierUtilisateur($email_connexion, $password_connexion)) {
        // Rediriger l'utilisateur vers la page souhaitée après la connexion
        header("Location: ./gggg.php");
        exit();
    } else {
        header("Location: ../accueil.html");
        // Afficher un message d'erreur si l'authentification échoue
        $error_message = "Échec de l'authentification. Veuillez vérifier vos informations.";
        // Vous pouvez gérer cette erreur comme vous le souhaitez (par exemple, l'afficher dans votre formulaire)
        exit();
    }
}
?>