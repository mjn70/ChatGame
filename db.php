
<?php

$servername = "localhost";
$username = "root";
$password = "root";
$data = "company";
// Create connection
$conn = new mysqli($servername, $username, $password,$data);


$query =   ('SELECT * FROM `login` WHERE username = "admin" and password = "admin123"');
//$query = ("select * from login where password='admin' AND username='admin123'");
$rows = mysqli_num_rows($query);

// SQL query to fetch information of registerd users and finds user match.
//$query = mysqli_query("select * from login where password='admin' AND username='admin123'", $connection);
//$rows = mysqli_num_rows($query);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
   echo "<br>";
  } else {
      echo "OK"; 
      echo "<br>";
}
if (!$row)
  {
    echo "e2 Failed to connect to MySQL: " . mysqli_connect_error();
  echo "ok 2";
   echo "<br>";
  } else {
     echo "ok 2";
      echo "<br>";
}
if ($rows == 1) {
    echo "Login...";
    echo "<br>";
} else {
 echo "Username or Password is invalid " .  mysqli_connect_error(); ;
 echo "<br>";
}

//
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} 
//echo "Connected successfully";
//

?>