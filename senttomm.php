<?php
session_start();
include('conm.php');

       if(isset($_POST['makegame'])){ 
              $login_sid = $_SESSION['login_id'];
              $login_sname =$_SESSION['login_user'];
              $room_id = $login_sid.$login_sname.time();
              $room_id = sha1($room_id);
              $make_room = mysqli_query($conn, "INSERT INTO `room_mm`(`room_userid`, `room_name`, `room_id`) VALUES (['$login_sid'],['$login_sname'],['$room_id'])");

       }
?>
