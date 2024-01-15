<!DOCTYPE html>
<html lang="fr" translate="no">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/photos.css" rel="stylesheet" type="text/css" />
    <title>Photo</title>
    <link rel="icon" href="./images/logo-cid-carre.png" type="image/png">
</head>
<body>
  <script src="./js/photo.js"></script>

    <div class="container-haut">
      <div class="titre">Photos</div>

      <script src="script.js"></script>

    </div>
  <div class="container-item">
    {foreach $data_photo as $photo}
    <div class="ligne">
        <div class="container-photo">
            <img src="{$photo.photo_profil}" alt="photo de profil" />
        </div>
        <div class="info">
            <div class="photo-info">
                <img src="{$photo.url_photo}" alt="illustration" />
            </div>
            <div class="texte-info">
                <p class="p1">{$photo.date_poste} promo diplome année</p>
                <p class="p2"></p>
                <p class="p3">Posté par {$photo.nom} {$photo.prenom}</p>
                <p class="p4">{$photo.description_poste}</p>
            </div>
        </div>
    </div>
{/foreach}
  </div>


<button class="importer-photo" id="openPopupBtn">Importer une photo</button>

<div class="popup" id="importPopup">
  <h2>Importer de photos</h2>
  <form id="uploadForm" action="./php/import-photo.php" method="post" enctype="multipart/form-data">
    <label for="date">Date :</label>
    <input type="date" id="date" name="date" placeholder="YYYY-MM-DD" required>
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" placeholder="Titre de la photo..." required>
    <label for="legende">Légende :</label>
    <textarea id="legende" name="legende" required></textarea>
    <label for="file">Sélectionner une photo :</label>
    <input type="file" name="file" id="file" accept="image/*">
    <button type="submit" id="submitBtn">Envoyer</button>
    <button type="button" id="closePopupBtn">Fermer</button>
  </form>
</div>
</body>
</html>
