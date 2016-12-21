<?php

require_once("cormain.php");

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

$corquery = "SELECT production.productionid, production.sequence, production.destinationid, production.ordernum, production.line, production.sub, production.part, production.quantity, production.generic, production.userid, production.baseid, production.designid, production.glassid, production.width, production.length, production.thickness, production.ismoulded, production.isbeaded, production.isglazed, production.sch, production.prod, production.ldtm, production.comments, production.productionheaderid, productionheader.productionheaderid, productionheader.date, productionheader.time, productionheader.workcenterid, productionheader.divisionid, productionheader.schedule
FROM production
LEFT JOIN productionheader
USING (productionheaderid)
WHERE production.productionheaderid = 1";

//$qry = mysql_query($corquery,$corcon);
// { count existing records
$corquery2 = "SELECT count(productionid) as c
    FROM production
    LEFT JOIN productionheader 
    USING (productionheaderid)";

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
  echo '["' . $r['date'] .
  '", "' . $r['time'] .
  '", "' . $r['divisionid'] .
  '", "' . $r['sequence'] .
  '", "' . $r['workcenterid'] .
  '", "' . $r['schedule'] .
  '", "' . $r['destinationid'] .
  '", "' . $r['ordernum'] .
  '", "' . $r['line'] .
  '", "' . $r['sub'] .
  '", "' . $r['part'] .
  '", "' . $r['quantity'] .
  '", "' . $r['generic'] .
  '", "' . $r['userid'] .
  '", "' . $r['baseid'] .
  '", "' . $r['designid'] .
  '", "' . $r['glassid'] .
  '", "' . $r['width'] .
  '", "' . $r['length'] .
  '", "' . $r['thickness'] .
  '", "' . $r['ismoulded'] .
  '", "' . $r['isbeaded'] .
  '", "' . $r['isglazed'] .
  '", "' . $r['sch'] .
  '", "' . $r['prod'] .
  '", "' . $r['ldtm'] .
  '", "' . $r['comments'] . '"]';
}
echo ']}';
// }
mysql_close($corcon);
?>
