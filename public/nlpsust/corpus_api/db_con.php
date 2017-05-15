<?php
$servername = "localhost";
$username = "root";
$password = "intranet#255";
$dbname = "id704181_corpus";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




?>