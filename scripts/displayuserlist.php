<?php
require_once("cormain.php");
$corquery='SELECT * FROM users ORDER BY username'; 
$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not query on line 70.'.$corquery.'     '.mysql_error());
// get list of users
// edit users
// del users
// add users
//
// todo: put in validation for all fields in this whole project.
//
// field list: `userid`, `fullname`, `username`, `userpass`, `userlevel`, `workcenterid`
// don't allow admin to see passwords of other users.
	echo "<form name='frmuser' id='frmuser'><table><tr><th class='tdheader'>".'<a href="#" title="Check or uncheck all for edit or removal" onClick="toggleselectall(document.frmuser.editusercheck)">Check All/<br />Uncheck All</a>'."</th><th class='tdheader'>Full Name</th><th class='tdheader'>User Name</th><th  class='tdheader'>User Level</th><th colspan='2' class='tdheader'></th></tr>\n";
$count=0;
	while($row = mysql_fetch_assoc($qry)) {
		$count++;
		echo "<tr><td align='center'><input type='checkbox' name='editusercheck' id='editusercheck_".$row["userid"]."' value='".$row["userid"]."'></input></td>";
		
		echo "<td><input type='text' id='fullname_".$row["userid"]."' value='".$row['fullname']."'  disabled='disabled' /></td><td><input type='text' name='username_".$row["userid"]."' id='username_".$row["userid"]."' value='".$row["username"]."' disabled='disabled' /></td>";

//fill userlevel dropdown list begin
		echo "<td><select id='userlevelid_".$row["userid"]."'  disabled='disabled' value='".$row["userid"]."'> ";
        $userlevelquery = "SELECT * from userlevels";
        $qryuserlevel = mysql_query($userlevelquery,$corcon);
	
    	// get user level for current user.
        while($rowuserlevel = mysql_fetch_assoc($qryuserlevel)) { //get next userlevel record.
			// check for matching userlevel and user.
			if($rowuserlevel['userlevelid'] == $row['userlevelid']) // 
				echo "<option selected='selected' value='".$rowuserlevel['userlevelid']."'>".$rowuserlevel['userlevelid']."-->".$rowuserlevel['description']."</option>";
			else // fill list with rest of the userlevels.
				echo "<option value='".$rowuserlevel['userlevelid']."'>".$rowuserlevel['userlevelid']."&mdash;&gt;".$rowuserlevel['description']."</option>";
			}
		echo "</select></td>";
//fill userlevel dropdown list end

		echo "<td><input id='edit_".$row["userid"]."' type='button' onclick='edituser(".$row["userid"].")' value='Edit' /></td><td><input id='del_".$row["userid"]."' type='button' onclick='deluser(".$row["userid"].")' value='Del' /></td></tr>\n";
	}
		echo "<tr><td><input type='button' onclick='delselectedusers()' value='Delete\nSelected' /></td><td></td><td></td></tr><tr><td></td>\n";

// add a new user.
	echo "<td><input type='text' id='addfullname' name='addfullname' onblur='createusername()' /> </td><td><input type='text' name='addusername' id='addusername' /></td>";
	
//fill userlevel dropdown list begin
		echo "<td><select id='adduserlevelid' ";
		// reset record pointer to 0
		if (!mysql_data_seek($qryuserlevel, 0))
			die("Cannot seek to row $i: " . mysql_error() . "\n");

    	// get user level for current user.
        while($rowuserlevel = mysql_fetch_assoc($qryuserlevel)) { //get next userlevel record.
			// check for matching userlevel and user.
			if($rowuserlevel['userlevelid'] == $row['userlevelid']) // 
				echo "<option selected='selected' value='".$rowuserlevel['userlevelid']."'>".$rowuserlevel['userlevelid']."-->".$rowuserlevel['description']."</option>";
			else // fill list with rest of the userlevels.
				echo "<option value='".$rowuserlevel['userlevelid']."'>".$rowuserlevel['userlevelid']."-->".$rowuserlevel['description']."</option>";
			}
		echo "</select></td>";
//fill userlevel dropdown list end

	echo "<td><input name='btnadduser' type='button' value='Add'  onclick='adduser()'/></td><td></td></tr></table></form><div id='statusbar'></div>";
?>
