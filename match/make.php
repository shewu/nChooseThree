<?php
require("../auth.php");
if($auth_name) {
include("../header.php");
?>
<article>
<aside>
</aside>
<section id="matchmake-nav" class="grid_3">
<ul>
<li><a href="/nChooseThree/match/me">Match Me</a></li>
<li><a href="/nChooseThree/match/make">Matchmaker</a></li>
</ul>
</section>
<section class="grid_9">
<div class="matchmaker">
<div class="heading-wrapper"><div class="heading">Make a match:</div></div>
<form method="post" class="matchmake-form">
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
