<?php
require_once("cormain.php");
$corquery='SELECT * FROM userlevels ORDER BY description'; 
$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not query on line 70.'.$corquery.'     '.mysql_error());

	echo "<form name='frmuserlevel' id='frmuserlevel'><table><tr><th class='tdheader'>".'<a href="#" title="Check or uncheck all for edit or removal" onClick="toggleselectall(document.frmuserlevel.edituserlevelcheck)">Check All/<br />Uncheck All</a>'."</th><th class='tdheader'>Description</th><th colspan='2' class='tdheader'></th></tr>\n";
$count=0;
	while($row = mysql_fetch_assoc($qry)) {
		$count++;
		echo "<tr><td align='center'><input type='checkbox' name='edituserlevelcheck' id='edituserlevelcheck_".$row["userlevelid"]."' value='".$row["userlevelid"]."'></input></td><td><input type='text' id='description_".$row["userlevelid"]."' value='".$row['description']."'  disabled='disabled' /></td>";

		echo "<td><input id='edit_".$row["userlevelid"]."' type='button' onclick='edituserlevel(".$row["userlevelid"].")' value='Edit' /></td><td><input id='del_".$row["userlevelid"]."' type='button' onclick='deluserlevel(".$row["userlevelid"].")' value='Del' /></td></tr>\n";
	}
		echo "<tr><td><input type='button' onclick='delselecteduserlevels()' value='Delete\nSelected' /></td><td></td><td></td></tr><tr><td></td>\n";

// add a new userlevel.
	echo "<td><input type='text' id='adddescription' name='adddescription' /></td>";
	
	echo "<td><input name='btnadduserlevel' type='button' value='Add'  onclick='adduserlevel()'/></td><td></td></tr></table></form><div id='statusbar'></div>";
?>
