<?php
    $servername ="localhost";  // Specify your MySQL Server host name
    $username = "root";     // User name of the database
    $password = "";        // Password for user specified above
    $dbname = "phpnatcrud"; // Name of the database

    $connexion = new mysqli($servername, $username, $password,$dbname); // Create a connection to that server

    // Check if connection failed or not 
    if ($connexion->connect_error) {
        die("Connection failed: " . $connexion->connect_error);
    }
    // create and execute the wanted query
    $sql="SELECT * FROM clients";
    $clients = $connexion->query($sql);

    //Verify if the query is executed or if it failed
    if (!$clients){
      die("Error in SQL Query" . $connexion->error);
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0860c28f1b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/5/slate/bootstrap.min.css">
    <link rel="stylesheet" href="">
    <script src=""></script>
    <title>Oui</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Oui</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">Nothing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">To see</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Here</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Get Out!</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Move!!!</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">What</a>
                            <a class="dropdown-item" href="">Are</a>
                            <a class="dropdown-item" href="">You</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="">Doing!!!!</a>
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container my-3">
            <h2>Liste des clients</h2>
            <a href="CRUD/createClients.php" class="btn btn-info">Add client</a>
            <table class="table table-hover my-3">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Adress</th>
                        <th scope="col">Created  at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $clients->fetch_assoc()) {?>
                        <tr>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["phone"] ?></td>
                            <td><?= $row["adress"] ?></td>
                            <td><?= $row["created_at"] ?></td>
                            <td>
                                <a href="CRUD/updateClients.php?id=<?= $row["id"]?>" class="btn btn-info">Update</a>
                                <a href="CRUD/deleteClients.php?id=<?= $row["id"]?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>