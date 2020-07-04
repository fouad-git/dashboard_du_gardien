<?php
    session_start();
    if(isset($_SESSION['username']))
    {
        echo '<h3>Connexion réussi, bienvenue dans votre espace' . $_SESSION['username'].'</h3>';
        echo'<br><br><a href="lister.php">Logout</a>';
    }
    else{
        header("Location: lister.php");
    }
    


  
