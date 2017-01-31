<?php
include ('conm.php');
      
        $findqs = ("SELECT username from login WHERE NOT username ='$login_session;'");
              $findq = $conn->query($findqs );
        if ($findq <= 1) {
            echo  array_rand($findq,1); 
            $_SESSION['player_session'] = $findq;
        } else {
        echo "Did not find payer" ;           
}


?>