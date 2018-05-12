<!-- Navigation Bar -->
<html>
<head>
	<title>ABC Jobs</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bs/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="bs/js/bootstrap.min.js"></script> <style>

      html{
      background-color: #2f8f83;min-height: 100%;    
      }
      body{
       font-family: arial; 
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
</style>
<body>

<?php 
   if(isset($_SESSION["email"]))
   {
       if($_SESSION["role"]=="admin")
       {
?>
       
<nav class="navbar" style="margin:0px; box-shadow: 0px 1px 10px grey;border-radius: 0px;">
  <div class="container">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-menu-hamburger"></span>                       
      </button>
        <a href="#"><img src="img/abc job_logo.png"></a>
        
    </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="./home.php">Home</a></li>
            <li class="active"><a href="./public/modules/user/updateprofile.php">Update profile</a></li>
            <li class="active"><a href="./modules/user/userlistadmin.php">Administration Users</a></li>
            <li class="active"><a href="./contactus.php">Contact</a></li>
        </ul>
    
        <ul class="nav navbar-nav navbar-right">
          <button a href="./logout.php" class="btn btn-primary navbar-btn">Logout</button>  
        </ul>
      </div>
  </div></nav>
      
<?php 
   } else
   {
?>
<nav class="navbar" style="margin:0px; box-shadow: 0px 1px 10px grey;border-radius: 0px;">
  <div class="container">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-menu-hamburger"></span>                       
      </button>
        <a href="#"><img src="img/abc job_logo.png"></a>
        
    </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="./home.php">Home</a></li>
            <li class="active"><a href="./modules/user/updateprofile.php">Update profile</a></li>
            <li class="active"><a href="./modules/user/userlist.php">View Users</a></li>
            <li class="active"><a href="./contactus.php">Contact</a></li>
        </ul>
    
        <ul class="nav navbar-nav navbar-right">
          <button a href="./logout.php" class="btn btn-primary navbar-btn">Logout</button>  
        </ul>
      </div>
  </div></nav>
  
<?php }
   } else {
?>
<nav class="navbar" style="margin:0px; box-shadow: 0px 1px 10px grey;border-radius: 0px;">
  <div class="container">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-menu-hamburger"></span>                       
      </button>
        <a href="./home.php"><img src="img/abc job_logo.png"></a>
        
    </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="./home.php">Home</a></li>
            <li class="active"><a href="./aboutus.php">About Us</a></li>
            <li class="active"><a href="./contactus.php">Contact</a></li>
        </ul>
    
        <ul class="nav navbar-nav navbar-right">
          <button href ="./modules/user/register.php" class="btn btn-success navbar-btn">Sign Up</a></button>
          <button href="./logout.php" class="btn btn-primary navbar-btn">Login</button>  
        </ul>
      </div>
  </div></nav>
<?php 
   } 
?>