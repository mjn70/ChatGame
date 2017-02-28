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
          // refreash frst word
       $(document).ready(function(){
                setInterval(function(){
                   $.ajax({
                    url:"get_frst_word.php",
                    type:"POST",
                    async: false,
                    data:{
                        "fword": 1    
                    },
                    success: function(data){
                   var fr_word = data.toString() ;
                   var fr_char = fr_word;  
                    }
                });  
               }, 1500);
                  
    });           
             //sund the word
            $("document").ready(function(){ 
                
            $("#sund_word").click(function($e){
                $e.preventDefault();
              if( !$('#text_word').text.trim().charAt(0) === fr_char ) {
                  $('#LetterM').val("white a word to sund!!");
              }else if($('#text_word').val().length >= 15){
                  $('#LetterM').val("you word must be less thin 15 letrs!!");
              }else
              {  
                var mesg = $("#text_word").val();
                $.ajax({
                    url:"sand_woed_game.php",
                    type:"POST",
                    async: false,
                    data:{
                        "player1": 1,
                        "last_word_text" : mesg
                    },
                    success: function(data){
                       var ls = str.charAt(0);
                       fr_word = ls;
                    }
                });
              };
          });
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
       
           //strat the game from host
           function  startgame(){

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
              myObj = JSON.parse(this.responseText);
              if($game_array.strat === 1){
                      $("#testp").text("strating game ....");
              }else if ($game_array.strat === 0){
                      $("#testp").text("player 2 not ready!!....");
                  }
              }
        }
        
        xmlhttp.open("POST", "strat_game.php", true);
        xmlhttp.send();
    };      

       // refresh game chat every sec 
    $(document).ready(function(){
            setInterval(function(){
                    $('#game_box').load('game_chat.php');}, 1500);
    });
    
       // refreash last word
       $(document).ready(function(){
                setInterval(function(){
                    $('#l_word').load('L_word.php');}, 1500);
    });            
           //refreash the game engin
            setInterval(function(){
               
           var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
              if(myObj.gamer === 1){  
                        $('#text_word').prop("disabled",false);
                       $('#sund_word').prop("disabled",false);
              }else if (myObj.gamer === 0){
                      $('#text_word').prop("disabled",true);
                       $('#sund_word').prop("disabled",true);
                  }
              }
        }
        
        xmlhttp.open("POST", "game_rule.php", true);
        xmlhttp.send();
    }, 1500);

           </script>
    </head>
    <body>
          <div  class="container">
              <div class="jumbotron">  
            <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <br/>
        <from>
            <b><input type="submit" value="Quiting..!" id="back_to_prof" name="back_to_prof" class="btn btn-default"></b>
        </from>   
        <p id="back_mesg"></p>      
        <p><?php echo "Room Name : ".$rgame_name;?></p>
        <p><?php echo "Time Add in : ".$game_time;?></p>
        </div>
              <from>
                  <input type="submit" id="Strat_the_game" name="Strat_the_game" value="Strat the game" class="btn btn-default"  onclick="startgame()">
                  <p id="game_stat"></p>
              </from>      
              <p id="testp"></p>
                  <hr>
                <div id="game_box">
                    
                </div>
            <hr>
            <div > 
                 <input name="text_word" id="text_word" type="text" class="form-control" placeholder=" Send You Word " disabled="">
                 <p id="LetterM" style="color: red;"></p>
                 <input id="sund_word" type="submit" value="Sund you word" name="sund_word" class="btn btn-default" disabled="">
                 <div id="l_word">
                         
                 </div>
            </div>
          </div>
    </body>
</html>
