<?php
session_start();

require_once('connect.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = 'SELECT * FROM `produits` WHERE `id`=:id';
    $query = $db->prepare($sql);    // On prépare la requête
    $query->bindValue(':id', $id, PDO::PARAM_INT);    // On attache les valeurs
    $query->execute();    // On exécute la requête
    $produit = $query->fetch();

    if (!$produit) {
        header('Location: index.php');
    }
} else {
        header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0860c28f1b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
    <title>Oui</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php">Utilisateurs</a>
                        </li>
                    </ul>
                    <ul class="d-flex navbar-nav">
                            <li class="nav-item dropdown mx-4">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-regular fa-user fa-2xl"></i></a>
                                <div class="dropdown-menu me-auto w-25">
                                    <a class="dropdown-item" href="#">Login</a>
                                    <a class="dropdown-item" href="#">Register</a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="">
        <section class="d-flex justify-content-center">
            <table class="table table-hover w-75 text-center my-5 border border-dark">
                <thead class="table-primary">
                    <th scope="col">ID</th>
                    <th scope="col">Nom Produit</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                </thead>
                <tbody class="table-info">
                    <tr>
                        <td><?= $produit['id'] ?></td>
                        <td><?= $produit['name'] ?></td>
                        <td><?= $produit['description'] ?></td>
                        <td><?= $produit['price'] ?></td>
                        <td><a href="edit.php?id=<?= $produit['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $produit['id'] ?>">Supprimer</a></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr><td colspan="5"><a href="add.php">Ajouter un produit</a></td></tr>
                </tfoot>
            </table>
        </section>
    </main>
    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
