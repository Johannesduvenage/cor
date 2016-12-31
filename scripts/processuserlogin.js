/* 
 * The MIT License
 *
 * Copyright 2016 Darren Shane Bailey.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

require("scripts/cormain.js");

processUserLogin = function() {
  let corUserName = 
          encodeURIComponent(
          document.getElementById("corusername").value.toLowerCase());
  let corUserPass = 
          encodeURIComponent(document.getElementById("coruserpass").value);
  let XMLHttp = null;

  if (corUserName === "" || corUserPass === "") {
    document.getElementById("statusbar").innerHTML = 
            "Status: A username and password must be entered.";
    return;
  }
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    XMLHttp = new XMLHttpRequest();
  }
  else {// code for IE6, IE5
    XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  XMLHttp.onreadystatechange = function () {
    if (XMLHttp.readyState === AJAX_READY_STATE.COMPLETE && XMLHttp.status === HTTP_STATUS_CODE.OK) { // no errors
      document.getElementById("main-panel").innerHTML = "Status: " + 
              XMLHttp.responseText;
    }
  };

  XMLHttp.open("POST", "scripts/processuserlogin.php?", true);
  XMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  XMLHttp.send( "corusername=" + corUserName + "&coruserpass=" + corUserPass);
};
