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
                
              if( !$('#msg').val().length === 0 ,$('#msg').val().length >= 25 ) {
                  $('#LetterM').val("white a word to sund!!")
              }else
              {  
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
              };
          });
        });  
              
                
         // Create room name and deleat it
          $("document").ready(function(){
            
            $("#CreateRoom").click(function(){
              if( !$('#Create_room-name').val().length === 0 ,$('#Create_room-name').val().length >= 25 ) {
                  
              }else
              {
              var rname = $("#Create_room-name").val();
             $.ajax({
                 url: "Create_room.php",
                 type:"POST",
                 async: false,
                 data:{
                     "Create_room-did": 1,
                     "Room_name": rname
                 },
                 success: function(d){
                    $("#Room_create_name").html(d);
//                    location.reload();
                    }
                });
              };
          });
        });
            // cancel Room or deleat it
              $("document").ready(function(){
            
                $("#delt_room").click(function(){
                  $.ajax({
                 url: "room_delt.php",
                 type:"POST",
                 async: false,
                 data:{
                     "deleat_room-did": 1
                 },
                 success: function(rd){
                    $("#delt_room").html(rd);
//                    location.reload();
                    }
                });
         });
         
       });
         
         
       // Find Room
          $("document").ready(function(){
            
            $("#join_room").click(function(){

             $.ajax({
                 url: "join_room.php",
                 type:"POST",
                 async: false,
                 data:{
                     "find_room": 1     
                 },
                 success: function(fr){
                    $("#Join_room_name").html(fr);  
                    }
                });
                
            });

         });
         
        </script>
        <script type="text/javascript">
            // refresh chat every sec 
		$(document).ready(function() {
			setInterval(function () {
				$('#chat_box').load('chat.php');}, 1500);
		});
                
                //Radio Changed
              function RadioChanged() { 
          if (document.getElementById("radioCR").checked === true) {
        document.getElementById("radioCR").value = 1;
        document.getElementById("radioFR").value = 0;
        $('#CreateRoom').prop("disabled",false);
        $('#Create_room-name').prop("disabled",false);
        $('#join_room').prop("disabled",true);
            } else {
        document.getElementById("radioCR").value = 0;
        document.getElementById("radioFR").value = 1;
         $('#CreateRoom').prop("disabled",true);
         $('#Create_room-name').prop("disabled",true);
         $('#join_room').prop("disabled",false);
         
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
                    <input id="radioCR" type="radio" name="Chose" value="1" onchange="RadioChanged()()"  checked=""/>
                : Create Room
                </label>&nbsp;&nbsp;&nbsp;
                <label>
                   <input id="radioFR" type="radio" name="Chose" value="0" onchange="RadioChanged()()" />
                : Find Room
                 </label>
            </div>
            <br>
                <from>
                    <input id="CreateRoom"  name="searchRoom" type="submit" value="Create Room Name"  class="btn btn-default">
                    <input id="Create_room-name" name="plyername" type="text" >
<!--                    <label id="Room_create_name" style="color:green;"></label>-->
                 </from>
            <div id="Room_create_name">
                
            </div>
            <hr>          
            <from>
                <input type="submit" id="join_room" name="join_room" value="Find Room" class="btn btn-default" disabled="" >
                <input type="submit" id="leave_room" name="leave_room" value="Leave Room" class="btn btn-default" >
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
                <input name="msg" id="msg" type="text" class="form-control" placeholder=" Send You Word ">
                <input id="submit" type="submit" value="Submit" name="submit" class="btn btn-default">
                <p style="color: red" id="LetterM"></p>
                </form>

            </div>
             <?php 
             include('conm.php');
               $query  = "SELECT room_userid FROM room_mm WHERE Room_stat = 1 AND room_userid != 1 ORDER BY RAND() LIMIT 1";
               $resultt= mysqli_query($conn, $query);
//               $row = mysqli_fetch_array($resultt, MYSQLI_ASSOC);
                       $row = mysqli_fetch_assoc($resultt);

          
         //but it in array
//         $room_rows = mysqli_fetch_array($room_query);
         //pick rondom id
//         $rondom_id = array_rand($room_if_from_array,1);
           echo "text id : ". $row["room_userid"];
        
         ?>  
         </div>
        </div>
        
   
   </body>
</html>
