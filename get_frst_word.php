<?php

session_start();
include('conm.php');

    $login_sid = $_SESSION['login_id'];
    $login_sname =$_SESSION['login_user'];
   //get key room
    $new_room_name = $_SESSION['Chat_gorp_id'];
              
//if(isset($_POST['fword'])){ 
     //get word from table
   $word = mysqli_query($conn, "SELECT last_word FROM room_mm WHERE room_id = '$new_room_name'");
   $fetch_word = mysqli_fetch_array($word);
   $word_s = $fetch_word["last_word"];
   $myobj->lword = $word_s;
   $myJSON = json_encode($myobj);
   echo $myJSON; 
//}
?>
