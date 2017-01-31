<?php
include('session.php');?>

<?php
include ('chat.php');?>

<?php include ('find.php');
?>

<?php 
$error = "";
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
            
  
           function find(){
               x = new XMLHttpRequest();
               x.onreadystatechange = function(){
                if(x.readyState == 4 && x.status == 200){
		document.getElementById('player').value = x.responseText;
                            } 
		}
		x.open('GET','find.php',true); 
		x.send();
		}
		setInterval(function(){find()},1000);
          
            
//		function ajax(){		
//		var req = new XMLHttpRequest();		
//		req.onreadystatechange = function(){	
//		if(req.readyState == 4 && req.status == 200){
//		document.getElementById('chat').innerHTML = req.responseText;
//                            } 
//		}
//		req.open('GET','chat.php',true); 
//		req.send();
//		}
//		setInterval(function(){ajax()},1000);     
                
        </script>
        
        
        
</head>
<body onload="ajax()">
    <div  class="container">
        <div class="jumbotron">
        <b id="welcome">Welcome : <i id="logname"><?php echo $login_session; ?></i></b>
        <br/>
        <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
        <div id="main">
            <div>
                <input id="SearchOp" name="search" type="button" value="Search For  Player" class="btn btn-default" onclick="find()">
                <label id="player"></label>
            </div>
            <hr>
            <div id="chat" >   
                <textarea id="chat" class="form-control" rows="3"  disabled=""></textarea>
            </div>
            <br>
            <div >
                <form name="submit" action="profile.php" method="POST">
                
                <input id="word" type="text" class="form-control" placeholder=" Send you word ">
                <input id="sand" type="button" value="sand" name="sand" onclick="sand()" class="btn btn-default">
                <label id='Letter'><?php ?></label>
               </form>
            </div>
        </div>
        
    </div>
</body>
</html>
