<?php
/* Smarty version 4.2.1, created on 2024-01-10 21:50:18
  from 'C:\laragon\www\cours\SaeSemestre3\templates\liste-adherent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659f111a6773c6_43170094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f01e1b6096517790e6122eec2180636b4b7e1c56' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\SaeSemestre3\\templates\\liste-adherent.tpl',
      1 => 1704923263,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659f111a6773c6_43170094 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>replit</title>
    <link href="./style/liste-adherent.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <?php echo '<script'; ?>
 src="script.js"><?php echo '</script'; ?>
>
    <h1>Liste adhérents</h1>
    <h2>Admin</h2>
    <form action="./php/supprimer-adherents.php" method="post" id="formSuppression">
        <div class="container-item">

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_adherent']->value, 'adherent');
$_smarty_tpl->tpl_vars['adherent']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['adherent']->value) {
$_smarty_tpl->tpl_vars['adherent']->do_else = false;
?>
            <div class="item">
                <div class="checkbox"></div>
                <input type="checkbox" name="adherents[]" value="<?php echo $_smarty_tpl->tpl_vars['adherent']->value['id_utilisateur'];?>
">
                <div class="info">
                    <div class="container-img-profil">
                        <img src="" alt="image_profil">
                    </div>
                    <div class="user-info">
                        <p><?php echo $_smarty_tpl->tpl_vars['adherent']->value['nom_adherent'];?>
</p>
                        <p><?php echo $_smarty_tpl->tpl_vars['adherent']->value['prenom_adherent'];?>
</p>
                    </div>
                </div>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </div>
        <div class="supprimer">
            <div>
                <button class="btn" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les adhérents sélectionnés ?')">Supprimer adhérents</button>
            </div>
        </div>
    </form>

</body>

</html>
<?php }
}
