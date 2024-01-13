<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Mes annonces - CID</title>
    <link href="./style/liste-adherent.css" rel="stylesheet" type="text/css" />
    <link href="./style/annonce-pop-up.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <script src="./js/gerer-annonce.js"></script>
    <script src="./js/notif.js"></script>

    <h1>Mes Annonces</h1>
    <form action="./php/gerer-liste-annonce.php" method="post" id="formSuppression">
        <div class="container-item">
            {foreach $data_annonces as $annonce}
                <div class="item">
                    <input type="checkbox" name="liste-annonces[]" value="{$annonce.id_annonce}">
                    <div class="container-img">
                    <img src="{$annonce.url_photo}" alt="{$annonce.titre_poste}"/>
                    </div>
                    <div class="container-info">
                        <div class="info-annonce" id="id-annonce-{$annonce.id_annonce}">
                            <div class="date-poste">{$annonce.date_poste}</div>
                            <div class="titre-poste">{$annonce.titre_poste}</div>
                            <div class="auteur-poste">Posté par {$annonce.nom} {$annonce.prenom}</div>
                            <div class="description-poste">
                                {$annonce.description_poste}
                            </div>
                            <div class="contenue-poste">{$annonce.contenue}</div>
                            <div class="visible">{$annonce.valide}</div>
                        </div>
                    </div>
                    
                        <button class="modifier-btn" type="button" onclick="openModifierPopUp({$annonce.id_annonce})">Modifier</button>
                        <button class="supprimer-btn" type="button" onclick="openSupprimerPopUp({$annonce.id_annonce})">Supprimer</button>
                </div>
            {/foreach}
        </div>
        <div class="supprimer">
            <button class="btn" type="submit" name="action" value="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les annonces sélectionnées ?')">Supprimer annonce(s)</button>
        </div>
        </div>
    </form>

    <div id="overlay"></div>

    <div class="popup" id="modifierPopup">
        <h2>Modifier une annonce</h2>
        <form id="modifierForm" action="./php/modifier-annonce.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id-annonce" name="id-annonce" value="">

            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>

            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" placeholder="Titre de l'annonce..." maxlength="50" required>

            <label for="description">Description :</label>
            <input type="text" id="description" name="description" placeholder="Description de l'annonce..." maxlength="100" required>

            <label for="contenue">Contenue :</label>
            <textarea id="contenue" name="contenue" placeholder="Contenue de l'annonce..." maxlength="500" required></textarea>

            <label for="file">Sélectionnez une photo :</label>
            <input type="file" name="file" id="file" accept="image/*">

            <button type="submit" id="submitBtn">Envoyer</button>
            <button type="button" id="closeModifierPopupBtn">Fermer</button>
        </form>
    </div>

    <div class="popup" id="supprimerPopup">
        <h2>Supprimer l'annonce ?</h2>
        <form id="supprimerForm" action="./php/supprimer-annonce.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id-annonce-to-delete" name="id-annonce-to-delete" value="">

            <button type="submit" id="submitBtn">Confirmer</button>
            <button type="button" id="closeSupprimerPopupBtn">Fermer</button>
        </form>
    </div>

</body>

</html>
