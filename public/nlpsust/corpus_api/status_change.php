<?php
session_start();
$user = $_SESSION['userName'];
if ($_SESSION["logged_in"] == true And $user =="admin") {
require_once("db_con.php");

$status = $_POST['status'] ;
$id = $_POST['id'];

echo $status . " id :  " .$id . "<br>";

$sql= "UPDATE e2b SET status = '$status' WHERE id=$id;";
$result = $conn->query($sql);
echo "edit successful.";

header("Location: data_check.php");


}
else {
header("Location: index.php");	
}
?>