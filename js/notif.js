document.addEventListener("DOMContentLoaded", function () {
  // Fonction pour ouvrir la popup d'erreur de connexion
  function openNotifPopup() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup-notif").style.display = "block";
  }

  // Fonction pour fermer la popup d'erreur de connexion
  function closeNotifPopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup-notif").style.display = "none";
  }

  // Ajout d'un gestionnaire d'événements pour le bouton de fermeture
  document
    .getElementById("closePopup-notif")
    .addEventListener("click", closeNotifPopup);

  openNotifPopup(); // Lancement de la popup d'erreur
});
