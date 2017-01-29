
<?php

include('con.php');


$query = ('SELECT * FROM `login` WHERE username = "$" and password = "admin123"');
//$query = ("select * from login where password='admin' AND username='admin123'");
$rows = mysqli_num_rows($query);

//SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query("select * from login where password='admin' AND username='admin123'", $conn);
$rows = mysqli_num_rows($query);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>