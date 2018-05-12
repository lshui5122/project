<?php 
require_once '../../vendor/autoload.php';
//include_once '../../vendor/swiftmailer/swiftmailer/lib/swift_required.php';

session_start();
$mailSubject = $_POST['mail_subject'];
$mailBody = $_POST['mail_body'];	
$email = $_POST['email_list'];

//$email = 'muhaiminazmi90@gmail.com';
echo "Your subject is: ".$mailSubject."<br>";
echo "</br>";
echo "Your message is: ".$mailBody."<br>";
echo "Your message is: ".$email."<br>";

$transport = (new Swift_SmtpTransport('in-v3.mailjet.com', 25))
			->setUsername('5ea15ff560779d4122899918e862736f')
			->setPassword('0233c9cd63079df557b3d2d078ed3db8');

			// Create the Mailer using your created Transport
			$mailer = new Swift_Mailer($transport);

			// Create a message
			$message = (new Swift_Message($mailSubject))
			->setFrom(['muhaiminazmi90@gmail.com' => 'Admin'])
			->setTo(explode(",", $email))
			/*'muhamuhaiminazmi90@gmail.com' => 'User',
			'muhaiminazmi90@gmail.com' => 'User',
			'roanldo@gmail.com' => 'User',*/
			->setBody($mailBody);
			// Send the message
			
			if($mailer->send($message,$failures))//;
			{
     			echo "Message sent to " .$email. ".";	#header("Location:passwordconfirm.php");
			} 
			else
			{
				echo "<br> Error"; 
				echo "<br>";
				print_r($failures);#$formerror= "Invalid email user";
			}			
			

?>