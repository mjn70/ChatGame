<?php
session_start();
include('conm.php');
             
     if(isset($_POST['strat_game'])){
            $login_sid = $_SESSION['login_id'];
            $login_sname =$_SESSION['login_user'];
           //get key room
            $game_key = $_SESSION['Chat_gorp_id'];

           $playr_stat = mysqli_query($conn,"SELECT player1,player2 FROM room_mm WHERE room_id = '$game_key'" );
           $sg_row = mysqli_num_rows($playr_stat);
            if ($sg_row == 1 ){
                $fetch_game_stat = mysqli_fetch_array($playr_stat);
                $player1_stat = $fetch_game_stat["player1"];
                $player2_stat = $fetch_game_stat["player2"];
                if($player1_stat == 1 && $player2_stat == 1){
                    //strat the gaem
                    mysqli_query($conn, "UPDATE room_mm SET playing_stat=1,tag=1 WHERE room_id ='$game_key'");
                    echo 1;
                } else {
                   echo 0; 
                }
            } 
       }

?>