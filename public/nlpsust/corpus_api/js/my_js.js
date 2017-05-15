// Validating Empty Field
var uid =0;
var user_name = " ";
function check_empty() {
if (document.getElementById('english').value == "" || document.getElementById('bangla').value == "" ) {
alert("Fill All Fields !");
} else {
	//window.location = 'corpus/edit.php';
	var link = "corpus/edit.php?id=";
	link = link.concat(uid);
	link = link + "&user=" + user_name;
document.getElementById('form').action = link ;
document.getElementById('form').submit();
}
}
//Function To Display Popup
function div_show(username,id,english,bangla) {
uid = id;
user_name = username ;
var str1 = "<strong> Data ID:";
    var str2 = "</strong>";
    var res = str1.concat(uid);
    res = res.concat(str2);
document.getElementById('id').innerHTML = res ;
document.getElementById('abc').style.display = "block";
document.getElementById('english').value = english;
document.getElementById('bangla').value = bangla;

}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}

function status_change(username,id,status) {
uid = id;
user_name = username ;
entry_status = status ;

}


function save_correction() {
if (document.getElementById('english').value == "" || document.getElementById('bangla').value == "" ) {
alert("Fill All Fields !");
} else {
	//window.location = 'corpus/edit.php';
	var link = "corpus/correction.php?id=";
	link = link.concat(uid);
	link = link + "&user=" + user_name;
document.getElementById('form').action = link ;
document.getElementById('form').submit();
}
}