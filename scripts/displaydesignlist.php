<?php

require_once("cormain.php");
$corquery = 'SELECT * FROM designs ORDER BY CONVERT(codeid, UNSIGNED)';
$qry = mysql_query($corquery, $corcon);
if (!$qry)
  die('Could not query on line 70.' . $corquery . '     ' . mysql_error());
echo "<form name='frmdesign' id='frmdesign'><table><tr><th>" . '<a href="#" title="Check or uncheck all for edit or removal" onClick="toggleselectall(document.frmdesign.editdesigncheck)">Check All/<br />Uncheck All</a>' . "</th><th> Time Code</th><th>Base Type</th><th>Description</th><th>Per Skin</th><th>Mould</th><th>Bead</th><th>Glaze</th><th>persetofskins</th></tr>\n";
$count = 0;
while ($row = mysql_fetch_assoc($qry)) {
  $count++;
  echo "<tr><td align='center'><input type='checkbox' name='editdesigncheck' id='editdesigncheck_" . $row["designid"] . "' value='" . $row["designid"] . "'></input></td>";


// display codeids begin
  echo "<td><select id='codeid_" . $row["designid"] . "'  disabled='disabled' value='" . $row["designid"] . "'> ";
  $codequery = "SELECT * from codes";
  //ORDER BY CONVERT(codeid, INT)";
  $qrycode = mysql_query($codequery, $corcon);

  // get time code for current design.
  while ($rowcode = mysql_fetch_assoc($qrycode)) { //get next code record.
    // check for matching timecode and design.
    if ($rowcode['codeid'] == $row['codeid']) // 
      echo "<option selected='selected' value='" . $rowcode['codeid'] . "'>" . $rowcode['codeid'] . "&mdash;&gt;" . $rowcode['timeperiod'] . "</option>";
    else // fill list with rest of the timecodes.
      echo "<option value='" . $rowcode['codeid'] . "'>" . $rowcode['codeid'] . "-->" . $rowcode['timeperiod'] . "</option>";
  }
  echo "</select></td>";

// display codeids end		
// display basecodes.
  echo "<td><select id='basecode_" . $row["designid"] . "'  disabled='disabled' value='" . $row["designid"] . "'> ";
  $basequery = "SELECT * from bases
		ORDER BY basecode ASC";
  $qrybase = mysql_query($basequery, $corcon);

  while ($rowbase = mysql_fetch_assoc($qrybase)) { //get next base record.
    // check for matching base and design.
    if ($rowbase['baseid'] == $row['baseid']) // 
      echo "<option selected='selected' value='" . $rowbase['baseid'] . "'>" . $rowbase['basecode'] . "</option>";
    else // fill list with rest of the bases.
      echo "<option value='" . $rowbase['baseid'] . "'>" . $rowbase['basecode'] . "</option>";
  }
  echo "</select></td>";
// display basecodes end
  echo "<td><input type='text' id='description_" . $row["designid"] . "' value='" . $row['description'] . "'  disabled='disabled' /></td><td><input type='checkbox' name='perskin_" . $row["designid"] . "' id='perskin_" . $row["designid"] . "' value='" . $row["perskin"] . "' disabled='disabled' " . toggle($row["perskin"]) . "></input></td><td><input type='checkbox' name='mould_" . $row["designid"] . "' id='mould_" . $row["designid"] . "' value='" . $row["mould"] . "' disabled='disabled' " . toggle($row["mould"]) . "></input></td><td><input type='checkbox' name='bead_" . $row["designid"] . "' id='bead_" . $row["designid"] . "' value='" . $row["bead"] . "' disabled='disabled' " . toggle($row["bead"]) . "></input></td><td><input type='checkbox' name='glaze_" . $row["designid"] . "' id='glaze_" . $row["designid"] . "' value='" . $row["glaze"] . "' disabled='disabled' " . toggle($row["glaze"]) . "></input></td><td><input type='checkbox' name='persetofskins_" . $row["designid"] . "' id='persetofskins_" . $row["designid"] . "' value='" . $row["persetofskins"] . "' disabled='disabled' " . toggle($row["persetofskins"]) . "></input></td><td><input id='edit_" . $row["designid"] . "' type='button' onclick='editdesign(" . $row["designid"] . ")' value='Edit' /></td><td><input id='del_" . $row["designid"] . "' type='button' onclick='deldesign(" . $row["designid"] . ")' value='Del' /></td></tr>\n";
}
echo "<tr><td><input type='button' onclick='delselecteddesigns()' value='Delete\nSelected' /></td><td></td><td></td></tr><tr><td></td>\n";
// add a new design.
$codequery = "SELECT * from codes
		ORDER BY codeid";
$qrycode = mysql_query($codequery, $corcon);
//if (!mysql_data_seek($qrycode, 0))
//die("Cannot seek to row $i: " . mysql_error() . "\n");
$count = 0;
echo "<td><select id='addcodeid'>";
while ($rowcode = mysql_fetch_assoc($qrycode)) {
  $count++;
  echo "<option value='" . $rowcode['codeid'] . "'>";
  echo $rowcode['codeid'] . "-->" . $rowcode['timeperiod'] . "</option>";
}
echo "</select></td>";
if (!mysql_data_seek($qrybase, 0))
  die("Cannot seek to row $i: " . mysql_error() . "\n");
$count = 0;
echo "<td><select id='addbaseid'>";
while ($rowbase = mysql_fetch_assoc($qrybase)) {
  $count++;
  echo "<option value='" . $rowbase['baseid'] . "'>";
  echo $rowbase['basecode'] . "</option>";
}
echo "</select></td>";


echo "<td><input type='text' id='adddescription' /> </td><td><input type='checkbox' name='addperskin' id='addperskin' /></td><td><input type='checkbox' name='addmould' id='addmould' /></td><td><input type='checkbox' name='addbead' id='addbead' /></td><td><input type='checkbox' name='addglaze' id='addglaze' /></td><td><input type='checkbox' name='addpersetofskins' id='addpersetofskins' /></td><td><input name='btnadddesign' type='button' value='Add'  onclick='adddesign()'/></td><td></td></tr></table></form><div id='statusbar'></div>";
?>