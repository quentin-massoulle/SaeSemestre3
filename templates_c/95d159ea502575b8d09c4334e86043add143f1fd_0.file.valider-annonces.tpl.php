<?php
/* Smarty version 4.2.1, created on 2024-01-11 09:09:51
  from 'C:\laragon\www\cours\Sae3\templates\valider-annonces.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659fb05f34f2c8_02812872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95d159ea502575b8d09c4334e86043add143f1fd' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\Sae3\\templates\\valider-annonces.tpl',
      1 => 1704809729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659fb05f34f2c8_02812872 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="./style/modifier-annonces.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <?php echo '<script'; ?>
 src="script.js"><?php echo '</script'; ?>
>

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
</html><?php }
}
