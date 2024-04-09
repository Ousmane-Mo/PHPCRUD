<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['description']) && !empty($_POST['description'])
        && isset($_POST['price']) && !empty($_POST['price'])){
            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);
            $price = strip_tags($_POST['price']);

            $sql = "INSERT INTO `produits` (`name`, `description`, `price`) VALUES (:name, :description, :price);";

            $query = $db->prepare($sql);

            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR);
            $query->bindValue(':price', $price, PDO::PARAM_INT);

            $query->execute();
            $_SESSION['message'] = "Produit ajouté avec succès !";
            header('Location: index.php');
        }
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
    <main>
        <section class="d-flex justify-content-center my-5">
            <form method="post">
                <label for="name">Name</label> <input type="text" name="name" id="name">
                <label for="description">Description</label> <input type="text" name="description" id="description">
                <label for="price">Price</label> <input type="number" name="price" id="price">
                <button>Enregistrer</button>
            </form>
        </section>
    </main>
    <footer></footer>
</body>
</html>