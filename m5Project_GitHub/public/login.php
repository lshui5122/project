<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
$formerror="";

$email="";
$password="";
$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
$error_catcha="";
$validate=new Validation();

if(isset($_POST["submitted"])){
    $response = $_POST["g-recaptcha-response"];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LeAgU0UAAAAANHyLlglU9i3LOKk1SJBhkLCDBlQ',
        'response' => $_POST["g-recaptcha-response"]
    );
    $options = array(
        'http' => array (
            'method' => 'POST',
            'header'=> 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success=json_decode($verify);
    if ($captcha_success->success==false) {
        $error_catcha= "<p>Please verify you are a real person!</p>";
    } else if ($captcha_success->success==true){
    
    $email=$_POST["email"];
    $password=$_POST["password"];
    if($validate->check_password($password, $error_passwd))
    {
        $UM=new UserManager();
        
        $existuser=$UM->getUserByEmail($email);
        if(isset($existuser)){
            $hashedPasswordFromDB = $existuser->password;
            $passwordFromPost = $_POST['password'];
            if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {
                $_SESSION['email']=$email;
                $_SESSION['role']=$existuser->role;
                $_SESSION['id']=$existuser->id;
                echo '<meta http-equiv="Refresh" content="1; url=home.php">';
            }else{
                $formerror="Invalid Password";
            }
        }else{
            $formerror="Invalid Email Address";
        }
    }
    }}


?>
<script src='https://www.google.com/recaptcha/api.js'></script>

  <div class="container-fluid text-center"
		style="color:#f83c3c;
        background-color:#2f8f83;
        background-image: url('./img/login_bg.jpg') ;
        min-height: 100%;
        min-height: 100vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;">
        
       
      <div class="row"> 

          <div class="col-lg-12 col-md-12 col-sm-12" style="color:white;text-shadow: 2px 2px 5px #58ba52; padding-top:20px;padding-bottom:30px;">
          <h3>Connect with fascinating people.</h3>
          <p style="font-size: 1.2em;">Get in-the-moment updates on the things that interest you.</p></div>
          </div>
          
      <div class="row"> 

          <div class="col-lg-3 col-md-4 col-sm-3 col-xs-1"></div>
      
          <div class="col-lg-6 col-md-4 col-sm-6 col-xs-10"
				style="background:rgba(255, 255, 255, 0.95);
                box-shadow: 1px 2px 15px rgba(0, 0, 0, .4);
                border-radius: 25px; padding:30px 50px;
                margin-bottom:80px;">
                
              <div style="padding-bottom:30px;"><img style="width:40%;" src="/m5Project/public/img/abc job_logo_large.png"></div>
              
              <div><p class="text-center"><?php echo $formerror?></p></div>
        		
        		<form name="myForm" method="post">
            		<div class="form-group">
                		<input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="<?=$email?>" pattern=".{1,}"   required title="Cannot be empty field" size="30"></td>
        
            		</div>
            
            		<div class="form-group">
                		<input type="password" name="password" class="form-control" id="email" placeholder="Password" value="<?=$password?>"  size="30">
  					<?php echo $error_passwd?>
            		</div>
            
            		<div class="text-center"><?php echo $error_catcha?></div>
            		<div class="captcha_wrapper">
          		<div class="g-recaptcha" data-theme="light" style="transform:scale(0.77);-webkit-transform:scale(0.77);
                            transform-origin:0 0;-webkit-transform-origin:0 0;" data-sitekey="6LeAgU0UAAAAADoc7Gl43zX8luzL_P8aECngO0Av"></div>
        			</div>

            		<button type="submit" name="submitted" value="Submit" class="btn btn-primary"
				style="height:50px; width:100%;background-color: #2f8f83; color:white;border-radius: 25px;">Sign In</button>

            <br>
            <br>
				<a href="./forgetpassword.php" class="text-success"><small>Forget Your Password?</small></a>
            
            		<div class="text-center">
            		<small style="color:#727272">Don't have an account?</small>
      			<a href="modules/user/register.php"><small class="text-success" style="font-weight: bold;">Sign Up Now</small></a>
        			<br>
        			</div>
        		</form>
        		</div>

          	<div class="col-lg-3 col-md-4 col-sm-3 col-xs-1"></div>
      </div>

<?php
include 'includes/footer.php';
?>
