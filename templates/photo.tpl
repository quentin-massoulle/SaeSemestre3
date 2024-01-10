<!DOCTYPE html>
<html lang="fr" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/photos.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>
<body>
  <script src="./js/photo.js"></script>

    <div class="container-haut">
      <div class="titre">Photos</div>

      <div class="search-container">
        <div class="search-box">
          <input
            type="text"
            class="search-input"
            placeholder="Rechercher..."
          />
          <button class="search-button">
            <img src="./search-button.png" alt="" />
          </button>
        </div>
      </div>

      <div class="filter-container">
          <button class="dropdown-btn" id="dropdown-btn">Filtres</button>
          <div class="dropdown-content" id="dropdown-content">
              <a href="#">Promo</a>
              <a href="#">Année</a>
              <a href="#">Date</a>
              <a href="#">Chronologique</a>
              <a href="#">Par domaine <br> d'activité </a> 
          </div>
      </div>

      <script src="script.js"></script>

    </div>
  <div class="container-item">

{foreach $imageFiles as $image}
    <div class="ligne">
      <div class="container-photo">
        <img src="{$uploadDir}/{$image}" alt="photo de profil" />
      </div>
      <div class="info">
        <div class="photo-info">
          <img src="{$uploadDir}/{$image}" alt="illustration" />
        </div>
        <div class="texte-info">
          <p class="p1">jj/mm/aaaa promo diplome année</p>
          <p class="p2">titre photo</p>
          <p class="p3">utilisateur</p>
          <p class="p4">description</p>
        </div>
      </div>
    </div>
{/foreach}
  </div>

<button onclick="" class="importer-photo" id="openPopupBtn">Importer une photo</button>

<div class="popup" id="importPopup">
  <h2>Importation de photo</h2>
  <form id="uploadForm" action="./php/import.php" method="post" enctype="multipart/form-data">
    <label for="date">Date de la photo:</label>
    <input type="date" id="date" name="date" placeholder="YYYY-MM-DD" required>
    <label for="titre-photo">Titre de la photo :</label>
    <input id="titre-photo" name="titre-photo" required></textarea>
    <label for="legende">Légende :</label>
    <textarea id="legende" name="legende" required></textarea>
    <label for="file">Sélectionnez une photo :</label>
    <input type="file" name="file" id="file" accept="image/*">
    <button type="submit" id="submitBtn">Envoyer</button>
    <button type="button" id="closePopupBtn">Fermer</button>
  </form>
</div>
</body>
</html>
