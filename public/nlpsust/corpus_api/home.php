<?php 
session_start();
$user = $_SESSION["userName"];
if ( $user == 'admin' && $_SESSION["logged_in"] == true) { 
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

</style>
  
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
</div>
  
</body>

</html>

<?php }
else if($_SESSION["logged_in"] == true){
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


</style>
  
<body>
<ul>
  <li><a href="home.php">Data Entry Home</a></li>
  <li><a href="corpus.php">Show Database</a></li>
  <li><a href="my_entries.php">My Entries</a></li>
  <li><a href="logout.php">Logout</a></li>
  <li style= "float:right"><a href='' ><?php echo "Hi  , ".$user ?></a></li>";  
</ul>
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
</div>
  
</body>

</html>
<?php
}
 else  {header("Location: index.php");} ?>

