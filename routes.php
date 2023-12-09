<?php
//
//déclaration des routes ici
//

Flight::route('/test.html', function(){
    // Créer un tableau associatif
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('test.tpl', $data);
});
Flight::route('/accueil.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('accueil.tpl',$data);
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

Flight::route('/annonce.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('annonce.tpl',$data);
});
Flight::route('/consulter-profil.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('consulter-profil.tpl',$data);
});
Flight::route('/liste-adherent.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('liste-adherent.tpl',$data);
});
Flight::route('/modifier-annoces.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('modifier-annoces.tpl',$data);
});
Flight::route('/modifier-photo.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('modifier-photo.tpl',$data);
});
Flight::route('/mon-profil.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('mon-profil.tpl',$data);
});
Flight::route('/photo.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('photo.tpl',$data);
});
Flight::route('/valider-photo.html', function(){
    $data = array(
        'titre' => 'Titre de test',
        'route' => 'Route de test'
    );
    Flight::render('valider-photo.tpl',$data);
});
Flight::route('/valider-annonces.html', function(){
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
