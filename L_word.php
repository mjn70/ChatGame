<?php
session_start();

 include ("conm.php");
          
    if(isset($_SESSION['Chat_gorp_id'])){
        
        $chatgrop_id = $_SESSION['Chat_gorp_id'];
        
	$query = mysqli_query($conn, "SELECT last_word FROM room_mm WHERE room_id = '$chatgrop_id'");
	$Rrow = mysqli_num_rows($query);
        if($Rrow == 1){
            //fetch array
            $fetch_q = mysqli_fetch_array($query);
            $word = $fetch_q["last_word"]; 
            if ($word){
                //success
            echo "<div class='alert alert-success'><strong>Last Word was : $word </strong> </div>";
            }elseif (!$word) {
              //Failed
              echo "<div class='alert alert-info' role='alert'><strong>HOST must start the game</strong></div>";    
        }
          }else {
             //Failed
              echo "<div class='alert alert-info' role='alert'><strong>HOST must start the game</strong></div>";    
          }
}
        ?>
