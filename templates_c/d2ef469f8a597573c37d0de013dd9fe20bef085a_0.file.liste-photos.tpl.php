<?php
/* Smarty version 4.2.1, created on 2024-01-12 11:56:07
  from 'C:\laragon\www\cours\Sae3\templates\liste-photos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_65a128d72cf376_80465731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2ef469f8a597573c37d0de013dd9fe20bef085a' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\Sae3\\templates\\liste-photos.tpl',
      1 => 1705060004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a128d72cf376_80465731 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Mes photos - CID</title>
    <link href="./style/liste-adherent.css" rel="stylesheet" type="text/css" />
    <link href="./style/annonce-pop-up.css" rel="stylesheet" type="text/css" />
    <link href="./style/index.css rel="stylesheet" type="text/css" />
</head>

<body>
    <?php echo '<script'; ?>
 src="./js/gerer-photo.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./js/notif.js"><?php echo '</script'; ?>
>

    <h1>Mes Photos</h1>
    <form action="./php/gerer-liste-photo.php" method="post" id="formSuppression">
        <div class="container-item">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_photos']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
                <div class="item">
                    <input type="checkbox" name="liste-photos[]" value="<?php echo $_smarty_tpl->tpl_vars['photo']->value['id_photo'];?>
">
                    <div class="container-img">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['photo']->value['url_photo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['photo']->value['titre_poste'];?>
"/>
                    </div>
                    <div class="container-info">
                        <div class="info-photo" id="id-photo-<?php echo $_smarty_tpl->tpl_vars['photo']->value['id_photo'];?>
">
                            <div class="date-poste"><?php echo $_smarty_tpl->tpl_vars['photo']->value['date_poste'];?>
</div>
                            <div class="titre-poste"><?php echo $_smarty_tpl->tpl_vars['photo']->value['titre_poste'];?>
</div>
                            <div class="auteur-poste">Posté par <?php echo $_smarty_tpl->tpl_vars['photo']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['photo']->value['prenom'];?>
</div>
                            <div class="description-poste">
                                <?php echo $_smarty_tpl->tpl_vars['photo']->value['description_poste'];?>

                            </div>
                            <div class="visible"><?php echo $_smarty_tpl->tpl_vars['photo']->value['valide'];?>
</div>
                        </div>
                    </div>

                    <button class="modifier-btn" type="button" onclick="openModifierPopUp(<?php echo $_smarty_tpl->tpl_vars['photo']->value['id_photo'];?>
)">Modifier</button>
                    <button class="supprimer-btn" type="button" onclick="openSupprimerPopUp(<?php echo $_smarty_tpl->tpl_vars['photo']->value['id_photo'];?>
)">Supprimer</button>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class="supprimer">
        <div>
            <button class="btn" type="submit" name="action" value="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les adhérents sélectionnés ?')">Supprimer photo</button>
        </div>
        </div>
    </form>

    <div id="overlay"></div>

    <div class="popup" id="modifierPopup">
        <h2>Modifier une photo</h2>
        <form id="uploadForm" action="./php/modifier-photo.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id-photo" name="id-photo" value="">

            <label for="date">Date :</label>
            <input type="date" id="date" name="date" placeholder="YYYY-MM-DD" required>

            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" placeholder="Titre de la photo.." maxlength="50" required>

            <label for="description">Légende :</label>
            <textarea id="description" name="description" placeholder="Légende de la photo..." maxlength="100" required></textarea>

            <label for="file">Sélectionnez une photo :</label>
            <input type="file" name="file" id="file" accept="image/*">

            <button type="submit" id="submitBtn">Envoyer</button>
            <button type="button" id="closeModifierPopupBtn">Fermer</button>
        </form>
        </div>

    <div class="popup" id="supprimerPopup">
        <h2>Supprimer la photo ?</h2>
        <form id="supprimerForm" action="./php/supprimer-photo.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id-photo-to-delete" name="id-photo-to-delete" value="">

            <button type="submit" id="submitBtn">Confirmer</button>
            <button type="button" id="closeSupprimerPopupBtn">Fermer</button>
        </form>
    </div>

</body>

</html>
<?php }
}
