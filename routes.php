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


Flight::route('/test-@param-@nom-@prenom.html', function($params, $nom,$prenom){
    // Créer un tableau associatif avec le paramètre de la route
    $data = array(
        'titre' => 'Titre de test avec paramètre',
        'route' => 'Route de test avec paramètre',
        'param' => $params,
        'nom'=> $nom,
        'prenom'=> $prenom
    );

    // Appeler Flight::render pour générer le rendu HTML
    Flight::render('test-param.tpl', $data);
});

Flight::route('/liste.html', function(){
    try {
        // Connexion à la base de données avec PDO
        require('../../include/pdo.php');
        // Préparer et exécuter la requête SQL pour récupérer les albums
        $ContenuTableau = $pdo -> prepare('SELECT nom_album, date_album, nom_artiste, artiste.id_artiste FROM album , artiste 
         WHERE album.id_artiste=artiste.id_artiste ');
        $ContenuTableau -> execute();
        $albums = $ContenuTableau->fetchAll(PDO::FETCH_ASSOC);
        // Fermer la connexion à la base de données
        $pdo = null;
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données
        echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
        return;
    }

    // Données pour le rendu
    $data = array(
        'titre' => 'Liste des albums',
        'albums' => $albums
        
    );

    // Appeler Flight::render pour générer le rendu HTML
    Flight::render('liste.tpl', $data);
});

// Route pour /recherche-@name.html
Flight::route('/recherche-@name.html', function($NomArtiste){
    try {
        require('../../include/pdo.php');
        // Connexion à la base de données avec PDO
        $query = $pdo -> prepare('SELECT nom_album, date_album, nom_artiste, artiste.id_artiste FROM album , artiste 
        WHERE artiste.id_artiste = album.id_artiste and nom_artiste like :NomArtiste ');
        // Lier la valeur du paramètre (échappe automatiquement les apostrophes)
        $query->bindValue(':NomArtiste', '%' . $NomArtiste . '%', PDO::PARAM_STR);
        $query->execute();
        $albums = $query->fetchAll(PDO::FETCH_ASSOC);

        // Fermer la connexion à la base de données après avoir récupéré les résultats
        $pdo = null;
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données
        echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
        return;
    }

    // Données pour le rendu
    $data = array(
        'titre' => 'Liste des albums',
        'albums' => $albums
    );

    // Appeler Flight::render pour générer le rendu HTML
    Flight::render('liste.tpl', $data);
});

Flight::route('/artiste-@name-@id.html', function($nom, $id){
    // Données pour le rendu
    require('../../include/pdo.php');
        $query = "SELECT album.nom_album, artiste.nom_artiste,album.id_artiste FROM artiste
            LEFT JOIN album ON artiste.id_artiste = album.id_artiste
            WHERE nom_artiste LIKE :NomArtiste";
        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':NomArtiste', '%' . $nom . '%', PDO::PARAM_STR);
        $stmt->execute();
        $album = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = array(
        'titre' => 'Liste des éléments',
        'param' => $nom,
        'album'=> $album
            // Ajoutez d'autres éléments au besoin
        )
    ;

    // Appeler Flight::render pour générer le rendu HTML
    Flight::render('artiste.tpl', $data);
});



//
// personnalise la page 404
//
Flight::map('notFound', function(){
   echo "<p>404. la route spécifiée n'existe pas</p>";
});

//
//fin du fichier, pas d'autre code que les routes
?>
