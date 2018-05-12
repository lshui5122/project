<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;
use classes\business\Validation;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php

$formerror="";
$firstname="";
$lastname="";
$email="";
$password="";
$cpassword="";
$error_firstname="";
$error_lastname="";
$error_passwd="";
$error_cpasswd="";
$error_email="";
$validate=new Validation();

if(!isset($_POST["submitted"])){
    $UM=new UserManager();
    $existuser=$UM->getUserById($_GET["id"]);
    $firstname=$existuser->firstname;
    $lastname=$existuser->lastname;
    $email=$existuser->email;
    $password=$existuser->password;
    $cpassword=$existuser->password;
}else{
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    $validate->check_name($firstname, $error_firstname);
    $validate->check_name($lastname, $error_lastname);
    $validate->check_email($email, $error_email);
    $validate->check_password($password, $error_passwd);
    $validate->check_cpassword($password, $cpassword, $error_cpasswd);
    if(empty($error_firstname) && empty($error_lastname) && empty($error_email) && empty($error_passwd) && empty($error_cpasswd)){
        $update=true;
        $UM=new UserManager();
     
       /*if($email!=$_SESSION["email"]){
           $existuser=$UM->getUserByEmail($email);
           if(is_null($existuser)==false){
               $formerror="User Email already in use, unable to update email";
               $update=false;
           }
       }*/
       
       if($update){
           $existuser=$UM->getUserById($_GET["id"]);
           $existuser->firstname=$firstname;
           $existuser->lastname=$lastname;
           $existuser->email=$email;
           $options = ['cost' => 11,];
           $passwordFromPost = $_POST['password'];
           $hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
           $existuser->password=$hash;
           $UM->saveUser($existuser);
           $_SESSION["donemessage"]="User profile updated";           
           //header("Location:/user/userlistadmin.php");
           echo '<meta http-equiv="Refresh" content="1; url=./userlistadmin.php?">';
           
       }
       
  }else{
      $formerror="Please provide required values";
  }
}
?>
<script>
function submitForm() {
	  return confirm('Are you sure to update user profile?');
	}
</script>

<div class="container-fluid " style="background: linear-gradient(#58ba52, #2f8f83);color:white; padding:30px 30px 55px 30px;min-height: 100%;
                    min-height: 100vh;"> 

      <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3"></div>
      
          <div class="col-lg-6 col-md-6 col-sm-6" style="padding: 0px 30px;">
              <h2 class="text-center" style="padding:20px;"><strong>Update Profile</strong></h2>
                            
              <div class="text-center" style="color:#ffbac2;"><h4><?=$formerror?></h4><br></div>
        
        <form name="myForm" method="post" onsubmit="return submitForm(this);">

            <div class="row">
                
            <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="firstname" class="form-control" id="firstname" placeholder="John" name="firstname" value="<?=$firstname?>" size="50" required>
                 </div>
                 
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="lasttname">Last Name:</label>
                        <input type="lastname" class="form-control" id="lastname" placeholder="Carter" name="lastname" value="<?=$lastname?>" size="50" required>
                    </div>
                </div>
            </div>

    
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="johncarter@gmail.com" name="email" value="<?=$email?>" size="50" required>
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
            <button name="submitted" value="submit" type="submit" class="btn btn-info" style="height:50px; width:100%;background-color: #2f8f83;
        color:white; border: 2px solid white;border-radius: 25px;">Submit</button>
        
        <br><br>

        
        <button name="reset" value="reset" type="reset" class="btn btn-success" style="height:50px;width:100%;margin-bottom: 5px;">Reset</button>


        </form>
        </div>

          <div class="col-lg-3 col-md-3 col-sm-3"></div>
      </div>


<?php
include '../../includes/footer.php';
?>