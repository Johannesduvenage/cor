<?php

require_once("cormain.php");
$corquery = 'SELECT * FROM destinations ORDER BY description';
$qry = mysql_query($corquery, $corcon);
if (!$qry)
  die('Could not query on line 70.' . $corquery . '     ' . mysql_error());

echo "<form name='frmdestination' id='frmdestination'><table><tr><th class='tdheader'>" . '<a href="#" title="Check or uncheck all for edit or removal" onClick="toggleselectall(document.frmdestination.editdestinationcheck)">Check All/<br />Uncheck All</a>' . "</th><th class='tdheader'>Destination</th><th colspan='4' class='tdheader'></th></tr>\n";

// get and edit destination records	begin
$count = 0;
while ($row = mysql_fetch_assoc($qry)) {
  $count++;
  echo "<tr><td align='center'><input type='checkbox' name='editdestinationcheck' id='editdestinationcheck_" . $row["destinationid"] . "' value='" . $row["destinationid"] . "'></input></td>";

  echo "<td><input type='text' id='description_" . $row["destinationid"] . "' value='" . $row['description'] . "'  disabled='disabled' /></td>";

  echo "<td><input id='edit_" . $row["destinationid"] . "' type='button' onclick='editdestination(" . $row["destinationid"] . ")' value='Edit' /></td><td><input id='del_" . $row["destinationid"] . "' type='button' onclick='deldestination(" . $row["destinationid"] . ")' value='Del' /></td></tr>\n";
}
echo "<tr><td><input type='button' onclick='delselecteddestinations()' value='Delete\nSelected' /></td><td></td><td></td></tr><tr><td></td>\n";
// get and edit destination records	begin
// add a new destination.
echo "<td><input type='text' id='adddescription' name='adddescription' /> </td><td></td>";

echo "<td><input name='btnadddestination' type='button' value='Add'  onclick='adddestination()'/></td><td></td></tr></table></form><div id='statusbar'></div>";
?>
