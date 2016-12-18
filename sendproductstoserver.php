<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Production Sheet to Jobcard Server</title>
<link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />

<script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
<script language="javascript" type="text/ecmascript" src="scripts/jquery.min.js"></script>
<script language="javascript" type="text/ecmascript" src="scripts/jquery.fileupload.js"></script>
<script language="javascript" type="text/ecmascript" src="scripts/jquery.fileupload-ui.js"></script>
<script language="javascript" type="text/ecmascript" src="scripts/jquery.fileupload-uix.js"></script>
<script language="javascript" type="text/ecmascript" src="scripts/jquery.datatables.min.js"></script>
		<style type="text/css" media="screen">
			@import "css/demo_page.css";
			@import "css/demo_table.css";
			@import "css/demo_table_jui.css";
			@import "css/themes/base/jquery-ui.css";
			@import "css/themes/smoothness/jquery-ui-1.7.2.custom.css";
			/*
			 * Override styles needed due to the mix of three different CSS sources! For proper examples
			 * please see the themes example in the 'Examples' section of this site
			 */
			.dataTables_info { padding-top: 0; }
			.dataTables_paginate { padding-top: 0; }
			.css_right { float: right; }
			#example_wrapper .fg-toolbar { font-size: 0.8em }
			#theme_links span { float: left; padding: 2px 10px; }
		</style>

        <script src="scripts/jquery.jeditable.js" type="text/javascript"></script>
        <script src="scripts/jquery.validate.js" type="text/javascript"></script>
        <script src="scripts/jquery.datatables.editable.js" type="text/javascript"></script>
        

<script language="JavaScript" type="text/ecmascript">


function importproduction()
{

/* var i = 0;
var pospsheetid = 0;
var findpsheetid = 0;
var psheetid = -1;
var description = '';
var baseid = 0;
var perskin = 0;
var mould = 0;
var bead = 0;
var glaze = 0;
var persetofskins = 0;

var psheetlist = document.frmpsheet.editpsheetcheck;
// SELECT * FROM `production` WHERE `productionid`, `sequence`, `destinationid`, `order`, `line`, `sub`, `part`, `quantity`, `base`, `designid`, `width`, `length`, `ismoulded`, `isbeaded`, `isglazed`, `start`, `stop`, `sch`, `prod`, `ldtm`, `productionheaderid`

basecode = document.getElementById("basecode_"+str);

	while(i < basecode.length) {
		if(basecode.options[i].selected == true)
			baseid = basecode.options[i].value;
		i++;
	}

findcodeid = document.getElementById("codeid_"+str);

	i=0;
	while(i < findcodeid.length) {
		if(findcodeid.options[i].selected == true)
			codeid = findcodeid.options[i].value;
		i++;
	}


	description = document.getElementById("description_"+str).value;
	perskin = toggle(document.getElementById("perskin_"+str).checked);
	
	mould = toggle(document.getElementById("mould_"+str).checked);

	bead = toggle(document.getElementById("bead_"+str).checked);

	glaze = toggle(document.getElementById("glaze_"+str).checked);

	persetofskins = toggle(document.getElementById("persetofskins_"+str).checked);

xmlhttp.open("GET","scripts/savepsheet.php?designid="+str+"&codeid="+codeid+"&baseid="+baseid+"&description="+description+"&perskin="+perskin+"&mould="+mould+"&bead="+bead+"&glaze="+glaze+"&persetofskins="+persetofskins,true);
xmlhttp.send(); */

}

function addpsheet()
{

/*
codeid = document.frmpsheet.addcodeid.value;
baseid = document.frmpsheet.addbaseid.value;
description = document.frmpsheet.adddescription.value;
perskin = toggle(document.frmpsheet.addperskin.checked);
mould = toggle(document.frmpsheet.addmould.checked);
bead = toggle(document.frmpsheet.addbead.checked);
glaze = toggle(document.frmpsheet.addglaze.checked);
persetofskins = toggle(document.frmpsheet.addpersetofskins.checked);


if (description == "")
  {
  document.getElementById("statusbar").innerHTML="data needs to be entered in both fields to add a psheet record.";
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
    document.getElementById("psheetlist").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","scripts/addpsheet.php?baseid="+baseid+"&description="+description+"&perskin="+perskin+"&mould="+mould+"&bead="+bead+"&glaze="+glaze+"&persetofskins="+persetofskins,true);
xmlhttp.send(); */
}

