<?php
require("web_vars.php");
require("mysql_connect.php");
require_once("verify_email.php");
$invite_text_format = "Hey %s,

Thanks for signing up for nChooseThree, an MIT-exclusive service that lets you match up your friends, and check out matches your friends have suggested for you! To activate your account, please visit

%s

Using nChooseThree, you can:

- Suggest matches between friends and get notified if they all accept
- View, respond to, and ask about match suggestions from friends

Privacy and security are our top priorities - you always remain anonymous unless romantic interest turns out to be mutual. You can find out more about us at

%s

Cheers,
nChooseThree";

function invite($mail) {
	global $from_addr, $invite_text_format, $base_url;

	$hash = sha1($mail . time());

	$mail_title = "Activate your nChooseThree account";
	$mail_text = sprintf($invite_text_format, $mail, $base_url . "register.php?a=".$hash, $base_url . "about.php");
	mail($mail,$mail_title,$mail_text,"From: ".$from_addr);

	$mail = mysql_real_escape_string($mail);
	$query = "DELETE FROM Invites WHERE Email='$mail'";
	mysql_query($query);
	$query = "INSERT INTO Invites VALUES ('$mail','$hash')";
	mysql_query($query);
}

if(isset($_POST["email"]) and is_email_valid($_POST["email"])) {
	invite($_POST["email"]);

include("header.php");
?>
<article>
An email has been sent to your address. Please click the link in the email to complete registration.
</article>
<?php
include("footer.php");
} else {
	header("Location: index.php");
	die();
}
?>
