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
<h1>Tableau de bord du gardien d'immeuble</h1>
    <p><a href="edit.php">Ajouter</a></p>
<table>
    <tr>
<th>Etage</th>
<th>Position</th>
<th>Puissance ampoule</th>
<th>Marque ampoule</th>
<th>Date</th>
    
    </tr>

<?php
    $requete = 'SELECT id, etage, position, puissance_ampoule, marque_ampoule, date_changement FROM gardien';
    $sth = $conn->prepare($requete);
    $sth->execute();
    $resultat = $sth->fetchALL(PDO::FETCH_ASSOC);
    $intlDateFormater = new IntlDateFormatter('fr FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
    foreach($resultat as $item){
        echo '<tr>';
        echo '<td>'.$item['id'].'</td>';
        echo '<td>'.$item['etage'].'</td>';
        echo '<td>'.$item['puissance_ampoule'].'</td>';
        echo '<td>'.$item['marque_ampoule'].'</td>';
        echo '<td>'.$item['date'].'</td>';
        echo '<td>'.$intlDateFormater->format(strtotime($item['date_changement'])).'</td>';
        echo '<td><a href="edit.php?edit=1&id='.$item['id'].'">Modifier</a><a href="delete.php?id='.$item['id'].'">Supprimer</a></td>';
        echo'</tr>';
    }
?>
</table>
<?php
if(count($resultat) === 0){
    echo '<p>Vous avez saisi aucun changement</p>';
}
    ?>
</body>
</html>