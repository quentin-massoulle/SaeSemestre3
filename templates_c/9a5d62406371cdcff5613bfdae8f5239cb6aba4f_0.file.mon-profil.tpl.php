<?php
/* Smarty version 4.2.1, created on 2024-01-09 21:31:18
  from 'C:\laragon\www\cours\SaeSemestre3\templates\mon-profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659dbb26075328_27050616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a5d62406371cdcff5613bfdae8f5239cb6aba4f' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\SaeSemestre3\\templates\\mon-profil.tpl',
      1 => 1704835873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659dbb26075328_27050616 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="./style/mon-profil.css" rel="stylesheet" type="text/css"/>
</head>

<body>

  <?php echo '<script'; ?>
 src="script.js"><?php echo '</script'; ?>
>
  
  <h1>Modifier son profil</h1>
  <div class="modifier_profil">
    <div>
      <div class="container">
        <img src="images/logo lorem ipsum.avif" alt="image_profile"width=100px height=100px>
        <button class="btn" type="button">modifier la photo de profil</button>
      </div>
      <div><button class="btn" type="button">Gérer mes photos</button></div>
        <div><button class="btn" type="button">Gérer mes annonces</button></div>        
    </div>
    
    <div class="container">
      <p>Changer de mot de passe</p>
      <div>
        <label for="Ancien mot de passe">Ancien mot de passe :</label>
        <input type="text" id="Ancien_mot_de_passe" name="Ancien mot de passe">
      </div>
      <div>
        <label for="Nouveau mot de passe">Nouveau mot de passe
 :</label>
        <input type="text" id="Nouveau_mot_de_passe" name="Nouveau mot de passe">
      </div>
      <div>
        <label for="Confirmation">Confirmation :</label>
        <input type="text" id="Confirmation" name="Confirmation">
      </div>
      <button class="btn" type="button">Valider</button>
    </div>
  </div>
  

</body>

</html>  <?php }
}
