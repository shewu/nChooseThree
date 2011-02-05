<?php
function is_email_valid($email) {
	return substr($email,-8) == "@mit.edu";
}
?>
