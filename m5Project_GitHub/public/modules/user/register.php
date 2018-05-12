<?php
session_start();
require_once '../../includes/autoload.php';
include '../../includes/header.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;
use classes\business\Validation;


$formerror="";

$firstname="";
$lastname="";
$email="";
$password="";
$cpassword="";
$newsletter="";
$error_firstname="";
$error_lastname="";
$error_passwd="";
$error_cpasswd="";
$error_email="";
$validate=new Validation();

if(isset($_REQUEST["submitted"])){
    $firstname=$_REQUEST["firstname"];
    $lastname=$_REQUEST["lastname"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $cpassword=$_REQUEST["cpassword"];
    $newsletter=isset($_REQUEST["newsletter"]);
    
    
    $validate->check_name($firstname, $error_firstname);
    $validate->check_name($lastname, $error_lastname);
    $validate->check_email($email, $error_email);
    $validate->check_password($password, $error_passwd);
    $validate->check_cpassword($password, $cpassword, $error_cpasswd);
    
    
    if(empty($error_firstname) && empty($error_lastname) && empty($error_email) && empty($error_passwd) && empty($error_cpasswd)){
        $UM=new UserManager();
        $user=new User();
        $user->firstname=$firstname;
        $user->lastname=$lastname;
        $user->email=$email;
        $user->newsletter=$newsletter;
        
        //hash password
        $options = ['cost' => 11,];
        $passwordFromPost = $_REQUEST['password'];
        $hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
        $user->password=$hash;
        $user->role="user";
        $existuser=$UM->getUserByEmail($email);
    
        if(!isset($existuser)){
            // Save the Data to Database
            $UM->saveUser($user);
            #header("Location:registerthankyou.php");
			echo '<meta http-equiv="Refresh" content="1; url=./registerthankyou.php">';
        }
        else{
            $formerror="User Already Exist";
        }
    }else{
        $formerror="Please fill in the fields";
    }
}
?>
<div class="container-fluid "
			 style="min-height: 100%;
                    min-height: 100vh;
                    background: linear-gradient(#58ba52, #2f8f83);
                    color:white;
                    padding:30px 30px 55px 30px;"> 

      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-3"></div>
      
          <div class="col-lg-4 col-md-4 col-sm-6" style="padding-bottom:60px;">
              <h2 class="text-center"><strong>Join ABC Jobs today</strong></h2>
              <h4 class="text-center" style="padding-top:0px;padding-bottom: 20px;margin-top: 0px;"><strong>Create an Account</strong></h4>
              
              <div class="text-center" style="color:#fff6ac;"><h4><?=$formerror?></h4><br></div>
        
        <form name="myForm" method="post">

            <div class="row">
                
            <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="firstname" class="form-control" id="firstname" placeholder="John" name="firstname" value="<?=$firstname?>" size="50">
                 <small style="color:#fff6ac;"><?=$error_firstname ?></small>
                 </div>
                 
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="lasttname">Last Name:</label>
                        <input type="lastname" class="form-control" id="lastname" placeholder="Carter" name="lastname" value="<?=$lastname?>" size="50">
                        <small style="color:#fff6ac;"><?=$error_lastname ?></small>
                    </div>
                </div>
            </div>

    
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="johncarter@gmail.com" name="email" value="<?=$email?>" size="50">
            		<small style="color:#fff6ac;"><?=$error_email?></small>
            		</div>
            
            <div class="row">
                
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="6 or more character" name="password" value="<?=$password?>" size="20">
            </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="cpassword">Confirm Password:</label>
                <input type="password" class="form-control" id="cpassword" placeholder="6 or more character" name="cpassword" value="<?=$cpassword?>" size="20">
            </div>
            
            </div>
            </div>
            
            <p class="text-center" style="color:#fff6ac;"><?=$error_passwd?></p>
            
            <p class="text-center" style="color:#fff6ac;"><?=$error_cpasswd?></p>
                
            <br>
            <input type="checkbox" name="newsletter" value="1"> Subscribe Newsletter<br><br>
            
            <button name="submitted" value="submit" type="submit" class="btn btn-info" style="height:50px; width:100%;background-color: #2f8f83;
        color:white; border: 2px solid white;border-radius: 25px;">Sign Up</button>
        
        <br><br>

        
        <button name="reset" value="reset" type="reset" class="btn btn-success" style="height:50px;width:100%;margin-bottom: 5px;">Reset</button>

            <br>
            <br>
            <div class="text-center"><small style="color:#a8b6b4;">Have an account?<a href="/m5Project/public/login.php" style="color:white;"> Login</small></a></div>
        </form>
        </div>

          <div class="col-lg-4 col-md-4 col-sm-3"></div>
      </div>
        
       
 
      

<?php
include '../../includes/footer.php';
?>