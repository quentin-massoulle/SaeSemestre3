<?php

session_start();

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
    if(isset($_SESSION['admin']) && isset($_SESSION['login'])){ // if login -> tru
        include_once './templates/header-admin.tpl';
        include_once './templates/liste-adherent.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }}
);
Flight::route('/modifier-annoces', function(){
    if(isset($_SESSION['admin']) && isset($_SESSION['login']))
    {
        include_once './templates/header-admin.tpl';
        include_once './templates/modifier-annonces.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});
Flight::route('/modifier-photo', function(){
    include_once 'templates/header.tpl';
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('modifier-photo.tpl',$data);
    include_once 'templates/footer.tpl';
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

        // Get images from photos repo
        // ----------------------------------------

        $uploadDir = './uploads/photos';

        // Obtenir la liste des fichiers dans le répertoire
        $files = scandir($uploadDir);

        // Inclure tous les types d'images
        $imageFiles = array_filter($files, function($file) use ($uploadDir) {
            return is_file($uploadDir . '/' . $file); // Utiliser le chemin complet du fichier
        });

        // ----------------------------------------


        $data = array(
            'imageFiles' => $imageFiles,
            'uploadDir' => $uploadDir
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

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "BaseCID";

        // Connexion à la base de données
        $connexion = new mysqli($servername, $username, $password, $dbname);

        // Vérification de la connexion
        if ($connexion->connect_error) {
            die("La connexion à la base de données a échoué : " . $connexion->connect_error);
        }

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
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('valider-photo.tpl',$data);
});
Flight::route('/valider-annonces', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('valider-annonces.tpl',$data);
});

Flight::map('notFound', function(){
   echo "<p>404. la route spécifiée n'existe pas</p>";
});

//
//fin du fichier, pas d'autre code que les routes
?>
