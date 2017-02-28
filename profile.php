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
//         $("document").ready(function(){
//
//            $("#submit").click(function($e){
//                $e.preventDefault();
//              if( !$('#msg').val().length === 0 ,$('#msg').val().length >= 25 ) {
//                  $('#LetterM').val("white a word to sund!!")
//              }else
//              {  
//                var mesg = $("#msg").val();
//                $.ajax({
//                    url:"send.php",
//                    type:"POST",
//                    async: false,
//                    data:{
//                        "done": 1,
//                        "message_text" : mesg
//                    },
//                    success: function(data){
//                        $("#mesg").val('');
//                        $("#msg").val('');
//                    }
//                });
//              };
//          });
//        });
              
                
       // Create room name and deleat it
          $("document").ready(function(){
            
            $("#CreateRoom").click(function(){
              if( !$('#Create_room_name').val()) {
                   $('#alrt_text').text("Write room name!!");
               }else if ($('#Create_room_name').val().length >= 20){
                   $('#alrt_text').text("name most be less thin 20 leter"); 
               }else
              {
              var rname = $("#Create_room_name").val();
             $.ajax({
                 url: "create_room.php",
                 type:"POST",
                 async: false,
                 data:{
                     "Create_room_did": 1,
                     "Room_name": rname
                 },
                 success: function(d){
                    $("#Room_create_name").html(d);
                      window.location.href = "game.php";
                    }
                });
              };
          });
        });
       // cancel Room or deleat it
           $("document").ready(function(){
            
                $("#deleat_room").click(function(){
                  $.ajax({
                 url: "room_delt.php",
                 type:"POST",
                 async: false,
                 data:{
                     "deleat_room_did": 1
                 },
                 success: function(rd){
                    $("#Room_create_name").html(rd);
                     
                    }
                });
         });
         
       });
       //leave chat
          $("document").ready(function(){
            
                $("#leave_room").click(function(){
                  $.ajax({
                 url: "checkgaem_stat.php",
                 type:"POST",
                 async: false,
                 data:{
                     "leave_room_did": 1
                 },
                 success: function(lc){
                    $("#Join_room_name").html(lc);
                  
                    }
                });
         });
         
       });
       // Find Room
          function  findgame(){

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
              if(myObj.findg === 1){
                      $("#testp").text("Joining ....");
                      window.location.href = "viewgame.php";
              }else if (myObj.findg === 0){
                      $("#testp").text("NO Room....");
                  }
              }
        }
        
        xmlhttp.open("POST", "find_game.php", true);
        xmlhttp.send();
    };        

         
//         //player ready 
//         $("document").ready(function(){
//            $("#readyJR").click(function(){
//                $.ajax({
//                    url: "ready_to join_game.php",
//                    type: "POST",
//                    async: false,
//                    data:{
//                        "ready": 1
//                    },
//                    success:function(response){
//                        $("#testp").html();
//                    document.getElementById('testp').innerHTML = "Joining ....";
//                   window.location.href = "game.php";
//
//                               }
//                      
//                });
//                
//            });
//
//         });
 
         
        </script>
        <script type="text/javascript">
//            // refresh chat every sec 
//		$(document).ready(function() {
//			setInterval(function () {
//				$('#chat_box').load('chat.php');}, 1500);
//		});
           </script>
           <script type="text/javascript">
                //Radio Changed
              function RadioChanged() { 
          if (document.getElementById("radioCR").checked === true) {
        document.getElementById("radioCR").value = 1;
        document.getElementById("radioFR").value = 0;
        $('#CreateRoom').prop("disabled",false);
        $('#Create_room_name').prop("disabled",false);
        $('#deleat_room').prop("disabled",false);
        $('#join_room').prop("disabled",true);
        $('#leave_room').prop("disabled",true);
            } else {
        document.getElementById("radioCR").value = 0;
        document.getElementById("radioFR").value = 1;
         $('#CreateRoom').prop("disabled",true);
         $('#Create_room_name').prop("disabled",true);
         $('#deleat_room').prop("disabled",true);
         $('#join_room').prop("disabled",false);
         $('#leave_room').prop("disabled",false);
            }
}     

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
            <div>
                <label>Chose between : Create Room or Find Room </label>
                <br>
                <label>
                    <input id="radioCR" type="radio" name="Chose" value="1" onchange="RadioChanged()"  checked=""/>
                : Create Room
                </label>&nbsp;&nbsp;&nbsp;
                <label>
                   <input id="radioFR" type="radio" name="Chose" value="0" onchange="RadioChanged()" />
                : Find Room
                 </label>
            </div>
            <br>
                <from>
                    <input id="CreateRoom"  name="CreateRoom" type="submit" value="Create Room Name"  class="btn btn-default">&nbsp;
                    <input id="Create_room_name" name="Create_room_name" type="text" > &nbsp;&nbsp;&nbsp;
                    <label  style="color: red;"><P id="alrt_text" name="alrt_text"></P></label>
<!--                    <input type="submit" id="deleat_room" name="deleat_room" value="Leave Room" class="btn btn-default" >&nbsp;&nbsp;-->
<!--                    <input type="submit" id="readyCR" name="readyCR" value="ready" class="btn btn-default" disabled="" >-->
                 </from>
            <div id="Room_create_name">
                
            </div>
            <br>
            <hr>          
            <from>
                <input type="submit" id="join_room" name="join_room" value="Find Room" class="btn btn-default" disabled="" onclick="findgame()" >&nbsp;
<!--                <input type="submit" id="leave_room" name="leave_room" value="Leave Chat" class="btn btn-default" disabled="" >&nbsp;&nbsp;-->
                <input type="submit" id="readyJR" name="readyJR" value="ready to join" class="btn btn-default"  disabled="">
            </from>
            <div id="Join_room_name">
                
            </div>
            <hr>
            <div id="Room_name">
           
            </div>
            <hr>
                <div id="chat_box">
                    
                </div>
            <hr>
            <br>
            <div >
                <form >    
                <input name="msg" id="msg" type="text" class="form-control" placeholder=" Send You Word " disabled="">
                <input id="submit" type="submit" value="Submit" name="submit" class="btn btn-default" disabled="">
                <p style="color: red" id="LetterM"></p>
                </form>

            </div >
            <div id="test">
                <p style="color: green; font-size: 35px; " id="testp"></p>
            </div>
            <script type="text/javascript"> 
//              window.onload = function(){
//              var counter = 5;
//              var interval = setInterval(function() {
//                  counter--;
//                    // Display 'counter' wherever you want to display it.
//                 if (counter === 0) {
//                    // Display a login box
//                    document.getElementById('testp').innerHTML =  " Dn now go go";
//                   clearInterval(interval);
////                 window.location.href = "game.php";
//                       }else{
//                           document.getElementById('testp').innerHTML = counter + " sec";
//                       }
//                       
//                    }, 1500);
//          };
                </script>  
         </div>
        </div>
        
   
   </body>
</html>
