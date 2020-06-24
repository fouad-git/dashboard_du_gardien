<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord des changements d'ampoule</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<h1>Remplacement d'ampoule</h1><br><br><br>
<div>
<form action="" method="post">
            <div>
               <label for="etage-select">A quel étage le Remplacement d'ampoule a eu lieu :</label>
                    <select name="etage" id="etage-select" name="">
                        <option value="">--Veuillez choisir un étage--</option>
                        <option value="RC">Rez-de-chaussée</option>
                        <option value="1">1er étage </option>
                        <option value="2">2 iéme étage</option>
                        <option value="3">3 iéme étage</option>
                        <option value="4">4 iéme étage</option>
                        <option value="5">5 iéme étage </option>
                        <option value="6">6 iéme étage </option>
                        <option value="7">7 iéme étage </option>
                        <option value="8">8 iéme étage </option>
                        <option value="9">9 iéme étage </option>
                        <option value="10">10 iéme étage </option>
                        <option value="11">11 iéme étage </option>
                    </select>
            </div>
            <br><br><br><br>
            <div>
               <label for="position-select">A quelle position dans le couloir, le Remplacement d'ampoule a eu lieu :</label>
                    <select name="etage" id="position-select" name="">
                        <option value="">--Veuillez choisir la position dans le couloir--</option>
                        <option value="Au fond du couloir">Au fond du couloir</option>
                        <option value="Coté doite du couloir">Coté gauche du couloir </option>
                        <option value="Coté gauche du couloir">Coté droit du couloir</option>
                        
                    </select>
            </div>
            <br><br><br><br>
            <div>
               <label for="puissance-select">quelle est la puissance de l'ampoule changée:</label>
                    <select name="etage" id="puissance-select" name="">
                        <option value="">--Veuillez choisir la puissance de l'ampoule remplacée--</option>
                        <option value="25Watts">25Watts</option>
                        <option value="40Watts">40Watts</option>
                        <option value="60Watts">60Watts</option>
                        <option value="75Watts">75Watts</option>
                        <option value="100Watts">100Watts</option>
                        <option value="150Watts">150Watts</option>
                    
                    </select>
            </div>
            <br><br><br><br>
            <div>
               <label for="marque-select">quelle est la marque de l'ampoule changée:</label>
                    <select name="etage" id="marque-select" name="">
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
                <input type="date" id="date-select" name="">
            </div>
            vous pouvez ajouter, modifier et ou supprimer ce que vous venez de saisir en cliquant sur les boutons!
            <div>
                  <button type="submit" name="">Ajouter</button>  
            </div>
            <div>
                    <button type="submit" name="">Modifier</button>
            </div>
            <div>
                    <button type="submit" name="">Supprimer</button>
            </div>
            </form>           
</div>
    
</body>
</html>