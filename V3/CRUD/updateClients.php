<?php
$servername ="localhost";  // Specify your MySQL Server host name
$username = "root";     // User name of the database
$password = "";        // Password for user specified above
$dbname = "phpnatcrud"; // Name of the database

$connexion = new mysqli($servername, $username, $password,$dbname); // Create a connection to that server

    $id = '';
    $name =  '';
    $email = '';
    $phone = '';
    $adress = '';

    $errorMessage = '';
    $successMessage = '';

    // Check if connection failed or not 
    if ($connexion->connect_error) {
        die("Connection failed: " . $connexion->connect_error);
    }   
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET['id'])) {
            header('location: ../index.php');
            exit;
        }
        $id = $_GET['id'];

        $sql = "SELECT * FROM clients WHERE id = '$id' ";
        $result = $connexion->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header('location: ../index.php');
            exit;
        }

        $name =  $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $adress =  $row['adress'];

    } else {
        $id = $_POST['id'];
        $name =  $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $adress =  $_POST["adress"];

        do {
            if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($adress)) {
                $errorMessage = 'All fields are required';
                break;
            }
                $sql = "UPDATE clients SET  name = '$name', email = '$email', phone = '$phone', adress = '$adress' WHERE id= $id";
                $result = $connexion->query($sql);
                //Verify if the query is executed or if it failed
                if (!$result){
                    $errorMessage = 'Invalid query: '. $connexion->$error;
                    break;
                }
                $name =  '';
                $email = '';
                $phone = '';
                $adress = '';

                $successMessage = 'Update completed';
                
                header( "location: ../index.php" );
                exit;
            
        } while (false);
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
    <title>Update Clients</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Oui</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nothing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">To see</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Here</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Get Out!</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Move!!!</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">What</a>
                            <a class="dropdown-item" href="#">Are</a>
                            <a class="dropdown-item" href="#">You</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Doing!!!!</a>
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="container">
            <h1>Update a client data</h1>
        <div class="container my-3">
            <?php if (!empty($errorMessage)) { ?>
                <div class="alert alert-danger alert-dismissable fade show" role="alert">
                <button type="button" class="btn btn-close mx-2" data-bs-dismiss='alert' aria-label='Close'></button>    
                <strong><?= $errorMessage?></strong>
                </div>
            <?php } ?>
            <form method="post">
                <input type="hidden" name="id" value="<?= $id ?>"/>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?= $name ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" value="<?= $email ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone" value="<?= $phone ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Adress</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="adress" value="<?= $adress ?>">
                    </div>
                </div>
                <?php if (!empty($successMessage)) { ?>
                    <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-6">
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                                <strong><?php $successMessage?></strong>
                                <button type="button" class="btn btn-close" data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-outline-info">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="../index.php">Back to home</a>
                    </div>
                </div>
            </form>
        </div>
        </section>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>