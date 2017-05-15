<?php session_start();?>

<!DOCTYPE html>
<html>
<body>
<?php
session_unset();
session_destroy();
$user = $_SESSION["userName"];
echo " ".$user."<br>";

header("Location: index.php");
?>
</body>
</html>
