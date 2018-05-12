<?php
session_start();
require_once '../../includes/autoload.php';
require_once "phpmailer/PHPMailerAutoload.php";

use classes\business\UserManager;
use classes\entity\User;
use classes\util\DBUtil;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$UM=new UserManager();
$users=$UM->getAllUsers();

if(isset($users)){
    $connection = DBUtil::getConnection();
    
    $results="";
    $maillist="";
    $mailcontent="";
    $formerror="";
    $link="";
    
    if(isset($_POST["submitted"])){
        $maillist=mysqli_query($connection,"SELECT * FROM tb_user WHERE newsletter LIKE '1'") or die("no mail list");
        
        if (mysqli_num_rows($maillist) > 0) {
            
            
            while ($row = mysqli_fetch_array($maillist)) {
                $userid = $row['id'];
                $SECRET_STRING = "secret string";
                $idhash = md5($row['id'].$SECRET_STRING);
                $link = "http://localhost/m5Project/public/unsubscribe.php?id=$userid&validation_hash=$idhash";
                $mailcontent=$_POST["mailcontent"];
                $mail = new PHPMailer;
                //Enable SMTP debugging.
                //$mail->SMTPDebug = 3;
                //Set PHPMailer to use SMTP.
                $mail->isSMTP();
                //Set SMTP host name
                $mail->Host = " in-v3.mailjet.com";
                //Set this to true if SMTP host requires authentication
                $mail->SMTPAuth = true;
                //Provide username and password
                $mail->Username = "user";
                $mail->Password = "password";
                //If SMTP requires TLS encryption then set it
                $mail->SMTPSecure = "tls";
                //Set TCP port to connect to
                $mail->Port = 587;
                //$mail->Port = 25;
                $mail->From = "EmailAdress";
                $mail->FromName = "Admin";
                $mail->addAddress($row['email'], $row['firstname']);
                $mail->isHTML(TRUE);
                $mail->Subject = "News Letter";
                $mail->Body = "<p>$mailcontent</p><br><br><a href=$link >Unsubscribe</a>";
                $mail->AltBody = "This is the plain text version of the email content";
                if(!$mail->send()){
                    echo "Invalid email user";
                }
                else
                {
                    
                }
            }
            $formerror="Email send";
        }
    }
    
    ?>

<div class="container-fluid" style="padding:0; background-image: url('../../img/m5_bg.jpg') ; min-height: 100%; min-height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover;">
		
		<div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px">
            <div style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
            
			<form action="" method="post">			
  			<div class="form-group">
            <label for="mailcontent">Manage Newsletter</label>
            <textarea class="form-control" name="mailcontent" rows="4" placeholder="Write your message here"></textarea>
            <h4 class="error"><?php echo $formerror?></h4>
          	</div>
  			<div class="">
    			<button name="submitted" value="submit" type="submit" class="btn btn-primary" style="height:50px; width:100%;background-color: #2f8f83;
        color:white;border-radius: 25px;">Submit</button>
            <br><br>
            <button name="Reset" value="reset" type="reset" class="btn btn-success" style="height:50px;width:100%;margin-bottom: 5px;">Reset</button>
  			</div>
			
			</form>			
			
			
			</div>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>     
	</div>
		
		<div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            

            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px; padding-bottom: 65px">
            <div style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
            
			<form action="" method="post">			
  			
  			<div class="">
    			<button name="button" value="submit" type="submit" class="btn btn-info" style="height:50px; width:100%;background-color: #2f8f83;
        color:white; border: 2px solid white;border-radius: 25px;">Users Mailing List</button>
  			</div>
			
			</form>			
			<?php if(isset($_POST['button'])){    //trigger button click
 
                $results=mysqli_query($connection,"SELECT * FROM tb_user WHERE newsletter LIKE '1'") or die("Could not search!");

                if (mysqli_num_rows($results) > 0) {
                echo '
                	  <h4 class="text-center" style="padding-top:30px; padding-bottom:5px;">
           Below is the user mailling list</h4>  
                    <div class="table-responsive">
                    <table class="table" style="background:white;">
                    <tr>
                    <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
            	        
                    </thead>
                    </tr>';
    
                while ($row = mysqli_fetch_array($results)) {
                    
                    echo '<tr>
                        <td>'.$row['firstname'].'</td>
                        <td>'.$row['lastname'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['role'].'</td>
                        
                    </tr>';
                } 
              }
              else{
                  echo "<h4 class='error'>No user Found</h4 >";
              }
              
            }?>
			</table></div>
			
			</div>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>     
	</div>

    
	
<?php 
}
?>


<?php
include '../../includes/footer.php';
?>