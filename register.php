<?php
require("web_vars.php");
require("mysql_connect.php");
$hash = $_GET["a"];
$query = "SELECT * FROM Invites WHERE Hash='$hash'";
$res = mysql_query($query);
if(mysql_num_rows($res) != 0) {
?>
<!-- Password form -->

<?php
} else {
	header("Location: index.php");
	die();
}
?>
