<?php
/* Smarty version 4.2.1, created on 2024-01-11 14:34:47
  from 'C:\laragon\www\SaeSemestre3\templates\notif.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659ffc87a410c3_18305041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6ec83db1d51972e126fb742b5f1169cdf3bc846' => 
    array (
      0 => 'C:\\laragon\\www\\SaeSemestre3\\templates\\notif.tpl',
      1 => 1704983669,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659ffc87a410c3_18305041 (Smarty_Internal_Template $_smarty_tpl) {
?><link href="style/notif.css" rel="stylesheet" type="text/css" />

<div id="popup-notif" class="popup">
    <span class="close" id="closePopup-notif">&times;</span>
    <h2>Notification</h2>
    <p id="message"><?php echo $_smarty_tpl->tpl_vars['message_notif']->value;?>
</p>
</div><?php }
}
