<?php
require("web_vars.php");
require("mysql_connect.php");
if(isset($_POST["password"])) {
	$hash = $_POST["a"];
	$query = "SELECT * FROM Invites WHERE Hash='$hash'";
	$res = mysql_query($query);
	if(mysql_num_rows($res) == 0) {
		header("Location: index.php");
		die();
	}
	$email = mysql_result($res,0,"Email");

	$pass = $_POST["password"];
	$query = mysql_real_escape_string("INSERT INTO Accounts VALUES(0,'$email','".sha1($email . $pass . "55555")."'");
	mysql_query($query);
	$query = "DELETE * FROM Invites WHERE Hash='$hash'";
	mysql_query($query);

	$session_hash = sha1($email . $pass . time());
	$query = "INSERT INTO Sessions VALUES('$session_hash','$email')";
	mysql_query($query);
	
	setcookie("session_id",$session_hash);
} else {
$hash = $_GET["a"];
$query = "SELECT * FROM Invites WHERE Hash='$hash'";
$res = mysql_query($query);
if(mysql_num_rows($res) != 0) {

include("header.php");
?>
<!-- Password form -->
<div class="stylized myform">
<form action="register.php" method="post">
<h1>Choose your password</h1>
<p>Select a password between 6 and 40 characters.</p>
<div class="form-element">
<label for="password">Password:</label>
<input type="password" id="password" name="password" class="text" />
<label for="password2">Reenter password:</label>
<input type="password" id="password2" name="password" class="text" />
</div>
</form>
</div>

<?php
include("footer.php");

} else {
	header("Location: index.php");
	die();
}
}
?>
