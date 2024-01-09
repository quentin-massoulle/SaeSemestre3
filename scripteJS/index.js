// TO RENAME

document.addEventListener("DOMContentLoaded", function () {
  // ------------------------ Popup de Connexion ------------------------

  function openConnexionPopup() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup2").style.display = "block";
  }

  // Fonction pour fermer la popup de connexion
  function closeConnexionPopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup2").style.display = "none";
  }

  document
    .getElementById("connexionBtn")
    .addEventListener("click", openConnexionPopup);
  document
    .getElementById("closePopupBtn2")
    .addEventListener("click", closeConnexionPopup);
  document
    .getElementById("inscriptionLink")
    .addEventListener("click", openInscriptionPopup);

  // ------------------------ Popup d'Inscription ------------------------

  // Fonction pour ouvrir la popup d'inscription
  function openInscriptionPopup() {
    closeConnexionPopup();
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup1").style.display = "block";
  }

  // Fonction pour fermer la popup d'inscription
  function closeInscriptionPopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup1").style.display = "none";
  }

  // Fonction pour soumettre le formulaire d'inscription
  function submitInscriptionForm() {
    // Récupère les valeurs des champs du formulaire
    var email = document.getElementById("email").value;
    var prenom = document.getElementById("prenom").value;
    var nom = document.getElementById("nom").value;
    var promo = document.getElementById("promo").value;
    var telephone = document.getElementById("telephone").value;

    // Vérifie si tous les champs sont remplis
    if (
      email === "" ||
      prenom === "" ||
      nom === "" ||
      promo === "" ||
      telephone === ""
    ) {
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
  document
    .getElementById("inscriptionBtn")
    .addEventListener("click", openInscriptionPopup);
  document
    .getElementById("inscriptionPopupBtn")
    .addEventListener("click", submitInscriptionForm);
  document
    .getElementById("closePopupBtn1")
    .addEventListener("click", closeInscriptionPopup);

  // ------------------------ Popup de Réinitialisation du Mot de Passe ------------------------

  // Fonction pour ouvrir la popup de réinitialisation du mot de passe
  function openForgotPasswordPopup() {
    closeConnexionPopup();
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup3").style.display = "block";
  }

  // Fonction pour fermer la popup de réinitialisation du mot de passe
  function closeResetPasswordPopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup3").style.display = "none";
  }

  // Fonction pour soumettre le formulaire de réinitialisation du mot de passe
  function submitResetPasswordForm() {
    var resetEmail = document.getElementById("resetEmail").value;

    if (resetEmail === "") {
      alert("Veuillez remplir l'email !");
      return;
    }

    // Ajoutez ici la logique pour réinitialiser le mot de passe (envoyer un email, etc.)
    alert("Fonctionnalité de réinitialisation du mot de passe à implémenter.");

    closeResetPasswordPopup();
  }

  document
    .getElementById("forgotPassword")
    .addEventListener("click", openForgotPasswordPopup);
  document
    .getElementById("closePopupBtn3")
    .addEventListener("click", closeResetPasswordPopup);
  document
    .getElementById("resetPasswordBtn")
    .addEventListener("click", submitResetPasswordForm);
});

document.addEventListener("DOMContentLoaded", function () {
  // Fonction pour ouvrir la popup d'erreur de connexion
  function openErreurPopup() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup-notif").style.display = "block";
  }

  // Fonction pour fermer la popup d'erreur de connexion
  function closeErreurPopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup-notif").style.display = "none";
  }

  // Ajout d'un gestionnaire d'événements pour le bouton de fermeture
  document
    .getElementById("closePopup-notif")
    .addEventListener("click", closeErreurPopup);

  openErreurPopup(); // Lancement de la popup d'erreur
});
