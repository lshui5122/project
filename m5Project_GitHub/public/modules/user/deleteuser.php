<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

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
$deleteflag=false;

if(isset($_POST["submitted"])){
  if(isset($_GET["id"])){
       $UM=new UserManager();
       $existuser=$UM->deleteAccount($_GET["id"]);
        $formerror="User deleted successfully.";
		$deleteflag=true;
	}
}else if(isset($_POST["cancelled"])){
	header("Location:../../home.php");
}else{
	if(isset($_GET["id"]))
	{
	  $UM=new UserManager();
	  $existuser=$UM->getUserById($_GET["id"]);
	  $firstname=$existuser->firstname;
	  $lastname=$existuser->lastname;
	  $email=$existuser->email;
	  $password=$existuser->password;
	}
}
?>
<div class="container-fluid text-center" style="height:100%; background: white ; padding:30px;"> 
<div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-1"></div>
      
          <div class="col-lg-4 col-md-4 col-sm-4  col-xs-10">
          <form name="deleteUser" method="post">
			<h1 class="text-center" style="padding-top:30px;padding-bottom:30px;"><strong style="color:#58ba52;">Delete User</strong></h1>
			

			<div><h3><?=$formerror?></h3></div>
<?php
if (!$deleteflag)
{
?>

    <h4>Are you sure that you want to delete the following record?</h4>
  	<h3 style="color:red;padding-bottom:30px;"><?=$email?></h3>
            
       <button type="submit" name="submitted" value="Delete" class="btn btn-primary"
				style="height:50px; width:100%;background-color: #2f8f83; color:white;border-radius: 25px;">Delete</button>
				
				<br><br>
				
				
        <button type="submit" name="cancelled" value="Cancel" class="btn btn-success" style="height:50px;width:100%;margin-bottom: 5px;">Cancel</button>
		
		</div>

          <div class="col-lg-4 col-md-4 col-sm-4  col-xs-1"></div>
      </div>		
				
<?php
}
?>
      
<?php
include '../../includes/footer.php';
?>