<?php
$corhost = 'localhost';
//$_SERVER['SERVER_NAME'];
$coruser = 'darren';
$corpass = 'drt900';
$corroot = $_SERVER['DOCUMENT_ROOT'] . 'corinthian';

function toggle($theinput) {
	if ($theinput == 1)
		return "checked='checked'";
	else
		return '';
}

function corsessionopen($save_path, $session_name) {
	global $table;
	mysql_connect('localhost');
	mysql_select_db($save_path);
	$table = $session_name;
	return true;
}

//function corsessionclose($thisdb) {
//  mysql_close($thisdb);
//  return true;
//}

function corsessionread($session_id) {
	global $table;
	$result = mysql_query("SELECT value FROM $table
                           WHERE session_id=' $session_id' ");
	if ($result && mysql_num_rows($result)) {
		return mysql_result($result, 0);
	} else {
		error_log("read: " . mysql_error() . "\n", 3, "/tmp/errors.log");
		return;
	}
}

function corsessionwrite($session_id, $data) {
	global $table;
	$data = addslashes($data);
	mysql_query("REPLACE INTO $table (session_id, value)
                 VALUES(' $session_id' , ' $data' ) ") or error_log("write: " . mysql_error() . "\n", 3, "/tmp/errors. log");
	return true;
}

function corsessiondestroy($session_id) {
	global $table;
	mysql_query("DELETE FROM $table WHERE session_id = ' $session_id' ");
	return true;
}

function corsessioncleanup($max_time) {
	global $table;
	mysql_query("DELETE FROM $table WHERE UNIX_TIMESTAMP(expiration)
       < UNIX_TIMESTAMP( )-$max_time") or error_log("gc: " . mysql_error() . "\n", 3, "/tmp/errors.log");
	return true;
}

//session_set_save_handler('corsessionopen', 'corsessionclose', 'corsessionread', 'corsessionwrite', 'corsessiondestroy', 'corsessioncleanup');

function strtodate($stringformat, $thestring) {
	// 'd/m/Y'
	$date = date_create_from_format($stringformat, $thestring);

	return date_format($date, 'Y-m-d');

}

function dbRow($sql) {
	$r = cache_load(md5($sql));
	if ($r === false) {
		$q = mysql_query($sql);
		if (!$q)
			die('Could not run query. ' . mysql_error());
		$r = mysql_fetch_array($q);
		cache_save(md5($sql), $r);
	}
	return $r;
}

function dbAll($sql) {
	$rs = cache_load(md5($sql));
	if ($rs === false) {
		$rs = array();
		$q = mysql_query($sql);
		if (!$q)
			die('Could not run query. ' . mysql_error());
		while ($r = mysql_fetch_array($q))
			$rs[] = $r;
		cache_save(md5($sql), $r);
	}
	return $rs;
}
?>