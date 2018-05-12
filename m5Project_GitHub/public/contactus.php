<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
?>

<div class="container-fluid" style="height:auto; background-color: white;"> 
      
      <br><br><h2 class="text-center" style="color:#58ba52;"><strong>Get in touch with us</strong></h2><br>     
      
      <br>
      
      <div class="row">
      
      <div class="col-lg-1 col-md-1 col-sm-1"></div>
      
        <div class="col-lg-5 col-md-5 col-sm-5 text-center" style="padding:0px 60px 55px 60px;">
			
			<h4 style="color:#727272;" class="text-center">Contact Us</h4>
			
			<p><i class="fa fa-phone" style="font-size:1em; color:#727272;"></i> +65 1800 222 6868</p>
			
			<p><span class="glyphicon glyphicon-map-marker" style="font-size:1em; color:#727272;"></span>
			11 Eunos Road 8,<br>
			#07-02 Lifelong Learning Institute,<br>
			Singapore 408601</p>
   			<br>
      <iframe class="mapshadow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7600334737967!2d103.88985331447665!3d1.3196913620398996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19149fe4a925%3A0x82606eb494fd093c!2sLithan+Academy!5e0!3m2!1sen!2ssg!4v1514739525393" width="80%" height="280px" frameborder="0" style="border-radius:20px;border:0" allowfullscreen></iframe>

   
		</div>
        
        
        <div class="col-lg-5 col-md-5 col-sm-5" style="padding-bottom:55px;padding-left:60px; padding-right:60px;">
		<?php include './feedback.php';?>
		</div>
		
		<div class="col-lg-1 col-md-1 col-sm-1"></div>
		
</div>


		

<?php
include 'includes/footer.php';
?>