<?php
     require_once('connexion_bdd.php');
     $sql = 'UPDATE gardien SET etage=:etage, position=:position, puissance_ampoule=:puissance, marque_ampoule=:marque, date_changement=:date_change WHERE id=:id LIMIT 1';
     $pdostat = $conn->prepare($sql);
     $pdostat->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
     $pdostat->bindParam(':etage', $_POST['etage'], PDO::PARAM_STR);
     $pdostat->bindParam(':position', $_POST['position'], PDO::PARAM_STR);
     $pdostat->bindParam(':puissance', $_POST['puissance_ampoule'], PDO::PARAM_STR);
     $pdostat->bindParam(':marque', $_POST['marque_ampoule'], PDO::PARAM_STR);
     $pdostat->bindValue(':date_change',strftime("%Y-%m-%d",strtotime( $_POST['date_changement'])), PDO::PARAM_STR);
     $pdostat->execute();
     header('Location: lister.php'); 
     ?>
      

     
