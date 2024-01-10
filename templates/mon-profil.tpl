<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="./style/mon-profil.css" rel="stylesheet" type="text/css"/>
</head>

<body>

  <script src="script.js"></script>
  
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
        <form action="./php/changement-mdp.php" method="post">
            <div>
                <label for="ancienMotDePasse">Ancien mot de passe :</label>
                <input type="password" id="ancienMotDePasse" name="ancienMotDePasse" required>
            </div>
            <div>
                <label for="nouveauMotDePasse">Nouveau mot de passe :</label>
                <input type="password" id="nouveauMotDePasse" name="nouveauMotDePasse" required>
            </div>
            <div>
                <label for="confirmation">Confirmation :</label>
                <input type="password" id="confirmation" name="confirmation" required>
            </div>
            <button class="btn" type="submit">Valider</button>
        </form>
    </div>
  </div>
  

</body>

</html>  