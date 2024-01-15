<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Valider Annonce</title>
  <link href="./style/modifier-annonces.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="./images/logo-cid-carre.png" type="image/png">
</head>

<body>

  <script src="script.js"></script>

  <h1>Valider annonces</h1>
  <h2>Admin</h2>
  <div class="container-item">

    <div class="item">
      <div class="checkbox" </div>
        <input type="checkbox">
        <div class="info">
          <div class="container-img-annonce">
            <img src="images/logo lorem ipsum.avif" alt="image-annonces">
          </div>
          <div class="gestion-annonce">
            <div class="annonce-info">
              <p>date & promo</p>
              <p>titre</p>
              <p>description</p>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="item">
      <div class="checkbox" </div>
        <input type="checkbox">
        <div class="info">
          <div class="container-img-profil">
            <img src="images/logo lorem ipsum.avif" alt="image_profil">
          </div>
          <div class="user-info">
            <p>Nom</p>
            <p>promo</p>
          </div>
          <div class="update-delete">
            <a class="container-img" href="">
              <img src="images/logo lorem ipsum.avif" alt="icon">
            </a>
            <a class="container-img" href="">
              <img src="images/logo lorem ipsum.avif" alt="icon">
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="checkbox" </div>
        <input type="checkbox">
        <div class="info">
          <div class="container-img-profil">
            <img src="images/logo lorem ipsum.avif" alt="image_profil">
          </div>
          <div class="user-info">
            <p>Nom</p>
            <p>promo</p>
          </div>
          <div class="update-delete">
            <a class="container-img" href="">
              <img src="images/logo lorem ipsum.avif" alt="icon">
            </a>
            <a class="container-img" href="">
              <img src="images/logo lorem ipsum.avif" alt="icon">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="Valider">
    <div><button class="btn" type="button">Valider annonces</button></div>

  </div>

  <!-- Structure HTML pour la boîte de dialogue de confirmation -->
  <div class="overlay"></div>

  <div class="confirmation-popup">
    <h2>Confirmation de suppression</h2>
    <p>Êtes-vous sûr de vouloir supprimer ?</p>
    <div class="buttons">
      <button class="confirm">Supprimer</button>
      <button class="cancel">Annuler</button>
    </div>
  </div>


</body>
</html>