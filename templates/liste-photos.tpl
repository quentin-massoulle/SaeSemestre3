<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Mes photos - CID</title>
    <link href="./style/liste-adherent.css" rel="stylesheet" type="text/css" />
    <link href="./style/annonce-pop-up.css" rel="stylesheet" type="text/css" />
    <link href="./style/index.css rel="stylesheet" type="text/css" />
</head>

<body>
    <script src="./js/gerer-photo.js"></script>
    <script src="./js/notif.js"></script>

    <h1>Gérer Photos</h1>
    <form action="./php/gerer-liste-photo.php" method="post" id="formSuppression">
        <div class="container-item">
            {foreach $data_photos as $photo}
                <div class="item">
                    <input type="checkbox" name="liste-photos[]" value="{$photo.id_photo}">
                    <div class="container-img">
                    <img src="{$photo.url_photo}" alt="{$photo.titre_poste}"/>
                    </div>
                    <div class="container-info">
                        <div class="info-photo" id="id-photo-{$photo.id_photo}">
                            <div class="date-poste">{$photo.date_poste}</div>
                            <div class="titre-poste">{$photo.titre_poste}</div>
                            <div class="auteur-poste">Posté par {$photo.nom} {$photo.prenom}</div>
                            <div class="description-poste">
                                {$photo.description_poste}
                            </div>
                            <div class="visible">{$photo.valide}</div>
                        </div>
                    </div>

                    <button class="modifier-btn" type="button" onclick="openModifierPopUp({$photo.id_photo})">Modifier</button>
                    <button class="supprimer-btn" type="button" onclick="openSupprimerPopUp({$photo.id_photo})">Supprimer</button>
                </div>
            {/foreach}
        </div>
        <div class="supprimer">
        <div>
            <button class="btn" type="submit" name="action" value="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les photos sélectionnées ?')">Supprimer photo(s)</button>
        </div>
        </div>
    </form>

    <div id="overlay"></div>

    <div class="popup" id="modifierPopup">
        <h2>Modifier une photo</h2>
        <form id="uploadForm" action="./php/modifier-photo.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id-photo" name="id-photo" value="">

            <label for="date">Date :</label>
            <input type="date" id="date" name="date" placeholder="YYYY-MM-DD" required>

            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" placeholder="Titre de la photo.." maxlength="50" required>

            <label for="description">Légende :</label>
            <textarea id="description" name="description" placeholder="Légende de la photo..." maxlength="100" required></textarea>

            <label for="file">Sélectionnez une photo :</label>
            <input type="file" name="file" id="file" accept="image/*">

            <button type="submit" id="submitBtn">Envoyer</button>
            <button type="button" id="closeModifierPopupBtn">Fermer</button>
        </form>
        </div>

    <div class="popup" id="supprimerPopup">
        <h2>Supprimer la photo ?</h2>
        <form id="supprimerForm" action="./php/supprimer-photo.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id-photo-to-delete" name="id-photo-to-delete" value="">

            <button type="submit" id="submitBtn">Confirmer</button>
            <button type="button" id="closeSupprimerPopupBtn">Fermer</button>
        </form>
    </div>

</body>

</html>
