<?php
/* Smarty version 4.2.1, created on 2024-01-08 14:00:49
  from 'C:\laragon\www\cours\Sae3\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659c0011604af8_65861703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf05735c3228c6e2d320058a162672111f5d0469' => 
    array (
      0 => 'C:\\laragon\\www\\cours\\Sae3\\templates\\index.tpl',
      1 => 1704722393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659c0011604af8_65861703 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>cercle des informaticiens dispersés</title>
  <link href="style/index.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <?php echo '<script'; ?>
 src="scripteJS/index.js"><?php echo '</script'; ?>
>
  <div class="topnav">
    <div class="logo">
      <img src="logo lorem ipsum.avif" alt="Logo">
    </div>
    <div>
      <a href="#" id="inscriptionBtn">Inscription</a>
      <a href="#" id="connexionBtn">Connexion</a>
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
      <div class="container-img">
        <img src="logo lorem ipsum.avif" alt="Logo">
      </div>
    </div>
  </div>
  


  <div id="popup1" class="popup">
    <div class="popup-content">
        <span class="close" id="closePopupBtn1">&times;</span>
        <!-- Formulaire d'inscription -->
        <h2>Formulaire d'inscription</h2>
        <form id="inscriptionForm" method="post" action="./scriptPHP/inscription.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
            
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            
            <label for="promo d'optention diplome">Promo:</label>
            <input type="text" id="promo" name="promo" required>
            
            <button class="inscriptionPopupBtn" id="inscriptionPopupBtn" type="submit">Créer un compte</button>
        </form>
    </div>
</div>

<div id="popup2" class="popup">
    <div class="popup-content">
        <span class="close" id="closePopupBtn2">&times;</span>
        <h2>Formulaire de connexion</h2>
        <form id="connexionForm" method="post" action="./scriptPHP/autentification.php">
            <label for="email_connexion">Email:</label>
            <input type="email" id="email_connexion" name="email_connexion" required>
            <label for="password_connexion">Mot de passe:</label>
            <input type="password" id="password_connexion" name="password_connexion" required>
            <a href="#" id="forgotPassword" class="forgot-password">Mot de passe oublié ?</a>
            <a href="#" id="inscriptionLink">Vous n’avez pas de compte ? S’inscrire</a>
            <button class="connexionPopupBtn" id="connexionPopupBtn" type="submit">Se connecter</button>
        </form>
    </div>
</div>

  <div id="popup3" class="popup">
    <div class="popup-content">
        <span class="close" id="closePopupBtn3">&times;</span>
        <h2>Réinitialisation du mot de passe</h2>
            <form id="resetPasswordForm"  method="post" action="./scriptPHP/mdpoublier.php">
            <label for="resetEmail">Email:</label>
            <input type="email" id="resetEmail" name="resetEmail" required>
            <button type="submit" class="resetPasswordBtn" id="resetPasswordBtn">Recevoir le mot de passe</button>
        </form>
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
</html>  
<?php }
}
