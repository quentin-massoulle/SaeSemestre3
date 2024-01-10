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
    <h1>Liste adhérents</h1>
    <h2>Admin</h2>
    <form action="./php/supprimer-adherents.php" method="post" id="formSuppression">
        <div class="container-item">

            {foreach $data_adherent as $adherent}
            <div class="item">
                <div class="checkbox"></div>
                <input type="checkbox" name="adherents[]" value="{$adherent['id_utilisateur']}">
                <div class="info">
                    <div class="container-img-profil">
                        <img src="" alt="image_profil">
                    </div>
                    <div class="user-info">
                        <p>{$adherent['nom_adherent']}</p>
                        <p>{$adherent['prenom_adherent']}</p>
                    </div>
                </div>
            </div>
            {/foreach}

        </div>
        <div class="supprimer">
            <div>
                <button class="btn" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les adhérents sélectionnés ?')">Supprimer adhérents</button>
            </div>
        </div>
    </form>

</body>

</html>
