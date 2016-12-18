<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Users</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
<script language="JavaScript" type="text/javascript">

function edituser(str) {
	fullname = document.getElementById("fullname_"+str);
	username = document.getElementById("username_"+str);
	userlevel = document.getElementById("userlevelid_"+str);

	saveButton = document.getElementById("edit_"+str);

	if(saveButton.value == "Edit") {
		saveButton.value="Save";
		saveButton.onclick= function() {saveuser(str)};
		fullname.disabled="";
		username.disabled=""
		userlevel.disabled="";
	}
	else if(saveButton.value == "Save") {
		saveButton.value="Edit";
		saveButton.onclick="edituser("+str+")";
		fullname.disabled="disabled";
		username.disabled="disabled";
		userlevel.disabled="disabled";
	}
}

function saveuser(str)
{

if (str=="")
  {
  document.getElementById("statusbar").innerHTML="There are no records selected to save.";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("userlist").innerHTML=xmlhttp.responseText;
    }
  }

var i = 0;
var posuserid = 0;
var finduserid = 0;
var userid = -1;
var fullname = '';
var username = '';
var userlevelid = 0;
var userlist = document.frmuser.editusercheck;


finduserlevelid = document.getElementById("userlevelid_"+str);

	i=0;
	while(i < finduserlevelid.length) {
		if(finduserlevelid.options[i].selected == true)
			userlevelid = encodeURIComponent(finduserlevelid.options[i].value);
		i++;
	}


	fullname = encodeURIComponent(document.getElementById("fullname_"+str).value);
	username = encodeURIComponent(document.getElementById("username_"+str).value);
	
xmlhttp.open("GET","scripts/saveuser.php?userid="+str+"&fullname="+fullname+"&username="+username+"&userlevelid="+userlevelid,true);
xmlhttp.send();
}

function adduser()
{
userlevelid = encodeURIComponent(document.frmuser.adduserlevelid.value);
fullname = encodeURIComponent(document.frmuser.addfullname.value);
username = encodeURIComponent(document.frmuser.addusername.value);

if (fullname == "" || username == "" || userlevelid == 0)
  {
  document.getElementById("statusbar").innerHTML="data needs to be entered in both fields to add a user record.";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("userlist").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","scripts/adduser.php?fullname="+fullname+"&username="+username+"&userlevelid="+userlevelid,true);
xmlhttp.send();
}

function deluser(str) {

if (str=="")
  {
  document.getElementById("statusbar").innerHTML="There are no records selected to Delete.";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("userlist").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","scripts/deleteuser.php?userid="+encodeURIComponent(str),true);
xmlhttp.send();

}

function delselectedusers() {

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("userlist").innerHTML=xmlhttp.responseText;
    }
  }

var users = document.getElementsByTagName("input");

var deluserlist = new String("");
var result = new String("");

for(i=0; i < users.length; i++) {
	if(users[i].type == "checkbox") {
		if(users[i].checked == true)
			deluserlist += users[i].value+",";
		result = encodeURIComponent(deluserlist.slice(0,deluserlist.lastIndexOf(",", 0)));
	}
}

xmlhttp.open("GET","scripts/delselectedusers.php?deluserlist="+result,true);
xmlhttp.send();

}

function createusername() {
	var username = new String(document.getElementById("addusername").value);
	var fullname = new String(document.getElementById("addfullname").value);
	username = fullname.slice(0,fullname.lastIndexOf(" "));
		
	document.getElementById("addusername").value = username.toLowerCase();
}

</script>

</head>
<body>
<div id="userlist">
<?php
require_once('scripts/cormain.php');
// connect to corinthian database.
$corcon = mysql_connect($corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db('corinthianjobcard', $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());

require_once('scripts/displayuserlist.php');

mysql_close($corcon);
?>
</body>
</html>
