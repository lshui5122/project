<?php
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
require_once "phpmailer/PHPMailerAutoload.php";
include 'includes/header.php';
$formerror="";
$newpassword="";

$email="";
$password="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();

if(isset($_POST["submitted"])){
    $email=$_POST["email"];
    $mail = new PHPMailer;
    $UM=new UserManager();
    $existuser=$UM->getUserByEmail($email);
    if(isset($existuser)){
        //generate new password
        $newpassword=$UM->randomPassword(8,1,"lower_case,upper_case,numbers");
        
        $options = ['cost' => 11,];
        $hash = password_hash($newpassword[0], PASSWORD_BCRYPT, $options);
        
        //update database with new password
        $UM->updatePassword($email,$hash);
        //$formerror="Valid email user. password: ".$newpassword[0];
        //coding for sending email
        // do work here
        
        
        //Enable SMTP debugging.
        //$mail->SMTPDebug = 3;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();
        //Set SMTP host name
        $mail->Host = " in-v3.mailjet.com";
        //Set this to true if SMTP host requires authentication
        $mail->SMTPAuth = true;
        //Provide username and password
        $mail->Username = "username";
        $mail->Password = "password";
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
        //Set TCP port to connect to
        $mail->Port = 587;
        //$mail->Port = 25;
        $mail->From = "EmailAdress";
        $mail->FromName = "Admin";
        $mail->addAddress($email, "Admin");
        $mail->isHTML(TRUE);
        $mail->Subject = "Password RESET for ABC Jobs!";
        $mail->Body = "<p>Your password had reset to: <br>$newpassword[0]</p>";
        $mail->AltBody = "This is the plain text version of the email content";
        if(!$mail->send())
        {
            $formerror="Invalid email user";
        }
        else
        {
            $_SESSION['email2']=$email;
            echo '<meta http-equiv="Refresh" content="1; url=/m5Project/public/successResetPassword.php">';
            //$formerror="New password have been sent to ".$email;
        }
    }else{$formerror="Invalid email user";
    }
}


?>

<div class="container-fluid " style="height:100%; background-color: #eaf4f2; padding:30px;"> 

      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-3"></div>
      
          <div class="col-lg-4 col-md-4 col-sm-6">
              <h1 class="text-center" style="color:#58ba52;"><strong>Reset Password</strong></h1><br>
             
              <p class="text-center" style="color:red;"> <?php echo $formerror?></p>
              
              <p class="text-center" style="color:#727272">Please enter your email</p>
        
        		<form name="myForm" method="post" class="text-center">
            		<div class="form-group">
                <input type="email" name="email" placeholder="Email" value="<?=$email?>" pattern=".{1,}" required title="Cannot be empty field" size="30"><?php echo $error_name?>
            		</div>
            <br>
		
		<button type="submit" name="submitted" value="Submit" class="btn btn-primary" style="height:50px; width:80%;background-color: #2f8f83;
                    color:white; border: 2px solid white;border-radius: 25px;">Reset Password</button>

        		</form>
              
        	</div>

          <div class="col-lg-4 col-md-4 col-sm-3"></div>
      </div>
</div>

<?php
include 'includes/footer.php';
?>