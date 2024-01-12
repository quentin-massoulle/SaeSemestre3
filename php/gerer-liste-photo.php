<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier la valeur du champ caché action
    if (isset($_POST['action'])) {
        include './pdo.php';
        
        // Redirection en fonction de la valeur du champ action
        if ($_POST['action'] == 'valider') {
            foreach ($_POST['liste-photos'] as $id_annonce) {
                // Mise à jour de la visibilité de l'annonce
                $requete = $connexion->prepare("UPDATE photo SET valide = 1 WHERE id_photo = ?");
                $requete->bind_param("i", $id_annonce);
                $requete->execute();
            }
            $_SESSION['notif'] = "photo(s) validée(s).";
        } elseif ($_POST['action'] == 'supprimer') {
            foreach ($_POST['liste-photos'] as $id_annonce) {
                $requete = $connexion->prepare("DELETE FROM photo WHERE id_photo = ?");
                $requete->bind_param("i", $id_annonce);
                $resultat = $requete->execute();

                if ($resultat) {
                    $_SESSION['notif'] = "photo(s) supprimée(s) avec succès.";
                } else {
                    $_SESSION['notif'] = "Erreur lors de la suppression de l'annonce.";
                }

                $requete->close();
            }
            $connexion->close();
        } else {
            $_SESSION['notif'] = "Opération non reconnue.";
        }

        header('Location: ../aceuille');
        exit();
    } else {
        $_SESSION['notif'] = "Action non spécifiée.";
        header('Location: ../aceuille');
        exit();
    }
}
?>
