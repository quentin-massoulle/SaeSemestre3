<?php

session_start(); // Démarrez la session

include 'pdo.php'; // Assurez-vous d'inclure le fichier pdo.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_connexion = $_POST['email_connexion'];
    $password_connexion = $_POST['password_connexion'];

    // Appeler la fonction d'authentification en passant la connexion comme argument
    authentifierUtilisateur($email_connexion, $password_connexion, $connexion);
}

function authentifierUtilisateur($email_connexion, $password_connexion, $connexion) {  
    // Requête SQL avec une requête préparée
    $requete = $connexion->prepare("SELECT * FROM Utilisateur WHERE mail=?");
    $requete->bind_param("s", $email_connexion);

    // Exécution de la requête
    $requete->execute();

    // Récupération des résultats
    $resultat = $requete->get_result();

    // Vérification de l'authentification
    if ($resultat->num_rows > 0) {
        // Récupération de la première ligne de résultats
        $utilisateur = $resultat->fetch_assoc();

        $storedPassword = $utilisateur['mot_de_passe'];

        if(password_verify($password_connexion, $storedPassword)) {
            $_SESSION['login'] = true;
            $_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur'];

            // Vérification du statut de l'utilisateur
            if($utilisateur['statut_admin'] == 1) {
                // Redirection vers la page d'administration
                $_SESSION['admin'] = true;
                header("Location: ../administration");
                exit(); // Assurez-vous de quitter le script après la redirection
            }
            else {
                header('Location: ../accueil');
                exit();
            }
        }
        else{
            $_SESSION['notif'] = "Echec de la connexion.<br>Veuillez verifier votre identifiant et/ou votre mot de passe.";
            header("Location: ../accueil");
            exit();
        }

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

        $_SESSION['notif'] = "Echec de la connexion.<br>Veuillez verifier votre identifiant et/ou votre mot de passe.";

        header("Location: ../");
        exit(); 
    }
}
?>