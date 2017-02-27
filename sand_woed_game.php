<?php

session_start();
include('conm.php');
                        
if(isset($_POST['player1'])){ 
                $chatgrop_id = $_SESSION['Chat_gorp_id'];    
                    
                $name = $_SESSION['login_user'];
                $msg  = $_POST['last_word_text'];
                mysqli_query($conn, "UPDATE room_mm SET last_word='$msg',tag=0 WHERE room_id = '$chatgrop_id'");
                $query  = mysqli_query($conn,"INSERT INTO message (user,text,convid) VALUES('{$name}','{$msg}',  '{$chatgrop_id}')");     
                 
}


if(isset($_POST['player2'])){ 
                $chatgrop_id = $_SESSION['Chat_gorp_id'];    
                    
                $name = $_SESSION['login_user'];
                $msg  = $_POST['last_word_text'];
                mysqli_query($conn, "UPDATE room_mm SET last_word='$msg',tag=1 WHERE room_id = '$chatgrop_id'");
                $query  = mysqli_query($conn,"INSERT INTO message (user,text,convid) VALUES('{$name}','{$msg}',  '{$chatgrop_id}')");     
                 
}
?>