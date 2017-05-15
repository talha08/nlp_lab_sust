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

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #111;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    font-size: 24px;
    background-color: #4CAF50;
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

<?php
error_reporting(0);
session_start();

if($_SESSION['userName']=='admin'){
echo '<ul>
  <li><a href="../admin_home.php">Admin Home</a></li>
  <li><a href="../home.php">Data Entry</a></li>
  <li><a href="../admin_corpus.php">Show Corpus</a></li>
  <li><a href="../my_entries.php">My Entries</a></li>
  <li><a href="../user.php">User Database</a></li>
  <li><a href="../logout.php">Logout</a></li>  
</ul>';


$status = $_POST['status'];


}
elseif ($_SESSION['userName']!='admin' and $_SESSION['userName']!='') {
  echo '<ul>
  <li><a href="../home.php">Data Entry Home</a></li>
  <li><a href="../corpus.php">Show Database</a></li>
   <li><a href="../my_entries.php">My Entries</a></li>
  <li><a href="../logout.php">Logout</a></li>  
</ul>';
}

$id=$_GET["id"];
$user_name=$_GET["user"];
$bangla = $_POST["bangla"];
$english = $_POST["english"];
if(isset($_SESSION["userName"]) and isset($bangla) and isset($english)){
if($_SESSION["userName"]==$user_name){
    echo $user_name;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id704181_corpus";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql_must="SET NAMES utf8";
$conn->query($sql_must);
if($_SESSION['userName']=='admin'){
$sql= "UPDATE e2b SET bangla = '$bangla' , english = '$english' , status = '$status' WHERE id=$id;";
}
else {
$sql= "UPDATE e2b SET bangla = '$bangla' , english = '$english' WHERE id=$id;";
}
$result = $conn->query($sql);
echo "edit successful.";
if ($user_name=='admin'){
  header("Location: ../admin_corpus.php");
}
else  {
header("Location: ../my_entries.php");
}
  }
  //echo  $bangla."  ".$english ;



}
else{
  echo "<div class='center'>
 <font face='verdana' color='green'><strong><br>Error.Something wrong with your submitted input  or your login .<br> <br><a href='../home.php'>home</a></strong></font><br> <br>
</div>";
  
}


?>