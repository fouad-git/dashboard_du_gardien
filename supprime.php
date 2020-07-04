<?php
    require_once('connexion_bdd.php');
    if(isset($_GET['id'])){
        $sql = 'DELETE FROM gardien WHERE id= :id';
        $pdostat = $conn->prepare($sql);
        $pdostat->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $pdostat->execute();
        header('Location: lister.php');
    }
    ?>
