<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Bases</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
<script language="JavaScript" type="text/javascript">

function editbase(str) {
	basecode = document.getElementById("basecode_"+str);
	basedescription = document.getElementById("basedescription_"+str);

	saveButton = document.getElementById("edit_"+str);

	if(saveButton.value == "Edit") {
		saveButton.value="Save";
		saveButton.onclick= function() {savebase(str)};
		basecode.disabled="";
		basedescription.disabled="";
	}
	else if(saveButton.value == "Save") {
		saveButton.value="Edit";
		saveButton.onclick="editbase("+str+")";
		basecode.disabled="disabled";
		basedescription.disabled="disabled";
	}
}

function savebase(str)
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
    document.getElementById("baselist").innerHTML=xmlhttp.responseText;
    }
  }

var i = 0;


basecode = encodeURIComponent(document.getElementById("basecode_"+str).value);
basedescription = encodeURIComponent(document.getElementById("basedescription_"+str).value);

xmlhttp.open("GET","scripts/savebase.php?baseid="+encodeURIComponent(str)+"&basecode="+basecode+"&basedescription="+basedescription,true);
xmlhttp.send();
}

function addbase()
{
basecode = encodeURIComponent(document.frmbase.addbasecode.value);
basedescription = encodeURIComponent(document.frmbase.addbasedescription.value);

if (basecode == "" || basedescription == "")
  {
  document.getElementById("statusbar").innerHTML="data needs to be entered in both fields to add a base record.";
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
    document.getElementById("baselist").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","scripts/addbase.php?basecode="+basecode+"&basedescription="+basedescription,true);
xmlhttp.send();
}

function delbase(str) {

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
    document.getElementById("baselist").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","scripts/deletebase.php?baseid="+encodeURIComponent(str),true);
xmlhttp.send();

}

function delselectedbases() {

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
    document.getElementById("baselist").innerHTML=xmlhttp.responseText;
    }
  }

var bases = document.getElementsByTagName("input");

var delbaselist = new String("");
var result = new String("");

for(i=0; i < bases.length; i++) {
	if(bases[i].type == "checkbox") {
		if(bases[i].checked == true)
			delbaselist += bases[i].value+",";
		result = encodeURIComponent(delbaselist.slice(0,delbaselist.lastIndexOf(",", 0)));
	}
}

xmlhttp.open("GET","scripts/delselectedbases.php?delbaselist="+result,true);
xmlhttp.send();

}

</script>

</head>
<body>
<div id="baselist">
<?php
require_once('scripts/cormain.php');
// connect to corinthian database.
$corcon = mysql_connect($corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db('corinthianjobcard', $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());

require_once('scripts/displaybaselist.php');

mysql_close($corcon);
?>
</div>
</html>
