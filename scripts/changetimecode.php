<?php

require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect$corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());

$corquery = "SELECT * FROM codes";
$qry = mysql_query($corquery, $corcon);
if (!$qry)
  die('Could not query on line 23.' . $corquery . '     ' . mysql_error());
echo "<form name='changecode' id='changecode'><table><tr><th>Time Code</th><th>Door type</th><th>Time Taken in Mins</th></tr>\n";
$count = 0;
while ($row = mysql_fetch_assoc($qry)) {
  $count++;
  echo "<tr><td>" . $row['codeid'] . "</td><td>";
  echo "<select name='design" . $count . "'>\n";
  $designquery = "SELECT * from designs";
  $qrydesign = mysql_query($designquery, $corcon);
  while ($rowdesign = mysql_fetch_assoc($qrydesign)) {
    // todo
    // fill dropdown list for design with design names.
    // point to the design for the current record.
    echo "<option value='" . $rowdesign['designid'] . "'";
    if ($rowdesign['designid'] == $row['designid'])
      echo " selected='selected'";
    echo ">" . $rowdesign['description'] . "</option>\n";
  }
  echo "</select></td><td><input type='text' value='" . $row['timeperiod'] . "'/></td></tr>\n";
}
echo "</table></form>";
?>
