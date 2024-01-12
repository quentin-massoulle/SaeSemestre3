<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "../uploads/photos";
    
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Créer le répertoire s'il n'existe pas
    }

    // Générer un nom de fichier unique basé sur le timestamp
    $timestamp = time();
    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $fileName = $timestamp . "." . $extension;
    $uploadFile = $uploadDir . "/" . $fileName;

    $idPhoto = $_POST['id-photo'];
    $datePoste = $_POST["date"];
    $titrePoste = $_POST["titre"];
    $descriptionPoste = $_POST["description"];
    $urlPhoto = "./uploads/photos/" . $fileName;

    $idUtilisateur = $_SESSION['id_utilisateur'];

    include './pdo.php';

    // si fichier non telecharger
    if ($_FILES["file"]["error"] == 4) {
        $requete = $connexion->prepare("
            UPDATE Photo 
            SET titre_poste=?, description_poste=?, date_poste=?, valide=0 
            WHERE id_photo=?
        ");
        $requete->bind_param("sssi", $titrePoste, $descriptionPoste, $datePoste, $idPhoto);

        // Exécution de la requête
        $resultat = $requete->execute();

        // Fermer la requête préparée
        $requete->close();

        $connexion->close();

        if ($resultat) {
            $_SESSION['notif'] = "Photo modifier avec succès.";
            header('Location: ../gerer-photos');
            exit();
        } else {
            $_SESSION['notif'] = "Erreur lors de la modification de la photo.";
            header('Location: ../gerer-photos');
            exit();
        }
    } else {

        // Déplacer le fichier téléchargé vers le répertoire spécifié
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
            $requete = $connexion->prepare("
                UPDATE Photo 
                SET titre_poste=?, date_poste=?, description_poste=?, url_photo=?, valide=0 
                WHERE id_photo=?
            ");
            $requete->bind_param("ssssi", $titrePoste, $datePoste, $descriptionPoste, $urlPhoto, $idPhoto);

            // Exécution de la requête
            $resultat = $requete->execute();

            // Fermer la requête préparée
            $requete->close();

            $connexion->close();

            if ($resultat) {
                $_SESSION['notif'] = "Photo modifier avec succès.";
                header('Location: ../gerer-photos');
                exit();
            } else {
                $_SESSION['notif'] = "Erreur lors de la modification de la photo.";
                header('Location: ../gerer-photos');
                exit();
            }
        } else {
            $_SESSION['notif'] = "Erreur lors de la modification de la photo";
            header('Location: ../gerer-photos');
            exit();
        }
    }
}
?>
