<!DOCTYPE html>
<?php
include ('checkuser.php');
?>
<?php 
 $game_key = $_SESSION['Chat_gorp_id'];
$game_info = mysqli_query($conn, "SELECT * FROM `room_mm` WHERE room_id = '$game_key'");
$fetch_info = mysqli_fetch_array($game_info);
$rgame_name = $fetch_info["room_name"];
$game_time = $fetch_info["date"];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chat Game</title>
        
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
         // cancel Room or deleat it
              $("document").ready(function(){
            
                $("#back_to_prof").click(function(){
                  $.ajax({
                 url: "room_delt.php",
                 type:"POST",
                 async: false,
                 data:{
                     "deleat_room_did": 1
                 },
                 success: function(rd){
                    $("#back_mesg").html(rd);
                     window.location.href = "porfile.php";
                    }
                });
         });
         
       });


         </script>
    </head>
    <body>
          <div  class="container">
              <div class="jumbotron">  
            <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <br/>
        <from>
        <b id="oppent"><a id="back_to_prof" href="profile.php">Leave the Game </a></b>
        <p id="back_mesg"></p>
        </from>
        <br>
        <p><?php echo "Room Name : ".$rgame_name;?></p>
        <br>
        <p><?php echo "Time add in : ".$game_time;?></p>
        </div>
              
              
          </div>
    </body>
</html>
