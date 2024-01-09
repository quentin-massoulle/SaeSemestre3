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

  // Popup d'Inscription
  document
    .getElementById("inscriptionBtn")
    .addEventListener("click", openInscriptionPopup);
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

  document
    .getElementById("forgotPassword")
    .addEventListener("click", openForgotPasswordPopup);
  document
    .getElementById("closePopupBtn3")
    .addEventListener("click", closeResetPasswordPopup);

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
