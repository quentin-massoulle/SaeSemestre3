<?php
/* Smarty version 4.2.1, created on 2024-01-10 14:20:38
  from 'C:\laragon\www\cours\Sae3\templates\photo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659ea7b666a985_01523827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5cfece104a41b97725e494d5933e0107f0acc25' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\Sae3\\templates\\photo.tpl',
      1 => 1704896436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659ea7b666a985_01523827 (Smarty_Internal_Template $_smarty_tpl) {
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['imageFiles']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
    <div class="ligne">
      <div class="container-photo">
        <img src="<?php echo $_smarty_tpl->tpl_vars['uploadDir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="photo de profil" />
      </div>
      <div class="info">
        <div class="photo-info">
          <img src="<?php echo $_smarty_tpl->tpl_vars['uploadDir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="illustration" />
        </div>
        <div class="texte-info">
          <p class="p1">jj/mm/aaaa promo diplome année</p>
          <p class="p2">titre photo</p>
          <p class="p3">utilisateur</p>
          <p class="p4">description</p>
        </div>
      </div>
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
<?php }
}
