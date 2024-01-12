<?php
/* Smarty version 4.2.1, created on 2024-01-11 18:06:41
  from 'C:\laragon\www\cours\SaeSemestre3\templates\notif.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_65a02e3168c617_67880168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4b91113ce4e7a3f4819dc1ca8e3c9d5dc039804' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\SaeSemestre3\\templates\\notif.tpl',
      1 => 1704996298,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a02e3168c617_67880168 (Smarty_Internal_Template $_smarty_tpl) {
?><link href="style/notif.css" rel="stylesheet" type="text/css" />

<div id="popup-notif" class="popup">
    <span class="close" id="closePopup-notif">&times;</span>
    <h2>Notification</h2>
    <p id="message"><?php echo $_smarty_tpl->tpl_vars['message_notif']->value;?>
</p>
</div><?php }
}
