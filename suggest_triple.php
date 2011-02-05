<?php
$suggest_text = "Hey %s,

A friend at MIT thinks you'd be a great match with %s and %s! Interested? To activate your account and view this match, visit

%s

You can also submit potential matches between your friends at MIT, and we'll notify you of any successful matches.

We hope you check us out and turn nChooseThree into (n-3)ChooseThree! Privacy and security are our top priorities - no information about romantic intent is revealed to anyone unless all three parties of a suggested match have accepted. Additionally, this service is limited to members of the MIT community. You can read more about us at

%s

Cheers,
nChooseThree";

$suggest_title = "A friend thinks %s, %s, and you would make a great match!";

function suggest_triple($mail1, $mail2, $mail3) {
	global $suggest_text, $suggest_title;
	$mail_text1 = sprintf($suggest_text, $mail1, $mail2, $mail3, "foo", "bar");
	$mail_title1 = sprintf($suggest_title, $mail2, $mail3);
	$mail_text2 = sprintf($suggest_text, $mail2, $mail3, $mail1, "foo", "bar");
	$mail_title2 = sprintf($suggest_title, $mail3, $mail1);
	$mail_text3 = sprintf($suggest_text, $mail3, $mail1, $mail2, "foo", "bar");
	$mail_title3 = sprintf($suggest_title, $mail1, $mail2);
	mail($mail1, $mail_title1, $mail_text1, "From: info@nchoosethree.com");
	mail($mail2, $mail_title2, $mail_text2, "From: info@nchoosethree.com");
	mail($mail3, $mail_title3, $mail_text3, "From: info@nchoosethree.com");
}
?>
