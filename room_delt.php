<?php
session_start();
include('conm.php');
              $login_sid = $_SESSION['login_id'];
              $login_sname =$_SESSION['login_user'];
              
  if(isset($_POST['deleat_room_did'])){ 
           //check if room was in table
           $check_room = mysqli_query($conn, "SELECT * FROM room_mm WHERE room_userid = $login_sid");
            if(mysqli_num_rows($check_room)>= 1){
                //get huy room
                 $convid_key = $_SESSION['Chat_gorp_id'];
                //deleat user room
                mysqli_query($conn, "DELETE FROM room_mm WHERE room_userid = $login_sid ");
                //deleat messages from table
                mysqli_query($conn, "DELETE FROM message WHERE convid ='$convid_key'"); 
                //resat seesion
                $_SESSION['Chat_gorp_id'] = NULL;
                 // retoren with succses
                 echo "<div class='alert alert-danger' role='alert'>"
                  ."<strong>Room Deleated</strong> you room hes beeing remove."
                  ."</div>";
            } else {
                 // retoren with succses
                 echo "<div class='alert alert-info' role='alert'>"
                  ."<strong>No room Find</strong> you need to Create a Room."
                  ."</div>";
            }
    
}
  if(isset($_POST['leave_room_did'])){ 
           //check if room was in table
           $check_room = mysqli_query($conn, "SELECT * FROM room_mm WHERE room_userid = $login_sid");
            if(mysqli_num_rows($check_room)>= 1){
                //get huy room
                 $convid_key = $_SESSION['Chat_gorp_id'];
                //deleat user room
                mysqli_query($conn, "DELETE FROM room_mm WHERE room_userid = $login_sid ");
                //deleat messages from table
                mysqli_query($conn, "DELETE FROM message WHERE convid ='$convid_key'"); 
                //resat seesion
                $_SESSION['Chat_gorp_id'] = NULL;
                 // retoren with succses
                 echo "<div class='alert alert-danger' role='alert'>"
                  ."<strong>You left the room</strong> you lift chat."
                  ."</div>";
            } else {
                 // retoren with succses
                 echo "<div class='alert alert-info' role='alert'>"
                  ."<strong>You did not Join a chat </strong> you need find a Room."
                  ."</div>";
            }
    
}     
  if(isset($_POST['deleat_room_did'])){ 
           //check if room was in table
           $check_room = mysqli_query($conn, "SELECT * FROM room_mm WHERE room_userid = $login_sid");
            if(mysqli_num_rows($check_room)>= 1){
                //get huy room
                 $convid_key = $_SESSION['Chat_gorp_id'];
                //deleat user room
                mysqli_query($conn, "DELETE FROM room_mm WHERE room_userid = $login_sid ");
                //deleat messages from table
                mysqli_query($conn, "DELETE FROM message WHERE convid ='$convid_key'"); 
                //resat seesion
                $_SESSION['Chat_gorp_id'] = NULL;
                 // retoren with succses
                 echo "<div class='alert alert-danger' role='alert'>"
                  ."<strong>Room Deleated</strong> you room hes beeing remove."
                  ."</div>";
            } else {
                 // retoren with succses
                 echo "<div class='alert alert-info' role='alert'>"
                  ."<strong>No room Find</strong> you need to Create a Room."
                  ."</div>";
            }
    
}
  if(isset($_POST['quit_game'])){ 
           //check if room was in table
           $check_room = mysqli_query($conn, "SELECT * FROM room_mm WHERE room_userid = $login_sid");
            if(mysqli_num_rows($check_room)>= 1){
                //get huy room
                 $convid_key = $_SESSION['Chat_gorp_id'];
                //deleat user room
                mysqli_query($conn, "DELETE FROM room_mm WHERE room_userid = $login_sid ");
                //deleat messages from table
                mysqli_query($conn, "DELETE FROM message WHERE convid ='$convid_key'"); 
                //resat seesion
                $_SESSION['Chat_gorp_id'] = NULL;
                 // retoren with succses
                  echo "<div class='alert alert-danger' role='alert'>"
                  ."<strong>Quiting now</strong> you noew leaving ."
                  ."</div>";
            } else {
                 // retoren with succses
                 echo "<div class='alert alert-info' role='alert'>"
                  ."<strong>Quiting now</strong> you noew leaving ."
                  ."</div>";;
            }
    
}     

?>
