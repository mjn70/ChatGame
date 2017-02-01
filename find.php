<?php
include ('conm.php');
      
     mysqli_stat($conn);
         
              $findquery  = ("SELECT username from login WHERE NOT username ='$login_session;'");
              $findq = $conn->query($findquery );
              if (isset($_POST['SearchOp']))
              {
              
        if ($findq <= 1) {
            echo  array_rand($findq,1); 
            $_SESSION['player_session'] = $findq;
//            $findquery =("");
            mysqli_close($conn);
            
        } else {
        echo "Did not find player" ;   
        mysqli_close($conn);
}
              }


?>