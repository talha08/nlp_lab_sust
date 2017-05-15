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
<style >


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

</style>

<div class = "center">
<link rel="stylesheet" href="styles.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <h1> Login for <br>API for English-Bengali Bilingual Corpus</h1>
</head>
<body>
<form action="login.php" method = "post" accept-charset="utf-8">

  <input class="text_input" type="text" value="" name="username" placeholder="Username" required><br>
  <br>
  <input class="password_input" type="password" value="" name="password" placeholder="Password" required/> 
  <br>
 
 <button type ="submit" class ="button button1 " >Log In</button><br><br>
 <font style="font-size: 12"><a href="fpass.php" > Forgot Password </a> </font>
</form>

<br><font face="verdana" color="green">
<a href="signup.html"> Create Account </a><br>
</font>
</div>


</body>

</html>
