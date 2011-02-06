<?php
require("../auth.php");
if(!$auth_name) {
	header("Location: ../index.php");
	die();
}
include("../header.php");
?>
<article>
<section id="matchmake-nav" class="column grid_3">
<ul>
<li class="nav-highlight"><a href="/nChooseThree/match/me.php">Match Me</a></li>
<li><a href="/nChooseThree/match/make.php">Matchmaker</a></li>
</ul>
</section>
<section class="column grid_9">
<div class="notice">
<strong>Suggested matches</strong> for you are shown below.
</div>
<table>
<tr>
<th scope="col">Matchmaker</th>
<th scope="colgroup" colspan="2">Suggested Match</th>
<th scope="col">Reply</th>
</tr>
<!-- matches -->
<?php
require("../mysql_connect.php");
$query = "SELECT * FROM Matches WHERE Email1='$auth_name' OR Email2='$auth_name' OR Email3='$auth_name'";
$res = mysql_query($query);
for($i = 0; $i < mysql_num_rows($res); $i++) {
	$id = mysql_result($res,$i,"ID");
	$status = mysql_result($res,$i,"Status");
	$email1 = mysql_result($res,$i,"Email1");
	$email2 = mysql_result($res,$i,"Email2");
	$email3 = mysql_result($res,$i,"Email3");
	if($auth_name == $email1) {
		if($status == 7) {
			echo "<tr class=\"success\">\n";
			echo "<td><em>" . mysql_result($res,$i,"Maker") . "</em></td>\n";
		} else if(($status & 1) != 1) {
			echo "<tr class=\"waiting\">\n";
			echo "<td><em><span class=\"faded\">Revealed on accept</span></em></td>\n";
		} else {
			echo "<tr>\n";
			echo "<td><em><span class=\"faded\">Revealed on accept</span></em></td>\n";
		}
		echo "<td>$email2</td>\n<td>$email3</td>\n";
		if($status == 7) {
			echo "<td><strong>You've all accepted!</strong> How about a date? ;-)</td>\n";
		} else if(($status & 1) == 1) {
			echo "<td><em>Waiting</em></td>\n";	
		} else {
			echo "<td><strong><a href=\"/nChooseThree/match/accept.php?m=$id\">Accept</a></strong> or <strong><a href=\"/nChooseThree/match/ignore.php?m=$id\">Ignore</a></strong></td>\n";
		}
	} else if($auth_name == $email2) {
		if($status == 7) {
			echo "<tr class=\"success\">\n";
			echo "<td><em>" . mysql_result($res,$i,"Maker") . "</em></td>\n";
		} else if(($status & 2) != 2) {
			echo "<tr class=\"waiting\">\n";
			echo "<td><em><span class=\"faded\">Revealed on accept</span></em></td>\n";
		} else {
			echo "<tr>\n";
			echo "<td><em><span class=\"faded\">Revealed on accept</span></em></td>\n";
		}
		echo "<td>$email1</td>\n<td>$email3</td>\n";
		if($status == 7) {
			echo "<td><strong>You've all accepted!</strong> How about a date? ;-)</td>\n";
		} else if(($status & 2) == 2) {
			echo "<td><em>Waiting</em></td>\n";	
		} else {
			echo "<td><strong><a href=\"/nChooseThree/match/accept.php?m=$id\">Accept</a></strong> or <strong><a href=\"/nChooseThree/match/ignore.php?m=$id\">Ignore</a></strong></td>\n";
		}
	} else if($auth_name == $email3) {
		if($status == 7) {
			echo "<tr class=\"success\">\n";
			echo "<td><em>" . mysql_result($res,$i,"Maker") . "</em></td>\n";
		} else if(($status & 4) != 4) {
			echo "<tr class=\"waiting\">\n";
			echo "<td><em><span class=\"faded\">Revealed on accept</span></em></td>\n";
		} else {
			echo "<tr>\n";
			echo "<td><em><span class=\"faded\">Revealed on accept</span></em></td>\n";
		}
		echo "<td>$email1</td>\n<td>$email2</td>\n";
		if($status == 7) {
			echo "<td><strong>You've all accepted!</strong> How about a date? ;-)</td>\n";
		} else if(($status & 4) == 4) {
			echo "<td><em>Waiting</em></td>\n";	
		} else {
			echo "<td><strong><a href=\"/nChooseThree/match/accept.php?m=$id\">Accept</a></strong> or <strong><a href=\"/nChooseThree/match/ignore.php?m=$id\">Ignore</a></strong></td>\n";
		}
	}
}
?>
</table>
<div class="notice">
<strong>You can have up to 10 crushes at a time.</strong> A crush can be removed
after a week has passed.
</div>
<!-- crushes -->
<p>The matchmaker <strong>does not receive any information</strong> unless all
three matchees accept the match.</p>
<p>The matchmaker's identity is revealed when all three A, B, and C accept the
match.</p>
</section>
</article>
<?php
include("../footer.php");
?>

