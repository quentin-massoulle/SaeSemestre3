<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>CID</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./style/style-admin.css" />
  </head>
  <body>
    <header></header>
    <div class="main">
      <div class="main-header">
        <div class="admin-title">
          <h1>Modifier Annnonces</h1>
          <div class="admin-mode">Admin</div>
        </div>

        <div class="option">
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

          <div class="container-filter">
            <button onclick="toggleFilter()" class="filter-button">
              Filtre
            </button>
            <div class="filter-child" style="display: none">
              <button onclick="" class="filter-item">Promo</button>
              <button onclick="" class="filter-item">Année</button>
              <button onclick="" class="filter-item">Date</button>
              <button onclick="" class="filter-item">Chronologique</button>
              <button onclick="" class="filter-item">Domaine d'activité</button>
            </div>
          </div>
        </div>

        <script>
          function toggleFilter() {
            var filterChild = document.querySelector(".filter-child");
            filterChild.style.display =
              filterChild.style.display === "none" ? "grid" : "none";
          }
        </script>
      </div>

      <div class="container-item">
        <button onclick="" class="bottom-submit-button">
          Créer une annonce
        </button>
      </div>
    </div>
  </body>
</html>
