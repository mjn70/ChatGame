<?php
session_start();
include('conm.php');

            $login_sid = $_SESSION['login_id'];
            $login_sname =$_SESSION['login_user'];
           //get key room
            $game_key = $_SESSION['Chat_gorp_id'];
            
//  if(isset($_POST['game_rule'])){ 
      
      //check playing stat in table 
      $gamerule_q = mysqli_query($conn, "SELECT playing_stat,tag from room_mm WHERE room_id ='$game_key'");
      $row = mysqli_num_rows($gamerule_q);
      if ($row ==1){
          $fetch_gaem_info = mysqli_fetch_array($gamerule_q);
          $game_stat = $fetch_gaem_info["playing_stat"];
          $play_tag = $fetch_gaem_info["tag"];
          if($game_stat == 1 || $play_tag == 1){
                $myObjr->gamer = 1;
            $myJSON = json_encode($myObjr);
            echo $myJSON; 
          } else if ($game_stat == 1 || $play_tag == 0)  {
                $myObjr->gamer = 0;
            $myJSON = json_encode($myObjr);
            echo $myJSON;
          }
          
          
      }
//  }
?>