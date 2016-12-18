<?php
// setup secure user session
// load the page which matches the user level
// connect to corinthian database.
require_once ('cormain.php');

$corcon = mysql_connect($corhost, $coruser, $corpass);
if (!$corcon)
	die('Could not connect to mysql: ' . mysql_error());

if (!mysql_select_db("corinthianjobcard", $corcon))
	die('Could not select the corinthianjobcard database.' . mysql_error());

$corusername = mysql_real_escape_string(strtolower($_GET['corusername']));

$corquery = "SELECT * FROM users WHERE username='" . $corusername . "'";
$qry = mysql_query($corquery, $corcon);
if (!$qry)
	die('Could not query on line 20.' . $corquery . '     ' . mysql_error());

// check user database to see if username and password is correct
$row = mysql_fetch_assoc($qry);
//echo "searching for matching record.<br />";
//printf("ID: %s  Name: %s <br />", $row['username'], $row['userpass']);

//printf("coruserpass= %s and userpass= %s <br />", $_GET['coruserpass'], $row['userpass']);
if ($_GET['coruserpass'] == $row['userpass']) {
	//echo "match found!<br />";
	//echo "you are now logged in <br />" . $row['username'] . ".<br />";
	switch($row['userlevelid']) {
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

mysql_free_result($qry);

mysql_close($corcon);
// close database.
echo "finished processing login form.";
?>
