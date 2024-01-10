<?php
/* Smarty version 4.2.1, created on 2024-01-10 18:09:37
  from 'C:\laragon\www\SaeSemestre3\templates\annonces.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659edd615dd0f4_53428734',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '315e637fbe486c5e21a65f94ecb878ffc134891e' => 
    array (
      0 => 'C:\\laragon\\www\\SaeSemestre3\\templates\\annonces.tpl',
      1 => 1704910175,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659edd615dd0f4_53428734 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_annonces']->value, 'annonce');
$_smarty_tpl->tpl_vars['annonce']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['annonce']->value) {
$_smarty_tpl->tpl_vars['annonce']->do_else = false;
?>
          <div class="item">
            <div class="container-img">
              <img src="<?php echo $_smarty_tpl->tpl_vars['annonce']->value['url_photo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['annonce']->value['titre_poste'];?>
"/>
            </div>
            <div class="container-info">
              <div class="info-annonce" id="id-annonce-<?php echo $_smarty_tpl->tpl_vars['annonce']->value['id_annonce'];?>
">
                <div class="date-poste"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['date_poste'];?>
</div>
                <div class="titre-poste"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['titre_poste'];?>
</div>
                <div class="auteur-poste">Posté par <?php echo $_smarty_tpl->tpl_vars['annonce']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['annonce']->value['prenom'];?>
</div>
                <div class="description-poste">
                  <?php echo $_smarty_tpl->tpl_vars['annonce']->value['description_poste'];?>

                </div>
                <div class="contenue-poste" style="display:none"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['contenue'];?>
</div>
              </div>
              <button onclick="openPopupBtnClick(<?php echo $_smarty_tpl->tpl_vars['annonce']->value['id_annonce'];?>
, <?php echo $_smarty_tpl->tpl_vars['annonce']->value['id_utilisateur'];?>
)" class="see-more-poste">En savoir plus</button>
            </div>
          </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>

  <?php echo '<script'; ?>
 src="./js/annonce.js"><?php echo '</script'; ?>
>

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
</html>  <?php }
}
