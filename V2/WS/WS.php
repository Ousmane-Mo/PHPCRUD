<?php
    include 'accesBBD.php';
    try {
        $acces=new accesBDD();
    } catch(Exception $e) {
        header("HTTP/1.0 500 Internal Server Error");
        echo '{"error":"Impossible de se connecter a la base" }';
    };
      header('Content-Type: application/json');
    $produits = $acces->AfficherProduits();

    echo json_encode($produits);
?>