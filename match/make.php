<?php
require("../auth.php");
if($auth_name) {

if(isset($_POST["target_a_email"])) {
	require("../suggest_triple.php");
	header("Location: make.php");
	suggest_triple($_POST["target_a_email"],$_POST["target_b_email"],$_POST["target_c_email"]);
	die();
}

include("../header.php");
?>
<article>
<section id="matchmake-nav" class="column grid_3">
<ul>
<li><a href="/match/me.php">Match Me</a></li>
<li class="nav-highlight"><a href="/match/make.php">Matchmaker</a></li>
</ul>
</section>
<section class="column grid_9">
<form action="make.php" method="post" class="matchmake-form">
<div class="matchmaker">
<div class="row-wrapper form-row">
<div class="heading-wrapper">Make a match:</div>
<span class="text-wrapper">
<input type="text" id="target_a_email" name="target_a_email" class="text
ui-autocomplete-input" />
</span>
<span class="text-wrapper">
<input type="text" id="target_b_email" name="target_b_email" class="text
ui-autocomplete-input" />
</span>
<span class="text-wrapper">
<input type="text" id="target_c_email" name="target_c_email" class="text
ui-autocomplete-input" />
</span>
<span class="entry">
<button type="submit">Match</button>
</span>
</div>
<?php
require("../mysql_connect.php");
$query = "SELECT * FROM Matches WHERE Maker='$auth_name' ORDER BY Timestamp DESC";
$res = mysql_query($query);
for($i = 0; $i < mysql_num_rows($res); $i++) {
	if(mysql_result($res,$i,"Status") == 7) {
		echo "<div class=\"row-wrapper success\">\n";
	} else {
		echo "<div class=\"row-wrapper waiting\">\n";
	}
	$timediff = time() - mysql_result($res,$i,"Timestamp");
	if($timediff < 60) {
		$timestr = floor($timediff) . " seconds ago";
	} else if($timediff < 3600) {
		$timestr = floor($timediff / 60) . " minutes ago";
	} else if($timediff < 86400) {
		$timestr = floor($timediff / 3600) . " hours ago";
	} else {
		$timestr = floor($timediff / 86400) . " days ago";
	}
	echo '<div class="faded entry">' . $timestr . "</div>\n";
	echo '<div class="entry">' . mysql_result($res,$i,"Email1") . "</div>\n";
	echo '<div class="entry">' . mysql_result($res,$i,"Email2") . "</div>\n";
	echo '<div class="entry">' . mysql_result($res,$i,"Email3") . "</div>\n";
	if(mysql_result($res,$i,"Status") == 7) {
		echo "<div class=\"entry\"><strong>Matched!</strong></div>\n";
	} else {
		echo "<div class=\"faded entry\"><em>Waiting</em></div>\n";
	}
	echo "</div>\n";
}
?>
</div>
</form>
<strong>Note:</strong> The matchmaker's identity is revealed when all three A,
B, and C accept the match.
</section>
</article>

<?php
include("../footer.php");
} else {
	header("Location: ../index.php");
}
?>
