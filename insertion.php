<?php
     require_once('connexion_bdd.php');
     if(isset($_POST['submit'])){
        $pdostat = $conn->prepare('INSERT INTO gardien VALUES(NULL, :etage, :position, :puissance, :marque, :date_change)');
    
        $pdostat->bindParam(':etage', $_POST['etage'], PDO::PARAM_STR);
        $pdostat->bindParam(':position', $_POST['position'], PDO::PARAM_STR);
        $pdostat->bindParam(':puissance', $_POST['puissance_ampoule'], PDO::PARAM_STR);
        $pdostat->bindParam(':marque', $_POST['marque_ampoule'], PDO::PARAM_STR);
        $pdostat->bindValue(':date_change', $_POST['date_changement'], PDO::PARAM_STR);
    
        $insertisok = $pdostat->execute();
         
        if($insertisok){
            $message = 'votre enregistrement a été ajouté avec succés';
        }
        else{
            $message = 'Veuillez recommencer svp, une erreur est survenue';
        }
        
        header('Location: index.php');
        
    }

   
     
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord des changements d'ampoule</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

<h1>Tableau de bord du gardien d'immeuble</h1>
    <h1>Remplacement d'ampoule</h1><br><br><br>
<div>
<form action="insertion.php" method="post">
            <div>
               <label for="etage-select">A quel étage le Remplacement d'ampoule a eu lieu :</label>
                    <select  id="etage-select" name="etage">
                        <option value="">--Veuillez choisir un étage--</option>
                        <option value="Rez de chaussée">Rez de chaussée</option>
                        <option value="1 er étage ">1 er étage </option>
                        <option value="2 iéme étage">2 iéme étage </option>
                        <option value="3 iéme étage">3 iéme étage </option>
                        <option value="4 iéme étage">4 iéme étage </option>
                        <option value="5 iéme étage">5 iéme étage  </option>
                        <option value="6 iéme étage">6 iéme étage  </option>
                        <option value="7 iéme étage">7 iéme étage  </option>
                        <option value="8 iéme étage">8 iéme étage  </option>
                        <option value="9 iéme étage">9 iéme étage  </option>
                        <option value="10 iéme étage">10 iéme étage  </option>
                        <option value="11 iéme étage">11 iéme étage </option>
                    </select>
            </div>
            <br><br><br><br>
            <div>
           
               <label for="position-select">A quelle position dans le couloir, le Remplacement d'ampoule a eu lieu :</label>
                    <select  id="position-select" name="position">
                        <option value="">--Veuillez choisir la position dans le couloir--</option>
                        <option value="Au fond du couloir">Au fond du couloir</option>
                        <option value="Coté doite du couloir">Coté gauche du couloir </option>
                        <option value="Coté gauche du couloir">Coté droit du couloir</option>
                        
                    </select>
            </div>
            <br><br><br><br>
            <div>
               <label for="puissance-select">quelle est la puissance de l'ampoule changée:</label>
                    <select  id="puissance-select" name="puissance_ampoule">
                 <option value="">--Veuillez choisir la puissance de l'ampoule remplacée--</option>
                        <option value="25 Watts">25Watts</option>
                        <option value="40 Watts">40Watts</option>
                        <option value="60 Watts">60Watts</option>
                        <option value="75 Watts">75Watts</option>
                        <option value="100 Watts">100Watts</option>
                        <option value="150 Watts">150Watts</option>
                    
                    </select>
            </div>
            <br><br><br><br>
            <div>
               <label for="marque-select">quelle est la marque de l'ampoule changée:</label>
                    <select  id="marque-select" name="marque_ampoule">
                        <option value="">--Veuillez choisir la marque de l'ampoule remplacée--</option>
                        <option value="Osram">Osram</option>
                        <option value="Philips">Philips</option>
                        <option value="Legrand">Legrand</option>
                        <option value="Xanlite">Xanlite</option>
                        <option value="Edison">Edison</option>
                        <option value="Bridgelux">Bridgelux</option>
                        <option value="Kanlux">Kanlux</option>
                    
                    </select>
            </div>
            <br><br><br><br>
            <div>
            <label for="date-select">quelle est la date du changement de l'ampoule changée:</label>
                <input type="date" id="date-select" name="date_changement">
            </div>
            vous pouvez ajouter, modifier et ou supprimer ce que vous venez de saisir en cliquant sur les boutons!
            <div>
                  <input type="submit" name="submit" value="ajouter">
            </div>
            <div>
                    <button type="submit" name="modifier">Modifier</button>
            </div>
            <div>
                    <button type="submit" name="supprimer">Supprimer</button>
            </div>
            </form>   


            <div>
                    <p>
                        <?php
                              echo $message;  
                        ?>


                    </p>
            </div>    
           
</div>
 
</body>
</html>