<!DOCTYPE html>
<html>
<head>
<style>
.center {
    text-align: center;
    border: 3px solid green;
}
</style>
</head>
<body>

<?php 
if(!isset($_COOKIE["token"])) {
    echo "Cookie Expired!!! Go back and try again<br><br>";
} else {
    $token = $_COOKIE["token"];
 //   echo $token;
    $pass_word = $_POST["pass2"];
 //   echo "<br>".$pass_word;

include('db_con.php');

$sql= "UPDATE `id704181_corpus`.`user_details` SET `password` = '" . md5($pass_word). "' WHERE `user_details`.`token_code` = '" . $token . "'";
$result = $conn->query($sql);
 ?>
<div class="center">
 <font face='verdana' color='green'>Your password has been changed .</font><br> <br>
</div>
<?php
 header("refresh:5 ; url=index.php");

}
?>

</body>
</html>