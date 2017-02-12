
<?php
 include ("conm.php");
          
          $chatgrop_id = $_SESSION['Chat_gorp_id'];
        
	$query = "SELECT * FROM `message` WHERE convid = 3 ORDER BY id ASC";
	$run = $conn->query($query);
        
        while($row = $run->fetch_array()) :
      ?>
	
                        <div id="chat_data">
				<span style="color:green;"><?php echo $row['user']; ?></span> :
				<span style="color:brown;"><?php echo $row['text']; ?></span>
			</div>
            
	<?php  endwhile; ?>
