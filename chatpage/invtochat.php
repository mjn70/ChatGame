<?php
              session_start();// Starting Session

                include('conm.php');
             
                
                $player_id = $_SESSION['$player_id'];
                $login_sid = $_SESSION['login_id'];
                
                   $get =  "select ((select id from login WHERE id =$login_sid) +(select id from login WHERE id = $player_id)) as gropchat";  
		   $sunchatid = $conn->query($getget);
                   if($sunchatid ==  1){
                       
                   $_SESSION['chat_id'] = $sunchatid['gropchat']; 
                    $get = "";
                     
                    
                    $_SESSION['Chat_gorp_id']; 
                   }
?>