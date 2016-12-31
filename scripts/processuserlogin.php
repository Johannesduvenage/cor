<?php

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

// setup secure user session
// load the page which matches the user level
// connect to corinthian database.

require_once ('cormain.php');

        const DB_NO_CONNECT_MSG = 'Could not connect to mysql: ';
        const DB_NO_SELECT_MSG = 
                'Could not select the corinthianjobcard database.';
$corcon = mysql_connect($corhost, $coruser, $corpass);
if (!$corcon) {
    die(DB_NO_CONNECT_MSG . mysql_error());
}

if (!mysql_select_db("corinthianjobcard", $corcon)) {
    die(DB_NO_SELECT_MSG . mysql_error());
}

$corusername = mysql_real_escape_string(strtolower(filter_input(INPUT_POST, 
        'corusername', FILTER_SANITIZE_SPECIAL_CHARS | 
        FILTER_SANITIZE_ENCODED)));
$coruserpass = mysql_real_escape_string(filter_input(INPUT_POST, 'coruserpass', 
        FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_ENCODED));
$corSQL = "SELECT * FROM users WHERE username='" . $corusername . "'";
$corQuery = mysql_query($corSQL, $corcon);
if (!$corQuery) {
    die('Could not query on line 23.' . $corSQL . '     ' . mysql_error());
}

// check user database to see if username and password is correct
$row = mysql_fetch_assoc($corQuery);
//echo "searching for matching record.<br />";
if ($coruserpass === $row['userpass']) {
    switch ($row['userlevelid']) {
        case 1 :
            // open admincpanel.php
            header("Location: ../admincpanel.php", true);
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
} else {//echo "Incorrect username or password.<br /> Please contact the web
        // administrator to correct this problem.<br />";
    Header("Location: ../index.php", true, 401);
    //todo: display error message 'wrong username or password'
}

mysql_free_result($corQuery);

mysql_close($corcon);
// close database.
//echo "Finished processing login form But the application terminated.";

