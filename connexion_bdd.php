<?php
$nomserveur = 'localhost';
$identifiant = 'root';
$login = 'root';
$option = ' array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'))';

try{
    $conn = new PDO("mysql:host=$nomserveur;dbname=dashboard_du_gardien",$identifiant, $login,$option);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo  'connexion réussi';
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
  }
  ?>

/* define('DATABASE', 'livecoding');
define('USER', 'root');
define('PWD', '');
define('HOST', 'localhost');
//On essaie de se connecter
try {
     //On définit le mode d'erreur de PDO sur Exception
$dbh = new PDO('mysql:host='.HOST.';port=3308;dbname='.DATABASE, USER, PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));//après le array c'est une option pour afficher les caractéres en utf-8

/*On capture les exceptions si une exception est lancée et on affiche
    les informations relatives à celle-ci*/

/*
} catch (PDOException $e) {
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
} */
?>