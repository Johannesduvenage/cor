/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function edittimecode(str) {
  codeid = document.getElementById("codeid_" + str);
  timeperiod = document.getElementById("timeperiod_" + str);

  saveButton = document.getElementById("edit_" + str);

  if (saveButton.value === "Edit") {
    saveButton.value = "Save";
    saveButton.onclick = function () {
      savetimecode(str);
    };
    codeid.disabled = "";
    timeperiod.disabled = "";
  }
  else if (saveButton.value === "Save") {
    saveButton.value = "Edit";
    saveButton.onclick = "edittimecode(" + str + ")";
    codeid.disabled = "disabled";
    timeperiod.disabled = "disabled";
  }
}

function savetimecode(str)
{

  if (str === "")
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
    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
    {
      document.getElementById("timecodelist").innerHTML = xmlhttp.responseText;
    }
  };

  var i = 0;


  timeperiod = encodeURIComponent(document.getElementById("timeperiod_" + str).value);

  xmlhttp.open("GET", "scripts/savetimecode.php?codeid=" + encodeURIComponent(str) + "&timeperiod=" + timeperiod, true);
  xmlhttp.send();
}

function addtimecode()
{
  codeid = encodeURIComponent(document.frmtimecode.addcodeid.value);
  timeperiod = encodeURIComponent(document.frmtimecode.addtimeperiod.value);

  if (codeid === "" || timeperiod === "")
  {
    document.getElementById("statusbar").innerHTML = "data needs to be entered in both fields to add a timecode record.";
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
    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
    {
      document.getElementById("timecodelist").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "scripts/addtimecode.php?codeid=" + codeid + "&timeperiod=" + timeperiod, true);
  xmlhttp.send();
}

function deltimecode(str) {

  if (str === "")
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
    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
    {
      document.getElementById("timecodelist").innerHTML = xmlhttp.responseText;
    }
  };

  xmlhttp.open("GET", "scripts/deletetimecode.php?codeid=" + encodeURIComponent(str), true);
  xmlhttp.send();

}

function delselectedtimecodes() {

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
    if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
    {
      document.getElementById("timecodelist").innerHTML = xmlhttp.responseText;
    }
  };

  var timecodes = document.getElementsByTagName("input");

  var deltimecodelist = new String("");
  var result = new String("");

  for (i = 0; i < timecodes.length; i++) {
    if (timecodes[i].type === "checkbox") {
      if (timecodes[i].checked === true)
        deltimecodelist += timecodes[i].value + ",";
      result = encodeURIComponent(deltimecodelist.slice(0, deltimecodelist.lastIndexOf(",", 0)));
    }
  }

  xmlhttp.open("GET", "scripts/delselectedtimecodes.php?deltimecodelist=" + result, true);
  xmlhttp.send();

}
