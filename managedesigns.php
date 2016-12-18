<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Designs</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
<script language="JavaScript" type="text/javascript">

function editdesign(str) {
	designid = document.getElementById("designid_"+str);
	basecode = document.getElementById("basecode_"+str);
	codeid = document.getElementById("codeid_"+str);
	description = document.getElementById("description_"+str);
	perskin = document.getElementById("perskin_"+str);
	mould = document.getElementById("mould_"+str);
	bead = document.getElementById("bead_"+str);
	glaze = document.getElementById("glaze_"+str);
	persetofskins = document.getElementById("persetofskins_"+str);

	saveButton = document.getElementById("edit_"+str);

	if(saveButton.value == "Edit") {
		//designid.disabled="";
		saveButton.value="Save";
		saveButton.onclick= function() {savedesign(str)};
		basecode.disabled="";
		codeid.disabled=""
		description.disabled="";
		perskin.disabled="";
		mould.disabled="";
		bead.disabled="";
		glaze.disabled="";
		persetofskins.disabled="";
		description.focus();
	}
	else if(saveButton.value == "Save") {
		//designid.disabled="disabled";
		saveButton.value="Edit";
		saveButton.onclick="editdesign("+str+")";
		designid.disabled="disabled";
		basecode.disabled="disabled";
		description.disabled="disabled";
		perskin.disabled="disabled";
		mould.disabled="disabled";
		bead.disabled="disabled";
		glaze.disabled="disabled";
		persetofskins.disabled="disabled";
	}
}

function savedesign(str)
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
    document.getElementById("designlist").innerHTML=xmlhttp.responseText;
    }
  }

var i = 0;
var posdesignid = 0;
var finddesignid = 0;
var designid = -1;
var description = '';
var baseid = 0;
var perskin = 0;
var mould = 0;
var bead = 0;
var glaze = 0;
var persetofskins = 0;

var designlist = document.frmdesign.editdesigncheck;


basecode = document.getElementById("basecode_"+str);

	while(i < basecode.length) {
		if(basecode.options[i].selected == true)
			baseid = encodeURIComponent(basecode.options[i].value);
		i++;
	}

findcodeid = document.getElementById("codeid_"+str);

	i=0;
	while(i < findcodeid.length) {
		if(findcodeid.options[i].selected == true)
			codeid = encodeURIComponent(findcodeid.options[i].value);
		i++;
	}


	description = encodeURIComponent(document.getElementById("description_"+str).value);
	perskin = toggle(document.getElementById("perskin_"+str).checked);
	
	mould = toggle(document.getElementById("mould_"+str).checked);

	bead = toggle(document.getElementById("bead_"+str).checked);

	glaze = toggle(document.getElementById("glaze_"+str).checked);

	persetofskins = toggle(document.getElementById("persetofskins_"+str).checked);

xmlhttp.open("GET","scripts/savedesign.php?designid="+str+"&codeid="+codeid+"&baseid="+baseid+"&description="+description+"&perskin="+perskin+"&mould="+mould+"&bead="+bead+"&glaze="+glaze+"&persetofskins="+persetofskins,true);
xmlhttp.send();
}

function adddesign()
{

findcodeid = document.getElementById("addcodeid");

	i=0;
	while(i < findcodeid.length) {
		if(findcodeid.options[i].selected == true)
			codeid = encodeURIComponent(findcodeid.options[i].value);
		i++;
	}

baseid = encodeURIComponent(document.frmdesign.addbaseid.value);
description = encodeURIComponent(document.frmdesign.adddescription.value);
perskin = toggle(document.frmdesign.addperskin.checked);
mould = toggle(document.frmdesign.addmould.checked);
bead = toggle(document.frmdesign.addbead.checked);
glaze = toggle(document.frmdesign.addglaze.checked);
persetofskins = toggle(document.frmdesign.addpersetofskins.checked);

if (description == "")
  {
  document.getElementById("statusbar").innerHTML="data needs to be entered in both fields to add a design record.";
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
    document.getElementById("designlist").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","scripts/adddesign.php?codeid="+codeid+"&baseid="+baseid+"&description="+description+"&perskin="+perskin+"&mould="+mould+"&bead="+bead+"&glaze="+glaze+"&persetofskins="+persetofskins,true);
xmlhttp.send();
}

function deldesign(str) {

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
    document.getElementById("designlist").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","scripts/deletedesign.php?designid="+encodeURIComponent(str),true);
xmlhttp.send();

}

function delselecteddesigns() {

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
    document.getElementById("designlist").innerHTML=xmlhttp.responseText;
    }
  }

var designs = document.getElementsByTagName("input");

var deldesignlist = new String("");
var result = new String("");
// Tip: this routine helps create an array to parse to php.
for(i=0; i < designs.length; i++) {
	if(designs[i].type == "checkbox") {
		if(designs[i].checked == true)
			deldesignlist += designs[i].value+",";
		result = encodeURIComponent(deldesignlist.slice(0,deldesignlist.lastIndexOf(",", 0)));
	}
}

xmlhttp.open("GET","scripts/delselecteddesigns.php?deldesignlist="+result,true);
xmlhttp.send();

}

</script>

</head>
<body>
<div id="designlist">
<?php
require_once('scripts/cormain.php');
// connect to corinthian database.
$corcon = mysql_connect($corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db('corinthianjobcard', $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());

require_once('scripts/displaydesignlist.php');

mysql_close($corcon);
?>
</div>
</body>
</html>
