<?php
session_start();
include('conm.php');
             
       if(isset($_POST['Create_room-did'])){ 
           
              $login_sid = $_SESSION['login_id'];
              $login_sname =$_SESSION['login_user'];
              //room name
               $new_room_name = $_POST['Room_name'];
               //check if room was in table
           $check_room = mysqli_query($conn, "SELECT * FROM room_mm WHERE room_userid = $login_sid ");
           //if room was in table update it
           if(mysqli_num_rows($check_room)== 1){
               // generate random encryption key 
               $key = $login_sname . $login_sid . time() ;
               //update it 
               mysqli_query($conn, "UPDATE room_mm SET room_name='$new_room_name',Room_stat=1,room_id='$key' WHERE room_userid = $login_sid");
               //add to session
               $_SESSION['Chat_gorp_id'] = $key;
               //note the user
               mysqli_query($conn, "INSERT INTO message (user,text,convid) VALUES('Bot','Witeing for sameone to Join!','$key')");
               // retoren with succses
              echo "<div class='alert alert-success' role='alert'><label style='color:green;'>Succses !! Room Name : " . $new_room_name . "</label>&nbsp;&nbsp;"
                       . "<from><input type='submit' id='delt_room' name='delt_room' value='Deleat Room' class=''  ></from></div>";
           } //if room not in table
               else {
               // generate random encryption key 
               $key = $login_sname . $login_sid . time() ;
               //create room in table
               mysqli_query($conn, "INSERT INTO room_mm(room_userid, room_name, Room_stat, room_id) VALUES ($login_sid,'$new_room_name',1,'$key')");    
               //add to session
               $_SESSION['Chat_gorp_id'] = $key;
               //note the user
               mysqli_query($conn, "INSERT INTO message (user,text,convid) VALUES('Bot','Witeing for sameone to Join!','$key')");
               // retoren with succses
               echo "<div class='alert alert-success' role='alert'><label style='color:green;'>Succses !! Room Name : " . $new_room_name . "</label>&nbsp;&nbsp;"
                       . "<from><input type='submit' id='delt_room' name='delt_room' value='Deleat Room' class=''  ></from></div>";
           }
           
       }

?>