<?php


$dsn = "mysql:host=localhost;port=3308;dbname=dashboard_du_gardien";
$identifiant = 'root';
$pw = '';
$option =  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');



try{

    $conn = new PDO($dsn,$identifiant, $pw,$option);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch(PDOException $e){

    echo "Erreur : " . $e->getMessage();
}
?>