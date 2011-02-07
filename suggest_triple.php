<?php
$suggest_text = "Hey %s,

A friend at MIT thinks you'd be a great match with %s and %s! Interested? To activate your account and view this match, visit

%s

You can also submit potential matches between your friends at MIT, and we'll notify you of any successful matches.

We hope you check us out and turn nChooseThree into (n-3)ChooseThree! Privacy and security are our top priorities - no information about romantic intent is revealed to anyone unless all three parties of a suggested match have accepted. Additionally, this service is limited to members of the MIT community. You can read more about us at

%s

Cheers,
nChooseThree";

$registered_suggest_text = "Hey %s,

A friend just suggested a new match for you! To view this match, visit

%s


Cheers,
nChooseThree";

$suggest_title = "A friend thinks %s, %s, and you would make a great match!";
$registered_suggest_title = "A friend at MIT suggested a new match for you!";

require_once("auth.php");
require_once("verify_email.php");
require_once("web_vars.php");
require_once("../invite_function.php");

function is_registered($email) {
	$query = "SELECT * FROM Accounts WHERE Email='$email'";
	$res = mysql_query($query);
	return mysql_num_rows($res) > 0;
}

function suggest_triple($mail1, $mail2, $mail3) {
	global $suggest_text, $suggest_title,$auth_name, $base_url, $from_addr, $registered_suggest_text, $registered_suggest_title;
	$mail1 = strtolower($mail1);
	$mail2 = strtolower($mail2);
	$mail3 = strtolower($mail3);
	if($auth_name and is_email_valid($mail1) and is_email_valid($mail2) and is_email_valid($mail3)) {
		if(is_registered($mail1)) {
			$mail_text1 = sprintf($registered_suggest_text, $mail1,$base_url."match/me.php");
			$mail_title1 = $registered_suggest_title;
		} else {
			$mail_text1 = sprintf($suggest_text, $mail1, $mail2, $mail3, get_invite_url($mail1), $base_url . "about.php");
			$mail_title1 = sprintf($suggest_title, $mail2, $mail3);
		}
		if(is_registered($mail2)) {
			$mail_text2 = sprintf($registered_suggest_text, $mail2,$base_url."match/me.php");
			$mail_title2 = $registered_suggest_title;
		} else {
			$mail_text2 = sprintf($suggest_text, $mail2, $mail1, $mail3, get_invite_url($mail2), $base_url . "about.php");
			$mail_title2 = sprintf($suggest_title, $mail1, $mail3);
		}
		if(is_registered($mail1)) {
			$mail_text3 = sprintf($registered_suggest_text, $mail3, $base_url."match/me.php");
			$mail_title3 = $registered_suggest_title;
		} else {
			$mail_text3 = sprintf($suggest_text, $mail3, $mail1, $mail2, get_invite_url($mail3), $base_url . "about.php");
			$mail_title3 = sprintf($suggest_title, $mail1, $mail2);
		}
		mail($mail1, $mail_title1, $mail_text1, "From: $from_addr");
		mail($mail2, $mail_title2, $mail_text2, "From: $from_addr");
		mail($mail3, $mail_title3, $mail_text3, "From: $from_addr");

		$query = "INSERT INTO Matches VALUES(0,'$mail1','$mail2','$mail3','$auth_name',0,".time().")";
		mysql_query($query);
	}
}
?>
