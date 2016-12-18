<?php
require_once("cormain.php");
//$corquery='SELECT * FROM codes'; 

 $corquery = "SELECT codes.codeid, designs.description, designs.perskin, designs.mould, designs.bead, designs.glaze, designs.persetofskins, codes.timeperiod
    FROM codes
    LEFT JOIN designs
	USING (codeid)
	ORDER BY CONVERT(codeid, UNSIGNED)"; // Tip: Convert fixes the the problem with sorting by numbers in SQL.

$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not query on line 70.'.$corquery.'     '.mysql_error());
	echo "<form name='frmtimecode' id='frmtimecode'><table><tr><th class='tdheader'>Time Code</th><th class='tdheader'>Description</th><th class='tdheader'>Per Skin</td><th class='tdheader'>Mould</td><th class='tdheader'>Bead</td><th class='tdheader'>Glaze</td><th class='tdheader'>Per Set of Skins</td><th class='tdheader'>Time Period</th><th  class='tdheader'></th></tr>\n";

	while($row = mysql_fetch_assoc($qry)) {

		$description = mysql_real_escape_string($row["description"]);
		$perskin = mysql_real_escape_string($row["perskin"]);
		$bead = mysql_real_escape_string($row["bead"]);
		$mould = mysql_real_escape_string($row["mould"]);
		$glaze = mysql_real_escape_string($row["glaze"]);
		$persetofskins = mysql_real_escape_string($row["persetofskins"]);

		if($perskin == 1) $perskin = 'SKIN';
		else $perskin = '';
		if($bead == 1) $bead = 'B';
		else $bead = '';
		if($mould == 1) $mould = 'M';
		else $mould = '';
		if($glaze == 1) $glaze = 'G';
		else $glaze = '';
		if($persetofskins == 1) $setsperskin = 'SET';
		else $persetofskins = '';

		echo "<td>".$row['codeid']."</td><td>".$row['description']."</td><td>".$perskin."</td><td>".$mould."</td><td>".$bead."</td><td>".$glaze."</td><td>".$persetofskins."</td><td>".$row['timeperiod']."</td></tr>\n";
	}
	echo "</table>";
?>