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
Flight::map('notFound', function(){
   echo "<p>404. la route spécifiée n'existe pas</p>";
});

//
//fin du fichier, pas d'autre code que les routes
?>
