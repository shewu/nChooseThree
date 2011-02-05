<?php
function is_email_valid($email) {
	return mysql_real_escape_string($email) == $email and substr($email,-8) == "@mit.edu";
}
?>
