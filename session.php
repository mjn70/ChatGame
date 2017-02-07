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
$_SESSION['login_id'] =$row['id'];
if(!isset($login_session)){

	mysqli_close($conn); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}

?>