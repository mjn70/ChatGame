                <?php
 
                 include ("conm.php");
                 $user_name = $_POST['plyername'];          
                 
                   $Fq = "SELECT id,username FROM login WHERE username = '$user_name' and username != '$login_session'";
                   $findq = mysqli_query($conn, $Fq);
                   if($findq->num_rows >= 1){
                       $player_id = $findq['id'];
                       $player_name = $findq['username'];
                       // (player1 id + player2 id) = chat id  
                
                   $get =  "select ((select id from login WHERE username ='$login_session') +(select id from login WHERE username ='$user_name')) as gropchat";  
		   $sunchatid = mysqli_query($conn, $getget);
                   if($sunchatid->num_rows >=1){
                       $_SESSION['chat_id'] = $sunchatid['gropchat']; 
                       echo "Find Player : " .$player_name;
                   }
                       
                   } else {
                    echo "0 results";            
           } 
                ?>