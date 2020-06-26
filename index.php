<?php
require_once('connexion_bdd.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord du gardien d'immeuble</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<p><a href="insertion.php">Ajouter</a></p>
<table>
    <tr>
    <th>
    id
    </th>
        <th> 
            Etage
        </th>
        <th>
            Position
        </th>
        <th>
            Puissance_ampoule
        </th>
        <th>
            Marque_ampoule
        </th>
       <th>Date_changement
        <th>
            Modifier/Supprimer
        </th>
    </tr>
     
    <?php
        $sql = 'SELECT id, etage, position, puissance_ampoule, marque_ampoule, date_changement FROM gardien';
        $pdostat = $conn->prepare($sql);
        $pdostat->execute();
        $result = $pdostat->fetchAll(PDO::FETCH_ASSOC);
        $intlDateFormater = new IntlDateFormatter('fr FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
        foreach($result as $row){
            echo '<tr>';
            echo '<td>'.$row['id'].' '.'</td>';
            echo '<td>'.$row['etage'].' '.$row['position'].'</td>';
            echo '<td>'.$row['puissance_ampoule'].' '.$row['marque_ampoule'].' '.'</td>';
            echo '<td>'.$intlDateFormater->format(strtotime($row['date_changement'])).'</td>';
            echo '<td><a href="insertion.php?insertion=1&id='.$row['id'].'">Modifier</a><a href="supprime.php?id='.$row['id'].'">Supprimer</a></td>';
            echo'</tr>';
        } 
        
        
        ?>
</table>

        <?php
        if(count($result) === 0){
            echo '<p>Aucune saisi</p>';
        }
        ?>
</body>
</html>