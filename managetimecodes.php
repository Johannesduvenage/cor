<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Time Codes</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
<script language="JavaScript" type="text/javascript">

function edittimecode(str) {
	codeid = document.getElementById("codeid_"+str);
	timeperiod = document.getElementById("timeperiod_"+str);

	saveButton = document.getElementById("edit_"+str);

	if(saveButton.value == "Edit") {
		saveButton.value="Save";
		saveButton.onclick= function() {savetimecode(str)};
		codeid.disabled="";
		timeperiod.disabled="";
	}
	else if(saveButton.value == "Save") {
		saveButton.value="Edit";
		saveButton.onclick="edittimecode("+str+")";
		codeid.disabled="disabled";
		timeperiod.disabled="disabled";
	}
}

function savetimecode(str)
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
    document.getElementById("timecodelist").innerHTML=xmlhttp.responseText;
    }
  }

var i = 0;


timeperiod = encodeURIComponent(document.getElementById("timeperiod_"+str).value);

xmlhttp.open("GET","scripts/savetimecode.php?codeid="+encodeURIComponent(str)+"&timeperiod="+timeperiod,true);
xmlhttp.send();
}

function addtimecode()
{
codeid = encodeURIComponent(document.frmtimecode.addcodeid.value);
timeperiod = encodeURIComponent(document.frmtimecode.addtimeperiod.value);

if (codeid == "" || timeperiod == "")
  {
  document.getElementById("statusbar").innerHTML="data needs to be entered in both fields to add a timecode record.";
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
    document.getElementById("timecodelist").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","scripts/addtimecode.php?codeid="+codeid+"&timeperiod="+timeperiod,true);
xmlhttp.send();
}

function deltimecode(str) {

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
    document.getElementById("timecodelist").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","scripts/deletetimecode.php?codeid="+encodeURIComponent(str),true);
xmlhttp.send();

}

function delselectedtimecodes() {

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
    document.getElementById("timecodelist").innerHTML=xmlhttp.responseText;
    }
  }

var timecodes = document.getElementsByTagName("input");

var deltimecodelist = new String("");
var result = new String("");

for(i=0; i < timecodes.length; i++) {
	if(timecodes[i].type == "checkbox") {
		if(timecodes[i].checked == true)
			deltimecodelist += timecodes[i].value+",";
		result = encodeURIComponent(deltimecodelist.slice(0,deltimecodelist.lastIndexOf(",", 0)));
	}
}

xmlhttp.open("GET","scripts/delselectedtimecodes.php?deltimecodelist="+result,true);
xmlhttp.send();

}

</script>

</head>
<body>
<div id="timecodelist">
<?php
require_once('scripts/cormain.php');
// connect to corinthian database.
$corcon = mysql_connect($corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db('corinthianjobcard', $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());

require_once('scripts/displaytimecodelist.php');

mysql_close($corcon);
?>
</div>
</html>
