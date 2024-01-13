<?php
/* Smarty version 4.2.1, created on 2024-01-13 10:37:14
  from 'C:\laragon\www\SaeSemestre3\templates\liste-annonces-no-visible.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_65a267daa6ec13_10529620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b97cc5949cdad29bd3833a0c2fb81eb273c542e8' => 
    array (
      0 => 'C:\\laragon\\www\\SaeSemestre3\\templates\\liste-annonces-no-visible.tpl',
      1 => 1705142215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a267daa6ec13_10529620 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Mes annonces - CID</title>
    <link href="./style/liste-adherent.css" rel="stylesheet" type="text/css" />
    <link href="./style/annonce-pop-up.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <?php echo '<script'; ?>
 src="./js/gerer-annonce.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./js/notif.js"><?php echo '</script'; ?>
>

    <h1>Gérer les Annonces</h1>
    <form action="./php/gerer-liste-annonce.php" method="post" id="formSuppression">
    <div class="container-item">
        <!-- Une seule boucle foreach ici -->
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
                        <div class="visible"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['valide'];?>
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
            <button class="btn" type="submit" name="action" value="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les annonces sélectionnées ?')">Supprimer annonce(s)</button>
        </div>
        <div>
            <button class="btn" type="submit" name="action" value="valider">Valider annonce(s)</button>
        </div>
    </div>
</form>


    <div id="overlay"></div>

    <div class="popup" id="modifierPopup">
        <h2>Modifier une annonce</h2>
        <form action="./php/gerer-liste-annonce.php" method="post" id="formSuppression">
    <div class="container-item">
        <!-- Une seule boucle foreach ici -->
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
" />
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
                        <div class="description-poste"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['description_poste'];?>
</div>
                        <div class="contenue-poste"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['contenue'];?>
</div>
                        <div class="visible"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['valide'];?>
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
            <input type="submit" class="btn" name="action" value="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les annonces sélectionnées ?')">
        </div>
        <div>
            <input type="submit" class="btn" name="action" value="valider">
        </div>
    </div>
</form>

    </div>

</body>

</html>
<?php }
}
