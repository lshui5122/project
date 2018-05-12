<?php
use classes\entity\Feedback;
use classes\entity\User;
use classes\business\FeedbackManager;
use classes\business\Validation;
use classes\business\UserManager;

require_once 'includes/autoload.php';
$formerror="";

$email="";
$firstname="";
$lastname="";
$comments="";
$error_firstname="";
$error_lastname="";
$error_passwd="";
$error_email="";
$error_comments="";
$validate=new Validation();

if (isset($_SESSION["email"])){
    $UM = new UserManager();
    $existuser=$UM->getUserByEmail($_SESSION["email"]);
    $firstname=$existuser->firstname;
    $lastname=$existuser->lastname;
    $email=$existuser->email;
}
    
    
if(isset($_POST["submitted"])){
    $email=strip_tags($_POST["email"]);
    $lastname=strip_tags($_POST["lastname"]);
    $firstname=strip_tags($_POST["firstname"]);
    $comments=strip_tags($_POST["comments"]);
    
    $validate->check_name($firstname, $error_firstname);
    $validate->check_name($lastname, $error_lastname);
    $validate->check_comments($comments, $error_comments);
    $validate->check_email($email, $error_email);
    

    if(empty($error_firstname) && empty($error_lastname) && empty($error_email) && empty($error_comments))
    {
        $feedback=new Feedback();
        $feedback->firstname=$firstname;
        $feedback->lastname=$lastname;
        $feedback->email=$email;
        $feedback->comments=$comments;
        $FM=new FeedbackManager();
        $FM->insertFeedback($feedback);
        $formerror="Your feedback submitted successfully!";
        
        $fullname = $firstname . " " . $lastname;
        //header("Location: ./thankyou.php?fullname=$fullname");
        echo '<meta http-equiv="Refresh" content="1; url=./thankyou.php?fullname='.$fullname.'">';
    }
}
?>

			<h4 style="color:#727272;" class="text-center">Leave us a message</h4>
<form name="myForm" method="post" style="">

        
        <div class="text-center" style="color:#58ba52"><?=$formerror?></div><br>

            <div class="row">
                
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                <input type="firstname" class="form-control" id="firstname" placeholder="First name" name="firstname" value="<?=$firstname?>" size="50">
                <small style="color:red;"><?=$error_firstname?></small>
                </div>
            </div>
            
			<div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="form-group">
                 <input type="lastname" class="form-control" id="lastname" placeholder="Last name" name="lastname" value="<?=$lastname?>" size="50">
                 <small style="color:red;"><?=$error_lastname?></small>
                 </div>
            </div>
            
            </div>

    
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?=$email?>" size="50">
                <small style="color:red;"><?=$error_email?></small>
            </div>
            
            <div class="form-group">
                <textarea type="comments" rows="7" class="form-control" placeholder="Your message..." name="comments" value="<?=$comments?>" cols="50"></textarea>
                <small style="color:red;"><?=$error_comments?></small>
            </div>
                
            
            <button name="submitted" value="submit" type="submit" class="btn btn-primary" style="height:50px; width:100%;background-color: #2f8f83;
        color:white;border-radius: 25px;">Submit</button>
        
        <br><br>

        
        <button name="reset" value="reset" type="reset" class="btn btn-success" style="height:50px;width:100%;margin-bottom: 5px;">Reset</button>
        </form>
