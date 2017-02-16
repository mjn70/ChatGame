<?php

session_start();
include('conm.php');
                        
if(isset($_POST['done'])){ 
                $chatgrop_id = $_SESSION['Chat_gorp_id'];    
                    
                $name = $_SESSION['login_user'];
                $msg  = $_POST['message_text'];

                $query  = mysqli_query($conn,"INSERT INTO message (user,text,convid) VALUES('{$name}','{$msg}',3)");     

}
?>