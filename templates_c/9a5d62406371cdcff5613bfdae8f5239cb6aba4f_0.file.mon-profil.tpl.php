<?php
/* Smarty version 4.2.1, created on 2023-12-10 20:42:38
  from 'C:\laragon\www\cours\SaeSemestre3\templates\mon-profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_657622be137d00_43327783',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a5d62406371cdcff5613bfdae8f5239cb6aba4f' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\SaeSemestre3\\templates\\mon-profil.tpl',
      1 => 1702240837,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657622be137d00_43327783 (Smarty_Internal_Template $_smarty_tpl) {
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
  <div class="topnav">
    <div class="logo">
      <img src="images/logo lorem ipsum.avif" alt="Logo">
    </div>
    <div>
      <a class="active" href="mon_profil.html">Mon Profil</a>
      <a class="active" href="annonce.html">Annonce</a>
      <a class="active" href="photo.html">Photos</a>
      <a class="active" href="accueil.html">Acceuil</a>
    </div>
  </div>
  
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
