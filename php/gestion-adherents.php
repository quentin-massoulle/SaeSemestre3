<?php
// supprimer-adherents.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier la valeur du bouton cliqué
    if (isset($_POST['action'])) {
        include 'pdo.php';
        
        // Redirection en fonction de la valeur du bouton
        if ($_POST['action'] == 'supprimer') {
            foreach ($_POST['adherents'] as $id_adherent) {
                // Supprimer les annonces de l'adhérent
                $requete = $connexion->prepare("DELETE FROM Annonce WHERE id_utilisateur = ?");
                $requete->bind_param("i", $id_adherent);
                $requete->execute();

                $requete = $connexion->prepare("DELETE FROM Photo WHERE id_utilisateur = ?");
                $requete->bind_param("i", $id_adherent);
                $requete->execute();

                // Supprimer les photos de l'adhérent
                $requete = $connexion->prepare("DELETE FROM adherent WHERE id_utilisateur = ?");
                $requete->bind_param("i", $id_adherent);
                $requete->execute();

                // Supprimer l'adhérent
                $requete = $connexion->prepare("DELETE FROM utilisateur WHERE id_utilisateur = ?");
                $requete->bind_param("i", $id_adherent);
                $requete->execute();
            }
            $_SESSION["notif"] = "Adhérent(s) supprimé(s).";
            header('Location: ../liste-adherent');
            exit();
        } elseif ($_POST['action'] == 'valider') {
            include './envoiemail.php';
            include 'generer-mdp.php';
            foreach ($_POST['adherents'] as $id_adherent) {
                // Mise à jour de la visibilité de l'adhérent
                $requete = $connexion->prepare("UPDATE adherent SET visible = 1 WHERE id_utilisateur = ?");
                $requete->bind_param("i", $id_adherent);
                $requete->execute();
                
                // Génération du mot de passe
                $mdpGenere = genererMotDePasse(16);
                $hashedPassword = password_hash($mdpGenere, PASSWORD_BCRYPT);
                
                // Mise à jour du mot de passe de l'utilisateur
                $requete = $connexion->prepare("UPDATE utilisateur SET mot_de_passe = ? WHERE id_utilisateur = ?");
                $requete->bind_param("si", $hashedPassword, $id_adherent);
                $requete->execute();

                // Récupération de l'email de l'utilisateur
                $requete = $connexion->prepare("SELECT mail FROM utilisateur WHERE id_utilisateur = ?");
                $requete->bind_param("i", $id_adherent);
                $requete->execute();
                $resultat = $requete->get_result();

                if ($resultat->num_rows > 0) {
                    $utilisateur = $resultat->fetch_assoc();
                    $email = $utilisateur['email'];
                    envoyerEmail($email, $mdpGenere, "Inscription au CID");
                }
            }
            $_SESSION["notif"] = "Adhérent(s) validé(s) et email envoyé.";
            // Redirection après la mise à jour
            header('Location: ../liste-adherent');
            exit();
        }
    } else {
        $_SESSION["notif"] = "[ADMIN] L'opération sur l'adhérent a échoué.";
        header('Location: ../liste-adherent');
        exit();
    }
}
?>
