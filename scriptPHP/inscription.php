<?php

function inscriptionUtilisateur($email, $prenom, $nom, $promo) {
    if (utilisateurExiste($nom,$prenom)){
        echo "utilisateur deja cree";
    }
    else if (utilisateurDansCSV($nom, $prenom, "../Utilisateur/Diplômés-IUT-1987-2013.csv")){
        // Paramètres de connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nomBaseDeDonnees = "BaseCID";
    include './envoiemail';

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
function utilisateurExiste($nom,$prenom) {
    // Paramètres de connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nomBaseDeDonnees = "BaseCID";

    // Connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nomBaseDeDonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    }

    // Requête pour vérifier si l'utilisateur existe
    $requete = $connexion->prepare("SELECT ID_Utilisateur FROM utilisateur WHERE Prénom = ? and nom = ?");
    $requete->bind_param("ss",$prenom,$nom);
    
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
                        $nom = trim($mots[0]); // Correction : le nom est le premier élément
                        $prenom = trim($mots[1]);
                       

                        // Vérifier si le nom et le prénom correspondent
                        if (stripos($nom, $nomRecherche) !== false && stripos($prenom, $prenomRecherche) !== false) {
                            // Afficher le nom et le prénom
                            echo "Nom : $nom, Prénom : $prenom";

                            // Fermer le fichier et retourner true si l'utilisateur est trouvé
                            fclose($fichier);
                            return true;
                        }
                    }
                }
            }
        }echo ' personne de ce nom ds la base ';
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
