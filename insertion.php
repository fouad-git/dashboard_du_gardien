<?php
     require_once('connexion_bdd.php');
     $message = '';
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
            header('Refresh:2; url=lister.php'); 
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tableau de bord des changements d'ampoule</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <link rel="stylesheet" href="./dist/css/style.css">
            
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
                                        <form  method="post" >
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-6 ">
                                                    <select  class="custom-select" name="etage">
                                                        <option value="">--Veuillez choisir un étage--</option>
                                                        <option value="0">Rez de chaussée</option>
                                                        <option value="1">1 er étage </option>
                                                        <option value="2">2 iéme étage </option>
                                                        <option value="3">3 iéme étage </option>
                                                        <option value="4">4 iéme étage </option>
                                                        <option value="5">5 iéme étage  </option>
                                                        <option value="6">6 iéme étage  </option>
                                                        <option value="7">7 iéme étage  </option>
                                                        <option value="8">8 iéme étage  </option>
                                                        <option value="9">9 iéme étage  </option>
                                                        <option value="10">10 iéme étage  </option>
                                                        <option value="11">11 iéme étage </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-6 ">
                                                    <select class="custom-select"  name="position">
                                                        <option value="">--Veuillez choisir la position dans le couloir--</option>
                                                        <option value="Au fond du couloir">Au fond du couloir</option>
                                                        <option value="Côté droit du couloir">Côté gauche du couloir </option>
                                                        <option value="Côté gauche du couloir">Côté droit du couloir</option>
                                                    </select>
                                                </div>
                                            </div>   
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-6 ">
                                                    <select class="custom-select"  name="puissance_ampoule">
                                                        <option value="">--Veuillez choisir la puissance de l'ampoule remplacée--</option>
                                                        <option value="25Watts">25Watts</option>
                                                        <option value="40Watts">40Watts</option>
                                                        <option value="60Watts">60Watts</option>
                                                        <option value="75Watts">75Watts</option>
                                                        <option value="100Watts">100Watts</option>
                                                        <option value="150Watts">150Watts</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-6 ">
                                                    <select class="custom-select" name="marque_ampoule">
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
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                    <input  class=" w-100 " type="date"  name="date_changement">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 ">
                                                    <input class="btn btn-primary w-100" type="submit" name="submit" value="ajouter">
                                                </div>
                                            </div>
                                            <?php
                                                if(!empty($message)){
                                                    echo '<div class="class-row ">
                                                    <div class=" form-group col-sm-12 col-md-12 col-lg-12"> 
                                                    <div class="alert alert-success w-100" role="alert">
                                                    '.$message.'
                                                    </div>
                                                    </div>
                                                    </div>';
                                                }
                                                ?>
                                    </form> 
                                </div>
                            </div>          
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
                             <script src="https://kit.fontawesome.com/7fbb9a7a75.js" crossorigin="anonymous"></script>
                             </body>
                            </html>                                                        
   
    
    
        
       
        

  
                               
                   
 
                             
                
                
                
                
                                            


                                              
                                                                                                     
                                                                                                     
                                              
                                               
                                                    
                                                       
                                                 
                                                     
                                   
                                              
                                                 
                                                   
                                               
                                                       
               
                                                            


                                    
                      
                                                       
                
                            
    

                            

