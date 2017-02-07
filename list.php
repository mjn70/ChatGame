<?php
                        
                        include ("conm.php");

                         $listquery = mysqli_query($conn,"SELECT id,username from login  WHERE NOT id = (SELECT id from login WHERE username ='$login_session;')");
                         $listq = $conn->query($findquery );
                         if($listq->num_rows > 0){
                             
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
                            
                            $conn->close();
                            
                            ?>
                            
                            
                        </tbody>
                    </table>
?>
               
	