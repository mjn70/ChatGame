
<?php
 include ("conm.php");
          
 
        $P1 = $_SESSION['login_user'];
        $P2 = $_SESSION['player_session'];
        
	$query = "SELECT * FROM `message` WHERE convid = 3 ORDER BY id ASC";
	$run = $conn->query($query);
        
        while($row = $run->fetch_array()) :
      ?>
	
                        <div id="chat_data">
				<span style="color:green;"><?php echo $row['user']; ?></span> :
				<span style="color:brown;"><?php echo $row['text']; ?></span>
			</div>
            
	<?php  endwhile; ?>
