<?php session_start();
$user = $_SESSION["userName"];
if ($_SESSION["logged_in"] == true && $user =="admin") { ?>
<!DOCTYPE>
<html>
<head>
<style type="text/css">
	
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


</style>
</head>

<body>
<link rel="stylesheet" href="corpus.css">
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
<strong>User list</strong><br><br>
<?php
include('db_con.php');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql_must="SET NAMES utf8";
$conn->query($sql_must);

$result = mysqli_query($conn,"SELECT * FROM user_details;");

echo "<table border='1' align = 'center'>
<tr>
<th>User ID</th>
<th>Username</th>
<th>Password</th>
<th>E-mail</th>
<th>Account Active</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['user_id'] . "</td>";
echo "<td>" . $row['user_name'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
echo "<td>" . $row['email_id'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</div>
</body>

</html>

<?php }
 else {header("Location: home.php");} ?>