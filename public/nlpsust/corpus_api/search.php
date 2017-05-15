<?php
error_reporting(0);
session_start();
$user_name = $_SESSION["userName"];

session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
?>

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
    font-size: 16px;
    background-color: #4CAF50;
}

#abc {
width:100%;
height:100%;
opacity:.95;
top:0;
left:0;
display:none;
position:fixed;
background-color:#313131;
overflow:auto
}
img#close {
position:absolute;
right:-14px;
top:-14px;
cursor:pointer
}
div#popupContact {
position:absolute;
left:50%;
top:17%;
margin-left:-202px;
font-family:'Raleway',sans-serif
}
form {
max-width:300px;
min-width:250px;
padding:10px 50px;
font-family:raleway;
background-color:#fff
}
p {
margin-top:30px
}
h2 {
background-color:#FEFFED;
padding:20px 35px;
margin:-10px -50px;
text-align:center;
border-radius:10px 10px 0 0
}
hr {
margin:10px -50px;
border:0;
border-top:1px solid #ccc
}
input[type=text] {
width:82%;
padding:10px;
margin-top:30px;
border:1px solid #ccc;
padding-left:40px;
font-size:16px;
font-family:raleway
}
#english {
background-repeat:no-repeat;
background-position:5px 7px
}
#bangla {
background-repeat:no-repeat;
background-position:5px 7px
}

#submit {
text-decoration:none;
width:100%;
text-align:center;
display:block;
background-color: #4CAF50; /* Green */
color:#fff;
border: none;
padding:10px 0;
font-size:20px;
cursor:pointer;
border-radius:5px
}
span {
color:red;
font-weight:700
}
button {
  background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 12px 24px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}

button:hover {
  font-size: 16px;
  padding: 12px 24px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

</style>

<script src="js/my_js.js"></script>
</head>

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
<div class="center">
<form action="search.php" method = "get" accept-charset="utf-8">
  <input type="text" name="key"><br>
  Search Type:
  <select name=searchtype>
  <option value=english>English Sentence</option>
  <option value=bangla>বাংলা Sentence</option>
  <option value=user>Search User </option>
</select>
<button type ="submit" class ="button button1 " >Search</button></h3>
</form>

<?php
include('db_con.php');
$key = $_GET["key"];
$type = $_GET["searchtype"];

$results_per_page = 20;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
$start_from = ($page-1) * $results_per_page;
$total = $start_from +1;
if($type == "english") {
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql_must="SET NAMES utf8";
$conn->query($sql_must);

$result = mysqli_query($conn,"SELECT * FROM `e2b` WHERE english LIKE '%".$key."%' ORDER BY id ASC LIMIT $start_from, $results_per_page;");



echo "<table border='1' align = 'center'>
<tr>
<th>count</th>
<th>English</th>
<th>Bangla</th>
<th>User</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $total ."</td>";
echo "<td>" . $row['english'] . "</td>";$english=$row['english'];
echo "<td>" . $row['bangla'] . "</td>";$bangla=$row['bangla'];
echo "<td>" . $row['user_name'] . "</td>";$id=$row['id'];
echo "<td><button id='popup' onclick=\"javascript:div_show('$user_name','$id','$english','$bangla')\">Edit</button></td>";
$id = $row['id'];
echo '<td><a href ="corpus/delete.php?id='.$id.'&user='.$user_name.'&from=search" onclick="return confirm(\'Are you sure?\')">Delete</a></td>';
echo "</tr>";
++$total;
}

$result2 = mysqli_query($conn,"SELECT * FROM `e2b` WHERE english LIKE '%".$key."%' ;");

$total=1;
while($row = mysqli_fetch_array($result2))
{
++$total;
}

echo "</table><br><br>";

$total_pages = ceil($total / $results_per_page);
for ($i=1; $i<=$total_pages; $i++) { 
    echo "  <button ><a href='search.php?key=".$key."&searchtype=english&page=".$i."'>".$i."</a> </button>   "; 
}; 

mysqli_close($conn);
}
else if($type=="bangla"){

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql_must="SET NAMES utf8";
$conn->query($sql_must);

$result = mysqli_query($conn,"SELECT * FROM `e2b` WHERE bangla LIKE '%".$key."%'ORDER BY id ASC LIMIT $start_from, $results_per_page;");

echo "<table border='1' align = 'center'>
<tr>
<th>count</th>
<th>Bangla</th>
<th>English</th>
<th>User</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $total ."</td>";
++$total;
echo "<td>" . $row['bangla'] . "</td>";
echo "<td>" . $row['english'] . "</td>";
echo "<td>" . $row['user_name'] . "</td>";
echo "<td><button id='popup' onclick=\"javascript:div_show('$user_name','$id','$english','$bangla')\">Edit</button></td>";
$id = $row['id'];
echo '<td><a href ="corpus/delete.php?id='.$id.'&user='.$user_name.'onclick="return confirm(\'Are you sure?\')">Delete</a></td>';
echo "</tr>";
}
echo "</table><br><br>";

$result2 = mysqli_query($conn,"SELECT * FROM `e2b` WHERE bangla LIKE '%".$key."%';");

$total=1;
while($row = mysqli_fetch_array($result2))
{
++$total;
}

$total_pages = ceil($total / $results_per_page);
for ($i=1; $i<=$total_pages; $i++) { 
    echo "  <button ><a href='search.php?key=".$key."&searchtype=english&page=".$i."'>".$i."</a> </button>   "; 
}; 

mysqli_close($conn);

}
else if($type == "user"){
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql_must="SET NAMES utf8";
$conn->query($sql_must);

$result = mysqli_query($conn,"SELECT * FROM `e2b` WHERE user_name LIKE '%".$key."%' ORDER BY user_name ASC LIMIT $start_from, $results_per_page;");

echo "<table border='1' align = 'center'>
<tr>
<th>count</th>
<th>User</th>
<th>Bangla</th>
<th>English</th>
</tr>";


while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $total ."</td>";
++$total;
echo "<td>" . $row['user_name'] . "</td>";
echo "<td>" . $row['bangla'] . "</td>";
echo "<td>" . $row['english'] . "</td>";
echo "<td><button id='popup' onclick=\"javascript:div_show('$user_name','$id','$english','$bangla')\">Edit</button></td>";
$id = $row['id'];
echo '<td><a href ="corpus/delete.php?id='.$id.'&user='.$user_name.'onclick="return confirm(\'Are you sure?\')">Delete</a></td>';
echo "</tr>";
}
echo "</table><br><br>";

$result2 = mysqli_query($conn,"SELECT * FROM `e2b` WHERE user_name LIKE '%".$key."%';");

$total=1;
while($row = mysqli_fetch_array($result2))
{
++$total;
}

$total_pages = ceil($total / $results_per_page);
for ($i=1; $i<=$total_pages; $i++) { 
    echo "  <button ><a href='search.php?key=".$key."&searchtype=english&page=".$i."'>".$i."</a> </button>   "; 
}; 

mysqli_close($conn);

}


?>

</div>
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
<input value="search" name="from" hidden>
<input value="<?php echo $type; ?>" name="stype" hidden>
<input value="<?php echo $page;?>" name="page" hidden>
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
</body>

</html>

<?php } ?>