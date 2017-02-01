<?php
include('session.php');
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
            
//  
//                function find(){
//                    var x = new XMLHttpRequest();
//                    x.onreadystatechange = function(){
//                        if(x.readyState == 4 && x.status ==200){
//                            document.getElementById('player').innerHTML = x.responseType;
//                        }
//                    }
//                    x.open('GET','find.php',true);
//                    x.send();
//                }
		
          
            
		function ajax(){		
		var req = new XMLHttpRequest();		
		req.onreadystatechange = function(){	
		if(req.readyState == 4 && req.status == 200){
		document.getElementById('chat').innerHTML = req.responseText;
                            } 
		}
		req.open('GET','chat.php',true); 
		req.send();
		}
		setInterval(function(){ajax()},1000);     
                
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
                <form action="profile.php" method="POST">
                     
                <input id="SearchOp"   name="SearchOp" type="submit" value="Search For  Player" class="btn btn-default" >
                <p id="player" s style="color: greenyellow;" ><?php echo $playername;   ?></p> 

                 </form>
                <?php
                   if (isset($_POST['SearchOp']))
              {
              
               include ('conm.php');
      
               mysqli_stat($conn);
         
              $findquery  = ("SELECT username from login WHERE NOT username ='$login_session;'");
              $findq = $conn->query($findquery );
            
                if ($findq <= 1) {
               echo  array_rand($findq,1); 
               $playername = $findq;     
                mysqli_close($conn);
            
               } else {
                 $playername = "Did not find player" ;   
                   mysqli_close($conn);
                      }
              }

                ?>


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
                
		if(isset($_POST['submit'])){ 
                   if (empty($_POST['msg'])) {
		         $notword = "white a word";
                   }
                   }else {
                        mysqli_stat($conn);
                        
		$name = $login_session;
		$msg  = $_POST['msg'];
		
		$query = "INSERT INTO message (user,text,convid) VALUES ('$name;','$msg;',3)";     
		$run = $con->query($query);
                mysqli_close($conn);
                
                    }
		
		?>
               
            </div>
        </div>
        
    </div>
</body>
</html>
