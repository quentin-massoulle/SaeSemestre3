<?php
include 'generer-mdp.php';

session_start(); // Démarrez la session

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $nompromo = $_POST["promo"];
    $datepromo = $_POST["date-promo"];

    // Appeler la fonction d'inscription
    inscriptionUtilisateur($email, $prenom, $nom, $nompromo, $datepromo);
}
function inscriptionUtilisateur($email, $prenom, $nom, $nompromo, $datepromo) {
    include 'pdo.php'; // Utiliser la variable $connexion déclarée dans pdo.php

<<<<<<< HEAD
    if (utilisateurExiste($email ,$prenom,$nom, $connexion)) {
        $_SESSION['notif'] = "Mail déjà utilisé.";
=======
    if (utilisateurExiste($email, $nom, $prenom)) {
        $_SESSION['notif'] = "Compte déjà créé.";
>>>>>>> 518dda631a265b6262c5783e1214a7e4e3e43733
        header('Location: ../');
        exit();
    } else {
        $statu_admin = 0 ;
        $mdpGenere = genererMotDePasse(16);
        $hashedPassword = password_hash($mdpGenere, PASSWORD_BCRYPT);
        $url_pp = '.\uploads\photo_profil\pp-base.png';

        // Requête d'insertion d'utilisateur
        $requeteUtilisateur = $connexion->prepare("INSERT INTO Utilisateur(mail, mot_de_passe, prenom, nom, statut_admin, photo_profil) VALUES (?, ?, ?, ?, ? ,?)");
        $requeteUtilisateur->bind_param("ssssis", $email, $hashedPassword, $prenom, $nom, $statu_admin, $url_pp);

        if ($requeteUtilisateur->execute()) {
            

            // Récupérer l'id de l'utilisateur nouvellement créé
            $idUtilisateur = $requeteUtilisateur->insert_id;

            // Fermer la requête
            $requeteUtilisateur->close();

            // Vérifier si la promo existe déjà
            $promoExiste = promoExiste($nompromo, $connexion);

            if (!$promoExiste) {
                // Promo n'existe pas, insertion
                $requeteInsertPromo = $connexion->prepare("INSERT INTO Promo(nom_diplome, date_diplome) VALUES (?, ?)");
                $requeteInsertPromo->bind_param("ss", $nompromo, $datepromo);
                $requeteInsertPromo->execute();
                $idPromo = $requeteInsertPromo->insert_id;
                $requeteInsertPromo->close();
            } else {
                // Promo existe, récupérer son ID
                $idPromo = obtenirIdPromo($nompromo, $connexion);
            }

            // Insérer l'adhérent dans la table Adherent
            $requeteAdherent = $connexion->prepare("INSERT INTO Adherent(visible, id_promo, id_utilisateur) VALUES (?, ?, ?)");
            $visible = 0; // Vous pouvez ajuster cela selon vos besoins
            $requeteAdherent->bind_param("iii", $visible, $idPromo, $idUtilisateur);
            $requeteAdherent->execute();
            $requeteAdherent->close();

            $_SESSION['notif'] = "Inscription réussie.<br>attendait confimation des admin.";

            header('Location: ../');
            exit();
        } else {
            echo "Erreur lors de l'inscription : " . $requeteUtilisateur->error;
        }
    }

    // Fermer la connexion à la fin de la fonction
    $connexion->close();
}


function promoExiste($nompromo) {
    include 'pdo.php';
    $requete = $connexion->prepare("SELECT id_promo FROM Promo WHERE nom_diplome = ?");
    $requete->bind_param("s", $nompromo);
    $requete->execute();
    $resultat = $requete->get_result();
    $promoExiste = $resultat->num_rows > 0;
    $requete->close();

    return $promoExiste;
}

function obtenirIdPromo($nompromo,) {
    include 'pdo.php';
    $requete = $connexion->prepare("SELECT id_promo FROM Promo WHERE nom_diplome = ?");
    $requete->bind_param("s",$nompromo);
    $requete->execute();
    $resultat = $requete->get_result();
    $row = $resultat->fetch_assoc();
    $idPromo = $row['id_promo'];
    $requete->close();

    return $idPromo;
}

<<<<<<< HEAD
function utilisateurExiste($mail,$prenom,$nom) {
    // Paramètres de connexion à la base de données
  include 'pdo.php';
=======
function utilisateurExiste($mail ,$nom,$prenom) {
    // Paramètres de connexion à la base de données
    include 'pdo.php';
>>>>>>> 518dda631a265b6262c5783e1214a7e4e3e43733
    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    }

    // Requête pour vérifier si l'utilisateur existe
<<<<<<< HEAD
    $requete = $connexion->prepare("SELECT id_utilisateur FROM Utilisateur WHERE mail=? and prenom=? and nom=?");

    $requete->bind_param("s", $email, $prenom, $nom);
=======
    $requete = $connexion->prepare("SELECT id_utilisateur FROM Utilisateur WHERE mail=? and nom =? and prenom=?");

    $requete->bind_param("sss", $mail, $nom,$prenom);
>>>>>>> 518dda631a265b6262c5783e1214a7e4e3e43733

    // Exécution de la requête
    $requete->execute();

    // Récupération des résultats
    $resultat = $requete->get_result();

    // Fermeture de la requête
    $requete->close();

    // Fermeture de la connexion
    $connexion->close();

    // Retourner true si l'utilisateur existe, false sinon
    return $resultat->num_rows > 0;
}

function utilisateurDansCSV($nomRecherche, $prenomRecherche, $cheminFichierCSV) {
    // Ouvrir le fichier CSV en mode lecture
    $fichier = fopen($cheminFichierCSV, 'r');

    // Vérifier si le fichier est ouvert avec succès
    if ($fichier) {
        // Parcourir chaque ligne du fichier
        while (($ligne = fgetcsv($fichier)) !== false) {
            // Vérifier si le tableau d'informations est valide et a au moins une colonne
            if (is_array($ligne) && count($ligne) >= 1) {
                // Utiliser str_getcsv pour analyser la ligne
                $infos = str_getcsv($ligne[0]);

                // Vérifier si la première colonne existe et n'est pas nulle
                if (isset($infos[0]) && $infos[0] !== null) {
                    $infos[0] = retirerPrefixe($infos[0]);
                    // Diviser la chaîne en un tableau de mots
                    $mots = explode(' ', $infos[0]);

                    // Extraire le nom et le prénom
                    if (count($mots) >= 2) {
                        $nom = trim($mots[0]);
                        $prenom = trim($mots[1]);

                        // Vérifier si le nom et le prénom correspondent
                        if (stripos($nom, $nomRecherche) !== false && stripos($prenom, $prenomRecherche) !== false) {
                            // Fermer le fichier et retourner true si l'utilisateur est trouvé
                            fclose($fichier);
                            return true;
                        }
                    }
                }
            }
        }
    }

    // Retourner false si l'utilisateur n'est pas trouvé ou s'il y a une erreur
    fclose($fichier);
    return false;
}

function retirerPrefixe($chaine) {
    // Liste des préfixes à retirer
    $prefixes = array('M.', 'Mlle');

    // Remplacer les préfixes par une chaîne vide
    $chaineSansPrefixe = str_replace($prefixes, '', $chaine);

    // Retourner la chaîne résultante
    return trim($chaineSansPrefixe);
}
?>
