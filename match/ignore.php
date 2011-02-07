<?php
require("../auth.php");
if(!$auth_name) {
	header("Location: ../index.php");
}

require_once("../mysql_connect.php");
$m = $_GET["m"];
$query = "SELECT * FROM Matches WHERE ID=$m";
$res = mysql_query($query);
include("../web_vars.php");
for($i = 0; $i<mysql_num_rows($res); $i++) {
	$email1 = mysql_result($res,$i,"Email1");
	$email2 = mysql_result($res,$i,"Email2");
	$email3 = mysql_result($res,$i,"Email3");
	$maker = mysql_result($res,$i,"Maker");
	$status = mysql_result($res,$i,"Status");

	if($auth_name == $email1) {
		$status = $status | 8;
	}
	if($auth_name == $email2) {
		$status = $status | 16;
	}
	if($auth_name == $email3) {
		$status = $status | 32;
	}
	
	$query = "UPDATE Matches SET Status=$status WHERE ID=$m";
	mysql_query($query);

}
header("Location: me.php");

