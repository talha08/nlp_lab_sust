<?php session_start();
$user = $_SESSION["userName"];
if ($_SESSION["logged_in"] == true And $user =="admin") { ?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="styles.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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

</style>

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
  <li style= "float:right" > <a>Admin</a></li>  
</ul>
<br>

<div class = "center">

<h1>Search</h1>
<form action="search.php" method = "get" accept-charset="utf-8">
<h1>
  Key:
  <input type="text" name="key">
  <br>
  
  <center>Search Type:
  <select name=searchtype>
  <option value=english>English Sentence</option>
  <option value=bangla>বাংলা Sentence</option>
  <option value=user>Search User </option>
</select>
</center>
<br>
  </h1>
 <h3> <button type ="submit" class ="button button1 " >Search</button></h3>
</form>
</div>
	
</body>

</html>

<?php }
 else {header("Location: home.php");} ?>

