<style>
body{width:50%;}
.demoInputBox{width: 60%;
    padding: 12px 20px;
    margin: 4px 0;
    box-sizing: border-box;
    border: 1px solid grey;
    border-radius: 2px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>

<div id="frmCheckUsername">
  <label>Username:</label>
  <input name="email" type="text" id="email" class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>    
</div>
<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>