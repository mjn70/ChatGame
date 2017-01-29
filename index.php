<!DOCTYPE html>
<!--
 Created on : Jan 29, 2017, 12:34:14 AM
 Author     : mosa
-->

//<?php 
//include ('loging.php');
//
//if (isset($_SESSION['login_user'])){
//    header("location: profile.php");
//}
//?>
<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$data = "company";
// Create connection
$conn = new mysqli($servername, $username, $password,$data);








?>



<html>
    <head>
        <meta charset="UTF-8">
        <title>Chat Game</title>
        
        <meta name="viewport" content="width=devicewidth,initial-scale=1">
    
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
</head>
<body  style="background: silver ;" >
 <div class="container">
  <div class="page-header">
    <h1>Chat Game</h1>      
  </div>
     
     <form action="" method="post" class="form-horizontal ">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">User</label>
    <div class="col-sm-10">
        <input id="name" name="username" placeholder="Username" type="text" class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
        <input id="password" name="password" placeholder="password" type="password" class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" value=" Login " class="btn btn-default">
    </div>
      <hr>
      <div class="form-group" col-sm-offset-2 col-sm-10>
         <div        
          <span><?php echo $error; ?></span>
         </div>
      </div>
  </div>
</form>
        
</div>     
        
        
    </body>
</html>
