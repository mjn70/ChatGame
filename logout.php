<?php

session_start();
$logout_name =  $_SESSION['login_user'];
if(session_destroy()) // Destroying All Sessions
{
                  $conn = new mysqli("localhost", "root", "root", "company");

                 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    } 
                
           $qs = "UPDATE login SET stat=0 WHERE username = '$logout_name'";
           mysqli_query($conn, $qs);    
           
                    
	header("Location: index.php"); // Redirecting To Home Page
        
}

?>