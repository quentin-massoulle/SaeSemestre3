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

    $idAnnonce = $_POST['id-annonce'];
    $datePoste = $_POST["date"];
    $titrePoste = $_POST["titre"];
    $descriptionPoste = $_POST["description"];
    $contenuePoste = $_POST["contenue"];
    $urlPhoto = "./uploads/annonces" . "/" . $fileName;

    $idUtilisateur = $_SESSION['id_utilisateur'];

    include './pdo.php';

    // si fichier non telecharger
    if ($_FILES["file"]["error"] == 4) {
        // UPDATE without url_photo
        $requete = $connexion->prepare("
            UPDATE Annonce 
            SET titre_poste=?, contenue=?, date_poste=?, description_poste=?, valide=0 
            WHERE id_annonce=?
        ");
        $requete->bind_param("ssssi", $titrePoste, $contenuePoste, $datePoste, $descriptionPoste, $idAnnonce);

        // Exécution de la requête
        $resultat = $requete->execute();

        // Fermer la requête préparée
        $requete->close();

        $connexion->close();

        if ($resultat) {
            $_SESSION['notif'] = "Annonce modifier avec succès.";
            header('Location: ../gerer-annonces');
            exit();
        } else {
            $_SESSION['notif'] = "Erreur lors de la modification de l'annonce.";
            header('Location: ../gerer-annonces');
            exit();
        }
    } else {
        // Déplacer le fichier téléchargé vers le répertoire spécifié
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
            // UPDATE without url_photo
            $requete = $connexion->prepare("
                UPDATE Annonce 
                SET titre_poste=?, contenue=?, date_poste=?, description_poste=?, url_photo=?, valide=0 
                WHERE id_annonce=?
            ");
            $requete->bind_param("sssssi", $titrePoste, $contenuePoste, $datePoste, $descriptionPoste, $urlPhoto, $idAnnonce);

            // Exécution de la requête
            $resultat = $requete->execute();

            // Fermer la requête préparée
            $requete->close();

            $connexion->close();

            if ($resultat) {
                $_SESSION['notif'] = "Annonce modifier avec succès.";
                header('Location: ../gerer-annonces');
                exit();
            } else {
                $_SESSION['notif'] = "Erreur lors de la modification de l'annonce.";
                header('Location: ../gerer-annonces');
                exit();
            }
        } else {
            $_SESSION['notif'] = "Erreur lors de la modification de l'annonce";
            header('Location: ../gerer-annonces');
            exit();
        }
    }
}
?>
