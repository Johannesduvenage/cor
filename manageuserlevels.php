<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Manage User Levels</title><link href="css/cormain.css" rel="stylesheet" type="text/css" media="screen" />
    <script language="javascript" type="text/ecmascript" src="scripts/cormain.js"></script>
    <script language="JavaScript" type="text/javascript">

      function edituserlevel(str) {
        description = document.getElementById("description_" + str);

        saveButton = document.getElementById("edit_" + str);

        if (saveButton.value == "Edit") {
          saveButton.value = "Save";
          saveButton.onclick = function () {
            saveuserlevel(str)
          };
          description.disabled = "";
        }
        else if (saveButton.value == "Save") {
          saveButton.value = "Edit";
          saveButton.onclick = "edituserlevel(" + str + ")";
          description.disabled = "disabled";
        }
      }

      function saveuserlevel(str)
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
            document.getElementById("userlevellist").innerHTML = xmlhttp.responseText;
          }
        }

        description = encodeURIComponent(document.getElementById("description_" + str).value);

        xmlhttp.open("GET", "scripts/saveuserlevel.php?userlevelid=" + str + "&description=" + description, true);
        xmlhttp.send();
      }

      function adduserlevel()
      {
        description = encodeURIComponent(document.frmuserlevel.adddescription.value);

        if (description == "")
        {
          document.getElementById("statusbar").innerHTML = "data needs to be entered in both fields to add a userlevel record.";
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
            document.getElementById("userlevellist").innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open("GET", "scripts/adduserlevel.php?description=" + description, true);
        xmlhttp.send();
      }

      function deluserlevel(str) {

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
            document.getElementById("userlevellist").innerHTML = xmlhttp.responseText;
          }
        }

        xmlhttp.open("GET", "scripts/deleteuserlevel.php?userlevelid=" + encodeURIComponent(str), true);
        xmlhttp.send();

      }

      function delselecteduserlevels() {

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
            document.getElementById("userlevellist").innerHTML = xmlhttp.responseText;
          }
        }

        var userlevels = document.getElementsByTagName("input");

        var deluserlevellist = new String("");
        var result = new String("");

        for (i = 0; i < userlevels.length; i++) {
          if (userlevels[i].type == "checkbox") {
            if (userlevels[i].checked == true)
              deluserlevellist += userlevels[i].value + ",";
            result = deluserlevellist.slice(0, deluserlevellist.lastIndexOf(",", 0));
          }
        }

        xmlhttp.open("GET", "scripts/delselecteduserlevels.php?deluserlevellist=" + result, true);
        xmlhttp.send();

      }

      function createuserlevelname() {
        var userlevelname = new String(document.getElementById("adduserlevelname").value);
        var fullname = new String(document.getElementById("addfullname").value);
        userlevelname = fullname.slice(0, fullname.lastIndexOf(" "));

        document.getElementById("adduserlevelname").value = userlevelname.toLowerCase();
      }

    </script>

  </head>
  <body>
    <div id="userlevellist">
      <?php
      require_once('scripts/cormain.php');
// connect to corinthian database.
      $corcon = mysql_connect($corhost, $coruser, $corpass);
      if (!$corcon)
        die('Could not connect to mysql: ' . mysql_error());

      if (!mysql_select_db('corinthianjobcard', $corcon))
        die('Could not select the corinthianjobcard database.' . mysql_error());

      require_once('scripts/displayuserlevellist.php');

      mysql_close($corcon);
      ?>
  </body>
</html>
