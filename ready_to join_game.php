<?php
session_start();
include('conm.php');
             
     if(isset($_POST['ready'])){
            $login_sid = $_SESSION['login_id'];
            $login_sname =$_SESSION['login_user'];
           //get key room
            $game_key = $_SESSION['Chat_gorp_id'];
            //update player1 stat in room table 
             mysqli_query($conn, "UPDATE room_mm SET player2 = 1 WHERE room_id ='$game_key'");
                    
           $check_ready_stat = "SELECT player1,player2 FROM room_mm WHERE room_id = '$game_key'";
           $player_stat = mysqli_query($conn, $check_ready_stat);
            if (mysqli_num_rows($player_stat) == 1 ){
                $fetch_game_stat = mysqli_fetch_array($player_stat);
                $player1_stat = $fetch_game_stat["player1"];
                $player2_stat = $fetch_game_stat["player2"];
                if($player1_stat == 1 && $player2_stat == 1){
   mysqli_query($conn,"INSERT INTO message (user,text,convid) VALUES('$login_sname','Has Join The Game','$game_key')");

                    echo 1;
                } else {
                   echo 0; 
                }
            } else {
                echo 0;    
            }   
       }

?>