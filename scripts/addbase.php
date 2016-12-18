<?php
require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect$corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());

$basecode = mysql_real_escape_string($_GET["basecode"]);
$basedescription = mysql_real_escape_string($_GET["basedescription"]);

$corquery="INSERT INTO bases (basecode, basedescription) VALUES ('".$basecode."', '".$basedescription."')";
$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not run add record query on line 12.'.$corquery.'     '.mysql_error());
require_once('displaybaselist.php');

mysql_close($corcon);
?>
