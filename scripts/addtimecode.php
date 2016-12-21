<?php

require_once('cormain.php');

// connect to corinthian database.
$corcon = mysql_connect$corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());

$codeid = mysql_real_escape_string($_GET["codeid"]);
$timeperiod = mysql_real_escape_string($_GET["timeperiod"]);

$corquery = "INSERT INTO codes (codeid, timeperiod) VALUES (" . $codeid . ", " . $timeperiod . ")";
$qry = mysql_query($corquery, $corcon);
if (!$qry)
  die('Could not run add record query on line 12.' . $corquery . '     ' . mysql_error());
require_once('displaytimecodelist.php');
//todo: field validation for entire site.
mysql_close($corcon);
?>
