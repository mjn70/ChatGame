                <?php
                  session_start();
                  include ("conm.php");
                  
      if(isset($_POST['findset'])){ 
          
                   $login_sid = $_SESSION['login_id'];
                   $user_name = $_POST['find_name'];
                     
                   $Fq = mysqli_query($conn,"SELECT id,username FROM login WHERE username = '$user_name' and id != $login_sid");
                   $frow= mysqli_num_rows($Fq);
                   if($findq == 1){
                       $_SESSION['$player_id']= $frow['id'];
                       $_SESSION['$player_name']= $frow['username']; 
                       echo "Find Player Name: ". $frow['username'];
                       
                   }else {     
                    echo "<p>0 results</p>";            
                    } 
         }
                ?>
