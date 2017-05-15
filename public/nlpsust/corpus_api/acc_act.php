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
$token = $_GET["activation_code"];
//echo $token ; 
if(isset($token)){
		include('db_con.php');
		$sql = "UPDATE `id704181_corpus`.`user_details` SET `status` = 'Y' WHERE `user_details`.`token_code` = '" . $token . "'";
		$result = mysqli_query($conn,$sql);
		$success_message = "Password is reset successfully.";?>
	<div class="error">
<font face='verdana' color='green'>Your account has been activated successfully.<a href="login.php">login </a> here.<br></font></div>		
	<?php 
	header("refresh:10 , url:login.php");
}
	else {
		?>
		 <div class="error">
<font face='verdana' color='green'>"Sorry wrong activation_code. Check your email again.<br></font></div>
	
	<?php }
?>
