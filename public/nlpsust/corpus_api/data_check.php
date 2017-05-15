<?php session_start();
$user = $_SESSION["userName"];
if ($_SESSION["logged_in"] == true And $user =="admin") { ?>
<!DOCTYPE>
<html>
<head>
<style type="text/css">

html { overflow-y: scroll; }

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    background-color: #98FB98; 
    width: 90%;
}



td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 4px;
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
    font-size: 16px;
    background-color: #4CAF50;
}

.center{
  margin: auto;
    width: 60%;
    border: 2px solid green;
    padding: 10px;
    text-align: center;
    border-radius: 1px;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 12px 24px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {background-color: #f44336;} /* Red */ 

</style>
<script type="text/javascript">
  function status() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "avail_check/status.php",
  data:'email='+$("#email").val(),
  type: "POST",
  success:function(data){
    $("#email-availability-status").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}

</script>
<script src="js/my_js.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
-->
</head>

<body>
<ul>
  <li><a href="admin_home.php">Admin Home</a></li>
  <li><a href="home.php">Data Entry</a></li>
  <li><a href="admin_corpus.php">Show Corpus</a></li>
  <li><a href="my_entries.php">My Entries</a></li>
  <li><a href="data_check.php">Check Entries</a></li>
  <li><a href="corpus_correction.php">Corpus Correction</a></li>
  <li><a href="admin_statistics.php">Show Statistics</a></li>
  <li><a href="user.php">User Database</a></li>
  <li><a href="logout.php">Logout</a></li>
  <li style= "float:right" >    <a>Admin</a>
  </li>  
</ul>
<br>
<div class = "center">

<?php
include('db_con.php');

$results_per_page = 20;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
$start_from = ($page-1) * $results_per_page;
$user_name = $_SESSION["userName"];
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql_must="SET NAMES utf8";
$conn->query($sql_must);

$result = mysqli_query($conn,"SELECT english ,bangla, user_name,id FROM e2b where status = 'unchecked' ORDER BY ID ASC LIMIT $start_from, $results_per_page ;");

echo "<h2>Unchecked Entries</h2>";

echo "<table border='1' align = 'center'>
<tr>
<th>Count</th>
<th>English</th>
<th>Bangla</th>
<th>User</th>
</tr>";
$total=$start_from + 1;
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>".$total."</td>";
echo "<td>" . $row['english'] . "</td>";$english=$row['english'];
echo "<td>" . $row['bangla'] . "</td>";$bangla=$row['bangla'];
echo "<td>" . $row['user_name'] . "</td>";$id=$row['id'];
echo "<td><form action='status_change.php' method ='post'><input name='id' value='$id' hidden /> <input name='status' value='correct' hidden /> <button class='button' type='submit' >Correct</button> </form></td>";
echo "<td><form action='status_change.php' method ='post'><input name='id' value='$id' hidden /> <input name='status' value='incorrect' hidden /> <button class='button button2' type = 'submit'>Incorrect</button></form></td>";

$id = $row['id'];
echo "</tr>";
++$total;
}
echo "</table><br><br>";

?>

<?php


$result2 = mysqli_query($conn,"SELECT english ,bangla, user_name,id FROM e2b where status = 'unchecked' ;");
$total=1;
while($row = mysqli_fetch_array($result2))
{
++$total;
}

$total_pages = ceil($total / $results_per_page);
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<button class='button' ><a href='data_check.php?page=".$i."'>".$i."</a></button> "; 
}; 

mysqli_close($conn);
?>
</div>
 <br><br><br><br><br><br><br>
</body>

</html>

<?php }
 else {header("Location: home.php");} ?>

