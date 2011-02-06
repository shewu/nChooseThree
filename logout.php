<?php
require("mysql_connect.php");

$query = "DELETE FROM Sessions WHERE Id='$_COOKIE[session_id]'";
mysql_query($query);
setcookie("session_id","",time()-1);
header("Location: index.php");
?>
