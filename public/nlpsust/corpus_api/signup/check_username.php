<?php
require_once("dbcontroller.php");
$db_handle = new DBController();


if(!empty($_POST["username"])) {
  $result = mysql_query("SELECT count(*) FROM user_details WHERE user_name='" . $_POST["username"] . "'");
  $row = mysql_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='user-not-available'> username not available</span>";
  }else{
      echo "<span class='user-available'> username ok.</span>";
  }
}
?>