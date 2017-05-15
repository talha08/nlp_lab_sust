<!DOCTYPE>
<html>


<head>
<div class = "center">
<link rel="stylesheet" href="styles.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- jQuery -->
  <style type="text/css">
  body{width:50%;}
  .email{width: 60%;
    padding: 12px 20px;
    margin: 4px 0;
    box-sizing: border-box;
    border: 1px solid grey;
    border-radius: 2px;}
.status-available{color:#D60202;}
.status-not-available{color:#2FC332;}
  </style>
<script src="js/jquery-3.1.1.js"></script>

<!-- The following jQuery code would check whether the username is available or not -->
<script>

function checkEmail() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "avail_check/check_availability.php",
  data:'email='+$("#email").val(),
  type: "POST",
  success:function(data){
    $("#email-availability-status").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}


</script>
<!--End of script.-->
</head>
<body>
  <h1> Reset Your Password </h1>
<form action="fpass_req.php" method = "post" accept-charset="utf-8">
  
  <input class = "text_input" type="text" name="email" class="email" id="email" onkeyup="checkEmail();" required placeholder="Enter your E-mail" autocomplete="off"><br>
  <span id="email-availability-status"></span>
 
 <h3> <button type ="submit" id="button" class ="button button1 " >Reset</button></h3> 
 </form>
 
<h3> <button class ="button button1 "><a href="index.php">Home</button></a></h3>
  

</div>

</body>

</html>
