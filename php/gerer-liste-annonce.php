<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier la valeur du champ caché action
    if (isset($_POST['action'])) {
        include './pdo.php';
        
        // Redirection en fonction de la valeur du champ action
        if ($_POST['action'] == 'valider') {
            foreach ($_POST['liste-annonces'] as $id_annonce) {
                // Mise à jour de la visibilité de l'annonce
                $requete = $connexion->prepare("UPDATE annonce SET valide = 1 WHERE id_annonce = ?");
                $requete->bind_param("i", $id_annonce);
                $requete->execute();
            }
            $_SESSION['notif'] = "Annonce(s) validée(s).";
        } elseif ($_POST['action'] == 'supprimer') {
            foreach ($_POST['liste-annonces'] as $id_annonce) {
                $requete = $connexion->prepare("DELETE FROM annonce WHERE id_annonce = ?");
                $requete->bind_param("i", $id_annonce);
                $resultat = $requete->execute();

                if ($resultat) {
                    $_SESSION['notif'] = "Annonce(s) supprimée(s) avec succès.";
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
