<?php
require("../auth.php");
if(!$auth_name) {
	header("Location: ../index.php");
}

require_once("../mysql_connect.php");
$m = $_GET["m"];
$query = "SELECT * FROM Matches WHERE ID=$m";
$res = mysql_query($query);
$matchee_text_format = "Hey %s,

Congrats, %s, %s, and you have accepted this match! How about contacting %s and %s for a date? ;-) Don't forget to thank your matchmaker, %s!


Why not spread the love and be a matchmaker, too, at

%s


Cheers,
nChooseThree";
$matchmaker_text_format = "Hey %s,

Congrats, you've facilitated a successful match between %s, %s, and %s! Why not send them some date ideas to get started?

We're sure your other single friends would appreciate some match suggestions, too. ;-)

%s


Cheers,
nChooseThree";
include("../web_vars.php");
for($i = 0; $i<mysql_num_rows($res); $i++) {
	$email1 = mysql_result($res,$i,"Email1");
	$email2 = mysql_result($res,$i,"Email2");
	$email3 = mysql_result($res,$i,"Email3");
	$maker = mysql_result($res,$i,"Maker");
	$status = mysql_result($res,$i,"Status");

	if($auth_name == $email1) {
		$status = $status | 1;
	}
	if($auth_name == $email2) {
		$status = $status | 2;
	}
	if($auth_name == $email3) {
		$status = $status | 4;
	}
	
	$query = "UPDATE Matches SET Status=$status WHERE ID=$m";
	mysql_query($query);

	if(($status & 7) == 7) {
		//Full match
		$mail1_text = sprintf($matchee_text_format,$email1,$email2,$email3,$email2,$email3,$maker,$base_url."match/make.php");
		$mail2_text = sprintf($matchee_text_format,$email2,$email1,$email3,$email1,$email3,$maker,$base_url."match/make.php");
		$mail3_text = sprintf($matchee_text_format,$email3,$email1,$email2,$email1,$email2,$maker,$base_url."match/make.php");
		$mailmaker_text = sprintf($matchmaker_text_format,$maker,$email1,$email2,$email3,$base_url."match/make.php");
		mail($email1,"Good news!",$mail1_text,"From: $from_addr");
		mail($email2,"Good news!",$mail2_text,"From: $from_addr");
		mail($email3,"Good news!",$mail3_text,"From: $from_addr");
		mail($maker,"Good news!",$mailmaker_text,"From: $from_addr");
	}
}
header("Location: me.php");
