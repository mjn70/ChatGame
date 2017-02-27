<?php
session_start();
include('conm.php');

  if(isset($_POST['find_game'])){ 
       $login_sid = $_SESSION['login_id'];
       $login_sname =$_SESSION['login_user'];
        //deleet room if find in table
         $fquery = mysqli_query($conn, "SELECT room_userid FROM room_mm WHERE room_userid != $login_sid");
         $frow = mysqli_num_rows($fquery);
        if($frow == 1){
                 //get huy room
                 $convid_key = $_SESSION['Chat_gorp_id'];
                //deleat user room
                mysqli_query($conn, "DELETE FROM room_mm WHERE room_userid = $login_sid ");
                //deleat messages from table
                mysqli_query($conn, "DELETE FROM message WHERE convid ='$convid_key'"); 
                //resat seesion
                $_SESSION['Chat_gorp_id'] = NULL;
        }
       
         //Select rondom user id from room
         $room_query  =  mysqli_query($conn, "SELECT room_userid FROM room_mm WHERE Room_stat = 1 AND room_userid != $login_sid ORDER BY RAND() LIMIT 1");
         //check query resultt 
         if(mysqli_num_rows($room_query) == 1){
         // get user room id 
         $room_user_id = mysqli_fetch_assoc($room_query);
         $row_id = $room_user_id["room_userid"];
         // update room stat to offline
         mysqli_query($conn, "UPDATE room_mm SET Room_stat=0 WHERE room_userid = $row_id");    
        // fetch room info
         $room_info = mysqli_query($conn, "SELECT room_id,room_name FROM room_mm WHERE room_userid = $row_id");
         //fetch values of query in array
         $array_room = mysqli_fetch_assoc($room_info);
         $room_key = $array_room["room_id"];
         $room_name = $array_room["room_name"];
          //add to session
         $_SESSION['Chat_gorp_id'] = $room_key;
         //Nov the chat 
         $game_key = $_SESSION['Chat_gorp_id'];
        //update player2 stat in room table 
         mysqli_query($conn, "UPDATE room_mm SET player2 = 1 WHERE room_id ='$game_key'");
                    
           $check_ready_stat = "SELECT player1,player2 FROM room_mm WHERE room_id = '$game_key'";
           $player_stat = mysqli_query($conn, $check_ready_stat);
            if (mysqli_num_rows($player_stat) == 1 ){
                $fetch_game_stat = mysqli_fetch_array($player_stat);
                $player1_stat = $fetch_game_stat["player1"];
                $player2_stat = $fetch_game_stat["player2"];
                if($player1_stat == 1 && $player2_stat == 1){
                  mysqli_query($conn,"INSERT INTO message (user,text,convid) VALUES('$login_sname','Has Join The Game','$game_key')");
                }
                
            }
            // retoren with succses
           echo "<label style='color:green;'>Succses !!! Room Name : " . $room_name . "</label>";
      } else {
           echo "<label style='color:red;'>No Room Find Try Again </label>";
      }
      
      
      
  }