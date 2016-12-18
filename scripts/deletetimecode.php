<?php
require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect$corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());

$codeid = mysql_real_escape_string($_GET['codeid']);

$corquery="DELETE FROM codes WHERE codeid=".$codeid;

$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not run delete query on line 12.'.$corquery.'     '.mysql_error());


require_once('displaytimecodelist.php');

mysql_close($corcon);
?>