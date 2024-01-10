document.addEventListener("DOMContentLoaded", function () {
  const openPopupBtn = document.getElementById("openPopupBtn");
  const importPopup = document.getElementById("importPopup");
  const closePopupBtn = document.getElementById("closePopupBtn");

  const closePopupBtn1 = document.getElementById("closePopupBtn1");
  const closePopupBtn2 = document.getElementById("closePopupBtn2");

  openPopupBtn.addEventListener("click", function () {
    importPopup.style.display = "block";
  });

  closePopupBtn.addEventListener("click", function () {
    importPopup.style.display = "none";
  });

  // En savoir plus Listener to close

  closePopupBtn1.addEventListener("click", function () {
    const customPopupAnnonce = document.getElementById("customPopupAnnonce");
    customPopupAnnonce.style.display = "none";
  });

  closePopupBtn2.addEventListener("click", function () {
    const customPopupAnnonce = document.getElementById("customPopupAnnonce");
    customPopupAnnonce.style.display = "none";
  });
});

////////////////////////////////////////////////////////////////
// En savoir plus

function openPopupBtnClick(idAnnonce, idUtilisateur) {
  const customPopupAnnonce = document.getElementById("customPopupAnnonce");
  customPopupAnnonce.style.display = "block";

  // Récupérer les éléments de la popup
  const annonceDateElement = document.getElementById("annonceDate");
  const annonceAuteurElement = document.getElementById("annonceAuteur");
  const annonceTitreElement = document.getElementById("annonceTitre");
  const annonceDescriptionElement =
    document.getElementById("annonceDescription");
  const annonceContenueElement = document.getElementById("annonceContenue");

  // Récupérer la div parent
  const divParent = document.getElementById("id-annonce-" + idAnnonce);

  // Récupérer les valeurs des éléments enfants
  const datePoste = divParent.querySelector(".date-poste").textContent;
  const titrePoste = divParent.querySelector(".titre-poste").textContent;
  const auteurPoste = divParent.querySelector(".auteur-poste").textContent;
  const descriptionPoste =
    divParent.querySelector(".description-poste").textContent;
  const contenuePoste = divParent.querySelector(".contenue-poste").textContent;

  // Changer les valeurs des éléments
  annonceDateElement.textContent = datePoste;
  annonceAuteurElement.textContent = auteurPoste;
  annonceTitreElement.textContent = titrePoste;
  annonceDescriptionElement.textContent = "Description :\n" + descriptionPoste;
  annonceContenueElement.textContent = "Contenue :\n" + contenuePoste;
}
