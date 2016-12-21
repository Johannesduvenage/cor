<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Manage destinations</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
    <script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
    <script language="JavaScript" type="text/javascript">

      function editdestination(str) {
        description = document.getElementById("description_" + str);

        saveButton = document.getElementById("edit_" + str);

        if (saveButton.value == "Edit") {
          saveButton.value = "Save";
          saveButton.onclick = function () {
            savedestination(str)
          };
          description.disabled = "";
        }
        else if (saveButton.value == "Save") {
          saveButton.value = "Edit";
          saveButton.onclick = "editdestination(" + str + ")";
          fullname.disabled = "disabled";
          username.disabled = "disabled";
          userlevel.disabled = "disabled";
        }
      }

      function savedestination(str)
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
            document.getElementById("destinationlist").innerHTML = xmlhttp.responseText;
          }
        }

        description = encodeURIComponent(document.getElementById("description_" + str).value);

        xmlhttp.open("GET", "scripts/savedestination.php?destinationid=" + encodeURIComponent(str) + "&description=" + description, true);
        xmlhttp.send();
      }

      function adddestination()
      {
        description = encodeURIComponent(document.frmdestination.adddescription.value);

        if (description == "")
        {
          document.getElementById("statusbar").innerHTML = "data needs to be entered in both fields to add a destination record.";
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
            document.getElementById("destinationlist").innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open("GET", "scripts/adddestination.php?description=" + description, true);
        xmlhttp.send();
      }

      function deldestination(str) {

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
            document.getElementById("destinationlist").innerHTML = xmlhttp.responseText;
          }
        }

        xmlhttp.open("GET", "scripts/deletedestination.php?destinationid=" + encodeURIComponent(str), true);
        xmlhttp.send();

      }

      function delselecteddestinations() {

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
            document.getElementById("destinationlist").innerHTML = xmlhttp.responseText;
          }
        }

        var destinations = document.getElementsByTagName("input");

        var deldestinationlist = new String("");
        var result = new String("");

        for (i = 0; i < destinations.length; i++) {
          if (destinations[i].type == "checkbox") {
            if (destinations[i].checked == true)
              deldestinationlist += destinations[i].value + ",";
            result = encodeURIComponent(deldestinationlist.slice(0, deldestinationlist.lastIndexOf(",", 0)));
          }
        }

        xmlhttp.open("GET", "scripts/delselecteddestinations.php?deldestinationlist=" + result, true);
        xmlhttp.send();

      }
    </script>

  </head>
  <body>
    <div id="destinationlist">
      <?php
      require_once('scripts/cormain.php');
// connect to corinthian database.
      $corcon = mysql_connect($corhost, $coruser, $corpass);
      if (!$corcon)
        die('Could not connect to mysql: ' . mysql_error());

      if (!mysql_select_db('corinthianjobcard', $corcon))
        die('Could not select the corinthianjobcard database.' . mysql_error());

      require_once('scripts/displaydestinationlist.php');

      mysql_close($corcon);
      ?>
  </body>
</html>
