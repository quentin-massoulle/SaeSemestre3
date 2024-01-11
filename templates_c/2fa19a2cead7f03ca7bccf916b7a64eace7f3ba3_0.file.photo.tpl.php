<?php
/* Smarty version 4.2.1, created on 2024-01-11 10:05:32
  from 'C:\laragon\www\SaeSemestre3\templates\photo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659fbd6cb35db9_92239168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fa19a2cead7f03ca7bccf916b7a64eace7f3ba3' => 
    array (
      0 => 'C:\\laragon\\www\\SaeSemestre3\\templates\\photo.tpl',
      1 => 1704961741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659fbd6cb35db9_92239168 (Smarty_Internal_Template $_smarty_tpl) {
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
 src="./js/photo.js"><?php echo '</script'; ?>
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

      <?php echo '<script'; ?>
 src="script.js"><?php echo '</script'; ?>
>

    </div>
  <div class="container-item">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_photo']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
    <div class="ligne">
        <div class="container-photo">
            <img src="<?php echo $_smarty_tpl->tpl_vars['photo']->value['url_photo'];?>
" alt="photo de profil" />
        </div>
        <div class="info">
            <div class="photo-info">
                <img src="<?php echo $_smarty_tpl->tpl_vars['photo']->value['url_photo'];?>
" alt="illustration" />
            </div>
            <div class="texte-info">
                <p class="p1"><?php echo $_smarty_tpl->tpl_vars['photo']->value['date_poste'];?>
 promo diplome année</p>
                <p class="p2"></p>
                <p class="p3">Posté par <?php echo $_smarty_tpl->tpl_vars['photo']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['photo']->value['prenom'];?>
</p>
                <p class="p4"><?php echo $_smarty_tpl->tpl_vars['photo']->value['description_poste'];?>
</p>
            </div>
        </div>
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>


<button class="importer-photo" id="openPopupBtn">Importer une photo</button>

<div class="popup" id="importPopup">
  <h2>Importer de photo</h2>
  <form id="uploadForm" action="./php/import-photo.php" method="post" enctype="multipart/form-data">
    <label for="date">Date :</label>
    <input type="date" id="date" name="date" placeholder="YYYY-MM-DD" required>
    <label for="titre-photo">Titre :</label>
    <input type="text" id="titre-photo" name="titre-photo" placeholder="Titre de la photo..;  " required>
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
<?php }
}
