<?php

require_once("cormain.php");

$thedate = getdate();
$differencetolocaltime = 8; // todo in admin control panel make this variable settable.
$new_U = date("U") + $differencetolocaltime * 3600;
$thetime = date("H:i", $new_U); // get current local time
// form start
echo '<div id="file_upload"><form action="." method="POST" name="psheetform" id="psheetform" enctype="multipart/form-data">' . "\n";
echo '<input type="file" name="file" multiple>
        <button type="submit">Upload</button>
        <div class="file_upload_label">Upload files</div>' . "\n";
echo '<table class="files">' . "\n";
echo '<tr class="file_upload_template" style="display:none;">' . "\n";
echo '<td class="file_upload_preview"></td>' . "\n";
echo '<td class="file_name"></td>' . "\n";
echo '<td class="file_size"></td>' . "\n";
echo '<td class="file_upload_progress"><div></div></td>' . "\n";
echo '<td class="file_upload_start"><button>Start</button></td>' . "\n";
echo '<td class="file_upload_cancel"><button>Cancel</button></td>' . "\n";
echo '</tr><tr class="file_download_template" style="display:none;">' . "\n";
echo '<td class="file_download_preview"></td>' . "\n";
echo '<td class="file_name"><a></a></td>' . "\n";
echo '<td class="file_size"></td>' . "\n";
echo '<td class="file_download_delete" colspan="3"><button>Delete</button></td>' . "\n";
echo '</tr>' . "\n";
echo '</table>' . "\n";
echo '<div class="file_upload_overall_progress"><div style="display:none;"></div></div>' . "\n";
echo '<div class="file_upload_buttons">' . "\n";
echo '<button class="file_upload_start">Start All</button>' . "\n";
echo '<button class="file_upload_cancel">Cancel All</button>' . "\n";
echo '<button class="file_download_delete">Delete All</button>' . "\n";
echo '</div>' . "\n";
echo '</div></div>' . "\n";
//echo '<input type="button" onclick="import" value="Insert Data"/></div>';
// manual input block begin
echo '<div id="manualinputproductionblock">';
echo "<table><tr><td>Date:</td><td><input id='date' name='date' type='text' ";
echo "value='" . $thedate['mday'] . '/' . $thedate['mon'] . '/' . $thedate['year'] . "' />";
echo "</td><td>Time:</td><td><input id='time' name='time' type='text' ";
echo "value='" . $thetime . "' />";
echo "</td></tr><tr><td>Division:</td><td><input id='division' name='division' type='text' /></td></tr><tr><td class='tdheader'>" . '<a href="#" title="Check or uncheck all for edit or removal" onClick="toggleselectall(document.frmpsheet.editpsheetcheck)">Check All/<br />Uncheck All</a>' . "</td><td class='tdheader'>Base Type</td><td colspan='2' class='tdheader'>Description</td><td class='tdheader'>Per Skin</td><td class='tdheader'>Mould</td><td class='tdheader'>Bead</td><td class='tdheader'>Glaze</td><td class='tdheader'>persetofskins</td><td class='tdheader'></td><td class='tdheader'></td></tr>\n";
echo "<tr><td align='center'><input type='checkbox' name='editpsheetcheck' id='editpsheetcheck' /></td>";

// display basecodes.
echo "<td><select id='basecode'> ";
$basequery = "SELECT * from bases";
$qrybase = mysql_query($basequery, $corcon);

while ($rowbase = mysql_fetch_assoc($qrybase)) { //get next base record.
  // check for matching base and psheet.
  if ($rowbase['baseid'] == $row['baseid']) // 
    echo "<option selected='selected' value='" . $rowbase['baseid'] . "'>" . $rowbase['basecode'] . "</option>";
  else // fill list with rest of the bases.
    echo "<option value='" . $rowbase['baseid'] . "'>" . $rowbase['basecode'] . "</option>";
}
echo "</select></td>";
// display basecodes end

echo "<td colspan='2'><input type='text' id='description'/></td><td><input type='checkbox' name='perskin' id='perskin'></input></td><td><input type='checkbox' name='mould' id='mould' /></td><td><input type='checkbox' name='bead' id='bead' /></td><td><input type='checkbox' name='glaze' id='glaze' /></td><td><input type='checkbox' name='persetofskins' id='persetofskins' /></td><td><input id='edit' type='button' onclick='editpsheet()' value='Edit' /></td><td><input id='del' type='button' onclick='delpsheet()' value='Del' /></td></tr>\n";
echo "<tr><td><input type='button' onclick='delselectedpsheets()' value='Delete\nSelected' /></td><td></td><td></td></tr>";

// add a new psheet record begin
echo '<tr><td colspan="8">';
echo '<div  id="addproductionblock"><table>';
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
echo "<td><input type='text' id='adddescription' /> </td><td><input type='checkbox' name='addperskin' id='addperskin' /></td><td><input type='checkbox' name='addmould' id='addmould' /></td><td><input type='checkbox' name='addbead' id='addbead' /></td><td><input type='checkbox' name='addglaze' id='addglaze' /></td><td><input type='checkbox' name='addpersetofskins' id='addpersetofskins' /></td><td><input name='btnaddpsheet' type='button' value='Add'  onclick='addpsheet()'/></td><td></td></tr></table></div></td></tr></table>";
echo "</div>";  // manual input block end
echo "</form>"; // form end
echo "<div id='statusbar'></div>";
?>