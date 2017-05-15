<?php
include('db_con.php');

$name = $_POST["name"];
$user_name = $_POST["username"];
$email = $_POST["email"];
$pass_word = md5($_POST["password1"]);
$code=md5(uniqid(rand()));

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//echo " name = ".$name." <br> username = ".$user_name."<br>password = ".$pass_word." <br> code = ". $code;

setcookie("email",$email,time()+(25),"/");
setcookie("token",$code,time()+(25),"/");
setcookie("name",$name,time()+(25),"/");


$sql = "INSERT INTO `user_details` (`name`,`user_name`, `password`, `email_id`,`token_code`) VALUES ('$name','$user_name', '$pass_word', '$email','$code');";

$conn->query($sql);


header("Location:veri_email.php");
die();

?>