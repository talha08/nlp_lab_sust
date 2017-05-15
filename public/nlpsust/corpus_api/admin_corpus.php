<?php session_start();
$user = $_SESSION["userName"];
if ($_SESSION["logged_in"] == true And $user =="admin") { ?>
<!DOCTYPE>
<html>
<head>
<style type="text/css">
html { overflow-y: scroll; }

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
<link href="css/elements.css" rel="stylesheet">
<script src="js/my_js.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
-->
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

<?php
include('db_con.php');
$results_per_page = 50;
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

$result = mysqli_query($conn,"SELECT english ,bangla, user_name,id,status FROM e2b ORDER BY ID ASC LIMIT $start_from, $results_per_page ;");

echo "<table border='1' align = 'center'>
<tr>
<th>Count</th>
<th>English</th>
<th>Bangla</th>
<th>User</th>
<th>Status</th>
</tr>";
$total=1;
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>".$total."</td>";
echo "<td>" . $row['english'] . "</td>";$english=$row['english'];
echo "<td>" . $row['bangla'] . "</td>";$bangla=$row['bangla'];
echo "<td>" . $row['user_name'] . "</td>";$id=$row['id'];
echo "<td>" . $row['status'] . "</td>";
echo "<td><button id='popup' onclick=\"javascript:div_show('$user_name','$id','$english','$bangla')\">Edit</button></td>";
$id = $row['id'];
echo '<td><a href ="corpus/delete.php?id='.$id.'&user='.$user_name.'onclick="return confirm(\'Are you sure?\')">Delete</a></td>';
echo "</tr>";
++$total;
}
echo "</table><br><br>";

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
<input value="admin_corpus" name="from" hidden>
<br>
<br>
<div class="form-group">
  <label for="sel1">Status:</label>
  <select name="status" class="form-control" id="status">
    <option  value="correct">Correct</option>
    <option value="incorrect">Incorrect</option>
  </select>
</div>
<br>
<br>
<a href="javascript:%20check_empty()" id="submit">Save</a>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>

<?php


$total_pages = ceil($total / $results_per_page);
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<button ><a href='admin_corpus.php?page=".$i."'>".$i."</a></button> "; 
}; 

mysqli_close($conn);
?>
</div>
 <br><br><br><br><br><br><br>
</body>

</html>

<?php }
 else {header("Location: home.php");} ?>

