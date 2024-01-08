<?php


Flight::route('/', function(){
    if(!isset($_SESSION['login'])) // if login -> false
    {       
        include_once './templates/accueil-no-login.tpl';
    } 
    else
    {
        Flight::redirect('/accueil');
    }
});

Flight::route('deconnexion', function(){
    session_destroy();

    Flight::redirect('/');
});

Flight::route('/accueil', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        include_once './templates/header.tpl';

        include_once './templates/accueil-login.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
    
});

Flight::route('/administration', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        include_once './templates/header.tpl';

        include_once './templates/administration.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

Flight::route('/annonces-admin', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        include_once './templates/header.tpl';

        include_once './templates/annonces-admin.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

Flight::route('/annonces', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        include_once './templates/header.tpl';

        include_once './templates/annonces.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

Flight::route('/consulter-profil', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        include_once './templates/header.tpl';

        include_once './templates/consulter-profil.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});

Flight::route('/liste-adherent', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        include_once './templates/header.tpl';

        include_once './templates/liste-adherent.tpl';

        include_once './templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
});
Flight::route('/modifier-annoces', function(){
    if(isset($_SESSION['login'])) // if login -> true
    {
        include_once './templates/header.tpl';

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
    include_once 'templates/header.tpl';
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('mon-profil.tpl',$data);
    include_once 'templates/footer.tpl';
});
Flight::route('/photo', function(){
    include_once 'templates/header.tpl';
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
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
