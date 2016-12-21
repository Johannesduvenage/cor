<?php

require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect($corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());

$codeid = mysql_real_escape_string($_GET["codeid"]);
$description = mysql_real_escape_string($_GET["description"]);
$baseid = mysql_real_escape_string($_GET["baseid"]);
$perskin = mysql_real_escape_string($_GET["perskin"]);
$mould = mysql_real_escape_string($_GET["mould"]);
$bead = mysql_real_escape_string($_GET["bead"]);
$glaze = mysql_real_escape_string($_GET["glaze"]);
$persetofskins = mysql_real_escape_string($_GET["persetofskins"]);
$designid = mysql_real_escape_string($_GET["designid"]);

$corquery = "UPDATE designs SET codeid=" . $codeid . ", description='" . $description . "', baseid=" . $baseid . ", perskin=" . $perskin . ", mould=" . $mould . ", bead=" . $bead . ", glaze=" . $glaze . ", persetofskins=" . $persetofskins . " WHERE designid=" . $designid;
$qry = mysql_query($corquery, $corcon);
if (!$qry)
  die('Could not run update query on line 11.' . $corquery . '     ' . mysql_error());

require_once('displaydesignlist.php');

mysql_close($corcon);
?>

