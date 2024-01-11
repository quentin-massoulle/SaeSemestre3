<?php
/* Smarty version 4.2.1, created on 2024-01-11 10:09:40
  from 'C:\laragon\www\SaeSemestre3\templates\mon-profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_659fbe642a2711_88771368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f33ac2f07dce01f7df21424efdc1b4aee0bd619' => 
    array (
      0 => 'C:\\laragon\\www\\SaeSemestre3\\templates\\mon-profil.tpl',
      1 => 1704967778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659fbe642a2711_88771368 (Smarty_Internal_Template $_smarty_tpl) {
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
  
  <h1 classe ="monprofil">Modifier son profil</h1>
  <div class="modifier_profil">
    <div>
      <div class="container">
        <img src="images/logo lorem ipsum.avif" alt="image_profile"width=100px height=100px><br>
        <button class="btn" type="button">modifier la photo de profil</button>
      </div>
      <div>
        <a href="gerer-photos" class="btn" type="button">Gérer mes photos</a>
      </div>
      <div>
        <a href="gerer-annonces" class="btn" type="button">Gérer mes annonces</a>
      </div>        
    </div>
    
    <div class="container">
        <h3>Changer de mot de passe</h3>
        <form action="./php/changement-mdp.php" method="post">
            <div>
                <label for="ancienMotDePasse">Ancien mot de passe :</label><br>
                <input type="password" id="ancienMotDePasse" name="ancienMotDePasse" required>
            </div>
            <div>
                <label for="nouveauMotDePasse">Nouveau mot de passe :</label><br>
                <input type="password" id="nouveauMotDePasse" name="nouveauMotDePasse" required>
            </div>
            <div>
                <label for="confirmation">Confirmation :</label><br>
                <input type="password" id="confirmation" name="confirmation" required>
            </div>
            <button class="btn" type="submit">Valider</button>
        </form>
    </div>
  </div>
  

</body>

</html>  <?php }
}
