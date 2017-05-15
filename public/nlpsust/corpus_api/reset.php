<?php 

$token = $_GET["reset_code"];
//echo $token;
setcookie("token",$token,time() + (360), "/");
include('db_con.php');

$sql="SELECT * FROM user_details WHERE token_code='" . $token . "'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
$user_name = $user["user_name"];
//echo "<br><br>Hi  ".$user["user_name"] ." email : ". $user["email_id"];

?>

<!DOCTYPE>
<html>

<head>
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
.alert {
  width: 96%;
  text-align: center;
  font-size: 20
    padding: 20px;
    background-color: #f44336;
    color: white;
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
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
        document.getElementById('button').disabled = false ;
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        document.getElementById('button').disabled = true ;
    }
}  
</script>

<div class = "center">
<link rel="stylesheet" href="styles.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <h1> API for English-Bengali Bilingual Corpus <br> Enter New Password </h1>
</head>
<body>
<form action="new_pass.php" method = "post" accept-charset="utf-8">

  <input name="pass1" type="password" id="pass1" class="password_input"  placeholder="Enter Your Password" required=""><br>
  <input name="pass2" type="password" id="pass2" class="password_input" placeholder="Confirm Your Password" required="" onkeyup="checkPass(); return false;"><br>
            <span id="confirmMessage" class="confirmMessage"></span>
  <br>
 <button type ="submit" id="button" class ="button button1 " >Reset Password</button><br><br>
 
</form>

</div>


</body>

</html>
