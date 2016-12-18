<?php
$corquery='SELECT * FROM bases'; 
$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not query on line 70.'.$corquery.'     '.mysql_error());
	echo "<form name='frmbase' id='frmbase'><table><tr><th>".'<a href="#" title="Check or uncheck all for edit or removal" onClick="toggleselectall(document.frmbase.editbasecheck)">Check All/<br />Uncheck All</a>'."</th></th><th>Base Code</th><th>Description</th></tr>\n";
$count=0;
	while($row = mysql_fetch_assoc($qry)) {
		$count++;
		echo "<tr><td align='center'><input type='checkbox' name='editbasecheck' value='".$row["baseid"]."'></input></td><td><input id='basecode_".$row["baseid"]."'  disabled='disabled' value='".$row["basecode"]."' /></td>";

		echo "<td><input type='text' id='basedescription_".$row["baseid"]."' value='".$row['basedescription']."'  disabled='disabled' /></td><td><input id='edit_".$row["baseid"]."' type='button' onclick='editbase(".$row["baseid"].")' value='Edit' /></td><td><input id='del_".$row["baseid"]."' type='button' onclick='delbase(".$row["baseid"].")' value='Del' /></td></tr>\n";
	}
		echo "<tr><td><input type='button' onclick='delselectedbases()' value='Delete\nSelected' /></td><td></td><td></td></tr><tr>\n";
		// add a new design.

	echo "<tr><td></td><td><input type='text' id='addbasecode' /></td><td><input type='text' id='addbasedescription' /> </td><td><input name='btnaddbase' type='button' value='Add'  onclick='addbase()'/></td><td></td><td></td></tr></table></form>
<div id='statusbar'></div>";
?>