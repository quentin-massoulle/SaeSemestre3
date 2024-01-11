<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>replit</title>
    <link href="./style/liste-adherent.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <script src="script.js"></script>
    <h1>Mes Annonces</h1>
    <form action="./php/supprimer-annonce-user.php" method="post" id="formSuppression">
        <div class="container-item">
            {foreach $data_annonces as $annonce}
                <div class="item" id="id-annonce-{$annonce.id_annonce}>
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
                        </div>
                    </div>

                    <button class="modifier-btn" onclick="call pop up modifier id => {$annonce.id_annonce}">Modifier</button>
                    <button class="supprimer-btn" onclick="call pop up supprimer id => {$annonce.id_annonce}">Supprimer</button>
                </div>
            {/foreach}
        </div>
        <div class="supprimer">
            <div>
                <button class="btn" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'/les annonces sélectionnés ?')">Supprimer annonces(s)</button>
            </div>
        </div>
    </form>

</body>

</html>
