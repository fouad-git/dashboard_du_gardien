<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord du gardien d'immeuble</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./dist/css/style.css">
</head>
<body>
    <div class="container-fluid mb-5 contain-nav">
        <div class="container">
            <div class="row">
                <div class="col-12 d-sm-col-12 d-md-col-12 d-lg-col-12 ">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <?php
                        require_once('connexion_bdd.php');
                            session_start();
                            if(isset($_SESSION['username'])){
                        echo '<div class="d-flex justify-content-between w-100 ">
                               
                                <div class="d-flex justify-content-between"><span><i class="fas fa-user-circle fa-2x"></i></span><span>'. $_SESSION['username'].'</span></div>
                                     <div class="d-flex justify-content-between">
                                             <a href="insertion.php"><i class="fas fa-plus-square fa-2x"></i></a>
                                                 <a href="index.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>          </div> </div>';
                             }
                        else{
                            header("Location: index.php");
                             }
                             ?>
                     </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container lampio ">
            <table class="table table-hover table-borderless text-white">
                <thead >
                    <tr class="d-flex flex-column d-sm-table-row d-md-table-row d-lg-table-row">
                        <th scope="col" class="d-none d-sm-none d-md-none d-lg-table-cell">Id</th>
                        <th scope="col" class="d-none d-sm-none d-md-none d-lg-table-cell"> Etage </th>
                        <th scope="col" class="d-none d-sm-none d-md-none d-lg-table-cell">Position</th>
                        <th scope="col" class="d-none d-sm-none d-md-none d-lg-table-cell">Puissance_ampoule</th>
                        <th scope="col" class="d-none d-sm-none d-md-none d-lg-table-cell">Marque_ampoule </th>
                        <th scope="col" class="d-none d-sm-none d-md-none d-lg-table-cell">Date_changement</th>
                        <th scope="col" class="d-none d-sm-none d-md-none d-lg-table-cell">Modifier_Supprimer</th>
                    </tr>
                </thead>
                <?php
                   $sql = 'SELECT id, etage, position, puissance_ampoule, marque_ampoule, date_changement FROM gardien';
                   $pdostat = $conn->prepare($sql);
                   $pdostat->execute();
                   $result = $pdostat->fetchAll(PDO::FETCH_ASSOC);
                   $intlDateFormater = new IntlDateFormatter('fr FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
                   echo '<tbody>';
                   foreach($result as $row){
                       echo'<tr class="d-flex flex-column d-sm-table-row d-md-table-row d-lg-table-row">';
                       echo '<td class="d-flex d-sm-flex d-md-flex justify-content-between d-sm-flex-justify-content-between d-md-flex-justify-content-between d-lg-table-cell"><span class="d-inline d-sm-inline d-md-none d-lg-none">id</span><span class="d-inline d-sm-inline d-md-none d-lg-table-cell">'.$row['id'].'</span></td>';
                       echo '<td class="d-flex justify-content-between d-sm-flex-justify-content-between d-md-flex-justify-content-between d-lg-table-cell"><span class="d-inline d-sm-inline d-md-inline d-lg-none ">etage</span><span >'.$row['etage'].'</span></td>';
                       echo'<td class="d-flex justify-content-between d-sm-flex-justify-content-between d-md-flex-justify-content-between d-lg-table-cell"><span class="d-inline d-sm-inline d-md-inline d-lg-none ">position</span><span >'.$row['position'].'</span></td>';
                       echo '<td class="d-flex justify-content-between d-sm-flex-justify-content-between d-md-flex-justify-content-between d-lg-table-cell"><span class="d-inline d-sm-inline d-md-inline d-lg-none ">Puissance_ampoule</span><span >'.$row['puissance_ampoule'].'</span></td>';
                       echo'<td class="d-flex justify-content-between d-sm-flex-justify-content-between d-md-flex-justify-content-between d-lg-table-cell"><span class="d-inline d-sm-inline d-md-inline d-lg-none ">Marque_ampoule</span><span >'.$row['marque_ampoule'].'</span></td>';
                       echo '<td class="d-flex justify-content-between d-sm-flex-justify-content-between d-md-flex-justify-content-between d-lg-table-cell"><span class="d-inline d-sm-inline d-md-inline d-lg-none ">date_changement</span><span >'.$intlDateFormater->format(strtotime($row['date_changement'])).'</span></td>';
                       echo '<td class="d-flex justify-content-between d-sm-flex-justify-content-between d-md-flex-justify-content-between d-lg-flex-justify-content-between"><span class="d-inline d-sm-inline d-md-inline d-lg-table-cell "><a href="form_modification.php?id='.$row['id'].'"><i class="far fa-edit fa-2x"></i></a></span><span class="d-inline d-sm-inline d-md-inline d-lg-table-cell "><a href="supprime.php?id='.$row['id'].'"><i class="fas fa-trash-alt  fa-2x"></i></a></span></td>';
                       echo'</tr>';
                    } 
                    echo'</tbody>';
                    ?>
                   <?php
                        if(count($result) === 0){
                            echo '<tr><td colspan="7"><center>Aucune Saisie!Pour remplir le tableau cliquer su le plus en haut!</center></td></tr>';
                        }
                        ?>
                </table>  
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/7fbb9a7a75.js" crossorigin="anonymous"></script>
            </body>
            </html>
    
                   
 

    

         
            










               


   
                      
            
            
            
            


    



