<?php
function corsessionopen($save_path, $session_name) {
  global $table;
  mysql_connect('localhost');
  mysql_select_db($save_path);
  $table = $session_name;
  return true;
}

function corsessionclose() {
  mysql_close();
  return true;
}

function corsessionread(($session_id) {
    global $table;
    $result = mysql_query("SELECT value FROM $table
                           WHERE session_id=' $session_id' ") ;
    if($result && mysql_num_rows($result)) {
        return mysql_result($result, 0) ;
    } else {
        error_log("read: ".mysql_error()."\n", 3, "/tmp/errors.log");
	return 
}

function corsessionwrite($session_id, $data) {
    global $table;
    $data = addslashes($data);
    mysql_query("REPLACE INTO $table (session_id, value)
                 VALUES(' $session_id' , ' $data' ) ")
    or error_log("write: ".mysql_error()."\n", 3, "/tmp/errors. log");
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
       < UNIX_TIMESTAMP( )-$max_time")
      or error_log("gc: ".mysql_error()."\n", 3, "/tmp/errors.log");
    return true;
}

session_set_save_handler('corsessionopen', 'corsessionclose', 'corsessionread', 'corsessionwrite', 'corsessiondestroy', 'corsessioncleanup');



?>