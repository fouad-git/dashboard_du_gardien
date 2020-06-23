<?php
$nomserveur = 'localhost';
$identifiant = 'root';
$login = '';
$option =  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try{
    $conn = new PDO("mysql:host=$nomserveur;port=3308;dbname=dashboard_du_gardien",$identifiant, $login,$option);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
  }
?>