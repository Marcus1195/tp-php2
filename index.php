<?php
//demarre une session
session_start();
//inclussion de la connexion à la base
require_once('connect.php');

$sql = 'SELECT * FROM  `articles` ';

// on prépare la requete
$query = $db->prepare($sql);
//on exécute la requete
$query->execute();
//on stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($result);
require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Articles</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                if (!empty($_SESSION['erreur'])) {
                    echo '<div class="alert alert-danger" role="alert">
  ' . $_SESSION['erreur'] . '
</div>';
                    $_SESSION['erreur'] = "";
                }
                ?>
                <h1>Liste des articles</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Image</th>

                    </thead>
                    <tbody>
                        <?php
                        // on boucle sur la variable result
                        foreach ($result as $produit) {
                        ?>
                            <tr>
                                <td><?= $produit['id'] ?></td>
                                <td><?= $produit['Titre'] ?></td>
                                <td><?= $produit['Description'] ?></td>
                                <td><?= $produit['Prix'] ?></td>
                                <td><?php echo "<img style=width:150px; src=".$produit['Image'].">" ?></td>
                                <td><a href="details.php?id=<?= $produit['id'] ?>">voir</a></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Ajouter un article</a>
               
            </section>

            <div />

    </main>
</body>

</html>