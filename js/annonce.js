document.addEventListener("DOMContentLoaded", function () {
  const openPopupBtn = document.getElementById("openPopupBtn");
  const importPopup = document.getElementById("importPopup");
  const closePopupBtn = document.getElementById("closePopupBtn");
  const closePopupBtn1 = document.getElementById("closePopupBtn1");
  const closePopupBtn2 = document.getElementById("closePopupBtn2");

  function showImportPopup() {
    importPopup.style.display = "block";
  }

  function hideImportPopup() {
    importPopup.style.display = "none";
  }

  function hideCustomPopupAnnonce() {
    const customPopupAnnonce = document.getElementById("customPopupAnnonce");
    customPopupAnnonce.style.display = "none";
  }

  openPopupBtn.addEventListener("click", showImportPopup);
  closePopupBtn.addEventListener("click", hideImportPopup);
  closePopupBtn1.addEventListener("click", hideCustomPopupAnnonce);
  closePopupBtn2.addEventListener("click", hideCustomPopupAnnonce);
});

function openPopupBtnClick(idAnnonce, idUtilisateur) {
  const customPopupAnnonce = document.getElementById("customPopupAnnonce");
  customPopupAnnonce.style.display = "block";

  const annonceDateElement = document.getElementById("annonceDate");
  const annonceAuteurElement = document.getElementById("annonceAuteur");
  const annonceTitreElement = document.getElementById("annonceTitre");
  const annonceDescriptionElement = document.getElementById("annonceDescription");
  const annonceContenueElement = document.getElementById("annonceContenue");

  const divParent = document.getElementById("id-annonce-" + idAnnonce);

  const datePoste = divParent.querySelector(".date-poste").textContent;
  const titrePoste = divParent.querySelector(".titre-poste").textContent;
  const auteurPoste = divParent.querySelector(".auteur-poste").textContent;
  const descriptionPoste = divParent.querySelector(".description-poste").textContent;
  const contenuePoste = divParent.querySelector(".contenue-poste").textContent;

  annonceDateElement.textContent = datePoste;
  annonceAuteurElement.textContent = auteurPoste;
  annonceTitreElement.textContent = titrePoste;
  annonceDescriptionElement.textContent = "Description :\n" + descriptionPoste;
  annonceContenueElement.textContent = "Contenu :\n" + contenuePoste;
}
