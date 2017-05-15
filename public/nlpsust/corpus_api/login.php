<?php 
error_reporting(0);
session_start();
if($_SESSION["logged_in"] === true)
{
  header("Location:home.php");
}
?>

<!DOCTYPE>
<html>

<head>
	<title>API for English-Bengali Bilingual Corpus</title>
<style>
	/* unvisited link */
a:link {
    color: #32CD32;
}

/* visited link */
a:visited {
    color: #006400;
}

/* mouse over link */
a:hover {
    color: #7CFC00;
}

/* selected link */
a:active {
    color: #ADFF2F;
}

.alert {
	padding: 20px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 7px;
    position: relative;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    align-content: center;
}

.closebtn:hover {
    color: black;
}


</style>
<div class = "center">
<link rel="stylesheet" href="styles.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <h1> Login for <br>API for English-Bengali Bilingual Corpus</h1>
</head>
<body>
<form action="login.php" method = "post" accept-charset="utf-8">

  <input class="text_input" type="text" name="username" value="" placeholder="Username" required><br>
  <br>
  <input class="password_input" type="password" name="password" value="" placeholder="Password" required /> 
  <br>
 
 <button type ="submit" class ="button button1 " >Log In</button><br><br>
 <font style="font-size: 12"><a href="fpass.php" > Forgot Password </a> </font>
</form>

<br><font face="verdana" color="green">
<a href="signup.html"> Create Account </a><br>
</font>
</div>


</body>



<?php
error_reporting(0);
include('db_con.php');

$user_name=" ";
$pass_word=" ";

	$user_name = $_POST["username"];
	$pass_word = md5($_POST["password"]);

//echo $user_name ."<br>".$pass_word;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM `user_details` where user_name = '".$user_name."' and password = '".$pass_word."';";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

//echo $row["user_name"] ."<br>".$row["password"];
	if($row['user_name']=='admin'){
		session_start();
		$_SESSION["userName"] = $user_name; // it will store the user name in global vairable $_SESSION["userName"]
		$_SESSION["logged_in"] = true; 
	header("Location: admin_home.php");		
	}
	else if($row['user_name']==$user_name ) {
		if($row['status']=='Y'){
		session_start();
		$_SESSION["userName"] = $user_name; // it will store the user name in global vairable $_SESSION["userName"]
		$_SESSION["logged_in"] = true; 
	header("Location: home.php");
}
	else if($row['status']=='N'){
		?>
	<div class="alert" >
	  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
	  <strong>Please check you email and verify your account!!</strong>
	</div>
	<?php }
}
	else {
		
		?>
		<div class="alert" >
  		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  		<strong>Incorrect Login details</strong>
</div>
		<?php
	}

die();
?>

</html>
