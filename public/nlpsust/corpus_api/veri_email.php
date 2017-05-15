<!DOCTYPE html>
<html>
<head>
<style>
.center {
    text-align: center;
    border: 3px solid green;
}
.error {
    text-align: center;
    border: 3px solid red;
}
</style>
</head>
<body>

<?php

$name=$_COOKIE["name"];
$token=$_COOKIE["token"];
$email=$_COOKIE["email"];

if(!class_exists('PHPMailer')) {
    require('PHPMailer/class.phpmailer.php');
	require('PHPMailer/class.smtp.php');
}

require_once("mail_configuration.php");

$mail = new PHPMailer();

$emailBody = "<div>" . $name . ",<br>Welcome . Your account has been created <br><br><p>Click this link to verify your email and activate your account<br><a href='" . PROJECT_HOME . "/acc_act.php?activation_code=" . $token . "'>" . PROJECT_HOME . "/acc_act.php?activation_code=" . $token . "</a><br><br></p>Regards,<br> Admin.</div>";
$MessageTEXT = " ";
$Send = SendMail( $email, $emailBody, $MessageTEXT );

function SendMail( $ToEmail, $MessageHTML, $MessageTEXT ) {
  require_once ( 'PHPMailer/PHPMailerAutoload.php' ); // Add the path as appropriate
  $Mail = new PHPMailer();
  $Mail->IsSMTP(); // Use SMTP
  $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
 // $Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
  $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
  $Mail->SMTPSecure  = "tls"; //Secure conection
  $Mail->Port        = 587; // set the SMTP port
  $Mail->Username    = 'cse343project@gmail.com'; // SMTP account username
  $Mail->Password    = '134679258'; // SMTP account password
  $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  $Mail->CharSet     = 'UTF-8';
  $Mail->Encoding    = '8bit';
  $Mail->Subject     = 'Account Activation';
  $Mail->ContentType = 'text/html; charset=utf-8\r\n';
  $Mail->From        = 'admin@admin.com';
  $Mail->FromName    = 'Admin';
  $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

  $Mail->AddAddress( $ToEmail ); // To:
  $Mail->isHTML( TRUE );
  $Mail->Body    = $MessageHTML;
  $Mail->AltBody = $MessageTEXT;
  $Mail->smtpConnect([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);
  $email = $Mail->Send();
  if($email){
    ?>
    <div class="center">
<font face='verdana' color='green'>Your account has been created successfully and verification link has been sent to your email. Please verify your email and <a href='index.php'>login</a></font>
  <?php
  }
  elseif(!$email){
?>
  <div class="center">
<font face='verdana' color='red'>Error Email has not been sent <h3> <a href="index.php">Home</button></a></h3>
 </font>
</div>
<?php
  }
  $Mail->SmtpClose();

}

?>
