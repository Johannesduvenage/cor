<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Send Production Sheet to Jobcard Server</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
    <script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
    <script language="javascript" type="text/ecmascript" src="scripts/jquery.min.js"></script>
    <script language="javascript" type="text/ecmascript" src="scripts/jquery.fileupload.js"></script>
    <script language="javascript" type="text/ecmascript" src="scripts/jquery.fileupload-ui.js"></script>
    <script language="javascript" type="text/ecmascript" src="scripts/jquery.fileupload-uix.js"></script>
    <script language="javascript" type="text/ecmascript" src="scripts/application.js"></script>
    <script language="JavaScript" type="text/javascript">

      function importproduction()
      {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
            document.getElementById("psheetlist").innerHTML = xmlhttp.responseText;
          }
        }
        //filename=document.getElementByName('file').value;
        xmlhttp.open("GET", "upload.php", true);
        xmlhttp.send();
      }


      function savepsheet(str)
      {

        if (str == "")
        {
          document.getElementById("statusbar").innerHTML = "There are no records selected to save.";
          return;
        }
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
            document.getElementById("psheetlist").innerHTML = xmlhttp.responseText;
          }
        }

        var i = 0;
        var pospsheetid = 0;
        var findpsheetid = 0;
        var psheetid = -1;
        var description = '';
        var baseid = 0;
        var perskin = 0;
        var mould = 0;
        var bead = 0;
        var glaze = 0;
        var persetofskins = 0;

        var psheetlist = document.frmpsheet.editpsheetcheck;
        // SELECT * FROM `production` WHERE `productionid`, `sequence`, `destinationid`, `order`, `line`, `sub`, `part`, `quantity`, `base`, `designid`, `width`, `length`, `ismoulded`, `isbeaded`, `isglazed`, `start`, `stop`, `sch`, `prod`, `ldtm`, `productionheaderid`

        basecode = document.getElementById("basecode_" + str);

        while (i < basecode.length) {
          if (basecode.options[i].selected == true)
            baseid = basecode.options[i].value;
          i++;
        }

        findcodeid = document.getElementById("codeid_" + str);

        i = 0;
        while (i < findcodeid.length) {
          if (findcodeid.options[i].selected == true)
            codeid = findcodeid.options[i].value;
          i++;
        }


        description = document.getElementById("description_" + str).value;
        perskin = toggle(document.getElementById("perskin_" + str).checked);

        mould = toggle(document.getElementById("mould_" + str).checked);

        bead = toggle(document.getElementById("bead_" + str).checked);

        glaze = toggle(document.getElementById("glaze_" + str).checked);

        persetofskins = toggle(document.getElementById("persetofskins_" + str).checked);

        xmlhttp.open("GET", "scripts/savepsheet.php?designid=" + str + "&codeid=" + codeid + "&baseid=" + baseid + "&description=" + description + "&perskin=" + perskin + "&mould=" + mould + "&bead=" + bead + "&glaze=" + glaze + "&persetofskins=" + persetofskins, true);
        xmlhttp.send();
      }

      function addpsheet()
      {
        codeid = document.frmpsheet.addcodeid.value;
        baseid = document.frmpsheet.addbaseid.value;
        description = document.frmpsheet.adddescription.value;
        perskin = toggle(document.frmpsheet.addperskin.checked);
        mould = toggle(document.frmpsheet.addmould.checked);
        bead = toggle(document.frmpsheet.addbead.checked);
        glaze = toggle(document.frmpsheet.addglaze.checked);
        persetofskins = toggle(document.frmpsheet.addpersetofskins.checked);

        if (description == "")
        {
          document.getElementById("statusbar").innerHTML = "data needs to be entered in both fields to add a psheet record.";
          return;
        }
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
            document.getElementById("psheetlist").innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open("GET", "scripts/addpsheet.php?baseid=" + baseid + "&description=" + description + "&perskin=" + perskin + "&mould=" + mould + "&bead=" + bead + "&glaze=" + glaze + "&persetofskins=" + persetofskins, true);
        xmlhttp.send();
      }

      function delpsheet(str) {

        if (str == "")
        {
          document.getElementById("statusbar").innerHTML = "There are no records selected to Delete.";
          return;
        }
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
            document.getElementById("psheetlist").innerHTML = xmlhttp.responseText;
          }
        }

        xmlhttp.open("GET", "scripts/deletepsheet.php?designid=" + str, true);
        xmlhttp.send();

      }

      function delselectedpsheets() {

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
            document.getElementById("psheetlist").innerHTML = xmlhttp.responseText;
          }
        }

        var psheets = document.getElementsByTagName("input");

        var delpsheetlist = new String("");
        var result = new String("");

        for (i = 0; i < psheets.length; i++) {
          if (psheets[i].type == "checkbox") {
            if (psheets[i].checked == true)
              delpsheetlist += psheets[i].value + ",";
            result = delpsheetlist.slice(0, delpsheetlist.lastIndexOf(",", 0));
          }
        }

        xmlhttp.open("GET", "scripts/delselectedpsheets.php?delpsheetlist=" + result, true);
        xmlhttp.send();

      }
    </script>

  </head>
  <body>
    <div id="psheetlist">

      <?php
// connect to corinthian database.
      $corcon = mysql_connect($corhost, $coruser, $corpass);
      if (!$corcon)
        die('Could not connect to mysql: ' . mysql_error());

      if (!mysql_select_db('corinthianjobcard', $corcon))
        die('Could not select the corinthianjobcard database.' . mysql_error());

      require_once('scripts/displayproductionlist.php');

      mysql_close($corcon);
      ?>
    </div>


  </body>
</html>
