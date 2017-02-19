<?php
              session_start();// Starting Session

                include('conm.php');
      if(isset($_POST['sending'])){ 
                
                $player_id = $_SESSION['$player_id'];
                $player_name = $_SESSION['$player_name'];
                        
                $login_sid = $_SESSION['login_id'];
                $login_sname =$_SESSION['login_user'];
                
                       //get to useres ids and compiend them         
                   $get = mysqli_query($conn,"select ((select id from login WHERE id =$login_sid) +(select id from login WHERE id = $player_id)) as gropchat");  
		   $sumchatid = mysqli_fetch_array($get);
                   
                   if($sumchatid['gropchat'] !=  ""){
                      $findchat = $sumchatid['gropchat'];
                      // Encrypt the values 
                      $findchat = sha1($findchat);
                      // set a session for chat id
                      $_SESSION['Chat_gorp_id'] = $findchat;
                      // strat the chat 
                      $staret_chat = mysqli_query($conn,"INSERT INTO message (user,text,convid) VALUES('Bot','you now chating with $player_name', '$findchat')");
                      // add the user name in friends list
                      $addtolist = mysqli_query($conn,"INSERT INTO friends (`fid`, `fname`, `fchatid`) VALUES ('$player_id', '$player_name', '$findchat')");
                      
                   echo "invite Send to ". $player_name ." chat id:".$findchat;

                   } else { 
                       echo "invite fail";           
            }
        }
?>