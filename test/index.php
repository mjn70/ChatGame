
<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$data = "company";
// Create connection
$conn = new mysqli($servername, $username, $password,$data);

$error= "";

if (isset($_POST['submit'])) {
        if (empty($_POST['user']) || empty($_POST['pass'])) {
        $error = "Username or Password is invalid ";
                }
} else {
    
$quey = mysqli_query("select * from login where username = 'admin' and password = 'admin123'")
        or die("Failed to query datebase ". mysqli_error());
$row = $conn->query($quey);

if ($row) {
    header("/test/home.php");
    
    } else {
       $error = "user not fiand";    
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <title></title>
    </head>
    <body>
        <form name="login" action="/test/home.php" method="POST">
            
            <label>user's</label>
            <input type="text" value="user" name="user" />
            <br>
            <label>password's</label>
            <input type="password" value="pass" name="pass" />
            <br>
            <input type="submit" value="login" name="submit" />
            <br>
             <span><?php echo $error; ?></span>
            
        </form>
       
    </body>
</html>
