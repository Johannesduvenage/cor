<?php
require_once("cormain.php");
$corquery = 'SELECT * FROM codes
ORDER BY codeid';
$qry = mysql_query($corquery, $corcon);
if (!$qry)
  die('Could not query on line 70.' . $corquery . '     ' . mysql_error());

$count = 0;
while ($row = mysql_fetch_assoc($qry)) {
  $count++;
  ?>
  <tr>
    <td align="center">
      <input type="checkbox" name="edittimecodecheck" id="edittimecodecheck_<?php echo $row["codeid"] ?>" value="<?php echo $row["codeid"] ?>" class="form-control" />
    </td>
    <td>
      <input type="text" id="codeid_<?php echo $row["codeid"] ?>" value="<?php echo $row["codeid"] ?>"  disabled="disabled" class="form-control" />
    </td>
    <td>
      <input type="text" id="timeperiod_<?php echo $row["codeid"] ?>" value="<?php echo $row["timeperiod"] ?>" disabled="disabled" class="form-control" />
    </td>
    <td>
      <input id="edit_<?php echo $row["codeid"] ?>" type="button" onclick="edittimecode(<?php echo $row["codeid"] ?>)" value="Edit" class="form-control btn btn-default" />
    </td>
    <td>
      <input id="del_<?php echo $row["codeid"] ?>" type="button" onclick="deltimecode(<?php echo $row["codeid"] ?>)" value="Del" class="form-control btn btn-default" />
    </td>
  </tr>
  <?php
}
?>