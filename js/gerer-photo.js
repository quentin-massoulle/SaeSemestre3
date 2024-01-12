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

function openModifierPopUp(idPhoto) {
  const modifierPopUpPhoto = document.getElementById("modifierPopup");

  htmlItemID = "id-photo-" + idPhoto;
  var photoElement = document.getElementById(htmlItemID);

  // Récupérez les valeurs des éléments enfants
  var datePoste = photoElement.querySelector(".date-poste").textContent.trim();
  var titrePoste = photoElement
    .querySelector(".titre-poste")
    .textContent.trim();
  var descriptionPoste = photoElement
    .querySelector(".description-poste")
    .textContent.trim();

  document.getElementById("id-photo").value = idPhoto;
  document.getElementById("date").value = datePoste || "";
  document.getElementById("titre").value = titrePoste || "";
  document.getElementById("description").value = descriptionPoste || "";

  modifierPopUpPhoto.style.display = "block";
}

////////////////////////////////////////////////////////////////
// Supprimer

function openSupprimerPopUp(idPhoto) {
  const supprimerPopUpPhoto = document.getElementById("supprimerPopup");

  document.getElementById("id-photo-to-delete").value = idPhoto;

  supprimerPopUpPhoto.style.display = "block";
}
