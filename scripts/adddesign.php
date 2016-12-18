<?php
require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect$corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());

$baseid = mysql_real_escape_string($_GET["baseid"]);
$codeid = mysql_real_escape_string($_GET["codeid"]);
$description = mysql_real_escape_string($_GET["description"]);
$perskin = mysql_real_escape_string($_GET["perskin"]);
$mould = mysql_real_escape_string($_GET["mould"]);
$bead = mysql_real_escape_string($_GET["bead"]);
$glaze = mysql_real_escape_string($_GET["glaze"]);
$persetofskins = mysql_real_escape_string($_GET["persetofskins"]);

$corquery="INSERT INTO designs (baseid, codeid, description, perskin, mould, bead, glaze, persetofskins) VALUES (".$baseid.", ".$codeid.", '".$description."', ".$perskin.", ".$mould.", ".$bead.", ".$glaze.", ".$persetofskins.")";
$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not run add record query on line 12.'.$corquery.'     '.mysql_error());
require_once('displaydesignlist.php');

mysql_close($corcon);
?>
