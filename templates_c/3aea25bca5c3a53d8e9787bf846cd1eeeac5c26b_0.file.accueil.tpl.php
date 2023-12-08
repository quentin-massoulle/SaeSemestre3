<?php
/* Smarty version 4.2.1, created on 2023-12-08 13:38:31
  from 'C:\laragon\www\cours\SaeSemestre3\templates\accueil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_65731c579d9ee8_21447053',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3aea25bca5c3a53d8e9787bf846cd1eeeac5c26b' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\SaeSemestre3\\templates\\accueil.tpl',
      1 => 1702042707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65731c579d9ee8_21447053 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="./style/index.css" rel="stylesheet" type="text/css"/>
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
      <a class="active" href="mon_profil.html">Mon Profile</a>
      <a class="active" href="annonce.html">Annonce</a>
      <a class="active" href="photo.html">Photos</a>
      <a class="active" href="accueil.html">Acceuil</a>
    </div>
  </div>

  <div class="container">
    <h1>Association Cercle des Informaticiens Dispersés</h1>
    <div class="contenue">

      <div class="content">
        <p>Le secrétaire de l’association,</p>
        <p>Le mot du président,</p>
        <p>Les dernières informations concernant l’activité de
          l’association.</p>
        <p>Présentation de l’association :</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad
          minim veniam.</p>
      </div>
    </div>
  </div>


</body>

<footer>
  <div class="bottomfooter">
    <div class="elementfooter">
      <p>Pages légales</p>
       <a href=""> Mentions légale</a> 
       <a href="">Politique de confidentialité</a>
       <a href="">Préférence des cookies</a> 
    </div>
    <div class="elementfooter">
      <p>reseau sociaux</p>
      <div class="resau">
        <div class="logo">
          <a href=""><img src="logo lorem ipsum.avif" alt="Logo"></a>
          <a href=""><img src="logo lorem ipsum.avif" alt="Logo"></a>
        </div>
        <div class="logo">
          <a href=""><img src="logo lorem ipsum.avif" alt="Logo"></a>
          <a href="" class = "reseau"><img src="logo lorem ipsum.avif" alt="Logo"></a>
        </div>
      </div>
    </div>
    <div class="logo">
      <img src="logo lorem ipsum.avif" alt="Logo">
    </div>
  </div>
</footer>
</html>  <?php }
}
