<?php

require_once('cormain.php');

// { caching functions
function cache_load($md5) {
  if (file_exists('../cache/' . $md5)) {
    return json_decode(file_get_contents('../cache/' . $md5), true);
  }
  return false;
}

function cache_save($md5, $vals) {
  file_put_contents('../cache/' . $md5, json_encode($vals));
}

// }
// { initialise variables
$amt = 10;
$start = 0;
// }
// connect to corinthian database.
$corcon = mysql_connect($corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());

$corquery = "SELECT designs.codeid, designs.description, bases.basecode, bases.basedescription, designs.perskin, designs.mould, designs.bead, designs.glaze, designs.persetofskins, codes.timeperiod
    FROM designs
    LEFT JOIN bases 
    USING (baseid)
    LEFT JOIN codes
	USING (codeid)";




//$qry = mysql_query($corquery,$corcon);
// { count existing records
$corquery2 = "SELECT count(codeid) as c
    FROM designs
    LEFT JOIN bases 
    USING (baseid)
    LEFT JOIN codes
	USING (codeid)";

$r = dbRow($corquery2);
$total_records = $r['c'];

// }
// { start displaying records
echo '{"iTotalRecords":' . $total_records . ', "iTotalDisplayRecords":' . $total_records . ', "aaData":[';
$rs = dbAll($corquery);
$f = 0;
foreach ($rs as $r) {
  if ($f++)
    echo ',';

  if ($r['perskin'] == 1) {
    $perskin = 'PSK';
  } else {
    $perskin = '';
  }
  if ($r['mould'] == 1) {
    $mould = 'M';
  } else {
    $mould = '';
  }
  if ($r['bead'] == 1) {
    $bead = 'B';
  } else {
    $bead = '';
  }
  if ($r['glaze'] == 1) {
    $glaze = 'G';
  } else {
    $glaze = '';
  }
  if ($r['persetofskins']) {
    $persetofskins = 'SET';
  } else {
    $persetofskins = '';
  }


  echo '["' . $r['codeid'] . '", "' . $r['timeperiod'] . '", "' . $r['basecode'] . '", "' . $r['description'] . '", "' . $perskin . '", "' . $mould . '", "' . $bead . '", "' . $glaze . '", "' . $persetofskins . '"]';
}
echo ']}';
// }
mysql_close($corcon);
?>

