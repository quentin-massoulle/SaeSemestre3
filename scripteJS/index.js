document.addEventListener("DOMContentLoaded", function() {

      // ------------------------ Popup de Connexion ------------------------

    function openConnexionPopup() {
        document.getElementById("popup2").style.display = "block";
      }
    
      // Fonction pour fermer la popup de connexion
      function closeConnexionPopup() {
        document.getElementById("popup2").style.display = "none";
      }
    
      // Fonction pour soumettre le formulaire de connexion
      function submitConnexionForm() {
        // Récupère les valeurs des champs du formulaire de connexion
        var email = document.getElementById('email_connexion').value;
        var password = document.getElementById('password_connexion').value;
    
        // Vérifie si tous les champs sont remplis
        if (email === '' || password === '') {
          alert("Veuillez remplir tous les champs du formulaire de connexion.");
          return;
        }
    
        // Affiche les valeurs dans la console (peut être utilisé pour vérifier les informations d'authentification)
        console.log("Email (connexion):", email);
        console.log("Mot de passe (connexion):", password);
    
        // Ferme la popup de connexion
        closeConnexionPopup();
      }


      document.getElementById("connexionBtn").addEventListener("click", openConnexionPopup);
      document.getElementById("connexionPopupBtn").addEventListener("click", submitConnexionForm);
      document.getElementById("closePopupBtn2").addEventListener("click", closeConnexionPopup);


      // ------------------------ Popup d'Inscription ------------------------

  // Fonction pour ouvrir la popup d'inscription
  function openInscriptionPopup() {
    document.getElementById("popup1").style.display = "block";
  }

  // Fonction pour fermer la popup d'inscription
  function closeInscriptionPopup() {
    document.getElementById("popup1").style.display = "none";
  }

  // Fonction pour soumettre le formulaire d'inscription
  function submitInscriptionForm() {
    // Récupère les valeurs des champs du formulaire
    var email = document.getElementById('email').value;
    var prenom = document.getElementById('prenom').value;
    var nom = document.getElementById('nom').value;
    var promo = document.getElementById('promo').value;
    var telephone = document.getElementById('telephone').value;

    // Vérifie si tous les champs sont remplis
    if (email === '' || prenom === '' || nom === '' || promo === '' || telephone === '') {
      alert("Veuillez remplir tous les champs du formulaire d'inscription.");
      return;
    }

    // Affiche les valeurs dans la console (peut être utilisé pour envoyer les données au serveur)
    console.log("Email:", email);
    console.log("Prénom:", prenom);
    console.log("Nom:", nom);
    console.log("Promo:", promo);
    console.log("Téléphone:", telephone);

    // Ferme la popup d'inscription
    closeInscriptionPopup();
  }
   // Popup d'Inscription
   document.getElementById("inscriptionBtn").addEventListener("click", openInscriptionPopup);
   document.getElementById("inscriptionPopupBtn").addEventListener("click", submitInscriptionForm);
   document.getElementById("closePopupBtn1").addEventListener("click", closeInscriptionPopup);

});

