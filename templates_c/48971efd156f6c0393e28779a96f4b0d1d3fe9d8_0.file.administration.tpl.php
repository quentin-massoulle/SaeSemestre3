<?php
/* Smarty version 4.2.1, created on 2024-01-08 11:32:02
  from 'C:\laragon\www\cours\Sae3\templates\administration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659bdd323b0790_72469591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48971efd156f6c0393e28779a96f4b0d1d3fe9d8' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\Sae3\\templates\\administration.tpl',
      1 => 1704713504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659bdd323b0790_72469591 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="./style/administration.css" rel="stylesheet" type="text/css"/>
</head>

<body>

  <?php echo '<script'; ?>
 src="script.js"><?php echo '</script'; ?>
>
  <div class="topnav">
    <div class="logo">
      <img src="images/logo lorem ipsum.avif" alt="Logo">
    </div>
    <div>
      <a class="active" href="mon-profil.html">Mon Profile</a>
      <a class="active" href="annonce.html">Annonce</a>
      <a class="active" href="photo.html">Photos</a>
      <a class="active" href="accueil.html">Acceuil</a>
    </div>
  </div>



  
<h1>Page d'administration</h1>
  <h2>Admin</h2>
  <div class="page_admin">
    <div class="container">
      Gestion adhérents
      <div><button class="btn" type="button">Ajout adhérents</button></div>
      <div><a href="liste-adherent.html"><button class="btn" type="button">Liste adhérents</button></a></div>
    </div>
    <div class="container">
      Gestion Photos
      <div><button class="btn" type="button">Liste photos</button></div>
    </div>
    <div class="container">
      Gestion Annonce
      <div><button class="btn" type="button">Approbation annonce</button></div>
      <div><button class="btn" type="button">Liste annonces</button></div>
    </div>
  </div>


</body>


  
<footer>
  <div class="bottomfooter">
    <div>
      <a>Pages</a>
      <ul>
        <li>Page d’accueil</li>
        <li>Mon profil</li>
        <li>Annonces</li>
        <li>Photos</li>
      </ul>
    </div>
    <div>
      <a>Pages légales</a>
      <ul>
        <li>Mentions légale</li>
        <li>Politique de confidentialité</li>
        <li>Préférence des cookies</li>
      </ul>
    </div>
    <div class="réseau-sociaux">
      <div class="logo">
        <img src="images/logo lorem ipsum.avif" alt="Logo">
      </div>
      <div class="logo">
        <img src="images/logo lorem ipsum.avif" alt="Logo">
      </div>
      <div class="logo">
        <img src="images/logo lorem ipsum.avif" alt="Logo">
      </div>
      <div class="logo">
        <img src="images/logo lorem ipsum.avif" alt="Logo">
      </div>
    </div>
    <div class="logo">
      <img src="images/logo lorem ipsum.avif" alt="Logo">
    </div>
  </div>
</footer>

</html>  <?php }
}
