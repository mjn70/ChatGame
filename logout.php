<?php

session_start();

if(session_destroy()) // Destroying All Sessions
{
                  $conn = new mysqli("localhost", "root", "root", "company");

                 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    } 
                
      
           $query = mysqli_query($conn,"UPDATE login SET stat=0 WHERE username = '$login_session'" );     
            mysqli_close($conn);
                    
	header("Location: index.php"); // Redirecting To Home Page
        
}

?>