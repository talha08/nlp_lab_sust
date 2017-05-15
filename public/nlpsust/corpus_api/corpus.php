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
<link href="css/elements.css" rel="stylesheet">
<script src="js/my_js.js"></script>
<body>
<link rel="stylesheet" href="corpus.css">
<ul>
  <li><a href="home.php">Data Entry Home</a></li>
  <li><a href="corpus.php">Show Database</a></li>
   <li><a href="my_entries.php">My Entries</a></li>
  <li><a href="logout.php">Logout</a></li>  
</ul>
<br>
<div class = "center">

<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

include('db_con.php');

$results_per_page = 20;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
$start_from = ($page-1) * $results_per_page;

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql_must="SET NAMES utf8";
$conn->query($sql_must);

$result = mysqli_query($conn,"SELECT english ,bangla, user_name FROM e2b ORDER BY ID ASC LIMIT $start_from, $results_per_page;");

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
echo "<td>" . $row['english'] . "</td>";
echo "<td>" . $row['bangla'] . "</td>";
echo "<td>" . $row['user_name'] . "</td>";
echo "</tr>";
++$total;
}
echo "</table> <br><br>";


$result2 = mysqli_query($conn,"SELECT english ,bangla, user_name FROM e2b ;");


$total=1;
while($row = mysqli_fetch_array($result2))
{
++$total;
}

$total_pages = ceil($total / $results_per_page);
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<button ><a href='corpus.php?page=".$i."'>".$i."</a></button> "; 
}; 

mysqli_close($conn);
}
else header("Location: index.php");
?>
</div>
</body>

</html>