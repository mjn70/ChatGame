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
         
                   var S_word; 
                   var L_WORD;
                   
          // refreash frst word 
    
              setInterval(function(){
                  
           var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            myObj = JSON.parse(this.responseText);
           if(myObj.lword !== ""){
              L_WORD = myObj.lword;
              S_word = L_WORD.charAt(L_WORD.length-1);
              document.getElementById('l_word').innerHTML = "<div class='alert alert-success'><strong>Last Word was :  " + L_WORD + " </strong> </div>";
             }else if (myObj.lword === ""){
              document.getElementById('l_word').innerHTML = "<div class='alert alert-info' role='alert'><strong>HOST must start the game</strong></div>";
             }
           }
         };
        xmlhttp.open("GET", "get_frst_word.php", true);
        xmlhttp.send();
        }, 1000);
        
//            setInterval(lwordf() , 1000);

         </script>
       <script type="text/javascript" >
                //sund the word
            $("document").ready(function(){ 
                
            $("#sund_word").click(function($e){
                $e.preventDefault();
              if( $('#text_word').val().charAt(0) !== S_word) {
                   document.getElementById('sund_log').innerHTML = "you word most strat with "+ S_word ;            
              }else if($('#text_word').val().length >= 15 || $('#text_word').val().length <= 3 ){
                   document.getElementById('sund_log').innerHTML = "you word must be less thin 15 or more thin 3 letrs!!";             
              }else if($('#text_word').val().charAt(0) === S_word)
              {  
                   $('#text_word').prop("disabled",true);
                   $('#sund_word').prop("disabled",true);
                var mesg = $("#text_word").val();
                $.ajax({
                    url:"sand_woed_game.php",
                    type:"POST",
                    async: false,
                    data:{
                        "player1": 1,
                        "last_word_game" : mesg
                    },
                    success: function(){
                     document.getElementById('sund_log').innerHTML = "you word list letter is  "+mesg.charAt(0);
                    }
                });
              };
          });
        });
        </script>
       <script type="text/javascript" >
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
        </script>
       <script type="text/javascript" >
           //strat the game from host
           function  startgame(){

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            myObj = JSON.parse(this.responseText);
              if(myObj.strat === 1){
                      $("#testp").text("sand word to strat the game chat ....");
                       $('#text_word').prop("disabled",false);
                       $('#sund_word').prop("disabled",false);
                        $('#Strat_the_game').prop("disabled",true);
              }else if (myObj.strat === 0){
                      $("#testp").text("player 2 not ready!! Or noone JOIN!!.");
                  }
              }
        };
        
        xmlhttp.open("GET", "strat_game.php", true);
        xmlhttp.send();
    };      
              </script>
               <script type="text/javascript" >     
        // refresh game chat every sec 
		$(document).ready(function() {
			setInterval(function () {
		     $('#game_box').load('game_chat.php');
//                     $('#l_word').load('L_word.php');
    
    }, 1000);
    });
    

           </script>
           <script type="text/javascript">         
         //refreash the game rule
         setInterval(function(){
               
           var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            myObjr = JSON.parse(this.responseText);
              if(myObjr.gamer === 1){
                        $('#text_word').prop("disabled",false);
                       $('#sund_word').prop("disabled",false);
              }else if (myObjr.gamer === 0){
                      $('#text_word').prop("disabled",true);
                       $('#sund_word').prop("disabled",true);
                  }
              }
        };
        
        xmlhttp.open("GET", "game_rule.php", true);
        xmlhttp.send();
        }, 1000);
       
//     setInterval(refreashg() , 1000);

       </script>
        <script type="text/javascript"> 
             
          function chechlword(str){
              if(str.charAt(0) === S_word ){
               document.getElementById('LetterM').innerHTML = "send to play chat game !!";
               return;
           }else if(str.charAt(0) !== S_word ){
               document.getElementById('LetterM').innerHTML = "must strat with " + S_word;
               return;
                }
            }

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
            <p id="sund_log" style="color: brown;"></p>
            <div > 
                <from>
                <input name="text_word" id="text_word" type="text" class="form-control" placeholder=" Send You Word " disabled="" onkeyup="chechlword(this.value)" >
                 <p id="LetterM" style="color: red;"></p>
                 <input id="sund_word" type="submit" value="Sund you word" name="sund_word" class="btn btn-default" disabled="">
                 <div id="l_word">
                   </from>    
                 </div>
            </div>
          </div>
    </body>
</html>
