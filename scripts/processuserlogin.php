<?php

// setup secure user session
// load the page which matches the user level
// connect to corinthian database.
require_once ('cormain.php');

        const DB_NO_CONNECT_MSG = 'Could not connect to mysql: ';
        const DB_NO_SELECT_MSG = 'Could not select the corinthianjobcard database.';

$corcon = mysql_connect($corhost, $coruser, $corpass);
if (!$corcon) {
  die(DB_NO_CONNECT_MSG . mysql_error());
}

if (!mysql_select_db("corinthianjobcard", $corcon)) {
  die(DB_NO_SELECT_MSG . mysql_error());
}

$corusername = mysql_real_escape_string(strtolower(filter_input(INPUT_GET, 'corusername', FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_ENCODED)));

$corSQL = "SELECT * FROM users WHERE username='" . $corusername . "'";
$corQuery = mysql_query($corSQL, $corcon);
if (!$corQuery) {
  die('Could not query on line 23.' . $corSQL . '     ' . mysql_error());
}

// check user database to see if username and password is correct
$row = mysql_fetch_assoc($corQuery);
//echo "searching for matching record.<br />";
if (filter_input(INPUT_GET, 'coruserpass', FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_ENCODED) === $row['userpass']) {
  switch ($row['userlevelid']) {
    case 1 :
      // open admincpanel.php
      header("Location: ../admincpanel.php");
      break;
    case 2 :
      // open officeusercpanel.php
      header("Location: ../officecpanel.php");
      break;
    case 3 :
      // open factoryusercpanel.php
      header("Location: ../factorycpanel.php");
    // todo: add category for different factory areas(duties)
  }
} else {//echo "Incorrect username or password.<br /> Please contact the web administrator to correct this problem.<br />";
  Header("Location: ../index.php");
  //todo: display error message 'wrong username or password'
}

mysql_free_result($corQuery);

mysql_close($corcon);
// close database.
echo "finished processing login form.";

