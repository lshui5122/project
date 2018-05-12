<!-- Navigation Bar -->
<html>
<head>
	<title>ABC Jobs</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/m5Project/public/bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/m5Project/public/bs/js/bootstrap.min.js"></script>

	<style>

     body, html{
        height:100%;
        margin:0;
        padding:0;
}

      body{ margin-bottom:55px;}
        
      body{
       font-family: arial; 
      }
      
   .mapshadow{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

        
      .btn-success{
        background-color: white;
        width:100px;
        color:#58ba52;
        border: 2px solid #58ba52;
        border-radius: 25px;
      }
      
      .btn-success:hover{
        background-color: #58ba52;
        color:white;
        border: 2px solid white;
      }
    
      .btn-primary{
        width:100px;
        background:linear-gradient(#58ba52, #2f8f83);
        border: 2px solid #58ba52;
        border-radius: 25px;}
      
      .btn-primary:hover{
        width:100px;
        background:linear-gradient(#2f8f83, #58ba52);
        border: 2px solid #58ba52;
        border-radius: 25px;}
        
       .btn-info:hover{
        width:100px;
        background:linear-gradient(#2f8f83, #58ba52);
        border: 2px solid #58ba52;
        border-radius: 25px;}
        
        .gcontainer {
        max-width: 300px;
        background: #ccc;
        padding: 20px;
        }
        .g-recaptcha {
        transform-origin: left top;
        -webkit-transform-origin: left top;
}

</style>
</head>
<body>

<?php
require_once 'includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;


    $formerror="";
    
//     $deleteflag=false;
    
    if(isset($_POST["submitted"])){
        $SECRET_STRING = "d38990f7f23ea75b74a9236420d";
        $expected = md5( $_GET["id"] . $SECRET_STRING );
        
        if( $_GET['validation_hash'] = $expected ){
            $UM=new UserManager();
            $existuser=$UM->unsubscribenews($_GET["id"]);
            $formerror="unsubscribe successfully.";
//             $deleteflag=true;
            echo '<meta http-equiv="Refresh" content="1; url=home.php">';           
        } else {
            echo '<meta http-equiv="Refresh" content="1; url=home.php">';
        }
   
}

?>

<div class="container-fluid"
			 style="min-height: 100%;
                    min-height: 100vh;
                    background: linear-gradient(#58ba52, #2f8f83);
                    color:white;
                    padding:30px 30px 55px 30px;"> 
                    
            <div class="col-lg-4 col-md-4 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-4 col-md-4 col-sm-10 col-xs-10"  style="padding-top:50px"> 
            <form name="deleteUser" method="post" style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
                <img src="/m5Project/public/img/abc_job_logo.png">
                <br><br>
                <h2 style="color:grey;">Are you sure you want to unsubscribe?<br></h2>
                <h3><?=$formerror?><br></h3>
                           
                <br>
              <button name="submitted" value="submit" type="submit" class="btn btn-primary" style="height:50px; width:100%;background-color: #2f8f83;
        color:white;border-radius: 25px;">Confirm</button>
        
            		
            </form>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-4 col-md-4 col-sm-1 col-xs-1"></div>

            
            
<?php
include 'includes/footer.php';
?>