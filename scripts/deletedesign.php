<?php

require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect$corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());

$designid = mysql_real_escape_string($_GET['designid']);

$corquery = "DELETE FROM designs WHERE designid=" . $designid;

$qry = mysql_query($corquery, $corcon);
if (!$qry)
  die('Could not run delete query on line 12.' . $corquery . '     ' . mysql_error());


require_once('displaydesignlist.php');

mysql_close($corcon);
?>