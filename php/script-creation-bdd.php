<?php
$serveur = "localhost";
$utilisateur = "root";
$password = "";
$dbname = "BaseCID";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $password);

// Création de la base de données
$sqlCreationDB = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($connexion->query($sqlCreationDB) === TRUE) {
    echo "Base de données créée avec succès\n";
} else {
    echo "Erreur lors de la création de la base de données : " . $connexion->error . "\n";
}

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $password, $dbname);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

// Utilisation de la base de données
$connexion->select_db($dbname);

// Création de la table
$sqlCreationTable = [
    "CREATE TABLE IF NOT EXISTS Utilisateur(
        id_utilisateur INT AUTO_INCREMENT,
        mail VARCHAR(320) NOT NULL,
        mot_de_passe VARCHAR(200) NOT NULL,
        prenom VARCHAR(50) NOT NULL,
        nom VARCHAR(50) NOT NULL,
        statut_admin BOOLEAN NOT NULL,
        CONSTRAINT pk_utilisateur PRIMARY KEY(id_utilisateur)
     );",
     
     "CREATE TABLE IF NOT EXISTS Promo(
        id_promo INT AUTO_INCREMENT,
        nom_diplome VARCHAR(100) NOT NULL,
        date_diplome year NOT NULL,
        CONSTRAINT pk_promo PRIMARY KEY(id_promo)
     );",
     
     "CREATE TABLE IF NOT EXISTS Adherent(
        id_adherent INT AUTO_INCREMENT,
        visible BOOLEAN NOT NULL,
        id_promo INT NOT NULL,
        id_utilisateur INT NOT NULL,
        CONSTRAINT pk_adherent PRIMARY KEY(id_adherent),
        CONSTRAINT uq_utilisateur_id UNIQUE(id_utilisateur),
        CONSTRAINT fk_id_promo FOREIGN KEY(id_promo) REFERENCES Promo(id_promo),
        CONSTRAINT fk_id_utilisateur_adherent FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
     );",
     
     "CREATE TABLE IF NOT EXISTS Annonce(
        id_annonce INT AUTO_INCREMENT,
        titre_poste VARCHAR(50) NOT NULL,
        contenue VARCHAR(500) NOT NULL,
        date_poste DATE NOT NULL,
        description_poste VARCHAR(100) NOT NULL,
        url_photo VARCHAR(200) NOT NULL,
        valide BOOLEAN NOT NULL,
        id_utilisateur INT NOT NULL,
        CONSTRAINT pk_annonce PRIMARY KEY(id_annonce),
        CONSTRAINT fk_id_utilisateur_annonce FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
     );",
     
     "CREATE TABLE IF NOT EXISTS Photo(
        id_photo INT AUTO_INCREMENT,
        url_photo VARCHAR(200) NOT NULL,
        date_poste DATE NOT NULL,
        description_poste VARCHAR(100) NOT NULL,
        valide BOOLEAN NOT NULL,
        id_utilisateur INT NOT NULL,
        CONSTRAINT pk_photo PRIMARY KEY(id_photo),
        CONSTRAINT fk_id_utilisateur_photo FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
     );",
     
     "CREATE TABLE IF NOT EXISTS Evenement(
        id_evenement INT AUTO_INCREMENT,
        date_evenement DATE NOT NULL,
        description_evenement VARCHAR(50) NOT NULL,
        url_photo VARCHAR(200) NOT NULL,
        titre VARCHAR(50) NOT NULL,
        valide BOOLEAN NOT NULL,
        id_utilisateur INT NOT NULL,
        CONSTRAINT pk_evenement PRIMARY KEY(id_evenement),
        CONSTRAINT fk_id_utilisateur_evenement FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
     );",
     
     "CREATE TABLE IF NOT EXISTS ParticipationEvenement(
        id_utilisateur INT NOT NULL,
        id_evenement INT NOT NULL,
        CONSTRAINT pk_participation_evenement PRIMARY KEY(id_utilisateur, id_evenement),
        CONSTRAINT fk_id_utilisateur_participation_evenement FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
        CONSTRAINT fk_id_evenement FOREIGN KEY(id_evenement) REFERENCES Evenement(id_evenement)
     );"
];

foreach ($sqlCreationTable as $requete) {
    if ($connexion->query($requete)) {
        echo "Table créée avec succès.\n";
    } else {
        echo "Erreur lors de la création de la table : " . $connexion->error . "\n";
    }
}

// Fermer la connexion
$connexion->close();
?>
