<?php

// connect to corinthian database.
$corcon = mysql_connect($corhost, $coruser, $corpass);
if (!$corcon)
  die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db('corinthianjobcard', $corcon))
  die('Could not select the corinthianjobcard database.' . mysql_error());

$filename = $_GET['filename'];
$row = 1;
if (($handle = fopen("files//$filename", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
    $num = count($data);
    if ($num < 1)
      die("<p> there are no records in the imported production file: <br /></p>\n");

    $row++;

    for ($c = 0; $c < $num; $c++) {
      switch ($c) {
        case 0: // date
          if ($data[$c] <> '')
            $pdate = $data[$c]; //todo: check production records to make sure this date hasn't already been imported for this workcenter.
          else
            die("There is no date stamp for the production import.");
        case 1: // time
          $ptime = $data[$c];
        case 2: // Workcenter
          if ($data[$c] <> '')
            $pworkcenter = $data[$c];
          else
            die("There is no Workcenter for the production import.");
        case 3: // Division
          if ($data[$c] <> '')
            $pdivision = $data[$c];
          else
            die("There is no Division for the production import.");
        case 4: // Sequence
          $pseq = $data[$c];
        case 5: // Destination
          $pdestination = $data[$c];
        case 6: // Order
          $porder = $data[$c];
        case 7: // Line
          $pline = $data[$c];
        case 8: // Sub
          $psub = $data[$c];
        case 9: // Part
          $ppart = $data[$c];
        case 10: // Generic
          $pgeneric = $data[$c];
        case 11: // userid
          $puserid = $data[$c];
        case 12: // baseid
          $pbaseid = $data[$c];
        case 13: // designid
          $pdesignid = $data[$c];
        case 14: // length
          $plength = $data[$c];
        case 15: // width
          $pwidth = $data[$c];
        case 16: // thickness
          $pthickness = $data[$c];
        case 17: // glassid
          $pglassid = $data[$c];
        case 18: // sch
          $psch = $data[$c];
        case 19: // prod
          $pprod = $data[$c];
        case 20: // ld tm
          $pldtm = $data[$c];
        case 21: // buildqty
          $pbuildqty = $data[$c];
        case 22: // comments
          $pcomments = $data[$c];
      }
      echo $data[$c] . "<br />\n";
    }
  }
  fclose($handle);
}
mysql_close($corcon);
?>