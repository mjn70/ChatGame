<?php
session_start();
include('conm.php');

       if(isset($_POST['makegame'])){ 
              $login_sid = $_SESSION['login_id'];
              $login_sname =$_SESSION['login_user'];
              // check if main user in matchmaking table
             $mquery = mysqli_query($conn, "SELECT userid from matchmaking WHERE userid =$login_sid");
            if(mysqli_num_rows($mquery) == 0){
                // add main user in  matchmaking table
                mysqli_query($conn, "INSERT INTO `matchmaking`(`userid`, `username`, `search_stat`) VALUES ([$login_sid],[$login_sname ],[1])");
                // Search for player in matchmaking table 
                $mquery_s = mysqli_query($conn, "SELECT * FROM `matchmaking` WHERE serch_stat = 1 AND userid !=  $login_sid");
                // check result 
                if(mysqli_num_rows($mquery_s) >= 1){
                    //fetch users ids in array 
                    $mrows = mysqli_fetch_row($mquery_s);
                    //fetch random date from array
                    $user_random_id = array_rand($mrows['userid'],1);
                    $user_name = $mrows['username'];
                    // generate random encryption key 
                    $chat_msg_id = sha1(time());
                    //bulid the chat in message table
                    mysqli_query($conn, "INSERT INTO `message`(`user`, `text`, `convid`) VALUES (['bot'],['game strating'],['$chat_msg_id'])");
     
                    mysqli_query($conn, "INSERT INTO `room_mm`(`room_userid`, `room_name`, `room_id`) VALUES (['$login_sid'],['$login_sname'],['$chat_msg_id'])");
                    
                }
 } 
            else {
                //look for player
                for($i = 1; $i<= 10;$i++){
                    sleep(1);
                    $check_stst = mysqli_query($conn, "SELECT userid,search_stat,invc FROM `matchmaking` WHERE search_stat = 1 and invc IS NOT NULL AND userid =  $login_sid");
                    $check_row = mysqli_fetch_array($check_stst);
                    if(mysqli_num_rows($check_row) >= 1){
                        
                        
                    }
                }
            }

       }

?>