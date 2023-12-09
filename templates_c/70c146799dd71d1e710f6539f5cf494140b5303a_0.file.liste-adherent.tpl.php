<?php
/* Smarty version 4.2.1, created on 2023-12-09 18:51:12
  from 'C:\laragon\www\cours\Sae3\templates\liste-adherent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6574b720086b47_85101124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70c146799dd71d1e710f6539f5cf494140b5303a' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\Sae3\\templates\\liste-adherent.tpl',
      1 => 1702147536,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6574b720086b47_85101124 (Smarty_Internal_Template $_smarty_tpl) {
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

  <h1>Liste adhérents</h1>
  <h2>Admin</h2>
  <div class="container-item">
    
    <div class="item">
      <div class="checkbox" </div>
      <input type="checkbox">
      <div class="info">
        <div class="container-img-profil">
          <img src="images/logo lorem ipsum.avif" alt="image_profil">
        </div>
        <div class="user-info">
          <p>Nom</p>
          <p>promo</p>
        </div>
        <div class="update-delete">
          <a class="container-img" href=""> <!-- à changer en btn  -->
            <img src="images/logo lorem ipsum.avif" alt="icon">
          </a>
          <a class="container-img" href=""><!-- à changer en btn  -->
            <img src="images/logo lorem ipsum.avif" alt="icon">
          </a>
        </div>
      </div>
    </div>
    
  </div>

  <div class="item">
    <div class="checkbox" </div>
    <input type="checkbox">
    <div class="info">
      <div class="container-img-profil">
        <img src="images/logo lorem ipsum.avif" alt="image_profil">
      </div>
      <div class="user-info">
        <p>Nom</p>
        <p>promo</p>
      </div>
      <div class="update-delete">
        <a class="container-img" href="">
          <img src="images/logo lorem ipsum.avif" alt="icon">
        </a>
        <a class="container-img" href="">
          <img src="images/logo lorem ipsum.avif" alt="icon">
        </a>
      </div>
    </div>
  </div>
  </div>
  <div class="item">
    <div class="checkbox" </div>
    <input type="checkbox">
    <div class="info">
      <div class="container-img-profil">
        <img src="images/logo lorem ipsum.avif" alt="image_profil">
      </div>
      <div class="user-info">
        <p>Nom</p>
        <p>promo</p>
      </div>
      <div class="update-delete">
        <a class="container-img" href="">
          <img src="images/logo lorem ipsum.avif" alt="icon">
        </a>
        <a class="container-img" href="">
          <img src="images/logo lorem ipsum.avif" alt="icon">
        </a>
      </div>
    </div>
  </div>
  </div>
  </div>

  <div class="supprimer">
    <div><button class="btn" type="button">Supprimer adhérents</button></div>
      
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

</html><?php }
}
