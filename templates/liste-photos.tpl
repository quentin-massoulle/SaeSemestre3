<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="./style/modifier-photo.css" rel="stylesheet" type="text/css" />
  <script src="./js/modifier-annonces.js"></script>

</head>

<body>

  <script src="script.js"></script>


  <h1>Modifier photo</h1>
  <h2 class="admin">Admin</h2>
  <div class="container-item">

    <div class="item">
      <div class="checkbox" </div>
        <input type="checkbox">
        <div class="info">
          <div class="container-img-photo">
            <img src="images/logo lorem ipsum.avif" alt="image-annonces">
          </div>
          <div class="gestion-annonce">
            <div class="annonce-info">
              <p>date & promo</p>
              <p>titre</p>
              <p>description</p>
            </div>
            <div class="update-delete">
              <a class="container-img" href="">
                <!-- à changer en btn  -->
                <img src="images/logo lorem ipsum.avif" alt="icon-paramètre">
              </a>
              <a class="container-img" href="">
                <!-- à changer en btn  -->
                <img src="images/logo lorem ipsum.avif" alt="icon-supprimer">
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>

  <div class="supprimer">
    <div><button class="btn" type="button">Supprimer photo</button></div>

  </div>

  <!-- Structure HTML pour la boîte de dialogue de confirmation -->
  <div class="overlay"></div>

  <div class="confirmation-popup">
    <h2>Confirmation</h2>
    <p>Êtes-vous sûr de vouloir supprimer ?</p>
    <div class="buttons">
      <button class="confirm">Supprimer</button>
      <button class="cancel">Annuler</button>
    </div>
  </div>

</body>

</html>