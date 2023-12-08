<?php
//
//inclure Flight avec le bon chemin
//
require './include/flight-master/flight/Flight.php';
//
//inclure Smarty avec le bon chemin
//
//require '';
require './include/smarty-4.2.1/libs/Smarty.class.php';
//
//inclure le fichier de routes
//

//require '';
require './routes.php';

//
//copier le code de configuration de Flight/Smarty
//

Flight::register('view', 'Smarty', array(), function($smarty){
    $smarty->template_dir = './templates/';
    $smarty->compile_dir = './templates_c/';
    $smarty->config_dir = './config/';
    $smarty->cache_dir = './cache/';
   });
   //ajoute une méthode render à Flight qui affiche un template
   //en lui transmettant un tableau de données
    Flight::map('render', function($template, $data){
    Flight::view()->assign($data);
    Flight::view()->display($template);
   });


//
//copier le code de la fonction render
//


//
//exercice PDO : enregistrer la variable pdo avec Flight::set
//



//
//démarrer Flight (traite les requêtes et appelle la bonne fonction)
//
Flight::route('/',function(){echo "route /";});

Flight::start();

?>