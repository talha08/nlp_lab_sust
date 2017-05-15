<?php session_start();
$user = $_SESSION["userName"];
if ($_SESSION["logged_in"] == true And $user =="admin") { 

//connect to DB  
include('db_con.php');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Statistics</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    font-size: 24px;
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
  <li style= "float:right" >    <a>Admin</a>
  </li>  
</ul>
<br>


<?php
  $total_user_count_result = mysqli_query($conn, "SELECT count(*) from `user_details`");
  $total_user_count = mysqli_fetch_row($total_user_count_result);
  
  $total_corpus_count_result = mysqli_query($conn, "SELECT count(*) from `e2b`");
  $total_corpus_count = mysqli_fetch_row($total_corpus_count_result);
  
    $monthly_corpus_count_result = mysqli_query($conn, "SELECT COUNT(*) FROM `e2b` where month(`insert_date`) = month(CURDATE()) AND year(`insert_date`) = year(CURDATE())");
    $monthly_corpus_count = mysqli_fetch_row($monthly_corpus_count_result);
  
    $correct = mysqli_query($conn, "SELECT COUNT(*) FROM `e2b` where status = 'correct'") ;
    $correct_count = mysqli_fetch_row($correct);;
    $incorrect = mysqli_query($conn, "SELECT COUNT(*) FROM `e2b` where status = 'incorrect'");
    $incorrect_count = mysqli_fetch_row($incorrect);
    $total_checked = $correct_count[0]+ $incorrect_count[0];
    $error_rate = ($incorrect_count[0]/$total_checked)*100 ;
  ?>
  
 <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Corpus Stats</h1>
                    <div class="col-sm-12">
                    <div class="row">
 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><font face="verdana" size="8" ><?php echo $total_user_count[0]; ?></font></div>
                                    <div>Total User</div>
                                </div>
                            </div>
                        </div>
                        <a href="user.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><font face="verdana" size="8" ><?php echo $total_corpus_count[0]; ?></font></div>
                                    <div>Total Sentences</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin_corpus.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><font face="verdana" size="8" ><?php echo $monthly_corpus_count[0]; ?></font></div>
                                    <div>Total Sentences Entried this month</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin_corpus.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-exclamation-triangle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><font face="verdana" size="8" ><?php echo round($error_rate,2); ?>%</font></div>
                                    <div>Error Rate</div>
                                </div>
                            </div>
                        </div>
                        <a href="user.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
 


</div>
</body>
</html>

<?php }
 else {header("Location: home.php");} ?>
