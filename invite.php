<?php
require("web_vars.php");
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
	global $from_addr, $invite_text_format;
	$mail_title = "Activate your nChooseThree account";
	$mail_text = sprintf($invite_text_format, $mail, "foo", "bar");
	mail($mail,$mail_title,$mail_text,"From: ".$from_addr);
}

if(isset($_POST["email"])) {
	invite($_POST["email"]);
}
?>
