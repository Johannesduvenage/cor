<?php

require_once('cormain.php');

// connect to corinthian database.
$corcon = mysql_connect$corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());

$fullname = mysql_real_escape_string($_GET["fullname"]);
$username = mysql_real_escape_string($_GET["username"]);
$userlevelid = mysql_real_escape_string($_GET["userlevelid"]);

$corquery = "INSERT INTO users (fullname, username, userlevelid) VALUES ('" . $fullname . "', '" . $username . "', " . $userlevelid . ")";
$qry = mysql_query($corquery, $corcon);
if (!$qry)
  die('Could not run add record query on line 12.' . $corquery . '     ' . mysql_error());
require_once('displayuserlist.php');

mysql_close($corcon);
?>
