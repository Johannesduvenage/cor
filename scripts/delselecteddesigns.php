<?php
require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect$corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());

$fields = explode(",",$_GET["deldesignlist"]);
$fieldssize = sizeof($fields);

if($fieldssize > 0 && $fields[0] != '') {
	$corquery="DELETE FROM designs WHERE designid IN (".mysql_real_escape_string($fields[0]);
	$i=1;
	while($i < $fieldssize) {
		$corquery = $corquery.",".mysql_real_escape_string($fields[$i]);
	$i++;
	}
	$corquery = $corquery.")";
	$qry = mysql_query($corquery,$corcon);
	if(!$qry)
		die('Could not run add record query on line 12.'.$corquery.'     '.mysql_error());

	//echo $corquery."<br />";
	require_once('displaydesignlist.php');
}
else {
	require_once('displaydesignlist.php');
	die();
}
mysql_close($corcon);
?>