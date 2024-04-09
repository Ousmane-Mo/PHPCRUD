<?php
class accesBDD
{
 private $connexion;
 private $login = "root";
 private $password = "";
 private $db = "phpnatcrud";
 private $server="localhost";
 private $options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

function __construct() {
    $this->connexion = new PDO('mysql:host='.$this->server.';dbname='.$this->db, $this->login, $this->password, $this->options);
}
public function AfficherProduits()   {
    $sql = 'SELECT * FROM `produits`'; // On écrit notre requête
    $query = $this->connexion->query($sql); // On prépare la requête
    $produits = $query->fetchAll(PDO::FETCH_ASSOC); // On stocke le résultat dans un tableau associatif
    
    return $produits;
}
public function AfficherProduit($id)   {
    $sql="SELECT * FROM produits WHERE id = $id";
    $query =$this->connexion->query($sql);
    $produit = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $produit;
}
public function AjouterProduit($name, $description, $price)   {
    $sql="INSERT INTO `produits` (`name`,`description`, `price`) VALUES ('$name', '$description', '$price') ";
    $query = $this->connexion->exec($sql);
    
    return $query;
}

public function ModifierProduit($id,$name, $description, $price)   {
    $sql="UPDATE `produits` (`name`,`description`, `price`) VALUES ('$name', '$description', '$price') WHERE id = $id";
    $query = $this->connexion->exec($sql);
    
    return $query;
}
public function SupprimerProduit($id)   {
    $sql="DELETE * FROM `produits` WHERE id = $id";
    $query = $this->connexion->exec($sql);
    
    return $query;
}

}
?>
