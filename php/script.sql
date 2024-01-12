CREATE TABLE Utilisateur(
   id_utilisateur INT AUTO_INCREMENT,
   mail VARCHAR(320) NOT NULL,
   photo_profil VARCHAR(200) NOT NULL,
   mot_de_passe VARCHAR(200) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   statut_admin BOOLEAN NOT NULL,
   CONSTRAINT pk_utilisateur PRIMARY KEY(id_utilisateur)
);

CREATE TABLE Promo(
   id_promo INT AUTO_INCREMENT,
   nom_diplome VARCHAR(100) NOT NULL,
   date_diplome year NOT NULL,
   CONSTRAINT pk_promo PRIMARY KEY(id_promo)
);

CREATE TABLE Adherent(
   id_adherent INT AUTO_INCREMENT,
   visible BOOLEAN NOT NULL,
   id_promo INT NOT NULL,
   id_utilisateur INT NOT NULL,
   CONSTRAINT pk_adherent PRIMARY KEY(id_adherent),
   CONSTRAINT uq_utilisateur_id UNIQUE(id_utilisateur),
   CONSTRAINT fk_id_promo FOREIGN KEY(id_promo) REFERENCES Promo(id_promo),
   CONSTRAINT fk_id_utilisateur FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Annonce(
   id_annonce INT AUTO_INCREMENT,
   numero_telephone_annonce VARCHAR(20),
   mail_annonce VARCHAR(320) NOT NULL,
   titre_poste VARCHAR(50) NOT NULL,
   contenu VARCHAR(500) NOT NULL,
   date_poste DATE NOT NULL,
   description_poste VARCHAR(100) NOT NULL,
   url_photo VARCHAR(200) NOT NULL,
   valide BOOLEAN NOT NULL,
   id_utilisateur INT NOT NULL,
   CONSTRAINT pk_annonce PRIMARY KEY(id_annonce),
   CONSTRAINT fk_id_utilisateur FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Photo(
   id_photo INT AUTO_INCREMENT,
   titre_poste VARCHAR(50) NOT NULL,
   url_photo VARCHAR(200) NOT NULL,
   date_poste DATE NOT NULL,
   description_poste VARCHAR(100) NOT NULL,
   valide BOOLEAN NOT NULL,
   id_utilisateur INT NOT NULL,
   CONSTRAINT pk_photo PRIMARY KEY(id_photo),
   CONSTRAINT fk_id_utilisateur FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);