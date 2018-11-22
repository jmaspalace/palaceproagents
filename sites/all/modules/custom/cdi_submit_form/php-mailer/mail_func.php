<?php
include("class.phpmailer.php");
function sendEmailFunction($from, $fromname, $to, $names, $subject, $body, $charset='utf-8', $attachment=""){
 	$mail = new PHPMailer();
    $mail->IsSMTP(); // telling the class to use SMTP
    //$mail->Host = "mail.ariadna.us"; // SMTP server
	//$mail->SMTPAuth = true;
    //$mail->Username = "envios@ariadna.com.co";
    //$mail->Password = "envio9685";
	$mail->Host = "localhost"; // SMTP server
	$mail->SMTPAuth = false;
	
	$mail->CharSet = $charset;

	$mail->From = $from;
	$mail->FromName = $fromname;
	$mail->Subject = $subject;
	$mail->MsgHTML($body);
	$mail->IsHTML(true);	
	if($attachment != ""){
		$mail->AddAttachment($attachment);
	}
	
	for($i=0;$i<count($to);$i++){
		$mail->AddAddress($to[$i],$names[$i]);
	}

	if (!$mail->Send())
	{
		return false;
	} else
	{
		return true;
	}
}


?>
