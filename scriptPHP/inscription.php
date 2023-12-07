<?php

function inscriptionUtilisateur($email, $prenom, $nom, $promo) {
    // Paramètres de connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nomBaseDeDonnees = "BaseCID";
    include './envoiemdp';

    // Connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nomBaseDeDonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    }

    // Requête pour compter le nombre total d'utilisateurs
    $resultatCount = $connexion->query("SELECT COUNT(*) AS totalUtilisateurs FROM utilisateur");
    
    // Vérifier si la requête a réussi
    if ($resultatCount) {
        // Récupérer le nombre total d'utilisateurs
        $row = $resultatCount->fetch_assoc();
        $totalUtilisateurs = $row['totalUtilisateurs'] + 1;

        // Préparer la requête d'insertion
        $requete = $connexion->prepare("INSERT INTO utilisateur (ID_Utilisateur, Mails, mdp, Prénom, nom, Statu) VALUES (?, ?, ?, ?, ?, ?)");

        // Vérifier si la requête a été préparée avec succès
        if ($requete) {
            // Initialiser le statut par défaut
            $statut = "aderant";
            $motDePasseGenere = genererMotDePasse(16);
            
            // Liaison des paramètres
            $requete->bind_param("isssss", $totalUtilisateurs,$email,$motDePasseGenere, $prenom, $nom, $statut);

            // Exécution de la requête
            if ($requete->execute()) {
                // Succès de l'insertion
                echo "Inscription réussie !";
                envoyerEmail($email, $motDePasseGenere,"inscrition au cid");
                
            } else {
                // Erreur lors de l'insertion
                echo "Erreur lors de l'inscription : " . $requete->error;
            }

            // Fermeture de la requête
            $requete->close();
        } else {
            // Erreur lors de la préparation de la requête
            echo "Erreur lors de la préparation de la requête : " . $connexion->error;
        }

        // Fermeture du résultat
        $resultatCount->close();
    } else {
        // Erreur lors du comptage des utilisateurs
        echo "Erreur lors du comptage des utilisateurs : " . $connexion->error;
    }

    // Fermer la connexion
    $connexion->close();
}


function genererMotDePasse($longueur = 12) {
    // Caractères possibles dans le mot de passe
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // Mélanger les caractères
    $melangeCaracteres = str_shuffle($caracteres);

    // Extraire la sous-chaîne de la longueur souhaitée
    $motDePasse = substr($melangeCaracteres, 0, $longueur);

    return $motDePasse;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $promo = $_POST["promo"];
    // Appeler la fonction d'inscription
    inscriptionUtilisateur($email, $prenom, $nom, $promo);
}

?>
