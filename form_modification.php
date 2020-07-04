<?php
     require_once('connexion_bdd.php');
     if(isset($_GET['id'])){
         $sql = 'SELECT id, etage, position, puissance_ampoule, marque_ampoule, date_changement FROM gardien WHERE id = :id';
         $pdostat = $conn->prepare($sql);
         $pdostat->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
         $executeisok = $pdostat->execute();
         $result = $pdostat->fetch(PDO::FETCH_ASSOC);
         $etage = '';
         $etage = $result['etage'];
         $position = '';
         $position = $result['position'];
         $puissance = '';
         $puissance = $result['puissance_ampoule'];
         $marque = '';
         $marque = $result['marque_ampoule'];
         $date = '';
         $date = $result['date_changement'];
        }
        ?>
     


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./dist/css/style.css">
    
    <title>Formulaire de modification</title>
</head>
<body>
<div class="conatiner-fluid mb-5 contain-nav ">
    <div class="container">
        <div class="row">
        <div class="col-12 d-sm-col-12 d-md-col-12 d-lg-col-12 ">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <?php
                            session_start();
                            if(isset($_SESSION['username'])){
                        echo '<div class="d-flex justify-content-between w-100 ">
                               
                                <div class="d-flex justify-content-between">
                                    <span>Bienvenue</span><span>'. $_SESSION['username'].'</span>
                                </div>
                                     <div class="d-flex justify-content-between">
                                         <a href="insertion.php"><i class="fas fa-plus-square fa-2x"></i></a>
                                        <a href="index.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>         
                                        </div>
                                </div>';
                             }
                        else{
                            header("Location: index.php");
                            }
                    ?>
                        </nav>
                    </div>
                </div>
            </div>
        </diV>
        <div class="container-fluid">
            <div class="container">
                <form action="modifier.php" method="post">
            <div class="form-row">
                <div class="form-group col-sm-12 col-md-12 col-lg-6 ">
                <select class="custom-select" name="etage">
                    <?php 
                        for($i=0; $i<12 ; $i++){
                            $select='';
                            if($i == $etage){
                                $select = "selected";
                            }
                            echo '<option value="'.$i.'"'.$select.'>'. $i .'</option>';            
                        }
                    ?>
                </select>      
            </div>
            <div class="form-group col-sm-12 col-md-12 col-lg-6 ">
                <select class="custom-select" name="position"> 
                            <?php
                                $positionarrays = array("côté droit du couloir", "au fond du couloir", "côté gauche du couloir");
                                foreach($positionarrays as $positionarray){
                                       $select='';
                                           if($positionarray == $position){
                                               $select = "selected";
                                            }
                                       echo '<option value="'.$positionarray.'"'.$select.'>'. $positionarray .'</option>';  
                                 }
       
                            ?>
                        </select>
                    </div>
                </div>
              <div class="form-row">
                  <div  class="form-group col-sm-12 col-md-12 col-lg-6 ">
                      <select  class="custom-select" name="puissance_ampoule">
                      <?php
                              $puissancearrays = array("25Watts", "40Watts", "40Watts", "60Watts", "75Watts", "100Watts", "150Watts");
                                  foreach($puissancearrays as $puissancearray){
                                      $select='';
                                          if($puissancearray == $puissance){
                                              $select = "selected";
                                          }
              
                                          echo '<option value="'.$puissancearray.'"'.$select.'>'. $puissancearray .'</option>';
                                  }
                      ?>
                      </select>
                  </div>
                  <div  class="form-group col-sm-12 col-md-12 col-lg-6 ">
                      <select  class="custom-select"  name="marque_ampoule">
                          <?php
                              $marquearrays = array("Osram", "Philips", "Philips", "Legrand", "Xanlite", "Edison", "Bridgelux", "Kanlux");
                                  foreach($marquearrays as $marquearray){
                                      $select='';
                                          if($marquearray == $marque){
                                              $select="selected";
                                          }
                                          echo '<option value="'.$marquearray.'"'.$select.'>'. $marquearray .'</option>';
                                  } 
                          ?>
                      </select>
                  </div>
                </div>
                <div class="form-row">
                    <div  class="form-group col-sm-12 col-md-12 col-lg-12 ">
                        <input  class="w-100" type="date" name="date_changement" value="<?=strftime("%Y-%m-%d",strtotime($date)); ?>">
                    </div>
                    <div  class="form-group col-sm-12 col-md-12 col-lg-12 ">
                        <input  class="btn btn-primary w-100" type="submit" name="modifier" value="Modifier">
                    </div>                    
                </div>
                <div class="form-row">
                    <div>
                        <input type="hidden" name="id" value="<?= $result['id'] ?>"/>
                    </div>
                </div>
            </form>   
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7fbb9a7a75.js" crossorigin="anonymous"></script>
    </body>
    </html>
                   
 

            


        
                
    
            
                   
              
           
            
            
                

            
            
            
    
            
            
                  
        
        
    

           

    
        
           

        
        
        

         
           
