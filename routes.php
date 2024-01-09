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

Flight::route('/annonces', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        if(isset($_SESSION['admin'])) {
            include_once './templates/header-admin.tpl';
        }
        else {
            include_once './templates/header.tpl';
        }

        include_once './templates/annonces.tpl';

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
    if(isset($_SESSION['admin'])) {
        include_once './templates/header-admin.tpl';
    }
    else {
        include_once './templates/header.tpl';
    }
    $uploadDir = 'uploads';

    // Obtenir la liste des fichiers dans le répertoire
    $files = scandir($uploadDir);

    // Filtrer les fichiers pour ne prendre que les fichiers JPG
    $imageFiles = array_filter($files, function($file) {
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return $extension == 'jpg';
    });
    $data = array(
        'imageFiles' => $imageFiles,
        'uploadDir' => $uploadDir
    );

    Flight::render('photo.tpl',$data);
    include_once 'templates/footer.tpl';
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
