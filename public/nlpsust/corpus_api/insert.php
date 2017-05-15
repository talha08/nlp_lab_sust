<?php 
error_reporting(0);
session_start();
$user = $_SESSION['userName'];
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

include('db_con.php');

if(isset($_POST["english"])||isset($_POST["bangla"])){
$eng = $_POST["english"];
$ban = $_POST["bangla"];
$user = $_SESSION["userName"];

// Create connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo " ". $eng . "<br>" . " ". $ban ."<br>" ;
$sql_must="SET NAMES utf8";
$conn->query($sql_must);

$sql_eng="SELECT `bangla` FROM `e2b` WHERE `english`='$eng';" ;

$result_array = array();
$result = $conn->query($sql_eng);

$sql = "INSERT INTO `e2b` (`id`, `bangla`, `english`,`user_name`) VALUES (NULL, '$ban', '$eng', '$user');";

while ($row = $result->fetch_assoc()){
	if( $ban != $row['bangla']){
		
	if ($conn->query($sql) === TRUE) {
    $msg = "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
	}
	else $msg = "Entry already exits ";
}

if ($result -> num_rows ==0 and $conn->query($sql) === TRUE){
	$msg = "New record created successfully";
}
$conn->close();

}
else {}

// Check connection

}
else header("Location: index.php");

?>


<!DOCTYPE>
<html>


<head>

<style type="text/css">
p.one {
  font-color: blue;
  text-align: center;
  font-size: 20pt;
  background-color: lightblue;
    border-style: solid ;
    vertical-align: center;
    border-color: blue;
    border-width: 2px  ;
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

.alert {
  padding: 20px;
    background-color: ; /* Red */
    color: white;
    margin-bottom: 7px;
    position: relative;
}


.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    align-content: center;
}

.closebtn:hover {
    color: black;
}


</style>
<link rel="stylesheet" href="styles.css">
  </head>
<body>
<?php if($user == 'admin'){ ?>

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
  <li style= "float:right" > <a>Admin</a></li>  
</ul>


<?php } else {?>
<ul>
  <li><a href="home.php">Data Entry Home</a></li>
  <li><a href="corpus.php">Show Database</a></li>
  <li><a href="my_entries.php">My Entries</a></li>
  <li><a href="logout.php">Logout</a></li>
  <li style= "float:right"><a href='' ><?php echo "Hi  , ".$user ?></a></li>";  
</ul>
<?php } ?>
<br>
<?php if($msg != NULL and $msg =="New record created successfully") { ?>
<div class="alert" style="background-color: #228B22" >
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong> <?php echo $msg ?> </strong>
  </div>
  <?php } else if ( $msg != NULL ) {?>
  <div class="alert" style="background-color: #ff8000" >
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong> <?php echo $msg ?> </strong>
  </div>
 <?php } ?>
<br>
<br>

<div class = "center">
<link rel="stylesheet" href="styles.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <h1>API for English-Bengali Bilingual Corpus</h1>
</head>
<form action="insert.php" method = "post" accept-charset="utf-8">
<h1>
  English Sentence:<br>
  <input class="text_input" type="text" name="english" required><br>
  Bangla Sentence:<br>
  <input class="text_input" type="text" name="bangla" required><br>
  </h1>
 <h3> <button type ="submit" class ="button button1 " >Submit</button></h3>
</form>
<a href="corpus.php"> Show Corpus </a> <br>
</div>

</body>

</html>
