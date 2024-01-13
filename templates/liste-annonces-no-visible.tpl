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

    <h1>Gérer les Annonces</h1>
    <form action="./php/gerer-liste-annonce.php" method="post" id="formSuppression">
    <div class="container-item">
        <!-- Une seule boucle foreach ici -->
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
        <div>
            <button class="btn" type="submit" name="action" value="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les annonces sélectionnées ?')">Supprimer annonce(s)</button>
        </div>
        <div>
            <button class="btn" type="submit" name="action" value="valider">Valider annonce(s)</button>
        </div>
    </div>
</form>


    <div id="overlay"></div>

    <div class="popup" id="modifierPopup">
        <h2>Modifier une annonce</h2>
        <form action="./php/gerer-liste-annonce.php" method="post" id="formSuppression">
    <div class="container-item">
        <!-- Une seule boucle foreach ici -->
        {foreach $data_annonces as $annonce}
            <div class="item">
                <input type="checkbox" name="liste-annonces[]" value="{$annonce.id_annonce}">
                <div class="container-img">
                    <img src="{$annonce.url_photo}" alt="{$annonce.titre_poste}" />
                </div>
                <div class="container-info">
                    <div class="info-annonce" id="id-annonce-{$annonce.id_annonce}">
                        <div class="date-poste">{$annonce.date_poste}</div>
                        <div class="titre-poste">{$annonce.titre_poste}</div>
                        <div class="auteur-poste">Posté par {$annonce.nom} {$annonce.prenom}</div>
                        <div class="description-poste">{$annonce.description_poste}</div>
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
        <div>
            <input type="submit" class="btn" name="action" value="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les annonces sélectionnées ?')">
        </div>
        <div>
            <input type="submit" class="btn" name="action" value="valider">
        </div>
    </div>
</form>

    </div>

</body>

</html>
