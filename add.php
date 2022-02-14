<?php
//demarre une session
session_start();
//inclussion de la connexion à la base
require_once('connect.php');
;

//var_dump($result);
require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Ajouter un article</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="Titre">Titre</label>
                        <input type="text" id="Titre" name="Titre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input type="text" id="Description" name="Description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Prix">Prix</label>
                        <input type="text" id="Prix" name="Prix" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="text" id="Image" name="Image" class="form-control">
                    </div>
                    <button class="btn btn-primary">Envoyer</button>
                </form>
                
            </section>

            <div />

    </main>
</body>

</html>