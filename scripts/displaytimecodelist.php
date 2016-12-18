<?php
require_once("cormain.php");
$corquery='SELECT * FROM codes
ORDER BY codeid'; 
$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not query on line 70.'.$corquery.'     '.mysql_error());
	echo "<form name='frmtimecode' id='frmtimecode'><table><tr><th class='tdheader'>".'<a href="#" title="Check or uncheck all for edit or removal" onClick="toggleselectall(document.frmtimecode.edittimecodecheck)">Check All/<br />Uncheck All</a>'."</th><th class='tdheader'>Time Code</th><th class='tdheader'>Time Period</th><th colspan='2' class='tdheader'></th></tr>\n";
$count=0;
	while($row = mysql_fetch_assoc($qry)) {
		$count++;
		echo "<tr><td align='center'><input type='checkbox' name='edittimecodecheck' id='edittimecodecheck_".$row["codeid"]."' value='".$row["codeid"]."'></input></td>";

		echo "<td><input type='text' id='codeid_".$row["codeid"]."' value='".$row['codeid']."'  disabled='disabled' /></td><td><input type='text' id='timeperiod_".$row["codeid"]."' value='".$row['timeperiod']."'  disabled='disabled' /></td><td><input id='edit_".$row["codeid"]."' type='button' onclick='edittimecode(".$row["codeid"].")' value='Edit' /></td><td><input id='del_".$row["codeid"]."' type='button' onclick='deltimecode(".$row["codeid"].")' value='Del' /></td></tr>\n";
	}
		echo "<tr><td><input type='button' onclick='delselectedtimecodes()' value='Delete\nSelected' /></td><td></td><td></td></tr><tr><td></td><td><input type='text' id='addcodeid' /> </td><td><input type='text' id='addtimeperiod' /> </td><td><input name='btnaddtimecode' type='button' value='Add'  onclick='addtimecode()'/></td><td></td></tr></table></form><div id='statusbar'></div>";
?>