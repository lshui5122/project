<?php
session_start();
require_once 'includes/autoload.php';
include 'includes/header.php';

if(isset($_GET["fullname"])){
    $fullname=$_GET["fullname"];
}

?>
<!-- body -->
<div class="container-fluid " style="height:100%; background: linear-gradient(#58ba52, #2f8f83);color:white; padding:30px;"> 

      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4"></div>
      
          <div class="col-lg-4 col-md-4 col-sm-4">
              <br><div class="text-center" style="padding:20px;"><img src='img/smile green icon.png'></div>
              <h1 class="text-center"><strong>Thank You</strong></h1>
              <h2 class="text-center" style="line-height: 1.5;"><?php echo $fullname; ?></h2>
              <h4 class="text-center" style="padding-top:0px;padding-bottom: 20px;margin-top: 0px;">We are reviewing your feedback</h4>
            
		 </div>
      </div>
        
          <div class="col-lg-4 col-md-4 col-sm-4"></div>
          

<?php
include 'includes/footer.php';
?>
