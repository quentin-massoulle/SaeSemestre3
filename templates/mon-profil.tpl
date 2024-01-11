<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Mon Profil - CID</title>
  <link href="./style/mon-profil.css" rel="stylesheet" type="text/css"/>
</head>

<body>

  <script src="script.js"></script>
  
  <h1 classe ="monprofil">Modifier son profil</h1>
  <div class="modifier_profil">
    <div>
      <div class="container">
        <img src="images/logo lorem ipsum.avif" alt="image_profile"width=100px height=100px><br>
        <a href="" class="gerer-btn" type="button">modifier la photo de profil</a>
      <div>
      
        <a href="gerer-photos" class="gerer-btn" type="button">Gérer mes photos</a>
      </div>
      <div>
        <a href="gerer-annonces" class="gerer-btn" type="button">Gérer mes annonces</a>
      </div> 
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

</html>  
