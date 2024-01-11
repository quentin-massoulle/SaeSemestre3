document.addEventListener("DOMContentLoaded", function () {
  const closeModifierPopupBtn = document.getElementById(
    "closeModifierPopupBtn"
  );

  closeModifierPopupBtn.addEventListener("click", function () {
    const modifierPopupAnnonce = document.getElementById("modifierPopup");
    modifierPopupAnnonce.style.display = "none";
  });

  const closeSupprimerPopupBtn = document.getElementById(
    "closeSupprimerPopupBtn"
  );

  closeSupprimerPopupBtn.addEventListener("click", function () {
    const supprimerPopupAnnonce = document.getElementById("supprimerPopup");
    supprimerPopupAnnonce.style.display = "none";
  });
});

////////////////////////////////////////////////////////////////
// Modifier

function openModifierPopUp(idAnnonce) {
  const modifierPopUpAnnonce = document.getElementById("modifierPopup");

  htmlItemID = "id-annonce-" + idAnnonce;
  var annonceElement = document.getElementById(htmlItemID);

  // Récupérez les valeurs des éléments enfants
  var datePoste = annonceElement
    .querySelector(".date-poste")
    .textContent.trim();
  var titrePoste = annonceElement
    .querySelector(".titre-poste")
    .textContent.trim();
  var descriptionPoste = annonceElement
    .querySelector(".description-poste")
    .textContent.trim();
  var contenuePoste = annonceElement
    .querySelector(".contenue-poste")
    .textContent.trim();

  document.getElementById("id-annonce").value = idAnnonce;
  document.getElementById("date").value = datePoste || "";
  document.getElementById("titre").value = titrePoste || "";
  document.getElementById("description").value = descriptionPoste || "";
  document.getElementById("contenue").value = contenuePoste || "";

  modifierPopUpAnnonce.style.display = "block";
}

////////////////////////////////////////////////////////////////
// Supprimer

function openSupprimerPopUp(idAnnonce) {
  const supprimerPopUpAnnonce = document.getElementById("supprimerPopup");

  document.getElementById("id-annonce-to-delete").value = idAnnonce;

  supprimerPopUpAnnonce.style.display = "block";
}
