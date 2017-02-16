                <?php
                  session_start();
                  include ("conm.php");
                  
      if(isset($_POST['findset'])){ 
          
                   $login_sid = $_SESSION['login_id'];
                   $user_name = $_POST['find_name'];
                     
                   $Fq = mysqli_query($conn,"SELECT id,username FROM login WHERE username = '$user_name' and id != $login_sid");
                   $frow = mysqli_fetch_array($Fq);
                   
                   if( $frow['username'] != ""){
                       
                       $_SESSION['$player_id']= $frow['id'];
                       $_SESSION['$player_name']= $frow['username'];
                       $userfind = $frow['username'];
                       
                       echo "Find Player Name: ". $userfind;
                       
                    } else {
                        echo "<p>0 results</p>";
                    } 
         }
                ?>
