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

require_once('cormain.php');

// connect to corinthian database.
$corcon = mysql_connect($corhost, $coruser, $corpass);
if (!$corcon) {
  die('Could not connect to mysql: ' . mysql_error());
}

if (!mysql_select_db("corinthianjobcard", $corcon)) {
  die('Could not select the corinthianjobcard database.' . mysql_error());
}

$codeid = mysql_real_escape_string(filter_input(INPUT_GET, "codeid", FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_ENCODED));
$timeperiod = mysql_real_escape_string(filter_input(INPUT_GET, "timeperiod", FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_ENCODED));

$corquery = "INSERT INTO codes (codeid, timeperiod) VALUES (" . $codeid . ", " . $timeperiod . ")";
$qry = mysql_query($corquery, $corcon);
if (!$qry) {
  die('Could not run add record query on line 12.' . $corquery . '     ' . mysql_error());
}
require_once('displaytimecodelist.php');
//todo: field validation for entire site.
mysql_close($corcon);

