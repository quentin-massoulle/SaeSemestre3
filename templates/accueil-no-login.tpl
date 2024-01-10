<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>cercle des informaticiens dispersés</title>
  <link href="style/index.css" rel="stylesheet" type="text/css" />
  <link href="style/header.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <script src="./js/pop-up.js"></script>

  <div class="topnav">
    <div class="logo">
      <img src="logo lorem ipsum.avif" alt="Logo">
    </div>
    <div>
      <button id="inscriptionBtn">Inscription</a>
      <button id="connexionBtn">Connexion</a>
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
  
  <div id="overlay"></div>

  <div id="popup1" class="popup">
    <div class="popup-content">
        <span class="close" id="closePopupBtn1">&times;</span>
        <!-- Formulaire d'inscription -->
        <h2>Formulaire d'inscription</h2>
        <form id="inscriptionForm" method="post" action="./php/inscription.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
            
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            
             <label for="promo d'optention diplome">Nom du diplome (BUT/DUT) :</label>
            <input type="text" id="promo" name="promo" required>

            <label for="promo d'optention diplome">Date d'optention du diplome:</label>
            <input type="number" id="date-promo" name="date-promo" min="1989" max="2024" placeholder=""Saisir année... required>
            
            <button class="inscriptionPopupBtn" id="inscriptionPopupBtn" type="submit">Créer un compte</button>
        </form>
    </div>
</div>

<div id="popup2" class="popup">
    <div class="popup-content">
        <span class="close" id="closePopupBtn2">&times;</span>
        <h2>Formulaire de connexion</h2>
        <form id="connexionForm" method="post" action="./php/connexion.php">
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
            <form id="resetPasswordForm"  method="post" action="./php/mdp-oublier.php">
            <label for="resetEmail">Email :</label>
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
