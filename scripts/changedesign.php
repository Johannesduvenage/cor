<?php
require_once('cormain.php');
// connect to corinthian database.
$corcon = mysql_connect$corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());

$corquery="SELECT * FROM designs"; 
$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not query on line 23.'.$corquery.'     '.mysql_error());
	echo "<form name='changedesign' id='changedesign'><table><tr><th>Design ID</th><th>Base Type</th><th>Description</th></tr>\n";
	$count=0;
	while($row = mysql_fetch_assoc($qry)) {
		$count++;
		echo "<tr><td>".$row['designid']."</td><td>";
        echo "<select name='base".$count."'>\n";
        $basequery = "SELECT * from bases";
        $qrybase = mysql_query($basequery,$corcon);
        while($rowbase = mysql_fetch_assoc($qrybase)) {
        	// fill dropdown list for design with design names.
            // point to the design for the current record.
      		echo "<option value='".$rowbase['baseid']."'";
			if($rowbase['baseid'] == $row['baseid'])
				echo " selected='selected'";
			echo ">".$rowbase['basecode']."</option>\n";
            }
	echo "</select></td><td><input type='text' value='".$row['description']."'/></td></tr>\n";
	}
	echo "</table></form>";
?>
