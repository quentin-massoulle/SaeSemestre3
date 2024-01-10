<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Annonces - CID</title>
  <link href="./style/style.css" rel="stylesheet" type="text/css" />
  <link href="./style/annonce-pop-up.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <div class="main">
    <h1>Annonces / Evènement</h1>

    <div class="container-item">
      {foreach $data_annonces as $annonce}
          <div class="item">
            <div class="container-img">
              <img src="{$annonce.url_photo}" alt="{$annonce.titre_poste}"/>
            </div>
            <div class="container-info">
              <div class="info-annonce" id="id-annonce-{$annonce.id_annonce}">
                <div class="date-poste">{$annonce.date_poste}</div>
                <div class="titre-poste">{$annonce.titre_poste}</div>
                <div class="auteur-poste">Posté par {$annonce.nom} {$annonce.prenom}</div>
                <div class="description-poste">
                  {$annonce.description_poste}
                </div>
                <div class="contenue-poste" style="display:none">{$annonce.contenue}</div>
              </div>
              <button onclick="openPopupBtnClick({$annonce.id_annonce}, {$annonce.id_utilisateur})" class="see-more-poste">En savoir plus</button>
            </div>
          </div>
      {/foreach}
    </div>
  </div>

  <script src="./js/annonce.js"></script>

  <button class="create-annonce" id="openPopupBtn">Créer une annonce</button>

  <div class="popup" id="importPopup">
    <h2>Importer une annonce</h2>
    <form id="uploadForm" action="./php/import-annonce.php" method="post" enctype="multipart/form-data">
      <label for="date">Date :</label>
      <input type="date" id="date" name="date" required>

      <label for="titre">Titre :</label>
      <input type="text" id="titre" name="titre" placeholder="Titre de l'annonce..." maxlength="50" required>

      <label for="description">Description :</label>
      <input type="text" id="description" name="description" placeholder="Description de l'annonce..." maxlength="100" required>

      <label for="contenue">Contenue :</label>
      <textarea id="contenue" name="contenue" placeholder="Contenue de l'annonce..." maxlength="500" required></textarea>

      <label for="file">Sélectionnez une photo :</label>
      <input type="file" name="file" id="file" accept="image/*">

      <button type="submit" id="submitBtn">Envoyer</button>
      <button type="button" id="closePopupBtn">Fermer</button>
    </form>
  </div>

  <div id="customPopupAnnonce" class="customPopupAnnonce">
    <div class="popupContentAnnonce">
      <label for="popupToggle" id="closePopupBtn1" class="close">&times;</label>
      <h2>Informations sur l'annonce</h2>
      <p><span id="annonceDate">-</span></p>
      <p><span id="annonceAuteur">-</span></p>

      <h3 id="annonceTitre">-</h3>
      <p id="annonceDescription">-</p>
      <p id="annonceContenue">-</p>
     <button id="closePopupBtn2" class="retour-btn">Retour</button>

    </div>
  </div>

</body>
</html>  