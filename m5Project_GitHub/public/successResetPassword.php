<?php
session_start();
require_once 'includes/autoload.php';
include 'includes/header.php';

if(isset($_SESSION["email2"])){
    $email=$_SESSION["email2"];
}

?>
        
<div class="container-fluid " style="height:100%; background-color: #eaf4f2;color:white; padding:30px;"> 

      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4"></div>
      
          <div class="col-lg-4 col-md-4 col-sm-4">
              <h2 class="text-center" style="color:#58ba52;"><strong>Reset Password Confirmation</strong></h2>
              <p class="text-center" style="padding-top:0px; color:#727272;padding-bottom: 20px;margin-top: 0px;">Okay, we've sent a new password to
your email address!</p>
            
              <div class="text-center"><img src='img/done green icon.png'></div><br>  
            
              <br>
              <a href="/m5project/public/login.php"><button type="submit" class="btn btn-primary" style="height:50px;width:100%;background-color: #2f8f83;
             color:white; border: 2px #2f8f83;border-radius: 25px;">Login</button></a></div>
              </div>
        
        </div>

          <div class="col-lg-4 col-md-4 col-sm-4"></div>
      </div>    
   

<?php
include 'includes/footer.php';
?>
