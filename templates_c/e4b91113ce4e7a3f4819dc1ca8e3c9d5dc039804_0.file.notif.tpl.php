<?php
/* Smarty version 4.2.1, created on 2024-01-09 18:22:19
  from 'C:\laragon\www\cours\SaeSemestre3\templates\notif.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659d8edbd39001_48671962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4b91113ce4e7a3f4819dc1ca8e3c9d5dc039804' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\SaeSemestre3\\templates\\notif.tpl',
      1 => 1704823900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659d8edbd39001_48671962 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Titre de la page</title>
    <?php echo '<script'; ?>
 src="script.js"><?php echo '</script'; ?>
>
    <link href="style/notif.css" rel="stylesheet" type="text/css" />
</head>

<div id="popup-notif" class="popup">
    <span class="close" id="closePopup-notif">&times;</span>
    <h2>Notification</h2>
    <p id="erreur"><?php echo $_smarty_tpl->tpl_vars['message_notif']->value;?>
</p>
</div><?php }
}
