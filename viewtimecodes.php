<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Time Codes</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
    <script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
    <script language="javascript" type="text/ecmascript" src="scripts/jquery.min.js"></script>
    <script language="javascript" type="text/ecmascript" src="scripts/jquery.datatables.min.js"></script>
    <style type="text/css">
      @import "css/demo_table.css";
      table{width:100%}
    </style>

    <script language="JavaScript" type="text/ecmascript">

      $(document).ready(function() {
      $('#timecodelist').dataTable({
      'sAjaxSource':'scripts/searchtimecode.php'
      })
      });

    </script>

  </head>
  <body>
    <div style='width:100%'>
      <table id='timecodelist'>
        <thead>
          <tr><th>Code</th>
            <th>Time</th>
            <th>Base</th>
            <th>Description</th>
            <th>Per Skin</th>
            <th>Mould</th>
            <th>Bead</th>
            <th>Glaze</th>
            <th>Per Set of Skins</th>
          </tr>
        </thead>
        <tbody>
        </tbody></table>
    </div>
  </body>
</html>
