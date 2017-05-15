<?php
require_once("dbcontroller.php");
$db_handle = new DBController();


if(!empty($_POST["email"])) {
  $result = mysql_query("SELECT count(*) FROM user_details WHERE email_id='" . $_POST["email"] . "'");
  $row = mysql_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='mail-status'> E-mail already exists.</span>";
  }else{
  }
}
?>