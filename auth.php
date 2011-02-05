<?php
require_once("mysql_connect.php");
$auth_name = false;

$session_hash = $_COOKIE["session_id"];
$query = "SELECT * FROM Sessions WHERE Id='$session_hash'";
$res = mysql_query($query);
if(mysql_num_rows($res) > 0) {
	$auth_name = mysql_result($res,0,"Email");
}
?>
