<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.inc.php';


?>

<link rel="stylesheet" href="..\..\css\bootstrap.css">
<link rel="stylesheet" href="..\..\css\sendbulkemail.css">
<div id="section-offset"><!--OFFSET--></div>

<?php

$UM=new UserManager();
$users=$UM->getAllUsers();

if(isset($users)) {

?>

<div class="container">
	<h3>Send Email to Users</h3>
</div>

<br>

<div class="container">
  
  <!--FORM TO SELECT USER EMAIL-->	
  <form action="#" method="post"> 
  <table>
		<thead>
			<tr>
				<th style = "width: 1%;">
					<input type="checkbox" id="ckbCheckAll" />
				</th>
			<!--<th style = "width: 0.2%;"><input type="submit" name="submit" value="Select User" class="btn btn-primary btn-sm"></th>-->
				<th style = "width: 5%;">First Name</th>
				<th style = "width: 5%;">Last Name</th>
				<th style="width: 5%;">Email</th>
			</tr>
		</thead>

	
    <?php
	
    foreach ($users as $user) {
        if($user!=null){
    
	?>
			
		<tbody>	
			<tr>
				<td>
					<input type = "checkbox" class="checkBoxClass" name="check_list[]" value="<?=$user->email?>">
				</td>
				<!--<td><input type = "checkbox" name="check_list[]" value="<?=$user->email?>"></td>-->
				<td>
					<?=$user->firstName?>
				</td>
				<td>
					<?=$user->lastName?>
				</td>
				<td>
					<?=$user->email?>
				</td>
			</tr>
		</tbody>
		<!--TO SELECT ALL CHECKBOX-->
		<script>
		$(document).ready(function () { 
			$("#ckbCheckAll").click(function() {
				$(".checkBoxClass").prop('checked', $(this).prop('checked'));
		});
		
		$(".checkBoxClass").change(function() {
			if (!$(this).prop("checked")) {  
				$("#ckbCheckAll").prop("checked",false);
										  } 
		});
		});
		</script>
		<!--TO SELECT ALL CHECKBOX-->
		<!--TO CLOSE THE TABLE FO ALL USER-->
<?php    
        }
    }
	
?>
		</table>
	</div>
		<!--TO CLOSE THE TABLE FO ALL USER-->
	
	<div class="container">
		<input type="submit" name="submit" value="Select User" class="btn btn-primary btn-sm">
		<input type="submit" name="submit" value="Reset" class="btn btn-danger btn-sm">
		</div>
	<br><br>
	
	</form>
    
	<?php
	
	if (isset($_POST['submit'])) { 
	if (!empty($_POST['check_list'])) {
		
	//foreach ($_POST['check_list'] as $selected =>$email) { 
	
	//implode(",", $_POST['check_list']); 
	
	$selectedemail = implode(", ", $_POST['check_list']);
	
	#session_start();
	$_SESSION['check_list'] = implode(", ", $_POST['check_list']);
	
	
	//echo $selectedemail;
	
	?>
	
	<!--FORM TO SEND BULK EMAIL-->
	
	<?php 
	
	
	
	
	?>
	
	<div class="container">
	<form action="sendemail.php" method="post">
    <table>
		<tr>
			<td style = "width: 11%;">To</td>
			<td>
				<label>
					<input readonly name="email_list" type="text" id="email_list" value="<?php echo $selectedemail ?>" size="100">
				</label>
			</td>
		</tr>
		<tr>
			<td>Subject</td>				
			<td>
				<label>
					<input name="mail_subject" type="text" id="mail_subject" size="100">
				</label>
			</td>
		</tr>
		<tr>
			<td> Message </td>			
			<td>
				<label>
					<textarea name="mail_body" cols="100" rows="5" id="mail_body"></textarea>
				</label>
			</td>
		</tr>
		<tr>
			<td td colspan="2"> 
				<label>
					<input name="sent" type="submit" name="submit" value="SEND" class="btn btn-outline-success">
					<input type="reset" name="reset" value="CANCEL" class="btn btn-outline-danger">
				</label> 
			</td>					
    </table>
  </div> 
<?php 















		}
	}		
}



?>
  
</form>

<?php
/*include '../../includes/footer.inc.php';*/
?>












