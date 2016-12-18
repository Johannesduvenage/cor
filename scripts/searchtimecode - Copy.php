<?php
// connect to corinthian database.
$corcon = mysql_connect$corhost,$coruser,$corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
	die('Could not select the corinthianjobcard database.'.mysql_error());
$description = mysql_real_escape_string($_GET["description"]);
$perskin = mysql_real_escape_string($_GET["perskin"]);
$bead = mysql_real_escape_string($_GET["bead"]);
$mould = mysql_real_escape_string($_GET["mould"]);
$glaze = mysql_real_escape_string($_GET["glaze"]);
$persetofskins = mysql_real_escape_string($_GET["persetofskins"]);

 $corquery = "SELECT designs.codeid, designs.description, bases.basecode, bases.basedescription, designs.perskin, designs.mould, designs.bead, designs.glaze, designs.persetofskins, codes.timeperiod
    FROM designs
    LEFT JOIN bases 
    USING (baseid)
    LEFT JOIN codes
	USING (codeid)
	WHERE designs.description Like '%".$description."%'
	";
	
$isperskin = 'designs.perskin = 1';
$isbead = 'designs.bead = 1';
$ismould = 'designs.mould = 1';
$isglaze = 'designs.glaze = 1';
$issetsperskin = 'designs.persetofskins = 1';

if($perskin == 'true') { $corquery = $corquery.' AND '.$isperskin;$perskin = 'SKIN'; }
if($bead == 'true') { $corquery = $corquery.' AND '.$isbead;$bead = 'B'; }
if($mould == 'true') { $corquery = $corquery.' AND '.$ismould;$mould = 'M'; }
if($glaze == 'true') { $corquery = $corquery.' AND '.$isglaze;$glaze = 'G'; }
if($persetofskins == 'true') { $corquery = $corquery.' AND '.$issetsperskin;$setsperskin = 'SET'; }
//echo $corquery.', '.$perskin;
//die();
// `designid`, `description`, `baseid`, `codeid`, `perskin`, `mould`, `bead`, `glaze`, `persetofskins`
$qry = mysql_query($corquery,$corcon);
if(!$qry)
	die('Could not run update query on line 11.'.$corquery.'     '.mysql_error());

while($row = mysql_fetch_assoc($qry)) {
if($row['perskin'] == 1) 
{
	$perskin = 'PSK';
}
else 
{
	$perskin = '';
}
if($row['mould'] == 1) 
{
	$mould = 'M';
}
else 
{
	$mould = '';
}
if($row['bead'] == 1) 
{
	$bead = 'B';
}
else 
{
	$bead = '';
}
if($row['glaze'] == 1) 
{
	$glaze = 'G';
}
else 
{
	$glaze = '';
}
if($row['persetofskins']) 
{
	$persetofskins = 'SET';
}
else 
{
	$persetofskins = '';
}

	echo '<tr><td>'.$row['codeid'].'</td><td>'.$row['timeperiod'].'</td><td>'.$row['basecode'].'</td><td>'.$row['description'].'</td><td>'.$perskin.'</td><td>'.$mould.'</td><td>'.$bead.'</td><td>'.$glaze.'</td><td>'.$persetofskins.'</td></tr>';
}
mysql_close($corcon);
?>