function delpsheet(str) {
/*
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
    document.getElementById("psheetlist").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","scripts/deletepsheet.php?designid="+str,true);
xmlhttp.send();
*/
}

function delselectedpsheets() {

/*
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
    document.getElementById("psheetlist").innerHTML=xmlhttp.responseText;
    }
  }

var psheets = document.getElementsByTagName("input");

var delpsheetlist = new String("");
var result = new String("");

for(i=0; i < psheets.length; i++) {
	if(psheets[i].type == "checkbox") {
		if(psheets[i].checked == true)
			delpsheetlist += psheets[i].value+",";
		result = delpsheetlist.slice(0,delpsheetlist.lastIndexOf(",", 0));
	}
}

xmlhttp.open("GET","scripts/delselectedpsheets.php?delpsheetlist="+result,true);
xmlhttp.send();
*/
}

//$(document).ready(function() {
//$('#importtable').dataTable({
//'sAjaxSource':'scripts/importproduction.php'
//})
//});
			$(document).ready( function () {
				//var id = -1;//simulation of id
				$('#importtable').dataTable({"bJQueryUI": true,"sAjaxSource":"scripts/displayproductionlist.php", "bProcessing":true, "bServerSide":true, "sPaginationType": "full_numbers"}).makeEditable({
				"sUpdateURL":"scripts/saveproduction.php",
				"sAddURL":"scripts/addproduction.php",
				"sDeleteURL":"scripts/deleteproduction.php",
				"sAddDeleteToolbarSelector":".dataTables_length"
			})});
</script>

</head>
<body>
<form id="formAddNewRow" action="#" title="Add new production item" style="width:600px;min-width:600px">
<label for="Date">Date:</label><br />
<input type="text" name="date" id="name" class="required" rel="0" />
<br />
<label for="Date">Time:</label><br />
<input type="text" name="time" id="name" class="required" rel="0" />
<br />
<label for="Date">Division:</label><br />
<input type="text" name="division" id="name" class="required" rel="0" />
<br />

</form>
<div class="full_width">
	<div id="example_wrapper" class="dataTables_wrapper">
		<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix">
			<div id="example_length" class="dataTables_length">
			</div>
			<div id="example_filter" class="dataTables_filter">
			</div>
		</div>
	<table id='importtable' class='display'><thead>
	<tr>
	<th>Date:</th>
	<th>Time:</th>
	<th>Division:</th>
	<th>Sequence</th>
    <th>Workcentreid</th>
    <th>Schedule</th>
	<th>Destinationid</th>
	<th>Order #</th>
	<th>Line</th>
	<th>Sub</th>
	<th>Part</th>
	<th>Quantity</th>
	<th>Generic</th>
	<th>Userid</th>
	<th>Baseid</th>
	<th>Designid</th>
	<th>Glassid</th>
	<th>Width</th>
	<th>Length</th>
	<th>Thickness</th>
	<th>Moulded</th>
	<th>Beaded</th>
	<th>Glazed</th>
	<th>Sch</th>
	<th>Prod</th>
	<th>LDTM</th>
	<th>Comments</th>
	</tr></thead>
	<tbody></tbody>
	</table>
	    <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
		</div>
		<div id='statusbar'>
		</div>
	</div>
</div>
<?php
//require_once('scripts/importproduction.php');
//require_once('scripts/displayproductionlist.php');

?>
<script language="javascript" type="text/ecmascript">
$('#date').attr('value', corgetdate());
$('#time').attr('value', corgettime());
</script>

</body>
</html>
