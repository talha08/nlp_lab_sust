<!DOCTYPE html>
<html>
<head>
<style>
.center {
    text-align: center;
    border: 3px solid red;
}
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
</head>

<?php
error_reporting(0);
session_start();



$id=$_GET["id"];
$user_name=$_GET["user"];
$user=$_SESSION['userName'];
$from=$_GET['from'];
/*$page=$_GET['page'];
$key=$_GET['key'];
$stype=$_GET['stype'];*/
if(isset($user_name)||isset($id)){

	if($_SESSION["userName"]==$user_name || $user == 'admin'){
		//echo $user_name;
include('../db_con.php');
$sql_must="SET NAMES utf8";
$conn->query($sql_must);
$sql= "DELETE FROM e2b WHERE id=$id;";
$result = $conn->query($sql);
echo "delete successful.";

if ($user_name=='admin'){
	if($from == 'search'){
	header("Location: ../admin_home.php");
	} else header("Location: ../admin_corpus.php");
}
else  {
header("Location: ../my_entries.php");
}
	}
	//echo  $bangla."  ".$english ;
else {
	echo "<div class='center'>
 <font face='verdana' color='green'><strong><br>Error.Your should not be here . <br> <br><a href='../home.php'>home</a></strong></font><br> <br>
</div>";
}

}
else{
	echo "<div class='center'>
 <font face='verdana' color='green'><strong><br>Error.Something wrong with your submitted input  or your login .<br> <br><a href='../home.php'>home</a></strong></font><br> <br>
</div>";
	
}
?>
</html>