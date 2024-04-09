<?php
if (isset( $_GET['id'] )) {
    $id = $_GET["id"];
}

$servername ="localhost";  // Specify your MySQL Server host name
$username = "root";     // User name of the database
$password = "";        // Password for user specified above
$dbname = "phpnatcrud"; // Name of the database

$connexion = new mysqli($servername, $username, $password,$dbname); // Create a connection to that server

$sql = "DELETE FROM clients WHERE id = $id"; // Prepare the SQL query
$connexion->query($sql);                   // Execute the query

header('Location: ../index.php');        // Redirect the page after executing the query
exit;
