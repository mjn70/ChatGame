<?php
session_start();
include('conm.php');
              $login_sid = $_SESSION['login_id'];
              $login_sname =$_SESSION['login_user'];
              
  if(isset($_POST['deleat_room-did'])){ 
           //check if room was in table
           $check_room = mysqli_query($conn, "SELECT * FROM `room_mm` WHERE room_userid = $login_sid");
            if(mysqli_num_rows($check_room)>= 1){
                //deleat user room
                mysqli_query($conn, "DELETE FROM room_mm WHERE room_userid = $login_sid "); 
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
     
?>
