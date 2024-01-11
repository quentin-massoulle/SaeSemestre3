<?php

session_start();
include 'php/pdo.php';

Flight::route('/', function(){
    if(!isset($_SESSION['login'])) // if login -> false
    {       
        include_once './templates/accueil-no-login.tpl';
        if(isset($_SESSION['notif'])) {
            $messageNotif = $_SESSION['notif'];
            unset($_SESSION['notif']);
            $data = array(
                'message_notif' => $messageNotif
            );
            Flight::render('notif.tpl', $data);
        }
    }
    else
    {
        Flight::redirect('/accueil');
    }
});


Flight::route('/deconnexion', function(){
    session_destroy();

    session_start();

    $_SESSION['notif'] = "Vous avez été déconnecté.";

    Flight::redirect('/');
});

Flight::route('/accueil', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        if(isset($_SESSION['admin'])) {
            include_once './templates/header-admin.tpl';
        }
        else {
            include_once './templates/header.tpl';
        }

        include_once './templates/accueil-login.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
    
});

Flight::route('/administration', function(){
    if(isset($_SESSION['admin']) && isset($_SESSION['login'])) // if login -> true
    {
        include_once './templates/header-admin.tpl';

        include_once './templates/administration.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

Flight::route('/annonces-admin', function(){
    if(isset($_SESSION['admin']) && isset($_SESSION['login'])) // if login -> true
    {
        include_once './templates/header-admin.tpl';

        include_once './templates/annonces-admin.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

Flight::route('/consulter-profil', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        if(isset($_SESSION['admin'])) {
            include_once './templates/header-admin.tpl';
        }
        else {
            include_once './templates/header.tpl';
        }

        include_once './templates/consulter-profil.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

Flight::route('/liste-adherent', function(){
    if(isset($_SESSION['admin']) && isset($_SESSION['login'])){ // if login -> true
        include_once './templates/header-admin.tpl';
        include 'php/pdo.php';

        $requete = $connexion->prepare("
            SELECT U.nom, U.prenom, U.id_utilisateur
            FROM adherent AS A
            JOIN utilisateur AS U ON A.id_utilisateur = U.id_utilisateur
            WHERE A.visible = 1;
        ");

        // Exécution de la requête
        $requete->execute();

        // Récupération des résultats
        $resultatsAdherent = $requete->get_result();

        $dataAdherent = array();

        // Vérification de l'existence de résultats
        if ($resultatsAdherent->num_rows > 0) {
            // Parcourir toutes les lignes de résultats
            while ($adherent = $resultatsAdherent->fetch_assoc()) {
                $dataAdherent[] = array(
                    'nom_adherent' => $adherent['nom'],
                    'prenom_adherent' => $adherent['prenom'],
                    'id_utilisateur' =>$adherent['id_utilisateur']
                );
            }
        }

        // ----------------------------------------

        $data = array(
            'data_adherent' => $dataAdherent // Correction du nom de la variable
        );

        Flight::render('liste-adherent.tpl', $data);
        include_once 'templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

// [ADMIN]
Flight::route('/liste-annonces-admin', function(){
    if(isset($_SESSION['admin']) && isset($_SESSION['login']))
    {
        include_once './templates/header-admin.tpl';
        include_once './templates/listes-annonces.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

// [ADMIN]
Flight::route('/listes-photo-admin', function(){
    if(isset($_SESSION['admin']) && isset($_SESSION['login']))
    {
        include_once './templates/header-admin.tpl';
        include_once './templates/listes-photos.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

// [USER]
Flight::route('/gerer-photos', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        if(isset($_SESSION['admin'])) {
            include_once './templates/header-admin.tpl';
        }
        else {
            include_once './templates/header.tpl';
        }

        if(isset($_SESSION['notif'])) {
            $messageNotif = $_SESSION['notif'];
            unset($_SESSION['notif']);
            $data = array(
                'message_notif' => $messageNotif
            );
            Flight::render('notif.tpl', $data);
        }

        include_once './templates/gerer-photos-user.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

// [USER]
Flight::route('/gerer-annonces', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        if(isset($_SESSION['admin'])) {
            include_once './templates/header-admin.tpl';
        }
        else {
            include_once './templates/header.tpl';
        }
        if(isset($_SESSION['notif'])) {
            $messageNotif = $_SESSION['notif'];
            unset($_SESSION['notif']);
            $data = array(
                'message_notif' => $messageNotif
            );
            Flight::render('notif.tpl', $data);
        }

        include './php/pdo.php';

        $id_utilisateur = $_SESSION['id_utilisateur'];

        $requete = $connexion->prepare("
            SELECT id_annonce, titre_poste, contenue, date_poste, description_poste, url_photo, valide, U.id_utilisateur, nom, prenom  
            FROM Annonce as A, Utilisateur as U 
            WHERE A.id_utilisateur = ?
        ");
        $requete->bind_param("i", $id_utilisateur);
        $requete->execute();

        // Récupération des résultats
        $resultatsAnnonces = $requete->get_result();

        $dataAnnonces = array();

        // Vérification de l'authentification
        if ($resultatsAnnonces->num_rows > 0) {
            // Parcourir toutes les lignes de résultats
            while ($annonce = $resultatsAnnonces->fetch_assoc()) {
                if($annonce['valide'] = 1) {
                    $text_valide = "Cette image est visible.";
                }
                else {
                    $text_valide = "Cette image n'est pas visible.";
                }

                $dataAnnonces[] = array(
                    'id_annonce' => $annonce['id_annonce'],
                    'titre_poste' => $annonce['titre_poste'],
                    'contenue' => $annonce['contenue'],
                    'date_poste' => $annonce['date_poste'],
                    'description_poste' => $annonce['description_poste'],
                    'url_photo' => $annonce['url_photo'],
                    'valide' => $text_valide,
                    'id_utilisateur' => $annonce['id_utilisateur'],
                    'nom' => $annonce['nom'],
                    'prenom' => $annonce['prenom']
                );
            };
        }

        // ----------------------------------------

        $data = array(
            'data_annonces' => $dataAnnonces
        );

        Flight::render('gerer-annonces-user.tpl', $data);

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

Flight::route('/mon-profil', function(){
    if(isset($_SESSION['admin'])) {
        include_once './templates/header-admin.tpl';
    }
    else {
        include_once './templates/header.tpl';
    }
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('mon-profil.tpl',$data);
    include_once 'templates/footer.tpl';
});

Flight::route('/photos', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        if(isset($_SESSION['admin'])) {
            include_once './templates/header-admin.tpl';
        } else {
            include_once './templates/header.tpl';
        }

        include './php/pdo.php';

        // Get info from annonces
        // ----------------------------------------

        $requete = $connexion->prepare("
        SELECT P.id_photo, P.url_photo, P.date_poste, P.description_poste, U.id_utilisateur, U.nom, U.prenom
        FROM Photo AS P
        JOIN Utilisateur AS U ON P.id_utilisateur = U.id_utilisateur
        WHERE P.valide = 1;
        ");

    // Exécution de la requête
    $requete->execute();

    // Récupération des résultats
    $resultatsPhotos = $requete->get_result();

    $dataPhotos = array();

    // Vérification de l'existence de résultats
    if ($resultatsPhotos->num_rows > 0) {
        // Parcourir toutes les lignes de résultats
        while ($photo = $resultatsPhotos->fetch_assoc()) {
            $dataPhotos[] = array(
                'id_photo' => $photo['id_photo'],
                'url_photo' => $photo['url_photo'],
                'date_poste' => $photo['date_poste'],
                'description_poste' => $photo['description_poste'],
                'id_utilisateur' => $photo['id_utilisateur'],
                'nom' => $photo['nom'],
                'prenom' => $photo['prenom']
            );
        }
    }

        // ----------------------------------------

        $data = array(
            'data_photo' => $dataPhotos
        );

        Flight::render('photo.tpl', $data);
        include_once 'templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

Flight::route('/annonces', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        if(isset($_SESSION['admin'])) {
            include_once './templates/header-admin.tpl';
        } else {
            include_once './templates/header.tpl';
        }

        include './php/pdo.php';

        // Get info from annonces
        // ----------------------------------------

        // If the annonce is mark OK by an admin, then we add it
        $requete = $connexion->prepare("
            SELECT id_annonce, titre_poste, contenue, date_poste, description_poste, url_photo, U.id_utilisateur, nom, prenom  
            FROM Annonce as A, Utilisateur as U 
            WHERE valide = 1 AND A.id_utilisateur = U.id_utilisateur
        ");

        // Exécution de la requête
        $requete->execute();

        // Récupération des résultats
        $resultatsAnnonces = $requete->get_result();

        $dataAnnonces = array();

        // Vérification de l'authentification
        if ($resultatsAnnonces->num_rows > 0) {
            // Parcourir toutes les lignes de résultats
            while ($annonce = $resultatsAnnonces->fetch_assoc()) {
                $dataAnnonces[] = array(
                    'id_annonce' => $annonce['id_annonce'],
                    'titre_poste' => $annonce['titre_poste'],
                    'contenue' => $annonce['contenue'],
                    'date_poste' => $annonce['date_poste'],
                    'description_poste' => $annonce['description_poste'],
                    'url_photo' => $annonce['url_photo'],
                    'id_utilisateur' => $annonce['id_utilisateur'],
                    'nom' => $annonce['nom'],
                    'prenom' => $annonce['prenom']
                );
            };
        }

        // ----------------------------------------

        $data = array(
            'data_annonces' => $dataAnnonces
        );

        Flight::render('annonces.tpl', $data);
        include_once 'templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});


Flight::route('/valider-photo', function(){
    if(isset($_SESSION['admin'])) {
        include_once './templates/header-admin.tpl';
    } else {
        include_once './templates/header.tpl';
    }
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    include_once 'templates/footer.tpl';
    Flight::render('valider-photo.tpl',$data);
});

Flight::route('/valider-annonces', function(){
    if(isset($_SESSION['admin'])) {
        include_once './templates/header-admin.tpl';
    } else {
        include_once './templates/header.tpl';
    }
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    include_once 'templates/footer.tpl';

    Flight::render('valider-annonces.tpl',$data);
});

Flight::map('notFound', function(){
    Flight::redirect('/');
});

//
//fin du fichier, pas d'autre code que les routes
?>
