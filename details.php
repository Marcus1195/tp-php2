<?php
//demarre une session
session_start();

// Est-ce que immage existe et n'est pas vide dans l'url

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('connect.php');
    //on nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT  * FROM  `articles` WHERE `id` = :id;';

    //On prépare la requete
    $query = $db->prepare($sql);
    //on doit accrocher les paramètre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //on exécute la requete
    $query->execute();
    // on récupère le produit
    $produit = $query->fetch();
    //on verifie si le produit existe
    if (!$produit) {
        $_SESSION['erreur'] = "cet id n'existe pas";
        header('location : index.php');
    }
} else {
    $_SESSION['erreur'] = "url invalide";
    header('location: index.php');
};
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Image de l'article</title>

</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php $img = $produit['Image']; ?>

                <h1>Détails du produit <?= $produit['Titre'] ?></h1>
                <p>ID : <?= $produit['id'] ?> </p>
                <p>Titre : <?= $produit['Titre'] ?></p>
                <p>Description : <?= $produit['Description'] ?></p>
                <p>Prix :<?= $produit['Prix'] ?> </p>
                <p>Image : </p>

                <?php echo "<img src='$img'/>" . "<br/><br/>"; ?>

                <p> <a href="index.php">Retour</a> <a href="edit.php?id=<?$produit['id']?>">Modifier</p>
            </section>
        </div>
    </main>
</body>

</html>