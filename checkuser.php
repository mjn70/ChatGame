<?php

// Selecting Database
session_start();// Starting Session

include('conm.php');

// Storing Session
$user_check = $_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($conn, "select username,id from login where username='$user_check'");

$row = mysqli_fetch_assoc($ses_sql);

$login_session =$row['username'];
$check_game_key = $_SESSION['Chat_gorp_id'];
$_SESSION['login_id'] =$row['id'];
if(!isset($login_session) && (!isset($check_game_key)) ){
        
	mysqli_close($conn); // Closing Connection
	header('Location: profile.php'); // Redirecting To Home Page
}

?>
