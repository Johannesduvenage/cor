<?php

require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect($corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());
$description = mysql_real_escape_string($_GET["description"]);
$userlevelid = mysql_real_escape_string($_GET['userlevelid']);
$corquery = "UPDATE userlevels SET description='" . $description . "' WHERE userlevelid=" . $userlevelid;
$qry = mysql_query($corquery, $corcon);
if (!$qry)
  die('Could not run update query on line 11.' . $corquery . '     ' . mysql_error());

require_once('displayuserlevellist.php');

mysql_close($corcon);
?>

