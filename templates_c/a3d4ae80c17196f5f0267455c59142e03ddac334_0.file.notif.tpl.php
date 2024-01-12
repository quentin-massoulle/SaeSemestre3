<?php
/* Smarty version 4.2.1, created on 2024-01-12 11:21:42
  from 'C:\laragon\www\cours\Sae3\templates\notif.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_65a120c61c2f54_35231384',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3d4ae80c17196f5f0267455c59142e03ddac334' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\Sae3\\templates\\notif.tpl',
      1 => 1705057904,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a120c61c2f54_35231384 (Smarty_Internal_Template $_smarty_tpl) {
?><link href="style/notif.css" rel="stylesheet" type="text/css" />

<div id="popup-notif" class="popup">
    <span class="close" id="closePopup-notif">&times;</span>
    <h2>Notification</h2>
    <p id="message"><?php echo $_smarty_tpl->tpl_vars['message_notif']->value;?>
</p>
</div><?php }
}
