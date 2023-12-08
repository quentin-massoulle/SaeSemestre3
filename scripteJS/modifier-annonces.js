document.addEventListener("DOMContentLoaded", function () {

  function confirmDelete() {
    document.querySelector(".confirmation-popup").style.display = "block";
    document.querySelector(".overlay").style.display = "block";
  }

  document.querySelector(".supprimer button").addEventListener("click", confirmDelete);

  document.querySelector(".confirmation-popup button.cancel").addEventListener("click", function () {
    document.querySelector(".confirmation-popup").style.display = "none";
    document.querySelector(".overlay").style.display = "none";
  });

  document.querySelector(".confirmation-popup button.confirm").addEventListener("click", function () {
    alert("Annonce supprimée !");
    document.querySelector(".confirmation-popup").style.display = "none";
    document.querySelector(".overlay").style.display = "none";
  });

  // ... (ajoutez d'autres écouteurs d'événements si nécessaire)
});
