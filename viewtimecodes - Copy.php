<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Time Codes</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
    <script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
    <script language="javascript" type="text/ecmascript" src="scripts/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript">

      function setsearch()
      {
        $('#btnsearchtimecode').click('searchtimecode');
      }
      function searchtimecode()
      {


        /*
         if (window.XMLHttpRequest)
         {// code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp=new XMLHttpRequest();
         }
         else
         {// code for IE6, IE5
         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
         }
         xmlhttp.onreadystatechange=function()
         {
         if (xmlhttp.readyState==4 && xmlhttp.status==200)
         {
         document.getElementById("foundblock").innerHTML=xmlhttp.responseText;
         }
         }*/

        description = encodeURIComponent(document.getElementById('description').value);
        perskin = encodeURIComponent(document.getElementById('perskin').checked);
        mould = encodeURIComponent(document.getElementById('mould').checked);
        bead = encodeURIComponent(document.getElementById('bead').checked);
        glaze = encodeURIComponent(document.getElementById('glaze').checked);
        persetofskins = encodeURIComponent(document.getElementById('persetofskins').checked);

        //xmlhttp.open("GET","scripts/searchtimecode.php?description="+description+"&perskin="+perskin+"&mould="+mould+"&bead="+bead+"&glaze="+glaze+"&persetofskins="+persetofskins, true);
        //xmlhttp.send();

        $.get('searchtimecode.php?description=' + description + '&perskin=' + perskin + '&mould=' + mould + '&bead=' + bead + '&glaze=' + glaze + '&persetofskins=' + persetofskins, showtimecodes);

      }
      function showtimecodes(res)
      {
        $('#foundblock').html(res)
      }
      $(document).ready(setsearch);

    </script>

  </head>
  <body>
    <div id="timecodelist">
      <?php
// connect to corinthian database.
      $corcon = mysql_connect($corhost, $coruser, $corpass);
      if (!$corcon)
        die('Could not connect to mysql: ' . mysql_error());

      if (!mysql_select_db('corinthianjobcard', $corcon))
        die('Could not select the corinthianjobcard database.' . mysql_error());

      require_once('scripts/displaytimecodeviewer.php');

      mysql_close($corcon);
      ?>
    </div>
    <div>
      <table>
        <tr><td>Design</td><td>

            <input id='description' name='description' type='text' /></td>
          <td><input name="perskin" id="perskin" type="checkbox" /></td><td><input name="mould" id="mould" type="checkbox" /></td><td><input name="bead" id="bead" type="checkbox" /></td><td><input name="glaze" id="glaze" type="checkbox" /></td><td><input name="persetofskins" id="persetofskins" type="checkbox" /></td>
          <td><input name='btnsearchtimecode' id='btnsearchtimecode' type='button' value='Search'  /></td><td></td></tr><tr><td><div id='foundblock'></div></td><td cospan='3'></td></tr></table>
      <div id='statusbar'></div>

  </body>
</html>
