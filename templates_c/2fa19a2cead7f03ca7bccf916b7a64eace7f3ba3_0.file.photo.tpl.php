<?php
/* Smarty version 4.2.1, created on 2024-01-09 16:26:41
  from 'C:\laragon\www\SaeSemestre3\templates\photo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659d73c1bc3b10_11327702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fa19a2cead7f03ca7bccf916b7a64eace7f3ba3' => 
    array (
      0 => 'C:\\laragon\\www\\SaeSemestre3\\templates\\photo.tpl',
      1 => 1704816172,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659d73c1bc3b10_11327702 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/photos.css" rel="stylesheet" type="text/css" />

    <title>Document</title>
</head>
<body>
  <?php echo '<script'; ?>
 src="popup.js"><?php echo '</script'; ?>
>

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
      </div>
    </div>
      <div class="filter-container">
          <button class="dropdown-btn" id="dropdown-btn">Filtres</button>
          <div class="dropdown-content" id="dropdown-content">
              <a href="#">Promo</a>
              <a href="#">Année</a>
              <a href="#">Date</a>
              <a href="#">Chronologique</a>
              <a href="#">Par domaine </br> d'activité </a> 
            </div>
      </div>
      <?php echo '<script'; ?>
 src="script.js"><?php echo '</script'; ?>
>

    </div>


    <div class="container-item">
        <div class="ligne">
          <div class="container-photo">
            <img src="./profil.jpg" alt="photo de profil" />
          </div>
          <div class="info">
            <div class="photo-info">
                <img src="./labo.png" alt="illustration" />
            </div>
            <div class="texte-info">
                <p class="p1">jj/mm/aaaa à 00:00, promo diplome année</p>
                <p class="p2">titre photo</p>
                <p class="p3">posté par nom</p>
                <p class="p4">Contenu Ah non attention, j'ai vraiment une grande mission car il y a de bonnes règles, de bonnes rules et c'est une sensation réelle qui se produit si on veut ! Ça respire le meuble de Provence, hein ?
                    Si je t'emmerde, tu me le dis, je ne suis pas un simple danseur car c'est juste une question d'awareness et ça, c'est très dur, et, et, et... c'est très facile en même temps. C'est pour ça que j'ai fait des films avec des replicants.
                </p>  </div>
            
          </div>
        </div>
        <div class="ligne">
            <div class="container-photo">
              <img src="./profil.jpg" alt="photo de profil" />
            </div>
            <div class="info">
              <div class="photo-info">
                  <img src="./profil.jpg" alt="illustration" />
              </div>
              <div class="texte-info">
                  <p class="p1">jj/mm/aaaa à 00:00, promo diplome année</p>
                  <p class="p2">titre photo</p>
                  <p class="p3">posté par nom</p>
                  <p class="p4">Contenu Ah non attention, j'ai vraiment une grande mission car il y a de bonnes règles, de bonnes rules et c'est une sensation réelle qui se produit si on veut ! Ça respire le meuble de Provence, hein ?
                      Si je t'emmerde, tu me le dis, je ne suis pas un simple danseur car c'est juste une question d'awareness et ça, c'est très dur, et, et, et... c'est très facile en même temps. C'est pour ça que j'ai fait des films avec des replicants.
                  </p>  </div>
            </div>
          </div>

          <div class="ligne">
            <div class="container-photo">
              <img src="./profil.jpg" alt="photo de profil" />
            </div>
            <div class="info">
              <div class="photo-info">
                  <img src="./illustration.jpg" alt="illustration" />
              </div>
              <div class="texte-info">
                  <p class="p1">jj/mm/aaaa à 00:00, promo diplome année</p>
                  <p class="p2">titre photo</p>
                  <p class="p3">posté par nom</p>
                  <p class="p4">Contenu Ah non attention, j'ai vraiment une grande mission car il y a de bonnes règles, de bonnes rules et c'est une sensation réelle qui se produit si on veut ! Ça respire le meuble de Provence, hein ?
                      Si je t'emmerde, tu me le dis, je ne suis pas un simple danseur car c'est juste une question d'awareness et ça, c'est très dur, et, et, et... c'est très facile en même temps. C'est pour ça que j'ai fait des films avec des replicants.
                  </p>  
                </div>
            </div>
          </div>
    </div>

      <button onclick="" class="importer-photo" id="openPopupBtn">Importer une photo</button>

      <div class="popup" id="importPopup">
        <h2>Importation de photo</h2>
        <label for="date">Date :</label>
        <input type="text" id="date" name="date" required>
    
        <label for="promo">Promo :</label>
        <input type="text" id="promo" name="promo" required>
    
        <label for="utilisateur">Utilisateur :</label>
        <input type="text" id="utilisateur" name="utilisateur" required>
    
        <label for="legende">Légende :</label>
        <textarea id="legende" name="legende" required></textarea>
    
        <button id="importBtn">Importer une photo</button>
        <button id="sendBtn">Envoyer</button>
        <button id="closePopupBtn">Fermer</button>
      </div>
</body>
</html><?php }
}