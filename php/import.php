<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "../uploads/photos"; // Répertoire où vous souhaitez enregistrer les photos

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Créer le répertoire s'il n'existe pas
    }

    $date = $_POST["date"];
    $legende = $_POST["legende"];

    // Générer un nom de fichier unique basé sur le timestamp
    $timestamp = time();
    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $fileName = $timestamp . "." . $extension;
    $utilisateur = $_SESSION['utilisateur'];
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
            
            // Requête SQL pour insérer une nouvelle photo
            $requete = $connexion->prepare("INSERT INTO Photo (url_photo, date_poste, description_poste, valide, id_utilisateur) VALUES (?, ?, ?, 1, ?)");
            $requete->bind_param("sssi", $uploadFile, $date, $legende, $utilisateur);

            // Exécution de la requête
            $resultat = $requete->execute();

            // Fermer la requête préparée
            $requete->close();

            // Fermer la connexion à la base de données
            $connexion->close();

            if ($resultat) {
                header('Location: ../photos');
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
