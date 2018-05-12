<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;
use classes\util\DBUtil;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$UM=new UserManager();
$users=$UM->getAllUsers();

if(isset($users)){
$connection = DBUtil::getConnection();
$query="";
?>

<div class="container-fluid" style="color:white; padding:0; background-image: url('../../img/m5_bg.jpg') ;  min-height: 100%;
                    min-height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover;">
	<div class="row" style="margin-left:0px; margin-right:0px;">
		<div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
	

	<div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px">

		<form action="" method="post">
    			<div class="input-group input-group-lg">
      			<input class="form-control" name="search" type="search" placeholder="Search user" required>
      		<div class="input-group-btn">
        			<button class="btn btn-default" name="button" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      		</div>
    			</div>
  		</form>

<?php

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];
 
  $query=mysqli_query($connection,"SELECT * FROM tb_user WHERE id LIKE '%$search%' OR firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR email LIKE '%$search%'") or die("Could not search!");

  if (mysqli_num_rows($query) > 0) {
    echo '<h4 class="text-center" style="padding-top:30px; padding-bottom:5px;"><strong>Search Result:</strong></h4>
            <table class="table" style="background:white;">
                    <tr>
                    <thead class="thead-light">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
            	        <th>Operation</th>
                    </thead>
                    </tr>';
    
    while ($row = mysqli_fetch_array($query)) {
    
        echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['firstname'].'</td>
            <td>'.$row['lastname'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['role'].'</td>
            <td>
					<a style="padding:0px 2px; color:#ff8a9b;" href="deleteuser.php?id='.$row['id'].'>">Delete</a>
					<a style="padding:0px 2px; color:#58ba52;" href="updateuser.php?id='.$row['id'].'>">Update</a>
			   </td>
        </tr>';
  }
  
}
else{
    echo "<h4 class='text-center'>No users found<h4><br><br>";
  }
 
}

?>
</table>
		</div>
		
        <!-- clearspace -->
        <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>    
        </div> 

	<div class="row" style="margin-left:0px; margin-right:0px;">
           <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            
           <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-bottom: 55px">
           <h4 class="text-center" style="padding-top:30px; padding-bottom:5px;">
           Below is the list of Developers registered in community portal</h4>
    		<div class="table-responsive">
    		<table class="table" style="background:white;">
            <tr>
				<thead>
               <th><b>Id</b></th>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
               <th><b>Role</b></th>
			   <th><b>Operation</b></th>
			   </thead>
            </tr>    
    <?php 
    foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
               <td><?=$user->id?></td>
               <td><?=$user->firstname?></td>
               <td><?=$user->lastname?></td>
               <td><?=$user->email?></td>
               <td><?=$user->role?></td>
			   <td>
					<a style="padding:0px 2px; color:#ff8a9b;" href='deleteuser.php?id=<?php echo $user->id ?>'>Delete</a>
					<a style="padding:0px 2px; color:#58ba52;" href='updateuser.php?id=<?php echo $user->id ?>'>Update</a>
			   </td>
            </tr>
            <?php 
        }
    }
    ?>
    </table></div>
    </div>
	<div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>     
	</div>
	
    <?php 
}
?>

<?php
include '../../includes/footer.php';
?>