<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require('../inc/conn.php');
require('../inc/function.php');
require('phpmail/PHPMailerAutoload.php');

#date_default_timezone_set('Asia/Bangkok');


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
$mail->Password = "!Bom8atom";

//Set who the message is to be sent from
$mail->setFrom('atom.atom168@gmail.com', 'LOTZX  Auto mail');

//Set an alternative reply-to address
//$mail->addReplyTo('b-sticker@outlook.co.th', 'First Last2');

//Set who the message is to be sent to
$mail->addAddress($to_email, 'บ่อน');
$mail->addAddress('dkub8899@gmail.com', 'ดีครับ');


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
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
	

}




$to_email = "kanhasee@gmail.com";
$subject = "หวยวันที่ ".date("d-m-Y",$time_stam)."  รอบ 1 เวลา ".date("H:i",$time_stam)."";

$body_html="ข้อมูลถูกส่งอัติโนมัติ "._cvf($time_stam, 6).".";

$body_html2= file_get_contents('http://sa.lotzx.com/Page/1_hun/print_bill_cut2.php?d=29-03-2016&tcut1=&tcut2=&tcut3=&tcut4=0&tcut5=0&tcut6=0&tcut7=0&tcut8=0&tcut9=0&tcut10=&tcut11=0&tcut12=0&tcut13=&tcut14=&tcut15=&tcut16=&tcut17=&tcut18=&tcut19=&tcut20=&tcut21=0&tcut22=0&tcut23=&tcut24=&mcut=1&namecut=1&zone=1&rob=2&set=1&asc=');

for($x=1;$x<=1;$x++){
$body_html.=$body_html2;
}
scriptdd_sendmail($to_email,$subject,$body_html);
?>