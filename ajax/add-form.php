<?php

if($_POST['submit'] == 'Submit')
{
	
	echo "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert'>X</button>
			<p style='text-align: center;'><strong>Well done!</strong>
			<br>Your inquiry has been submitted successfully<br> Our Call Center Agent will Contact you soon.</p>
		</div>";
		
	$content11 = "

	Dear Mr./Ms. ".$_POST['name'].", <br> Thank You for Applying on Horizon Vehicle.<br>
	Our Customer Service agent will contact you for further detail.";

	require_once ("PHPMailer/PHPMailerAutoload.php");

	$mail11 = new PHPMailer();
	$mail11->setFrom('info@horizonvehicles.com', 'Horizon Vehicle');
	$mail11->addAddress($_POST['email'], $_POST['name']);//jsko bhejni h
	$mail11->Subject = 'Thank You For Applying';
	$mail11->msgHTML($content11);
	//$mail->AltBody = 'This is a plain-text message body';
	//$mail->addAttachment('images/phpmailer_mini.png');
	if (!$mail11->send()) {
		echo "Mailer Error: " . $mail11->ErrorInfo;
	} else {
		//echo "Message sent!";
	}
	
	$content12 = "
		<table>
			<tr>
				<th colspan='2'>New Inquiry</th>
			</tr>
			<tr>
				<td>Name:</td>
				<td>".$_POST['name']."</td>
			</tr>
			<tr>
				<td>Country:</td>
				<td>".$_POST['country_name']."</td>
			</tr>
			<tr>
				<td>City:</td>
				<td>".$_POST['city']."</td>
			</tr>
			<tr>
				<td>Dest.Port:</td>
				<td>".$_POST['dest_port']."</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>".$_POST['email']."</td>
			</tr>
			<tr>
				<td>Contact No:</td>
				<td>".$_POST['contact_no']."</td>
			</tr>
			<tr>
				<td>Address:</td>
				<td>".$_POST['address']."</td>
			</tr>
		</table>
	";

	require_once ("PHPMailer/PHPMailerAutoload.php");

	$mail12 = new PHPMailer();
	$mail12->setFrom('info@horizonvehicles.com', 'Horizon Vehicle');
	$mail12->addAddress('info@horizonvehicles.com', 'New Inquiry');
	$mail12->Subject = $_POST['name'];
	$mail12->msgHTML($content12);
	//$mail->AltBody = 'This is a plain-text message body';
	//$mail->addAttachment('images/phpmailer_mini.png');
	if (!$mail12->send()) {
		echo "Mailer Error: " . $mail12->ErrorInfo;
	} else {
		//echo "Message sent!";
	}
}
?>