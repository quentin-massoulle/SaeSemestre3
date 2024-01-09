<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "../uploads"; // Répertoire où vous souhaitez enregistrer les photos

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Créer le répertoire s'il n'existe pas
    }

    $date = $_POST["date"];
    $legende = $_POST["legende"];

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
            header('Location: ../photos');
            // Ajoutez ici le code pour enregistrer la date, la légende et le nom de fichier dans une base de données, par exemple.
        } else {
            header('Location: ../photos');
        }
    }
}
?>
