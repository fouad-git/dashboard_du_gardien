<?php
    session_start();
require_once('connexion_bdd.php');
try{
    $conn = new PDO($dsn,$identifiant, $pw,$option);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['login']))
    {
        if(empty($_POST['username']) || empty($_POST['password']) )
        {
            $message = '<label>Tous les champs sont requis</lable>';
        }
        else{
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $statement = $conn->prepare($query);
            $statement->execute(
                        array(
                            
                            'username'  => $_POST['username'],
                            'password'  => $_POST['password']
    
                        ));
                        $count = $statement->rowCount();
                        if($count > 0)
                        {
                            $_SESSION['username'] = $_POST['username'];
                            header("Location: lister.php");
                        }
                        else
                        {
                            $message = "<label>Votre nom d'utilisateur ou votre mot de passe est faux</label>";
                        }
                    }
                }
            }
            catch(PDOException $error){
                $message =$error->getMessage();
            } 
            ?>
<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- importer le fichier de style -->
      
        <!-- <link rel="stylesheet" href="./dist/css/style.css"> -->
      <link rel="stylesheet" href="./dist/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container" id="container">
             
             <form method="post">
               <fieldset>
                 <legend>Connexion</legend>
                 
                 <div class="form-group">
                   <label for="nom">Votre nom d'utilisateur</label>
                   <input type="text" id="nom" placeholder="entrer votre nom d'utilisateur" name="username" required>
                 </div>
                 
                 <div class="form-group">
                   <label for="email">Votre mot de passe</label>
                   <input type="password" id="email" placeholder="entrer votre mot de passe" name="password" required>
                   
                <input class="inputindex" type="submit" name="login" id='submit' value='LOGIN' >
                 </div>
                </fieldset>
              </form>
          </div>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
     </body>
 </html>






       

        






    


                 

                 