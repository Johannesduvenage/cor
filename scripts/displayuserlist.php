<?php
	require_once('cormain.php');
	$corquery='SELECT * FROM users ORDER BY username'; 
	$qry = mysql_query($corquery,$corcon);
	if(!$qry)
		die("Could not query on line 70.".$corquery."     ".mysql_error());
	// get list of users
	// edit users
	// del users
	// add users
	//
	// todo: put in validation for all fields in this whole project.
	// todo: check commenting
	// field list: `userid`, `fullname`, `username`, `userpass`, `userlevel`, `workcenterid`
	// don"t allow admin to see passwords of other users.
?>
	<form name="frmuser" id="frmuser">
		<table>
			<tr>
				<th class="tdheader"><a href="#" title="Check or uncheck all for edit or removal" 
					onClick="toggleselectall(document.frmuser.editusercheck)">(Un)check All</a>
				</th>
				<th class="tdheader">Full Name</th>
				<th class="tdheader">User Name</th>
				<th  class="tdheader">User Level</th>
				<th colspan="2" class="tdheader"></th>
			</tr>
			<?php
				$count=0;
				while($row = mysql_fetch_assoc($qry)): 
					$count++;
			?>
			<tr>
				<td align="center">
					<input type="checkbox" name="editusercheck" id="editusercheck_<?php echo $row['userid'] ?>" value="<?php echo $row['userid'] ?>" />
				</td>
				<td>
					<input type="text" id="fullname_<?php echo $row['userid'] ?>" value="<?php echo $row['fullname'] ?>"  disabled="disabled" />
				</td>
				<td>
					<input type="text" name="username_<?php echo $row['userid'] ?>" id="username_<?php echo $row['userid'] ?>" value="<?php echo $row['username'] ?>" disabled="disabled" />
				</td>
				<?php //fill userlevel dropdown list begin ?>
				<td>
					<select id="userlevelid_<?php echo $row['userid'] ?>"  disabled="disabled" value="<?php echo $row['userid'] ?>">
						<?php
							$userlevelquery = "SELECT * from userlevels";
							$qryuserlevel = mysql_query($userlevelquery,$corcon);
		
							// get user level for current user.
							while($rowuserlevel = mysql_fetch_assoc($qryuserlevel)): //get next userlevel record.
								// check for matching userlevel and user.
								if($rowuserlevel['userlevelid'] == $row['userlevelid']): // 
						?>
						<option selected="selected" value="<?php echo $rowuserlevel['userlevelid'] ?>">
							<?php echo $rowuserlevel['userlevelid'].' '.$rowuserlevel['description'] ?>
						</option>
						<?php
								else: // fill list with rest of the userlevels.
						?>
						<option value="<?php echo $rowuserlevel['userlevelid'] ?>">
							<?php echo $rowuserlevel['userlevelid'] ?>&#47;&#47;&gt;<?php echo $rowuserlevel['description'] ?>
						</option>
								<?php endif;
						 endwhile; ?>
					</select>
				</td>
				<?php //fill userlevel dropdown list end ?>
				<td>
					<input id="edit_<?php echo $row['userid'] ?>" type="button" onclick="edituser(<?php echo $row['userid'] ?>)" value="Edit" />
				</td>
				<td>
					<input id="del_<?php echo $row['userid'] ?>" type="button" onclick="deluser(<?php echo $row['userid'] ?>)" value="Del" />
				</td>
			</tr>
		<?php endwhile; ?>
			<tr>
				<td>
					<input type="button" onclick="delselectedusers()" value="Delete Selected" />
				</td>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td></td>
				<?php // add a new user. ?>
				<td>
					<input type="text" id="addfullname" name="addfullname" onblur="createusername()" />
				</td>
				<td>
					<input type="text" name="addusername" id="addusername" />
				</td>
				<?php //fill userlevel dropdown list begin ?>
				<td>
					<select id="adduserlevelid">
					<?php
						// reset record pointer to 0
						if (!mysql_data_seek($qryuserlevel, 0)): 
							die("Cannot seek to row $i: " . mysql_error() . "\n");
						endif;
						// get user level for current user.
						while($rowuserlevel = mysql_fetch_assoc($qryuserlevel)): //get next userlevel record.
							// check for matching userlevel and user.
							if($rowuserlevel['userlevelid'] == $row['userlevelid']):  // 
					?>
						<option selected="selected" value="<?php echo $rowuserlevel['userlevelid'] ?>"><?php echo $rowuserlevel['userlevelid'] ?>&#45;&#45;&gt;<?php echo $rowuserlevel['description'] ?>
						</option>
					<?php
							else: // fill list with rest of the userlevels.
					?>
						<option value="<?php echo $rowuserlevel['userlevelid'] ?>"> <?php echo $rowuserlevel['userlevelid'] ?>&#45;&#45;&gt;<?php echo $rowuserlevel['description'] ?>
						</option>
						<?php endif;
						endwhile;?>
					</select>
				</td>
				<?php //fill userlevel dropdown list end ?>
				<td colspan="2">
					<input name="btnadduser" type="button" value="Add" onclick="adduser()" />
				</td>
			</tr>
		</table>
	</form>
<div id="statusbar"></div>
