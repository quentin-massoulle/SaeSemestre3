<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "../uploads/annonces";
    
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Créer le répertoire s'il n'existe pas
    }

    // Générer un nom de fichier unique basé sur le timestamp
    $timestamp = time();
    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $fileName = $timestamp . "." . $extension;
    $uploadFile = $uploadDir . "/" . $fileName;

    // Vérifier s'il y a des erreurs lors du téléchargement du fichier
    if ($_FILES["file"]["error"] > 0) {
        echo "Erreur : " . $_FILES["file"]["error"];
    } else {
        // Déplacer le fichier téléchargé vers le répertoire spécifié
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
            // Ajouter les informations dans la base de données
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

            $datePoste = $_POST["date"];
            $titrePoste = $_POST["titre"];
            $descriptionPoste = $_POST["description"];
            $contenuePoste = $_POST["contenue"];

            $idUtilisateur = $_SESSION['id_utilisateur'];

            $urlPhoto = "./uploads/annonces" . "/" . $fileName;

            // Requête SQL pour insérer une nouvelle photo
            // valide -> 0 because admin need to valid the announce before make it public
            $requete = $connexion->prepare("INSERT INTO Annonce(titre_poste, contenue, date_poste, description_poste, url_photo, valide, id_utilisateur) VALUES (?, ?, ?, ?, ?, 0, ?)"); 
            $requete->bind_param("sssssi", $titrePoste, $contenuePoste, $datePoste, $descriptionPoste, $urlPhoto, $idUtilisateur);

            // Exécution de la requête
            $resultat = $requete->execute();

            // Fermer la requête préparée
            $requete->close();

            // Fermer la connexion à la base de données
            $connexion->close();

            if ($resultat) {
                header('Location: ../annonces');
            } else {
                // Gérer le cas où l'insertion dans la base de données a échoué
                echo "Erreur : L'insertion dans la base de données a échoué.";
            }
        } else {
            // Gérer le cas où le déplacement du fichier a échoué
            echo "Erreur : Le déplacement du fichier a échoué.";
        }
    }
}
?>
