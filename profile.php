<?php
include ('session.php');
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

        <script type="text/javascript">
            // send message
         $("document").ready(function(){
            
            $("#submit").click(function(){
                var mesg = $("#msg").val();
                $.ajax({
                    url:"send.php",
                    type:"POST",
                    async: false,
                    data:{
                        "done": 1,
                        "message_text" : mesg
                    },
                    success: function(data){
                        $("#mesg").val('');
                    }
                    
                });
                
            });

         });
         // get player name
          $("document").ready(function(){
            
            $("#searchOp").click(function(){
    
              var Pname = $("#plyername").val();
             $.ajax({
                 url: "find.php",
                 type:"POST",
                 async: false,
                 data:{
                     "findset": 1,
                     "find_name": Pname
                 },
                 success: function(d){
                    $("#player").html(d);
                    }
                });
                
            });

         });
         
         //invite player
           $("document").ready(function(){
            
            $("#inv").click(function(){
             $.ajax({
                 url: "invtochat.php",
                 type:"POST",
                 async: false,
                 data:{
                     "sending": 1
                 },
                 success: function(f){
                    $("#invmesg").html(f);
                    }
                });
                
            });

         });

        </script>

</head>

<body  >
    
    <div  class="container">
        
        <div class="jumbotron">  
            <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <br/>
        <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
        <div >         
                <from>
                    <input id="searchOp"  name="searchOp" type="submit" value="Search Player Name "  class="btn btn-default">
                    <input id="plyername" name="plyername" type="text" >
                 </from>
            <from><input id='inv' name='inv' type='submit' value='Invite' class='btn btn-default'></from>
            <div id="invmesg">
                
            </div>
            <hr>
            <div id="player">
           
            </div>
            <hr>
                <div id="chat_box">
                    
                </div>
             <script type="text/javascript">
            // refresh chat every sec 
		$(document).ready(function() {
			setInterval(function () {
				$('#chat_box').load('chat.php')
			}, 1000);
		});
          </script>
            <hr>
            <br>
            <div >
                <form >    
                <input name="msg" id="msg" type="text" class="form-control" placeholder=" Send you word ">
                <input id="submit" type="submit" value="Submit" name="submit" class="btn btn-default">
                <p id="LetterM"></p>
                </form>

               
            </div>
          <?php
          $t = "20";
          $t = sha1($t);
            echo $t. " \n";
            echo '<br>';
            echo sha1("6"). " \n";
          ?>
               
            </div>
        </div>
        
   
   </body>
</html>
