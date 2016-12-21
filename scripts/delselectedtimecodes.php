<?php

require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect$corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());

$fields = explode(",", $_GET["deltimecodelist"]);
$fieldssize = sizeof($fields);

if ($fieldssize > 0 && $fields[0] != '') {
  $corquery = "DELETE FROM codes WHERE codeid IN (" . mysql_real_escape_string($fields[0]);
  $i = 1;
  while ($i < $fieldssize) {
    $corquery = $corquery . "," . mysql_real_escape_string($fields[$i]);
    $i++;
  }
  $corquery = $corquery . ")";
  $qry = mysql_query($corquery, $corcon);
  if (!$qry)
    die('Could not run add record query on line 21.' . $corquery . '     ' . mysql_error());

  require_once('displaytimecodelist.php');
}
else {
  require_once('displaytimecodelist.php');
  die();
}
mysql_close($corcon);
?>
