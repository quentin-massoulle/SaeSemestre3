<?php
/* Smarty version 4.2.1, created on 2024-01-15 09:23:02
  from 'C:\laragon\www\SaeSemestre3-1\templates\notif.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_65a4f9763cb212_42173785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd09fd43ccaf1e3751a4d392dcbb71a6084c696b' => 
    array (
      0 => 'C:\\laragon\\www\\SaeSemestre3-1\\templates\\notif.tpl',
      1 => 1705059225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a4f9763cb212_42173785 (Smarty_Internal_Template $_smarty_tpl) {
?><link href="style/notif.css" rel="stylesheet" type="text/css" />

<div id="popup-notif" class="popup">
    <span class="close" id="closePopup-notif">&times;</span>
    <h2>Notification</h2>
    <p id="message"><?php echo $_smarty_tpl->tpl_vars['message_notif']->value;?>
</p>
</div><?php }
}
