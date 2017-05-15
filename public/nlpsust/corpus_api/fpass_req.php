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
//require_once("avail_check/dbcontroller.php");
//$db_handle = new DBController();



$user_name = "   ";
$pass_word = "   ";

include('db_con.php');

//if(!class_exists('PHPMailer')) {
    require('PHPMailer/class.phpmailer.php');
   require('PHPMailer/class.smtp.php');
//}

require_once("mail_configuration.php");

$mail = new PHPMailer();

$email=$_POST['email'];
//echo ".".$email.".";

$count = "SELECT COUNT(*) FROM user_details WHERE email_id='" . $email . "'";
  $result = mysql_query($count);
  //$row = mysql_fetch_row($result);
  $sql="SELECT * FROM user_details WHERE email_id='" . $email . "'";
  $result = $conn->query($sql);
  $user = $result->fetch_assoc();
  $user_count = mysqli_num_rows($result);
  //echo $user_count;
  if($user_count>0) {
   $emailBody = "<div>" . $user["user_name"] . ",<br><p>Click this link to change your password<br><a href='" . PROJECT_HOME . "/reset.php?reset_code=" . $user["token_code"] . "'>" . PROJECT_HOME . "/reset.php?reset_code=" . $user["token_code"] . "</a><br><br></p>Regards,<br> Admin.</div>";

   //echo $emailBody;
   $MessageTEXT = " ";
   $Send = SendMail( $email, $emailBody, $MessageTEXT );
die;

}

function SendMail( $ToEmail, $MessageHTML, $MessageTEXT ) {
  require_once ( 'PHPMailer/PHPMailerAutoload.php' ); // Add the path as appropriate
  $Mail = new PHPMailer();
  $Mail->IsSMTP(); // Use SMTP
  $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
  //$Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
  $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
  $Mail->SMTPSecure  = "tls"; //Secure conection
  $Mail->Port        = 587; // set the SMTP port
  $Mail->Username    = 'cse343project@gmail.com'; // SMTP account username
  $Mail->Password    = '134679258'; // SMTP account password
  $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  $Mail->CharSet     = 'UTF-8';
  $Mail->Encoding    = '8bit';
  $Mail->Subject     = 'Reset Your Password';
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
<font face='verdana' color='green'>Email with Password reset link has been sent . Check your inbox. <h3> <a href="index.php">Log In Here</button></a></h3>
 </font>
</div>
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

</body>
</html>

