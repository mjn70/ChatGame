<?php
                        
                        include ("conm.php");

                         $listquery = "SELECT id,username from login  WHERE NOT username ='$login_session')";
                         $listq = $conn->query($$listquery);
                         if($listq->num_rows >= 1 or $listq->num_rows > 5){
                             
                         while($lrow = $listq->fetch_array()) :
                                        ?>
                               <tr>
                                             <td><?php echo $lrow['id']; ?></td>
                                             <td><?php echo $lrow['username'];   ?></td>
                               </tr>

                         <?php  endwhile; ?>         
                         <?php }else {
                                echo "<tr><td>0 Results</td></tr>";
                            }
                            ?>

?>
               
	