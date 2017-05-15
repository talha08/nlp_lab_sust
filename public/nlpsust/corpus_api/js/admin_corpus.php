<?php session_start();
$user = $_SESSION["userName"];
if ($_SESSION["logged_in"] == true And $user =="admin") { ?>
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
  <li><a href="user.php">User Database</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<br>
<div class = "center">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id704181_corpus";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql_must="SET NAMES utf8";
$conn->query($sql_must);

$result = mysqli_query($conn,"SELECT english ,bangla, user_name FROM e2b;");

echo "<table border='1' align = 'center'>
<tr>
<th>English</th>
<th>Bangla</th>
<th>User</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['english'] . "</td>";
echo "<td>" . $row['bangla'] . "</td>";
echo "<td>" . $row['user_name'] . "</td>";
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

