<?php

session_start(); // Démarrez la session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_connexion = $_POST['email_connexion'];
    $password_connexion = $_POST['password_connexion'];

    // Appeler la fonction d'authentification
    authentifierUtilisateur($email_connexion, $password_connexion);
}

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

    //echo $password_connexion;
    //$hashedPassword = password_hash($password_connexion, PASSWORD_BCRYPT);
    //echo $hashedPassword;

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
            $_SESSION['utilisateur'] = $utilisateur['id_utilisateur'];

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