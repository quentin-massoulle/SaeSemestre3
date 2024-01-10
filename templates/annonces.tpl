<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="./style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <div class="main">
    <h1>Annonces / Evènement</h1>

    <div class="container-item">
      <button onclick="" class="create-annonce">Créer une annonce</button>

      {foreach $data_annonces as $annonce}
          <div class="item" id="annonce-{$annonce.id_annonce}">
            <div class="container-img">
              <img src="{$annonce.url_photo}" alt="" />
            </div>
            <div class="container-info">
              <div class="info">
                <div class="date-poste">{$annonce.date_poste}</div>
                <div class="titre-poste">{$annonce.titre_poste}</div>
                <div class="auteur-poste">Posté par {$annonce.nom} {$annonce.prenom}</div>
                <div class="description-poste">
                  {$annonce.description_poste}
                </div>
              </div>
              <button class="see-more-poste">En savoir plus</button>
            </div>
          </div>
      {/foreach}
    </div>
  </div>


</body>


</html>  