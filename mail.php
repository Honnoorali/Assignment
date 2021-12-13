<?php
require 'Mailer/mail.php';
$to="g1suro82@gmail.com";
$subject="Testing the mail function1.";
$message="Testing complete:";
if(send_mail($to,$subject,$message))
	echo "Email sent.";
else 
	echo "Could not send email.";

?>