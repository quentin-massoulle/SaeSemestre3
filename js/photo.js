document.addEventListener("DOMContentLoaded", function () {
  const dropdownBtn = document.getElementById("dropdown-btn");
  const dropdownContent = document.getElementById("dropdown-content");

  dropdownBtn.addEventListener("click", function () {
    dropdownContent.style.display =
      dropdownContent.style.display === "block" ? "none" : "block";
  });

  // Ferme le menu déroulant si l'utilisateur clique en dehors de celui-ci
  window.addEventListener("click", function (event) {
    if (!event.target.matches("#dropdown-btn")) {
      dropdownContent.style.display = "none";
    }
  });

  const openPopupBtn = document.getElementById("openPopupBtn");
  const importPopup = document.getElementById("importPopup");
  const closePopupBtn = document.getElementById("closePopupBtn");

  openPopupBtn.addEventListener("click", function () {
    importPopup.style.display = "block";
  });

  closePopupBtn.addEventListener("click", function () {
    importPopup.style.display = "none";
  });

  document
    .getElementById("closePopupBtn")
    .addEventListener("click", function () {
      // Ajoutez ici le code pour fermer la popup
    });
});
