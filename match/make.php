<?php
require("../auth.php");
if($auth_name) {

if(isset($_POST["target_a_email"])) {
	require("../suggest_triple.php");
	suggest_triple($_POST["target_a_email"],$_POST["target_b_email"],$_POST["target_c_email"]);
	header("Location: make.php");
	die();
}

include("../header.php");
?>
<article>
<aside>
</aside>
<section id="matchmake-nav" class="grid_3">
<ul>
<li><a href="/nChooseThree/match/me.php">Match Me</a></li>
<li><a href="/nChooseThree/match/make.php">Matchmaker</a></li>
</ul>
</section>
<section class="grid_9">
<div class="matchmaker">
<div class="heading-wrapper"><div class="heading">Make a match:</div></div>
<form action="make.php" method="post" class="matchmake-form">
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
<button type="submit">Match</button>
</form>
<div class="columnclear"></div>
</div>
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
