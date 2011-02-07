<?php
include("web_vars.php");
require("mysql_connect.php");
require_once("verify_email.php");
function get_invite_url($mail) {
	if(!is_email_valid($mail)) return '';
	global $base_url;
	$query = "SELECT * FROM Invites WHERE Email='$mail'";
	$res = mysql_query($query);
	if(mysql_num_rows($res) > 0) {
		return $base_url."register.php?a=".mysql_result($res,0,"Hash");
	} else {
		$hash = sha1($mail . time());
		$query = "INSERT INTO Invites VALUES('$mail','$hash')";
		mysql_query($query);
		return $base_url."register.php?a=".$hash;
	}
}
?>
