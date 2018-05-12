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
      
        <a href="/m5Project/public/home.php"><img src="/m5Project/public/img/abc_job_logo.png"></a>
        
    </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/m5Project/public/home.php">Home</a></li>
            <li class="active"><a href="/m5Project/public/aboutus.php">About Us</a></li>
            <li class="active"><a href="/m5Project/public/modules/user/updateprofile.php">Update profile</a></li>
            <li class="active"><a href="/m5Project/public/modules/user/userlistadmin.php">Administration Users</a></li>
            <li class="active"><a href="/m5Project/public/modules/user/mailadmin.php">Send Newsletter</a></li>
            <li class="active"><a href="/m5Project/public/contactus.php">Contact</a></li>
        </ul>
    
        <ul class="nav navbar-nav navbar-right">
          <a href="/m5Project/public/logout.php"><button class="btn btn-primary navbar-btn">Logout</button></a>  
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
        <a href="/m5Project/public/home.php"><img src="/m5Project/public/img/abc_job_logo.png"></a>
        
    </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/m5Project/public/home.php">Home</a></li>
            <li class="active"><a href="/m5Project/public/aboutus.php">About Us</a></li>
            <li class="active"><a href="/m5Project/public/modules/user/updateprofile.php">Update profile</a></li>
            <li class="active"><a href="/m5Project/public/modules/user/userlist.php">View Users</a></li>
            <li class="active"><a href="/m5Project/public/contactus.php">Contact</a></li>
        </ul>
    
        <ul class="nav navbar-nav navbar-right">
          <a href="/m5Project/public/logout.php"><button class="btn btn-primary navbar-btn">Logout</button></a>
            
            
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
      
        <a href="/m5Project/public/home.php"><img src="/m5Project/public/img/abc_job_logo.png"></a>
        
    </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/m5Project/public/home.php">Home</a></li>
            <li class="active"><a href="/m5Project/public/aboutus.php">About Us</a></li>
            <li class="active"><a href="/m5Project/public/contactus.php">Contact</a></li>
        </ul>
    
        <ul class="nav navbar-nav navbar-right" style="padding-left:12px;">
          <a href ="/m5Project/public/modules/user/register.php"><button class="btn btn-success navbar-btn">Sign Up</button></a>
          <a href ="/m5Project/public/login.php"><button class="btn btn-primary navbar-btn">Sign In</button></a>
          
        </ul>
      </div>
  </div></nav>
<?php 
   } 
?>