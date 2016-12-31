<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Manage Time Codes</title>
  <link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap-theme.min.css" />
  <script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
  <script src="scripts/managetimecodes.js" type="text/javascript"></script>
</head>
<body>
  <div id="timecodelist">
    <?php
    require_once('scripts/cormain.php');

// connect to corinthian database.
    $corcon = mysql_connect($corhost, $coruser, $corpass);

    if (!$corcon) {
      die('Could not connect to mysql: ' . mysql_error());
    }

    if (!mysql_select_db('corinthianjobcard', $corcon)) {
      die('Could not select the corinthianjobcard database.' . mysql_error());
    }
    ?>
    <div class="container top-padding">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-heading">Corinthian - Manage Time Codes</div>
              <div class="form-group panel-body">
                <form name="frmtimecode" id="frmtimecode" class="">
                  <table>
                    <tr>
                      <th class="tdheader">
                        <a href="#" title="Check or uncheck all for edit or removal" onClick="toggleselectall(document.frmtimecode.edittimecodecheck)">(Un)Select All</a>
                      </th>
                      <th class="tdheader">Time Code</th>
                      <th class="tdheader">Time Period</th><th colspan="2" class="tdheader"></th>
                    </tr>
                    <?php require_once('scripts/displaytimecodelist.php'); ?>
                    <tr>
                      <td><input type="button" onclick="delselectedtimecodes()" value="Del" class="form-control btn btn-default" title="Delete Checked Items" /></td>
                      <td><input type="text" id="addcodeid" class="form-control" /> </td>
                      <td><input type="text" id="addtimeperiod" class="form-control" /> </td>
                      <td colspan="2"><input name="btnaddtimecode" type="button" value="Add"  onclick="addtimecode()" class="form-control btn btn-default pull-right" /></td>
                    </tr>
                  </table>
                </form>
              </div>
              <div id="statusbar">
              </div>
              <?php mysql_close($corcon); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4"></div>                
  </div>
</body>
</html>
