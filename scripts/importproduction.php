<?php

// Where the file is going to be placed 
require_once ('scripts/cormain.php');
// connect to corinthian database.
//error_reporting(E_STRICT ^ E_WARNING);
$corcon = mysql_connect($corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());


$targetpath = $corroot . '/files';

// open updload folder
if ($handle = opendir($targetpath)) {
  // $pattern = '*.csv';
  $x = 0;
  // echo '<br />';
  while (false !== ($file = readdir($handle))) {
    if ($file !== '..' && $file !== '.') {
      $filearray[$x] = $file;
      $x++;
    }
  }
  closedir($handle);
}
$y = 0; // $y increments to access the next file in the upload folder.
while ($x > 0) {
  $row[$y] = 0;
  if (($handle = fopen($targetpath . '/' . $filearray[$y], "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $num = count($data);
      for ($z = 0; $z < $num; $z++) {
        switch ($z) {
          case 5:
          case 7:
          case 8:
          case 21:
          case 11:
          case 12:
          case 13:
          case 17:
          case 15:
          case 14:
          case 16:
            if ($data[$z] == '')
              $data[$z] = 0;
        }
      }
      if ($row[$y] == 1) {
        $cortime = $data[1];
        $cordate = strtodate('d/m/Y', $data[0]);
        $corquery1 = "INSERT INTO productionheader (date,time,workcenterid,divisionid) VALUES ('" . $cordate . "', '" . $cortime . "', " . $data[2] . ", " . $data[3] . ")";
        //echo $corquery1."<br />";
        $qry1 = mysql_query($corquery1, $corcon);
        $productionheaderid = mysql_insert_id();
        if (!$qry1)
          die('Could not run add record query on line 45.' . $corquery1 . '     ' . mysql_error());
      }
      if ($row[$y] > 0) {
        $cordate = strtodate('d/m/Y', $data[19]);
        $corquery2 = "INSERT INTO production (sequence,destinationid,ordernum,line,sub,part,quantity,generic,userid,baseid,designid,glassid,width,length,thickness,ismoulded,isbeaded,isglazed,sch,prod,ldtm,comments,productionheaderid) VALUES ('" . $data[4] . "', " . $data[5] . ", '" . $data[6] . "', " . $data[7] . ", " . $data[8] . ", '" . $data[9] . "', " . $data[21] . ", '" . $data[10] . "', " . $data[11] . ", " . $data[12] . ", " . $data[13] . ", " . $data[17] . ", " . $data[15] . ", " . $data[14] . ", " . $data[16] . ",0,0,0, '" . $data[18] . "', '" . $cordate . "', '" . $data[20] . "', '" . $data[22] . "', " . $productionheaderid . ")";
        $qry2 = mysql_query($corquery2, $corcon);
        if (!$qry2)
          die('Could not run add record query on line 67.' . $corquery2 . '     ' . mysql_error());
      }
      $row[$y] ++;
    }
    fclose($handle);
  }
  $y++;
  $x--;
}
// todo: uncomment the next four lines.
// delete imported files
//for($z=0;$z<$y;$z++) {
//unlink($targetpath.'/'.$filearray[$z]);
//}
?>