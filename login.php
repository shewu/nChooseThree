<?php
require_once("mysql_connect.php");
require_once("verify_email.php");

$email = $_POST["email"];
$pass = $_POST["password"];

if(!is_valid_email($email)) {
	header("Location: index.php");
	die();
}

$pass_hash = sha1($email . $pass . "55555");
$query = "SELECT * FROM Accounts WHERE Email='$email' AND Password='$pass_hash'";
$res = mysql_query($query);

if(mysql_num_rows($res) != 0) {
	$session_hash = sha1($email . $pass . time());
	$query = "INSERT INTO Sessions VALUES('$session_hash','$email')";
	mysql_query($query);

	setcookie("session_id",$session_hash);
}

header("Location: index.php");
?>
