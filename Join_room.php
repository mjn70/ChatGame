<?php
session_start();
include('conm.php');

  if(isset($_POST['find_room'])){ 
       $login_sid = $_SESSION['login_id'];
       $login_sname =$_SESSION['login_user'];
       
         //Select rondom user id from room
         $room_query  =  mysqli_query($conn, "SELECT room_userid FROM room_mm WHERE Room_stat = 1 AND room_userid !=  $login_sid ORDER BY RAND() LIMIT 1");
         //check query resultt 
         if(mysqli_num_rows($room_query) == 1){
         // get user room id 
         $room_user_id = mysqli_fetch_assoc($room_query);
         // update room stat to offline
         mysqli_query($conn, "UPDATE room_mm SET Room_stat=0 WHERE room_userid = $room_user_id");    
        // fetch room info
         $room_info = mysqli_query($conn, "SELECT room_id,room_name FROM room_mm WHERE room_userid = $rondom_id");
         //fetch query array
         $array_room = mysqli_fetch_assoc($room_info);
         $room_key = $array_room['room_id'];
         $user_room_name = $array_room['room_name'];
          //add to session
         $_SESSION['Chat_gorp_id'] = $room_key;
         //Nov the chat 
         mysqli_query($conn,"INSERT INTO message (user,text,convid) VALUES('$login_sname','Witeing for sameone to Join!','$room_key')");
            // retoren with succses
           echo "<label style='color:green;'>Succses !! Room Name : " . $new_room_name . "</label>";
      } else {
           echo "<label style='color:red;'>No Room Find Try Again </label>";
      }
      
      
      
  }