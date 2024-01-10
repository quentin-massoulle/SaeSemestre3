<?php
/* Smarty version 4.2.1, created on 2024-01-10 13:29:03
  from 'C:\laragon\www\SaeSemestre3\templates\annonces.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659e9b9f196a69_54223751',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '315e637fbe486c5e21a65f94ecb878ffc134891e' => 
    array (
      0 => 'C:\\laragon\\www\\SaeSemestre3\\templates\\annonces.tpl',
      1 => 1704893334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659e9b9f196a69_54223751 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_annonces']->value, 'annonce');
$_smarty_tpl->tpl_vars['annonce']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['annonce']->value) {
$_smarty_tpl->tpl_vars['annonce']->do_else = false;
?>
          <div class="item" id="annonce-<?php echo $_smarty_tpl->tpl_vars['annonce']->value['id_annonce'];?>
">
            <div class="container-img">
              <img src="<?php echo $_smarty_tpl->tpl_vars['annonce']->value['url_photo'];?>
" alt="" />
            </div>
            <div class="container-info">
              <div class="info">
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
              </div>
              <button class="see-more-poste">En savoir plus</button>
            </div>
          </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>


</body>


</html>  <?php }
}
