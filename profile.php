<?php
include('session.php');
?>
//<?php 
// include ("find.php");
// ?>
<?php 
//$error = "";
//$notword = "";
?>

<html>
<head>
<title>Your Home Page</title>

        <meta name="viewport" content="width=devicewidth,initial-scale=1">  
    
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- CSS -->
        <link href="style.css" rel="stylesheet" media="all">
        
        <!-- JavaScript -->
        <script src="script.js" ></script>
        
        <script type="text/javascript" >
           function getplayer(){
               
               vat name = document.getElementById("plyername").value;
               if(name)
               {
                   $.ajax({
                       type: 'POST',
                       url: 'find.php',
                       data: {user_name:name.value},
                       success: function(response){
                           $('#player').html(response);
                       }        
                   });
                else{
                      $('#player').html("Sorry Nothing Find!!!");  
                   }
               }
           }

        </script>
        
        <script>
                 
		function ajaxr(){		
		var req = new XMLHttpRequest();		
		req.onreadystatechange = function(){	
		if(req.readyState === 4 && req.status === 200){
		document.getElementById('chat').innerHTML = req.responseText;
                            } 
		};
		req.open('POST','chat.php',true); 
		req.send();
            }
                setInterval(function(){ajaxr();},1000);     
                       </script>
        
        
        
</head>

<body onload="ajaxr();" >
    <div  class="container">
        <div class="jumbotron">
        <b id="welcome">Welcome : <i id="logname"><?php echo $login_session; ?></i></b>
        <br/>
        <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
        <div id="main" >
            <div>
                <from>
                    
                    <input onclick=" getplayer();" id="SearchOp"  name="SearchOp" type="submit" value="Search Player Name "  class="btn btn-default">
                    <input id="plyername" name="plyername" type="text" >
                     <p id="player" ></p> 
                     <input onclick="" id="inv" name="inv" type="submit" value="Invite" class="btn btn-default"  >
                 </from>

            </div>
            <hr>
            <div  > 
                <div id="chat"></div>
         	 </div>
            <hr>
            <br>
            <div >
                <form  action="profile.php" method="POST">
                
                <input name="msg" id="msg" type="text" class="form-control" placeholder=" Send you word ">
                <input id="submit" type="submit" value="Submit" name="submit" class="btn btn-default">
                <label id='Letter'><?php echo $notword; ?></label>
                </form>
                <?php 
                
		if(isset($_POST['submit'])){ 
                   if (($_POST['msg'] != "")) {
		                
		$name = $_SESSION['login_user'];
		$msg  = $_POST['msg'];
                $chat_mrg =  $_SESSION['chat_id'];
//              (player1 id + player2 id) = chat id                 
//              $get =  "select ((select id from login WHERE username ='mosa')+(select id from login WHERE username ='player1')) as gropchat"
//		$sunchatid = mysqli_query($conn, $notword);
     
                
		$query  = mysqli_query($conn,"INSERT INTO message (user,text,convid) values ('$name','$msg',$chat_mrg)");     
		$run = $con->query($query);
                   }
                   }else {

                        $notword = "white a word";
                    }
		
		?>
               
            </div>
            <div>
                <div>                 
                        <button onclick="retounlist();" id="refind" name="refind" type="button" class="btn btn-default">Refresh</button>  
                </div>
                <br>
                <div  class="container">
                <table class="w3-table w3-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
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
