<!DOCTYPE html>
<?php
include ('checkuser.php');
?>
<?php 
//cget room info
 $game_key = $_SESSION['Chat_gorp_id'];
$game_info = mysqli_query($conn, "SELECT * FROM room_mm WHERE room_id = '$game_key'");
$fetch_info = mysqli_fetch_array($game_info);
$rgame_name = $fetch_info["room_name"];
$user_type_id = $fetch_info["room_userid"];
$game_time = $fetch_info["date"];
//check user type host or player
$check_user_type = mysqli_query($conn, "SELECT id FROM login WHERE id = $user_type_id");
$row = mysqli_num_rows($check_user_type);
if ($row == 1){
    $check_id = "";
}else{
      $check_id = "disabled";
}
?>
<html>
    <head>
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
         //check user type host or player   
              $(window).on("load",function(){
                var checkid = <?php echo $check_id ?> ;
                if(checkid === 0){
                $('#Strat the game').prop("disabled",true);
                }else if (checkid === 1){
                    $('#Strat the game').prop("disabled",false);
                }
});
         // cancel Room or deleat it and Quit game
              $("document").ready(function(){
            
                $("#back_to_prof").click(function(){
                  $.ajax({
                 url: "room_delt.php",
                 type:"POST",
                 async: false,
                 data:{
                     "quit_game": 1
                 },
                 success: function(responseq){
                    $("#back_mesg").html(responseq);
                  window.location.href = "profile.php";
                          } 
               });
         });
       });
        
        //strat the gaem
        
        
         </script>
                 <script type="text/javascript">
            // refresh game chat every sec 
		$(document).ready(function() {
			setInterval(function () {
				$('#game_box').load('game_chat.php');}, 1500);
		});
           </script>
    </head>
    <body>
          <div  class="container">
              <div class="jumbotron">  
            <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <br/>
        <from>
            <b><input type="submit" value="Quiting..!" name="back_to_prof" id="back_to_prof" name="back_to_prof" class="btn btn-default"></b>
        </from>   
        <p id="back_mesg"></p>      
        <p><?php echo "Room Name : ".$rgame_name;?></p>
        <p><?php echo "Time Add in : ".$game_time;?></p>
        </div>
              <from>
                  <input type="submit" id="readyg" name="readyg" value="Strat the game" class="btn btn-default"  <?php echo $check_id ?> >
              </from>      
              <p id="testp"></p>
                  <hr>
                <div id="game_box">
                    
                </div>
            <hr>  
          </div>
    </body>
</html>
