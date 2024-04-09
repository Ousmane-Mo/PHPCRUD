<?php

    include( 'accesBDD.php');
    try {
        $acces=new accesBDD();
    } catch(Exception $e) {
        header("HTTP/1.0 500 Internal Server Error");
        echo '{"error":"Impossible de se connecter a la base" }';
    };

    if ($_SERVER['REQUEST_METHOD'] != 'POST' ){
        header("HTTP/1.0 405 Method Not Allowed");
        echo '{"error":"il faut utiliser la methode POST" }';
    } else if ((empty($_POST['description'])) ||(empty($_POST['name'])) ||(empty($_POST['price'])) ) {
        header("HTTP/1.0 400 Bad Request");
        echo '{"error":"Parametres manquants" }';
    } else if (!preg_match("/^0*[1-9]\d*$/",$_POST['price'])) {
         header("HTTP/1.0 400 Bad Request");
        echo '{"error":"le prix doit etre un entier" }';
    } else if (!preg_match("/^[\p{L}-. ]*$/u",$_POST['name'])) {
         header("HTTP/1.0 400 Bad Request");
        echo '{"error":"Le nom doit etre un texte" }';
    } else if (!preg_match("/^[\p{L}-. ]*$/u",$_POST['description'])) {
        header("HTTP/1.0 400 Bad Request");
       echo '{"error":"La description doit etre un texte" }';
   } else {
          $data = $acces->AjouterProduit($_POST['name'],$_POST['description'], $_POST['price']);
        if($data){
            echo'{"succes":"Le nouveau produit a ete enregistre" }';
        } else {
              header("HTTP/1.0 500 Internal Server Error");
        echo '{"error":"Echec de lenregistrement" }';
        }
    }
?>
