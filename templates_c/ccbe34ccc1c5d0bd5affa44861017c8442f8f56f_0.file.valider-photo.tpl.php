<?php
/* Smarty version 4.2.1, created on 2024-01-11 09:09:40
  from 'C:\laragon\www\cours\Sae3\templates\valider-photo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659fb054b39ab2_26806710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccbe34ccc1c5d0bd5affa44861017c8442f8f56f' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\Sae3\\templates\\valider-photo.tpl',
      1 => 1704817738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659fb054b39ab2_26806710 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="./style/valider-photo.css" rel="stylesheet" type="text/css" />
  <?php echo '<script'; ?>
 src=./js/"modifier-annonces.js"><?php echo '</script'; ?>
>

</head>

<body>

  <?php echo '<script'; ?>
 src="script.js"><?php echo '</script'; ?>
>

  <h1>Valider photo</h1>
  <h2 class="admin">Admin</h2>
  <div class="container-item">

    <div class="item">
      <div class="checkbox" </div>
        <input type="checkbox">
        <div class="info">
          <div class="container-img-photo">
            <img src="images/logo lorem ipsum.avif" alt="image-photo">
          </div>
          <div class="gestion-photo">
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
        <div class="container-img-photo">
          <img src="images/logo lorem ipsum.avif" alt="image-photo">
        </div>
        <div class="gestion-photo">
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
        <div class="container-img-photo">
          <img src="images/logo lorem ipsum.avif" alt="image-photo">
        </div>
        <div class="gestion-photo">
          <div class="annonce-info">
            <p>date & promo</p>
            <p>titre</p>
            <p>description</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="supprimer">
    <div><button class="btn" type="button">Valider photo</button></div>

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

</html><?php }
}
