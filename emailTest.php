<?php
require( 'PHPMailer/src/PHPMailer.php' );
require( 'PHPMailer/src/Exception.php' );
require( 'PHPMailer/src/SMTP.php' );

$mail = new PHPMailer\PHPMailer\PHPMailer;
$email = "lcscnoreply2@gmail.com";
$name = "noreply";

if(!$mail->validateAddress($email)){
  echo 'Invalid Email Address';
  exit;
}

//Creating the email body to be sent
$email_body = "Hello World";

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = "lcscnoreply2@gmail.com";
$mail->Password = "P@ssw0rd`";
$mail->SMTPSecure = "tls";

//Sending the actual email
$mail->setFrom($email, $name);
$mail->addAddress('mbmendenhall@lcmail.lcsc.edu');     // Add a recipient
$mail->isHTML(false);                                  // Set email format to HTML
$mail->Subject = 'Calculation form results from ' . $email;
$mail->Body = $email_body;

if(!$mail->send()) {
  echo 'Message could not be sent. ';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  exit;
  }
?>
