<!DOCTYPE>
<html>
<head>
<link href="css/elements.css" rel="stylesheet">
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
    font-size: 16px;
    background-color: #4CAF50;
}

/* Style The Dropdown Button */
li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 2px 2px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>

<script src="js/my_js.js"></script>

</head>
<?php 
session_start(); 

$user = $_SESSION['userName'];

?>
<body>

<link rel="stylesheet" href="corpus.css">

<?php if($user == 'admin') { ?>

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
<?php }  else {?>

<ul>
  <li><a href="home.php">Data Entry Home</a></li>
  <li><a href="corpus.php">Show Database</a></li>
   <li><a href="my_entries.php">My Entries</a></li>
  <li><a href="logout.php">Logout</a></li>  
</ul>
<?php } ?>
<br>
<div class = "center">

<?php



if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

include('db_con.php');
$results_per_page = 20;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
$start_from = ($page-1) * $results_per_page;
$user_name = $_SESSION["userName"];
echo "<strong> My Contribution </strong><br><br>";
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql_must="SET NAMES utf8";
$conn->query($sql_must);

$result = mysqli_query($conn,"SELECT * FROM e2b WHERE user_name = '$user_name' ORDER BY ID ASC LIMIT $start_from, $results_per_page ;");
$result2 = mysqli_query($conn,"SELECT * FROM e2b WHERE user_name = '$user_name' ;");

echo "<table border='1' align = 'center'>
<tr>
<th>Count</th>
<th>English</th>
<th>Bangla</th>
<th>User</th>
</tr>";
$total=$start_from+1;
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>".$total."</td>";
echo "<td>" . $row['english'] . "</td>";$english=$row['english'];
echo "<td>" . $row['bangla'] . "</td>";$bangla=$row['bangla'];
echo "<td>" . $row['user_name'] . "</td>";$id=$row['id'];
echo "<td><button id='popup' onclick=\"javascript:div_show('$user_name','$id','$english','$bangla')\">Edit</button></td>";
$id = $row['id'];
echo '<td><a href ="corpus/delete.php?id='.$id.'&user='.$user_name.'" onclick="return confirm(\'Are you sure?\')">Delete</a></td>';
echo "</tr>";
++$total;
}
echo "</table> <br>";
?>

<body id="body" style="overflow:hidden;">
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="" id="form" method="post" name="form">
<img id="close" src="images/3.png" onclick ="div_hide()">
<h2>Edit</h2>
<hr>
<p id ="id"></p>
<input id="english" name="english" placeholder="English Sentence" type="text">
<input id="bangla" name="bangla" placeholder="Bangla Sentence" type="text">
<br>
<a href="javascript:%20check_empty()" id="submit">Save</a>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>

<?php

$total=1;
while($row = mysqli_fetch_array($result2))
{
++$total;
}

$total_pages = ceil($total / $results_per_page);
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<button ><a href='my_entries.php?page=".$i."'>".$i."</a></button> "; 
}; 
mysqli_close($conn);
}
else header("Location: index.php");
?>
</div>
</body>

</html>