<?php
function scriptdd_sendmail($to_email,$subject,$body_html) {
	
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();
$mail->CharSet = "utf-8";
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "atom.atom168@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "963214785";

//Set who the message is to be sent from
$mail->setFrom('atom.atom168@gmail.com', 'OHOBET  Auto mail');

//Set an alternative reply-to address
//$mail->addReplyTo('b-sticker@outlook.co.th', 'First Last2');

//Set who the message is to be sent to
#$mail->addAddress($to_email, 'บ่อน');
$mail->addAddress('kanhasee@gmail.com', 'บอม');
$mail->addAddress('kingpoipet@gmail.com', 'บ่อน หวยหุ้น');


//Set the subject line
#$mail->Subject = 'ทดสอบส่งอีเมล์แบบ ว้าว ว้าว ว้าว';
$mail->Subject = $subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
#$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->msgHTML($body_html);

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
#$mail->addAttachment('images/phpmailer_mini.png');
$mail->addAttachment('../create_pdf/OHO.pdf');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
	

}

?>