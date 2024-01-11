<?php
/* Smarty version 4.2.1, created on 2024-01-11 14:59:06
  from 'C:\laragon\www\SaeSemestre3\templates\gerer-annonces-user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_65a0023ac69405_79537727',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fce7e5e16d7b36a0215ad6b6d90807c12162b8ee' => 
    array (
      0 => 'C:\\laragon\\www\\SaeSemestre3\\templates\\gerer-annonces-user.tpl',
      1 => 1704985144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a0023ac69405_79537727 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Mes annonces - CID</title>
    <link href="./style/liste-adherent.css" rel="stylesheet" type="text/css" />
    <link href="./style/annonce-pop-up.css" rel="stylesheet" type="text/css" />
    <link href="./style/index.css rel="stylesheet" type="text/css" />
</head>

<body>

    <?php echo '<script'; ?>
 src="./js/gerer-annonce.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./js/notif.js"><?php echo '</script'; ?>
>

    <h1>Mes Annonces</h1>
    <form action="./php/supprimer-liste-annonce-user.php" method="post" id="formSuppression">
        <div class="container-item">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_annonces']->value, 'annonce');
$_smarty_tpl->tpl_vars['annonce']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['annonce']->value) {
$_smarty_tpl->tpl_vars['annonce']->do_else = false;
?>
                <div class="item">
                    <input type="checkbox" name="liste-annonces[]" value="<?php echo $_smarty_tpl->tpl_vars['annonce']->value['id_annonce'];?>
">
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
                            <div class="contenue-poste"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['contenue'];?>
</div>
                        </div>
                    </div>

                    <button class="modifier-btn" type="button" onclick="openModifierPopUp(<?php echo $_smarty_tpl->tpl_vars['annonce']->value['id_annonce'];?>
)">Modifier</button>
                    <button class="supprimer-btn" type="button" onclick="openSupprimerPopUp(<?php echo $_smarty_tpl->tpl_vars['annonce']->value['id_annonce'];?>
)">Supprimer</button>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class="supprimer">
            <div>
                <button class="btn" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'/les annonces sélectionnés ?')">Supprimer annonces(s)</button>
            </div>
        </div>
    </form>

    <div id="overlay"></div>

    <div class="popup" id="modifierPopup">
        <h2>Importer une annonce</h2>
        <form id="modifierForm" action="./php/modifier-annonce.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id-annonce" name="id-annonce" value="">

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
            <button type="button" id="closeModifierPopupBtn">Fermer</button>
        </form>
    </div>

    <div class="popup" id="supprimerPopup">
        <h2>Supprimer l'annonce ?</h2>
        <form id="supprimerForm" action="./php/supprimer-annonce.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id-annonce-to-delete" name="id-annonce-to-delete" value="">

            <button type="submit" id="submitBtn">Confirmer</button>
            <button type="button" id="closeSupprimerPopupBtn">Fermer</button>
        </form>
    </div>

</body>

</html>
<?php }
}
