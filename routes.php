<?php

session_start();

Flight::route('/', function(){
    if(!isset($_SESSION['login']))
    {
        
        include_once 'templates/index.tpl';
        $_SESSION['login'] = true;
    } else {
        Flight::redirect('/accueil');
    }
});
//
//déclaration des routes ici
//
Flight::route('/index', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );

    Flight::render('index.tpl',$data);
});
Flight::route('/accueil', function(){
    if(isset($_SESSION['login']))
    {
        include_once 'templates/header.tpl';
        $data = array(
            'titre' => 'Titre de test',
            'route' => 'Route de test'
        );

        Flight::render('accueil.tpl',$data);
        include_once 'templates/footer.tpl';
    } else {
        Flight::redirect('/');
    }
    
});
Flight::route('/administration.html', function(){

    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('administration.tpl',$data);
});
Flight::route('/annonce-admin.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('annonce-admin.tpl',$data);
});

Flight::route('/annonce', function(){
    include_once 'templates/header.tpl';
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('annonce.tpl',$data);
    include_once 'templates/footer.tpl';
});
Flight::route('/consulter-profil', function(){
    include_once 'templates/header.tpl';
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('consulter-profil.tpl',$data);
    include_once 'templates/footer.tpl';
});
Flight::route('/liste-adherent', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('liste-adherent.tpl',$data);
});
Flight::route('/modifier-annoces', function(){
    include_once 'templates/header.tpl';
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('modifier-annoces.tpl',$data);
    include_once 'templates/footer.tpl';
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
