<?php
include('session.php');
?>
<?php 
 include ("conm.php");
 ?>
<?php 
$error = "";
$notword = "";
$playername = "";
?>
<html>
<head>
<title>Your Home Page</title>

        <meta name="viewport" content="width=devicewidth,initial-scale=1">  
    
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link href="style.css" rel="stylesheet" media="all">
       
        <script>

//                function refrashlist(){
//                 var r = new XMLHttpRequest();	
//                 r.onreadystatechange = function(){
//                     if(r.readyState === 4 && r.status === 200){
//                       document.getElementById('tablelist').innerHTML = r.responseText;
//                   }
//                 };
//                 r.open('GET','list.php',true;);
//                 r.send();
//                }
            
		function ajax(){		
		var req = new XMLHttpRequest();		
		req.onreadystatechange = function(){	
		if(req.readyState === 4 && req.status === 200){
		document.getElementById('chat').innerHTML = req.responseText;
                            } 
		};
		req.open('GET','chat.php',true); 
		req.send();
            }
                
		setInterval(function(){ajax();},1000);     
                
        </script>
        
        
        
</head>
<body onload="ajax();">
    <div  class="container">
        <div class="jumbotron">
        <b id="welcome">Welcome : <i id="logname"><?php echo $login_session; ?></i></b>
        <br/>
        <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
        <div id="main">
            <div>
                <form action="profile.php" method="POST">
                     
                    <input id="SearchOp" disabled=""  name="SearchOp" type="submit" value="Search For  Player" class="btn btn-default" >
                <p id="player" s style="color: greenyellow;" ><?php echo $playername;   ?></p> 
          

                 </form>
            </div>
            <hr>
            <div id="chat_box" > 
                <div id="chat"></div>
         	 </div>
            <br>
            <div >
                <form  action="profile.php" method="POST">
                
                    <input name="msg" id="msg" type="text" class="form-control" placeholder=" Send you word ">
                <input id="submit" type="submit" value="submit" name="submit" class="btn btn-default">
                <label id='Letter'><?php echo $notword; ?></label>
                </form>
                <?php 
                 
                 $conn = new mysqli("localhost", "root", "root", "company");

                 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    } 
                    
                
		if(isset($_POST['submit'])){ 
                   if (($_POST['msg'] != "")) {
		                
		$name = $_SESSION['login_user'];
		$msg  = $_POST['msg'];
		
		$query  = mysqli_query($conn,"INSERT INTO message (user,text,convid) values ('$name;','$msg;',3)");     
		$run = $con->query($query);
                   }
                   }else {

                        $notword = "white a word";
                    }
		
		?>
               
            </div>
            <div>
                <div>
                <button type="button" class="btn btn-default">refresh</button>
                </div>
                <div>
                <table border="1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    <div id="tablelist">
                        
                    </div>
                    </tbody>
                </table>
                </div>
               </div>

            </div>
        </div>
        
    </div>
</body>
</html>
